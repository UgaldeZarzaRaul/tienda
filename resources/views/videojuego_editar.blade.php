@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')


@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop

@section('content')


<body>
    <div class="container">
        <h3>Editar Videojuego</h3>
        <h5>CRUD:Grupos -> Editar</h5>
        <hr>
        <form action="{{ route('videojuego_salvar', ['id' => $videojuego->id_videojuego]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h3>Datos Personales</h3>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombrej" value="{{ $videojuego->nombrej }}" id="floatingNombrej" 
                placeholder="Ejemplo: Roberto Vinicio" aria-describedby="NombrejHelp">
                <label for="floatingNombrej">Nombre</label>
                <div id="NombrejHelp" class="form-text">@if($errors->first('nombrej')) <i>El campo nombre no es correcto!!</i>@endif</div>
            </div>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="plataforma" value="{{ $videojuego->plataforma }}" id="floatingPlataforma" 
                placeholder="Ejemplo: Pc,Xbox..." aria-describedby="PlataformaHelp">
                <label for="floatingPlataforma">Plataforma</label>
                <div id="PlataformaHelp" class="form-text">@if($errors->first('plataforma')) <i>El campo Plataforma no es correcto!!</i>@endif</div>
            </div>
            
            <div class="input-group mb-3">
                <select class="form-select" name="condicion" value="{{ $videojuego->condicion }}" id="condicion">
                    <option selected>Selecciona una opcion...</option>

                    <option value="Buena">Buena</option>
                    <option value="Media">Media</option>
                    <option value="Mala">Mala</option>

                </select>
                <label class="input-group-text" for="condicion" >Condicion</label>
            </div>


            <hr><br>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('videojuego') }}">
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