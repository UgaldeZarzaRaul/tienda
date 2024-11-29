@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')



<body>
<div class="container">
        <h3>Editar Videojuegos Digitales</h3>
        <h5>CRUD : Videojuegos Digitales -> Editar</h5>
        <hr>
        <br>
        <form action="{{ route('digital_salvar',['id' => $digital->id_digital]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <h3>Datos del Grupo</h3>
            
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ $digital->nombre }}" id="floatingNombre" placeholder="ejemplo: Halo"
                aria-describedby="NombreHelp">
                <label for="floatingNombre">nombre</label>
                <div id="NombreHelp" class="form-text">Coloque el Nombre del Videojuego </div>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="precio" id="floatingprecio" palceholder="$1200" aria-describedby="preciohelp">
                <input type="hidden" name="precio" value="{{ $digital->precio }}">
                <label for="floatingprecio" class="form-text">coloque el moto del Pecio(<i>Formatos</i>: MAYUSCULAS o minusculas)</label>
            </div>
            <hr><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('digitales') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
        <br><br><br>
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