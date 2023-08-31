@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>INVENTARIO DE GAS</h1>
@stop

@section('content')
 
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    {{-- 
        SEDE, CANTIDAD_BALONES, DESCRIPCION, PESO, TIPO, PRECIO, MARCA, CANTIDAD, MARCA
        
        --}}

    <div class="card">
        {{-- cabecera tabla --}}
        <div class="card-header">
            <a class="btn btn-primary" href="{{url('/balon_gas/create')}}">Registrar balones de gas</a>
        </div>
        
        
        @if ($balones_gas)
        {{-- cuerpo tabla --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                        <tr>
                            <td>#</td>
                            <td>Sede</td>
                            <td>Descripcion</td>
                            <td>Peso</td>
                            <td>Tipo</td>
                            <td>Precio</td>
                            <td>Marca</td>
                            <td>LLenos</td>
                            <td>Vacios</td>
                            <td>Sobra</td>
                            <td colspan="2">Acciones</td>
                            <input type="hidden" value="{{$i = 1}}">
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach( $balones_gas as $balon_gas )

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $balon_gas->nombre }}</td>
                            <td>{{ $balon_gas->descripcion }}</td>
                            <td>{{ $balon_gas->peso }}</td>
                            <td>{{ $balon_gas->tipo }}</td>
                            <td>{{ $balon_gas->precio }}</td>
                            <td>{{ $balon_gas->marca }}</td>
                            <td>{{ $balon_gas->cantidad }}</td>
                            <td>{{ $balon_gas->cantidad_vacios }}</td>
                            <td>{{ $balon_gas->cantidad-$balon_gas->cantidad_vacios }}</td>
                            <td>
                                <form action="{{ url('/balon_gas/'.$balon_gas->idgas) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                                </form>
                
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ url('/balon_gas/'.$balon_gas->idgas.'/edit') }}">Editar</a>
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
    <script> console.log('Hi!'); </script>
@stop