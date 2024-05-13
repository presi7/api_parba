<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscriptionNouvelUser extends Model
{
    protected $table = 'inscription_nouvelusers';

    protected $fillable = ['Prenom', 'Nom', 'N° Telephone', 'Email', 'Code Structure', 'Mot de passe', 'Confirmer mot de passe'];

    protected $hidden = [];

    const PASSWORD = 'Mot de passe'; // Assurez-vous que cette valeur correspond exactement au nom de la colonne

    // Définissez la relation one-to-one vers "InscriptionRemplacant"
    public function inscriptionRemplacant()
    {
        return $this->hasOne(InscriptionRemplacant::class, 'nouveluser_id');
    }
}
