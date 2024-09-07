<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\indicateur;

class IndicateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        indicateur::create([
            
            "libelle"=>"CPU",
            "coef"=>1,
            
        ]);
        indicateur::create([
            
            "libelle"=>"RAM",
            "coef"=>1,
            
        ]);
        indicateur::create([
            "libelle"=>"TRS",
            "coef"=>3,
            
        ]);
    }
}
