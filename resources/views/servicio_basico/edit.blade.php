@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>EDITAR DATOS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('servicioBasicos.update',$servicioBasico)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>Detalle:</h5>
            <input type="text"  name="nombre" value="{{$servicioBasico->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
                <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror
            <h5>Monto(fijo):</h5>
            <input type="number"  name="monto" value="{{$servicioBasico->monto}}" class="focus border-primary  form-control" >
            @error('monto')
                <p>DEBE INGRESAR BIEN EL MONTO</p>
            @enderror
            <br>
            <br>
            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('servicioBasicos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop
