@extends('layouts.app')
<link href="{{asset('css/myCardStyle.css')}}"
rel="stylesheet"
/>
@section('content')
@include('layouts.sub-menu')
<div class="container">
    <div class="container">
        <h5>LIBROS</h5>
        <div class="row">
            @foreach($libros as $lib)
            <div class="col-md-3">
               <div class="card" style="width: 15rem;">
                 <img src="{{ str_replace("ApoyoEditorial/public/","ApoyoEditorial/",asset('/storage/app/public/libros_portada/' . $lib->portada))}}" alt="...">
                    <div class="d-grid gap-2">

                   <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLibro-{{$lib->id}}">Ver información....</button>

                    </div>
               </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('modal')
{{-- Modal --}}
@foreach ($libros as $lib)
    <div class="modal fade" id={{'modalLibro-'.$lib->id}}>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <div class="img-border-rounded">
                        @if(storage_path('/administrativos_fotos/')->has($admin->file))
                            <img src={{'/editorial/storage/app/public/administrativos_fotos/'.$admin->file}}"/>
                        @endif
                    </div> --}}
                    <h1>{{$lib->nombre}}</h1><br>
                </div>
                <div class="modal-body">
                    <div class="informacionModal">
                        @if($lib->descripcion)
                            <div class="modal-info--item">
                                <b>Descripción: </b> {{$lib->descripcion}}
                            </div>
                        @endif
                        @if($lib->autores)
                            <div class="modal-info--item">
                                <b>Autores:</b> {{$lib->autores}}
                            </div>
                        @endif
                        @if($lib->anio)
                        <div class="modal-info--item">
                            <b>Año: </b>
                            {{$lib->anio}}
                        </div>
                        @endif
                        {{-- @if($lib->paginas)
                        <div class="modal-info--item">
                            <b>Páginas: </b>
                            {{$lib->paginas}}
                        </div>
                        @endif --}}
                        @if($lib->isbn)
                        <div class="modal-info--item">
                            <b>ISBN: </b>
                            {{$lib->isbn}}
                        </div>
                        @endif
                        <a href="{{route('visitante.leerLibro', [$lib->id, $lib->file ] )}}" class="btn btn-leer has-icon">
                        <i class='fas fa-book-open'></i>
                        Leer Documento</a>

                         <a href="{{route('visitante.descargarLibro', [$lib->id, $lib->file ] )}}"  class="btn btn-descargar has-icon">
                         <i class='fas fa-download'></i>
                         Descargar Documento</a>
                    </div>

                </div>
                <div class="modal-footer">
                    <input class="btn btn-secondary" data-dismiss="modal" value="Cerrar">
                </div>
            </div>
        </div>

    </div>
@endforeach


@endsection
