<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Hacking Ético</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="modal/style_modal.css">
    <link rel="stylesheet" href="dropdown/style-dropdown.css">
    </head>

<body>
        <header>
            <div class="header-container">
                <div class="logo-container">
                    <img src="../img/log.png" alt="Logo de Hacking" class="logo">
                </div>

                <div class="search-container">
                    <input type="text" id="campoBusqueda" placeholder="Buscar...">
                    <button class="search-btn" onclick="toggleSearchInput()"><i class="fas fa-search"></i></button>
                <!-- Dentro de tu encabezado -->
                <div class="user-container">
                    <?php
                    session_start();
                    if (isset($_SESSION['username'])) {
                        echo '<div class="dropdown">';
                        echo '<p>Bienvenido, <strong>' . $_SESSION['username'] . '</strong>.</p>';
                        echo '<div class="dropdown-content">';
                        echo '<a href="profile/profile.php">Mi perfil</a>';
                        echo '<a href="settings.php">Configuración</a>';
                        echo '<a href="../logout/logout.php" class="btn">Cerrar sesión</a>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<p id="login-link"><a href="../login_forum/login.php" class="btn">Iniciar sesión</a> | <a href="../register_forum/register.php" class="btn">Registrarse</a></p>';
                    }
                    ?>
                </div>
            </div>
        </header>



    <main>
        <div id="create-thread">
            <button id="create-thread-btn">Crear un tema o abrir un hilo</button>
        </div>

        <!-- Modal -->
        <div id="myModal">
            <div id="modal-content" class="custom-modal">
                <div>
                    <h2 id="publish-title">Publicar tema en...</h2>
                </div>
                <!-- Información adicional -->
                <div id="modal-info">
                    <hr class="modal-divider"> <!-- Línea de división -->
                    <h3>INFORMACIÓN</h3>
                    <p>Toda la información sobre las últimas novedades y actualizaciones del foro, ayuda de la comunidad, presentaciones y activación de suscripciones.</p>
                </div>
                <!-- Fin de la información adicional -->

                <!-- Ayuda de la Comunidad -->
                <div id="modal-help">
                    <hr class="modal-divider"> <!-- Línea de división -->
                    <h3>Ayuda de la Comunidad</h3>
                    <p>¿Tienes alguna duda? ¿Necesitas ayuda con algo?</p>
                </div>
                <!-- Fin de la Ayuda de la Comunidad -->

                            <!-- Presentaciones -->
                    <div id="modal-introduction">
                        <hr class="modal-divider"> <!-- Línea de división -->
                        <h3>Presentaciones</h3>
                        <p>Preséntate para que podamos conocer tu existencia</p>
                    </div>
                    <!-- Fin de Presentaciones -->
                </div>

                <!-- Cierre del primer cuadro -->

                <!-- Inicio del segundo cuadro -->
                <div id="second-modal-content" class="custom-modal">
                    <!-- Contenido del segundo cuadro -->
                    <h3>FORO</h3>
                        <p>Sección foro, general, off-topic, noticias RSS, redes sociales, informática y gaming</p>
                        <div id="modal-general">
                            <hr class="modal-divider"> <!-- Línea de división -->
                            <h3>General</h3>
                            <p>Charlas sobre Internet y actualidad</p>
                        </div>

                        <!-- Off-topic -->
                        <div id="modal-off-topic">
                            <hr class="modal-divider">
                            <h3>Off-topic</h3>
                            <p>Charlas fuera de tema y sin relación específica.</p>
                        </div>

                        <!-- Informática -->
                        <div id="modal-informatica">
                            <hr class="modal-divider">
                            <h3>Informática</h3>
                            <p>Aportes de informática y problemas de hardware/software.</p>
                        </div>

                        <!-- Redes Sociales -->
                        <div id="modal-redes-sociales">
                            <hr class="modal-divider">
                            <h3>Redes Sociales</h3>
                            <p>Instagram, Twitter, Youtube, Twitch, Telegram, Discord.</p>
                        </div>

                        <!-- Gaming -->
                        <div id="modal-gaming">
                            <hr class="modal-divider">
                            <h3>Gaming</h3>
                            <p>Consolas, PC Gamings, Steam, Epic Games, Ubisoft.</p>
                        </div>

                        </div>
                <div>
     
                <div id="three-modal-content" class="custom-modal">
                    <!-- Contenido del tercer cuadro adicional -->
                    <h3>POST</h3>
                        <p>Aportes sobre informática, programación, trading, criptomonedas, empredimiento</p>
                    <!-- Emprendimiento -->
                    <div id="modal-emprendimiento">
                        <hr class="modal-divider"> <!-- Línea de división -->
                        <h3>Emprendimiento</h3>
                        <p>Tendencias Dropshipping y E-Commerce, SEO, vías de monetización, ingresos pasivos</p>
                    </div>

                    <!-- Programación -->
                    <div id="modal-programacion">
                        <hr class="modal-divider"> <!-- Línea de división -->
                        <h3>Programación</h3>
                        <p>Scripts y desarrollo web, Python, Java, C++, C, C#, Bash, Visual Basic & .NET Framework</p>
                    </div>

                    <!-- Hacking -->
                    <div id="modal-hacking">
                        <hr class="modal-divider"> <!-- Línea de división -->
                        <h3>Hacking</h3>
                        <p>Seguridad informática, pentesting, ingeniería inversa, bugs, desarrollo malware, seguridad, criptografía</p>
                    </div>

                    <!-- Móviles -->
                    <div id="modal-moviles">
                        <hr class="modal-divider"> <!-- Línea de división -->
                        <h3>Móviles</h3>
                        <p>Aplicaciones para Android y iPhone, complemento, problemas de software</p>
                    </div>

                    </div>
                    
                    <div>

                </div>
                                    
                      <!-- Fin de Presentaciones -->
                    </div>
                </div>

            </div>
                <!-- Fin del segundo cuadro -->
    </main>

    <section id="content">
        <div class="forum-category">
            <h2>Categoría 1</h2>
            <div class="forum-thread">
                <h3>Título del Hilo</h3>
                <p>¡Última respuesta por Usuario1 hace 2 horas!</p>
            </div>
            <div class="forum-thread">
                <h3>Otro Hilo Interesante</h3>
                <p>¡Última respuesta por Usuario2 hace 1 día!</p>
            </div>
        </div>
        <div class="forum-category">
            <h2>Categoría 2</h2>
            <div class="forum-thread">
                <h3>Preguntas Frecuentes</h3>
                <p>¡Última respuesta por Usuario3 hace 3 horas!</p>
            </div>
            <div class="forum-thread">
                <h3>Proyectos en Curso</h3>
                <p>¡Última respuesta por Usuario4 hace 5 días!</p>
            </div>
        </div>
    </section>

    <footer>

    <p id="copyright">© 2023 Foro de Hacking Ético</p>
        <i id="theme-icon" class="fas fa-sun"></i>

</footer>
<script src="lupin.js"></script>
<script src="modal/modal.js"></script>
<script src="dropdown/dropdown.js"></script>

</body>
</html>