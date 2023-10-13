<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreerMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'Type',
        'Structure',
        'Service',
        'Debut',
        'Fin',
        'Heure_de_Debut',
        'Heure_de_Fin',
        'Profil',
        'Motif',
        'Nom_de_la_personne_a_remplacer',
        'Prenom_de_la_personne_a_remplacer',

    ];

    public function missionsManager()
    {
        return $this->belongsTo(MissionsManager::class, 'missions_manager_id');
    }
}
