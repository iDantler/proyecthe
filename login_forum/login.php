<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="login.js"></script>
</head>
<body>
    <div id="page-container">
        <form id="loginForm" action="login_process.php" method="post">
            <h2>Iniciar Sesión</h2>
            <label for="correo" class="hidden"></label>
            <input type="text" id="correo" name="correo" placeholder="Correo" required autofocus>
            <label for="contrasena" class="hidden"></label>
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
            <input type="submit" value="Iniciar Sesión" id="submitBtn">
        </form>

        <div id="register-link">
            <span>¿No tienes una cuenta? <a href="../register_forum/register.php">Regístrate aquí.</a></span>
        </div>
    </div>
</body>
</html>