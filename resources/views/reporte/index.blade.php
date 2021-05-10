@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Reportes</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

  <div class="card">
    <div class="card-header">
      <form method="post" action="{{url('/reportes')}}" novalidate >
        @csrf
        <button  class="btn btn-primary btb-sm" 
        type="submit">Crear Reporte</button>
      </form>
    </div>
  </div>
  
<div class="card">
  <div class="card-body">
    
      <table class="table table-striped" id="reportes" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Mes</th>
            <th scope="col">Total Gastos</th>
            <th scope="col">Total Ingresos </th>
            <th scope="col">General </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reportes as $reporte)
            <tr>
              <td>{{ $reporte->id }}</td>
              <td>{{ $reporte->nombre}}</td>
              <td>{{ $reporte->totalGastos }}</td>
              <td>{{ $reporte->totalIngresos }}</td> 
              <td>{{ $reporte->general }}</td> 
              <td>
                <form action="{{url('/reportes/'.$reporte->id)}}" method="post">
                  @csrf
                  @method('delete')

                  <a class="btn btn-primary btn-sm" href="{{route('reportes.show', $reporte)}}">Ver</a>
                  
                  <a href="{{url('/reportes/'.$reporte->id.'/edit')}}"class="btn btn-info btn-sm">Actualizar</a>
                  
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
         $('#reportes').DataTable();
        } );
    </script>
@stop