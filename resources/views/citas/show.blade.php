@extends('app')
@section('content')
<div class="container-fluid d-flex justify-content-center aling-items-center">
    <div class="card mt-4">
        <center>
            <div class="card-header d-inline">
                <h1>Formulario - Ver Cita</h1>
            </div>
        </center>
        <div class="card-footer">
            <a href="{{ route('citas.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('citas.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('citas.partials.form')
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
@endsection
