<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        
        $profesors = Profesor::latest()->paginate(5);
        $deptos = Depto::all();
        
        return view('profesors.index', compact('profesors','deptos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $deptos = Depto::all();

        return view('profesors.create',compact('deptos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        Profesor::create($request->all());

        $deptos = Depto::all();
        return redirect()->route('profesors.index')
            ->with('success', 'Profesor creado satisfactoriamente.');
    }

    public function show(Profesor $profesor)
    {
        $depto = Depto::find($profesor->depto_id);
        return view('profesors.show', compact('profesor','depto'));
    }


    public function edit(Profesor $profesor)
    {
        $deptos = Depto::all();
        return view('profesors.edit', compact('profesor','deptos'));
    }

    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $profesor->update($request->all());

        return redirect()->route('profesors.index')
            ->with('success', 'Departamento actualizado satisfactoriamente.');
    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();

        return redirect()->route('profesors.index')
            ->with('success', 'Profesor eliminado satisfactoriamente.');
    }
}
