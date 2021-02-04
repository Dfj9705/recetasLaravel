@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Crear nueva receta</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post">
                <div class="form-group">
                    <label for="titulo">Titulo de la receta</label>
                    <input type="text" name="titulo" id="titulo" class="form-control"placeholder="Titulo de la receta"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta"/>
                </div>
            </form>
        </div>
    </div>
@endsection
