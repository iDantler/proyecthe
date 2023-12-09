<?php
// profile.php

// Define la ruta base
$rutaBase = 'http://localhost/pro/index/';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Foro de Hacking Ético</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css"> 
    <link rel="stylesheet" href="../dropdown/style-dropdown.css">
    <link rel="stylesheet" href="style-profile.css"> 
    <script> const baseUrl = '<?php echo $rutaBase;?>'; </script>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <img src="../../img/log.png" alt="Logo de Hacking" class="logo">
            </div>
            <div class="search-container">
                    <input type="text" id="campoBusqueda" placeholder="Buscar...">
                    <button class="search-btn" onclick="toggleSearchInput()"><i class="fas fa-search"></i></button>
            </div>

            <div class="user-container">
                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    echo '<div class="dropdown">';
                    echo '<p>Bienvenido, <strong>' . $_SESSION['username'] . '</strong>.</p>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="profile.php">Mi perfil</a>';
                    echo '<a href="settings.php">Configuración</a>';
                    echo '<a href="../../logout/logout.php" class="btn">Cerrar sesión</a>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<p id="login-link"><a href="../../login_forum/login.php" class="btn">Iniciar sesión</a> | <a href="../../register_forum/register.php" class="btn">Registrarse</a></p>';
                }
                ?>
            </div>
        </div>
    </header>

    <!-- En el bloque de código HTML dentro de la etiqueta <main> -->
<main>
    <div class="profile-container">
        <div class="user-info">
            <img src="../../img/log.png" alt="Foto de perfil" class="profile-picture">
            <h1 id="nombreUsuario"></h1>
            <p id="descripcionUsuario"></p>
        </div>
        <div class="user-stats">
            <div class="stat">
                <h2>Publicaciones</h2>
                <p id="publicacionesUsuario"></p>
            </div>
            <div class="stat">
                <h2>Seguidores</h2>
                <p id="seguidoresUsuario"></p>
            </div>
            <div class="stat">
                <h2>Seguidos</h2>
                <p id="seguidosUsuario"></p>
            </div>
        </div>
    </div>
</main>

<footer>
        <p id="copyright">© 2023 Foro de Hacking Ético</p>
        <i id="theme-icon" class="fas fa-sun"></i>
    </footer>
    <script src="../lupin.js"></script> 
    <script src="../dropdown/dropdown.js"></script> 
    <script src="getUserInfo.js"></script>
</body>

</html>
