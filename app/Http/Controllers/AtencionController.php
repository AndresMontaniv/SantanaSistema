<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atencions=Atencion::all();
        return view('atencion.index', compact('atencions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados=DB::table('empleados')->get();
        $clientes=DB::table('clientes')->get();
        $metodos=DB::table('metodos')->get();
        $servicios=DB::table('servicios')->get();
        return view('atencion.create',
                ['empleados'=>$empleados, 'servicios'=>$servicios,'clientes'=>$clientes, 'metodos'=>$metodos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicioId=request('servicioId');
        $montoTotal=DB::table('servicios')->where('id',$servicioId)->value('precio');
        date_default_timezone_set("America/La_Paz");
        $atencion=Atencion::create([
            'servicioId'=> request('servicioId'),
            'empleadoId'=> request('empleadoId'),
            'clienteId'=> request('clienteId'),
            'metodoId'=> request('metodoId'),
            'montoTotal'=> $montoTotal,
        ]);
        $ingreso=Ingreso::create([
            'idVentas'=> null,
            'idPagos'=> $atencion->id,
        ]);
        return redirect('atencions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atencion=Atencion::findOrFail($id);
        return view('atencion.show',compact('atencion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atencion=atencion::findOrFail($id);
        $empleados=DB::table('empleados')->get();
        $clientes=DB::table('clientes')->get();
        $metodos=DB::table('metodos')->get();
        $servicios=DB::table('servicios')->get();
        return view('atencion.edit',compact('atencion'),
        ['empleados'=>$empleados, 'servicios'=>$servicios,'clientes'=>$clientes, 'metodos'=>$metodos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servicioId=request('servicioId');
        $montoTotal=DB::table('servicios')->where('id',$servicioId)->value('precio');
        date_default_timezone_set("America/La_Paz");
        DB::table('atencions')->where('id',$id)->update([
            'servicioId'=> request('servicioId'),
            'empleadoId'=> request('empleadoId'),
            'clienteId'=> request('clienteId'),
            'metodoId'=> request('metodoId'),
            'montoTotal'=> $montoTotal

        ]);
        return redirect('atencions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Atencion::destroy($id);
        return redirect('atencions');
    }
}
