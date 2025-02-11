<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->text('text');
            $table->integer('rating');
            $table->boolean('approved')->default(false);
            $table->string('image')->nullable();
            $table->timestamps();

            // Index pour faciliter le filtrage des témoignages approuvés
            $table->index('approved');
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
