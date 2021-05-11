<?php

namespace App\Http\Controllers;

use App\Models\pagoServicioBasico;
use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoServicioBasicoController extends Controller
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
        $pagoServicioBasicos=pagoServicioBasico::all();
        return view('pago_servicio_basico.index', compact('pagoServicioBasicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicioBasicos=DB::table('servicio_basicos')->get();
        return view('pago_servicio_basico.create',['servicioBasicos'=>$servicioBasicos]);
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
        $pagoServicioBasicos=pagoServicioBasico::create([
            'servicioBasico_id'=> request('servicioBasicoId'),
            'monto'=> request('monto'),
        ]);
        $gasto=Gasto::create([
            'sb'=> $pagoServicioBasicos->id,
            'descripcion'=> 'Pago de Servicio Basico',
            'total'=> request('monto'),
        ]);
        return redirect()->route('pagoServicioBasicos.index');
    }

    /**  
     * Display the specified resource.
     *
     * @param  \App\Models\pagoServicioBasico  $pagoServicioBasico
     * @return \Illuminate\Http\Response
     */
    public function show(pagoServicioBasico $pagoServicioBasico)
    {
        return view('pago_servicio_basico.show',compact('pagoServicioBasico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pagoServicioBasico  $pagoServicioBasico
     * @return \Illuminate\Http\Response
     */
    public function edit(pagoServicioBasico $pagoServicioBasico)
    {
        $servicioBasicos=DB::table('servicio_basicos')->get();
        return view('pago_servicio_basico.edit',compact('pagoServicioBasico'),
        ['servicioBasicos'=>$servicioBasicos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pagoServicioBasico  $pagoServicioBasico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagoServicioBasico $pagoServicioBasico)
    {
        date_default_timezone_set("America/La_Paz");
        $pagoServicioBasico->servicioBasico_id=$request->servicioBasicoId;
        $pagoServicioBasico->monto=$request->monto;
        $pagoServicioBasico->save();
        DB::table('gastos')->where('sb',$pagoServicioBasico->id)->update([
            'total'=> $request->monto
        ]);
        return redirect()->route('pagoServicioBasicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pagoServicioBasico  $pagoServicioBasico
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagoServicioBasico $pagoServicioBasico)
    {
        date_default_timezone_set("America/La_Paz");
        $gasto=DB::table('gastos')->where('sb',$pagoServicioBasico->id)->value('id');
        $pagoServicioBasico->delete();
        Gasto::destroy($gasto);
        return redirect()->route('pagoServicioBasicos.index');
    }
}
