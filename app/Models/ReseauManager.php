<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReseauManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_de_la_personne_a_remplacer',
        'prenom_de_la_personne_a_remplacer',
        'service',
        'horaire',
        // 'image',
    ];
}
