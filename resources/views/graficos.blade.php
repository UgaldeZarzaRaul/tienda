@extends('adminlte::page')

@section('content')

@section('title', 'Gráficos de Videojuegos Digitales')

@section('content_header')
    <h1>Gráficos de Videojuegos Digitales</h1>
@stop

@section('content')
<body>
    <div class="container">
        <br><br>
        <h3>Gráficos Generados</h3>
        <hr>

        <!-- Gráfico de barras -->
        <div>
            <canvas id="barChart" width="400" height="200"></canvas>
        </div>
        <br>

        <!-- Gráfico circular -->
        <div>
            <canvas id="pieChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Datos para los gráficos
        var nombres = @json($digitales->pluck('nombre'));
        var precios = @json($digitales->pluck('precio'));

        // Gráfico de barras
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: nombres,
                datasets: [{
                    label: 'Precios de Videojuegos Digitales',
                    data: precios,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: nombres,
                datasets: [{
                    label: 'Distribución de Precios',
                    data: precios,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>

@stop

@endsection



