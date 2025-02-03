<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tracking extends Model
{
   protected $fillable = [
       'package_id',
       'status',
       'location',
       'description'
   ];

   public function package(): BelongsTo
   {
       return $this->belongsTo(Package::class);
   }
}
