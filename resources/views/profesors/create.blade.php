@extends('layouts.plantilla')

@section('title', 'profesors create')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agregar nuevo profesor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('profesors.index') }}"> Volver</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Whoops!</strong> Hay problemas con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profesors.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="form-group">
                <label for="">Departamento:</label>
                <select name="depto_id" id="" class="form-control">
                    @foreach ($deptos as $depto)
                        <option value="{{ $depto['id']}}">{{ $depto['nombre']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}"
                        placeholder="Nombres">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}"
                        placeholder="Dirección">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="number" name="telefono" class="form-control" value="{{ old('telefono') }}"
                        placeholder="Teléfono">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
@endsection
