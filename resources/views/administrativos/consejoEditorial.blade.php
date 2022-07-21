@extends('layouts.app')

<link href="{{asset('css/myCardStyle.css')}}"
rel="stylesheet"
/>

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="row">
                <div class="col-sm-12 ml-6">
                    <h2>Consejo Editorial</h2>
                </div>
            </div>

            @foreach($administrativo as $admin)

            <div class="col-md-4">
                <div class="card profile-card-directivos">
                    <div class="background-block">
                        <img src="{{ asset('img/aa_jardin_japones_cucsh_1.jpg') }}" alt="profile-sample" class="background"/>
                    </div>
                    <div class="profile-thumb-block">
                        <img src={{ '/editorial/storage/app/public/administrativos_fotos/' . $admin->file}} alt="profile-image" class="profile"/>
                    </div>
                    <div class="card-content">
                        <h4>{{$admin->nombre}}</h4>
                        <h5>Miembro del consejo Editorial</h5>
                    </div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalDirectivos-{{$admin->id}}">Info</button>
                </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection

@section('modal')
{{-- Modal --}}
@foreach ($administrativo as $admin)
    <div class="modal fade" id={{'modalDirectivos-'.$admin->id}}>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <div class="img-border-rounded">
                        @if(storage_path('/administrativos_fotos/')->has($admin->file))
                            <img src={{'/editorial/storage/app/public/administrativos_fotos/'.$admin->file}}"/>
                        @endif
                    </div> --}}
                    <h1>{{$admin->nombre}}</h1><br>
                </div>
                <div class="modal-body">
                    <div class="informacionModal">
                        @if($admin->resenia)
                            <div class="modal-info--item">
                                <b>Reseña: </b> {{$admin->resenia}}
                            </div>
                        @endif
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



