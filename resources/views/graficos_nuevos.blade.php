@extends('adminlte::page')

@section('content')

@section('title', 'Gráficos - Videojuegos Nuevos')

@section('content_header')
    <h1>Gráficos de Videojuegos Nuevos</h1>
@stop

@section('content')
<body>
    <div class="container">
        <br><br>
        <h3>Gráficas de Videojuegos Nuevos</h3>
        <h5>Precios de los Videojuegos Nuevos</h5>
        <hr>

        <!-- Gráfico de barras (Precios de videojuegos nuevos) -->
        <div class="chart-container">
            <canvas id="precioChart"></canvas>
        </div>

        <br>

        <!-- Gráfico de pastel (Distribución de precios) -->
        <div class="chart-container">
            <canvas id="precioPastelChart"></canvas>
        </div>

        <br>

        <!-- Regresar a la lista de videojuegos -->
        <p style="text-align: right;">
            <a href="{{ route('nuevos') }}">
                <button type="button" class="btn btn-primary btn-sm">Regresar</button>
            </a>
        </p>
    </div>
</body>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Incluir Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Configuración del gráfico de barras (Precios de videojuegos nuevos)
        var ctxBarra = document.getElementById('precioChart').getContext('2d');
        var precioChart = new Chart(ctxBarra, {
            type: 'bar',  // Tipo de gráfico: barra
            data: {
                labels: {!! json_encode($nombres) !!},  // Nombres de los videojuegos
                datasets: [{
                    label: 'Precios de los Videojuegos Nuevos',
                    data: {!! json_encode($precios) !!},  // Precios de los videojuegos
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true  // Iniciar el eje Y desde 0
                    }
                }
            }
        });

        // Configuración del gráfico de pastel (Distribución de precios)
        var ctxPastel = document.getElementById('precioPastelChart').getContext('2d');
        var precioPastelChart = new Chart(ctxPastel, {
            type: 'pie',  // Tipo de gráfico: pastel
            data: {
                labels: {!! json_encode($nombres) !!},  // Nombres de los videojuegos
                datasets: [{
                    label: 'Distribución de Precios de Videojuegos Nuevos',
                    data: {!! json_encode($precios) !!},  // Precios de los videojuegos
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 205, 86, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
@stop

@endsection


