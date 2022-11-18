@extends('layouts.plantilla')

@section('title', 'cursos index')

@section('content')
    <div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listado de Cursos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cursos.create') }}"> Crear nuevo curso</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible mt-3 ">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Profesor</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Descripción</th>
            <th width="280px">Opciones</th>
        </tr>
        @foreach ($cursos as $curso)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $profesors->get('nombre', $profesors->find($curso->prof_id)->nombre) }}</td>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->nivel }}</td>
                <td>{{ $curso->descripcion }}</td>
                <td>
                    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('cursos.show', $curso->id) }}">Mostrar</a>

                        <a class="btn btn-primary" href="{{ route('cursos.edit', $curso->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <a class="btn btn-primary" href="/index">Volver</a>

    {!! $cursos->links() !!}

@endsection
