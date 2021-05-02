@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Editar Pago de Servicios Basicos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('pagoServicioBasicos.update',$pagoServicioBasico)}}" novalidate >
            @csrf
            @method('PATCH')
            <h5>Servicio:</h5>
            <select name="servicioBasicoId" id="select-servicio" class="form-control" onchange="habilitar()" >
                <option value="{{$pagoServicioBasico->servicioBasico_id}}">
                    {{DB::table('servicio_basicos')->where('id',$pagoServicioBasico->servicioBasico_id)->value('nombre')}}
                </option>
                    @foreach ($servicioBasicos as $servicioBasico)
                        @if($servicioBasico->id!=$pagoServicioBasico->servicioBasico_id)
                        <option value="{{$servicioBasico->id}}">
                            {{$servicioBasico->nombre}}
                        </option>
                        @endif
                    @endforeach
            </select>
            @error('servicioBasicoId')
            <p>DEBE INGRESAR BIEN EL NOMBRE DEL SERVICIO</p>
            @enderror

            <h5>Monto:</h5>
            <input type="number"  name="monto" value="{{$pagoServicioBasico->monto}}" class="focus border-primary  form-control" >
            @error('monto')
                <p>DEBE INGRESAR BIEN EL MONTO</p>
            @enderror
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('pagoServicioBasicos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop