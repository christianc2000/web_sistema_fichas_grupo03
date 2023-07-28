@extends('app')

@section('title')
    TURNOS
@stop

@section('content')

    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-header" style="display: flex; align-items: center;">
                <div class="button-container" style="margin: -5px;">
                    <a href="{{ route('user.create') }}" class="btn btn-warning pt-2 pb-2 mx-1" style="max-height: 40px;">CREAR
                        TURNO</a>

                    <button type="button" class="btn btn-warning pt-2 pb-2 mx-1" style="max-height: 40px;">ASIGNAR
                        TURNO</button>
                </div>
            </div>
            <div class="card-body p-4">
                <table id="table" class="table table-striped hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>HORA INICIO</th>
                            <th>HORA FIN</th>
                            <th>SALA</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turnos as $turno)
                            <tr>
                                <td>{{ $turno->id }}</td>
                                <td>{{ $turno->name }}</td>
                                <td>{{ $turno->start_time }}</td>
                                <td>{{ $turno->end_time }}</td>
                                <td>{{ $turno->room->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn">Opciones</button>
                                        <div class="dropdown-content">
                                            <a href="{{ route('user.edit', $user->id) }}">Editar</a>

                                            <form id="delete-form" action="{{ route('user.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <!-- Aquí puedes agregar otros campos ocultos con información adicional si lo necesitas -->

                                                <a href="#"
                                                    onclick="event.preventDefault(); confirmDelete();">Eliminar</a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

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
        $(document).ready(function() {
            $('#table').DataTable();
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

        function confirmDelete() {
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
@stop
