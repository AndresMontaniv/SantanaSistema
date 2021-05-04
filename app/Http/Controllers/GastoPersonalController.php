<?php

namespace App\Http\Controllers;

use App\Models\gastoPersonal;
use Illuminate\Http\Request;
use App\Models\Gasto;
use Illuminate\Support\Facades\DB;

class GastoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastopersonals=gastoPersonal::all();
        return view('gasto_personal.index', compact('gastopersonals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gasto_personal.create');
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
        $gastopersonals=gastoPersonal::create([
            'detalle'=> request('detalle'),
            'precio'=> request('precio'),
        ]); 
        $gasto=Gasto::create([
            'gastosPersonales'=> $gastopersonals->id,
            'descripcion'=> 'Gasto Personal',
            'total'=> request('precio'),
        ]);

        return redirect()->route('gastoPersonals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gastoPersonal  $gastoPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(gastoPersonal $gastoPersonal)
    {
        return view('gasto_personal.show',compact('gastoPersonal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gastoPersonal  $gastoPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(gastoPersonal $gastoPersonal)
    {
        return view('gasto_personal.edit',compact('gastoPersonal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gastoPersonal  $gastoPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gastoPersonal $gastoPersonal)
    {
        $gastoPersonal->detalle=$request->detalle;
        $gastoPersonal->precio=$request->precio;
        $gastoPersonal->save();
        DB::table('gastos')->where('gastosPersonales',$gastoPersonal->id)->update([
            'total'=> $request->precio
        ]);
        return redirect()->route('gastoPersonals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gastoPersonal  $gastoPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(gastoPersonal $gastoPersonal)
    {
        $gasto=DB::table('gastos')->where('gastosPersonales',$gastoPersonal->id)->value('id');
        $gastoPersonal->delete();
        Gasto::destroy($gasto);
        return redirect()->route('gastoPersonals.index');
    }
}
