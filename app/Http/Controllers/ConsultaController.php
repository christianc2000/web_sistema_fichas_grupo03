<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('America/La_Paz');

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consultas = DB::table('medical_consultations')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $consultas = $consultas->where('id', 'like', '%' . $request->search . '%')
                ->orWhere('reason', 'like', '%' . $request->search . '%')
                ->orWhere('physical_exam', 'like', '%' . $request->search . '%')
                ->orWhere('diagnosis', 'like', '%' . $request->search . '%')
                ->orWhere('treatment', 'like', '%' . $request->search . '%');
        }
        $consultas = $consultas->paginate($limit)->appends($request->all());
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctores = DB::table('users')->where('type', 'D')->get();
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('consultas.create', compact('doctores', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultaRequest $request)
    {
        $registration_date = date('Y-m-d H:m:s');
        $historial = DB::table('clinic_historys')->where('patient_id', $request->patient_id)->first();
        //dd($request);
        DB::insert('INSERT INTO medical_consultations (reason, physical_exam, diagnosis, treatment, doctor_id, 
        patient_id, clinic_history_id) VALUES (?, ?, ?, ?, ?, ?, ?)', 
        [$request->reason, true, $request->diagnosis, $request->treatment, $request->doctor_id, $request->patient_id, 
        $historial->id]);
        //
        $ult = DB::table('medical_consultations')->orderBy('id', 'DESC')->first();
        //
        DB::insert('INSERT INTO physical_exams (age, weight, temperature, fc, pa, 
        fr, sat, o2, medical_consultation_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [$request->age, $request->weight, $request->temperature, $request->fc, $request->pa, $request->fr, 
        $request->sat, $request->o2, $ult->id]);
        DB::insert('INSERT INTO prescriptions (details, registration_date, medical_consultation_id) VALUES (?, ?, ?)', 
        [$request->details, $registration_date, $ult->id]);
        return redirect()->route('consultas.index')->with('message', 'Consulta Agregada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = DB::table('medical_consultations')->where('id', $id)->first();
        $physical_exam = DB::table('physical_exams')->where('medical_consultation_id', $consulta->id)->first();
        $prescriptions = DB::table('prescriptions')->where('medical_consultation_id', $consulta->id)->first();
        $doctores = DB::table('users')->where('type', 'D')->get();
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('consultas.show', compact('consulta', 'doctores', 'pacientes', 'physical_exam', 'prescriptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = DB::table('medical_consultations')->where('id', $id)->first();
        $physical_exam = DB::table('physical_exams')->where('medical_consultation_id', $consulta->id)->first();
        $prescriptions = DB::table('prescriptions')->where('medical_consultation_id', $consulta->id)->first();
        $doctores = DB::table('users')->where('type', 'D')->get();
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('consultas.edit', compact('consulta', 'doctores', 'pacientes', 'physical_exam', 'prescriptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultaRequest $request, $id)
    {
        $consulta = DB::table('medical_consultations')->where('id', $id)->first();
        $historial = DB::table('clinic_historys')->where('patient_id', $request->patient_id)->first();
        DB::table('medical_consultations')->where('id', $id)->update([
            'reason' => $request->reason,
            'physical_exam' => $request->physical_exam,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'clinic_history_id' => $historial->id,
        ]);
        DB::table('physical_exams')->where('medical_consultation_id', $consulta->id)->update([
            'age' => $request->age,
            'weight' => $request->weight,
            'temperature' => $request->temperature,
            'fc' => $request->fc,
            'pa' => $request->pa,
            'fr' => $request->fr,
            'sat' => $request->sat,
            'o2' => $request->o2,
        ]);
        DB::table('prescriptions')->where('medical_consultation_id', $consulta->id)->update([
            'details' => $request->details,
        ]);
        return redirect()->route('consultas.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('medical_consultations')->where('id', $id)->delete();
        DB::table('physical_exams')->where('medical_consultation_id', $id)->delete();
        DB::table('prescriptions')->where('medical_consultation_id', $id)->delete();
        return redirect()->route('consultas.index')->with('message', 'consulta Eliminada Con Éxito');
    }
}
