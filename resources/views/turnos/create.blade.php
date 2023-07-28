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
                                <input type="time" class="form-control" name="start_time" id="start_time"
                                    placeholder="Hora de ingreso" required>
                                <label for="floatingInput">Hora de ingreso</label>
                                <div id="start_timeHelp" class="form-text">
                                    @error('start_time')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" name="end_time" id="end_time"
                                    placeholder="HORA DE SALIDA" required>
                                <label for="floatingInput">Hora de salida</label>
                                <div id="end_timeHelp" class="form-text">
                                    @error('end_time')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <button type="button" class="btn btn-warning" id="agregarBtn">AGREGAR DÍA</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div id="diasContainer"></div>
                        <button type="submit" class="btn btn-success">GUARDAR TURNO</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function validarFormulario() {
            const dias = $('#diasContainer .dia');

            if (dias.length === 0) {
                alert('Por favor, añade al menos un día.');
                return false;
            }

            return true;
        }

        $(document).ready(function() {
            $('#agregarBtn').click(function() {
                const nuevoDia = `
                    <div class="dia my-2">
                        <div class="d-flex align-items-center">
                            <select class="form-select mr-2" name="days[]" required>
                                @foreach ($dias as $dia)
                                    <option value="{{ $dia->id }}">{{ $dia->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-danger eliminarBtn">X</button>
                        </div>
                    </div>
                `;

                $('#diasContainer').append(nuevoDia);
            });

            $(document).on('click', '.eliminarBtn', function() {
                $(this).closest('.dia').remove();
            });
        });
    </script>
@stop
