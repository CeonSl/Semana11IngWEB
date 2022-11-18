<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depto;

class DeptoController extends Controller
{
    public function index()
    {
        $deptos = Depto::latest()->paginate(5);

        return view('deptos.index', compact('deptos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('deptos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'director' => 'required',
            'descripcion' => 'required',
        ]);

        Depto::create($request->all());

        return redirect()->route('deptos.index')
        ->with('success', 'Departamento creado satisfactoriamente.');
    }

    public function show(Depto $depto)
    {
        return view('deptos.show', compact('depto'));
    }


    public function edit(Depto $depto)
    {
        return view('deptos.edit', compact('depto'));
    }

    public function update(Request $request, Depto $depto)
    {
        $request->validate([
            'nombre' => 'required',
            'director' => 'required',
            'descripcion' => 'required',
        ]);

        $depto->update($request->all());

        return redirect()->route('deptos.index')
            ->with('success', 'Departamento actualizado satisfactoriamente.');
    }

    public function destroy(Depto $depto)
    {
        $depto->delete();

        return redirect()->route('deptos.index')
            ->with('success', 'Departamento eliminado satisfactoriamente.');
    }
}
