@csrf
<div class="row">
    <div class="col-12">
        <label>
            <h5>Elegir Un Doctor</h5>
        </label>
        <select name="doctor_id" class="form-control">
            <option value=""> Seleccione Un Doctor... </option>
            @foreach ($doctores as $doctor)
                <option value="{{ $doctor->id }}" @if ((isset($cita->doctor_id) ? $cita->doctor_id : old('doctor_id')) == $doctor->id) selected @endif>
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
        <select name="patient_id" class="form-control">
            <option value=""> Seleccione Un Paciente... </option>
            @foreach ($pacientes as $paciente)
                <option value="{{ $paciente->id }}" @if ((isset($cita->patient_id) ? $cita->patient_id : old('patient_id')) == $paciente->id) selected @endif>
                    {{ $paciente->name }} {{ $paciente->lastname }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="detalles" class="form-control" name="details"
                value="{{ isset($cita) ? $cita->details : old('details') }}">
            <label>Detalles</label>
        </div>
    </div>
    <div class="col-12">
        <br>
        <div class="form-floating">
            <input type="date" placeholder="fecha cita" class="form-control" name="appointment_date"
                value="{{ isset($cita) ? $cita->appointment_date : old('appointment_date') }}">
            <label>Fecha de la cita</label>
        </div>
    </div>
    @if (isset($cita))
    <div class="col-12">
        <br>
        <h5>Cancelado</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="cancelled" id="flexRadioDefault1" value="true"
                @if ((isset($cita->cancelled) ? $cita->cancelled : old('cancelled')) == true) checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                SI
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="cancelled" id="flexRadioDefault1" value="false"
                @if ((isset($cita->cancelled) ? $cita->cancelled : old('cancelled')) == false) checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                NO
            </label>
        </div>
    </div>
    @endif
</div>
