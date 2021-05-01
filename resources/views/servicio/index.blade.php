@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Servicios</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('/servicios/create')}}"class="btn btn-primary btb-sm">Registrar Servicio</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="servicios" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($servicios as $servicio)

            <tr>
              <td>{{$servicio->id}}</td>
              <td>{{$servicio->nombre}}</td>
              <td>{{$servicio->precio}}</td>
              <td>
                <form action="{{url('/servicios/'.$servicio->id)}}" method="post">
                  @csrf
                  @method('delete')
                    
                  <a href="{{url('/servicios/'.$servicio->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#servicios').DataTable();
        } );
    </script>
@stop