<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="script.js"></script> <!-- Incluir script.js siempre -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <h2 class=registro>Registro de Usuario</h2>
    <form action="register_process.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>
        <input type="submit" value="Registrar">
    </form>
    <p>¿Ya tienes una cuenta? <a href="../login_forum/login.php" class="login-link">Inicia sesión</a>.</p>
    <button id="dark-mode-toggle">Modo oscuro</button>

    </body>
    <script src="darkmode.js"></script>
</html>
