@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-sm-12 ml-3">
                <h2>Relación de libros</h2>
            </div>

        </div>

{{-- TABLA DE RESULTADOS DE BUSQUEDA DE LIBROS --}}

        <div>
            <table id="libros" class="table table-striped table-bordered" style="width:100%">
                <thead>

                <th>Nombre</th>
                <th>autores</th>
                <th>año</th>
                {{-- <th>descripción</th> --}}
                <th>Acciones</th>

                </thead>

                <tbody>

                </tbody>
            </table>
        </div>

{{-- TABLA DE RESULTADOS DE BUSQUEDA DE NOTICIAS (OCULTO PARA SER UTILIZADO A FUTURO --}}

        {{-- <hr>
            <div class="row">
                <div class="col-sm-12 ml-3">
                    <h2>Relación de Noticia</h2>
                </div>

            </div>


        <div>
            <table id="noticias" class="table table-striped table-bordered" style="width:100%">
                <thead>

                <th>Titulo</th>
                <th>Fecha</th>
                <th>Acciones</th>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div> --}}

{{-- TABLA DE RESULTADOS DE BUSQUEDA DE PUBLICACIONES / REVISTAS --}}

        <hr>
            <div class="row">
                <div class="col-sm-12 ml-3">
                    <h2>Relación de Publicaciones / Revistas</h2>
                </div>

            </div>

        <div>
            <table id="revistas" class="table table-striped table-bordered" style="width:100%">
                <thead>

                <th>Nombre</th>
                {{-- <th>año</th> --}}
                {{-- <th>Edición</th> --}}
                <th>Nombre Revista</th>
                {{-- <th>Autores</th> --}}
                {{-- <th>ISSN</th> --}}
                <th>Acciones</th>

                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <hr>

{{-- TABLA DE RESULTADOS DE BUSQUEDA DE NOVEDADES / COLECCIÓN --}}

        <div class="row">
            <div class="col-sm-12 ml-3">
                <h2>Relación de Novedades / Colección</h2>
            </div>

        </div>

        <div>
            <table id="colecciones" class="table table-striped table-bordered" style="width:100%">
                <thead>

                <th>Titulo</th>
                {{-- <th>Coordinadores</th> --}}
                {{-- <th>Descripción</th> --}}
                {{-- <th>Tema</th> --}}
                {{-- <th>Colección</th> --}}
                <th>Categoria</th>
                <th>Acciones</th>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    {{-- DATA TABLE DE LIBRO --}}
    <script>
        var data1 = @json($libros);
        $(document).ready(function() {
            $('#libros').DataTable( {
                "data": data1,
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

    {{-- DATA TABLE DE NOTICIAS --}}

    {{-- <script>
        var data2 = @json($noticias);
        $(document).ready(function() {
            $('#noticias').DataTable( {
                "data": data2,
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
    </script> --}}

    {{-- DATA TABLE DE REVISTAS --}}
   <script>
        var data3 = @json($revistas);
        $(document).ready(function() {
            $('#revistas').DataTable( {
                "data": data3,
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

   {{-- DATA TABLE DE NOVEDADES / COLECCIONES --}}
    <script>
        var data4 = @json($colecciones);
        $(document).ready(function() {
            $('#colecciones').DataTable( {
                "data": data4,
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

<!-- Script de Mostrar Imagen -->

@endsection
