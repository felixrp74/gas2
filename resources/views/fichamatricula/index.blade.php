@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ESTUDIANTE MATRICULADOS</h1>
@stop

@section('content')

<div class="card">
    {{-- cabecera tabla --}}
 

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nombre</td>
                    <td>Paterno</td>
                    <td>Materno </td>
                    <td>Acciones </td>
                </tr>

                <input type="hidden" name="" value="{{ $i = 1 }}">
            </thead>
            <tbody>
                @foreach( $matriculass as $matricula )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $matricula->nombre }}</td>
                    <td>{{ $matricula->apellido_paterno }}</td>
                    <td>{{ $matricula->apellido_materno }}</td>
                    
                    <td>
                        <a class="btn btn-warning" href="{{ url('/matricula/'.$matricula->idmatricula) }}">Ver mas</a>                       

                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>


    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop