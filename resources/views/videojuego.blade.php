@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')

@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop
    
@section('content')


<body>

        <br><br>
        <br>
        <h3>Lista de Videojuego</h3>
        <h5>CRUD: Videojuego</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{ route('videojuego_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro</button>
            </a>
        </p>
        <hr><br>

        <table class="table">
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Condicion</th>
                <th>Otros</th>
            </tr>
            @foreach($videojuego as $videojuego)
                <tr>
                    <td>{{ $videojuego->id_videojuego }}</td>
                    <td>{{ $videojuego->nombrej }}</td>
                    <td>{{ $videojuego->plataforma }}</td>
                    <td>{{ $videojuego->condicion }}</td>
                    <td>
                        <a href="{{ route('videojuego_detalle',['id' => $videojuego->id_videojuego]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Detalle</button>
                        </a>
                        <a href="{{ route('videojuego_editar',['id' => $videojuego->id_videojuego]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                        </a>
                        <a href="{{ route('videojuego_borrar',['id' => $videojuego->id_videojuego]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Borrar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>



    <script>
    
    const table = document.querySelector('.table');
    table.addEventListener('change', () => {
        fetch('/your/data') 
            .then(response => response.json())
            .then(data => {
                myChart.data.datasets[0].data = data.map(item => item.value);
                myChart.data.labels = data.map(item => item.label);
                myChart.update();
            });
    });
</script>

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