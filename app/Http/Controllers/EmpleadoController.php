<?php
// app/Http/Controllers/EmpleadoController.php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Oficina;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar el listado de empleados de una oficina
    public function index(Oficina $oficina)
    {
        // Obtener los empleados de la oficina
        $empleados = $oficina->empleados;

        // Devolver la vista con los empleados de la oficina
        return view('empleados.index', compact('empleados', 'oficina'));
    }

    // Mostrar el formulario de creación de un nuevo empleado
    public function create(Oficina $oficina)
    {
        return view('empleados.create', compact('oficina'));
    }


    // Guardar un nuevo empleado en la base de datos
    public function store(Request $request, Oficina $oficina)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'rol' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'dni' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Crear el nuevo empleado y asignarle la oficina
        $empleado = new Empleado($validated);
        $empleado->oficina_id = $oficina->id;
        $empleado->save();

        // Redirigir al listado de empleados de la oficina recién creada
        return redirect()->route('oficinas.empleados.index', $oficina);
    }


    // Mostrar el formulario de edición de un empleado
    public function edit(Oficina $oficina, Empleado $empleado)
    {
        // Devolver la vista de edición con los datos del empleado y la oficina
        return view('empleados.edit', compact('empleado', 'oficina'));
    }

    // Actualizar los datos de un empleado
    public function update(Request $request, Oficina $oficina, Empleado $empleado)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:9|unique:empleados,dni,' . $empleado->id,
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
        ]);

        // Actualizar los datos del empleado
        $empleado->nombre = $request->nombre;
        $empleado->primer_apellido = $request->primer_apellido;
        $empleado->segundo_apellido = $request->segundo_apellido;
        $empleado->rol = $request->rol;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->dni = $request->dni;
        $empleado->email = $request->email;
        $empleado->save();

        // Redirigir al listado de empleados de la oficina
        return redirect()->route('oficinas.empleados.index', $oficina->id);
    }

    // Eliminar un empleado
    public function destroy(Oficina $oficina, Empleado $empleado)
    {
        // Eliminar el empleado
        $empleado->delete();

        // Redirigir al listado de empleados de la oficina
        return redirect()->route('oficinas.empleados.index', $oficina->id);
    }
}
