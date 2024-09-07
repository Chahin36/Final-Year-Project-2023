<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Competition;
use App\Models\indicateur;
use App\Models\equipes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('indicateur_performances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Competition::class);
            $table->foreignIdFor(indicateur::class);
            $table->foreignIdFor(equipes::class);
            $table->decimal('valeur',6,3);
            $table->tinyinteger("coef");
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicateur_performances');
    }
};
