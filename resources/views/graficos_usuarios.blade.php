@extends('adminlte::page')

@section('content')

@section('title', 'Gráficos de Usuarios')

@section('content_header')
    <h1>Gráficos de Usuarios de Videogames Universe</h1>
@stop

@section('content')

<div class="container">
    <h3>Gráficos de Usuarios</h3>

    <!-- Gráfico de Barras -->
    <h4>Gráfico de Barras</h4>
    <canvas id="barChart"></canvas>

    <!-- Gráfico de Pastel -->
    <h4>Gráfico de Pastel</h4>
    <canvas id="pieChart"></canvas>

</div>

@stop

@section('css')
    <!-- Agregar la librería Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stop

@section('js')
<script>
    // Obtener los datos de los usuarios
    var labels = @json($labels);
    var data = @json($data);

    // Gráfico de Barras
    var ctxBar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Usuarios',
                data: data,
                backgroundColor: '#007bff',
                borderColor: '#0056b3',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de Pastel
    var ctxPie = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#A833FF'],
                borderColor: ['#C70039', '#00FF00', '#0033FF', '#FF0056', '#8A33FF'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@stop

@endsection
