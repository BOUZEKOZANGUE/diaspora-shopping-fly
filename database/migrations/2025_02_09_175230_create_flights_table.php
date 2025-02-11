<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('origin_country');
            $table->string('destination_country');
            $table->dateTime('departure_date');
            $table->dateTime('deadline');
            $table->string('status')->default('scheduled');
            $table->string('image')->nullable();
            $table->timestamps();

            // Index pour optimiser les recherches
            $table->index('departure_date');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
