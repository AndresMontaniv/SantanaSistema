@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Compras</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('/compras/create')}}"class="btn btn-primary btb-sm">Registrar Compra</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="compras" >

        <thead>

          <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Usuario</th>
            <th scope="col">Total</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($compras as $compra)

            <tr>
              <td>{{$compra->fecha}}</td>
              <td>{{DB::table('users')->where('id',$compra->usuarioId)->value('name')}}</td>
              <td>{{$compra->total}}</td>
              <td>
                <form action="{{url('/compras/'.$compra->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <a class="btn btn-primary btn-sm" href="{{route('compras.show', $compra)}}">Ver</a>
                    
                  <a href="{{url('/compras/'.$compra->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#compras').DataTable();
        } );
    </script>
@stop