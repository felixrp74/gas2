@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRAR VENTA</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    

    <div class="card">
        <div class="card-body">
            
            <form action="{{ url('/venta') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">

                <div class="col-sm-6">
                
                    <div class="form-group row">
                        <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                        <div class="col-sm-8">
                            {{-- <input type="text" name="dni" class="form-control" value="{{ isset($estudiante->dni)?$estudiante->dni:'' }}" id="dni"> --}}
                            <input type="text" name="dni" class="form-control" value="28765634" id="dni">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ruc" class="col-sm-4 col-form-label">RUC</label>
                        <div class="col-sm-8">
                            <input type="text" name="ruc" class="form-control" value="10233423344" id="ruc">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            {{-- <input type="text" name="dni" class="form-control" value="" id="dni"> --}}
                            <input type="text" name="nombre" class="form-control" value="Mario" id="nombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                        <div class="col-sm-8">
                            <input type="text" name="apellido_paterno" class="form-control" value="Quispe" id="apellido_paterno">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                        <div class="col-sm-8">
                            <input type="text" name="apellido_materno" class="form-control" value="Luque" id="apellido_materno">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="direccion_actual" class="col-sm-4 col-form-label">Direccion</label>
                        <div class="col-sm-8">
                            <input type="text" name="direccion_actual" class="form-control" value="Jr. Arequipa 234" id="direccion_actual">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="barrio" class="col-sm-4 col-form-label">Barrio</label>
                        <div class="col-sm-8">
                            <input type="text" name="barrio" class="form-control" value="San antonio" id="barrio">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="referencia" class="col-sm-4 col-form-label">Referencia</label>
                        <div class="col-sm-8">
                            <input type="text" name="referencia" class="form-control" value="Hospital" id="referencia">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="manzana" class="col-sm-4 col-form-label">Manzana</label>
                        <div class="col-sm-8">
                            <input type="text" name="manzana" class="form-control" value="Z" id="manzana">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="lote" class="col-sm-4 col-form-label">Lote</label>
                        <div class="col-sm-8">
                            <input type="text" name="lote" class="form-control" value="3" id="lote">
                        </div>
                    </div>

                </div> 

















                
                <div class="col-sm-6">

                    <div class="form-group row">
                        <label for="tipo" class="col-sm-4 col-form-label">Tipo</label>
                        <div class="col-sm-8">
                            <select type="text" name="tipo" class="form-control" id="tipo">
                                <option value="ROSCA">ROSCA</option>
                                <option value="PRESION">PRESION</option>
                                <option value="NORMAL">NORMAL</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="marca" class="col-sm-4 col-form-label">Marca</label>
                        <div class="col-sm-8">
                            <select type="text" name="marca" class="form-control" id="marca">
                                <option value="OXISOL">OXISOL</option>
                                <option value="NEWGAS">NEWGAS</option>
                                <option value="SOLGAS">SOLGAS</option>
                            </select>
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
                        <label for="cantidad" class="col-sm-4 col-form-label">Cantidad</label>
                        <div class="col-sm-8">
                            <input type="number" name="cantidad" class="form-control" value="1" id="cantidad">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="precio" class="col-sm-4 col-form-label">Precio Unidad</label>
                        <div class="col-sm-8">
                            <input type="number" name="precio" class="form-control" value="60.50" id="precio">
                        </div>
                    </div>         
                    
                    <div class="form-group row">
                        <label for="total" class="col-sm-4 col-form-label">Total</label>
                        <div class="col-sm-8">
                            <input type="text" name="total" class="form-control"  id="total">
                        </div>
                    </div>         
                    
                    {{-- <input class="btn btn-warning" type="button" value="Calcular" onclick="calcular()"> --}}
                    
                    <input class="btn btn-info" type="submit" value="Guardar datos">
                    <button class="btn btn-warning" onclick="calcular(); event.preventDefault();" pre >Calcular</button>
                    
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
