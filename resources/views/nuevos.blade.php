@extends('adminlte::page')

@section('content')

@section('title', 'Viedeogames Universe')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')

<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>

<body>

<div class="container">
    <br><br>
    <br>
    <h3>Lista de Videojuegos Nuevos</h3>
    <h5>CRUD : Videojuegos Nuevos</h5>
    <hr>
    <p style="text-align: right;">
        <a href="{{ route('nuevo_alta') }}">
            <button type="button" class="btn btn-primary btn-sm">Nuevo Registro de Grupos</button>
        </a>
    </p>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('nuevos') }}" method="GET" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-floating mb-3">
            <input type="input" class="form-control" name="buscar" value="{{ old('buscar') }}" id="floatingBuscar" 
                placeholder="ejemplo: Halo" aria-describedby="buscarHelp">
            <label for="floatingBuscar">Buscar</label>
            <div id="buscarHelp" class="form-text">@if($errors->first('buscar')) <i>El campo Buscar no es correcto!!!</i> @endif</div>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('nuevos') }}">
            <button type="button" class="btn btn-danger">Reiniciar</button>
        </a>
    </form>

    <hr><br>

    <!-- Tabla de videojuegos -->
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Otros</th>
        </tr>
        @foreach($nuevos as $nuevo)
    <tr>
        <td>{{ $nuevo->id_nuevo }}</td>
        <td>{{ $nuevo->nombre }}</td>
        <td>{{ $nuevo->precio }}</td>
        <td>
            <a href="{{ route('nuevo_detalle', ['id' => $nuevo->id_nuevo]) }}">
                <button type="button" class="btn btn-primary btn-sm">Detalle</button>
            </a>

            <a href="{{ route('nuevo_editar', ['id' => $nuevo->id_nuevo]) }}">
                <button type="button" class="btn btn-primary btn-sm">Editar</button>
            </a>
            
            <a href="{{ route('nuevo_borrar', ['id' => $nuevo->id_nuevo]) }}">
                <button type="button" class="btn btn-primary btn-sm">Borrar</button>
            </a>
        </td>
    </tr>
@endforeach

    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {!! $nuevos->links() !!} <!-- Paginación de los resultados -->
    </div>

    <p style="text-align: right;">
    <a href="{{ route('nuevos.graficos') }}">
        <button type="button" class="btn btn-success btn-sm">Generar Gráficos</button>
    </a>
</p>

</div>

</body>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css"> <!-- Corregí "linl" a "link" -->
@stop

@section('js')
<script>
    Swal.fire(
        'Guardado'
    )
</script>
@stop

@endsection
