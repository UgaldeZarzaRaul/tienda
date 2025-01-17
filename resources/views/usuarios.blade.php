@extends('adminlte::page')

@section('content')

@section('title', 'Videogames Universe')

@section('content_header')
    <h1>Tienda de Videojuegos</h1>
@stop

@section('content')
<body>
    <div class="container">
        <br><br>
        <h3>Lista de Usuarios de Videgames Universe</h3>
        <h5>Nuevos Usuarios</h5>
        <hr>
        
        <!-- Botón para registrar nuevo usuario -->
        <p style="text-align: right;">
            <a href="{{ route('usuario_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro Usuario</button>
            </a>
        </p>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('usuarios') }}" method="GET">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="buscar" value="{{ old('buscar') }}" id="floatingBuscar" 
                       placeholder="Ejemplo: Juan" aria-describedby="buscarHelp">
                <label for="floatingBuscar">Buscar</label>
                <div id="buscarHelp" class="form-text">
                    @if($errors->first('buscar')) 
                        <i>El campo Buscar no es correcto!!!</i> 
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('usuarios') }}">
                <button type="button" class="btn btn-danger">Reiniciar</button>
            </a>
        </form>

        <br><hr>

        <!-- Tabla de usuarios -->
        <table class="table">
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
                        <a href="{{ route('usuario_detalle', ['id' => $usuario->id_usuario]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                        </a>

                        <a href="{{ route('usuario_editar', ['id' => $usuario->id_usuario]) }}">
                            <button type="button" class="btn btn-warning btn-sm">Editar</button>
                        </a>

                        <a href="{{ route('usuario_borrar', ['id' => $usuario->id_usuario]) }}">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {!! $usuarios->links() !!}
        </div>

        <a href="{{ route('usuarios.graficos2') }}">
    <button type="button" class="btn btn-success btn-sm">Generar Gráficos de Usuarios</button>
</a>

</p>
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

@endsection

