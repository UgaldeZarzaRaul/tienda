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
        <h3>Nuevo Registro de Usuarios</h3>
        <h5>Usuarios -> Registro</h5>
        <hr>
        <br>
        <form action="{{ route('usuario_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos personales</h3>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingNombre"
                placeholder="ejemplo: Raul Ugalde" aria-describedby="NombreHelp">
                <label for="floatingNombre">Nombre</label>
                <div id="NombreHelp" class="form-text">@if($errors->first('nombre')) <i> El Campo Nombre(s) no es correcto</i>@endif</div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="fn" value="{{ old('fn') }}" id="floatingfn" placeholder="ejemplo: 15/03/1981"
                aria-describedby="fnHelp">
                <label for="floatingfn">Fecha de Nacimiento </label>
                <div id="fnHelp" class="form-text">Coloque su Fecha de Nacimiento (<i>Formato</i>:dia/mes/año)</div>
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" name="foto" id="floatingfoto" placeholder="- - - -" aria-describedby="fotohelp">
                <label for="floatingfoto">Foto</label>
                <div id="fotohelp" class="form-text">Busque una Imagen para su perfil (<i>Formatos</i>:jpm/png/bmp)</div>

            </div>
            <hr><br>

            <button type="submit" class="btn btn-primay">Guardar</button>
            <a href="{{ route('usuarios') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
        <br><br><br>
    @stop

@section('css')
<linl rel="stylesheet" href="/css/admin_custom.css">
@stop



@endsection