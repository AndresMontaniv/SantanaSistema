<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobantes=Comprobante::all();
        return view('comprobante.index', compact('comprobantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comprobante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comprobante=Comprobante::create([
            'nombre'=> request('nombre'),
        ]);
        return redirect('comprobantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comprobante=Comprobante::findOrFail($id);
        return view('comprobante.show',compact('comprobante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comprobante=Comprobante::findOrFail($id);
        return view('comprobante.edit',compact('comprobante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('comprobantes')->where('id',$id)->update([
            'nombre'=> request('nombre'),
        ]);
        return redirect('comprobantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comprobante  $comprobante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comprobante::destroy($id);
        return redirect('comprobantes'); 
    }
}
