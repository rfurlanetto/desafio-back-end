<?php

use App\Http\Controllers\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pacientes/'], function () {
    Route::get('get/{id?}', [PacienteController::class, 'index']);
    Route::get('getAll', [PacienteController::class, 'index']);
    Route::post('savePaciente', [PacienteController::class, 'store']);
    Route::put('updatePaciente/{id}', [PacienteController::class, 'update']);
    Route::delete('deletePaciente/{id}', [PacienteController::class, 'destroy']);
});

