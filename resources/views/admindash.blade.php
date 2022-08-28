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
            <div class="card-header card-header-success">Sistema de Seguimiento de Vistas y Descargas</div>

            <div class="row m-2">

                {{-- ACCESO A NOVEDADES --}}
            <div class="col-xl-4 col-lg-6">
                <div class="card l-bg-cucsh-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-clone"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Novedades / Colecciones</h5>
                        </div>
                        <div>
                            <a href="{{route('colecciones.visitas')}}" class="btn btn-primary" type="button">Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

                {{-- ACCESO A LIBROS --}}
            <div class="col-xl-4 col-lg-6">
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

                {{-- ACCESO A NOTICIAS (PERMENECE OCULTO PARA USO A FUTURO--}}
            {{-- <div class="col-xl-3 col-lg-6">
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
            </div> --}}

                {{-- ACCESO A REVISTAS --}}
            <div class="col-xl-4 col-lg-6">
                <div class="card l-bg-cucsh4-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-file"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Publicaciones / Revistas</h5>
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
                <div class="card-header card-header-success">TOP de los documentos mas visitados</div>
            </div>

            <div>
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                     {{-- <th>ID_Documento</th> --}}
                     <th>Sección</th>
                     <th>Nombre archivo</th>
                     <th>Visitas</th>
                     </thead>

                     <tbody>

                     </tbody>

                 </table>
             </div>
        </div>
    </div>

</div>

 <script>
    var data = @json($tvisitas ?? '');
    $(document).ready(function() {
        $('#example').DataTable( {
            "data": data,
            "pageLength": 5,
            "order": [[ 0, "asc" ]],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar (filtro):",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },

        } );
    } );
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>


@endsection
