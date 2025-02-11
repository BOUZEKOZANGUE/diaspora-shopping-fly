<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Tracking;

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
   ];

   /**
    * Get the trackings for the package.
    */
    public function trackings(): HasMany
    {
        return $this->hasMany(Tracking::class);
    }

    // Get the recipient that owns the package.
    public function recipient()
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
}
