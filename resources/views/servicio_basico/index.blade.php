@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Servicios Basicos</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{route('servicioBasicos.create')}}"class="btn btn-primary btb-sm">Registrar servicio basico</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="servicios" >

        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($servicioBasicos as $servicioBasico)

            <tr>
              <td>{{$servicioBasico->id}}</td>
              <td>{{$servicioBasico->nombre}}</td>
              <td>
                <form action="{{route('servicioBasicos.destroy', $servicioBasico)}}" method="post">
                  @csrf
                  @method('delete')
                  <a class="btn btn-primary btn-sm" href="{{route('servicioBasicos.show', $servicioBasico)}}">Ver</a>
                    
                  <a href="{{route('servicioBasicos.edit', $servicioBasico)}}"class="btn btn-info btn-sm">Editar</a>
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