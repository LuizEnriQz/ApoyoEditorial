@extends('layouts.app')

<link href="{{asset('css/myCardStyle.css')}}"
rel="stylesheet"
/>

@section('content')
<div class="container-fluid">

 <!-- PAGE CONTENT-->
    <div class="inicio">
        <h3>PÁGINA DE ADMINISTRADOR</h3>
    </div>

<!-- SEARCH BAR -->

    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="card card chart">
                <div class="card-header card-header-success">
                    <form class="d-flex" method="post" enctype="multipart/form-data" action="{{url('/search')}}">
                        {!!csrf_field()!!}
                        <input class="form-control me-2" name="search" type="text" placeholder="Buscar">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- SECCION DE CARTAS DE ACCESO ADMINISTRADOR -->

    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-header card-header-success">Sistema Integral de Gestión de Apoyo Editorial</div>

            <div class="row m-2">

                {{-- ACCESO A NOVEDADES --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cucsh-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-clone"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Novedades</h5>
                        </div>
                        <div>
                            <a href="{{route('colecciones.visitas')}}" class="btn btn-primary" type="button">Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

                {{-- ACCESO A LIBROS --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cucsh3-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-book-open"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Libros</h5>
                        </div>
                        <div>
                            <a href="{{route('libros.visitas')}}" class="btn btn-primary" type="button">Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

                {{-- ACCESO A NOTICIAS --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cucsh3-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-newspaper"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Noticias</h5>
                        </div>
                       <div>
                           <a href="{{route('noticias.visitas')}}" class="btn btn-primary" type="button">Detalles</a>
                       </div>
                    </div>
                </div>
            </div>

                {{-- ACCESO A REVISTAS --}}
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cucsh4-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-file"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Revistas</h5>
                        </div>
                        <div>
                            <a href="{{route('revistas.visitas')}}" class="btn btn-primary" type="button">Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>

<!-- TABLA DE LOS DOCUMENTOS MAS DESCARGADOS -->

    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header card-header-success">TOP 5 de los documentos mas descargados</div>
            </div>


        </div>
    </div>

</div>
@endsection
