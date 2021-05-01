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
                        <h3 class="font-weight-bold px-2">DATOS DE LA ATENCION</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Servicio Realizado: </h5>
                        <h5>{{DB::table('servicios')->where('id',$atencion->servicioId)->value('nombre')}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Empleado: </h5>
                        <h5>{{DB::table('empleados')->where('id',$atencion->empleadoId)->value('nombre')}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Cliente: </h5>
                        <h5>{{DB::table('clientes')->where('id',$atencion->clienteId)->value('nombre')}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Metodo de Pago: </h5>
                        <h5>{{DB::table('metodos')->where('id',$atencion->metodoId)->value('nombre')}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Monto Total: </h5>
                        <h5>{{$atencion->montoTotal}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Fecha y hora: </h5>
                        <h5>{{$atencion->created_at}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{url('/atencions/')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop