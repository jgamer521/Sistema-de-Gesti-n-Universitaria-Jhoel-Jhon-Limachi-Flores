@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Niveles </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Niveles registrados</h3>

                    <div class="card-tools">
                        <a href="{{url('/admin/niveles/create')}}" class="btn btn-primary"> Crear nuevo</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">Nombre del nivel</th>
                            <th style="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach($niveles as $nivel)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{$nivel->nombre}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('/admin/niveles/'.$nivel->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{url('/admin/niveles',$nivel->id)}}" method="post"
                                              onclick="preguntar{{$nivel->id}}(event)" id="miFormulario{{$nivel->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$nivel->id}}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Desea eliminar esta registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$nivel->id}}');
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <style>

        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; 
            gap: 10px; 
            margin-bottom: 15px; 
        }

        
        #example1_wrapper .btn {
            color: #fff; 
            border-radius: 4px; 
            padding: 5px 15px; 
            font-size: 14px; 
        }

        /* Colores por tipo de botón */
        .btn-danger { background-color: #dc3545; border: none; }
        .btn-success { background-color: #28a745; border: none; }
        .btn-info { background-color: #17a2b8; border: none; }
        .btn-warning { background-color: #ffc107; color: #212529; border: none; }
        .btn-default { background-color: #6e7176; color: #212529; border: none; }
    </style>
@stop

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Niveles",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Niveles",
                    "infoFiltered": "(Filtrado de _MAX_ total Niveles)",
                    "lengthMenu": "Mostrar _MENU_ Niveles",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [
                    { text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default' },
                    { text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger' },
                    { text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info' },
                    { text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success' },
                    { text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning' }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
