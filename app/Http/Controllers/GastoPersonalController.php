<?php

namespace App\Http\Controllers;

use App\Models\gastoPersonal;
use Illuminate\Http\Request;

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
        $gastopersonals=gastoPersonal::create([
            'detalle'=> request('detalle'),
            'precio'=> request('precio'),
            'cantidad'=> request('cantidad'),
            'costo'=> request('cantidad')*request('precio'),
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
        $gastoPersonal->cantidad=$request->cantidad;
        $gastoPersonal->costo=$request->precio*$request->cantidad;
        $gastoPersonal->save();
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
        $gastoPersonal->delete();
        return redirect()->route('gastoPersonals.index');
    }
}
