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
                        <h3 class="font-weight-bold px-2">DETALLES DE REPORTE</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Identificación: </h5>
                        <h5>{{$reporte->id}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Total Gastos: </h5>
                        <h5>{{$reporte-> totalGastos}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Total Ingresos : </h5>
                        <h5>{{$reporte-> totalIngresos}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2"> General : </h5>
                        <h5>{{$reporte-> general }}</h5>
                    </div>
                    <div class="row">
                        <a href="{{url('/reportes/')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop