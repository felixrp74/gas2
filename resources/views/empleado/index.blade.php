@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

<style>
    .printbutton {
        cursor: pointer;
    }

    .centro {
        text-align: center;
    }
</style>
gi
@stop


@section('content') 

    {{-- @if ($empleados->count())
    <div id="imp1" class="d-flex justify-content-center">
        <div class="card"> 
            <div class="card-body">
            <input type="button" class="btn btn-info" value="PRINT" id="printbutton" onclick="javascript:imprim1(imp1);">
            </div>
        </div>
    </div>
    @endif --}}

    @if ($empleados)

    
    <div class="row">
        <div class="col-sm-3 pl-5"> 
            <h2 style="text-align: start;"><img style="width: auto; height: 95px;" src="{{asset('logo.png')}}" alt=""></h2>
        </div>
        <div class="col-sm-9 pl-5"> 
            <h2 class="pl-5">RELACION DE EMPLEADOS</h2>
        </div>
        
        
    </div>
    
    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-striped" >
            <thead>
                <tr>   
                    <td ># </td>
                    <td >Nombre</td>
                    <td >Paterno</td>
                    <td >Materno</td>
                    <td >Direccion </td>
                    <td >Celular </td>
                    <td >Email </td>
                    <td >Puesto</td>
                    <td >Sede</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1}}">

                @foreach( $empleados as $empleado )
                <tr>  
                    <td >{{ $i++ }}</td>
                    <td >{{ $empleado->nombre }}</td> 
                    <td >{{ $empleado->apellido_paterno }}</td> 
                    <td >{{ $empleado->apellido_materno }}</td> 
                    <td >{{ $empleado->direccion }}</td>  
                    <td >{{ $empleado->celular }}</td> 
                    <td >{{ $empleado->email }}</td> 
                    <td >{{ $empleado->nombre_puesto }}</td> 
                    <td >{{ $empleado->nombre_sede }}</td> 

                    <td>
                        <a class="btn btn-info" href="{{ url('/empleado/'.$empleado->idempleado.'/edit') }}">Editar</a>
                        {{-- <a class="btn btn-info" href="{{ route('empleado.edit', compact('empleado')) }}">Editar</a> --}}
                    </td>
                    <td>
                        <form action="{{ url('/empleado/'.$empleado->idempleado) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                        </form>
        
                    </td>

                    {{-- <input type="hidden" value="{{ $empleado->idempleado += $empleado->promedio}}"> --}}
                    
                </tr>
                @endforeach
                
            </tbody>
        
        </table>
    </div>
    


    @else
        <div class="card-body">
            <h4>No se tiene registro en la BASE DATOS...</h4>
        </div>
    @endif

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
<script> 
    document.querySelectorAll('#printbutton').forEach(function(element) {
        element.addEventListener('click', function() {
            // document.getElementById("printbutton");
            document.getElementById('printbutton').type = 'hidden';
            print();
            document.getElementById('printbutton').type = 'button';
        });
    });

</script>
@stop
    
 