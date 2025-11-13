<!-- 
Este fragmento de codigo fue escrito entre las 2 y las 3 de la mañana,
bajo los efectos del alcohol, la desesperación y un bug que solo se manifiesta cuando nadie lo está mirando.

no funciona si lo entiendes
no lo entiendes si funciona

cualquier intento de refactorizar esto ha resultado en la invocación de problemas dimensionales, 
loops infinitos y un extraño parpadeo en el monitor que aún no puedo explicar.

si necesitas cambiar esto, primero reza, luego haz una copia de seguridad, y por último suerte.
-->

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Productos</title>
</head>
<body>
    <header>
        <img src="img/gallosin-logo.png" alt="Logo de Halloween">
        <nav>
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="Historias.php">Historias y Minijuegos</a></li>
                <li><a href="condecoraciones.php">Condecoraciones</a></li>
            </ul>
        </nav>
        <div class="botones">
            <nav>
                <ul>
                    <li>Usuario: <?= htmlspecialchars($_SESSION['usuario']) ?></li>
                </ul>
            </nav>
            <button onclick="window.location.href='logout.php'">Cerrar sesión</button>
        </div>
    </header>

    <h1>Mira aquí todos nuestros productos</h1>

    <section class="catalogo">

        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/correa.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Correa dorada</h3>
                <p>Pasea a tu gallo con esta correa como si fueras de las 3.000</p>
                <span class="precio">€3999.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/vampiro.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Disfraz de vampiro</h3>
                <p>Disfraz de vampiro para tu gallo favorito.</p>
                <span class="precio">€39.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/calabaza.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Disfraz de gallo bruja</h3>
                <p>Incluye una calabaza cortada para el gallo.</p>
                <span class="precio">€39.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

        <!-- Prueba -->
        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/videovampiro.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Disfraz de vampiro</h3>
                <p>Disfraz de vampiro para tu gallo favorito.</p>
                <span class="precio">€39.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/puro.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Puro de chocolate</h3>
                <p>Puro de chocolate para alimentar a tu gallo de las formas más graciosas.</p>
                <span class="precio">€39.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/samurai.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Disfraz de Samurai</h3>
                <p>Disfraza a tu gallo como un verdadero samurai.</p>
                <span class="precio">€39.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/satanas.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Disfraz de Demonio</h3>
                <p>Disfraza a tu gallo como el increíble Satanás.</p>
                <span class="precio">€39.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

        <div class="producto">
            <video autoplay muted loop playsinline>
                <source src="img/batman.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <div class="info">
                <h3>Disfraz de Batman</h3>
                <p>Protege tu corral con el disfraz de Batman el gallo.</p>
                <span class="precio">€39.99</span>
            </div>
            <div class="botones-producto">
                <button>Comprar</button>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 Medac. Proyecto realizado por <strong>Esther, Rafa y Luismi</strong>.</p>
            <nav class="footer-nav">
                <a href="home.php">Inicio</a>
                <a href="productos.php">Productos</a>
                <a href="Historias.php">Historias y minijuegos</a>
                <a href="condecoraciones.php">Condecoraciones</a>
            </nav>
        </div>
    </footer>
</body>
</html>
