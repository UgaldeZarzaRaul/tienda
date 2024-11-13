@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')


@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop

@section('content')
<body>
    <div class="container">
        <h3>Editar Datos del usuario</h3>
        <h5>Usuarios -> Editar</h5>
        <hr>
        <br>
        <img src="{{ url('img/'.$usuario->foto) }}" width="120px" style="border: 1px solid #000;border-radius: 5px;">
        <br>
        <form action="{{ route('usuario_salvar',['id' => $usuario->id_usuario]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <h3>Datos Personales</h3>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ $usuario->nombre }}" id ="floatingNombre" placeholder="ejemplo: Raul Ugalde"
                aria-describedby="NombreHelp">
                <label for="floatingNombre">Nombre</label>
                <div id="NombreHelp" class="form-text">@if($errors->first('nombre'))<i> El campo Nombre(s) no es correcto </i> @endif</div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="fn" value="{{ $usuario->fn }}" id="floating" placeholder="ejemplo: 15/03/1981"
                aria-describedby="fnHelp">
                <label for="floating">Fechas de Nacimiento</label>
                <div id="fnHelp" class="form-text">Coloque su fecha de nacimiento (<i>Formato</i>: dia/mes/año)</div>
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" name="foto1" id="floatingfoto" palceholder="- - - -" aria-describedby="fotohelp">
                <input type="hidden" name="foto2" value="{{ $usuario->foto }}">
                <label for="floatingfoto" class="form-text">Busque una imagne para su perfil(<i>Formatos</i>: jpg/png/bmp)</label>
            </div>
            <hr><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('usuarios') }}">
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