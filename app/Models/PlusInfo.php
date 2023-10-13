<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlusInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Structure',
        'Statut',
        'Matricule',
        'EtatProfil',
        'MetierEtCompetences',
        'AccepteJour',
        'AccepteNuit',
    ];
}
