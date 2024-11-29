@extends('adminlte::page')

@section('content')

@section('title','Viedeogames Universie')


@section('content_header')
<h1>Tienda de Videojuegos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Descripcion </h1>
    </div>
    <div class="card-body">
        <p>En Videogames Universie, nos apasiona el mundo de los videojuegos y estamos aquí para ofrecerte todo lo que necesitas para sumergirte en la mejor experiencia gamer. Ya sea que seas un jugador casual o un competitivo de alto nivel, nuestra plataforma está diseñada para todos los tipos de jugadores.

¿Qué encontrarás en Videogames Universie?

Novedades y Lanzamientos: Mantente al tanto de las últimas noticias sobre videojuegos, lanzamientos de nuevos títulos y actualizaciones de tus juegos favoritos. Desde grandes franquicias hasta nuevos desarrollos indie, tenemos todo cubierto.

Reseñas y Opiniones: No te quedes con dudas antes de comprar. En GameHub podrás encontrar reseñas detalladas de juegos, análisis en profundidad y opiniones de jugadores reales que te ayudarán a tomar decisiones informadas.

Guías y Trucos: ¿Te quedaste atascado en una misión difícil o necesitas ayuda para avanzar en un juego? Descubre nuestras completas guías y trucos para sacar el máximo provecho de tus juegos.

Foros y Comunidad: Únete a nuestra comunidad de jugadores. Comparte tus experiencias, participa en discusiones sobre tus títulos favoritos, organiza eventos y conecta con otros gamers de todo el mundo.

Tienda Online: Compra videojuegos, accesorios, consolas y merchandising en nuestra tienda. ¡Todo lo que necesitas para tu setup gamer lo tenemos aquí!

E-sports y Competencias: Si lo tuyo son los e-sports, GameHub es tu lugar. Sigue torneos en vivo, conoce a los equipos más destacados y mantente informado sobre las últimas competiciones.

Visión: Nuestra misión es ser el sitio de referencia para todos los amantes de los videojuegos, proporcionando contenido de calidad, una comunidad activa y las mejores ofertas. Queremos que cada visita a GameHub te brinde una experiencia única y enriquecedora en tu viaje como gamer.

Únete a GameHub: No importa si prefieres jugar en consola, PC o en dispositivos móviles, en GameHub encontrarás contenido para todos los gustos y plataformas. ¡Explora, juega, conecta y crece como gamer con nosotros!</p>
    </div>
    <div>
        
    </div>
</div>

@stop

@section('css')
<linl rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
        'Exito'
    )
</script>
@stop

@endsection
