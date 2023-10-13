<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voir extends Model
{
    use HasFactory;
    protected $table = 'voir';

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

    // Définir la relation many-to-one vers la table "mesMissions"
    public function mesMissions()
    {
        return $this->belongsTo(MesMissions::class, 'mission_id');
    }

}
