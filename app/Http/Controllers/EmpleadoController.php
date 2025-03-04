<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Oficina;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar lista de empleados de una oficina
    public function index(Oficina $oficina)
    {
        $empleados = $oficina->empleados; // Obtiene los empleados asociados a la oficina
        return view('empleados.index', compact('oficina', 'empleados')); // Pasa los datos a la vista
    }

    // Mostrar el formulario para agregar un empleado
    public function create(Oficina $oficina)
    {
        return view('empleados.create', compact('oficina')); // Pasa la oficina a la vista de creación
    }

    // Almacenar el nuevo empleado en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_primero' => 'required|string|max:255',
            'apellido_segundo' => 'nullable|string|max:255',
            'rol' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'dni' => 'required|unique:empleados,dni',
            'email' => 'required|email|unique:empleados,email',
            'oficina_id' => 'required|exists:oficinas,id', // Asegura que la oficina_id sea válida
        ]);

        // Crear el nuevo empleado asociando la oficina
        Empleado::create($validated);  // Usamos los datos validados para crear el empleado

        // Redirigir a la lista de empleados de la oficina
        return redirect()->route('oficinas.show', ['oficina' => $request->oficina_id]);
    }
    public function edit(Empleado $empleado)
    {
        // Pasamos el empleado a la vista de edición
        return view('empleados.edit', compact('empleado'));
    }
    public function update(Request $request, Empleado $empleado)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_primero' => 'required|string|max:255',
            'apellido_segundo' => 'nullable|string|max:255',
            'rol' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'dni' => 'required|unique:empleados,dni,' . $empleado->id,
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
        ]);

        // Actualizar los datos del empleado
        $empleado->update($request->all());

        // Redirigir al listado de empleados de la oficina
        return redirect()->route('oficinas.show', ['oficina' => $empleado->oficina_id])
            ->with('success', 'Empleado actualizado correctamente.');
    }
}
