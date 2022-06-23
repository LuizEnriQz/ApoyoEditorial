@extends('layouts.app')
@section('content')

    <div class="container">
<div class="row">
    <div class="col-md-auto ml-3">
        <h2>Captura de una Noticia</h2>
    </div>
    <hr>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{ route('noticias.update',$noticia->id ) }}" method="post" enctype="multipart/form-data">
            <div class="col">
                @method('PUT')
                @csrf

                <br>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="titulo">Titulo </label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                               value="{{ $noticia->titulo }}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="fecha">Fecha </label>
                        <input type="date" class="form-control" id=fecha name="fecha"
                               value="{{ $noticia->fecha }}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="descripcion">Descripción </label>
                        <input type="text" class="form-control" id="descripcion" name="cuerpo"
                               value="{{ $noticia->cuerpo }}">
                    </div>
                    <br>
                </div>
                <br>
                <div class="row align-items-center m-0">
                    <div class="col-md-6">
                        <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar datos <i
                                class="ml-1 fas fa-save"></i></button>
                    </div>
                </div>
        </form>
    </div>
</div>
<br>
<div class="row align-items-center">
    <br>
    <div class="col-12 ml-3">
        <h5>En caso de inconsistencias, favor de reportarlas.</h5>
    </div>
    <hr>
</div>
    </div>

@endsection
