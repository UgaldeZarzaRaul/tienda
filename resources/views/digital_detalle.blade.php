@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')


<body>

<div class="container">
        <h3>Detalle del Videojuego Digital</h3>
        <h5>CRUD : Videojuego Digital -> Detalle</h5>
        <hr><hr><br>
        <hr>
        <b>ID:</b>{{ $digital->id_digital }} <br>
        <b>Nombre:</b>{{ $digital->nombre }} <br>
        <b>Precio:</b> {{ $digital->precio }} <br>
        
        <br>
        <a href="{{ route('digitales') }}">
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