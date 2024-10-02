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
}
