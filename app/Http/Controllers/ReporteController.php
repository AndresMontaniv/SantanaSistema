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
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        date_default_timezone_set("America/La_Paz");
        $nombre=date('m Y');
        $rep=DB::table('reportes')->where('nombre',$nombre)->exists();
        if (!$rep){
            $gastos=DB::table('gastos')->get();
            $ingresos=DB::table('ingresos')->get();
            $totalGastos=0;
            $totalIngresos=0;
            foreach ($gastos as $gasto){
                $date=date_create($gasto->updated_at);
                $fecha=date_format($date,"m Y");
                if ($fecha===$nombre){
                    $montoGasto=$gasto->total;
                    $totalGastos+=$montoGasto;
                }
            }
            foreach ($ingresos as $ingreso){
                $date=date_create($ingreso->updated_at);
                $fecha=date_format($date,"m Y");
                if ($fecha===$nombre){
                    $montoIngreso=$ingreso->total;
                    $totalIngresos+=$montoIngreso;
                }
            }
            $general=$totalIngresos-$totalGastos;
            $reporte=Reporte::create([
                'nombre'=> $nombre,
                'totalGastos'=> $totalGastos,
                'totalIngresos'=> $totalIngresos,
                'general'=> $general,
            ]);
        }
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
        date_default_timezone_set("America/La_Paz");
        $nombre=DB::table('reportes')->where('id',$id)->value('nombre');
        $gastos=DB::table('gastos')->get();
        $ingresos=DB::table('ingresos')->get();
        $totalGastos=0;
        $totalIngresos=0;
        foreach ($gastos as $gasto){
            $date=date_create($gasto->updated_at);
            $fecha=date_format($date,"m Y");
            if ($fecha===$nombre){
                $montoGasto=$gasto->total;
                $totalGastos+=$montoGasto;
            }
        }
        foreach ($ingresos as $ingreso){
            $date=date_create($ingreso->updated_at);
            $fecha=date_format($date,"m Y");
            if ($fecha===$nombre){
                $montoIngreso=$ingreso->total;
                $totalIngresos+=$montoIngreso;
            }
        }
        $general=$totalIngresos-$totalGastos;
        $reporte=Reporte::findOrFail($id);
        DB::table('reportes')->where('id',$id)->update([
            'totalGastos'=> $totalGastos,
            'totalIngresos'=> $totalIngresos,
            'general'=> $general
        ]);
    
    return redirect('reportes');
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
        date_default_timezone_set("America/La_Paz");
        DB::table('reportes')->where('id',$id)->update([
            'totalGastos'=> request('totalGastos'),
            'totalIngresos'=> request('totalIngresos'),
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
        date_default_timezone_set("America/La_Paz");
        Reporte::destroy($id);
        return redirect('reportes');
    }
}
