<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/estilo.css">
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
        <!--lista de navegacion-->
        
    </header>
    <div class ="banner">
        <h1>Happy Galloween</h1><br>
        <p>“Era una noche oscura... el viento soplaba... y de pronto... ¡UN GAAAAALLO GRITÓOOO!”
        Bienvenido a Happy Galloween, donde las plumas son más aterradoras que los fantasmas.
        Aquí no solo cacareamos… también damos miedo (y un poco de risa).</p>
    </div>
    <main>
        <!--Seccion de introduccion a la web-->
        <section class="introduccion">
        <h2>Historias de Gallos Descontrolados</h2>
        <p>
            Olvida lo de gallos que solo cantan al amanecer. Aquí tenemos gallos vampiros chupando café, gallos demonios con cuernos y mala leche, 
            y hasta gallos mutantes que parecen salidos de un mal viaje. Todos son un caos emplumado que te hace reír de lo absurdo… y un poco de lo grotesco.</p>
        <p>
            ¿Quieres unirte a la locura? Tenemos <strong>disfraces</strong> para que te conviertas en cualquier gallo ridículo: vampiro, diablo o zombie. 
            Tan ridículos como nuestros relatos, pero tan cómodos que podrías bailar como un gallo borracho y nadie juzga.</p>
</section>

        <!--Seccion que redirige a la pagina de productos-->
        <div class="catalogo">
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
        </section>
        </div>
        <button id="modo-toggle" aria-label="Cambiar modo noche/día">Modo claro</button>
        <script>
            const slider = document.querySelector('.slider');
            const prev = document.querySelector('.prev');
            const next = document.querySelector('.next');
            const cards = document.querySelectorAll('.slider .card');

            let index = 0;

            // Calcula dinámicamente el ancho de cada tarjeta (incluyendo margen)
            function getCardWidth() {
                const cardStyle = getComputedStyle(cards[0]);
                const cardWidth = cards[0].offsetWidth;
                const marginRight = parseInt(cardStyle.marginRight);
                const marginLeft = parseInt(cardStyle.marginLeft);
                return cardWidth + marginRight + marginLeft;
            }

            // Número de tarjetas visibles según el ancho del contenedor
            function visibleCards() {
                const containerWidth = document.querySelector('.slider-container').offsetWidth;
                return Math.floor(containerWidth / getCardWidth());
            }

            // Actualiza la posición del slider
            function updateSlider() {
                const totalCards = cards.length;
                const maxIndex = totalCards - visibleCards();

                if (index > maxIndex) index = maxIndex;
                if (index < 0) index = 0;

                slider.style.transform = `translateX(-${index * getCardWidth()}px)`;
            }

            next.addEventListener('click', () => {
                index++;
                updateSlider();
            });

            prev.addEventListener('click', () => {
                index--;
                updateSlider();
            });

            // Recalcula al cambiar el tamaño de la ventana
            window.addEventListener('resize', updateSlider);

            // Inicializa
            updateSlider();

            //banner fijo al hacer scroll
            window.addEventListener('scroll', function() {
                const banner = document.querySelector('.banner');
                if (window.scrollY > 100) {
                    banner.classList.add('fixed-banner');
                } else {
                    banner.classList.remove('fixed-banner');
                }
            });
            
            // Modo claro/oscuro
                const botonModo = document.getElementById("modo-toggle");
                botonModo.addEventListener("click", () => {
                    document.body.classList.toggle("modo-claro");
                    botonModo.textContent = document.body.classList.contains("modo-claro") ? "Modo oscuro" : "Modo claro";
                });

        </script>
    </main>
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