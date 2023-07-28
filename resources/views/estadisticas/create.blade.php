@extends('app')
@section('content')
<div class="container-fluid d-flex justify-content-center aling-items-center">
    <div class="card mt-4">
        <center>
            <div class="card-header d-inline">
                <h1>Crear Consulta Para Graficar</h1>
            </div>
        </center>
        <div class="card-body">
            <form action="{{ route('estadisticas.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('estadisticas.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button form="create">
                <i class="fas fa-plus"></i> Crear
            </Button>
        </div>
    </div>
</div>
@endsection
