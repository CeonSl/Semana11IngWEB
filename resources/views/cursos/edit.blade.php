@extends('layouts.plantilla')

@section('title', 'cursos edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Curso</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Volver</a>
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

    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group">
                <label for="">Profesor:</label>
                <select name="prof_id" id="" class="form-control">
                    @foreach ($profesors as $profesor)
                        @if ($profesor['id'] == $curso->prof_id)
                            <option value="{{ $profesor['id'] }}" selected>{{ $profesor['nombre'] }}</option>
                        @else
                            <option value="{{ $profesor['id'] }}">{{ $profesor['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="nombre" value="{{ $curso->nombre }}" class="form-control"
                        placeholder="Nombres">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nivel:</strong>
                    <input type="text" name="nivel" value="{{ $curso->nivel }}" class="form-control"
                        placeholder="Nivel">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción">{{ $curso->descripcion }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
