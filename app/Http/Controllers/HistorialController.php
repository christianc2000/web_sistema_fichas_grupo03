<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $historiales = DB::table('clinic_historys')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $historiales = $historiales->where('id', 'like', '%' . $request->search . '%')
                ->orWhere('patient_full_name', 'like', '%' . $request->search . '%')
                ->orWhere('age', 'like', '%' . $request->search . '%')
                ->orWhere('gender', 'like', '%' . $request->search . '%')
                ->orWhere('occupation', 'like', '%' . $request->search . '%')
                ->orWhere('birth_date', 'like', '%' . $request->search . '%')
                ->orWhere('number_phone', 'like', '%' . $request->search . '%')
                ->orWhere('current_residence', 'like', '%' . $request->search . '%')
                ->orWhere('degree_study', 'like', '%' . $request->search . '%')
                ->orWhere('reason', 'like', '%' . $request->search . '%')
                ->orWhere('disease_history', 'like', '%' . $request->search . '%')
                ->orWhere('general_physical_examination', 'like', '%' . $request->search . '%')
                ->orWhere('pathological_history', 'like', '%' . $request->search . '%')
                ->orWhere('observations', 'like', '%' . $request->search . '%')
                ->orWhere('diagnostic_impression', 'like', '%' . $request->search . '%')
                ->orWhere('supplementary_exam', 'like', '%' . $request->search . '%')
                ->orWhere('behavior_and_treatment', 'like', '%' . $request->search . '%');
        }
        $historiales = $historiales->paginate($limit)->appends($request->all());
        return view('historiales.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('historiales.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $paciente = DB::table('users')->find($request->patient_id);
        $full_name = $paciente->name . ' ' . $paciente->lastname;
        DB::insert('INSERT INTO clinic_historys (patient_full_name, age, gender, occupation, birth_date, 
        number_phone, current_residence, degree_study, reason, disease_history, general_physical_examination,
        pathological_history, observations, diagnostic_impression, supplementary_exam, behavior_and_treatment,
        patient_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
        [$full_name, $request->age, $request->gender, $request->occupation, $request->birth_date, $request->number_phone, 
        $request->current_residence, $request->degree_study, $request->reason, $request->disease_history, 
        $request->general_physical_examination, $request->pathological_history, $request->observations, 
        $request->diagnostic_impression, $request->supplementary_exam, $request->behavior_and_treatment,
        $request->patient_id]);
        return redirect()->route('historiales.index')->with('message', 'historial Agregada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historial = DB::table('clinic_historys')->find($id);
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('historiales.show', compact('historial', 'pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historial = DB::table('clinic_historys')->find($id);
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('historiales.edit', compact('historial', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = DB::table('users')->find($request->patient_id);
        DB::table('clinic_historys')->where('id', $id)->update([
            'patient_full_name' => $paciente->name . ' ' . $paciente->lastname,
            'age' => $request->age,
            'gender' => $request->gender,
            'occupation' => $request->occupation,
            'birth_date' => $request->birth_date,
            'number_phone' => $request->number_phone,
            'current_residence' => $request->current_residence,
            'degree_study' => $request->degree_study,
            'reason' => $request->reason,
            'disease_history' => $request->disease_history,
            'general_physical_examination' => $request->general_physical_examination,
            'pathological_history' => $request->pathological_history,
            'observations' => $request->observations,
            'diagnostic_impression' => $request->diagnostic_impression,
            'supplementary_exam' => $request->supplementary_exam,
            'behavior_and_treatment' => $request->behavior_and_treatment,
            'patient_id' => $request->patient_id,
        ]);
        return redirect()->route('historiales.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('clinic_historys')->where('id', $id)->delete();
        return redirect()->route('historiales.index')->with('message', 'historial Eliminada Con Éxito');
    }

    /*public function indexMedical(Request $request, $id){
        dd($id);
        $medicals = DB::table('clinic_historys')->where('')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $medicals = $medicals->where('id', 'like', '%' . $request->search . '%')
                ->orWhere('type', 'like', '%' . $request->search . '%')
                ->orWhere('details', 'like', '%' . $request->search . '%')
                ->orWhere('registration_date', 'like', '%' . $request->search . '%');
        }
        $medicals = $medicals->paginate($limit)->appends($request->all());
        return view('medicalsHistory.index', compact('medicals'));
    }*/
}
