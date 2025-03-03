<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    public function index()
    {
        // Obtener todas las oficinas
        $oficinas = Oficina::all();
        return view('oficinas.index', compact('oficinas'));
    }

    public function create()
    {
        // Mostrar el formulario para crear una oficina
        return view('oficinas.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|unique:oficinas',
        ]);

        // Crear una nueva oficina
        Oficina::create($request->all());

        // Redirigir al listado de oficinas
        return redirect()->route('oficinas.index');
    }

    // app/Http/Controllers/OficinaController.php
    public function show(Oficina $oficina)
    {
        // Obtener los empleados de la oficina
        $empleados = $oficina->empleados; // Esto obtiene todos los empleados relacionados con la oficina

        // Pasar la oficina y los empleados a la vista
        return view('oficinas.show', compact('oficina', 'empleados'));
    }


    public function edit(Oficina $oficina)
    {
        // Mostrar el formulario para editar una oficina
        return view('oficinas.edit', compact('oficina'));
    }

    public function update(Request $request, Oficina $oficina)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
        ]);

        // Actualizar los datos de la oficina
        $oficina->update($request->all());

        // Redirigir al listado de oficinas
        return redirect()->route('oficinas.index');
    }

    public function destroy(Oficina $oficina)
    {
        // Eliminar la oficina
        $oficina->delete();

        // Redirigir al listado de oficinas
        return redirect()->route('oficinas.index');
    }
}
