@extends('layouts.app')

@section('content')
<div class="container-fluid">

<body>
        <!--EDITORIAL CUCSH IMG-->
        <div class="container">
            <img class="editorial_cucsh" src="{{asset('img/editorial_cucsh.jpg')}}" style="width:100%;" alt="editorial_cucsh">
        </div>

        <!--MIDDLE NAV MENU-->
        <nav class="middle_navbar container w-100">
            <ul class="mid_menu">
                <li><a href="#">Editorial CUCSH</a>
                    <ul class="middle_submenu">
                        <li><a href="#">Directorio</a></li>
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

        <!--SEARCH SPACE-->
        <div class="searcher">
            <form class="search-space form-check-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="{{url('/search')}}">
                    {!!csrf_field()!!}
                <div class="search-box">
                    <input class="input form-control mr-sm-2" name="search" type="text"  placeholder="Ingresa tu busqueda">
                </div>
                <i class="fa fa-search"></i>
                <button class="btn btn-outline-light my-2 my-sm-1" type="submit"></button>
            </form>
        </div>

        <!-- PAGE CONTENT-->
        <div class="inicio">
            <h2>INICIO</h2>
        </div>

        <!--SLIDERS-->
        <div class="sliders">
            <!--NOVEDADES-->
            <div class="section-nov">
                <div class="slider">
                    <p class="novedades">
                        <a href="{{route('colecciones.catalogo')}}" class="magazine text-decoration-none1">NOVEDADES</a>
                    </p>
                    <ul>
                        @if(isset($portadasColecciones))
                            @foreach($portadasColecciones as $p)
                            <li>
                               <img src="<?php echo asset('storage/colecciones_portada/'. $p->portadas)?>" alt="Imagen Colecciones">
                            </li>
                            @endforeach
                        @else
                        <li>
                           <img src="{{asset('img/Cartel%20moon.jpg')}}" alt="moon">
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!--REVISTAS-->
            <div class="section-mag">
                <div class="slider">
                    <p class="magazine">
                        <a href="{{route('revistas.catalogo')}}" class="magazine text-decoration-none1 ">REVISTAS</a>
                    </p>
                    <ul>
                        @if(isset($portadasRevistas))
                            @foreach($portadasRevistas as $p)
                            <li>
                               <img src="<?php echo asset('storage/revistas_portada/'. $p->portadas)?>" alt="Imagen Revistas">
                            </li>
                            @endforeach
                        @else
                        <li>
                           <img src="{{asset('img/Cartel%20moon.jpg')}}" alt="moon">
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!--LIBROS-->
            <div class="section-books">
                <div class="slider">
                    <p class="books">
                        <a href="{{route('libros.catalogo')}}" class="books text-decoration-none1">LIBROS</a>
                    </p>
                    <ul>
                        @if(isset($portadasLibros))
                            @foreach($portadasLibros as $p)
                            <li>
                               <img src="<?php echo asset('storage/libros_portada/'. $p->portadas)?>" alt="Imagen Libros">
                            </li>
                            @endforeach
                        @else
                        <li>
                           <img src="{{asset('img/Cartel%20moon.jpg')}}" alt="moon">
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!--NOTICAS-->
            <div class="section-news">
                <div class="slider">
                    <p class="news_events">
                        <a href="{{route('noticias.catalogo')}}" class="news_events text-decoration-none1">NOTICIAS / EVENTOS</a>
                    </p>
                    <ul>
                        @if(isset($portadasNoticias))
                            @foreach($portadasNoticias as $p)
                            <li>
                               <img src="<?php echo asset('storage/noticias_img/'. $p->portadas)?>" alt="Imagen Noticias">
                            </li>
                            @endforeach
                        @else
                        <li>
                           <img src="{{asset('img/Cartel%20moon.jpg')}}" alt="moon">
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </body>

        <!--FOOTER-->
        <div class="footer">
            <<img class="footer_img" src="{{('img/LOGO_RED_UNI_JAL.png')}}" alt="UdeG">
            <p class=" footer_text">
                CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES <br>
                Unidad de Apoyo Editorial <br>
                Av. de los Maestros y Av. Alcalde, Puerta 1 <br>
                Tel:(Agregar número telefonico) <br>
            </p>
        </div>

</div>
@endsection
