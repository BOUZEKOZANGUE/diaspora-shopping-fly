<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fly;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class AdminFlyController extends Controller
{
    /**
     * Affiche la liste des voyages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Statistiques pour le tableau de bord
        $stats = [
            'total_flys' => Fly::count(),
            'upcoming_flys' => Fly::where('departure_date', '>=', now())
                                ->where('status', '!=', 'suspended')
                                ->count(),
            'pending_packages' => Package::whereNull('fly_id')
                                    ->where('status', '!=', 'delivered')
                                    ->count(),
        ];

        // Récupérer les voyages à venir
        $upcomingFlys = Fly::where('departure_date', '>=', now())
                          ->where('status', '!=', 'suspended')
                          ->orderBy('departure_date')
                          ->paginate(10, ['*'], 'upcoming_page');

        // Récupérer les voyages passés
        $pastFlys = Fly::where('departure_date', '<', now())
                      ->where('status', '!=', 'suspended')
                      ->orderBy('departure_date', 'desc')
                      ->paginate(10, ['*'], 'past_page');

        // Récupérer les voyages suspendus
        $suspendedFlys = Fly::where('status', 'suspended')
                           ->orderBy('updated_at', 'desc')
                           ->paginate(10, ['*'], 'suspended_page');

        return view('admin.flys.index', compact('stats', 'upcomingFlys', 'pastFlys', 'suspendedFlys'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau voyage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Cette action n'est pas utilisée car le formulaire est dans une modal
        return redirect()->route('admin.flys.index');
    }

    /**
     * Enregistre un nouveau voyage dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'departure' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date|after:departure_date',
            'carrier' => 'required|string|max:255',
            'max_capacity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Création du voyage
        $fly = new Fly();
        $fly->departure = $validatedData['departure'];
        $fly->destination = $validatedData['destination'];
        $fly->departure_date = $validatedData['departure_date'];
        $fly->arrival_date = $validatedData['arrival_date'];
        $fly->carrier = $validatedData['carrier'];
        $fly->max_capacity = $validatedData['max_capacity'];
        $fly->notes = $validatedData['notes'] ?? null;
        $fly->status = 'pending'; // Par défaut, le voyage est en attente
        $fly->save();

        return redirect()->route('admin.flys.index')
                        ->with('success', 'Le voyage a été programmé avec succès.');
    }

    /**
     * Affiche les détails d'un voyage spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fly = Fly::findOrFail($id);
        $packages = Package::where('fly_id', $id)->paginate(15);

        return view('admin.flys.show', compact('fly', 'packages'));
    }

    /**
     * Affiche le formulaire de modification d'un voyage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Cette action n'est pas utilisée car le formulaire est dans une modal
        return redirect()->route('admin.flys.index');
    }

    /**
     * Met à jour un voyage spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $validatedData = $request->validate([
            'departure' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date|after:departure_date',
            'carrier' => 'required|string|max:255',
            'max_capacity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Mise à jour du voyage
        $fly = Fly::findOrFail($id);
        $fly->departure = $validatedData['departure'];
        $fly->destination = $validatedData['destination'];
        $fly->departure_date = $validatedData['departure_date'];
        $fly->arrival_date = $validatedData['arrival_date'];
        $fly->carrier = $validatedData['carrier'];
        $fly->max_capacity = $validatedData['max_capacity'];
        $fly->notes = $validatedData['notes'] ?? null;
        $fly->save();

        return redirect()->route('admin.flys.index')
                        ->with('success', 'Le voyage a été mis à jour avec succès.');
    }

    /**
     * Supprime un voyage spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // Vérifier si des colis sont associés à ce voyage
            $packagesCount = Package::where('fly_id', $id)->count();

            if ($packagesCount > 0) {
                return redirect()->route('admin.flys.index')
                                ->with('error', 'Impossible de supprimer ce voyage car des colis y sont associés.');
            }

            // Supprimer le voyage
            Fly::findOrFail($id)->delete();

            DB::commit();

            return redirect()->route('admin.flys.index')
                            ->with('success', 'Le voyage a été supprimé avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.flys.index')
                            ->with('error', 'Une erreur est survenue lors de la suppression du voyage: ' . $e->getMessage());
        }
    }

    /**
     * Suspend un voyage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function suspend(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Validation des données
            $validatedData = $request->validate([
                'reason' => 'required|string|max:500',
            ]);

            $fly = Fly::findOrFail($id);
            $fly->status = 'suspended';
            $fly->suspension_reason = $validatedData['reason'];
            $fly->save();

            // Libérer tous les colis associés à ce voyage
            Package::where('fly_id', $id)
                  ->update([
                      'fly_id' => null,
                      'status' => 'pending'
                  ]);

            DB::commit();

            return redirect()->route('admin.flys.index')
                            ->with('success', 'Le voyage a été suspendu avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.flys.index')
                            ->with('error', 'Une erreur est survenue lors de la suspension du voyage: ' . $e->getMessage());
        }
    }

    /**
     * Réactive un voyage suspendu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reactivate($id)
    {
        try {
            $fly = Fly::findOrFail($id);
            $fly->status = 'pending';
            $fly->suspension_reason = null;
            $fly->save();

            return redirect()->route('admin.flys.index')
                            ->with('success', 'Le voyage a été réactivé avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('admin.flys.index')
                            ->with('error', 'Une erreur est survenue lors de la réactivation du voyage: ' . $e->getMessage());
        }
    }

    /**
     * Affiche la page pour assigner des colis à un voyage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignPackagesForm($id)
    {
        // Cette action n'est pas utilisée car le formulaire est dans une modal
        return redirect()->route('admin.flys.index');
    }

    /**
     * Assigne des colis à un voyage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignPackages(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Validation des données
            $validatedData = $request->validate([
                'packages' => 'required|array',
                'packages.*' => 'exists:packages,id',
            ]);

            $fly = Fly::findOrFail($id);

            // Vérifier la capacité du voyage
            $currentPackagesCount = Package::where('fly_id', $id)->count();
            $newPackagesCount = count($validatedData['packages']);

            if (($currentPackagesCount + $newPackagesCount) > $fly->max_capacity) {
                return redirect()->route('admin.flys.index')
                                ->with('error', 'La capacité maximale du voyage serait dépassée.');
            }

            // Assigner les colis au voyage
            foreach ($validatedData['packages'] as $packageId) {
                $package = Package::findOrFail($packageId);
                $package->fly_id = $id;
                $package->status = 'assigned';
                $package->save();
            }

            DB::commit();

            return redirect()->route('admin.flys.index')
                            ->with('success', $newPackagesCount . ' colis ont été assignés au voyage.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.flys.index')
                            ->with('error', 'Une erreur est survenue lors de l\'assignation des colis: ' . $e->getMessage());
        }
    }

    /**
     * Retire un colis d'un voyage.
     *
     * @param  int  $flyId
     * @param  int  $packageId
     * @return \Illuminate\Http\Response
     */
    public function removePackage($flyId, $packageId)
    {
        try {
            $package = Package::findOrFail($packageId);

            // Vérifier que le colis est bien associé à ce voyage
            if ($package->fly_id != $flyId) {
                return redirect()->route('admin.flys.show', $flyId)
                                ->with('error', 'Ce colis n\'est pas associé à ce voyage.');
            }

            // Retirer le colis du voyage
            $package->fly_id = null;
            $package->status = 'pending';
            $package->save();

            return redirect()->route('admin.flys.show', $flyId)
                            ->with('success', 'Le colis a été retiré du voyage.');

        } catch (\Exception $e) {
            return redirect()->route('admin.flys.show', $flyId)
                            ->with('error', 'Une erreur est survenue lors du retrait du colis: ' . $e->getMessage());
        }
    }

    /**
     * Marque un voyage comme terminé et tous ses colis comme livrés.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        try {
            DB::beginTransaction();

            $fly = Fly::findOrFail($id);
            $fly->status = 'completed';
            $fly->save();

            // Marquer tous les colis associés comme livrés
            Package::where('fly_id', $id)
                  ->update([
                      'status' => 'delivered',
                      'delivery_date' => now()
                  ]);

            DB::commit();

            return redirect()->route('admin.flys.index')
                            ->with('success', 'Le voyage a été marqué comme terminé.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.flys.index')
                            ->with('error', 'Une erreur est survenue lors de la finalisation du voyage: ' . $e->getMessage());
        }
    }
}
