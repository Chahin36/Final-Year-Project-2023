<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indicateur_performances extends Model
{
    use HasFactory;
    protected $fillable = [
        'competition_id', // Add 'competition_id' to the fillable property
        'indicateur_id',
        "equipes_id",
        'valeur',
        'coef',
    ];    
}
