@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Atencion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/atencions')}}" novalidate >

            @csrf

            <h5>Servicio:</h5>
            <select name="servicioId" id="select-servicio" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un Servicio</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{$servicio->id}}">
                            {{$servicio->nombre}}
                        </option>
                    @endforeach
            </select>

            @error('servicioId')
            <p>DEBE INGRESAR BIEN EL NOMBRE DEL SERVICIO</p>
            @enderror


            <h5>Empleado:</h5>
            <select name="empleadoId" id="select-empleado" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un Empleado</option>
                    @foreach ($empleados as $empleado)
                        <option value="{{$empleado->id}}">
                            {{$empleado->nombre}}
                        </option>
                    @endforeach
            </select>

            @error('empleadoId')
                <p>DEBE INGRESAR BIEN EL NOMBRE DEL EMPLEADO</p>
            @enderror

            <h5>Cliente:</h5>
            <select name="clienteId" id="select-cliente" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un Cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">
                            {{$cliente->nombre}}
                        </option>
                    @endforeach
            </select>
            @error('clienteId')
                <p>DEBE INGRESAR BIEN EL NOMBRE DEL CLIENTE</p>
            @enderror
            
            <h5>Metodo de Pago:</h5>
            <select name="metodoId" id="select-metodo" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un Metodo de Pago</option>
                    @foreach ($metodos as $metodo)
                        <option value="{{$metodo->id}}">
                            {{$metodo->nombre}}
                        </option>
                    @endforeach
            </select>
            @error('metodoId')
                <p>DEBE INGRESAR BIEN EL NOMBRE DEL CLIENTE</p>
            @enderror
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{url('/atencions/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop


