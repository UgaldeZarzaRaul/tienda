@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')
<body>
    <div class="container">
        <h3>Nuevo Registro de Clientes</h3>
        <h5>Cliente -> Registro</h5>
        <hr>
        <br>
        <form action="{{ route('cliente_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Datos personales</h3>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingNombre"
                placeholder="ejemplo: Raul Ugalde" aria-describedby="NombreHelp">
                <label for="floatingNombre">Nombre</label>
                <div id="NombreHelp" class="form-text">@if($errors->first('nombre')) <i> El Campo Nombre(s) no es correcto</i>@endif</div>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="contraseña" value="{{ old('contraseña') }}" id="floatingcontraseña"
                placeholder="mas de 8 caracteres" aria-describedby="contraseñaHelp">
                <label for="floatingcontraseña">Contraseña</label>
                <div id="contraseñaHelp" class="form-text">@if($errors->first('contraseña')) <i> El Campo contraseña no es correcto</i>@endif</div>
            </div>
            
            <hr><br>

            <button type="submit" class="btn btn-primay">Guardar</button>
            <a href="{{ route('clientes') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </form>
        <br><br><br>
        @stop

@section('css')
<linl rel="stylesheet" href="/css/admin_custom.css">
@stop



@endsection
