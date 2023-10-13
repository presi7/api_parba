<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclarerMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'Etablissement',
        'Type',
        'Date_de_Debut',
        'Date_de_Fin',
        'Heure_de_debut',
        'Heure_de_Fin',
        'Profil_recherche',
        'Motif',
        'Remplacant_selectionne',
    ];

    public function missionsManager()
    {
        return $this->belongsTo(MissionsManager::class, 'missions_manager_id');
    }
}
