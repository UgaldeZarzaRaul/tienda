@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')


<body>

<div class="container">
        <h3>Detalle de la Consola</h3>
        <h5>CRUD:Cosola -> Detalle</h5>
        <hr><hr><br>
        <hr>
        <b>ID:</b>{{ $consola->id_consola }} <br>
        <b>Clave:</b>{{ $consola->clave }} <br>
        <b>Nombre:</b> {{ $consola->nombre }} <br>
        <b>Cuatrimestre:</b> {{ $consola->marca }} <br>
        <br>
        <a href="{{ route('consolas') }}">
            <button type="button" class="btn btn-success">Regresar</button>
        </a>
    </div>
    
</body>

@stop

@section('css')
<linl rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
        'Guardado'
    )
</script>
@stop

@endsection