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

 

    {{-- @if ($reportecomprobantes->count())
    <div id="imp1" class="d-flex justify-content-center">
        <div class="card"> 
            <div class="card-body">
            <input type="button" class="btn btn-info" value="PRINT" id="printbutton" onclick="javascript:imprim1(imp1);">
            </div>
        </div>
    </div>
    @endif --}}

    @if ($reportecomprobantes)

    
    <div class="row">
        <div class="col-sm-6 pl-5"> 
            <h2 style="text-align: start;"><img style="width: auto; height: 95px;" src="{{asset('logo.png')}}" alt=""></h2>
        </div>
        <div class="col-sm-6 pl-5"> 
        
            {{-- <h3 style="text-align: end;"><img style="width: auto; height: 95px;" src="https://seeklogo.com/images/M/ministerio_de_educacion_-_peru-logo-72FA497226-seeklogo.com.png" alt=""></h3></div> --}}
            {{-- <h3 style="text-align: end;"><img style="text-align: end; width: auto; height: 95px;" src="https://upload.wikimedia.org/wikipedia/commons/2/21/Logo_del_Ministerio_de_Educaci%C3%B3n_del_Per%C3%BA_-_MINEDU.png" alt=""></h3></div> --}}
            <h2 class="pl-5">Comprobantes</h2>
        </div>
        
        
    </div>
    
    {{-- <h2 class="centro pl-5">INSTITUCION EDUCATIVA SECUNDARIA INDUSTRIAL 32</h2>
    <br>
    <h1 class="centro pl-5">LIBRETA DE NOTAS</h1>
    <br>
    <h2 class="centro pl-5">{{ $reportecomprobantes[0]->nombre}} {{ $reportecomprobantes[0]->apellido_paterno }} {{ $reportecomprobantes[0]->apellido_materno}}</h2>
    <br>
    <h3 class="centro pl-5"> Año académico {{ $reportecomprobantes[0]->anio_academico }} </h3>
    <br>

    <br>
    <br>
    <div class="row">
        <div class="col-sm-6 pl-5"><h3 style="text-align: start;"> N° Matricula / Dni: {{ $reportecomprobantes[0]->dni }}</h3></div>
        
    </div> --}}
    
    

    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-striped" >
            <thead>
                <tr>   
                    <td ># </td>
                    <td >Sede </td>
                    <td >Tipo</td>
                    <td >Peso</td>
                    <td >Precio</td>
                    <td >Marca</td>
                    <td >Precio venta</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1}} {{ $promedio_final = 0.0}}">

                @foreach( $reportecomprobantes as $reporte )
                <tr>  
                    <td >{{ $i++ }}</td>
                    <td >{{ $reporte->sede_empresa }}</td>
                    {{-- <td >{{ $reporte->especialidad }}</td> --}}
                    <td >{{ $reporte->tipo }}</td> 
                    <td >{{ $reporte->peso }}</td> 
                    <td >{{ $reporte->precio }}</td> 
                    <td >{{ $reporte->marca }}</td>  
                    <td >{{ $reporte->precio_venta }}</td> 

                    {{-- <input type="hidden" value="{{ $promedio_final += $reporte->promedio}}"> --}}
                    
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
    
 