<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\PackageConfirmation;
use App\Events\PackageUpdated;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PackageController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $packages = auth()->user()->packages()->latest()->paginate(10);
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'weight' => 'required|numeric|min:0.1|max:1000',
            'weight_unit' => 'required|in:kg,g',
            'destination_address' => 'required|string|max:500',
            // Validation des champs individuels pour la formation de l'adresse
            'country' => 'required|string|in:France,Cameroun,Belgique',
            'city' => 'required|string',
            'street' => 'required|string',
            'description_colis' => 'required|string',
        ]);

        // Conversion du poids si nécessaire
        $weight = $validated['weight'];
        if ($validated['weight_unit'] === 'g') {
            $weight = $weight / 1000; // Conversion en kg
        }

        // Création du colis
        $package = Package::create([
            'user_id' => auth()->id(),
            'tracking_number' => 'DSF-' . Str::random(8),
            'weight' => $weight,
            'destination_address' => $validated['destination_address'], // L'adresse concaténée
            'status' => 'registered',
            'price' => $this->calculatePrice($weight),
            'description_colis' => $validated['description_colis'],
        ]);

        // Dispatch de l'événement de confirmation
        PackageConfirmation::dispatch($package);

        return redirect()->route('dashboard', $package)
            ->with('success', 'Votre colis a été enregistré avec succès !');
    }

    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        $this->authorize('update', $package);
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {


        // Validation
        $validated = $request->validate([
            'weight' => 'required|numeric|min:0.1|max:1000',
            'weight_unit' => 'required|in:kg,g',
            'destination_address' => 'required|string|max:500',
            'status' => 'sometimes|required|in:registered,in_transit,delivered,cancelled',
        ]);

        // Conversion du poids si nécessaire
        $weight = $validated['weight'];
        if ($validated['weight_unit'] === 'g') {
            $weight = $weight / 1000; // Conversion en kg
        }

        // Vérification si le statut peut être modifié
        if (isset($validated['status']) && !$this->canUpdateStatus($package, $validated['status'])) {
            return back()->withErrors(['status' => 'Le statut ne peut pas être modifié de cette manière.']);
        }

        // Mise à jour du colis
        $oldStatus = $package->status;

        $updateData = [
            'weight' => $weight,
            'destination_address' => $validated['destination_address'],
        ];

        // Mise à jour du prix si le poids a changé
        if ($package->weight != $weight) {
            $updateData['price'] = $this->calculatePrice($weight);
        }

        // Ajout du status s'il est présent dans la requête
        if (isset($validated['status'])) {
            $updateData['status'] = $validated['status'];
        }

        $package->update($updateData);

        // Dispatch d'un événement si le status a changé
        if ($oldStatus !== $package->status) {
            PackageUpdated::dispatch($package);
        }

        return redirect()->route('packages.show', $package)
            ->with('success', 'Les informations du colis ont été mises à jour avec succès !');
    }

    private function calculatePrice($weight)
    {
        return $weight * config('shipping.rate_per_kg', 10);
    }

    private function canUpdateStatus(Package $package, string $newStatus): bool
    {
        $allowedTransitions = [
            'registered' => ['in_transit', 'cancelled'],
            'in_transit' => ['delivered', 'cancelled'],
            'delivered' => [], // Statut final
            'cancelled' => [], // Statut final
        ];

        return in_array($newStatus, $allowedTransitions[$package->status] ?? []);
    }
}
