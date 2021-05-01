@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Editar Ingreso</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/ingresos/'.$ingreso->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>ID VENTA:</h5>
            <input type="text"  name="idVentas" value="{{$ingreso->idVentas}}" class="focus border-primary  form-control" >

            @error('idVentas')
            <p>DEBE INGRESAR EL ID DE VENTA</p>
            @enderror


            <h5>ID PAGO: </h5>
            <input type="text"  name="idPagos" value="{{$ingreso->idPagos}}" class="focus border-primary  form-control" >

            @error('idPagos')
            <p>DEBE INGRESAR EL ID PAGO  </p>
            @enderror            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/ingresos/')}}"class="btn btn-warning text-white btn-sm ">Volver</a>
        </form>

    </div>
</div>
@stop


