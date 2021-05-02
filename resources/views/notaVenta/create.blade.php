@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
@stop

@section('content')
<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">NOTA VENTA</h2>
            </div>
            
            <form method="post" action="{{url('/notaVentas')}}" novalidate >
                @csrf 
                <div class="row row justify-content-center"> 
                    <div class="col-1">
                        <input type="hidden"  name="ventaId" value="{{$venta->id}}" class="focus border-primary  form-control" >
                    </div>                
                    <div class="col-4">
                        <select name="productoId" id="select-producto" class="form-control" onchange="habilitar()" >
                            <option value="nulo">Seleccione un Producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}">
                                        {{$producto->nombre}}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <input type="number" value="1" name="cantidad" class="focus border-primary  form-control" >
        
                        @error('cantidad')
                        <p>DEBE INGRESAR LA CANTIDAD</p>
                        @enderror
                    </div>
                    <div class="col-2 align-items-center">
                        <button  class="btn btn-primary btn-sm m-1" type="submit">Añadir</button>
                    </div>
                </div>  
            </form>
            <div class="row row justify-content-center m-2">
                <h3>DETALLE</h3>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Importe</th>
                          <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notas as $nota)
                            <tr>
                                <td>{{DB::table('productos')->where('id',$nota->productoId)->value('nombre')}}</td>
                                <td>{{$nota->cantidad}}</td>
                                <td>{{$nota->montoTotal}}</td>
                                <td>
                                    <form action="{{url('/notaVentas/'.$nota->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                      value="Borrar"><i class="fas fa-times"></i> </button>
                                    </form>
                                  </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="font-weight-bold">Total</td>
                            <td class="font-weight-bold">{{$venta->total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-end">
                <form action="{{url('/ventas/'.$venta->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm m-2" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                    value="Borrar">Eliminar Venta</button> 
                    <a class="btn btn-success btn-sm m-2" href="{{url('/ventas/')}}">Guardar cambios</a>
                  </form>
            </div>    
            
        </div>
    </div>       
</div>

<br>
<br>
@stop