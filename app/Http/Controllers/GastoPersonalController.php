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
            'cantidad'=> request('cantidad'),
            'precio'=> request('precio'),
            'costo'=> request('cantidad')*request('precio'),
        ]);
        return redirect('gastoPersonals');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gastoPersonal  $gastoPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(gastoPersonal $gastoPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gastoPersonal  $gastoPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(gastoPersonal $gastoPersonal)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gastoPersonal  $gastoPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(gastoPersonal $gastoPersonal)
    {
        //
    }
}
