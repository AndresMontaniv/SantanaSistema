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
                        <h3 class="font-weight-bold px-2">DETALLES DE GASTO</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Identificación: </h5>
                        <h5>{{$gasto->id}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Id Gastos Personales: </h5>
                        <h5>{{$gasto-> idGastosPersonales}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Id Pago Servicios Básicos: </h5>
                        <h5>{{$gasto-> idPagosSB}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{url('/gastos/')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop