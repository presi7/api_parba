<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsMissionManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'Type_de_mission',
        'Etablissement',
        'Service',
        'Date_et_Horaire',
        'Profil_recherche',
        'Motif',
        'Remplacant',
        'Personne_remplacee',
    ];

    public function missionsManager()
    {
        return $this->belongsTo(MissionsManager::class);
    }
}
