@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Lista Ventas</h1>
@stop

@section('content')


<div class="card">
  <div class="card-header">
      <form method="post" action="{{url('/ventas')}}" novalidate >
        @csrf
        <input type="hidden"  name="userId" value="{{Auth::user()->id}}" class="focus border-primary  form-control" >
        <button  class="btn btn-primary btb-sm" type="submit">Registrar Venta</button>
    </form>
  </div>
</div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="ventas" >

        <thead>

          <tr>
            <th scope="col">id</th>
            <th scope="col">Fecha</th>
            <th scope="col">Usuario</th>
            <th scope="col">Total</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ventas as $venta)

            <tr>
              <td>{{$venta->id}}</td>
              <td>{{$venta->updated_at}}</td>
              <td>{{DB::table('users')->where('id',$venta->usuarioId)->value('name')}}</td>
              <td>{{$venta->total}}</td>
              <td>
                <form action="{{url('/ventas/'.$venta->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <a class="btn btn-primary btn-sm" href="{{route('ventas.show', $venta)}}">Ver</a>
                    
                  <a href="{{url('/ventas/'.$venta->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#ventas').DataTable();
        } );
    </script>
@stop