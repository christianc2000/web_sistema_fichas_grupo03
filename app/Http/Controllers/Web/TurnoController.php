<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use App\Models\DiaTurno;
use App\Models\Sala;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class TurnoController extends Controller
{


    public function serverSideProcessing()
    {
        $dias = Dia::with('diaturnos')->get();

        return DataTables::of($dias)
            ->addColumn('turno', function ($row) {
                return $row->diaturnos->turno->name;
            })
            ->addColumn('duracion', function ($row) {
                return $row->diaturnos->turno->start_time . '-' . $row->diaturnos->turno->end_time;
            })
            ->addColumn('sala', function ($row) {
                return $row->diaturnos->turno->sala->name;
            })
            ->addColumn('activo', function ($row) {
                return $row->diaturnos->turno->active == 1 ? 'Ocupado' : 'Disponible';
            })
            ->addColumn('opciones', function ($row) {
                // Devuelve el HTML para las opciones
                return '<a href="#">Ocupar Turno</a><a href="#">Finalizar Turno</a>';
            })
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias = Dia::all();
        return view('turnos.index', compact('dias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('type', 'D')->get();
        $dias = Dia::all();
        return view('turnos.create', compact('users', 'dias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'room' => 'required|max:255',
            'doctor_id' => 'required|exists:doctors,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'days' => 'required|array',
            'days.*' => 'required|integer|between:1,7'
        ]);

        $room = Sala::create(['name' => $request->room]);
        $turno = Turno::create([
            'name' => $request->name,
            'active' => true,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'room_id' => $room->id
        ]);
        foreach ($request->days as $id_day) {
            DiaTurno::create([
                'day_id' => $id_day,
                'turn_id' => $turno->id
            ]);
        }
        Session::flash('success', 'Turno creado exitosamente.');
        return redirect()->route('turno.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
