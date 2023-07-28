@csrf
<div class="row">
    <div class="col-12">
        <label>
            <h5>Elegir Un Paciente</h5>
        </label>
        <select name="patient_id" class="form-control">
            <option value=""> Seleccione Un Paciente... </option>
            @foreach ($pacientes as $paciente)
                <option value="{{ $paciente->id }}" @if ((isset($historial->patient_id) ? $historial->patient_id : old('patient_id')) == $paciente->id) selected @endif>
                    {{ $paciente->name }} {{ $paciente->lastname }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="age" class="form-control" name="age"
                value="{{ isset($historial) ? $historial->age : old('age') }}">
            <label>Años</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <h5>Género</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="M"
                @if ((isset($historial->gender) ? $historial->gender : old('gender')) == 'M') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Masculine
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="F"
                @if ((isset($historial->gender) ? $historial->gender : old('gender')) == 'F') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Ocupacion" class="form-control" name="occupation"
                value="{{ isset($historial) ? $historial->occupation : old('occupation') }}">
            <label>Ocupacion</label>
        </div>
    </div>
    <div class="col-12">
        <br>
        <div class="form-floating">
            <input type="date" placeholder="Fecha de Nacimiento" class="form-control" name="birth_date"
                value="{{ isset($historial) ? $historial->birth_date : old('birth_date') }}">
            <label>Fecha de Nacimiento</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Telefono" class="form-control" name="number_phone"
                value="{{ isset($historial) ? $historial->number_phone : old('number_phone') }}">
            <label>Telefono</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Residencia" class="form-control" name="current_residence"
                value="{{ isset($historial) ? $historial->current_residence : old('current_residence') }}">
            <label>Residencia</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Estudios" class="form-control" name="degree_study"
                value="{{ isset($historial) ? $historial->degree_study : old('degree_study') }}">
            <label>Estudios</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Razon" class="form-control" name="reason"
                value="{{ isset($historial) ? $historial->reason : old('reason') }}">
            <label>Razon</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Historial de Enfermedades" class="form-control" name="disease_history"
                value="{{ isset($historial) ? $historial->disease_history : old('disease_history') }}">
            <label>Historial de Enfermedades</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Examen General Fisico" class="form-control"
                name="general_physical_examination"
                value="{{ isset($historial) ? $historial->general_physical_examination : old('general_physical_examination') }}">
            <label>Examen General Fisico</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Historial Patologico" class="form-control" name="pathological_history"
                value="{{ isset($historial) ? $historial->pathological_history : old('pathological_history') }}">
            <label>Historial Patologico</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Observaciones" class="form-control" name="observations"
                value="{{ isset($historial) ? $historial->observations : old('observations') }}">
            <label>Observaciones</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Diagnostico" class="form-control" name="diagnostic_impression"
                value="{{ isset($historial) ? $historial->diagnostic_impression : old('diagnostic_impression') }}">
            <label>Diagnostico</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Examen Suplementario" class="form-control" name="supplementary_exam"
                value="{{ isset($historial) ? $historial->supplementary_exam : old('supplementary_exam') }}">
            <label>Examen Suplementario</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Tratamiento" class="form-control" name="behavior_and_treatment"
                value="{{ isset($historial) ? $historial->behavior_and_treatment : old('behavior_and_treatment') }}">
            <label>Tratamiento</label>
        </div>
    </div>
</div>
