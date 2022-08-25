@extends('layouts.app')
<link href="{{asset('css/myCardStyle.css')}}"
rel="stylesheet"
/>
@section('content')

@include('layouts.sub-menu')


    <!--CONTENT-->
<div class="container">
        <h5>NOTICIAS</h5>
    <div class="row">
        @foreach($noticias as $not)
        <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                    <img src="{{ "/editorial/storage/app/public/noticias_img/" . $not->file }}" alt="...">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNoticia-{{$not->id}}">Leer Documento</button>
                    {{-- <a href="{{route('visitante.leerNoticia',[$not->id, $not->file ] )}}" class="btn btn-primary">Leer Documento</a> --}}
                   <a href="{{route('visitante.descargarNoticia',[$not->id, $not->file ] )}}" class="btn
                   btn-info">Descargar Documento</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('modal')
{{-- Modal --}}
@foreach ($noticias as $not)
    <div class="modal fade" id={{'modalNoticia-'.$not->id}}>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>{{$not->titulo}}</h1><br>
                </div>
                @if($not->descripcion)
                    <div class="modal-info--item">
                        <b>Descripción:</b> {{$not->descripcion}}
                    </div>
                @endif
                @if($not->fecha)
                    <div class="modal-info--item">
                        <b>Fecha:</b> {{$not->fecha}}
                    </div>
                @endif
                <div class="modal-body">
                    <div class="img-border-rounded">
                        <img style="object-fit:contain; width:100%;" src="{{'/editorial/storage/app/public/noticias_img/'.$not->file}}"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" data-dismiss="modal" value="Cerrar">
                </div>
            </div>
        </div>

    </div>
@endforeach


@endsection



