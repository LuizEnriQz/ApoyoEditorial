@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!--SEARCH SPACE-->
        <div class="container mb-2">
            <div class="row justify-content-center">
                    <img class="editorial_cucsh" src="{{asset('img/editorial_cucsh.jpg')}}" style="width:100%;" alt="editorial_cucsh">
                <div class="container">
                    <nav class="middle_navbar container-fluid">
                        <ul class="mid_menu">
                            <li><a href="#">Editorial CUCSH</a>
                                <ul class="middle_submenu ">
                                    <li class="w-100"><a href="#">Directorio</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Lineamientos y normas editoriales</a></li>
                            <li><a href="#">Consejo Editorial</a></li>
                            <li><a href="#">Publiaciones</a>
                                <ul class="middle_submenu">
                                    <li><a href="#">Novedades 2020</a></li>
                                    <li><a href="#">Catálogo 2019</a></li>
                                    <li><a href="#">Catálogo 2018</a></li>
                                    <li><a href="#">Catálogo 2013 - 2017</a></li>
                                    <li><a href="#">Catálogo 2012</a></li>
                                    <li><a href="#">Catálogo 1996-2011</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Colecciones</a>
                                <ul class="middle_submenu">
                                    <li><a href="#">Academia</a></li>
                                    <li><a href="#">Arborius</a></li>
                                    <li><a href="#">Catédras</a></li>
                                    <li><a href="#">Humanidades</a></li>
                                    <li><a href="#">Graduados</a></li>
                                    <li><a href="#">Cuadernos del CUCSH</a></li>
                                    <li><a href="#">Formación profesional</a></li>
                                    <li><a href="#">Estudios del hombre</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Revistas Cientificas</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="row justify-content-end">
                <div class="col-sm-12 col-md-4 align-self-center">
                    <div class="searcher">
                        <form class="search-space form-check-inline " method="post" enctype="multipart/form-data"
                            action="{{ url('/search') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-10 w-100">
                                    <div class="search-box w-100">
                                        <input class="input form-control w-100" name="search" type="text"
                                            placeholder="Ingresa tu busqueda">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <button class="btn ms-1 mt-3 btn-outline-dark w-100" type="submit"><i class="fa fa-search"></i></button>
                                </div>                                    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--SLIDERS-->
        <div class="sliders">
            <!--NOVEDADES-->
            <div class="row ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-8 ">
                            <div class="slider w-100">
                                <p class="novedades">
                                    <a href="{{ route('colecciones.catalogo') }}"
                                        class="magazine text-decoration-none1">NOVEDADES</a>
                                </p>
                                <ul>
                                    @if (isset($portadasColecciones))
                                        @foreach ($portadasColecciones as $p)
                                            <li>
                                                <img src="<?php echo asset('storage/colecciones_portada/' . $p->portadas); ?>" alt="Imagen Colecciones">
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
                        <a href="{{ route('revistas.catalogo') }}" class="magazine text-decoration-none1 ">REVISTAS</a>
                    </p>
                    <ul>
                        @if (isset($portadasRevistas))
                            @foreach ($portadasRevistas as $p)
                                <li>
                                    <img src="<?php echo asset('storage/revistas_portada/' . $p->portadas); ?>" alt="Imagen Revistas">
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
                                    <img src="<?php echo asset('storage/libros_portada/' . $p->portadas); ?>" alt="Imagen Libros">
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

            <!--NOTICAS-->
            <div class="section-news">
                <div class="slider">
                    <p class="news_events">
                        <a href="{{ route('noticias.catalogo') }}" class="news_events text-decoration-none1">NOTICIAS /
                            EVENTOS</a>
                    </p>
                    <ul>
                        @if (isset($portadasNoticias))
                            @foreach ($portadasNoticias as $p)
                                <li>
                                    <img src="<?php echo asset('storage/noticias_img/' . $p->portadas); ?>" alt="Imagen Noticias">
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
@endsection
