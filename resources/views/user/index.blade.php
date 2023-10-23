@extends('app')

@section('title')
    USUARIOS
@stop

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('delete'))
        <div class="alert alert-warning">
            {{ Session::get('delete') }}
        </div>
    @endif
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-header" style="display: flex; align-items: center;">
                <div class="button-container" style="margin: -5px;">
                    <a href="{{ route('user.create') }}" class="btn btn-warning pt-2 pb-2 mx-1"
                        style="max-height: 40px;">CREAR
                        USUARIO</a>


                </div>
            </div>
            <div class="card-body p-4">
                <table id="table" class="table table-striped hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->ci }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->number_phone }}</td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->registration_date }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn">Opciones</button>
                                        <div class="dropdown-content">
                                            <a href="{{ route('user.edit', $user->id) }}">Editar</a>
                                            @if ($user->type === 'D')
                                                <a href="{{ route('turno.user', $user->id) }}">Turno</a>
                                            @endif
                                            <a href="" class="delete-btn"
                                                data-user-id="{{ $user->id }}">Eliminar</a>
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
    <!-- Add a modal for confirmation -->
    <!-- Add a modal for confirmation -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
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

            var userIdToDelete = null;

            // When the "Eliminar" link is clicked, set the userIdToDelete and show the confirmation modal
            $(".delete-btn").on("click", function() {
                userIdToDelete = $(this).data("user-id");
                console.log('user id: ' + userIdToDelete);
                $('#confirmModal').modal('show');
            });

            // When the "Eliminar" button in the modal is clicked, submit the form
            $("#confirmDeleteBtn").on("click", function() {
                if (userIdToDelete) {
                    var deleteUrl = "{{ route('user.destroy', ':id') }}";
                    deleteUrl = deleteUrl.replace(':id', userIdToDelete);
                    console.log('delete url: ' + deleteUrl);
                    var form = $("<form>", {
                        method: "post",
                        action: deleteUrl
                    });

                    // Add the CSRF token
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    var csrfField = $("<input>", {
                        type: "hidden",
                        name: "_token",
                        value: csrfToken
                    });
                    form.append(csrfField);

                    // Add the method field
                    var methodField = $("<input>", {
                        type: "hidden",
                        name: "_method",
                        value: "DELETE"
                    });
                    form.append(methodField);

                    // Append the form to the document body and submit it
                    form.appendTo("body").submit();
                }
            });

        });
    </script>
@stop
