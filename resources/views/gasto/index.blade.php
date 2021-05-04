@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar gastos</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<div class="card">
        <div class="card-header">
            <a href="{{url('/gastos/create')}}"class="btn btn-primary btb-sm">Registrar gastos</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="gastos" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Gastos Personales</th>
            <th scope="col">Compras</th>
            <th scope="col">Servicios Básicos</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($gastos as $gasto)

            <tr>
              <td>{{ $gasto-> id }}</td>
              <td>{{ $gasto-> descripcion }}</td>
              <td>{{ $gasto-> gastosPersonales }}</td>
              <td>{{ $gasto-> compras }}</td> 
              <td>{{ $gasto-> sb }}</td> 
              <td>{{ $gasto-> total }}</td> 
              <td>
                <form action="{{url('/gastos/'.$gasto->id)}}" method="post">
                  @csrf
                  @method('delete')

                  <a class="btn btn-primary btn-sm" href="{{route('gastos.show', $gasto)}}">Ver</a>
                    
                  <a href="{{url('/gastos/'.$gasto->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
                  
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
         $('#gastos').DataTable();
        } );
    </script>
@stop