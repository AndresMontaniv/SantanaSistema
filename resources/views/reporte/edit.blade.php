@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Editar Reporte</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/reportes/'.$reporte->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>ID GASTO:</h5>
            <input type="text"  name="idGastos" value="{{$reporte->idGastos}}" class="focus border-primary  form-control" >

            @error('idGastos')
            <p>DEBE INGRESAR EL ID DE GASTO</p>
            @enderror


            <h5>ID INGRESOS: </h5>
            <input type="text"  name="idIngresos" value="{{$reporte->idIngresos}}" class="focus border-primary  form-control" >

            @error('idIngresos')
            <p>DEBE INGRESAR EL ID INGRESOS  </p>
            @enderror            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/reportes/')}}"class="btn btn-warning text-white btn-sm ">Volver</a>
        </form>

    </div>
</div>
@stop


