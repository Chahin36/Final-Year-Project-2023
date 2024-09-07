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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('cahier_de_charge');
            $table->dateTime('date_heure_debut_phase_1');
            $table->dateTime('date_heure_fin_phase_1');
            $table->dateTime('date_heure_debut_phase_2');
            $table->dateTime('date_heure_fin_phase_2');
            $table->dateTime('date_heure_debut_phase_3');
            $table->dateTime('date_heure_fin_phase_3');
            $table->time('timeout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
