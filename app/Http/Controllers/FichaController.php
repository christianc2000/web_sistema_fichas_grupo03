<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFichaRequest;
use App\Http\Requests\UpdateFichaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('America/La_Paz');

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fichas = DB::table('consultation_sheets')->orderBy('registration_date', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $fichas = $fichas->where('code', 'like', '%' . $request->search . '%')
                ->orWhere('patient_name', 'like', '%' . $request->search . '%')
                ->orWhere('doctor_name', 'like', '%' . $request->search . '%')
                ->orWhere('service_name', 'like', '%' . $request->search . '%')
                ->orWhere('room_name', 'like', '%' . $request->search . '%')
                ->orWhere('cost', 'like', '%' . $request->search . '%')
                ->orWhere('registration_date', 'like', '%' . $request->search . '%')
                ->orWhere('reception_name', 'like', '%' . $request->search . '%')
                ->orWhere('control', 'like', '%' . $request->search . '%');
        }
        $fichas = $fichas->paginate($limit)->appends($request->all());
        return view('fichas.index', compact('fichas'));
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
        return view('fichas.create', compact('doctores', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFichaRequest $request)
    {
        $doctor = DB::table('users')->find($request->doctor_id);
        $registration_date = date('Y-m-d H:m:s');
        DB::insert('INSERT INTO consultation_sheets (code, patient_name, doctor_name, service_name, room_name, 
        cost, registration_date, reception_name, control, doctor_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [$request->code, $request->patient_name, $doctor->name, $request->service_name, $request->room_name, $request->cost, 
        $registration_date, auth()->user()->name, false, $doctor->id]);
        return redirect()->route('fichas.index')->with('mensaje', 'Ficha Agregada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha = DB::table('consultation_sheets')->where('code', $id)->first();
        $doctores = DB::table('users')->where('type', 'D')->get();
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('fichas.show', compact('ficha', 'doctores', 'pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ficha = DB::table('consultation_sheets')->where('code', $id)->first();
        $doctores = DB::table('users')->where('type', 'D')->get();
        $pacientes = DB::table('users')->where('type', 'P')->get();
        return view('fichas.edit', compact('ficha', 'doctores', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFichaRequest $request, $id)
    {
        $doctor = DB::table('users')->find($request->doctor_id);
        DB::table('consultation_sheets')->where('code', $id)->update([
            'patient_name' => $request->patient_name,
            'doctor_name' => $doctor->name,
            'service_name' => $request->service_name,
            'room_name' => $request->room_name,
            'cost' => $request->cost,
            'control' => $request->control,
            'reception_name' => auth()->user()->name,
            'doctor_id' => $doctor->id,
        ]);
        return redirect()->route('fichas.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('consultation_sheets')->where('code', $id)->delete();
        return redirect()->route('fichas.index')->with('message', 'Ficha Eliminada Con Éxito');
    }
}
