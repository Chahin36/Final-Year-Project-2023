<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;
use App\Models\indicateur_performances;



class IndicateurPerformancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { //for équipe A
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>1,
            "equipes_id"=>1,
            "valeur"=>0,
            "coef"=>1
        ]);
    
    
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>1,
            "equipes_id"=>1,
            "valeur"=>70,
            "coef"=>1
        ]);
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>1,
            "equipes_id"=>1,
            "valeur"=>45,
            "coef"=>1
        ]);

        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>2,
            "equipes_id"=>1,
            "valeur"=>0,
            "coef"=>1
        ]);
    
    
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>2,
            "equipes_id"=>1,
            "valeur"=>65,
            "coef"=>1
        ]);
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>2,
            "equipes_id"=>1,
            "valeur"=>36,
            "coef"=>1
        ]);
        
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>3,
            "equipes_id"=>1,
            "valeur"=>0,
            "coef"=>1
        ]);
    
    
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>3,
            "equipes_id"=>1,
            "valeur"=>20,
            "coef"=>1
        ]);
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>3,
            "equipes_id"=>1,
            "valeur"=>55,
            "coef"=>1
        ]);
   
        






        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>1,
            "equipes_id"=>2,
            "valeur"=>0,
            "coef"=>1
        ]);
    
    
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>1,
            "equipes_id"=>2,
            "valeur"=>70,
            "coef"=>1
        ]);
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>1,
            "equipes_id"=>2,
            "valeur"=>45,
            "coef"=>1
        ]);

        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>2,
            "equipes_id"=>2,
            "valeur"=>0,
            "coef"=>1
        ]);
    
    
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>2,
            "equipes_id"=>2,
            "valeur"=>65,
            "coef"=>1
        ]);
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>2,
            "equipes_id"=>2,
            "valeur"=>36,
            "coef"=>1
        ]);
        
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>3,
            "equipes_id"=>2,
            "valeur"=>0,
            "coef"=>1
        ]);
    
    
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>3,
            "equipes_id"=>2,
            "valeur"=>20,
            "coef"=>1
        ]);
        indicateur_performances::create([
            "Competition_id"=>1,
            "indicateur_id"=>3,
            "equipes_id"=>2,
            "valeur"=>55,
            "coef"=>1
        ]);
    
}

}