@extends('app')
@section('content')
<div class="container-fluid d-flex justify-content-center aling-items-center">
    <div class="card mt-4">
        <center>
            <div class="card-header d-inline">
                <h1>Formulario - Crear Cita</h1>
            </div>
        </center>
        <div class="card-footer">
            <a href="{{ route('citas.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('citas.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('citas.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="create">
                <i class="fas fa-plus"></i> Crear
            </Button>
        </div>
    </div>
</div>
@endsection
