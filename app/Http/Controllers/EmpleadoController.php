<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
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
        $empleados=Empleado::all();
        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $users=DB::table('users')->get();
        return view('empleado.create',['users'=>$users]);
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
        $empleado=Empleado::create([
            'ci'=> request('ci'),
            'nombre'=> request('nombre'),
            'fechaNac'=> request('fechaNac'),
            'sexo'=> request('sexo'),
            'telefono'=> request('telefono'),
            'user_id'=> request('user_id'),
        ]);
        return redirect('empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado=Empleado::findOrFail($id);
        $users=DB::table('users')->get();
        return view('empleado.show',compact('empleado'),['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrFail($id);
        $users=DB::table('users')->get();
        return view('empleado.edit',compact('empleado'),['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set("America/La_Paz");
        DB::table('empleados')->where('id',$id)->update([
            'ci'=> request('ci'),
            'nombre'=> request('nombre'),
            'fechaNac'=> request('fechaNac'),
            'sexo'=> request('sexo'),
            'telefono'=> request('telefono'),
            'user_id'=> request('user_id')

        ]);
        return redirect('empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set("America/La_Paz");
        Empleado::destroy($id);

        return redirect('empleados');
    }
}
