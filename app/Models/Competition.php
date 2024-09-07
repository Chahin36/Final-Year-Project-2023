<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    public function equipeA(){
        $equipeA=equipes::where("competition_id",$this->id)->orderBy("id")->first();
        $equipes=Demande::where([["competition_id",$this->id],["equipes_id",$equipeA->id]])->get();
        return $equipes;
    }
    public function equipeB()
    {
        $equipeB = equipes::where("competition_id", $this->id)->orderBy("id", "desc")->first();
        $equipes = Demande::where([["competition_id", $this->id], ["equipes_id", $equipeB->id]])->get();
        return $equipes;
    }

    public function status(){
        $now = now();
        if ($now<$this->date_heure_debut_phase_1) {
            //en attente phase inscription
            return "En attente inscription";
        }elseif ($now<$this->date_heure_fin_phase_1) {
            //phase inscription
            return "Inscription";
        }elseif  ($now<$this->date_heure_debut_phase_2) {
            //en attente phase configuration
            return "En attente configuration";

        }elseif  ($now<$this->date_heure_fin_phase_2) {
            //en configuration
            return "Configuration";

        }elseif  ($now<$this->date_heure_debut_phase_3) {
            //en attente phase attaque
            return "En attente attaque";

        }elseif  ($now<$this->date_heure_fin_phase_3) {
            //en attente phase attaque
            return "Attaque";
        }else{
            //competition termine
            return "Terminé";

        }
    }

}
