<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('America/La_Paz');

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $citas = DB::table('dates')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $citas = $citas->where('id', 'like', '%' . $request->search . '%')
                ->orWhere('doctor_name', 'like', '%' . $request->search . '%')
                ->orWhere('patient_name', 'like', '%' . $request->search . '%')
                ->orWhere('details', 'like', '%' . $request->search . '%')
                ->orWhere('cancelled', 'like', '%' . $request->search . '%')
                ->orWhere('appointment_date', 'like', '%' . $request->search . '%')
                ->orWhere('registration_date', 'like', '%' . $request->search . '%');
        }
        $citas = $citas->paginate($limit)->appends($request->all());
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = DB::table('users')->where('type', 'P')->get();
        $doctores = DB::table('users')->where('type', 'D')->get();
        return view('citas.create', compact('pacientes', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitaRequest $request)
    {
        $doctor = DB::table('users')->find($request->doctor_id);
        $paciente = DB::table('users')->find($request->patient_id);
        $registration_date = date('Y-m-d');
        DB::insert('INSERT INTO dates (doctor_name, patient_name, details, cancelled, appointment_date, 
        registration_date, patient_id, doctor_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', 
        [$doctor->name, $paciente->name, $request->details, false, $request->appointment_date, 
        $registration_date, $paciente->id, $doctor->id]);
        return redirect()->route('citas.index')->with('message', 'Cita Agregada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = DB::table('dates')->find($id);
        $pacientes = DB::table('users')->where('type', 'P')->get();
        $doctores = DB::table('users')->where('type', 'D')->get();
        return view('citas.show', compact('cita', 'pacientes', 'doctores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = DB::table('dates')->find($id);
        $pacientes = DB::table('users')->where('type', 'P')->get();
        $doctores = DB::table('users')->where('type', 'D')->get();
        return view('citas.edit', compact('cita', 'pacientes', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCitaRequest $request, $id)
    {
        $doctor = DB::table('users')->find($request->doctor_id);
        $paciente = DB::table('users')->find($request->patient_id);
        DB::table('dates')->where('id', $id)->update([
            'doctor_name' => $doctor->name,
            'patient_name' => $paciente->name,
            'details' => $request->details,
            'cancelled' => $request->cancelled,
            'appointment_date' => $request->appointment_date,
            'patient_id' => $paciente->id,
            'doctor_id' => $doctor->id,
        ]);
        return redirect()->route('citas.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('dates')->where('id', $id)->delete();
        return redirect()->route('citas.index')->with('message', 'Cita Eliminada Con Éxito');
    }
}
