@extends('adminlte::page')

@section('title', 'Videojuegos Universie')

@section('content_header')
    <h1>Tienda de Videojuegos</h1>
@stop

@section('content')
    <div class="container">
        <h3>Detalle de Clientes</h3>
        <h5>CRUD: Cliente -> Detalle</h5>
        <br>
        <hr>
        <b>ID: </b>{{ $clientes->id_cliente }} <br>
        <b>Nombre: </b>{{ $clientes->nombre }} <br>
        <b>Contraseña: </b>{{ $clientes->contraseña }}<br>
        <br><hr>
        <a href="{{ route('consolas') }}">
            <button type="button" class="btn btn-success">Regresar</button>
        </a>
    </div>
    <hr>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@endsection
