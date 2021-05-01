<?php

namespace App\Http\Controllers;

use App\Models\notaCompra;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaCompras=notaCompra::all();
        return view('notaCompra.index', compact('notaCompras'));
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
        $productoId=request('productoId');
        $compraId=request('compraId');
        $cant=request('cantidad');
        $monto=DB::table('productos')->where('id',$productoId)->value('precioDeCompra');
        $notaCompra=notaCompra::create([
            'compraId'=> request('compraId'),
            'productoId'=> request('productoId'),
            'cantidad'=> request('cantidad'),
            'montoTotal'=> $monto*$cant,
        ]);
        $total=DB::table('nota_compras')->where('compraId',$compraId)->sum('montoTotal');
        DB::table('compras')->where('id',$compraId)->update([
            'total'=>$total

        ]);
        return redirect(route('notaCompras.show', $compraId));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra=Compra::findOrFail($id);
        $notas=DB::table('nota_compras')->where('compraId',$compra->id)->get();
        $productos=DB::table('productos')->get();
        return view('notaCompra.create',compact('compra'),['productos'=>$productos, 'notas'=>$notas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(notaCompra $notaCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notaCompra $notaCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compraId=DB::table('nota_compras')->where('id',$id)->value('compraId');
        notaCompra::destroy($id);
        return redirect(route('notaCompras.show', $compraId));
    }
}
