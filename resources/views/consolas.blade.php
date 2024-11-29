@extends('adminlte::page')

@section('content')

@section('title', 'Tienda de Videojuegos')

@section('content_header')
    <h1>Tienda de Videojuegos</h1>
@stop

@section('content')
<body>
    <div class="container">
        <br><br>
        <h3>Lista de Consolas</h3>
        <h5>CRUD: Consolas</h5>
        <hr>

        <!-- Botón para registrar nueva consola -->
        <p style="text-align: right;">
            <a href="{{ route('consola_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro de Consola</button>
            </a>
        </p>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('consolas') }}" method="GET">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="buscar" value="{{ old('buscar') }}" id="floatingBuscar" 
                       placeholder="Ejemplo: Xbox" aria-describedby="buscarHelp">
                <label for="floatingBuscar">Buscar</label>
                <div id="buscarHelp" class="form-text">
                    @if($errors->first('buscar')) 
                        <i>El campo Buscar no es correcto!!!</i> 
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('consolas') }}">
                <button type="button" class="btn btn-danger">Reiniciar</button>
            </a>
        </form>

        <br><hr>

        <!-- Tabla de consolas -->
        <table class="table">
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Otros</th>
            </tr>
            @foreach($consolas as $consola)
                <tr>
                    <td>{{ $consola->id_consola }}</td>
                    <td>{{ $consola->nombre }}</td>
                    <td>{{ $consola->marca }}</td>
                    <td>
                        <a href="{{ route('consola_detalle', ['id' => $consola->id_consola]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                        </a>

                        <a href="{{ route('consola_editar', ['id' => $consola->id_consola]) }}">
                            <button type="button" class="btn btn-warning btn-sm">Editar</button>
                        </a>

                        <a href="{{ route('consola_borrar', ['id' => $consola->id_consola]) }}">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {!! $consolas->links() !!}
        </div>
        <a href="{{ route('graficos_consolas') }}">
    <button type="button" class="btn btn-primary btn-sm">Ver Gráficos de Consolas</button>
</a>

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
