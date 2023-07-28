@extends('app')
@section('content')
<div class="container-fluid d-flex justify-content-center aling-items-center">
    <div class="card mt-4">
        <center>
            <div class="card-header d-inline">
                <h1>Formulario - Editar Consulta</h1>
            </div>
        </center>
        <div class="card-header d-inline-flex">
            <a href="{{ route('consultas.index') }}">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('consultas.update', $consulta->id) }}" method="POST" enctype="multipart/form-data" id="update">
                @method('PUT')
                @include('consultas.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button form="update">
                <i class="fas fa-pencil-alt"></i> Editar
            </Button>
        </div>
    </div>
</div>
@endsection
