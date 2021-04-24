@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Listar Empleados</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('/empleados/create')}}"class="btn btn-primary btb-sm">Registrar Empleado</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="empleados" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">CI</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($empleados as $empleado)

            <tr>
              <td>{{$empleado->id}}</td>
              <td>{{$empleado->ci}}</td>
              <td>{{$empleado->nombre}}</td>
              <td>
                <form action="{{url('/empleados/'.$empleado->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <a class="btn btn-primary btn-sm" href="{{route('empleados.show', $empleado)}}">Ver</a>
                    
                  <a href="{{url('/empleados/'.$empleado->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#empleados').DataTable();
        } );
    </script>
@stop