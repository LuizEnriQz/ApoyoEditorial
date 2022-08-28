@extends('layouts.app')

@section('my_scripts')

    <script src="{{asset('js/revista/revistaCreate.js')}}"></script>

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7 ml-5">
            <h2>Captura una Publicación / Revista</h2>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('revistas.store') }}" method="post" enctype="multipart/form-data">
                <div class="col">
                    {!! csrf_field() !!}

                    <br>

                    <div class="row">

                        <div class="col-md-5 mx-auto mb-4">
                            <label class="font-weight-bold" for="categoria">Seleccione: </label>
                            <select class="form-select" type="text" class="select" id="categoria" name="categoria" onchange="selectChange()" >
                                   <option selected value="publicacion">Publicación</option>
                                   <option value="revista">Revista</option>
                            </select>
                        </div>

                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <label class="font-weight-bold" for="nombre">Nombre </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="font-weight-bold" for="anio">Año </label>
                            <input type="int" class="form-control" id="anio" name="anio" value="{{ old('anio') }}">
                        </div>
                        <div class="col-md-9" id="container_nombreRevista">
                            {{-- <label class="font-weight-bold" for="ensayo">Nombre del ensayo o más ensayos</label>
                            <input type="text" class="form-control" id="ensayo" name="ensayo" value="{{ old('ensayo') }}"> --}}
                        </div>
                        <div class="col-md-2" id="container_edicion">
                            {{-- <label class="font-weight-bold" for="edicion">Edición </label>
                            <input type="int" class="form-control" id="edicion" name="edicion" value="{{ old('edicion') }}"> --}}
                        </div>

                        <div class="col-md-8" id="container_autores">
                            {{-- <label class="font-weight-bold" for="autores">Autores </label>
                            <input type="text" class="form-control" id="autores" name="autores" value="{{ old('autores') }}"> --}}
                        </div>
                        <div class="col-md-3" id="container_issn">
                            {{-- <label class="font-weight-bold" for="descripcion">Descripción </label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}"> --}}
                        </div>
                    </div>
                    <br>
                    <div class="col-md-8">
                        <label class="font-weight-bold" for="file">Seleccione el PDF de la PUBLICACIÓN ó REVISTA que desea subir </label>
                        <input type="file" name="file" id="chooseFile" accept="application/pdf">
                    </div>
                    <br>
                    <div class="col-md-8">
                        <label class="font-weight-bold" for="portada">Seleccione la IMAGEN de la portada que desea subir </label>
                        <input type="file" name="portada" id="chooseFile" accept="image/*">
                    </div>
                    <br>
                    <div class="row align-items-center m-0">
                        <div class="col-md-6">
                            <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar datos <i class="ml-1 fas fa-save"></i></button>
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
