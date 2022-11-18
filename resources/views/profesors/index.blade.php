@extends('layouts.plantilla')

@section('title', 'profesors index')

@section('content')
    <div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listado de Profesores</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('profesors.create') }}"> Crear nuevo profesor</a>
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
            <th>Departamento</th>
            <th>Nombres</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th width="280px">Opciones</th>
        </tr>
        @foreach ($profesors as $profesor)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $deptos->get('nombre', ($deptos->find($profesor->depto_id))->nombre)}}</td>
                <td>{{ $profesor->nombre }}</td>
                <td>{{ $profesor->direccion }}</td>
                <td>{{ $profesor->telefono }}</td>
                <td>
                    <form action="{{ route('profesors.destroy', $profesor->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('profesors.show', $profesor->id) }}">Mostrar</a>

                        <a class="btn btn-primary" href="{{ route('profesors.edit', $profesor->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <a class="btn btn-primary" href="/index">Volver</a>

    {!! $profesors->links() !!}

@endsection
