<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/patients',[\App\Http\Controllers\PatientController::class,'index']);
Route::get('/patients_form',[\App\Http\Controllers\PatientController::class,'showForm']);
Route::post('patients',[\App\Http\Controllers\PatientController::class,'create'])->name('patients.create');
Route::get('/patients_details/{id}',[\App\Http\Controllers\PatientDetails::class,'showPage']);
Route::delete('/patients/{id}', [PatientController::class, 'delete'])->name('patients.delete');
Route::get('/incidents_form',[\App\Http\Controllers\IncidentController::class,'showForm']);
Route::post('incidents',[\App\Http\Controllers\IncidentController::class,'add'])->name('incidents.add');
Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::post('/patients/{id}/update', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/incidents/{id}', [\App\Http\Controllers\IncidentController::class, 'delete'])->name('incidents.delete');
Route::get('/incidents/{id}/edit', [\App\Http\Controllers\IncidentController::class, 'edit'])->name('incidents.edit');
Route::post('/incidents/{id}', [\App\Http\Controllers\IncidentController::class, 'update'])->name('incidents.update');

Route::get('/', function () {
    return view('welcome');
});
