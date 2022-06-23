@extends('layouts.app')
@section('content')

    <div class="container">
<div class="row">
    <div class="col-md-4 ml-3">
        <h2>Captura de Noticia</h2>
    </div>
    <hr>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{ route('noticias.store') }}" method="post" enctype="multipart/form-data">
            <div class="col">
                {!! csrf_field() !!}

                <br>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="titulo">Titulo </label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                               value="{{ old('titulo') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="fecha">Fecha </label>
                        <input type="date" class="form-control" id="fecha" name="fecha"
                               value="{{ old('fecha') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="descripcion">Descripción </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                               value="{{ old('descripcion') }}">
                    </div>

                    <div class="col-md-4">
                        <br>
                        <label class="font-weight-bold" for="portada">Seleccione la IMAGEN de la noticia que desea subir </label>
                        <input type="file" name="file"  id="chooseFile" accept="image/*">
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
