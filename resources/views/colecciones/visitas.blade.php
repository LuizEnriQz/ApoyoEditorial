@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-10 ml-4">
            <h2>Relación de visitas y descargas de Novedades</h2>
        </div>
        <hr>
    </div>
    <div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Año</th>
            <th>ISBN</th>
            <th>Categoría</th>
            <th>Relación de Visitas y descargas</th>
            </thead>

            <tbody>

            </tbody>

        </table>
    </div>
</div>

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

<script>
    var data = @json($colecciones);
    $(document).ready(function() {
        $('#example').DataTable( {
            "data": data,
            "pageLength": 10,
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
                "sSearch": "Buscar:",
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
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel',
                {
                    extend:'pdfHtml5',
                    orientation: 'landscape',
                    pageSize:'LETTER',
                }

            ]
        } );
    } );
</script>
@endsection

