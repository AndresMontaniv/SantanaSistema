@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Listar Comprobantes</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<div class="card">
        <div class="card-header">
            <a href="{{url('/comprobantes/create')}}"class="btn btn-primary btb-sm">Registrar Comprobantes</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="comprobantes" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">NOMBRE</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($comprobantes as $comprobante)

            <tr>
              <td>{{ $comprobante-> id }}</td>
              <td>{{ $comprobante-> nombre }}</td>
              <td>
                <form action="{{url('/comprobantes/'.$comprobante->id)}}" method="post">
                  @csrf
                  @method('delete')

                  <a class="btn btn-primary btn-sm" href="{{route('comprobantes.show', $comprobante)}}">Ver</a>
                    
                  <a href="{{url('/comprobantes/'.$comprobante->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
                  
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
         $('#comprobantes').DataTable();
        } );
    </script>
@stop