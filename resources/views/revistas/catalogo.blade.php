@extends('layouts.app')
<link href="{{asset('css/myCardStyle.css')}}"
rel="stylesheet"
/>
@section('content')
@include('layouts.sub-menu')
<div class="container">
   <div class="container">
    <h5>PUBLICACIONES / REVISTAS</h5>
       <div class="row">
            @foreach($revistas as $rev)
           <div class="col-md-3">
              <div class="card" style="width: 15rem;">
                <img src="{{ '/editorial/storage/app/public/revistas_portada/' . $rev->portada }}" alt="...">
                    <div class="d-grid gap-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalLibro-{{$rev->id}}">Ver información....</button>

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
@foreach ($revistas as $rev)
    <div class="modal fade" id={{'modalLibro-'.$rev->id}}>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <div class="img-border-rounded">
                        @if(storage_path('/administrativos_fotos/')->has($admin->file))
                            <img src={{'/editorial/storage/app/public/administrativos_fotos/'.$admin->file}}"/>
                        @endif
                    </div> --}}
                    <h1>{{$rev->nombre}}</h1><br>
                </div>
                <div class="modal-body">
                    <div class="informacionModal">
                        @if($rev->categoria)
                            <div class="modal-info--item">
                                <b>Categoria:</b> {{$rev->categoria}}
                            </div>
                        @endif
                        @if($rev->nombre_revista)
                            <div class="modal-info--item">
                                <b>Nombre de la Revista: </b> {{$rev->nombre_revista}}
                            </div>
                        @endif
                        @if($rev->autores)
                            <div class="modal-info--item">
                                <b>Autores:</b> {{$rev->autores}}
                            </div>
                        @endif
                        @if($rev->anio)
                        <div class="modal-info--item">
                            <b>Año: </b>
                            {{$rev->anio}}
                        </div>
                        @endif
                        @if($rev->edicion)
                        <div class="modal-info--item">
                            <b>Páginas: </b>
                            {{$rev->edicion}}
                        </div>
                        @endif
                        @if($rev->issn)
                        <div class="modal-info--item">
                            <b>ISSN: </b>
                            {{$rev->issn}}
                        </div>
                        @endif
                        <a href="{{route('visitante.leerRevista', [$rev->id, $rev->file ] )}}" class="btn btn-leer has-icon">
                        <i class='fas fa-book-open'></i>
                        Leer Documento</a>

                          <a href="{{route('visitante.descargarRevista', [$rev->id, $rev->file ] )}}" class="btn btn-descargar has-icon">
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
