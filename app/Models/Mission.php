<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = 'missions'; // Le nom de la table dans la base de données

    protected $fillable = [
        'NumMission',
        'Date',
        'Pourvue ou non',
        'Annulé ou non',
        'Administrateur',
        'Remplacant',
        'Etablissement',
        'Service',
        'Choix du metier',
        'Jour/Nuit',
    ];

    // Dans le modèle Mission.php
    public function missionDetails()
    {
        return $this->hasMany(MissionDetail::class);
    }

}
