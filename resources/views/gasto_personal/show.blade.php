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
                        <h5 class="font-weight-bold px-2">DETALLE: </h5>
                        <h5>{{$gastoPersonal->detalle}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">PRECIO: </h5>
                        <h5>{{$gastoPersonal->costo}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">CANTIDAD: </h5>
                        <h5>{{$gastoPersonal->cantidad}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">COSTO: </h5>
                        <h5>{{$gastoPersonal->costo}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">FECHA: </h5>
                        <h5>{{$gastoPersonal->created_at}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{route('gastoPersonals.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop