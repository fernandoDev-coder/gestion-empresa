<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar empleados de una oficina
    public function index(Oficina $oficina)
    {
        $empleados = $oficina->empleados; // Relación de empleados de la oficina
        return view('empleados.index', compact('oficina', 'empleados'));
    }

    // Mostrar el formulario de creación de un empleado
    public function create(Oficina $oficina)
    {
        return view('empleados.create', compact('oficina'));
    }

    // Almacenar un nuevo empleado
    public function store(Request $request, Oficina $oficina)
    {
        // Validación
        $request->validate([
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'dni' => 'required|unique:empleados',
            'email' => 'required|email|unique:empleados',
        ]);

        // Crear el empleado
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->primer_apellido = $request->primer_apellido;
        $empleado->segundo_apellido = $request->segundo_apellido;
        $empleado->rol = $request->rol;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->dni = $request->dni;
        $empleado->email = $request->email;
        $empleado->oficina_id = $oficina->id;  // Relacionamos al empleado con la oficina
        $empleado->save();

        // Redirigir a la lista de empleados de esa oficina
        return redirect()->route('oficinas.empleados.index', $oficina);
    }



    // Mostrar el formulario para editar un empleado
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    // Actualizar un empleado
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'dni' => 'required|unique:empleados,dni,' . $empleado->id,
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
        ]);

        $empleado->update($request->all());
        return redirect()->route('oficinas.empleados.index', $empleado->oficina_id);
    }

    // Eliminar un empleado
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('oficinas.empleados.index', $empleado->oficina_id);
    }
}
