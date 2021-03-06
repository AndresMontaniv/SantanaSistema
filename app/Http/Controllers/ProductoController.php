<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
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
        $productos=Producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
        
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
        $dato=Producto::create([
            'nombre'=> request('nombre'),
            'precioDeCompra'=> request('precioDeCompra'),
            'precioDeVenta'=> request('precioDeVenta'),
            'stock'=>0.0,
        ]);
        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Producto::findOrFail($id);
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set("America/La_Paz");
        $dato=request()->validate([
            'nombre'=> ['required'],
            'precioDeCompra'=> ['required'],
            'precioDeVenta'=> ['required'],
            'stock'=> ['required'],
        ]);
        $producto=Producto::findOrFail($id);
           DB::table('productos')->where('id',$id)->update([
                'nombre'=>$dato['nombre'],
                'precioDeCompra'=>$dato['precioDeCompra'],
                'precioDeVenta'=>$dato['precioDeVenta'],
                'stock'=>$dato['stock'],

            ]);
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set("America/La_Paz");
        Producto::destroy($id);
        return redirect('productos');
    }
}
