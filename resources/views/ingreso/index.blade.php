@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Ingresos</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<div class="card">
        <div class="card-header">
            <a href="{{url('/ingresos/create')}}"class="btn btn-primary btb-sm">Registrar ingresos</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="ingresos" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Id Ventas</th>
            <th scope="col">Id Pagos </th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ingresos as $ingreso)

            <tr>
              <td>{{ $ingreso-> id }}</td>
              <td>{{ $ingreso->descripcion }}</td>
              <td>{{ $ingreso-> 	idVentas }}</td>
              <td>{{ $ingreso-> idPagos }}</td> 
              <td>{{ $ingreso-> total}}</td> 
              <td>
                <form action="{{url('/ingresos/'.$ingreso->id)}}" method="post">
                  @csrf
                  @method('delete')

                  <a class="btn btn-primary btn-sm" href="{{route('ingresos.show', $ingreso)}}">Ver</a>
                    
                  <a href="{{url('/ingresos/'.$ingreso->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
                  
                  <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                  value="Borrar">Eliminar</button> 
                </form>
              </td>
            </tr>

           @endforeach

        </tbody>

      </table>
  </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
         $('#ingresos').DataTable();
        } );
    </script>
@stop