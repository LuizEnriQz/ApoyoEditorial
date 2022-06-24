@extends('layouts.app')
@section('content')
@include('layouts.sub-menu')
<div class="container">
    <!--CONTENT-->

    <div class="container">
        <h5>NOTICIAS</h5>
        <div class="row">

            @foreach($noticias as $not)
            <div class="col-md-3">
                <div class="card" style="width: 15rem;">
                    <img src="{{ "/editorial/storage/app/public/noticias_img/" . $not->file }}" alt="...">
                    <a href="{{route('visitante.leerNoticia',[$not->id, $not->file ] )}}" class="btn btn-primary">Leer Documento</a>

                    <a href="#" class="btn
                   btn-info">Descargar Documento</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</div>
@endsection