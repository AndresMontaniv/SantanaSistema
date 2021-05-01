@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Editar Gasto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/gastos/'.$gasto->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>ID GASTOS PERSONALES:</h5>
            <input type="text"  name="idGastosPersonales" value="{{$gasto->idGastosPersonales}}" class="focus border-primary  form-control" >

            @error('idGastosPersonales')
            <p>DEBE INGRESAR EL ID DE GASTOS PERSONALES</p>
            @enderror


            <h5>ID PAGO SB:</h5>
            <input type="text"  name="idPagosSB" value="{{$gasto->idPagosSB}}" class="focus border-primary  form-control" >

            @error('idPagosSB')
            <p>DEBE INGRESAR EL ID PAGO DE SB </p>
            @enderror            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/gastos/')}}"class="btn btn-warning text-white btn-sm ">Volver</a>
        </form>

    </div>
</div>
@stop


