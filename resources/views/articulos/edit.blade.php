@extends('layouts.app')
@section('content')

    <div class="container">
<div class="row">
    <div class="col-md-lg ml-3">
        <h2>Captura de Articulo</h2>
    </div>
    <hr>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{ route('articulos.update',$articulo->id ) }}" method="post" enctype="multipart/form-data">
            <div class="col">
                @method('PUT')
                @csrf

                <br>
                <div class="row align-items-center">
                   <div class="col-md-7">
                       <label class="font-weight-bold" for="titulo">Titulo </label>
                       <input  type="text" class="box form-control" id="titulo" name="titulo"
                               value="{{ $articulo->titulo }}">
                   </div>
                   <div class="col-md-3">
                       <label class="font-weight-bold" for="categoria">Categoria </label>
                       <select class="form-select" type="text" class="select" id="categoria" name="categoria">
                           <option value="articulo">Articulo</option>
                           <option value="kiosko">Kiosko</option>
                       </select>
                   </div>
                   <div class="col-md-10">
                       <label class="font-weight-bold" for="descripcion">Descripción </label>
                       <input type="text" class="box form-control" id="descripcion" name="descripcion"
                              value="{{ $articulo->descripcion }}">
                   </div>
                   <div class="col-md-10">
                       <label class="font-weight-bold" for="etiquetas">Etiquetas </label>
                       <input type="text" class=" box form-control" id="etiquetas" name="etiquetas"
                              value="{{ $articulo->etiquetas }}">
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
