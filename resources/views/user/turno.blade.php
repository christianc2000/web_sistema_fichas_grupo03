@extends('app')

@section('title')
    TURNOS DOCTOR {{ $doctor->user->name }} {{ $doctor->user->lastname }}
@stop
@section('content')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body" style="display: flex; align-items: center;">
                <div class="card-body p-4">
                    <table class="table table-striped hover table-data" id="myTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TURNO</th>
                                <th>FECHA INICIO</th>
                                <th>ACTIVO</th>
                                <th>SALA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dturnos as $dt)
                                <tr>
                                    <td>{{ $dt->turno->id }}</td>
                                    <td>{{ $dt->turno->name }}</td>
                                    <td>{{ $dt->start_date }}</td>
                                    <td>{{ $dt->end_date == null ? 'OCUPAD' : 'DISPONIBLE' }}</td>
                                    <td>{{ $dt->turno->sala->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            var userId = {{ $doctor->id }};
            console.log("user id: ", userId);
            $('#myTable').DataTable({

            });
        });
    </script>
@stop
