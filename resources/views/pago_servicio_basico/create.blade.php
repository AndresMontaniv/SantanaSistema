@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Pago de Servicio Basico</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('pagoServicioBasicos.store')}}" novalidate >

            @csrf

            <h5>Servicio Basico:</h5>
            <select name="servicioBasicoId" id="select-servicio" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccionar</option>
                    @foreach ($servicioBasicos as $servicioBasico)
                        <option value="{{$servicioBasico->id}}">
                            {{$servicioBasico->nombre}}
                        </option>
                    @endforeach
            </select>
            @error('servicioBasicoId')
            <p>DEBE INGRESAR BIEN EL NOMBRE DEL SERVICIO</p>
            @enderror

              <h5>Monto:</h5>
            <input type="number"  name="monto" value="{{$servicioBasico->monto}}" class="focus border-primary  form-control" >
            @error('monto')
            <p>DEBE INGRESAR BIEN EL NOMBRE EL MONTO</p>
            @enderror
            <br>
            <br>
            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{route('pagoServicioBasicos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop