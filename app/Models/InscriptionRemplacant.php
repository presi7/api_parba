<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscriptionRemplacant extends Model
{
    protected $table = 'inscription_remplacants';

    protected $fillable = ['Structure', 'Statut', 'Metiers', 'Competences', 'Jour', 'Nuit', 'nouveluser_id'];

    // Définissez la relation one-to-one inverse vers "InscriptionNouvelUser"
    public function inscriptionNouvelUser()
    {
        return $this->belongsTo(InscriptionNouvelUser::class, 'nouveluser_id');
    }

    
}
