<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Barryvdh\DomPDF\Facade\Pdf;

class ColisConfirmation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $shipment;
    protected $pdfContent;

    public function __construct($shipment)
    {
        $this->shipment = $shipment;
        $this->generatePdf();
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmation de colis DSF Express #' . $this->shipment['package']['tracking'])
            ->greeting('Bonjour ' . $this->shipment['user']['name'] . ',')
            ->line('Votre colis a été enregistré avec succès.')
            ->line('Numéro de suivi: ' . $this->shipment['package']['tracking'])
            ->line('Prix: ' . number_format($this->shipment['package']['price'], 2) . ' €')
            ->line('Poids: ' . $this->shipment['package']['weight'] . ' kg')
            ->action('Suivre mon colis', url('/tracking/' . $this->shipment['package']['tracking']))
            ->line('Vous trouverez ci-joint le récapitulatif de votre expédition.')
            ->attachData($this->pdfContent, 'DSF-' . $this->shipment['package']['tracking'] . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }

    protected function generatePdf()
    {
        // Déterminer si c'est un nouvel utilisateur
        $isNewUser = isset($this->shipment['user']['password']);

        // Sélectionner le template approprié
        $view = $isNewUser ? 'admin.shipments.pdf.pdf-new-user' : 'admin.shipments.pdf.pdf-existing-user';

        $pdf = PDF::loadView($view, ['shipment' => $this->shipment]);
        $this->pdfContent = $pdf->output();
    }
}
