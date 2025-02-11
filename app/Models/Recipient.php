<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\Models\Recipients;

class Recipient extends Model
{
    protected $fillable = ['name', 'phone', 'package_id'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}


