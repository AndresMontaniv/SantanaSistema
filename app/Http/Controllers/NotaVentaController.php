<?php

namespace App\Http\Controllers;

use App\Models\notaVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class NotaVentaController extends Controller
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
        $notaVentas=notaVenta::all();
        return view('notaVenta.index', compact('notaVentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $dato=request()->validate([
            'cantidad'=> ['required', 'min:1','max:10'],
            ]);
        $productoId=request('productoId');
        $ventaId=request('ventaId');
        $cant=request('cantidad');
        $monto=DB::table('productos')->where('id',$productoId)->value('precioDeVenta');
        $productoStock=DB::table('productos')->where('id',$productoId)->value('stock');

        if($cant<=$productoStock){
            $notaVenta=notaVenta::create([
                'ventaId'=> request('ventaId'),
                'productoId'=> request('productoId'),
                'cantidad'=> request('cantidad'),
                'montoTotal'=> $monto*$cant,
            ]);
            $total=DB::table('nota_ventas')->where('ventaId',$ventaId)->sum('montoTotal');
            DB::table('ventas')->where('id',$ventaId)->update([
                'total'=>$total]);
            DB::table('ingresos')->where('idVentas',$ventaId)->update([
                'total'=>$total
            ]);
            
            $cant=request('cantidad');
            $nuevoStock=$productoStock-$cant;
            DB::table('productos')->where('id',$productoId)->update([
                'stock'=>$nuevoStock
                

            ]);
        }
        return redirect(route('notaVentas.show', $ventaId));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=Venta::findOrFail($id);
        $notas=DB::table('nota_ventas')->where('ventaId',$venta->id)->get();
        $productos=DB::table('productos')->get();
        return view('notaVenta.create',compact('venta'),['productos'=>$productos, 'notas'=>$notas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(notaVenta $notaVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notaVenta $notaVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set("America/La_Paz");
        $ventaId=DB::table('nota_ventas')->where('id',$id)->value('ventaId');
        $productoId=DB::table('nota_ventas')->where('id',$id)->value('productoId');
        $productoStock=DB::table('productos')->where('id',$productoId)->value('stock');
        $cantidad=DB::table('nota_ventas')->where('id',$id)->value('cantidad');
        
        $nuevoStock=$productoStock+$cantidad;
        DB::table('productos')->where('id',$productoId)->update([
            'stock'=>$nuevoStock
        ]);
        notaVenta::destroy($id);
        $total=DB::table('nota_ventas')->where('ventaId',$ventaId)->sum('montoTotal');
        DB::table('ventas')->where('id',$ventaId)->update([
            'total'=>$total]);
        DB::table('ingresos')->where('idVentas',$ventaId)->update([
            'total'=>$total
        ]);
        return redirect(route('notaVentas.show', $ventaId));
        
    }
}
