@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
<div class="row mx-5">
    <a href="{{url('/reportes/')}}"class="btn btn-warning text-white btn-sm mx-3">Volver</a>
</div>
@stop

@section('content')
<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            {{-- datos --}}
            <div class="row border "> 
                <div class="col my-2">
                    <div class="row justify-content-center ">
                        <h2 class="font-weight-bold px-2">DETALLES DE REPORTE</h2>
                    </div>
                </div>
            </div>
            <?php
            date_default_timezone_set("America/La_Paz");
            $nombre=date('m Y');
            $gastos=DB::table('gastos')->get();
            $ingresos=DB::table('ingresos')->get();
            $montoCompras=0;
            $montoVenta=0;
            $nroAtenciones=0;
            $montoAtenciones=0;
            $gastoPersonales=0;
            $serviciosBasicos=0;
            foreach ($gastos as $gasto){
                $date=date_create($gasto->updated_at);
                $fecha=date_format($date,"m Y");
                $descripcion=$gasto->descripcion;
                if ($fecha===$nombre){
                    if($descripcion==="Compra de Productos"){
                        $montoCompras+=$gasto->total;
                    }
                    if($descripcion==="Gasto Personal"){
                        $gastoPersonales+=$gasto->total;
                    }
                    if($descripcion==="Pago de Servicio Basico"){
                        $serviciosBasicos+=$gasto->total;
                    }
                }
            }
            foreach ($ingresos as $ingreso){
                $date=date_create($ingreso->updated_at);
                $fecha=date_format($date,"m Y");
                $descripcion=$ingreso->descripcion;
                if ($fecha===$nombre){
                    if($descripcion==="Venta de Productos"){
                        $montoVenta+=$ingreso->total;
                    }
                    if($descripcion==="Pago de Atencion"){
                        $montoAtenciones+=$ingreso->total;
                        $nroAtenciones+=1;
                    }
                }
            }
            $ganancia=$montoVenta-$montoCompras;
            ?>
            <div class="row"> 
                <div class="col ">

                    <div class="row border">
                        <div class="col-6  my-2">
                            <div class="row justify-content-center">
                                <h4 class="font-weight-bold px-2">RESULTADOS MENSUALES</h4>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Mes: </h5>
                                <h5>{{$reporte->nombre}}</h5>
                                
                            </div>
                            {{-- Ingresos --}}
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Total Ingresos: </h5>
                                <h5>{{$reporte->totalIngresos}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                            {{-- Gastos --}}
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Total Gastos: </h5>
                                <h5>{{$reporte->totalGastos}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Resultados Finales: </h5>
                                <h5>{{$reporte->general }}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                        </div>

                        <div class="col-6 my-2 border-left">
                            <div class="row justify-content-center">
                                <h4 class="font-weight-bold px-2">DATOS PRODUCTOS</h4>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Monto de Productos Comprados: </h5>
                                <h5>{{$montoCompras}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Monto de Productos Vendidos: </h5>
                                <h5>{{$montoVenta}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Ganancia de Productos: </h5>
                                <h5>{{$ganancia}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                        </div>

                    </div>

                    <div class="row border" >
                        <div class="col-6 my-2">
                            <div class="row justify-content-center">
                                <h4 class="font-weight-bold px-2">GASTOS Y PAGOS</h4>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Gastos Personales: </h5>
                                <h5>{{$gastoPersonales}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Gastos en Servicios Basicos: </h5>
                                <h5>{{$serviciosBasicos}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                        </div>
                        <div class="col-6 my-2 border-left">
                            <div class="row justify-content-center">
                                <h4 class="font-weight-bold px-2">ATENCIONES</h4>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Monto de Atenciones: </h5>
                                <h5>{{$montoAtenciones}}</h5>
                                <h5 class="ml-1">Bs</h5>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-bold px-2">Numero de Atenciones este mes: </h5>
                                <h5>{{$nroAtenciones}}</h5>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row border ">
                        <div class="col my-2">
                            <div class="row justify-content-center">
                                @if ($reporte->general>0)
                                    <h2 class="text-success text-uppercase font-weight-bold mx-2">
                                        Ganancia
                                    </h2>
                                    <h2 class="text-success text-uppercase font-weight-bold">
                                        {{$reporte->general}}
                                    </h2>
                                    <h2 class="ml-1 text-success text-uppercase font-weight-bold">Bs</h2>
                                @else
                                    <h2 class="text-danger text-uppercase font-weight-bold mx-2">
                                        Perdida
                                    </h2>
                                    <h2 class="text-danger text-uppercase font-weight-bold">
                                        {{$reporte->general}}
                                    </h2>
                                    <h2 class="ml-1 text-danger text-uppercase font-weight-bold">Bs</h2>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop