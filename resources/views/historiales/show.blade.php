@extends('app')
@section('content')
<div class="container-fluid d-flex justify-content-center aling-items-center">
    <div class="card mt-4">
        <center>
            <div class="card-header d-inline">
                <h1>Formulario - Ver Historial Clinico</h1>
            </div>
        </center>
        <div class="card-footer">
            <a href="{{ route('historiales.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('historiales.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('historiales.partials.form')
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
@endsection
