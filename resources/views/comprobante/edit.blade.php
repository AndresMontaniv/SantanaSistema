@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Editar Comprobante</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/comprobantes/'.$comprobante->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>NOMBRE:</h5>
            <input type="text"  name="nombre" value="{{$comprobante->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR EL NOMBRE</p>
            @enderror

            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/comprobantes/')}}"class="btn btn-warning text-white btn-sm ">Volver</a>
        </form>

    </div>
</div>
@stop


