<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\equipes;
class EquipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipes::create([
            "competition_id"=>1
        ]);
        Equipes::create([
            "competition_id"=>1
            
        ]);
    }
}
