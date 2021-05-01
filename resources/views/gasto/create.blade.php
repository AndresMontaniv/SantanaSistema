@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Gasto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/gastos')}}" novalidate >

            @csrf
            <h5>ID GASTOS PERSONALES:</h5>
            <input type="text"  name="idGastosPersonales" class="focus border-primary  form-control" >

            @error('idGastosPersonales')
            <p>DEBE INGRESAR EL ID DE GASTOS PERSONALES</p>
            @enderror


            <h5>ID PAGO SB:</h5>
            <input type="text"  name="idPagosSB" class="focus border-primary  form-control" >

            @error('idPagosSB')
            <p>DEBE INGRESAR EL ID PAGO DE SB </p>
            @enderror


            {{-- <h5>Fecha de Nacimiento:</h5>
            <input type="date"  name="fechaNac"  class="focus border-primary  form-control">

            @error('fechaNac')
                <p>DEBE INGRESAR BIEN SU FECHA DE NACIMIENTO</p>
            @enderror

         <div class="form-group">
            <h5>Sexo:</h5>
            <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                <option >Elegir una Opcion</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>

            @error('sexo')
                <p>DEBE INGRESAR BIEN SU SEXO</p>
            @enderror
         </div>

            <h5>Telefono:</h5>
            <input type="text" name="telefono"  class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror --}}
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{url('/gastos/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop


