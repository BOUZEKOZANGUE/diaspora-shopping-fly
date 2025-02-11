<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Package;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ShipmentController extends Controller
{
    /**
     * Liste des expéditions avec recherche et filtres
     */
    public function index(Request $request)
    {
        $query = Package::with(['user', 'recipient'])
            ->latest();

        // Filtrage par statut
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Recherche globale
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('tracking_number', 'LIKE', "%{$search}%")
                    ->orWhereHas('user', function($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('email', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('recipient', function($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('phone', 'LIKE', "%{$search}%");
                    });
            });
        }

        $packages = $query->paginate(15)
            ->withQueryString();

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Affiche les détails d'une expédition
     */
    public function show(Package $shipment)
    {
        $shipment->load(['user', 'recipient', 'trackings']);
        return view('admin.shipments.show', compact('shipment'));
    }

    /**
     * Affiche le formulaire de création pour nouveau client
     */
    public function create()
    {
        return view('admin.shipments.create');
    }

    /**
     * Affiche le formulaire de création pour client existant
     */
    /**
     * Affiche le formulaire de création pour client existant
     */
    public function createForExisting()
    {
        // Récupérer les utilisateurs avec pagination
        $users = User::orderBy('name')
                    ->select(['id', 'name', 'email', 'phone'])
                    ->paginate(10); // 10 utilisateurs par page

        return view('admin.shipments.create-existing', compact('users'));
    }

    /**
     * Recherche des utilisateurs pour l'autocomplétion
     */
    /**
 * Recherche des utilisateurs pour l'autocomplétion
 */
public function searchUsers(Request $request)
{
    $term = trim($request->input('term'));

    if (empty($term)) {
        return response()->json([
            'results' => []
        ]);
    }

    try {
        $users = User::where('name', 'LIKE', $term . '%')
            ->orWhere('email', 'LIKE', '%' . $term . '%')
            ->orWhere('phone', 'LIKE', $term . '%')
            ->orWhere(function($query) use ($term) {
                $terms = explode(' ', $term);
                foreach($terms as $t) {
                    $query->orWhere('name', 'LIKE', '%' . $t . '%');
                }
            })
            ->select(['id', 'name', 'email', 'phone'])
            ->orderBy('name')
            ->limit(10)
            ->get()
            ->map(function($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    //'avatar' => strtoupper(substr($user->name, 0, 2))
                ];
            });

        return response()->json([
            'results' => $users
        ]);

    } catch (\Exception $e) {
        \Log::error('Erreur recherche utilisateurs: ' . $e->getMessage());
        return response()->json([
            'error' => 'Erreur lors de la recherche'
        ], 500);
    }
}

    /**
     * Enregistre un nouveau client et son colis
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'weight' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0',
            'country' => 'required|string|in:France,Cameroun,Belgique',
            'city' => 'required|string|max:255',
            'destination_address' => 'required|string',
            'description_colis' => 'required|string',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
        ]);

        try {
            DB::beginTransaction();

            // Création du nouvel utilisateur
            $defaultPassword = $this->generateSecurePassword();
            $dsfEmail = $this->generateDsfEmail($validated['sender_name']);

            $user = User::create([
                'name' => $validated['sender_name'],
                'email' => $dsfEmail,
                'phone' => $validated['phone'],
                'password' => Hash::make($defaultPassword),
            ]);

            // Mise à jour des données validées pour inclure l'adresse complète
            $validated['destination_address'] = sprintf(
                "%s\n%s, %s",
                $validated['destination_address'],
                $validated['city'],
                $validated['country']
            );

            // Création du colis
            $package = $this->createPackage($user->id, $validated);

            DB::commit();

            session()->flash('shipment_created', [
                'user' => [
                    'name' => $user->name,
                    'email' => $dsfEmail,
                    'password' => $defaultPassword,
                    'phone' => $user->phone
                ],
                'recipient' => [
                    'name' => $package->recipient->name,
                    'phone' => $package->recipient->phone
                ],
                'package' => [
                    'tracking' => $package->tracking_number,
                    'price' => $package->price,
                    'destination' => $package->destination_address,
                    'weight' => $package->weight,
                    'description' => $package->description_colis
                ]
            ]);

            return redirect()->route('admin.shipments.success');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    /**
     * Enregistre un colis pour un client existant
     */
    public function storeForExisting(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'weight' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0',
            'country' => 'required|string|in:France,Cameroun,Belgique',
            'city' => 'required|string|max:255',
            'destination_address' => 'required|string',
            'description_colis' => 'required|string',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
        ]);

        try {
            DB::beginTransaction();

            // Récupérer l'utilisateur sélectionné
            $user = User::findOrFail($validated['user_id']);

            // Mise à jour des données validées pour inclure l'adresse complète
            $validated['destination_address'] = sprintf(
                "%s\n%s, %s",
                $validated['destination_address'],
                $validated['city'],
                $validated['country']
            );

            // Création du colis
            $package = $this->createPackage($user->id, $validated);

            DB::commit();

            session()->flash('shipment_created', [
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone
                ],
                'recipient' => [
                    'name' => $package->recipient->name,
                    'phone' => $package->recipient->phone
                ],
                'package' => [
                    'tracking' => $package->tracking_number,
                    'price' => $package->price,
                    'destination' => $package->destination_address,
                    'weight' => $package->weight,
                    'description' => $package->description_colis
                ]
            ]);

            return redirect()->route('admin.shipments.success');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    /**
     * Affiche la page de succès
     */
    public function success()
    {
        if (!session('shipment_created')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.shipments.success');
    }

    /**
     * Supprime une expédition
     */
    public function destroy(Package $shipment)
    {
        try {
            DB::beginTransaction();

            // Supprime d'abord le destinataire
            $shipment->recipient()->delete();

            // Puis le colis
            $shipment->delete();

            DB::commit();

            return redirect()
                ->route('admin.shipments.index')
                ->with('success', 'Expédition supprimée avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }

    /**
     * Génère le PDF de confirmation
     */
    public function generatePdf($tracking = null)
    {
        $shipment = $this->getShipmentData($tracking);

        if (!$shipment) {
            abort(404);
        }

        // Détermine si c'est un nouvel utilisateur
        $isNewUser = isset($shipment['user']['password']);

        // Sélectionne le template approprié
        $view = $isNewUser ? 'admin.shipments.pdf.pdf-new-user' : 'admin.shipments.pdf.pdf-existing-user';

        $pdf = PDF::loadView($view, ['shipment' => $shipment]);

        return $pdf->stream("DSF-{$shipment['package']['tracking']}.pdf");
    }

    /**
     * Télécharge le PDF de confirmation
     */
    public function downloadPdf($tracking = null)
    {
        $shipment = $this->getShipmentData($tracking);

        if (!$shipment) {
            abort(404);
        }

        // Détermine si c'est un nouvel utilisateur
        $isNewUser = isset($shipment['user']['password']);

        // Sélectionne le template approprié
        $view = $isNewUser ? 'admin.shipments.pdf.pdf-new-user' : 'admin.shipments.pdf.pdf-existing-user';

        $pdf = PDF::loadView($view, ['shipment' => $shipment]);

        return $pdf->download("DSF-{$shipment['package']['tracking']}.pdf");
    }

    /**
     * Met à jour le statut de plusieurs expéditions
     */
    public function bulkStatusUpdate(Request $request)
    {
        $validated = $request->validate([
            'shipments' => 'required|array',
            'shipments.*' => 'exists:packages,id',
            'status' => 'required|in:registered,in_transit,delivered'
        ]);

        try {
            DB::beginTransaction();

            Package::whereIn('id', $validated['shipments'])
                ->update(['status' => $validated['status']]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Statuts mis à jour avec succès'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour des statuts'
            ], 500);
        }
    }

    /**
     * Génère une étiquette d'expédition
     */
    public function generateLabel($tracking)
    {
        $shipment = $this->getShipmentData($tracking);

        if (!$shipment) {
            abort(404);
        }

        $pdf = PDF::loadView('admin.shipments.pdf.label', ['shipment' => $shipment]);

        return $pdf->stream("DSF-{$shipment['package']['tracking']}-label.pdf");
    }

    /**
     * Méthodes privées utilitaires
     */
    private function generateDsfEmail(string $name): string
    {
        $baseName = Str::slug($name);
        $uniqueNumber = sprintf('%04d', mt_rand(0, 9999));
        $email = "dsf.{$baseName}{$uniqueNumber}@dsf-express.com";

        while (User::where('email', $email)->exists()) {
            $uniqueNumber = sprintf('%04d', mt_rand(0, 9999));
            $email = "dsf.{$baseName}{$uniqueNumber}@dsf-express.com";
        }

        return $email;
    }

    private function generateSecurePassword(): string
    {
        return 'DSF' . Str::random(4) . rand(1000, 9999);
    }

    private function generateTrackingNumber(): string
    {
        $date = Carbon::now()->format('ymd');
        $random = strtoupper(Str::random(4));
        $number = "DSF-{$date}-{$random}";

        while (Package::where('tracking_number', $number)->exists()) {
            $random = strtoupper(Str::random(4));
            $number = "DSF-{$date}-{$random}";
        }

        return $number;
    }

    private function createPackage($userId, array $data)
    {
        // Création du colis
        $package = Package::create([
            'user_id' => $userId,
            'tracking_number' => $this->generateTrackingNumber(),
            'weight' => $data['weight'],
            'destination_address' => $data['destination_address'],
            'description_colis' => $data['description_colis'],
            'price' => $data['price'],
            'status' => 'registered'
        ]);

        // Création du destinataire associé
        $package->recipient()->create([
            'name' => $data['recipient_name'],
            'phone' => $data['recipient_phone']
        ]);

        return $package->load('recipient');
    }

    private function getShipmentData($tracking = null)
    {
        $shipment = session('shipment_created');

        if (!$shipment && $tracking) {
            $package = Package::with(['user', 'recipient'])
                ->where('tracking_number', $tracking)
                ->firstOrFail();

            $shipment = [
                'user' => [
                    'name' => $package->user->name,
                    'email' => $package->user->email,
                    'phone' => $package->user->phone
                ],
                'recipient' => [
                    'name' => $package->recipient->name,
                    'phone' => $package->recipient->phone
                ],
                'package' => [
                    'tracking' => $package->tracking_number,
                    'price' => $package->price,
                    'destination' => $package->destination_address,
                    'weight' => $package->weight,
                    'description' => $package->description_colis
                ]
            ];
        }

        return $shipment;
    }
}
