<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas=venta::all();
        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=DB::table('users')->get();
        return view('venta.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage son doces rosas que hablaran de mi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dato=Venta::create([
            'fecha'=> request('fecha'),
            'usuarioId'=> request('usuarioId'),
        ]);
        return redirect('ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=Venta::findOrFail($id);
        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta=Venta::findOrFail($id);
        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $dato=request()->validate([
            'fecha'=> ['required'],
            'usuarioId'=> ['required'],
        ]);
        $venta=Venta::findOrFail($id);
           DB::table('ventas')->where('id',$id)->update([
                'fecha'=>$dato['fecha'],
                'usuarioId'=>$dato['usuarioId'],

            ]);
        return redirect('ventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Venta::destroy($id);
        return redirect('ventas');
    }
}
