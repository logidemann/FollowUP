<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function showForm(){
        $patients = Patient::all();
        return view('Incidents/form', compact('patients'));
    }

    public function add(Request $request){
        $incident = new Incident();
        Incident::add($request, $incident);
        return redirect('/');
    }

    // Afficher le formulaire de modification d'un incident
    public function edit($id) {
        $incident = Incident::findOrFail($id);
        return view('Incidents/edit', compact('incident'));
    }

    // Mettre à jour l'incident
    public function update(Request $request, $id) {
        $incident = Incident::findOrFail($id);
        $incident->description = $request->input('description');
        $incident->niveau_gravite = $request->input('niveau_gravite');
        $incident->date = $request->input('date');
        $incident->save();

        return redirect('/patients_details/'.$incident->id_patient)->with('success', 'Incident mis à jour avec succès.');
    }

    // Supprimer un incident
    public function delete($id) {
        Incident::destroy($id);
        return redirect()->back()->with('success', 'Incident supprimé avec succès.');
    }
}
