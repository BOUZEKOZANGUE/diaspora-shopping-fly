<?php

namespace App\Services;

use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\PackageStatusChanged;

class PackageService
{
    public function createPackageWithUser(array $data): Package
    {
        return DB::transaction(function () use ($data) {
            // Créer l'utilisateur
            $user = $this->createUser($data);

            // Créer le colis
            $package = $this->createPackage($user, $data);

            // Créer le tracking initial
            $this->createInitialTracking($package);

            return $package;
        });
    }

    private function createUser(array $data): User
    {
        $baseEmail = 'dsf@dsf.com';
        $uniqueEmail = $this->generateUniqueEmail($baseEmail);

        return User::create([
            'name' => $data['name'],
            'email' => $uniqueEmail,
            'phone' => $data['sender_whatsapp'] ?? null,
            'whatsapp' => $data['sender_whatsapp'],
            'password' => Hash::make('dsfpassword12'),
            'is_admin' => false,
        ]);
    }

    private function createPackage(User $user, array $data): Package
    {
        // Construire l'adresse complète si nécessaire
        $destination_address = $data['destination_address'] ?? sprintf(
            "%s, %s, %s",
            $data['street'],
            $data['city'],
            $data['country']
        );

        return $user->packages()->create([
            'tracking_number' => $this->generateTrackingNumber(),
            'weight' => $data['weight'],
            'destination_address' => $destination_address,
            'price' => $data['price'],
            'description_colis' => $data['description_colis'],
            'recipient_name' => $data['recipient_name'],
            'recipient_whatsapp' => $data['recipient_whatsapp'],
            'country' => $data['country'],
            'city' => $data['city'],
            'street' => $data['street'],
            'status' => 'registered'
        ]);
    }

    private function createInitialTracking(Package $package): void
    {
        $package->trackings()->create([
            'status' => 'registered',
            'notes' => 'Colis enregistré',
            'location' => 'Centre de tri ' . $package->city
        ]);
    }

    private function generateUniqueEmail(string $baseEmail): string
    {
        $email = $baseEmail;
        $counter = 1;

        while (User::where('email', $email)->exists()) {
            $parts = explode('@', $baseEmail);
            $email = $parts[0] . $counter . '@' . $parts[1];
            $counter++;
        }

        return $email;
    }

    private function generateTrackingNumber(): string
    {
        do {
            $number = 'DSF-' . strtoupper(Str::random(8));
        } while (Package::where('tracking_number', $number)->exists());

        return $number;
    }

    public function updatePackage(Package $package, array $data): void
    {
        DB::transaction(function () use ($package, $data) {
            // Mise à jour du statut
            $oldStatus = $package->status;
            $package->update([
                'status' => $data['status']
            ]);

            // Création d'une entrée de tracking si le statut a changé ou si des notes sont fournies
            if ($oldStatus !== $data['status'] || !empty($data['tracking_notes'])) {
                $package->trackings()->create([
                    'status' => $data['status'],
                    'notes' => $data['tracking_notes'] ?? 'Mise à jour du statut',
                    'location' => $data['location'] ?? $package->city
                ]);

                // Notification du changement
                if ($package->user) {
                    $package->user->notify(new PackageStatusChanged($package));
                }
            }
        });
    }

    public function updatePackageStatus(Package $package, string $status): void
    {
        $this->updatePackage($package, [
            'status' => $status,
            'tracking_notes' => 'Statut mis à jour automatiquement'
        ]);
    }

    public function addTracking(Package $package, array $data): void
    {
        DB::transaction(function () use ($package, $data) {
            $package->trackings()->create([
                'status' => $data['status'],
                'notes' => $data['notes'],
                'location' => $data['location']
            ]);

            // Mise à jour du statut du colis si nécessaire
            if ($package->status !== $data['status']) {
                $package->update(['status' => $data['status']]);

                // Notification du changement
                if ($package->user) {
                    $package->user->notify(new PackageStatusChanged($package));
                }
            }
        });
    }

    public function deletePackage(Package $package): void
    {
        DB::transaction(function () use ($package) {
            // Suppression dans l'ordre pour respecter les contraintes de clé étrangère
            $package->trackings()->delete();
            $package->delete();
        });
    }
}
