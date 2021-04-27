@extends('adminlte::page')

@section('title', 'SANTANA')

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
                        <h3 class="font-weight-bold px-2">DATOS COMPRA</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">FECHA: </h5>
                        <h5>{{$compra->fecha}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">USUARIO: </h5>
                        <td>{{DB::table('users')->where('id',$compra->usuarioId)->value('name')}}</td>

                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">TOTAL: </h5>
                        <h5>{{$compra->total}}</h5>
                    </div>
                    
                    <div class="row">
                        <a href="{{url('/compras/')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop