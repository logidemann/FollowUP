<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
class PatientController extends Controller
{
    public function index(){
        $patients = Patient::all();
        return view('Patients/index', compact('patients'));
    }
    public function showForm(){
        $patients = Patient::all();
        return view('Patients/form', compact('patients'));
    }

    public function create(Request $request){
        $validated = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'dateNaissance' => 'required',
        ]);
        Patient::create($validated);
        return redirect("/patients");
    }

    public function delete($id){
        Patient::destroy($id);
        return redirect("/patients")->with('success', 'Patient supprimé avec succès.');
    }

    public function edit($id)
    {
        $patient = Patient::edit($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'dateNaissance' => 'required|date',
        ]);

        Patient::updatePatient($id, $validatedData);

        return redirect('/patients')->with('success', 'Les informations du patient ont été mises à jour avec succès.');
    }
}
