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
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="botones">
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
        <div class="seccion-productos">
            <section class="productos-slider">
                <h2>Productos Destacados</h2>
                <div class="slider-container">
                    <div class="slider">
                    <div class="card">
                        <img src="img/producto1.jpg" alt="Disfraz de Vampiro">
                        <h3>Disfraz de Vampiro</h3>
                        <p>Precio: $49.99</p>
                        <button>Ver productos</button>
                    </div>

                    <div class="card">
                        <img src="img/producto2.jpg" alt="Calabaza Decorativa">
                        <h3>Calabaza Decorativa</h3>
                        <p>Precio: $19.99</p>
                        <button>Ver productos</button>
                    </div>

                    <div class="card">
                        <img src="img/producto3.jpg" alt="Set de Maquillaje de Terror">
                        <h3>Set de Maquillaje de Terror</h3>
                        <p>Precio: $29.99</p>
                        <button>Ver productos</button>
                    </div>

                    <div class="card">
                        <img src="img/producto4.jpg" alt="Sombrero de Bruja">
                        <h3>Sombrero de Bruja</h3>
                        <p>Precio: $24.99</p>
                        <button>Ver productos</button>
                    </div>
                    </div>

                    <!-- Botones de control -->
                    <button class="prev">&#10094;</button>
                    <button class="next">&#10095;</button>
                </div>
            </section>
        </div>

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
            


        </script>
    </main>
    <h1>¡Hola <?= htmlspecialchars($_SESSION['usuario']) ?>! 👋 Bienvenido al Blog de Halloween 🎃</h1>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 Medac. Proyecto realizado por <strong>Esther, Rafa y Luismi</strong>.</p>
            <nav class="footer-nav">
                <a href="#">Inicio</a>
                <a href="#">Productos</a>
                <a href="#">Contacto</a>
                <a href="#">Sobre nosotros</a>
            </nav>
        </div>
    </footer>
</body>
</html>