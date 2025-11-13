<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
$historias = [
    [
        "titulo" => "La Casa Abandonada",
        "resumen" => "Se dice que nadie ha sobrevivido a pasar una noche en la casa de la colina...",
        "contenido" => "Se dice que nadie ha sobrevivido a pasar una noche en la casa de la colina. La imponente construcción, cubierta de hiedra y con ventanas rotas, se alza como una sombra en el horizonte, esperando a los incautos que se atreven a acercarse. Puertas que se cierran solas, susurros en la oscuridad que parecen llamarte por tu nombre, y sombras que se deslizan por los pasillos sin dueño. Los que han intentado quedarse cuentan que escuchan pasos lentos y arrastrados, que nunca encuentran el origen, y sienten un frío intenso que cala hasta los huesos. Algunos aseguran que al amanecer la casa parece diferente, como si ocultara un secreto que aún no está listo para ser revelado."
    ],
    [
        "titulo" => "El Espejo Maldito",
        "resumen" => "Un espejo antiguo refleja cosas que no deberían existir...",
        "contenido" => "En una pequeña tienda de antigüedades, entre objetos polvorientos y reliquias olvidadas, se encuentra un espejo antiguo cuya superficie parece absorber la luz. Se dice que refleja cosas que no deberían existir, imágenes distorsionadas del pasado, del futuro o incluso de otras dimensiones. Algunos afirman haber visto su futuro en ese espejo, un destino oscuro e inevitable, mientras que otros aseguran haber visto la muerte acechando. Quienes han tenido la osadía de poseerlo aseguran que al principio el espejo se mantiene en silencio, pero luego empieza a mostrar visiones aterradoras, susurrando secretos que enloquecen a quien los escucha. Es un portal hacia lo desconocido, y no todos han logrado apartar la mirada a tiempo."
    ],
    [
        "titulo" => "El Bosque Oscuro",
        "resumen" => "Cada luna llena, las sombras del bosque parecen cobrar vida...",
        "contenido" => "Cada luna llena, las sombras del bosque parecen cobrar vida. Los árboles, altos y retorcidos, forman un techo impenetrable que oculta secretos que nadie quiere encontrar. Los viajeros que se internan en este lugar embrujado cuentan historias de luces fugaces entre las ramas, susurros que los llaman por su nombre y figuras oscuras que se deslizan entre la maleza. Algunos aseguran que el bosque está maldito, un lugar donde el tiempo se detiene y las almas de los perdidos vagan atrapadas para siempre. Los que han intentado escapar han desaparecido sin dejar rastro, y se cree que el bosque mismo se alimenta del miedo y la desesperación."
    ],
    [
        "titulo" => "El Susurro de la Niebla",
        "resumen" => "En las noches de niebla, se escuchan voces llamando desde la oscuridad...",
        "contenido" => "En las noches en que la niebla cubre el pueblo como un manto fantasmal, se pueden escuchar voces lejanas que llaman desde la oscuridad. Son susurros que parecen venir de todas partes y de ninguna, palabras incomprensibles pero llenas de tristeza y advertencia. Los que se atreven a seguirlas, guiados por la curiosidad o la desesperación, descubren que las voces desaparecen cuando se acercan, dejando tras de sí solo frío y un silencio que hiela la sangre. Se dice que esas voces pertenecen a almas errantes, atrapadas entre mundos, que intentan comunicarse para advertir sobre un peligro invisible, o quizás, para arrastrar a otros a su destino eterno."
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Historias de terror 🎃</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body class="home">
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

        <main>
            <div class="contenedor-principal">
                <div class="historias-contenedor">
                    <h1>Historias terroríficas 👻</h1>
                    <?php foreach ($historias as $index => $historia): ?>
                    <section class="historia" style="animation-delay: <?= $index * 0.3 ?>s;">
                        <h2><?= htmlspecialchars($historia['titulo']) ?></h2>
                        <p class="resumen"><?= htmlspecialchars($historia['resumen']) ?></p>
                        <p class="contenido" style="display:none;"><?= htmlspecialchars($historia['contenido']) ?></p>
                        <button class="leer-mas">Leer más</button>

                        <div class="botones">
                            <p>¿Qué harías?</p>
                            <button onclick="alert('Te adentras y escuchas pasos detrás de ti…')">Entrar</button>
                            <button onclick="alert('Decides irte y la sombra desaparece...')">Salir corriendo</button>
                        </div>
                    </section>
                    <?php endforeach; ?>
                </div>

                <div class="mini-juegos">
                    <h2>Mini-juegos terroríficos 🎃</h2>

                    <div class="mini-juego" id="juego-puertas">
                        <h3>Elige la puerta segura</h3>
                        <div class="botones">
                            <button onclick="abrirPuerta(1)">Puerta 1</button>
                            <button onclick="abrirPuerta(2)">Puerta 2</button>
                            <button onclick="abrirPuerta(3)">Puerta 3</button>
                        </div>
                        <p id="resultado-puerta"></p>
                    </div>

                    <div class="mini-juego" id="juego-fantasma">
                        <h3>Atrapa al fantasma 👻</h3>
                        <p>Haz clic en el fantasma que aparece en lugares aleatorios.</p>
                        <div id="fantasma">👻</div>
                    </div>

                    <div class="mini-juego" id="mini-trivia">
                        <h3>Trivia de terror 🕷️</h3>
                        <p>¿Cuál es el nombre del fantasma más famoso de Japón?</p>
                        <button onclick="checkTrivia(this, 'M')">Mokugyo</button>
                        <button onclick="checkTrivia(this, 'O')">Okiku</button>
                        <button onclick="checkTrivia(this, 'Y')">Yurei</button>
                    </div>
                </div>
            </div>

            <!-- Murciélagos animados -->
            <img src="img/murcielago.png" class="murcielago" id="murcielago1" alt="murcielago" />
            <img src="img/murcielago.png" class="murcielago" id="murcielago2" alt="murcielago" />
            <img src="img/murcielago.png" class="murcielago" id="murcielago3" alt="murcielago" />

            <button id="modo-toggle" aria-label="Cambiar modo noche/día">Modo claro</button>
            <div id="cursor"></div>
            <canvas id="particulas"></canvas>

            <script>
                // Animación murciélagos
                function volarMurcielago(id, velocidad) {
                    const murcielago = document.getElementById(id);
                    let x = -100;
                    let y = Math.random() * window.innerHeight / 2 + 50;
                    let escala = Math.random() * 0.5 + 0.5;
                    murcielago.style.transform = `scale(${escala})`;
                    function mover() {
                        x += velocidad;
                        y += Math.sin(x / 50) * 2;
                        if (x > window.innerWidth + 100) {
                            x = -100;
                            y = Math.random() * window.innerHeight / 2 + 50;
                            escala = Math.random() * 0.5 + 0.5;
                            murcielago.style.transform = `scale(${escala})`;
                        }
                        murcielago.style.left = x + "px";
                        murcielago.style.top = y + "px";
                        requestAnimationFrame(mover);
                    }
                    mover();
                }
                volarMurcielago("murcielago1", 2);
                volarMurcielago("murcielago2", 1.5);
                volarMurcielago("murcielago3", 2.5);

                // Leer más/menos
                document.querySelectorAll(".leer-mas").forEach(btn => {
                    btn.addEventListener("click", () => {
                        const section = btn.closest(".historia");
                        const resumen = section.querySelector(".resumen");
                        const contenido = section.querySelector(".contenido");
                        if (contenido.style.display === "block") {
                            contenido.style.display = "none";
                            resumen.style.display = "block";
                            btn.textContent = "Leer más";
                        } else {
                            contenido.style.display = "block";
                            resumen.style.display = "none";
                            btn.textContent = "Leer menos";
                        }
                    });
                });

                // Modo claro/oscuro
                const botonModo = document.getElementById("modo-toggle");
                botonModo.addEventListener("click", () => {
                    document.body.classList.toggle("modo-claro");
                    botonModo.textContent = document.body.classList.contains("modo-claro") ? "Modo oscuro" : "Modo claro";
                });

                // Cursor personalizado
                const cursor = document.getElementById('cursor');
                document.addEventListener('mousemove', e => {
                    cursor.style.left = e.clientX + 'px';
                    cursor.style.top = e.clientY + 'px';
                });

                // Partículas
                const canvas = document.getElementById('particulas');
                const ctx = canvas.getContext('2d');
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
                let particulas = [];
                for (let i = 0; i < 100; i++) {
                    particulas.push({ x: Math.random() * canvas.width, y: Math.random() * canvas.height, r: Math.random() * 2 + 1, d: Math.random() });
                }
                let angulo = 0;
                function dibujarParticulas() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.fillStyle = 'rgba(255,255,255,0.2)';
                    ctx.beginPath();
                    particulas.forEach(p => { ctx.moveTo(p.x, p.y); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2, true); });
                    ctx.fill();
                    angulo += 0.01;
                    particulas.forEach(p => {
                        p.y += Math.cos(angulo + p.d) + 1 + p.r / 2;
                        p.x += Math.sin(angulo) * 2;
                        if (p.x > canvas.width + 5 || p.x < 0 || p.y > canvas.height) {
                            p.x = Math.random() * canvas.width;
                            p.y = -10;
                        }
                    });
                }
                setInterval(dibujarParticulas, 33);
                window.addEventListener('resize', () => { canvas.width = window.innerWidth; canvas.height = window.innerHeight; });

                // Juego puertas
                function abrirPuerta(num) {
                    const puertaSegura = Math.floor(Math.random() * 3) + 1;
                    const resultado = document.getElementById("resultado-puerta");
                    if (num === puertaSegura) {
                        resultado.textContent = "¡Suerte! La puerta es segura.";
                        resultado.style.color = "lightgreen";
                    } else {
                        resultado.textContent = "¡Buuu! Una sombra te asusta.";
                        resultado.style.color = "red";
                    }
                }

                // Fantasma
                const fantasma = document.getElementById('fantasma');
                function moverFantasma() {
                    fantasma.style.top = Math.random() * (window.innerHeight - 50) + "px";
                    fantasma.style.left = Math.random() * (window.innerWidth - 50) + "px";
                }
                setInterval(moverFantasma, 2000);
                fantasma.addEventListener('click', () => { alert("¡Has atrapado al fantasma!"); });

                // Trivia
                function checkTrivia(btn, letra) {
                    if (letra === 'O') alert("¡Correcto! 👻");
                    else alert("¡Incorrecto! Algo te observa...");
                }
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
