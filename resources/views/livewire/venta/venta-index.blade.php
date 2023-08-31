@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>VENTAS</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        {{-- cabecera tabla --}}
        <div class="card-header">
            <a class="btn btn-primary" href="{{url('/venta/create')}}">Registrar venta</a>
        </div>
        
        <input type="hidden" value="{{ $i = 1 }}">

        @if ($ventas->count())
            {{-- cuerpo tabla --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nombre</td>
                            <td colspan="2">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $ventas as $venta )
                        <tr>
                            <td>{{ $venta->idcabecera_factura }}</td>
                            <td>{{ $venta->serie }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ url('/venta/'.$venta->idcabecera_factura.'/edit') }}">Editar</a>
                            </td>
                            <td>
                                <form action="{{ url('/venta/'.$venta->idcabecera_factura) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                                </form>
                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                
            </div> 
            
        @else
            <div class="card-body">
                <h4>No se tiene registro en la BASE DATOS...</h4>
            </div>
        @endif
    </div>


      
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

        console.log("log")
 
        function calcular() {
            // Obtener los valores de los campos de entrada
            var precio = document.getElementById("precio").value;
            var cantidad = document.getElementById("cantidad").value;

            // Convertir los valores a números (ya que los campos de entrada devuelven strings)
            precio = parseFloat(precio);
            cantidad = parseFloat(cantidad);

            // Realizar 
            var resultado = precio * cantidad;

            // Mostrar el resultado
            console.log(resultado);
            document.getElementById("total").value = resultado;
        }

    </script>
@stop
