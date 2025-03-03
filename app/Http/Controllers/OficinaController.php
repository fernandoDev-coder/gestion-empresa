<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    public function index()
    {
        $oficinas = Oficina::all();
        return view('oficinas.index', compact('oficinas'));
    }

    public function create()
    {
        return view('oficinas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        Oficina::create($request->all());
        return redirect()->route('oficinas.index');
    }

    public function show(Oficina $oficina)
    {
        // Obtener todos los empleados de la oficina seleccionada
        $empleados = $oficina->empleados;

        // Pasar tanto la oficina como los empleados a la vista
        return view('empleados.index', compact('oficina', 'empleados'));
    }


    public function edit(Oficina $oficina)
    {
        return view('oficinas.edit', compact('oficina'));
    }

    public function update(Request $request, Oficina $oficina)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        $oficina->update($request->all());
        return redirect()->route('oficinas.index');
    }

    public function destroy(Oficina $oficina)
    {
        $oficina->delete();
        return redirect()->route('oficinas.index');
    }
}
