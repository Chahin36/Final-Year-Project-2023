<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class);
    }

    

    function StatusText(){
        switch ($this->status){
            case 0:
                return "En attente";
                break;
            case 1:
                return "Confirmé";
                break;
            case 2:
                return "Rejeté";
                break;
            default:
                return "";
        }

    }
}
