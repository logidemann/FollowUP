<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'PATIENT';
    public $timestamps = false;
    protected $fillable = ['nom', 'prenom','dateNaissance'];

    public function id(){
        return $this->attributes['id'];
    }
    public function nom(){
        return $this->attributes['nom'];
    }

    public function prenom(){
        return $this->attributes['prenom'];
    }

    public function dateNaissance(){
        return $this->attributes['dateNaissance'];
    }

    public function get_incidents(){
        return $this->HasMany(Incident::class, 'id_patient');
    }

    public static function edit($id)
    {
        return self::findOrFail($id);
    }

    public static function updatePatient($id, $data)
    {
        $patient = self::findOrFail($id);
        $patient->update($data);
        return $patient;
    }
}
