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

@stop


@section('content') 

 
    @if ($reportepagotrabajador)
   
    <div class="row"> 
            <h2 style="text-align: center;"><img style="width: auto; height: 80px;" src="{{asset('logo.png')}}" alt=""></h2>
    </div>
    
    <h2 class="centro pl-5">Resumen de pagos</h2>
 
    <h2 class="centro pl-5">{{ $reportepagotrabajador[0]->nombre}} {{ $reportepagotrabajador[0]->apellido_paterno }} {{ $reportepagotrabajador[0]->apellido_materno}}</h2>
  
    
    

    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-striped" >
            <thead>
                <tr>   
                    <td ># </td>
                    <td >Anio </td>
                    <td >Mes</td>
                    <td >Dias asistidos</td>
                    <td >Sueldo fijo</td>
                    <td >Remuneración</td>
                    <td >Aporte seguros</td>
                    <td >Sueldo total</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1}}">

                @foreach( $reportepagotrabajador as $reporte )
                <tr>  
                    <td >{{ $i++ }}</td>
                    <td >{{ $reporte->anio }}</td>
                    <td >{{ $reporte->mes }}</td>
                    <td >{{ $reporte->dias_asistidos }}</td> 
                    <td >{{ $reporte->sueldo_fijo }}</td> 
                    <td >{{ $reporte->remuneracion }}</td> 
                    <td >{{ $reporte->aporte_seguro }}</td>  
                    <td >{{ $reporte->sueldo_total }}</td> 

                    <td>
                        <a class="btn btn-info" href="{{ url('/reporte_pago_trabajador/'.$reporte->idempleado.'/'.$reporte->mes) }}">Detalle</a>
                    </td>
                </tr>
                @endforeach
                <tr>  
                    
                    {{-- <input type="hidden" value="{{ $i-- }}">
                    <td  colspan="5">Promedio final</td> 
                    <td  colspan="1">{{ $promedio_final/$i }}</td>  --}}

                </tr>
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
    
 