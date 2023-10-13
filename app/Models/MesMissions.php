<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesMissions extends Model
{
    use HasFactory;

    protected $table = 'mes_missions'; // Nom de la table correspondant à ce modèle

    protected $fillable = [
        'Reference',
        'Date',
        'Debut',
        'Fin',
        'Structure',
        'Service',
        'Etat',

    ];

    public function voir()
    {
        return $this->hasMany(Voir::class, 'mission_id');
    }

}
