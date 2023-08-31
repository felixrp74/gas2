@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR BALON DE GAS</h1>
@stop

@section('content')

<div>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            
        <form action="{{ url('/balon_gas/'.$gas->idgas) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('logistica.form') 
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