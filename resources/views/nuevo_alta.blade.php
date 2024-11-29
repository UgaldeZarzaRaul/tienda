@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')




<body>
    
<body>
<div class="container">
        <h3>Nuevo Registro de Videojuegos Nuevos</h3>
        <h5>CRUD : Videojuegos Nuevos -> Registro</h5>
        <hr>
        <br>
        <form action="{{ route('nuevo_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos del Videojuego</h3>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingnombre" placeholder="ejemplo: Halo "
                aria-describedby="nombreHelp">
                <label for="floatingnombre">Nombre </label>
                <div id="nombreHelp" class="form-text">Coloque el Nombre del Videojuego </div>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="precio" id="floatingprecio" placeholder="$1200" aria-describedby="preciohelp">
                <label for="floatingprecio">Precio</label>
                <div id="preciohelp" class="form-text">Coloque el nombre de la Marca (<i>Formatos</i>:MAYUSCULAS o minusculas)</div>

            </div>
            <hr><br>

            <button type="submit" class="btn btn-primay">Guardar</button>
            <a href="{{ route('consolas') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
        <br><br><br>
    </div>
</body>

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