<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Gasto;
use App\Models\notaCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras=Compra::all();
        return view('compra.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
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
        $compra=Compra::create([
            'usuarioId'=> request('userId'),
        ]);
        $gasto=Gasto::create([
            'compras'=> $compra->id,
            'descripcion'=> 'Compra de Productos',
            'total'=> 0.0,
        ]);
        return redirect(route('notaCompras.show', $compra));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra=Compra::findOrFail($id);
        $notas=DB::table('nota_compras')->where('compraId',$compra->id)->get();
        return view('compra.show',compact('compra'),['notas'=>$notas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra=Compra::findOrFail($id);
        return redirect(route('notaCompras.show', $compra));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $dato=request()->validate([
            'fecha'=> ['required'],
            'usuarioId'=> ['required'],
        ]);
        $compra=Compra::findOrFail($id);
           DB::table('compras')->where('id',$id)->update([
                'fecha'=>$dato['fecha'],
                'usuarioId'=>$dato['usuarioId'],

            ]);
        return redirect('compras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notas=DB::table('nota_compras')->where('compraId',$id)->get();
        $gasto=DB::table('gastos')->where('compras',$id)->value('id');
        foreach ($notas as $nota){
            $notaId=$nota->id;
            notaCompra::destroy($notaId);
        }
        Compra::destroy($id);
        Gasto::destroy($gasto);
        return redirect('compras');
    }
}
