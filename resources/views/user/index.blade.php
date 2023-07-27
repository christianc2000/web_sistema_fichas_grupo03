@extends('app')

@section('title')
    USUARIOS
@stop

@section('content')

    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card p-4" style="width: 100%;">
            <table id="table" class="hover" style="width:100%">
                <thead>
                    <tr>
                        <th>CI</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>CORREO</th>
                        <th>SEXO</th>
                        <th>EDAD</th>
                        <th>CELULAR</th>
                        <th>TIPO</th>
                        <th>REGISTRO</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->ci }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->getAge() }}</td>
                            <td>{{ $user->number_phone }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->registration_date }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="dropdown__toggle" onclick="toggleDropdown(this)">Dropdown</button>
                                    <div class="dropdown__menu">
                                        <a href="#" class="dropdown__item">Item 1</a>
                                        <a href="#" class="dropdown__item">Item 2</a>
                                        <a href="#" class="dropdown__item">Item 3</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <style>
        /* Estilos del botón de activación del Dropdown */
        .dropdown__toggle {
            padding: 8px 16px;
            background-color: #f1f1f1;
            border: none;
            cursor: pointer;
        }

        /* Estilos del menú del Dropdown */
        .dropdown__menu {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Estilos de los elementos del menú del Dropdown */
        .dropdown__item {
            display: block;
            padding: 12px 16px;
            text-decoration: none;
            color: #333;
        }

        /* Estilo de hover para los elementos del menú */
        .dropdown__item:hover {
            background-color: #ddd;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        function toggleDropdown(btn) {
            var dropdownMenu = btn.nextElementSibling;
            if (dropdownMenu.style.display === "block") {
                dropdownMenu.style.display = "none";
            } else {
                dropdownMenu.style.display = "block";
            }
        }

        // Cerrar el menú cuando se hace clic fuera de él
        document.addEventListener("click", function(event) {
            var dropdownMenus = document.querySelectorAll(".dropdown__menu");
            var dropdownToggles = document.querySelectorAll(".dropdown__toggle");

            for (var i = 0; i < dropdownMenus.length; i++) {
                if (event.target !== dropdownMenus[i] && event.target !== dropdownToggles[i]) {
                    dropdownMenus[i].style.display = "none";
                }
            }
        });
    </script>
@stop
