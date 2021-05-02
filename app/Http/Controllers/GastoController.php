<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos=Gasto::all();
        return view('gasto.index', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gasto.create');
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
        $gasto=Gasto::create([
            'gastosPersonales'=> request('detalle'),
            'total'=> request('precio'),
        ]);
        return redirect('gastos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gasto=Gasto::findOrFail($id);
        return view('gasto.show',compact('gasto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto=Gasto::findOrFail($id);
        return view('gasto.edit',compact('gasto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::table('gastos')->where('id',$id)->update([
            'idGastosPersonales'=> request('idGastosPersonales'),
            'idPagosSB'=> request('idPagosSB'),
        ]);
        return redirect('gastos');
//preguntar a andres culo al reves lol
        

/*     $request->validate([
            'idGastosPersonales'=>'required',
            'idPagoSB'=> 'required'
        ]);

        $gasto-> update($request->all());
        return redirect()->route('gasto.show', $gasto); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gasto::destroy($id);
        return redirect('gastos'); 
        //preguntar a montano

    /*     $gasto->delete();
        return redirect()->route('gasto.index')->with('info','El proveedor se elimino con exito'); 
    */
    }
}
