<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Notifications\PackageStatusChanged;
use Illuminate\Http\Request;

class AdminPackageController extends AdminController
{
    public function index()
    {
        $packages = Package::with('user')->latest()->paginate(15);
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
        // Validation des données
        $validated = $request->validate([
            'status' => 'required|in:registered,in_transit,delivered,cancelled',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'destination_address' => 'required|string',
            'tracking_notes' => 'nullable|string',
            'location' => 'nullable|string'
        ]);

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

        // Redirection avec un message de succès
        return redirect()->route('admin.packages.show', $package)
            ->with('success', 'Colis mis à jour avec succès');
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
                    Package::whereIn('id', $validated['ids'])
                        ->update(['status' => $validated['status']]);
                    $message = 'Les statuts ont été mis à jour avec succès';
                    break;

                case 'delete':
                    Package::whereIn('id', $validated['ids'])->delete();
                    $message = 'Les colis ont été supprimés avec succès';
                    break;

                case 'export':
                    // Implémentez la logique d'export ici
                    // Par exemple, créer un fichier CSV ou Excel
                    $message = 'Export effectué avec succès';
                    break;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => $message
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
        // Supprimer d'abord tous les trackings associés
        $package->trackings()->delete();

        // Ensuite supprimer le package
        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Colis supprimé avec succès');
    } catch (\Exception $e) {
        return redirect()->route('admin.packages.index')
            ->with('error', 'Erreur lors de la suppression du colis: ' . $e->getMessage());
    }
}
}
