<?php
session_start();

$archivoUsuarios = 'usuarios.json';
$usuarios = file_exists($archivoUsuarios) ? json_decode(file_get_contents($archivoUsuarios), true) : [];

if (isset($_SESSION['usuario'])) {
    header('Location: home.php');
    exit;
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? ''; // evitar warning
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

    if (empty($usuario) || empty($password)) {
        $mensaje = "Por favor, completa todos los campos.";
    } elseif (strlen($password) < 5) {
        $mensaje = "La contraseña debe tener al menos 5 caracteres.";
    } else {
        if ($accion === 'login') {
            if (isset($usuarios[$usuario]) && password_verify($password, $usuarios[$usuario])) {
                $_SESSION['usuario'] = $usuario;
                header('Location: home.php');
                exit;
            } else {
                $mensaje = "Usuario o contraseña incorrectos ";
            }
        } elseif ($accion === 'registro') {
            if (isset($usuarios[$usuario])) {
                $mensaje = "El usuario ya está registrado ";
            } else {
                $usuarios[$usuario] = password_hash($password, PASSWORD_DEFAULT);
                file_put_contents($archivoUsuarios, json_encode($usuarios, JSON_PRETTY_PRINT));
                $_SESSION['usuario'] = $usuario;
                header('Location: home.php');
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login / Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="login">
    <header>
        <img src="img/gallosin-logo.png" alt="Logo de Halloween">
        <div class="botones">
            <button onclick="mostrarFormulario('login')">Iniciar Sesión</button>
            <button onclick="mostrarFormulario('registro')">Registrarse</button>
        </div>
    </header>

    <h1>REGISTRATE MAMONAZO</h1>

    <!-- Nueva sección de login con imágenes a los lados -->
    <section class="login-section">
        <div class="imagen-lateral izquierda">
            <span class="cerrar-imagen">&times;</span>
            <img src="img/popup.png" alt="Decoración izquierda">
        </div>

        <div class="formularios">
            <!-- Formulario de Login -->
            <form id="formLogin" method="POST" action="">
                <h2>Iniciar Sesión</h2>
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
                <label>Contraseña:</label>
                <input type="password" name="password" required>
                <input type="hidden" name="accion" value="login">
                <button type="submit">Entrar</button>
            </form>

            <!-- Formulario de Registro -->
            <form id="formRegistro" method="POST" action="">
                <h2>Crear una cuenta</h2>
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
                <label>Contraseña (mínimo 5 caracteres):</label>
                <input type="password" name="password" minlength="5" required>
                <input type="hidden" name="accion" value="registro">
                <button type="submit">Registrarse</button>
            </form>

            <p class="mensaje"><?= htmlspecialchars($mensaje) ?></p>
        </div>

        <div class="imagen-lateral derecha">
            <span class="cerrar-imagen">&times;</span>
            <img src="img/popuu2.png" alt="Decoración derecha">
        </div>
    </section>
    <button id="modo-toggle" aria-label="Cambiar modo noche/día">Modo claro</button>
    <script>
        function mostrarFormulario(tipo) {
            document.getElementById('formLogin').classList.remove('active');
            document.getElementById('formRegistro').classList.remove('active');
            if (tipo === 'login') {
                document.getElementById('formLogin').classList.add('active');
            } else {
                document.getElementById('formRegistro').classList.add('active');
            }
        }

        // Mostrar por defecto el formulario de login
        mostrarFormulario('login');

        // Permite cerrar cada imagen lateral
        document.querySelectorAll('.cerrar-imagen').forEach(boton => {
            boton.addEventListener('click', function() {
                this.parentElement.style.display = 'none';
            });
        });

        // Modo claro/oscuro
                const botonModo = document.getElementById("modo-toggle");
                botonModo.addEventListener("click", () => {
                    document.body.classList.toggle("modo-claro");
                    botonModo.textContent = document.body.classList.contains("modo-claro") ? "Modo oscuro" : "Modo claro";
                });
    </script>
</body>
</html>
