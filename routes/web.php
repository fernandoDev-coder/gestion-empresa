<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\EmpleadoController;

// Ruta raíz (puedes personalizarla o dejarla como está)
Route::redirect('/', '/oficinas');


// Rutas de Oficinas
Route::resource('oficinas', OficinaController::class);

// Rutas de Empleados - EXCEPTO 'index' y 'show' porque se manejan con un parámetro 'oficina'
Route::resource('empleados', EmpleadoController::class)->except(['index', 'show']);

// Ruta para la lista de empleados asociada a una oficina
Route::get('oficinas/{oficina}/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');

// Ruta para la vista de crear empleado asociada a una oficina
Route::get('oficinas/{oficina}/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
// Ruta para mostrar una oficina específica
Route::get('oficinas/{oficina}', [OficinaController::class, 'show'])->name('oficinas.show');
