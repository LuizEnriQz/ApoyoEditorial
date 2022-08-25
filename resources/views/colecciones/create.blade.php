@extends('layouts.app')

@section('content')
<main>
    <link href="{{ asset('css/create.blade.css') }}" rel="stylesheet">

    <div class="container">
    <div class="row">
        <div class="col-md-7 ml-3">
            <h2>Captura de Colección / Novedades</h2>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('colecciones.store') }}" method="post" enctype="multipart/form-data">
                <div class="col">
                    @csrf
                    <br>
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="titulo">Titulo </label>
                            <input  type="text" class="box form-control" id="titulo" name="titulo"
                                   value="{{ old('titulo') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="anio">Año </label>
                            <input type="text" class="box form-control" id="anio" name="anio"
                                   value="{{ old('telefono') }}" required>
                        </div>
                        <div class="col-md-10">
                            <label class="font-weight-bold" for="coordinadores">Coordinadores </label>
                            <input type="text" class="box form-control" id="coordinadores" name="coordinadores"
                                   value="{{ old('coordinadores') }}">
                        </div>
                        <div class="col-md-10">
                            <label class="font-weight-bold" for="descripcion">Descripción </label>
                            <input type="text" class=" box form-control" id="descripcion" name="descripcion"
                                   value="{{ old('descripcion') }}" required >
                        </div>
                        {{-- <div class="col-md-7">
                            <label class="font-weight-bold" for="tema">Tema </label>
                            <input type="text" class="box form-control" id="tema" name="tema"
                                   value="{{ old('tema') }}">
                        </div> --}}
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="paginas">Páginas </label>
                            <input type="text" class="box form-control" id="paginas" name="paginas"
                                   value="{{ old('paginas') }}" required>
                        </div>
                        {{-- <div class="col-md-7">
                            <label class="font-weight-bold" for="coleccion">Colección </label>
                            <input type="text" class="box form-control" id="coleccion" name="coleccion"
                                   value="{{ old('coleccion') }}">
                        </div> --}}
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="isbn">ISBN </label>
                            <input type="text" class="box form-control" id="isbn" name="isbn"
                                   value="{{ old('isbn') }}" required>
                        </div>
                        {{-- <div class="col-md-7">
                            <label class="font-weight-bold" for="novedad">Novedad </label>
                            <input type="text" class="box form-control" id="novedad" name="novedad"
                                   value="{{ old('novedad') }}">
                        </div> --}}
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="categoria">Categoria </label>
                            <select class="form-select" type="text" class="select" id="categoria" name="categoria">
                                   <option value="coleccion">Colección</option>
                                   <option value="novedad">Novedad</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="file">Seleccione el ARCHIVO PDF que desea subir </label>
                            <input type="file" name="file"  id="chooseFile" accept="application/pdf" required>
                        </div>
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="portada">Seleccione la PORTADA que desea subir </label>
                            <input type="file" name="portada"  id="chooseFile" accept="image/*" required>
                        </div>
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

</main>

@endsection
