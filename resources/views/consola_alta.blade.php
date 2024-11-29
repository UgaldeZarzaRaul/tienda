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
        <h3>Nuevo Registro de Consolas</h3>
        <h5>CRUD:Consolas-> Registro</h5>
        <hr>
        <br>
        <form action="{{ route('consola_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos del Grupo</h3>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="clave" value="{{ old('clave') }}" id="floatingClave"
                placeholder="ejemplo: NSWT" aria-describedby="ClaveHelp">
                <label for="floatingClave">Clave</label>
                <div id="ClaveHelp" class="form-text">@if($errors->first('clave')) <i> El Campo clave no es correcto</i>@endif</div>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingnombre" placeholder="ejemplo: Nintendo "
                aria-describedby="nombreHelp">
                <label for="floatingnombre">Nombre </label>
                <div id="nombreHelp" class="form-text">Coloque el Nombre de la Consola </div>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="marca" id="floatingmarca" placeholder="SONY" aria-describedby="marcahelp">
                <label for="floatingmarca">Marca</label>
                <div id="marcahelp" class="form-text">Coloque el nombre de la Marca (<i>Formatos</i>:MAYUSCULAS o minusculas)</div>

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