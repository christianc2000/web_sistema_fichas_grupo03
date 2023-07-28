@csrf
<div class="row">
    <div class="col-12">
        <label>
            <h5>Elegir Datos a Graficar</h5>
        </label>
        <select name="table" class="form-control">
            <option value="">Elegir Datos...</option>
            <option value="consultation_sheets">Fichas Realizadas</option>
            <option value="medical_consultations">Consultas Realizadas</option>
            <option value="dates">Citas Realizadas</option>
        </select>
    </div>
    <div class="col-12">
        <br>
        <div class="form-floating">
            <input type="date" placeholder="Fecha de Inicio" class="form-control" name="fecha_ini" value="">
            <label>Fecha de Inicio</label>
        </div>
    </div>
    <div class="col-12">
        <br>
        <div class="form-floating">
            <input type="date" placeholder="Fecha de Fin" class="form-control" name="fecha_fin" value="">
            <label>Fecha de Fin</label>
        </div>
    </div>
</div>
