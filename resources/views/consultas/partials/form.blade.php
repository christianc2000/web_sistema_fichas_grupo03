@csrf
<div class="row">
    @if (isset($consulta))
        <div class="col-12">
            <br>
            <h5>Examén Físico</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="physical_exam" id="flexRadioDefault1" value="true"
                    @if ((isset($consulta->physical_exam) ? $consulta->physical_exam : old('physical_exam')) == true) checked @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                    Terminado
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="physical_exam" id="flexRadioDefault1" value="false"
                    @if ((isset($consulta->physical_exam) ? $consulta->physical_exam : old('physical_exam')) == false) checked @endif>
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
                <option value="{{ $doctor->id }}" @if ((isset($consulta->doctor_id) ? $consulta->doctor_id : old('doctor_id')) == $doctor->id) selected @endif>
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
                <option value="{{ $paciente->id }}" @if ((isset($consulta->patient_id) ? $consulta->patient_id : old('patient_id')) == $paciente->id) selected @endif>
                    {{ $paciente->name }} {{ $paciente->lastname }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="Razon" class="form-control" name="reason"
                value="{{ isset($consulta) ? $consulta->reason : old('reason') }}">
            <label>Razon</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="diagnostico" class="form-control" name="diagnosis"
                value="{{ isset($consulta) ? $consulta->diagnosis : old('diagnosis') }}">
            <label>Diagnostico</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="tratamiento" class="form-control" name="treatment"
                value="{{ isset($consulta) ? $consulta->treatment : old('treatment') }}">
            <label>Tratamiento</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="detalles" class="form-control" name="details"
                value="{{ isset($prescriptions) ? $prescriptions->details : old('details') }}">
            <label>Detalles</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="age" class="form-control" name="age"
                value="{{ isset($physical_exam) ? $physical_exam->age : old('age') }}">
            <label>Años</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="weight" class="form-control" name="weight"
                value="{{ isset($physical_exam) ? $physical_exam->weight : old('weight') }}">
            <label>Peso</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="temperatura" class="form-control" name="temperature"
                value="{{ isset($physical_exam) ? $physical_exam->temperature : old('temperature') }}">
            <label>Temperatura</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="fc" class="form-control" name="fc"
                value="{{ isset($physical_exam) ? $physical_exam->fc : old('fc') }}">
            <label>Frecuencia Cardiaca</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="pa" class="form-control" name="pa"
                value="{{ isset($physical_exam) ? $physical_exam->pa : old('pa') }}">
            <label>Presion Arterial</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="fr" class="form-control" name="fr"
                value="{{ isset($physical_exam) ? $physical_exam->fr : old('fr') }}">
            <label>Frecuencia Respiratoria</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="sat" class="form-control" name="sat"
                value="{{ isset($physical_exam) ? $physical_exam->sat : old('sat') }}">
            <label>Oxigeno en Sangre</label>
        </div>
        <br>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="o2" class="form-control" name="o2"
                value="{{ isset($physical_exam) ? $physical_exam->o2 : old('o2') }}">
            <label>Nivel de Oxigeno</label>
        </div>
    </div>
</div>
