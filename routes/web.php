<?php

use App\Http\Controllers\OficinaController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::resource('oficinas', OficinaController::class);
Route::resource('oficinas/{oficina}/empleados', EmpleadoController::class); // Correcta forma de anidar
