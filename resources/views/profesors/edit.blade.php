@extends('layouts.plantilla')

@section('title', 'profesors edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Profesor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('profesors.index') }}"> Volver</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hay problemas con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('profesors.update',$profesor->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="form-group">
                <label for="">Departamento:</label>
                <select name="depto_id" id="" class="form-control">
                    @foreach ($deptos as $depto)
                        @if ($depto['id'] == $profesor->depto_id)
                        <option value="{{ $depto['id']}}" selected>{{ $depto['nombre']}}</option>
                        @else
                        <option value="{{ $depto['id']}}">{{ $depto['nombre']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="nombre" value="{{ $profesor->nombre }}" class="form-control" placeholder="Nombres">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <input type="text" name="direccion" value="{{ $profesor->direccion }}" class="form-control" placeholder="Dirección">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="number" name="telefono" value="{{ $profesor->telefono }}" class="form-control" placeholder="Teléfono">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection