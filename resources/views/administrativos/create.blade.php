@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/create.blade.css') }}" rel="stylesheet">

    <div class="container">
    <div class="row">
        <div class="col-md-4 ml-3">
            <h2>Captura de Administrativo</h2>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('administrativos.store') }}" method="post" enctype="multipart/form-data">
                <div class="col">
                    @csrf
                    <br>
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="nombre">Nombre </label>
                            <input  type="text" class="box form-control" id="nombre" name="nombre"
                                   value="{{ old('nombre') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="puesto">Puesto </label>
                            <input type="text" class="box form-control" id="puesto" name="puesto"
                                   value="{{ old('puesto') }}">
                        </div>
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="direccion">Dirección </label>
                            <input type="text" class=" box form-control" id="direccion" name="direccion"
                                   value="{{ old('direccion') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="telefono">Telefono </label>
                            <input type="tel" class="box form-control" id="telefono" name="telefono"
                                   value="{{ old('telefono') }}">
                        </div>
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="email">Email </label>
                            <input type="email" class="box form-control" id="email" name="email"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="categoria">Categoria </label>
                            <select class="form-select" type="text" class="select" id="categoria" name="categoria">
                                   <option value="miemComite">Miembros de Comité</option>
                                   <option value="funcionarios">funcionarios</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="resenia">Reseña </label>
                            <input type="text" class="box form-control" id="resenia" name="resenia"
                                   value="{{ old('resenia') }}">
                        </div>
                        <br>
                        <div class="col-md-7">
                            <label class="font-weight-bold" for="file">Seleccione la IMAGEN o FOTOGRAFÍA que desea subir </label>
                            <input type="file" name="file"  id="chooseFile" accept="image/*">
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


@endsection
</main>
