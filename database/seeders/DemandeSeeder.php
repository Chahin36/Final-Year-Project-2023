<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Demande;
class DemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Demande::create([
            "User_id"=>2,
            "equipes_id"=>1,
            "competition_id"=>1,
            "status"=>0
        ]);
        Demande::create([
            "User_id"=>3,
            "equipes_id"=>1,
            "competition_id"=>1,
            "status"=>1
        ]);
        Demande::create([
            "User_id"=>4,
            "equipes_id"=>2,
            "competition_id"=>1,
            "status"=>2
        ]);
    }
}
