<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('package_flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->foreignId('flight_id')->constrained()->onDelete('cascade');
            $table->datetime('expected_delivery_date')->nullable();
            $table->datetime('delivered_at')->nullable();
            $table->integer('satisfaction_rating')->nullable();
            $table->timestamps();

            // Index pour améliorer les performances des requêtes
            $table->index(['package_id', 'flight_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('package_flights');
    }
};
