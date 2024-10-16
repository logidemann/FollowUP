<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Incident extends Model
{
    protected $table = 'INCIDENT';
    public $timestamps = false;
    protected $fillable = ['id_patient','description', 'niveau_gravite', 'date'];

    public static function add(Request $request, Incident $incident){
        $description = $request->input('description');
        $niveau_gravite = $request->input('niveau_gravite');
        $date = $request->input('date');
        $id_patient = $request->input('id_patient');

        $incident->description = $description;
        $incident->id_patient = $id_patient;
        $incident->niveau_gravite = $niveau_gravite;
        $incident->date = $date;
        $incident->save();
    }



}
