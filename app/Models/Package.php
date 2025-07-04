<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
     * Get image URLs - MÉTHODE CORRIGÉE
     */
    public function getImageUrls(): array
    {
        if (!$this->images || empty($this->images)) {
            return [];
        }

        $imageUrls = [];
        foreach ($this->images as $imagePath) {
            // Méthode 1: Essayer avec Storage::url() (préférable)
            $url = Storage::url($imagePath);

            // Méthode 2: Si le lien symbolique ne fonctionne pas, construire l'URL manuellement
            if (!$this->urlExists($url)) {
                $url = asset('storage/' . $imagePath);

                // Méthode 3: En dernier recours, utiliser une route dédiée
                if (!$this->urlExists($url)) {
                    $url = route('package.media', [
                        'package' => $this->id,
                        'type' => 'image',
                        'index' => array_search($imagePath, $this->images)
                    ]);
                }
            }

            $imageUrls[] = $url;
        }

        return $imageUrls;
    }

    /**
     * Get video URLs - MÉTHODE CORRIGÉE
     */
    public function getVideoUrls(): array
    {
        if (!$this->videos || empty($this->videos)) {
            return [];
        }

        $videoUrls = [];
        foreach ($this->videos as $videoPath) {
            // Méthode 1: Essayer avec Storage::url() (préférable)
            $url = Storage::url($videoPath);

            // Méthode 2: Si le lien symbolique ne fonctionne pas, construire l'URL manuellement
            if (!$this->urlExists($url)) {
                $url = asset('storage/' . $videoPath);

                // Méthode 3: En dernier recours, utiliser une route dédiée
                if (!$this->urlExists($url)) {
                    $url = route('package.media', [
                        'package' => $this->id,
                        'type' => 'video',
                        'index' => array_search($videoPath, $this->videos)
                    ]);
                }
            }

            $videoUrls[] = $url;
        }

        return $videoUrls;
    }

    /**
     * Vérifier si une URL existe (méthode simple)
     */
    private function urlExists($url): bool
    {
        // Convertir l'URL en chemin de fichier
        $path = str_replace(asset('storage/'), '', $url);
        $fullPath = storage_path('app/public/' . $path);

        return File::exists($fullPath);
    }

    /**
     * Get the first image URL for thumbnail
     */
    public function getFirstImageUrl(): ?string
    {
        $imageUrls = $this->getImageUrls();
        return !empty($imageUrls) ? $imageUrls[0] : null;
    }

    /**
     * Get the first video URL
     */
    public function getFirstVideoUrl(): ?string
    {
        $videoUrls = $this->getVideoUrls();
        return !empty($videoUrls) ? $videoUrls[0] : null;
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
