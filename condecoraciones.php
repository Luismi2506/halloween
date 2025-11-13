<!-- Este fragmento de codigo fue escrito entre las 2 y las 3 de la mañana con un 99% de fe y un 1% de conocimiento,
 bajo los efectos de el alcohol,la desesperacion y un bug que solo se manifiesta cuando nadie lo esta mirando.
 
 no funciona si lo entiendes
 no lo entiendes si funciona
 
 cualquier intento de refactorizar esto ha resultado en la invocacion de problemas dimensionales, 
 loops infinitos y un extraño parpadeo en el monitor que aun no puedo explicar.

 Gallos muertos en el intento de refactorizar el codigo: 3
 dinero ganado en bet365: 520 euros
 horas de sueño perdidas: 299


 si necesitas cambiar esto, primero reza, luego haz una copia de seguridad, y por ultimo suerte.







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
    <title>productos</title>
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

      
    
<h1>Condecoraciones</h1>


<section class="catalogo">


<div class="condecoraciones">
  <img src="img/pelopo.jpg" alt="Banner de condecoraciones">
  <div class="info">
    <h3>Luismi (Pelopo)</h3>
    <p>Se ha pasado todo el trabajo quejandose de que manu no empezaba el trabajo. No ha hecho nada mas que aportar malas ideas y encima no para el proyecto.</p>
    <span class="precio">Horas asistidas a entorno servidor: 2 (se las pasó durmiendo)</span>
  </div>

</div>


<div class="condecoraciones">
  <img src="img/truka.jpg" alt="Banner de condecoraciones">

  <div class="info">
    <h3>Rafael (Truka)</h3>
    <p>Se pasó todo el trabajo apostandole a la tragaperras y a la ruleta no ha hecho nada mas. Adémas mientras se le reprochaba solo se puso a buscar productos contra la calvicie.</p>
    <span class="precio">Horas jugadas: 23H (todas en clase, ninguna productiva)</span>
  </div>

</div>


<div class="condecoraciones">
  <img src="img/raquel.jpg" alt="Banner de condecoraciones">

  <div class="info">
    <h3>Esther (Raquel)</h3>
    <p>La unica gota de cordura dentro del proyecto, se ha pasado todo el proyecto rechazando ideas cada cual mas explicita. no ha hecho nada mas que jugar al cookie clicker  </p>
        <span class="precio">Horas jugadas al cookie clicker : 30H </span>
  </div>
</div>

<div class="condecoraciones">
  <video autoplay muted loop playsinline>
    <source src="" type="video/mp4">
    Tu navegador no soporta la reproducción de video.   
  </video>

  <div class="info">
    <h3>Chat gpt</h3>
    <p> Fue el unico que hizo algo en el proyecto, estuvo carrileando desde el minuto 1. Te queremos carlitos (chatgpt)</p>
    <span class="precio">porcentaje del trabajo realizado : 99% </span>
  </div>
</div>




</section>


</body>
</html>