<?php

namespace App\Http\Controllers;

use App\Models\servicioBasico;
use Illuminate\Http\Request;

class ServicioBasicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicioBasicos=servicioBasico::all();
        return view('servicio_basico.index', compact('servicioBasicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicio_basico.create');
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
        $servicioBasicos=servicioBasico::create([
            'nombre'=> request('nombre'),
        ]);
        return redirect()->route('servicioBasicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servicioBasico  $servicioBasico
     * @return \Illuminate\Http\Response
     */
    public function show(servicioBasico $servicioBasico)
    {
        return view('servicio_basico.show',compact('servicioBasico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicioBasico  $servicioBasico
     * @return \Illuminate\Http\Response
     */
    public function edit(servicioBasico $servicioBasico)
    {
        return view('servicio_basico.edit',compact('servicioBasico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicioBasico  $servicioBasico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servicioBasico $servicioBasico)
    {   
        date_default_timezone_set("America/La_Paz");
        $servicioBasico->nombre=$request->nombre;
        $servicioBasico->save();
        return redirect()->route('servicioBasicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicioBasico  $servicioBasico
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicioBasico $servicioBasico)
    {
        $servicioBasico->delete();
        return redirect()->route('servicioBasicos.index');
    }
}
