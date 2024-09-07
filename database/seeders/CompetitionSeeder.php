<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;


class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::create([
            "id"=>1,
    "titre"=>"Combat des hackers",
    "cahier_de_charge"=>"https://drive.google.com/file/d/16FiCpUNOJ-zo6AXvfFud3KAoTXCM2wKv/view?usp=sharing",
    "date_heure_debut_phase_1"=>"2023-06-12",	
    "date_heure_fin_phase_1"=>"2023-06-12"	,
    "date_heure_debut_phase_2"=>"2023-06-12"	,
    "date_heure_fin_phase_2"=>"2023-06-12"	,
    "date_heure_debut_phase_3"=>"2023-06-12"	,
    "date_heure_fin_phase_3"=>"2023-06-12",
    "timeout"=>"00:00:03"

        

        ]);
    }
}
