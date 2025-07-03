<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flys', function (Blueprint $table) {
            $table->id();
            $table->string('departure');
            $table->string('destination');
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->string('carrier');
            $table->integer('max_capacity');
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'suspended'])->default('pending');
            $table->text('notes')->nullable();
            $table->text('suspension_reason')->nullable();
            $table->timestamps();
        });

        // Ajout de la colonne fly_id à la table packages si elle existe
        if (Schema::hasTable('packages')) {
            Schema::table('packages', function (Blueprint $table) {
                // Nous utilisons le nom correct de la table (flys, pas flies)
                $table->foreignId('fly_id')->nullable()->constrained('flys')->nullOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Supprimer la colonne fly_id de la table packages si elle existe
        if (Schema::hasTable('packages') && Schema::hasColumn('packages', 'fly_id')) {
            Schema::table('packages', function (Blueprint $table) {
                $table->dropForeign(['fly_id']);
                $table->dropColumn('fly_id');
            });
        }

        Schema::dropIfExists('flys');
    }
};
