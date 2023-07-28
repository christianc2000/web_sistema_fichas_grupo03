@csrf
<div class="row">
    @if (!isset($ficha))
        <div class="col-12">
            <div class="form-floating">
                <input type="text" placeholder="code" class="form-control" name="code"
                    value="{{ isset($ficha) ? $ficha->code : old('code') }}">
                <label>Code</label>
            </div><br>
        </div>
    @else
        <div class="col-12">
            <br>
            <h5>Control</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="control" id="flexRadioDefault1" value="true"
                    @if ((isset($ficha->control) ? $ficha->control : old('control')) == true) checked @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                    Terminado
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="control" id="flexRadioDefault1" value="false"
                    @if ((isset($ficha->control) ? $ficha->control : old('control')) == false) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                    Sin Terminar
                </label>
            </div>
            <br>
        </div>
    @endif
    <div class="col-12">
        <label>
            <h5>Elegir Un Doctor</h5>
        </label>
        <select name="doctor_id" class="form-control">
            <option value=""> Seleccione Un Doctor... </option>
            @foreach ($doctores as $doctor)
                <option value="{{ $doctor->id }}" @if ((isset($ficha->doctor_id) ? $ficha->doctor_id : old('doctor_id')) == $doctor->id) selected @endif>
                    {{ $doctor->name }} {{ $doctor->lastname }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
    <div class="col-12">
        <label>
            <h5>Elegir Un Paciente</h5>
        </label>
        <select name="patient_name" class="form-control">
            <option value=""> Seleccione Un Paciente... </option>
            @foreach ($pacientes as $paciente)
                @php
                    // Combinamos el nombre y apellidos del paciente en una sola cadena
                    $nombreCompleto = $paciente->name . ' ' . $paciente->lastname;
                    // Obtenemos el valor del campo patient_name de la ficha
                    $patientNameFicha = isset($ficha->patient_name) ? $ficha->patient_name : old('patient_name');
                    // Comprobamos si el nombre completo del paciente coincide con el patient_name de la ficha
                    $selected = $nombreCompleto == $patientNameFicha ? 'selected' : '';
                @endphp
                <option value="{{ $paciente->name }} {{$paciente->lastname}}" {{ $selected }}>
                    {{ $nombreCompleto }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
    
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="servicio" class="form-control" name="service_name"
                value="{{ isset($ficha) ? $ficha->service_name : old('service_name') }}">
            <label>Servicio</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="room" class="form-control" name="room_name"
                value="{{ isset($ficha) ? $ficha->room_name : old('room_name') }}">
            <label>Room</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="double" placeholder="costo" class="form-control" name="cost"
                value="{{ isset($ficha) ? $ficha->cost : old('cost') }}">
            <label>Costo</label>
        </div>
    </div>
</div>
