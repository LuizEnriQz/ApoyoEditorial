@extends('layouts.app')
@section('content')
@include('layouts.sub-menu')
<div class="container">
    <div class="container">
        <h5>LIBROS</h5>
        <div class="row">
            @foreach($libros as $lib)
            <div class="col-md-3">
               <div class="card" style="width: 15rem;">
                 <img src="{{ '/editorial/storage/app/public/libros_portada/' . $lib->portada }}" alt="...">
                    <div class="d-grid gap-2">
                   <a href="{{route('visitante.leerLibro', [$lib->id, $lib->file ] )}}" class="btn btn-primary">Leer Documento</a>

                   <a href="#" class="btn btn-info">Descargar Documento</a>
                    </div>
               </div>
            </div>
            @endforeach
        </div>
    </div>


</div>
@endsection
