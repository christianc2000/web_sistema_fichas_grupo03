@extends('app')
@section('content')
    <br>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card mt-3">
            <center>
                <div class="card-header d-inline">
                    <h1>HISTORIALES CLINICOS</h1>
                </div>
            </center>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <a class="navbar-brand">Listar</a>
                            <select class="form-select" id="limit" name="limit">
                                @foreach ([10, 20, 50, 100] as $limit)
                                    <option value="{{ $limit }}"
                                        @if (isset($_GET['limit'])) {{ $_GET['limit'] == $limit ? 'selected' : '' }} @endif>
                                        {{ $limit }}</option>
                                @endforeach
                            </select>
                            <?php
                            if (isset($_GET['page'])) {
                                $pag = $_GET['page'];
                            } else {
                                $pag = 1;
                            }
                            if (isset($_GET['limit'])) {
                                $limit = $_GET['limit'];
                            } else {
                                $limit = 10;
                            }
                            $comienzo = $limit;
                            ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <a class="navbar-brand">Buscar</a>
                            <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search"
                                aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>
                    </div>
                    <div class="col-1">
                        <a href="{{ route('historiales.create') }}">
                            <i class="fas fa-plus"></i>
                            Agregar</a>
                    </div>
                    @if ($historiales->total() > 10)
                        {{ $historiales->links() }}
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Paciente</th>
                                <th>Años</th>
                                <th>Genero</th>
                                <th>Ocupación</th>
                                <th>Razón</th>
                                <th>Diagnóstico</th>
                                <th>Tratamiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $valor = 1;
                            if ($pag != 1) {
                                $valor = $comienzo + 1;
                            }
                            //$valor = 1;
                            ?>
                            @foreach ($historiales as $historial)
                                <tr>
                                    <th scope="row">{{ $valor++ }}</th>
                                    <td>{{ $historial->patient_full_name }}</td>
                                    <td>{{ $historial->age }}</td>
                                    <td>{{ $historial->gender }}</td>
                                    <td>{{ $historial->occupation }}</td>
                                    <td>{{ $historial->reason }}</td>
                                    <td>{{ $historial->diagnostic_impression }}</td>
                                    <td>{{ $historial->behavior_and_treatment }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <div class="container">
                                                <a href="{{ route('historiales.show', $historial->id) }}"><i
                                                        class="fas fa-eye"></i></a>
                                            </div>
                                            <div class="container">
                                                <a href="{{ route('historiales.edit', $historial->id) }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="container">
                                                <button type="submit" form="delete_{{ $historial->id }}"
                                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form action="{{ route('historiales.destroy', $historial->id) }}"
                                                    id="delete_{{ $historial->id }}" method="POST"
                                                    enctype="multipart/form-data" hidden>
                                                    @csrf
                                                    @method('DELETE')
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
            <div class="card-footer">
                @if ($historiales->total() > 10)
                    {{ $historiales->links() }}
                @endif
            </div>
        </div>
    </div>
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('historiales.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('historiales.index') }}?limit=" + $('#limit').val() + '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
