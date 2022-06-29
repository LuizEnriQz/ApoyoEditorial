@extends('layouts.app')
@section('content')

@include('layouts.sub-menu')
<div class="container ">
    <h5>NOVEDADES</h5>
    <div class="row">
        @foreach($novedades as $nov)
        <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <img src="{{ '/editorial/storage/app/public/colecciones_portada/' . $nov->portada }}" alt="...">
                <div class="d-grid gap-2">
                    <a href="{{route('visitante.leerNovedad', [$nov->id, $nov->file ] )}}" class="btn btn-primary">Leer Documento</a>

                    <a href="{{route('visitante.descargarNovedad', [$nov->id, $nov->file ] )}}">Descargar Documento</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
