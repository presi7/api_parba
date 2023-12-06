<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscriptionNouvelUser extends Model
{

    protected $table = 'inscription_nouvelusers';


    protected $fillable = ['Prenom', 'Nom', 'N° Telephone', 'Email', 'Code Structure', 'Mot de passe', 'Confirmer mot de passe'];

    protected $hidden = [];


    // Définissez la relation one-to-one vers "InscriptionRemplacant"
    public function inscriptionRemplacant()
    {
        return $this->hasOne(InscriptionRemplacant::class, 'nouveluser_id');
    }


}
