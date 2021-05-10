@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Bienvenido {{Auth::user()->name}}</h1>
    <?php
    $date=date("d-m-Y");
    ?>
    <br>
    <h6>{{$date}}</h6>
@stop

@section('content')
<div class="container ">
    <div class="row ">
        <div class="col">
            <div class="row">
                <h5>Accesos Directos:</h5>
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