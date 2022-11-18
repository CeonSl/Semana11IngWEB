@extends('layouts.plantilla')

@section('title','deptos create')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo departamento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('deptos.index') }}"> Volver</a>
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
   
<form action="{{ route('deptos.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombres:</strong>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombres">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Director:</strong>
                <input type="text" name="director" class="form-control" value="{{old('director')}}" placeholder="Director">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción</strong>
                <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción">{{ old('descripcion') }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
</form>
@endsection