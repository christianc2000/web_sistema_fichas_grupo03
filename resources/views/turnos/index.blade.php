@extends('app')

@section('title')
    TURNOS
@stop

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-header" style="display: flex; align-items: center;">
                <div class="button-container" style="margin: -5px;">
                    <a href="{{ route('turno.create') }}" class="btn btn-warning pt-2 pb-2 mx-1"
                        style="max-height: 40px;">CREAR
                        TURNO</a>
                </div>
            </div>

            @foreach ($dias as $dia)
                <div class="px-4" style="justify-content: center">
                    <label class="form-label">{{ $dia->name }}</label>
                </div>
                <div class="card-body p-4">
                    <table class="table table-striped hover table-data" id="myTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TURNO</th>
                                <th>DURACIÓN</th>
                                <th>SALA</th>
                                <th>ACTIVO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            @endforeach
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .dropbtn {
            height: 30px;
            width: 100px;
            background-color: #3498DB;
            color: white;
            align-items: center;
            justify-items: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            /* Centrar horizontalmente el contenido del botón */
            align-items: center;
            /* Centrar verticalmente el contenido del botón */
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #2980B9;
        }

        /* Estilos para el contenedor del menú desplegable */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Estilos para el menú desplegable */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: -200%;
            /* Ajusta este valor según sea necesario */
        }

        /* Estilos para los elementos <a> dentro del menú desplegable */
        .dropdown-content a {
            height: 30px;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('serverSideProcessing') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'turno',
                    name: 'turno'
                },
                {
                    data: 'duracion',
                    name: 'duracion'
                },
                {
                    data: 'sala',
                    name: 'sala'
                },
                {
                    data: 'activo',
                    name: 'activo'
                },
                {
                    data: 'opciones',
                    name: 'opciones',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $(document).on('click', '.dropbtn', function() {
            const dropdown = $(this).next('.dropdown-content');
            $('.dropdown-content').not(dropdown).removeClass('show');
            dropdown.toggleClass('show');
        });

        $(document).click(function(event) {
            if (!$(event.target).closest('.dropdown').length) {
                $('.dropdown-content').removeClass('show');
            }
        });
    </script>
@stop
