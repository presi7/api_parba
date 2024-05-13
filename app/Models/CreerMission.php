<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreerMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'structure',
        'service',
        'debut',
        'fin',
        'heure_debut',
        'heure_fin',
        'profil',
        'motif',
        'nom_de_la_personne_a_remplacer',
        'prenom_de_la_personne_a_remplacer',
        'missions_manager_id', // Ajoutez la clé étrangère
    ];

    public function missionsManager()
    {
        return $this->belongsTo(MissionsManager::class, 'missions_manager_id');
    }
}
