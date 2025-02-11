<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'location',
        'text',
        'rating',
        'approved',
        'image' // Ajout du champ image pour la photo du client
    ];

    protected $casts = [
        'approved' => 'boolean',
        'rating' => 'integer'
    ];
}
