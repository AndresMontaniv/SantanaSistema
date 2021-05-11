@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    
@stop

@section('content')
<div class="container ">
    <div class="row ">
        <div class="col">
            <div class="row">
                <h1>Bienvenido {{Auth::user()->name}}</h1>
            </div>
            <div class="row my-2">
                <?php
                $date=date("d-m-Y");
                ?>
                <br>
                <h6>{{$date}}</h6>
            </div>
            <div class="row my-2 ">
                <div class="col col-lg-8">
                    <img src="vendor/adminlte/dist/img/homeimage.jpg" width="100%">
                </div>
            </div>
            <div class="row my-2">
                <h5>Accesos Directos:</h5>
            </div>
            <div class="row my-2">
                <div class="col col-lg-2 m-2">
                    <a class="btn btn-primary btn-lg" href="{{url('/atencions/')}}" role="button">Atenciones</a>
                </div>
                <div class="col col-lg-2 m-2">
                    <a class="btn btn-primary btn-lg" href="{{url('/clientes/')}}" role="button">Clientes</a>
                </div>
                <div class="col col-lg-2 m-2">
                    <a class="btn btn-primary btn-lg" href="{{url('/compras/')}}" role="button">Compras</a>
                </div>
                <div class="col col-lg-2 m-2">
                    <a class="btn btn-primary btn-lg" href="{{url('/ventas/')}}" role="button">Ventas</a>
                </div>
                
            </div>
        </div>
    </div>       
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop