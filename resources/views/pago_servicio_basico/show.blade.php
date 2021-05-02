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
                        <h3 class="font-weight-bold px-2">PAGO DE SERVICIO BASICO</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Servicio Pagado: </h5>
                        <h5>{{DB::table('servicio_basicos')->where('id',$pagoServicioBasico->servicioBasico_id)->value('nombre')}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Monto Total: </h5>
                        <h5>{{$pagoServicioBasico->monto}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Fecha y hora: </h5>
                        <h5>{{$pagoServicioBasico->created_at}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{route('pagoServicioBasicos.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop