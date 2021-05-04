@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/empleados/'.$empleado->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>Carnet de Identidad:</h5>
            <input type="text"  name="ci" value="{{$empleado->ci}}" class="focus border-primary  form-control" >

            @error('ci')
            <p>DEBE INGRESAR BIEN SU CI</p>
            @enderror


            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$empleado->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror


            <h5>Fecha de Nacimiento:</h5>
            <input type="date"  name="fechaNac" value="{{$empleado->fechaNac}}" class="focus border-primary  form-control">

            @error('fechaNac')
                <p>DEBE INGRESAR BIEN SU FECHA DE NACIMIENTO</p>
            @enderror

         <div class="form-group">
            <h5>Sexo:</h5>
            <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                <option value="{{$empleado->sexo}}">{{$empleado->sexo}}</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>

            @error('sexo')
                <p>DEBE INGRESAR BIEN SU SEXO</p>
            @enderror
         </div>

            <h5>Telefono:</h5>
            <input type="text" name="telefono" value="{{$empleado->telefono}}" class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/empleados/')}}"class="btn btn-warning text-white btn-sm ">Volver</a>
        </form>

    </div>
</div>
@stop


