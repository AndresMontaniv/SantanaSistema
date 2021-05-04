@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('users.store')}}" method="post" novalidate >
                @csrf
                <label for="name">Ingrese el nombre de usuario</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="password">Ingrese la contraseña</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>


                <div>
                    <label for="roles">Seleccione un rol</label>
                    <select name="roles" id="select-roles" class="form-control" onchange="habilitar()" >
                        <option value=0>Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                    </select>
                    @error('roles')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                    <br>
                </div>

                <div>
                    <label for="empleados">Seleccione un empleado</label>
                    <select name="empleados" class="form-control" id="select-empleados" disabled="" onchange="elegirE()">
                        <option value=0 >Seleccione un empleado</option>
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre}}</option>
                            @endforeach
                    </select>
                    @error('empleados')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
                <br>

                <button  class="btn btn-danger btn-sm" type="submit">Crear Usuario</button>
            </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');

    function habilitar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }

    function cargar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }
    /* function elegirE(){
        if(odontologos.value > 0){
            odontologos.disabled = false
        }
    } */
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop