<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Apoyo Editorial</title>
    <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->
    <script src=http://code.jquery.com/jquery-1.11.3.min.js></script>
    <script src=https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!--Icons-->
    <script src="https://kit.fontawesome.com/f217992682.js" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="stylesheet" type="text/css"
        href=https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.css />
    <link rel="stylesheet" type="text/css"
        href=https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons />
    <link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css>
    <link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



    <!-- CSS Files -->

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Style.css') }}" rel="stylesheet">

    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href=https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css rel="stylesheet" />

    <link href=https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href=https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.css />
    <link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/btnDT.css') }} " />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }} " />

    <script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
    <script type="text/javascript">
        loader(true);
    </script>




    <!-- SIDEBAR WRAPPER -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/css_sidebar/style.css') }} ">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>


    <!-- xxxxxxxxxxxxxxxx -->


    <!--Prueba Links-->
    <link rel="stylesheet" type="text/css"
        href=https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.css />
    <link rel="stylesheet" type="text/css"
        href=https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.css />
    <style>
        .dropdown-toggle:after {
            border: none;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar  Principal-->
        <nav class="navbar navbar-expand-md navbar-light " style="background-color:#0A4765;">
            <div class="container-fluid">
                <a class="navbar-brand mx-2" href="http:\\www.cucsh.udg.mx">
                    <img src="{{ asset('img/cucshBlanco.png') }}" class="d-inline-block align-text-top" alt="cucsh-logo"
                        width="130px"></a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#a"
                    aria-controls="a" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div <class="container-fluid">
                <div class="col-sm-12 col-md-12">
                    <div class="collapse navbar-collapse" id="a">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('home') }}">Inicio</a>
                            </li>
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" id="red_universitaria" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" href="#">Red universitaria</a>
                                <ul class="dropdown-menu" aria-labelledby="red_universitaria">
                                    <li><a class="dropdown-item" href="http:\\www.udg.mx">Universidad de Guadalajara</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.udg.mx/directorio">Directorio Oficial</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.cuaad.udg.mx/">CUAAD</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.cucba.udg.mx/">CUCBA</a></li>
                                    <li><a class="dropdown-item" href="https:\\www.cucea.udg.mx/">CUCEA</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.cucei.udg.mx/">CUCEI</a></li>
                                    <li><a class="dropdown-item" href="https:\\www.cucs.udg.mx/">CUCS</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" id="admin" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" href="#">Adminsitración y
                                    gobierno</a>
                                <ul class="dropdown-menu" aria-labelledby="admin">
                                    <li><a class="dropdown-item" href="http:\\www.hcgu.udg.mx/">Consejo General</a></li>
                                    <li><a class="dropdown-item" href="https:\\rectoria.udg.mx/">Rectoría General</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.vicerrectoria.udg.mx/">Vicerrectoria Ejecutiva</a></li>
                                    <li><a class="dropdown-item" href="https:\\secgral.udg.mx/">Secretaria General</a></li>
                                    <li><a class="dropdown-item" href="https:\\secgral.udg.mx/">Contralora General</a></li>
                                    <li><a class="dropdown-item" href="https:\\abogaciageneral.udg.mx/">Oficina de la Abogacía General</a>
                                    </li>
                                    <li><a class="dropdown-item" href="https:\\finanzas.udg.mx/">Finanzas</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" id="otros" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" href="#">Otros sitios
                                    UdeG</a>
                                <ul class="dropdown-menu" aria-labelledby="otros">
                                    <li><a class="dropdown-item" href="http:\\www.bibliotecas.udg.mx/">Biblioteca</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.carteleraudg.medios.udg.mx/">Cartelera UDG</a></li>
                                    <li><a class="dropdown-item" href="https:\\cultura.udg.mx/">Cultura UDG</a></li>
                                    <li><a class="dropdown-item" href="https:\\www.fil.com.mx/">FIL - Feria Internacional del Libro de
                                            Guadalajara</a></li>
                                    <li><a class="dropdown-item" href="http:\\flip.cga.udg.mx/">FILP</a></li>
                                    <li><a class="dropdown-item" href="https:\\fundacion.udg.mx/">Fundación UDG</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.gaceta.udg.mx/">Gaceta Universitaria</a></li>
                                    <li><a class="dropdown-item" href="https:\\leonesnegrosudg.mx/">Leones Negros</a></li>
                                    <li><a class="dropdown-item" href="https:\\www.udg.mx/normatividad">Normatividad</a></li>
                                    <li><a class="dropdown-item" href="http:\\www.pregrado.udg.mx/">Programas Educativos de Posgrado</a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item"><a class="nav-link text-white" href="https:\\www.udg.mx/">UDG</a>
                            </li> --}}
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item border-start">
                                        <a class=" nav-link text-white" href="{{ route('login') }}">Inicio de
                                            Sesión</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class=" nav-link text-white" href="{{ route('register') }}">Registro</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="text-white nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>

                    </div>
                </div>
            </div>
        </nav>



        <div class="wrapper">
            @if (Auth::Check() && Auth::user()->role == 'admin')
                @include('layouts.sidebar')
            @endif

            <div id="content">
                @yield('content')
                @yield('modal')
            </div>

        </div>


    </div>
    <div class="footer p-2">
        <div class="container" id="contact">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-12 col-md-6">
                    <img class="footer_img img-fluid" src="{{ asset('img/LOGO_RED_UNI_JAL.png') }}"
                        alt="UdeG">
                </div>
                <div class="col-sm-12  col-md-6 ">
                    <p class="footer_text">
                        CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES <br>
                        Unidad de Apoyo Editorial <br>
                        Av. de los Maestros y Av. Alcalde, Puerta 1 <br>
                        Tel: +52 (33) 38193300 ext: <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js">
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


</body>

</html>
