<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesAdmissions extends Model
{
    use HasFactory;

    protected $table = 'mes_admissions';

    protected $fillable = [
        'Structure',
        'Code',
        'Email',
    ];
}
