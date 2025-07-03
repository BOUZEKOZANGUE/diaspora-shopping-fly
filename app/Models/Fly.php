<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fly extends Model
{
    use HasFactory;

    /**
     * Spécifier explicitement le nom de la table pour éviter
     * la pluralisation automatique de "fly" en "flies"
     */
    protected $table = 'flys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departure',
        'destination',
        'departure_date',
        'arrival_date',
        'carrier',
        'max_capacity',
        'status',
        'notes',
        'suspension_reason',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'departure_date' => 'datetime',
        'arrival_date' => 'datetime',
        'max_capacity' => 'integer',
    ];

    /**
     * Get the packages associated with this flight.
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    /**
     * Get the current number of packages assigned to this flight.
     */
    public function getCurrentCapacityAttribute()
    {
        return $this->packages()->count();
    }

    /**
     * Get the remaining capacity for this flight.
     */
    public function getRemainingCapacityAttribute()
    {
        return $this->max_capacity - $this->current_capacity;
    }

    /**
     * Get the capacity percentage for this flight.
     */
    public function getCapacityPercentageAttribute()
    {
        if ($this->max_capacity == 0) {
            return 0;
        }

        return round(($this->current_capacity / $this->max_capacity) * 100);
    }

    /**
     * Check if the flight is full.
     */
    public function getIsFullAttribute()
    {
        return $this->current_capacity >= $this->max_capacity;
    }

    /**
     * Scope a query to only include upcoming flights.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('departure_date', '>=', now())
                    ->where('status', '!=', 'suspended');
    }

    /**
     * Scope a query to only include past flights.
     */
    public function scopePast($query)
    {
        return $query->where('departure_date', '<', now())
                    ->where('status', '!=', 'suspended');
    }

    /**
     * Scope a query to only include suspended flights.
     */
    public function scopeSuspended($query)
    {
        return $query->where('status', 'suspended');
    }

    /**
     * Format the route for display.
     */
    public function getRouteDisplayAttribute()
    {
        return "{$this->departure} → {$this->destination}";
    }
}
