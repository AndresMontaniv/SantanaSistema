@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar Productos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/productos')}}" novalidate >

            @csrf

            <h5>Nombre:</h5>
            <input type="text"  name="nombre" class="focus border-primary  form-control" >

            @error('nombre')
            <p>Escriba mejor el nombre del producto</p>
            @enderror

            <h5>Precio De Compra:</h5>
            <input type="text"  name="precioDeCompra" class="focus border-primary  form-control" >

            @error('precioDeCompra')
            <p>Escriba el precio del producto</p>
            @enderror

            <h5>Precio De Venta:</h5>
            <input type="text"  name="precioDeVenta" class="focus border-primary  form-control" >

            @error('precioDeVenta')
            <p>Escriba el precio del producto</p>
            @enderror
            
            <h5>STOCK:</h5>
            <input type="text"  name="stock" class="focus border-primary  form-control" >

            @error('stock')
            <p>STOCK</p>
            @enderror


            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{url('/productos/')}}"class="btn btn-warning text-white btn-sm">Volver</a>

        </form>

    </div>
</div>
@stop



