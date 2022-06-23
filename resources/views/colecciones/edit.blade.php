@extends('layouts.app')
@section('content')

    <div class="container">
<div class="row">
    <div class="col-md-lg ml-3">
        <h2>Captura de Colecciones / Novedades</h2>
    </div>
    <hr>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{ route('colecciones.update',$coleccion->id ) }}" method="post" enctype="multipart/form-data">
            <div class="col">
                @method('PUT')
                @csrf

                <br>
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <label class="font-weight-bold" for="titulo">Titulo </label>
                        <input  type="text" class="box form-control" id="titulo" name="titulo"
                               value="{{ old('titulo') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold" for="anio">Año </label>
                        <input type="text" class="box form-control" id="anio" name="anio"
                               value="{{ old('telefono') }}">
                    </div>
                    <div class="col-md-10">
                        <label class="font-weight-bold" for="coordinadores">Coordinadores </label>
                        <input type="text" class="box form-control" id="coordinadores" name="coordinadores"
                               value="{{ old('coordinadores') }}">
                    </div>
                    <div class="col-md-10">
                        <label class="font-weight-bold" for="descripcion">Descripción </label>
                        <input type="text" class=" box form-control" id="descripcion" name="descripcion"
                               value="{{ old('descripcion') }}">
                    </div>
                    <div class="col-md-7">
                        <label class="font-weight-bold" for="tema">Tema </label>
                        <input type="text" class="box form-control" id="tema" name="tema"
                               value="{{ old('tema') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold" for="paginas">Páginas </label>
                        <input type="text" class="box form-control" id="paginas" name="paginas"
                               value="{{ old('paginas') }}">
                    </div>
                    <div class="col-md-7">
                        <label class="font-weight-bold" for="coleccion">Colección </label>
                        <input type="text" class="box form-control" id="coleccion" name="coleccion"
                               value="{{ old('coleccion') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold" for="isbn">ISBN </label>
                        <input type="text" class="box form-control" id="isbn" name="isbn"
                               value="{{ old('isbn') }}">
                    </div>
                    <div class="col-md-7">
                        <label class="font-weight-bold" for="novedad">Novedad </label>
                        <input type="text" class="box form-control" id="novedad" name="novedad"
                               value="{{ old('novedad') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold" for="categoria">Categoria </label>
                        <select class="form-select" type="text" class="select" id="categoria" name="categoria">
                               <option value="coleccion">Colección</option>
                               <option value="novedad">Novedad</option>
                        </select>
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
