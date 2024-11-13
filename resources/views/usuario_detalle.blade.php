@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')


@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop

@section('content')

<body>
    <div class="container">
        <h3>Detalle del Usuario</h3>
        <h5>Usuario -> Detalle</h5>
        <hr><hr><br>
        <img src="{{ url('/storage/'.$usuario->foto) }}" style="width: 200px;">{{ url('storage/'.$usuario->foto) }}<br>
        <br>
        <a href="{{ url('/storage/'.$usuario->foto) }}" target="_blank">
            <button type="button" class="btn btn-success">Archivo</button>
        </a><br>
        <hr>
        <b>ID:</b>{{ $usuario->id_usuario }} <br>
        <b>Nombre:</b>{{ $usuario->nombre }} <br>
        <b>fecha de Nacimiento:</b> {{ $usuario->fn }} <br>
        <br>
        <a href="{{ route('usuarios') }}">
            <button type="button" class="btn btn-success">Regresar</button>
        </a>
    </div>
</body>

@stop

@section('css')
<linl rel="stylesheet" href="/css/admin_custom.css">
@stop

@endsection