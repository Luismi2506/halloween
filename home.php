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
    <title>Inicio - Blog de Halloween 🎃</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <img src="img/luismi.png" alt="Logo de Halloween">
        <div class="botones">
            <button onclick="window.location.href='logout.php'">Cerrar sesión</button>
        </div>
    </header>
    <h1>¡Hola <?= htmlspecialchars($_SESSION['usuario']) ?>! 👋 Bienvenido al Blog de Halloween 🎃</h1>
</body>
</html>