@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Notas de Venta</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('/notaVentas/store')}}"class="btn btn-primary btb-sm">Registrar Nota de Compra</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="notaVentas" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Compra Id</th>
            <th scope="col">Producto Id</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Monto Total</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($notaVentas as $notaVenta)

            <tr>
              <td>{{$notaVenta->id}}</td>
              <td>{{$notaVenta->compraId}}</td>
              <td>{{$notaVenta->productoId}}</td>
              <td>{{$notaVenta->cantidad}}</td>
              <td>{{$notaVenta->montoTotal}}</td>
              <td>
                <form action="{{url('/notaVentas/'.$notaVenta->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <a class="btn btn-primary btn-sm" href="{{route('notaVentas.show', $notaVenta)}}">Ver</a>
                    
                  <a href="{{url('/notaVentas/'.$notaVenta->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#notaVentas').DataTable();
        } );
    </script>
@stop