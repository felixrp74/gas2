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

    {{-- @if ($reportepagotrabajadores->count())
    <div id="imp1" class="d-flex justify-content-center">
        <div class="card"> 
            <div class="card-body">
            <input type="button" class="btn btn-info" value="PRINT" id="printbutton" onclick="javascript:imprim1(imp1);">
            </div>
        </div>
    </div>
    @endif --}}

    @if ($reportepagotrabajadores)

    
    <div class="row">
        <div class="col-sm-3 pl-5"> 
            <h2 style="text-align: start;"><img style="width: auto; height: 95px;" src="{{asset('logo.png')}}" alt=""></h2>
        </div>
        <div class="col-sm-9 pl-5"> 
            <h2 class="pl-5">RELACION DE TRABAJADORES</h2>
        </div>
        
        
    </div>
    
    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-striped" >
            <thead>
                <tr>   
                    <td ># </td>
                    <td >Año </td>
                    <td >Mes </td>
                    <td >Cargo </td>
                    <td >Nombre</td>
                    <td >Paterno</td>
                    <td >Materno</td>
                    <td >Dias asistidos</td>
                    <td >Sueldo fijo</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1}}">

                @foreach( $reportepagotrabajadores as $reporte )
                <tr>  
                    <td >{{ $i++ }}</td>
                    <td >{{ $reporte->anio }}</td>
                    <td >{{ $reporte->mes }}</td>
                    <td >{{ $reporte->cargo }}</td>
                    <td >{{ $reporte->nombre }}</td> 
                    <td >{{ $reporte->apellido_paterno }}</td> 
                    <td >{{ $reporte->apellido_materno }}</td> 
                    <td >{{ $reporte->dias_asistidos }}</td>  
                    <td >{{ $reporte->sueldo_fijo }}</td> 

                    <td>
                        <a class="btn btn-info" href="{{ url('/reporte_pago_trabajadores/'.$reporte->idempleado ) }}">Detalle</a>
                    </td>

                    {{-- <input type="hidden" value="{{ $reporte->idempleado += $reporte->promedio}}"> --}}
                    
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
    
 