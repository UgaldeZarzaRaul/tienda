@extends('adminlte::page')

@section('content')

@section('title', 'Gráficos de Consolas')

@section('content_header')
    <h1>Gráficos de Consolas</h1>
@stop

@section('content')
<body>
    <div class="container">
        <br><br>
        <h3>Gráficas de Consolas</h3>
        <h5>Visualización de Consolas por Nombre y Marca</h5>
        <hr>

        <!-- Gráfico de barras: Número de consolas por nombre -->
        <div class="chart-container">
            <canvas id="barrasConsolasChart"></canvas>
        </div>

        <br>

        <!-- Gráfico de pastel: Distribución de consolas por marca -->
        <div class="chart-container">
            <canvas id="pastelConsolasChart"></canvas>
        </div>

        <br>

        <!-- Botón para regresar a la lista de consolas -->
        <p style="text-align: right;">
            <a href="{{ route('consolas') }}">
                <button type="button" class="btn btn-primary btn-sm">Regresar a la Lista de Consolas</button>
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
        // Configuración para el gráfico de barras (Número de consolas por nombre)
        var ctxBarras = document.getElementById('barrasConsolasChart').getContext('2d');
        var barrasConsolasChart = new Chart(ctxBarras, {
            type: 'bar',  // Tipo de gráfico: barras
            data: {
                labels: {!! json_encode($nombres) !!},  // Nombres de las consolas
                datasets: [{
                    label: 'Número de Consolas por Nombre',
                    data: new Array({{ count($nombres) }}).fill(1),  // Cada consola aparece una vez
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true  // Inicia el eje Y desde 0
                    }
                }
            }
        });

        // Configuración para el gráfico de pastel (Distribución de consolas por marca)
        var ctxPastel = document.getElementById('pastelConsolasChart').getContext('2d');
        var pastelConsolasChart = new Chart(ctxPastel, {
            type: 'pie',  // Tipo de gráfico: pastel
            data: {
                labels: {!! json_encode($marca_counts->keys()) !!},  // Marcas de las consolas
                datasets: [{
                    label: 'Distribución de Consolas por Marca',
                    data: {!! json_encode($marca_counts->values()) !!},  // Cantidad de consolas por marca
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
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
