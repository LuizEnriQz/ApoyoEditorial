@extends('layouts.app')
@section('content')

 <!-- Styles -->
 <link href="{{ asset('css/css_catalogos/novedades.css') }}" rel="stylesheet">

<div class="container-fluid">

<body>
    <!--EDITORIAL CUCSH IMG-->
    <div class="container">
        <div><img class="editorial_cucsh" src="{{asset('img/editorial_cucsh.jpg')}}" style="width:100%;"
        alt="editorial_cucsh">
        </div>
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
            <li><a href="#">Publicaciones</a>
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

<!--CONTENT-->

    <p id="NOV">Libros</p>
    <div class="container flex-fluid">
        <div class="row">

            @foreach($libros as $lib)
            <div class="col-md-3">
               <div class="card" style="width: 15rem;">
                 <img src="{{ "/editorial/storage/app/public/libros_portada/" . $lib->portada }}" alt="...">
                    <div class="d-grid gap-2">
                   <a href="{{route('visitante.leerLibro', [$lib->id, $lib->file ] )}}" class="btn btn-primary">Leer Documento</a>

                   <a href="{{route('visitante.descargarLibro', [$lib->id, $lib->file ] )}}"  class="btn btn-info">Descargar Documento</a>
                    </div>
               </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

<!--FOOTER-->
<footer>
    <div class="footer">
        <img class="footer_img" src="{{('img/LOGO_RED_UNI_JAL.png')}}" alt="UdeG">
        <p class="footer_text">
            CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES <br>
            Unidad de Apoyo Editorial <br>
            Av. de los Maestros y Av. Alcalde, Puerta 1 <br>
            Tel:(Agregar número telefonico) <br>
        </p>
    </div>
</footer>
</div>
@endsection
