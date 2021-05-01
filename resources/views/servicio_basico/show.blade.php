@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
@stop

@section('content')
<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            {{-- datos --}}
            <div class="row border"> 
                <div class="col">
                    <div class="row">
                        <h3 class="font-weight-bold px-2">DATOS</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">NOMBRE: </h5>
                        <h5>{{$servicioBasico->nombre}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">FECHA: </h5>
                        <h5>{{$servicioBasico->created_at}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{route('servicioBasicos.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop