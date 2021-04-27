@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista Productos </h1>
@stop

@section('content')
    <div class="card=header">
    <a href="{{url('/productos/create')}}" class="btn btn-primary"> Registrar producto</a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-stripped" id="productos" style='width:100%'>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio De Compra</th>
                    <th scope="col">Precio De Venta</th>
                    <th scope="col">STOCK</th>
                    <th scope="coll">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
               <tr>
                <th scope="col">{{$producto->id}}</th>
                <th scope="col">{{$producto->nombre}}</th>
                <th scope="col">{{$producto->precioDeCompra}}</th>
                <th scope="col">{{$producto->precioDeVenta}}</th>
                <th scope="col">{{$producto->stock}}</th>
                <td>
                    <a href="{{route('productos.edit', $producto)}}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{route('productos.show',$producto)}}"    class="btn btn-primary btn-sm">Ver</a>
                    <form action="{{route('productos.destroy',$producto)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estas Seguro')" value="borrar">Eliminar</button>
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
     $('#productos').DataTable();
    } );
</script>
@stop