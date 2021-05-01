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
                        <h3 class="font-weight-bold px-2">DATOS PERSONALES</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Nombre Completo: </h5>
                        <h5>{{$empleado->nombre}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Fecha de Nacimiento: </h5>
                        <h5>{{$empleado->fechaNac}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Sexo: </h5>
                        <?php
                        $sexo="NULO";
                        if ($empleado->sexo==="M"){
                            $sexo="Masculino";
                        }
                        else{
                            $sexo="Femenino";
                        }
                        ?>
                        <h5>{{$sexo}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Telefono: </h5>
                        <h5>{{$empleado->telefono}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{url('/empleados/')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop