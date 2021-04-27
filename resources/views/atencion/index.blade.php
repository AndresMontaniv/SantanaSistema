@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Atenciones</h1>
@stop

@section('content')


<div class="card">
  <div class="card-header">
      <a href="{{url('/atencions/create')}}"class="btn btn-primary btb-sm">Registrar Atencion</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="atencions" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Servicio</th>
            <th scope="col">Empleado</th>
            <th scope="col">Cliente</th>
            <th scope="col">Monto Total</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($atencions as $atencion)

            <tr>
              <td>{{$atencion->id}}</td>
              <td>{{DB::table('servicios')->where('id',$atencion->servicioId)->value('nombre')}}</td>
              <td>{{DB::table('empleados')->where('id',$atencion->empleadoId)->value('nombre')}}</td>
              <td>{{DB::table('clientes')->where('id',$atencion->clienteId)->value('nombre')}}</td>
              <td>{{$atencion->montoTotal}}</td>
              <td>
                <form action="{{url('/atencions/'.$atencion->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <a class="btn btn-primary btn-sm" href="{{route('atencions.show', $atencion)}}">Ver</a>
                  <a href="{{url('/atencions/'.$atencion->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#atencions').DataTable();
        } );
    </script>
@stop