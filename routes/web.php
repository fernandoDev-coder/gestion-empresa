<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\EmpleadoController;

// Redirigir la página principal al listado de oficinas
Route::get('/', function () {
    return redirect()->route('oficinas.index');
});

// Rutas para las oficinas
Route::resource('oficinas', OficinaController::class);

// Rutas para los empleados dentro de cada oficina
// Asegurándonos de que las rutas sean específicas para la oficina
Route::prefix('oficinas/{oficina}')->group(function () {
    Route::resource('empleados', EmpleadoController::class)->except(['show']);
});

// Ruta para mostrar un empleado específico (si lo necesitas)
Route::get('empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');
