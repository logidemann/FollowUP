<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/patients',[\App\Http\Controllers\PatientController::class,'index']);
//Route::get('/patients',[PatientController::class,'index'])->name('patients.show');

Route::get('/', function () {
    return view('welcome');


});
