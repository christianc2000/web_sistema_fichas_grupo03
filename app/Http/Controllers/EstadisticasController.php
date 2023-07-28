<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadisticasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadisticas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadisticasRequest $request)
    {
        $resultados = DB::table($request->table)
            ->selectRaw('DATE(created_at) as fecha, COUNT(*) as cantidad')
            ->whereBetween('created_at', [$request->fecha_ini, $request->fecha_fin])
            ->groupBy('fecha')
            ->orderBy('fecha', 'ASC')
            ->get();
        $timestamps = [];
        $values = [];
        foreach ($resultados as $resultado) {
            $timestamps[] = $resultado->fecha;
            $values[] = $resultado->cantidad;
        }
        $nombre = '';
        if ($request->table == 'consultation_sheets') {
            $nombre = 'Fichas';
        } else {
            if ($request->table == 'medical_consultations') {
                $nombre = 'Consultas';
            } else {
                if ($request->table == 'dates') {
                    $nombre = 'Citas';
                }
            }
        }
        
        return view('estadisticas.show', compact('timestamps', 'values', 'nombre'));
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
