@extends('layouts.plantilla')

@section('title', 'index')

@section('content')
    <div class="container p-2 text-center">
        <div class="row justify-content-center">
            <div class="card p-1 m-4" style="width:250px;">
                <img class="card-img-top p-4" src="img\departamento.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">Departamento</h4>
                    <a href="{{route('deptos.index')}}"  class="btn btn-primary">Gestionar</a>
                </div>
            </div>

            <div class="card p-1 m-4" style="width:250px">
                <img class="card-img-top p-4" src="img\curso-por-internet.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">Curso</h4>
                    <a href="{{route('cursos.index')}}" class="btn btn-primary">Gestionar</a>
                </div>
            </div>

            <div class="card p-1 m-4" style="width:250px">
                <img class="card-img-top p-4" src="img\profesor.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">Profesor</h4>
                    <a href="{{route('profesors.index')}}" class="btn btn-primary">Gestionar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
