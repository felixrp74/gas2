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


    @if ($reportepagotrabajador )
    <div id="imp1" class="d-flex justify-content-center">
        <div class="card"> 
            <div class="card-body">
            <input type="button" class="btn btn-info" value="PRINT" id="printbutton" onclick="javascript:imprim1(imp1);">
            </div>
        </div>
    </div>
    @endif

 
    @if ($reportepagotrabajador)
   
        <div class="row"> 
            <div class="col-sm-2"> 
                <h2 style="text-align: center;"><img style="width: auto; height: 80px;" src="{{asset('logo.png')}}" alt=""></h2>
            </div>
            <div class="col-sm-8"> 
                <h2 style="text-align: center;">Distribuciones Inca Gas E.I.R.L.</h2>
            </div>
            <div class="col-sm-2"> 
                <h2 style="text-align: center;"><img style="width: auto; height: 80px;" src="{{asset('logo.png')}}" alt=""></h2>
            </div>
        </div>

        
        {{-- <div class="row">
            <div class="col-sm-6 pl-5"> 
                <h3 style="text-align: start;"><img style="width: auto; height: 95px;" src="http://www.industrial32puno.edu.pe/wp-content/uploads/2022/10/cropped-LOGO-I32-22.png" alt=""></h3>
            </div>
            <div class="col-sm-6"> 
            
                <h3 style="text-align: end;"><img style="width: auto; height: 95px;" src="https://seeklogo.com/images/M/ministerio_de_educacion_-_peru-logo-72FA497226-seeklogo.com.png" alt=""></h3></div> 
                <h3 style="text-align: end;"><img style="text-align: end; width: auto; height: 95px;" src="https://upload.wikimedia.org/wikipedia/commons/2/21/Logo_del_Ministerio_de_Educaci%C3%B3n_del_Per%C3%BA_-_MINEDU.png" alt=""></h3></div>
            </div>            
        </div> --}}
        
        <h2 class="centro pl-5">Boleta de pago</h2>
    
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

                        {{-- <input type="hidden" value="{{ $reporte->idempleado += $reporte->promedio}}"> --}}
                        
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








        {{-- cuerpo tabla --}}
        <div class="card-body">
            <table class="table table-striped" >
                <thead>
                    <tr>   
                        <td ># </td>
                        <td >Cargo </td>
                        <td >Horas extra</td>
                        <td >Utilidades</td>
                        <td >Fondos de reservas</td>
                        <td >Vacaciones</td>
                        <td colspan="2">Fecha de elaboración</td>
                    </tr>
                </thead>
                <tbody>


                    @foreach( $reportepagotrabajador as $reporte )
                    <tr>  
                        <td >{{ $i++ }}</td>
                        <td >{{ $reporte->cargo }}</td>
                        <td >{{ $reporte->horas_extra }}</td>
                        <td >{{ $reporte->utilidades }}</td> 
                        <td >{{ $reporte->fondos_reservas }}</td> 
                        <td >{{ $reporte->vacaciones }}</td> 
                        <td colspan="2">{{ $reporte->fecha_elaboracion }}</td>  

                        
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
    
 