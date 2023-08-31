@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRAR TRABAJADOR</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    

    <div class="card">
        <div class="card-body">
            
            <form action="{{ url('/reporte_pago_trabajadores') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">

                <div class="col-sm-6">

                    <div class="form-group row">
                        <label for="sede_idsede" class="col-sm-4 col-form-label">Sede</label>
                        <div class="col-sm-8">
                            <select type="text" name="sede_idsede" class="form-control" id="sede_idsede">
                                <option value="1">CHANU CHANU</option>
                                <option value="2">BELLAVISTA</option>
                                <option value="3">TOBOGAN</option>
                                <option value="4">YANAMAYO</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="puesto" class="col-sm-4 col-form-label">Puesto:</label>
                        <div class="col-sm-8">
                            
                            <select name="puesto" class="form-control" id="puesto">
                                @foreach ($roles as $item)
                                
                                    <option value="{{$item->id}}">{{$item->id}} {{$item->name}}</option>
                                
                                @endforeach
                            </select>
                             
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="puesto_idpuesto" class="col-sm-4 col-form-label">Puesto</label>
                        <div class="col-sm-8">
                            <select type="text" name="puesto_idpuesto" class="form-control" id="puesto_idpuesto">
                                <option value="1">1MOTORIZADO</option>
                                <option value="2">2ESPECIALISTA EN TESORERIA</option>
                                <option value="3">3ESPECIALISTA EN CONTABILIDAD</option>
                                <option value="4">4ESPECIALISTA EN LOGISTICA</option>
                                <option value="5">5ESPECIALISTA EN ATENCION AL CLIENTE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                        <div class="col-sm-8">
                            {{-- <input type="text" name="dni" class="form-control" value="{{ isset($estudiante->dni)?$estudiante->dni:'' }}" id="dni"> --}}
                            <input type="text" name="dni" class="form-control" value="87675656" id="dni">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            {{-- <input type="text" name="dni" class="form-control" value="" id="dni"> --}}
                            <input type="text" name="nombre" class="form-control" value="Eli" id="nombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                        <div class="col-sm-8">
                            <input type="text" name="apellido_paterno" class="form-control" value="Rosendo" id="apellido_paterno">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                        <div class="col-sm-8">
                            <input type="text" name="apellido_materno" class="form-control" value="Jimenez" id="apellido_materno">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="direccion" class="col-sm-4 col-form-label">Direccion</label>
                        <div class="col-sm-8">
                            <input type="text" name="direccion" class="form-control" value="Jr. Pardo 876" id="direccion">
                        </div>
                    </div>

                   

                </div> 

















                
                <div class="col-sm-6">
 
                    <div class="form-group row">
                        <label for="celular" class="col-sm-4 col-form-label">Celular</label>
                        <div class="col-sm-8">
                            <input type="text" name="celular" class="form-control" value="987612364" id="celular">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" class="form-control" value="eli@gmail.com" id="email">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                        <div class="col-sm-8">
                            <input type="text" name="password" class="form-control" value="eli@eli.com" id="password">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="manzana" class="col-sm-4 col-form-label">Manzana</label>
                        <div class="col-sm-8">
                            <input type="text" name="manzana" class="form-control" value="Z" id="manzana">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="dias_asistidos" class="col-sm-4 col-form-label">Días asistidos</label>
                        <div class="col-sm-8">
                            <input type="text" name="dias_asistidos" class="form-control" value="24" id="dias_asistidos">
                        </div>
                    </div>
                    
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
