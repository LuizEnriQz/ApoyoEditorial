@extends('layouts.app')

@section('content')
    <div class="container">
<div class="row">
    <div class="col-md-auto ml-3">
        <h2>Captura de Libro</h2>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ route('libros.update',$libro->id ) }}" method="post" enctype="multipart/form-data">
            <div class="col">
                @method('PUT')
                @csrf

                <br>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="nombre">Nombre </label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               value="{{ $libro->nombre }}">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold" for="isbn">ISBN </label>
                        <input type="text" class="box form-control" id="isbn" name="isbn"
                               value="{{ $libro->isbn}}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="autores">Autores </label>
                        <input type="text" class="form-control" id="autores" name="autores"
                               value="{{ $libro->autores }}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="anio">Año </label>
                        <input type="int" class="form-control" id="anio" name="anio"
                               value="{{ $libro->anio }}">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold" for="descripcion">Descripción </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                               value="{{ $libro->descripcion }}">
                    </div>
                    <div class="col-md-7">
                        <label class="font-weight-bold" for="file">Seleccione el libro PDF que desea subir </label>
                        <input type="file" name="file" id="chooseFile" accept="application/pdf">
                    </div>
                    <br>
                    <div class="col-md-7">
                        <label class="font-weight-bold" for="portada">Seleccione la IMAGEN de la portada que desea subir </label>
                        <input type="file" name="portada" id="chooseFile" accept="image/*">
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
