@extends('app')

@section('title')
    CREAR TURNO
@stop

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <form action="{{ route('turno.store') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validarFormulario()">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nombre" required>
                                <label for="floatingInput">Nombre</label>
                                <div id="nameHelp" class="form-text">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="room" id="room" placeholder="SALA"
                                    required>
                                <label for="floatingInput">Sala</label>
                                <div id="roomHelp" class="form-text">
                                    @error('room')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="doctor_id" name="doctor_id"
                                    aria-label="Floating label select example" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">Dr. {{ $user->name }}
                                            {{ $user->lastname }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Doctor</label>
                                <div id="doctor_idHelp" class="form-text">
                                    @error('doctor_id')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <button type="button" class="btn btn-warning" id="agregarBtn">AGREGAR</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <table class="table" id="tablaTurnos">
                            <thead>
                                <tr>
                                    <th>Hora Inicial</th>
                                    <th>Hora Final</th>
                                    <th>Día</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Filas dinámicas se agregarán aquí -->
                            </tbody>
                        </table>



                        <button type="submit" class="btn btn-success">GUARDAR TURNO</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function validarFormulario() {
            const filas = $('#tablaTurnos tbody tr');

            for (const fila of filas) {
                const horaInicial = $(fila).find('input[name="start_times[]"]').val();
                const horaFinal = $(fila).find('input[name="end_times[]"]').val();
                const dia = $(fila).find('select[name="days[]"]').val();

                if (horaInicial.trim() === '' || horaFinal.trim() === '' || dia.trim() === '') {
                    alert('Por favor, completa todos los campos de la tabla.');
                    return false;
                }
            }

            return true;
        }

        $(document).ready(function() {
            $('#agregarBtn').click(function() {
                const nuevaFila = `
                        <tr>
                            <td><input type="time" class="form-control" name="start_times[]" required></td>
                            <td><input type="time" class="form-control" name="end_times[]" required></td>
                            <td>
                                <select class="form-select" name="days[]" required>
                                    @foreach ($dias as $dia)
                                        <option value="{{ $dia->id }}">{{ $dia->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><button type="button" class="btn btn-danger eliminarBtn">ELIMINAR</button></td>
                        </tr>
                    `;

                $('#tablaTurnos tbody').append(nuevaFila);
            });

            $(document).on('click', '.eliminarBtn', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@stop
