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


    @if ($reporteventa )
    <div id="imp1" class="d-flex justify-content-center">
        <div class="card"> 
            <div class="card-body">
            <input type="button" class="btn btn-info" value="PRINT" id="printbutton" onclick="javascript:imprim1(imp1);">
            </div>
        </div>
    </div>
    @endif


    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Boleta de Venta de Gas</h1>
                <p><strong>Fecha:</strong> {{ $reporteventa[0]->fecha_venta }}</p>
                <p><strong>Cliente:</strong> {{ $reporteventa[0]->nombre }} {{ $reporteventa[0]->apellido_paterno }} {{ $reporteventa[0]->apellido_materno}}</p>
                <p><strong>DNI cliente:</strong> {{ $reporteventa[0]->dni }}</p>
                <p><strong>RUC cliente:</strong> {{ $reporteventa[0]->ruc }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Descripción</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $reporteventa as $reporte )
                        
                            <tr>
                                <td>{{ $reporte->descripcion }}</td>
                                <td>{{ $reporte->cantidad_detalle_ingresos }}</td>
                                <td>{{ $reporte->precio_subtotal_detalle_ingresos }}</td>
                                <td>{{ $reporte->cantidad_detalle_ingresos * $reporte->precio_subtotal_detalle_ingresos }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td>{{ $reporte->cantidad_detalle_ingresos * $reporte->precio_subtotal_detalle_ingresos }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
  
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
    
    <!-- Incluye los archivos JS de Bootstrap (jQuery y Popper.js) -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
