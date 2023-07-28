@extends('app')
@section('content')
    <br>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
    <div class="card mt-3">
        <center>
            <div class="card-header d-inline">
                <h1>CONSULTAS</h1>
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
                    <a href="{{ route('consultas.create') }}">
                        <i class="fas fa-plus"></i>
                        Agregar</a>
                </div>
                @if ($consultas->total() > 10)
                    {{ $consultas->links() }}
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Razon</th>
                            <th>Diagnostico</th>
                            <th>Tratamiento</th>
                            <th>Examen Fisico</th>
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
                        @foreach ($consultas as $consulta)
                            <tr>
                                <th scope="row">{{ $valor++ }}</th>
                                <td>{{ $consulta->reason }}</td>
                                <td>{{ $consulta->diagnosis }}</td>
                                <td>{{ $consulta->treatment }}</td>
                                @if ($consulta->physical_exam == true)
                                    <td>Realizado</td>
                                @else
                                    <td>Sin Realizar</td>
                                @endif
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <div class="container">
                                            <a href="{{ route('consultas.show', $consulta->id) }}"><i
                                                    class="fas fa-eye"></i></a>
                                        </div>
                                        <div class="container">
                                        <a href="{{ route('consultas.edit', $consulta->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="container">
                                        <button type="submit" form="delete_{{ $consulta->id }}"
                                            onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form action="{{ route('consultas.destroy', $consulta->id) }}"
                                            id="delete_{{ $consulta->id }}" method="POST" enctype="multipart/form-data"
                                            hidden>
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
            @if ($consultas->total() > 10)
                {{ $consultas->links() }}
            @endif
        </div>
    </div>
    </div>
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('consultas.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('consultas.index') }}?limit=" + $('#limit').val() + '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
