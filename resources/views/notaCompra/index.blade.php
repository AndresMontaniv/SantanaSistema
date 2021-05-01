@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Notas de Compra</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('/notaCompras/create')}}"class="btn btn-primary btb-sm">Registrar Nota de Compra</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="notaCompras" >

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
          @foreach ($notaCompras as $notaCompra)

            <tr>
              <td>{{$notaCompra->id}}</td>
              <td>{{$notaCompra->compraId}}</td>
              <td>{{$notaCompra->productoId}}</td>
              <td>{{$notaCompra->cantidad}}</td>
              <td>{{$notaCompra->montoTotal}}</td>
              <td>
                <form action="{{url('/notaCompras/'.$notaCompra->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <a class="btn btn-primary btn-sm" href="{{route('notaCompras.show', $notaCompra)}}">Ver</a>
                    
                  <a href="{{url('/notaCompras/'.$notaCompra->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#notaCompras').DataTable();
        } );
    </script>
@stop