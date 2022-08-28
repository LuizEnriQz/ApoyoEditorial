@extends('layouts.app')
<link href="{{asset('css/myCardStyle.css')}}"
rel="stylesheet"
/>
@section('content')

@include('layouts.sub-menu')
<div class="container ">
    <h5>NOVEDADES / COLECCIONES</h5>
    <div class="row">
        @foreach($novedades as $nov)
        <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <img src="{{ '/editorial/storage/app/public/colecciones_portada/' . $nov->portada }}" alt="...">
                <div class="d-grid gap-2">

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalNovedad-{{$nov->id}}">Ver información....</button>
                    {{-- <iframe src="{{ '/editorial/storage/app/public/colecciones_pdfs/' . $nov->file }}" alt="..." width="100%" height="500px">
                    </iframe> --}}
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection

@section('modal')
{{-- Modal --}}
@foreach ($novedades as $nov)
    <div class="modal fade" id={{'modalNovedad-'.$nov->id}}>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <div class="img-border-rounded">
                        @if(storage_path('/administrativos_fotos/')->has($admin->file))
                            <img src={{'/editorial/storage/app/public/administrativos_fotos/'.$admin->file}}"/>
                        @endif
                    </div> --}}
                    <h1>{{$nov->titulo}}</h1><br>
                </div>
                <div class="modal-body">
                    <div class="informacionModal">
                        @if($nov->categoria)
                            <div class="modal-info--item">
                                <b>Categoria:</b> {{$nov->categoria}}
                            </div>
                        @endif
                        @if($nov->coordinadores)
                            <div class="modal-info--item">
                                <b>Coordinadores: </b> {{$nov->coordinadores}}
                            </div>
                        @endif
                        @if($nov->descripcion)
                            <div class="modal-info--item">
                                <b>Descripción</b> {{$nov->descripcion}}
                            </div>
                        @endif
                        @if($nov->anio)
                        <div class="modal-info--item">
                            <b>Año: </b>
                            {{$nov->anio}}
                        </div>
                        @endif
                        @if($nov->paginas)
                        <div class="modal-info--item">
                            <b>Páginas: </b>
                            {{$nov->paginas}}
                        </div>
                        @endif
                        @if($nov->isbn)
                        <div class="modal-info--item">
                            <b>ISBN: </b>
                            {{$nov->isbn}}
                        </div>
                        @endif
                        <a href="{{route('visitante.leerNovedad', [$nov->id, $nov->file ] )}}" class="btn btn-leer has-icon">
                        <i class='fas fa-book-open'></i>
                        Leer Documento</a>

                        <a href="{{route('visitante.descargarNovedad', [$nov->id, $nov->file ] )}}" class="btn btn-descargar has-icon">
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
