<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'PATIENT';
    protected $fillable = ['nom', 'prenom','dateNaissance'];
}
