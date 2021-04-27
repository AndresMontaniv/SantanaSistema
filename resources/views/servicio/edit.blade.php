@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Servicio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/servicios/'.$servicio->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>Nombre:</h5>
            <input type="text"  name="nombre" value="{{$servicio->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror


            <h5>Precio:</h5>
            <input type="number"  name="precio" value="{{$servicio->precio}}"  class="focus border-primary  form-control">

            @error('precio')
                <p>DEBE INGRESAR BIEN SU PRECIO</p>
            @enderror

         
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/servicios/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop


