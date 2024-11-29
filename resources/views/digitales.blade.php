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
        <h3>Lista de Videojuegos Digitales</h3>
        <h5>CRUD: Videojuegos Digitales</h5>
        <hr>

        <!-- Botón para registrar un nuevo videojuego digital -->
        <p style="text-align: right;">
            <a href="{{ route('digital_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro de Videojuego Digital</button>
            </a>
        </p>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('digitales') }}" method="GET">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="buscar" value="{{ old('buscar') }}" id="floatingBuscar" 
                       placeholder="Ejemplo: FIFA 2024" aria-describedby="buscarHelp">
                <label for="floatingBuscar">Buscar</label>
                <div id="buscarHelp" class="form-text">
                    @if($errors->first('buscar')) 
                        <i>El campo Buscar no es correcto!!!</i> 
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('digitales') }}">
                <button type="button" class="btn btn-danger">Reiniciar</button>
            </a>
        </form>

        <br><hr>

        <!-- Tabla de videojuegos digitales -->
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Otros</th>
            </tr>
            @foreach($digitales as $digital)
                <tr>
                    <td>{{ $digital->id_digital }}</td>
                    <td>{{ $digital->nombre }}</td>
                    <td>{{ $digital->precio }}</td>
                    <td>
                        <a href="{{ route('digital_detalle', ['id' => $digital->id_digital]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                        </a>

                        <a href="{{ route('digital_editar', ['id' => $digital->id_digital]) }}">
                            <button type="button" class="btn btn-warning btn-sm">Editar</button>
                        </a>

                        <a href="{{ route('digital_borrar', ['id' => $digital->id_digital]) }}">
                            <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <!-- Botón para ir a la vista de gráficos -->
        <p style="text-align: right;">
            <a href="{{ route('digitales.graficos') }}">
                <button type="button" class="btn btn-success btn-sm">Generar Gráficos</button>
            </a>
        </p>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {!! $digitales->links() !!}
        </div>
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

