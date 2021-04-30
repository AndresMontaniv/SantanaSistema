@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Gasto personal</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('gastoPersonals.store')}}" novalidate >

            @csrf

            <h5>Detalle:</h5>
            <input type="text"  name="detalle" class="focus border-primary  form-control" >
            <h5>Precio:</h5>
            <input type="number"  name="precio"  class="focus border-primary  form-control">

            @error('precio')
                <p>DEBE INGRESAR BIEN SU PRECIO</p>
            @enderror
            
            <h5>Cantidad:</h5>
            <input type="number"  name="cantidad"  class="focus border-primary  form-control">

            @error('cantidad')
                <p>DEBE INGRESAR BIEN LA CANTIDAD</p>
            @enderror
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{route('gastoPersonals.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop