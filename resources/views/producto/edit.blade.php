@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Productos</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/productos/'.$producto->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>Nombre:</h5>
            <input type="text" value="{{$producto->nombre}}"  name="nombre" class="focus border-primary  form-control" >

            @error('nombre')
            <p>Escriba el nombre de su producto</p>
            @enderror

            <h5>Precio De Compra:</h5>
            <input type="text" value="{{$producto->precioDeCompra}}"  name="precioDeCompra" class="focus border-primary  form-control" >

            @error('precioDeCompra')
            <p>Escriba el precio de su producto</p>
            @enderror

            <h5>Precio De Venta:</h5>
            <input type="text" value="{{$producto->precioDeVenta}}"  name="precioDeVenta" class="focus border-primary  form-control" >

            @error('precioDeVenta')
            <p>Escriba el precio de su producto</p>
            @enderror


            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/productos/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop



