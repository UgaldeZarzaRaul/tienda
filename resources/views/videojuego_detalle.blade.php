@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')


@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop

@section('content')

<body>
    <div class="container">
        <h3>Detalle de Videojuego</h3>
        <h5>CRUD:Videojuego -> Detalle</h5>
        <br>
            <hr>
            <b>ID: </b>{{ $videojuego->id_videojuego }} <br>
            <b>Nombre: </b>{{ $videojuego->nombrej }} <br>
            <b>Plataforma: </b>{{ $videojuego->plataforma }}<br>
            <b>Condicion: </b>{{ $videojuego->condicion}}<br>
            <br><hr>
            <a href="{{ route('videojuego') }}">
                <button type="button" class="btn btn-success">Regresar</button>
            </a>
        </div>
        <hr>
</body>
@stop

@section('css')
<linl rel="stylesheet" href="/css/admin_custom.css">
@stop

@endsection