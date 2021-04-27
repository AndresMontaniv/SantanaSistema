@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Atencion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/atencions/'.$atencion->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>Servicio:</h5>
            <select name="servicioId" id="select-servicio" class="form-control" onchange="habilitar()" >
                <option value="{{$atencion->servicioId}}">
                    {{DB::table('servicios')->where('id',$atencion->servicioId)->value('nombre')}}
                </option>
                    @foreach ($servicios as $servicio)
                        @if($servicio->id!=$atencion->servicioId)
                        <option value="{{$servicio->id}}">
                            {{$servicio->nombre}}
                        </option>
                        @endif
                    @endforeach
            </select>

            @error('servicioId')
            <p>DEBE INGRESAR BIEN EL NOMBRE DEL SERVICIO</p>
            @enderror


            <h5>Empleado:</h5>
            <select name="empleadoId" id="select-empleado" class="form-control" onchange="habilitar()" >
                <option value="{{$atencion->empleadoId}}">
                    {{DB::table('empleados')->where('id',$atencion->empleadoId)->value('nombre')}}
                </option>
                    @foreach ($empleados as $empleado)
                        @if($empleado->id!=$atencion->empleadoId)
                        <option value="{{$empleado->id}}">
                            {{$empleado->nombre}}
                        </option>
                        @endif
                    @endforeach
            </select>

            @error('empleadoId')
                <p>DEBE INGRESAR BIEN EL NOMBRE DEL EMPLEADO</p>
            @enderror

            <h5>Cliente:</h5>
            <select name="clienteId" id="select-cliente" class="form-control" onchange="habilitar()" >
                <option value="{{$atencion->clienteId}}">
                    {{DB::table('clientes')->where('id',$atencion->clienteId)->value('nombre')}}
                </option>
                    @foreach ($clientes as $cliente)
                        @if($cliente->id!=$atencion->clienteId)
                        <option value="{{$cliente->id}}">
                            {{$cliente->nombre}}
                        </option>
                        @endif
                    @endforeach
            </select>
            @error('clienteId')
                <p>DEBE INGRESAR BIEN EL NOMBRE DEL CLIENTE</p>
            @enderror
            
            <h5>Metodo de Pago:</h5>
            <select name="metodoId" id="select-metodo" class="form-control" onchange="habilitar()" >
                <option value="{{$atencion->metodoId}}">
                    {{DB::table('metodos')->where('id',$atencion->metodoId)->value('nombre')}}
                </option>
                    @foreach ($metodos as $metodo)
                        @if($metodo->id!=$atencion->metodoId)
                        <option value="{{$metodo->id}}">
                            {{$metodo->nombre}}
                        </option>
                        @endif
                    @endforeach
            </select>
            @error('metodoId')
                <p>DEBE INGRESAR BIEN EL NOMBRE DEL CLIENTE</p>
            @enderror
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/atencions/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop


