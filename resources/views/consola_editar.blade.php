@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')



<body>
<div class="container">
        <h3>Editar Consolas</h3>
        <h5>CRUD:Consolas -> Editar</h5>
        <hr>
        <br>
        <form action="{{ route('consola_salvar',['id' => $consola->id_consola]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <h3>Datos del Grupo</h3>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="clave" value="{{ $consola->clave }}" id ="floatingClave" placeholder="ejemplo: NSWT"
                aria-describedby="ClaveHelp">
                <label for="floatingClave">Clave</label>
                <div id="ClaveHelp" class="form-text">@if($errors->first('clave'))<i> El campo clave no es correcto </i> @endif</div>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ $consola->nombre }}" id="floatingNombre" placeholder="ejemplo: Nitendo Wii"
                aria-describedby="NombreHelp">
                <label for="floatingNombre">Clave</label>
                <div id="NombreHelp" class="form-text">Coloque el Nombre de la Consola</div>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="marca" id="floatingmarca" palceholder="SONY" aria-describedby="marcahelp">
                <input type="hidden" name="marca" value="{{ $consola->marca }}">
                <label for="floatingmarca" class="form-text">coloque el nombre de la Marca(<i>Formatos</i>: MAYUSCULAS o minusculas)</label>
            </div>
            <hr><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('consolas') }}">
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