@extends('layouts.app')
@section('content')
@include('layouts.sub-menu')
<div class="container">
   <div class="container">
    <h5>REVISTAS</h5>
       <div class="row">
            @foreach($revistas as $rev)
           <div class="col-md-3">
              <div class="card" style="width: 15rem;">
                <img src="{{ '/editorial/storage/app/public/revistas_portada/' . $rev->portada }}" alt="...">
                    <div class="d-grid gap-2">
                   <a href="{{route('visitante.leerRevista', [$rev->id, $rev->file ] )}}" class="btn btn-primary">Leer Documento</a>

                  <a href="{{route('visitante.descargarRevista', [$rev->id, $rev->file ] )}}" class="btn btn-info">Descargar Documento</a>
                   </div>
              </div>
           </div>
           @endforeach
       </div>
   </div>
</div>

@endsection
