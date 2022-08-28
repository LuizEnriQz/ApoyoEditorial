@extends('layouts.app')

@section('content')
@include('layouts.sub-menu')
<div class="container-fluid">
    <!--SEARCH SPACE-->

    <!--SLIDERS-->
    <div class="sliders">
        <!--NOVEDADES-->
        <div class="row ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-8 ">
                        <div class="slider w-100">
                            <p class="novedades">
                                <a href="{{ route('colecciones.catalogo') }}" class="magazine text-decoration-none1">NOVEDADES</a>
                            </p>
                            <ul>
                                @if (isset($portadasColecciones))
                                @foreach ($portadasColecciones as $p)
                                <li>
                                    <img src="{{ str_replace("ApoyoEditorial/public/","ApoyoEditorial/",asset('/storage/app/public/colecciones_portada/' . $p->portadas))}}" alt="Imagen Colecciones">
                                </li>
                                @endforeach
                                @else
                                <li>
                                    <img src="{{ asset('img/Cartel%20moon.jpg') }}" alt="moon">
                                </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

        </div>


        <div class="row justify-content-center">
            <div class="col-sm-8">
                <hr>
            </div>
        </div>

        <!--REVISTAS-->
        <div class="section-mag">
            <div class="slider">
                <p class="magazine">
                    <a href="{{ route('revistas.catalogo') }}" class="magazine text-decoration-none1 ">PUBLICACIONES</a>
                </p>
                <ul>
                    @if (isset($portadasRevistas))
                    @foreach ($portadasRevistas as $p)
                    <li>
                        <img src="{{ str_replace("ApoyoEditorial/public/","ApoyoEditorial/",asset('/storage/app/public/revistas_portada/' . $p->portadas))}}" alt="Imagen Revistas">
                    </li>
                    @endforeach
                    @else
                    <li>
                        <img src="{{ asset('img/Cartel%20moon.jpg') }}" alt="moon">
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!--LIBROS-->
        <div class="section-books">
            <div class="slider">
                <p class="books">
                    <a href="{{ route('libros.catalogo') }}" class="books text-decoration-none1">LIBROS</a>
                </p>
                <ul>
                    @if (isset($portadasLibros))
                    @foreach ($portadasLibros as $p)
                    <li>
                        <img src="{{ str_replace("ApoyoEditorial/public/","ApoyoEditorial/",asset('/storage/app/public/libros_portada/' . $p->portadas))}}" alt="Imagen Libros">
                    </li>
                    @endforeach
                    @else
                    <li>
                        <img src="{{ asset('img/Cartel%20moon.jpg') }}" alt="moon">
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!--NOTICAS (QUEDA OCULTO A FUTURO USO DE NOTICIAS)-->
        {{-- <div class="section-news">
            <div class="slider">
                <p class="news_events">
                    <a href="{{ route('noticias.catalogo') }}" class="news_events text-decoration-none1">NOTICIAS /
                        EVENTOS</a>
                </p>
                <ul>
                    @if (isset($portadasNoticias))
                    @foreach ($portadasNoticias as $p)
                    <li>
                        <img src="{{ str_replace("ApoyoEditorial/public/","ApoyoEditorial/",asset('/storage/app/public/noticias_img/' . $p->portadas))}}" alt="Imagen Noticias">
                    </li>
                    @endforeach
                    @else
                    <li>
                        <img src="{{ asset('img/Cartel%20moon.jpg') }}" alt="moon">
                    </li>
                    @endif
                </ul>
            </div>
        </div> --}}
    </div>
</div>
@endsection
