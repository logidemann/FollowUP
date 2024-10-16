<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientDetails
{
    public function showPage($id){
        $patient = Patient::find($id);
        $incidents = $patient->get_incidents;

        return view('Patients/details', compact('patient', 'incidents'));
    }
}
