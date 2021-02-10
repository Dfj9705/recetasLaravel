@extends('layouts.app')
@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Crear nueva receta</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post" action="{{route('recetas.store')}}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo de la receta</label>
                    <input type="text"
                        name="titulo"
                        id="titulo"
                        class="form-control @error('titulo') is-invalid @enderror"
                        value="{{ old('titulo') }}"
                        placeholder="Titulo de la receta"
                    />
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select
                        name="categoria"
                        id="categoria"
                        class="form-control @error('categoria') is-invalid @enderror"
                    >
                        <option value="">Seleccione...</option>
                        @foreach($categorias as $id => $categoria)
                            <option
                                value="{{ $id }}"
                                {{old('categoria') == $id ? 'selected' : ''}}
                            >
                                {{ $categoria }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta"/>
                </div>
            </form>
        </div>
    </div>
@endsection
