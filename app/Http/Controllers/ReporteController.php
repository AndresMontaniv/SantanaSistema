<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportes=Reporte::all();
        return view('reporte.index', compact('reportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reporte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reporte=Reporte::create([
            'idGastos'=> request('idGastos'),
            'idIngresos'=> request('idIngresos'),
        ]);
        return redirect('reportes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reporte=Reporte::findOrFail($id);
        return view('reporte.show',compact('reporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reporte=Reporte::findOrFail($id);
        return view('reporte.edit',compact('reporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('reportes')->where('id',$id)->update([
            'idGastos'=> request('idGastos'),
            'idIngresos'=> request('idIngresos'),
        ]);
        return redirect('reportes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reporte::destroy($id);
        return redirect('reportes');
    }
}