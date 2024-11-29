@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')


@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop

@section('content')
<body>
    <div class="container">
        <h3>Editar Datos del cliente</h3>
        <h5>cliente -> Editar</h5>
        <hr>
        <br>
        <form action="{{ route('cliente_salvar',['id' => $cliente->id_cliente]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <h3>Datos del Cliente</h3>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ $cliente->nombre }}" id ="floatingNombre" placeholder="ejemplo: Raul Ugalde"
                aria-describedby="NombreHelp">
                <label for="floatingNombre">Nombre</label>
                <div id="NombreHelp" class="form-text">@if($errors->first('nombre'))<i> El campo Nombre(s) no es correcto </i> @endif</div>
            </div>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="contraseña" value="{{ $cliente->contraseña }}" id ="floatingcontraseña" placeholder="ejemplo: Raul Ugalde"
                aria-describedby="contraseñaHelp">
                <label for="floatingcontraseña">Nombre</label>
                <div id="contraseñaHelp" class="form-text">@if($errors->first('contraseña'))<i> El campo de contraseña no es correcto </i> @endif</div>
            </div>

            
            <hr><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('clientes') }}">
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

@endsection