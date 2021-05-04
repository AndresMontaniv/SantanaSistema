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
                        <h3 class="font-weight-bold px-2">DETALLES DE INGRESO</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Descripcion: </h5>
                        <h5>{{$ingreso->descripcion}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Fecha:</h5>
                        <h5>{{$ingreso->updated_at}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Total:</h5>
                        <h5>{{$ingreso->total}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{url('/ingresos/')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop