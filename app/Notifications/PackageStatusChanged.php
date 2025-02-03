<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Package;

class PackageStatusChanged extends Notification implements ShouldQueue
{
    use Queueable;

    public $package;

    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Statut de votre colis mis à jour')
            ->line('Le statut de votre colis ' . $this->package->tracking_number . ' a été mis à jour.')
            ->line('Nouveau statut: ' . $this->package->status)
            ->action('Voir les détails', route('tracking.show', $this->package->tracking_number));
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'package_id' => $this->package->id,
            'tracking_number' => $this->package->tracking_number,
            'status' => $this->package->status,
            'message' => 'Le statut de votre colis a été mis à jour'
        ];
    }
}
