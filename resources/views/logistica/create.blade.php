@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRAR BALON DE GAS</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    

    <div class="card">
        <div class="card-body">
            
            <form action="{{ url('/balon_gas') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">

                <div class="col-sm-6">

                    
                
                    <div class="form-group row">
                        <label for="proveedor" class="col-sm-4 col-form-label">Proveedor</label>
                        <div class="col-sm-8"> 
                            {{-- <input type="text" name="proveedor" class="form-control" value="1" id="proveedor"> --}}
                            <select type="text" name="proveedor" class="form-control" id="proveedor">
                                @foreach ( $proveedores as $proveedor )
                                    {{-- <option value="{{$reportefactura[0]->proveedor}}">{{$reportefactura[0]->proveedor}}</option> --}}
                                    <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre_comercial}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-4 col-form-label">Gas</label>
                        <div class="col-sm-8"> 
                            <input type="text" name="descripcion" class="form-control" value="GAS" id="descripcion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="peso" class="col-sm-4 col-form-label">Peso</label>
                        <div class="col-sm-8">
                            <select type="text" name="peso" class="form-control" id="peso">
                                <option value="10">10 Kg</option>
                                <option value="45">45 Kg</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo" class="col-sm-4 col-form-label">Tipo</label>
                        <div class="col-sm-8">
                            <input type="text" name="tipo" class="form-control" value="ROSCA" id="tipo">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="precio" class="col-sm-4 col-form-label">Precio</label>
                        <div class="col-sm-8">
                            <input type="text" name="precio" class="form-control" value="60.00" id="precio">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-4 col-form-label">Cantidad</label>
                        <div class="col-sm-8">
                            <input type="text" name="cantidad" class="form-control" value="10" id="cantidad">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="marca" class="col-sm-4 col-form-label">Marca</label>
                        <div class="col-sm-8">
                            <input type="text" name="marca" class="form-control" value="OXISOL" id="marca">
                        </div>
                    </div>

                </div> 




 




                
                <div class="col-sm-6">

                    <input class="btn btn-info" type="submit" value="Guardar datos">
                    
                </div>
            </div>
            
        </form>

        </div>
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
