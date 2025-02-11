<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Flight extends Model
{
    protected $fillable = [
        'origin_country',
        'destination_country',
        'departure_date',
        'deadline',
        'status',
        'image'
    ];

    protected $dates = [
        'departure_date',
        'deadline'
    ];

    // Relation vers PackageFlight au lieu de Package directement
    public function packageFlights()
    {
        return $this->hasMany(PackageFlight::class);
    }

    // Relation many-to-many vers Package via PackageFlight
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_flights')
                    ->withPivot(['expected_delivery_date', 'delivered_at', 'satisfaction_rating'])
                    ->withTimestamps();
    }

    public function getDepartureStatus()
    {
        $daysUntil = now()->diffInDays($this->departure_date, false);
        return $daysUntil <= 2 ? 'Prochain vol' : 'Dans ' . $daysUntil . ' jours';
    }

    public function getStatusClass()
    {
        return $this->getDepartureStatus() === 'Prochain vol' ? 'green' : 'yellow';
    }
}
