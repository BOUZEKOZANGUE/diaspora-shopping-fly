<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Package;
use App\Notifications\PackageStatusChanged;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\PackagesExport;

class AdminPackageController extends AdminController
{
    public function index()
    {
        $packages = Package::with(['user', 'trackings'])
        ->latest()
        ->paginate(5);
        return view('admin.packages.index', compact('packages'));
    }

    public function show(Package $package)
    {
        $package->load(['user', 'trackings']);
        return view('admin.packages.show', compact('package'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'status' => 'required|in:registered,in_transit,delivered,cancelled',
                'weight' => 'required|numeric',
                'price' => 'required|numeric',
                'destination_address' => 'required|string',
                'tracking_notes' => 'nullable|string',
                'location' => 'nullable|string'
            ]);

            DB::beginTransaction();

            // Mise à jour du colis avec tous les champs validés
            $package->update([
                'status' => $validated['status'],
                'weight' => $validated['weight'],
                'price' => $validated['price'],
                'destination_address' => $validated['destination_address'],
            ]);

            // Création d'un nouvel historique de suivi si des notes sont fournies
            if ($request->filled('tracking_notes')) {
                $package->trackings()->create([
                    'status' => $validated['status'],
                    'notes' => $validated['tracking_notes'],
                    'location' => $request->location ?? 'N/A'
                ]);
            }

            // Notification de l'utilisateur
            $package->user->notify(new PackageStatusChanged($package));

            DB::commit();

            return redirect()->route('admin.packages.show', $package)
                ->with('success', 'Colis mis à jour avec succès');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Package update error: ' . $e->getMessage());

            return back()->withInput()
                ->with('error', 'Une erreur est survenue lors de la mise à jour du colis');
        }
    }

    public function batchAction(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'action' => 'required|string|in:status,delete,export',
            'status' => 'required_if:action,status|string|in:delivered,in_transit,pending'
        ]);

        try {
            DB::beginTransaction();

            switch ($validated['action']) {
                case 'status':
                    $packages = Package::whereIn('id', $validated['ids'])->get();
                    foreach ($packages as $package) {
                        $package->update(['status' => $validated['status']]);
                        $package->user->notify(new PackageStatusChanged($package));
                    }
                    $message = 'Les statuts ont été mis à jour avec succès';
                    break;

                case 'delete':
                    Package::whereIn('id', $validated['ids'])->each(function ($package) {
                        $package->trackings()->delete();
                        $package->delete();
                    });
                    $message = 'Les colis ont été supprimés avec succès';
                    break;

                case 'export':
                    $packages = Package::whereIn('id', $validated['ids'])
                        ->with(['user', 'trackings'])
                        ->get();

                    // Générer un fichier Excel/CSV
                    $export = new PackagesExport($packages);
                    $filename = 'packages-export-' . now()->format('Y-m-d-His') . '.xlsx';
                    Excel::store($export, $filename, 'public');

                    $message = 'Export effectué avec succès';
                    $downloadUrl = Storage::url($filename);
                    break;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => $message,
                'downloadUrl' => $downloadUrl ?? null
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Batch action error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors du traitement de votre demande'
            ], 500);
        }
    }

    public function destroy(Package $package)
    {
        try {
            DB::beginTransaction();

            // Log pour debug
            \Log::info('Starting package deletion', ['id' => $package->id]);

            // Supprimer d'abord tous les trackings associés
            $package->trackings()->delete();

            // Ensuite supprimer le package
            $package->delete();

            DB::commit();

            // Force la réponse JSON
            return response()->json([
                'success' => true,
                'message' => 'Colis supprimé avec succès'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Package deletion error: ' . $e->getMessage());

            // Force la réponse JSON même en cas d'erreur
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du colis: ' . $e->getMessage()
            ], 500);
        }
    }   

    public function generateLabel(Package $package)
    {
        try {
            // Générer le code-barres
            $barcode = new DNS1D();
            $barcode->setStorPath(storage_path('app/public/barcodes/'));
            $barcodeImage = $barcode->getBarcodePNG($package->tracking_number, 'C128', 2, 60);

            // Générer le PDF avec le code-barres
            $pdf = PDF::loadView('admin.packages.label', [
                'package' => $package,
                'barcode' => $barcodeImage
            ]);

            // Configuration du PDF
            $pdf->setPaper('A6');
            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' => 150
            ]);

            return $pdf->download('label-' . $package->tracking_number . '.pdf');

        } catch (\Exception $e) {
            \Log::error('Label generation error: ' . $e->getMessage());

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors de la génération de l\'étiquette'
                ], 500);
            }

            return back()->with('error', 'Erreur lors de la génération de l\'étiquette');
        }
    }
}
