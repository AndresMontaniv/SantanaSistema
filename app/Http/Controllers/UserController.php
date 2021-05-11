<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empleado;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ver lista de usuarios')->only(['index']);
        $this->middleware('can:registrar usuario')->only(['create', 'store']);
        $this->middleware('can:editar usuario')->only(['edit', 'update']);
        $this->middleware('can:eliminar usuario')->only(['destroy']);
        $this->middleware('can:ver usuario')->only(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = DB::table('empleados')->whereNull('user_id')->get();
        $roles = Role::all();
        return view('users.create', compact('empleados', 'roles'));
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
        $request->validate([
            'name'=>'required|unique:users',
            'password'=>'required',
            'roles'=>'required',
        ]);

        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->password = bcrypt(($request->password));
        $usuario->save();

        if($request->empleados > 0){
            $empleados = Empleado::findOrFail($request->empleados);
            $empleados->user_id = $usuario->id;
            $empleados->save();
        }

        $usuario->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $empleados = DB::table('empleados')->whereNull('user_id')->get();
        //empleado que tiene el $user->id
        $e = DB::table('empleados')->where('user_id', $user->id)->count();

        $empleado = DB::table('empleados')->where('user_id', $user->id)->first();
        $roles = Role::all();
        $rol = DB::table('model_has_roles')->where('model_id', $user->id)->first();
        $rol_name = DB::table('roles')->where('id', $rol->role_id)->first();
        return view('users.edit', compact('user', 'empleados', 'roles', 'rol', 'rol_name', 'empleado', 'e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'name'=> "unique:users,name,$user->id",
            'roles'=>'required',
            'empleados'=> 'required',
        ]);

        $usuario = User::findOrFail($user->id);
        if($usuario->name <> $request->name){
            $usuario->name = $request->name;
        }
        if($request->password <> ''){
            $usuario->password = bcrypt(($request->password));
        }
        $usuario->save();
        $usuario->roles()->sync($request->roles);

        if(DB::table('empleados')->where('user_id', $user->id)->exists()){
            $empleado = DB::table('empleados')->where('user_id', $user->id)->first();
            if($empleado->user_id !== $request->empleados){
                $empleado = DB::table('empleados')->where('user_id', $user->id)->update(['user_id'=>null]);
    
                $empleadoNuevo = Empleado::find($request->empleados);
                $empleadoNuevo->user_id = $user->id;
                $empleadoNuevo->save();
            }
        }else {
            if($request->empleados > 0){
                $empleadoNuevo2 = Empleado::find($request->empleados);
                $empleadoNuevo2->user_id = $user->id;
                $empleadoNuevo2->save();    
            }
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        date_default_timezone_set("America/La_Paz");
        User::destroy($user->id);
        return redirect('users');
    }
}
