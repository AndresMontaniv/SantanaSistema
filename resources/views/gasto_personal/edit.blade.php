@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>EDITAR DATOS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/gastoPersonals/'.$gastoPersonal->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>Detalle:</h5>
            <input type="text"  name="detalle" value="{{$gastoPersonal->detalle}}" class="focus border-primary  form-control" >

            <h5>Precio:</h5>
            <input type="number" step="0.0001" min= "0" name="precio" value="{{$gastoPersonal->precio}}"  class="focus border-primary  form-control">
 
            @error('precio')
                <p>DEBE INGRESAR BIEN SU PRECIO</p>
            @enderror            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('gastoPersonals.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop
