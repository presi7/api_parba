<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionsManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'NumMission',
        'Date',
        'PourvueOuNon',
        'AnnuleOuNon',
        'Administrateur',
        'Remplacant',
        'Etablissement',
        'Service',
        'ChoixDuMetier',
        'JourNuit',
    ];

    // Relation avec CreerMission
    // public function creerUneMission()
    // {
    //     return $this->hasOne(CreerMission::class, 'missions_manager_id');
    // }

    // Relation avec DeclarerMission
    public function declarerUneMission()
    {
        return $this->hasOne(DeclarerMission::class, 'missions_manager_id');
    }

    public function detailsMissions()
    {
        return $this->hasMany(DetailsMissionManager::class, 'missions_manager_id');
    }
}
