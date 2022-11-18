@extends('layouts.plantilla')

@section('title','deptos index')
 
@section('content')

    <div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listado de departamentos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('deptos.create') }}"> Crear nuevo departamento</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-dismissible mt-3 ">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <p>{{ $message }}</p> 
        </div>
    @endif
   
    <table class="table table-bordered mt-3" >
        <tr>
            <th>No</th>
            <th>Nombres</th>
            <th>Director</th>
            <th>Descripción</th>
            <th width="260px">Opciones</th>
        </tr>
        @foreach ($deptos as $depto)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $depto->nombre }}</td>
            <td>{{ $depto->director}}</td>
            <td>{{ $depto->descripcion }}</td>
            <td>
                <form action="{{ route('deptos.destroy',$depto->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('deptos.show',$depto->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('deptos.edit',$depto->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
        <a class="btn btn-primary" href="/index">Volver</a>
    {!! $deptos->links() !!}
      
@endsection