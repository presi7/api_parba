<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionDetail extends Model
{
    use HasFactory;

    protected $table = 'mission_details';

    protected $fillable = [
        'mission_id',
        'Type',
        'Etablissement',
        'Service',
        'Date Debut',
        'Date Fin',
        'Heure Debut',
        'Heure Fin',
        'Profil recherché',
        'Motif',
        'Remplacant',
        'Personne remplacée',
    ];

    // Définir la relation many-to-one vers la table "missions"
    public function mission()
    {
        return $this->belongsTo(Mission::class, 'mission_id');
    }
}
