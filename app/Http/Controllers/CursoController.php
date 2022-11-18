<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Profesor;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::latest()->paginate(5);
        $profesors = Profesor::all();

        return view('cursos.index', compact('cursos', 'profesors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $profesors = Profesor::all();

        return view('cursos.create', compact('profesors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'nivel' => 'required',
            'descripcion' => 'required',
        ]);

        Curso::create($request->all());

        $profesors = Profesor::all();
        return redirect()->route('cursos.index')
            ->with('success', 'Curso creado satisfactoriamente.');
    }

    public function show(Curso $curso)
    {
        $profesor = Profesor::find($curso->prof_id);
        return view('cursos.show', compact('curso', 'profesor'));
    }


    public function edit(Curso $curso)
    {
        $profesors = Profesor::all();
        return view('cursos.edit', compact('curso', 'profesors'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required',
            'nivel' => 'required',
            'descripcion' => 'required',
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado satisfactoriamente.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado satisfactoriamente.');
    }
}