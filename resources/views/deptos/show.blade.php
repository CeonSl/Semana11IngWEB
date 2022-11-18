@extends('layouts.plantilla')

@section('title','deptos show')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Departamento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('deptos.index') }}"> Volver</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombres:</strong>
                {{ $depto->nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Director:</strong>
                {{ $depto->director }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                {{ $depto->descripcion }}
            </div>
        </div>
    </div>
@endsection