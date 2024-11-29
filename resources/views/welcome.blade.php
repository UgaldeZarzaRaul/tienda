<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Estilos para el fondo */
            body {
                margin: 0;
                padding: 0;
                height: 100vh;
                background-image: url('https://source.unsplash.com/random/1920x1080'); /* Imagen aleatoria de Unsplash */
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                font-family: 'Figtree', sans-serif;
            }

            /* Menú flotante */
            .floating-menu {
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: rgba(255, 255, 255, 0.8);
                border-radius: 10px;
                padding: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                backdrop-filter: blur(10px);
            }

            .floating-menu a {
                font-weight: 600;
                color: #333;
                margin: 0 10px;
                text-decoration: none;
                padding: 8px 12px;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .floating-menu a:hover {
                background-color: #f1f1f1;
            }

            /* Contenido principal */
            .content {
                padding: 20px;
                color: white;
                text-align: center;
                position: relative;
                z-index: 1;
            }

            h1 {
                font-size: 3rem;
                margin-bottom: 20px;
            }

            p {
                font-size: 1.2rem;
            }

            /* Pie de página */
            .footer {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                text-align: center;
                color: white;
                font-size: 14px;
            }
        </style>
    </head>
    <body class="antialiased">

        <!-- Menú flotante -->
        <div class="floating-menu">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <h1>Welcome to Laravel!</h1>
            <p>Explore the power of Laravel with our documentation, tutorials, and more.</p>
        </div>

        <!-- Pie de página -->
        <div class="footer">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>

    </body>
</html>



