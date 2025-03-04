<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    // Mostrar todas las oficinas
    public function index()
    {
        // Obtener todas las oficinas
        $oficinas = Oficina::all();
        // Pasar las oficinas a la vista
        return view('oficinas.index', compact('oficinas'));
    }

    // Mostrar el formulario para crear una nueva oficina
    public function create()
    {
        // Solo se muestra el formulario de creación, no se necesita pasar una oficina aquí
        return view('oficinas.create');
    }

    // Almacenar una nueva oficina en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de la oficina
        $request->validate([
            'nombre' => 'required|string|max:255', // Validación de nombre
        ]);

        // Crear una nueva oficina con los datos validados
        Oficina::create($request->all());

        // Redirigir a la lista de oficinas
        return redirect()->route('oficinas.index');
    }

    // Mostrar una oficina específica
    public function show(Oficina $oficina)
    {
        $empleados = $oficina->empleados;
        return view('oficinas.show', compact('oficina', 'empleados'));
    }


    // Mostrar el formulario para editar una oficina existente
    public function edit(Oficina $oficina)
    {
        // Pasar la oficina existente al formulario de edición
        return view('oficinas.edit', compact('oficina'));
    }

    // Actualizar una oficina específica en la base de datos
    public function update(Request $request, Oficina $oficina)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Actualizar los datos de la oficina
        $oficina->update($request->all());

        // Redirigir de nuevo a la lista de oficinas
        return redirect()->route('oficinas.index');
    }

    // Eliminar una oficina
    public function destroy(Oficina $oficina)
    {
        // Eliminar la oficina de la base de datos
        $oficina->delete();

        // Redirigir de nuevo a la lista de oficinas
        return redirect()->route('oficinas.index');
    }
}
