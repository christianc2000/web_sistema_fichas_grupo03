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
                    <table class="table table-striped hover table-data" id="myTable_{{ $loop->index }}" style="width:100%">
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
...
@section('js')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $('[id^="myTable_"]').each(function() {
            var diaId = this.id.split('_')[1];
            $(this).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('serverSideProcessing') }}',
                    data: {
                        diaId: diaId
                    }
                },
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
