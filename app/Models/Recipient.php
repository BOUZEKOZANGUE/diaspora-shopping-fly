<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipient extends Model
{
    protected $fillable = [
        'package_id',
        'name',
        'phone',
        'email',
        'address',
    ];

    /**
     * Get the package that owns the recipient.
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get formatted phone number for WhatsApp
     */
    public function getWhatsappPhoneAttribute(): string
    {
        // Supprimer tous les caractères non numériques
        $phone = preg_replace('/[^0-9]/', '', $this->phone);

        // Ajouter le + s'il n'est pas présent
        if (!str_starts_with($phone, '+')) {
            $phone = '+' . $phone;
        }

        return $phone;
    }

    /**
     * Get WhatsApp link
     */
    public function getWhatsappLinkAttribute(): string
    {
        $phone = preg_replace('/[^0-9]/', '', $this->phone);
        return "https://wa.me/{$phone}";
    }
}
