@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection
@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 font-weight-bold text-uppercase">
        <svg class="icono" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
        </svg>
        Volver
    </a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Editar receta: {{ $receta->titulo }}</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post" action="{{route('recetas.update', ['receta' => $receta->id]) }}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo de la receta</label>
                    <input type="text"
                        name="titulo"
                        id="titulo"
                        class="form-control @error('titulo') is-invalid @enderror"
                        value="{{ $receta->titulo }}"
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
                        @foreach($categorias as $categoria)
                            <option
                                value="{{ $categoria->id }}"
                                {{ $receta->categoria_id == $categoria->id ? 'selected' : ''}}
                            >
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" name="preparacion" value="{{ $receta->preparacion }}" id="preparacion">
                    <trix-editor
                        input="preparacion"
                        class="form-control @error('preparacion') is-invalid @enderror"
                    >
                    </trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" value="{{ $receta->ingredientes }}" id="ingredientes">
                    <trix-editor
                        input="ingredientes"
                        class="form-control @error('ingredientes') is-invalid @enderror"
                    >
                    </trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="imagen">Elige la imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                    <div>
                        <p>Imagen Actual</p>
                        <img src="/storage/{{ $receta->imagen }}" style="width: 300px">
                    </div>

                    @error('imagen')
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection
