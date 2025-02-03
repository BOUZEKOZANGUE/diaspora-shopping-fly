<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\Package;

class PackageConfirmation extends Mailable
{
    public $package;

    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    public function build()
    {
        return $this->markdown('emails.packages.confirmation')
            ->subject('Confirmation de votre expédition')
            ->with([
                'trackingNumber' => $this->package->tracking_number,
                'weight' => $this->package->weight,
                'price' => $this->package->price,
                'status' => $this->package->status
            ]);
    }
}
