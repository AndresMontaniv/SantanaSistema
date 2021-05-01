@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Comprobante</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/comprobantes')}}" novalidate >

            @csrf
            <h5>NOMBRE:</h5>
            <input type="text"  name="nombre" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR EL ID NOMBRE</p>
            @enderror

{{--             <h5>ID INGRESO:</h5>
            <input type="text"  name="idIngresos" class="focus border-primary  form-control" >

            @error('idIngresos')
            <p>DEBE INGRESAR EL ID INGRESO </p>
            @enderror --}}
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{url('/comprobantes/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop


