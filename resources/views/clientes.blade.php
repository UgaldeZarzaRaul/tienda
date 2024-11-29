@extends('adminlte::page')

@section('title','Viedeogames Universe')

@section('content_header')
    <h1>Tienda de Videojuegos</h1>
@stop

@section('content')
<body>
    <div class="container">
        <br><br>
        <br>
        <h3>Lista de Clientes de Videgames Universe</h3>
        <h5>Clientes</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{ route('cliente_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro cliente</button>
            </a>
        </p>
        <br><hr>
        <table class="table">
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id_cliente }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->contraseña }}</td>
                <td>
                    <a href="{{ route('cliente_detalle',['id' => $cliente->id_cliente]) }}">
                        <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                    </a>
                    <a href="{{ route('cliente_editar',['id' => $cliente->id_cliente]) }}">
                        <button type="button" class="btn btn-warning btn-sm">Editar</button>
                    </a>
                    <a href="{{ route('cliente_borrar',['id' => $cliente->id_cliente]) }}" 
                       onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
                        <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
        'Guardado'
    )
</script>
@stop
