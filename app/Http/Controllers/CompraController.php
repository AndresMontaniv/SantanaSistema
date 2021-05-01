<?php

namespace App\Http\Controllers;

use App\Models\Compra;
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
        $users=DB::table('users')->get();
        return view('compra.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dato=Compra::create([
            'fecha'=> request('fecha'),
            'usuarioId'=> request('usuarioId'),
        ]);
        return redirect('compras');
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
        return view('compra.show', compact('compra'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=DB::table('users')->get();
        $compra=Compra::findOrFail($id);
        return view('Compra.edit', compact('compra'),['users'=>$users]);
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
        Compra::destroy($id);
        return redirect('compras');
    }
}
