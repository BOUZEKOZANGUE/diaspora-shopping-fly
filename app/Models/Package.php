<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Tracking;
use App\Models\Recipient;

class Package extends Model
{
    protected $fillable = [
        'tracking_number',
        'user_id',
        'weight',
        'destination_address',
        'status',
        'price',
        'description_colis',
        'images',
        'videos',
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
        'price' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    /**
     * Get the trackings for the package.
     */
    public function trackings(): HasMany
    {
        return $this->hasMany(Tracking::class);
    }

    /**
     * Get the recipient that owns the package.
     */
    public function recipient(): HasOne
    {
        return $this->hasOne(Recipient::class);
    }

    /**
     * Get the user that owns the package.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get image URLs
     */
    public function getImageUrls(): array
    {
        if (!$this->images) {
            return [];
        }

        return array_map(function ($image) {
            return Storage::url($image);
        }, $this->images);
    }

    /**
     * Get video URLs
     */
    public function getVideoUrls(): array
    {
        if (!$this->videos) {
            return [];
        }

        return array_map(function ($video) {
            return Storage::url($video);
        }, $this->videos);
    }

    /**
     * Get formatted status
     */
    public function getFormattedStatusAttribute(): string
    {
        return match($this->status) {
            'registered' => 'Enregistré',
            'in_transit' => 'En transit',
            'delivered' => 'Livré',
            'cancelled' => 'Annulé',
            default => 'Inconnu'
        };
    }

    /**
     * Get status color for UI
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'registered' => 'blue',
            'in_transit' => 'yellow',
            'delivered' => 'green',
            'cancelled' => 'red',
            default => 'gray'
        };
    }

    /**
     * Check if package has media
     */
    public function hasMedia(): bool
    {
        return !empty($this->images) || !empty($this->videos);
    }

    /**
     * Get media count
     */
    public function getMediaCount(): array
    {
        return [
            'images' => count($this->images ?? []),
            'videos' => count($this->videos ?? []),
            'total' => count($this->images ?? []) + count($this->videos ?? [])
        ];
    }

    /**
     * Delete media files when package is deleted
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($package) {
            // Supprimer les images
            if ($package->images) {
                foreach ($package->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            // Supprimer les vidéos
            if ($package->videos) {
                foreach ($package->videos as $video) {
                    Storage::disk('public')->delete($video);
                }
            }

            // Supprimer le destinataire associé
            $package->recipient?->delete();
        });
    }

    /**
     * Scope pour filtrer par statut
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope pour la recherche
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('tracking_number', 'LIKE', "%{$search}%")
                ->orWhere('description_colis', 'LIKE', "%{$search}%")
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
}
