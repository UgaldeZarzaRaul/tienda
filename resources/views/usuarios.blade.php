@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')
</head>
<body>
    <div class="container">
        <br><br>
        <br>
        <h3>Lista de Usuarios de Videgames Universe</h3>
        <h5>Nuevos Usuarios</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{ route('usuario_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro Usuario</button>
            </a>
        </p>
        <br><hr>
        <table calss="table">
            <tr>
                <th>Foto</th>
                <th>N°</th>
                <th>Nombre</th>
                <th>F.N</th>
                <th>Otros</th>
            </tr>
            @foreach($usuarios as $usuario)
            <tr>
            <td><img src="{{ asset('storage/' . $usuario->foto) }}" style="width: 30px; height: 30px;"></td>
                <td>{{ $usuario->id_usuario }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->fn }}</td>
                <td>
                    <a href="{{ route('usuario_detalle', ['id' => $usuario]) }}">
                        <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                    </a>

                    <a href="{{ route('usuario_editar', ['id' => $usuario->id_usuario]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                    </a>
                    
                    <a href="{{ route('usuario_borrar', ['id' => $usuario->id_usuario]) }}">
                        <button type="button" class="btn btn-primary btn-sm">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
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