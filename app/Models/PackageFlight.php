<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageFlight extends Model
{
    protected $fillable = [
        'package_id',
        'flight_id',
        'expected_delivery_date',
        'delivered_at',
        'satisfaction_rating'
    ];

    protected $dates = [
        'expected_delivery_date',
        'delivered_at'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
