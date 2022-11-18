@extends('layouts.plantilla')

@section('title', 'profesors show')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Profesor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('profesors.index') }}"> Volver</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departamento:</strong>
                {{ $depto->nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombres:</strong>
                {{ $profesor->nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dirección:</strong>
                {{ $profesor->direccion}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Teléfono:</strong>
                {{ $profesor->telefono }}
            </div>
        </div>
    </div>
@endsection