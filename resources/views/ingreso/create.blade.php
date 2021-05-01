@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Ingreso</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/ingresos')}}" novalidate >

            @csrf
            <h5>ID VENTA:</h5>
            <input type="text"  name="idVentas" class="focus border-primary  form-control" >

            @error('idVentas')
            <p>DEBE INGRESAR EL ID DE VENTA</p>
            @enderror


            <h5>ID PAGO:</h5>
            <input type="text"  name="idPagos" class="focus border-primary  form-control" >

            @error('idPagos')
            <p>DEBE INGRESAR EL ID PAGO </p>
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
            <a href="{{url('/ingresos/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop


