<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('packages', function (Blueprint $table) {
           $table->id();
           $table->string('tracking_number')->unique();
           $table->foreignId('user_id')->constrained();
           $table->decimal('weight', 8, 2);
           $table->text('destination_address');
           $table->enum('status', ['registered', 'in_transit', 'delivered']);
           $table->decimal('price', 10, 2);
           $table->text('description_colis');
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
