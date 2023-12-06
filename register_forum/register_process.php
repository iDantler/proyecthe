<?php
// Procesamiento del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "dantler";
    $password = "admin";
    $dbname = "foro_db";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Se utiliza password_hash para almacenar de forma segura las contraseñas

    // Verificar si el correo ya está registrado
    $verificar_correo = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result_correo = $conn->query($verificar_correo);

    if ($result_correo->num_rows > 0) {
        // El correo ya está registrado
        echo json_encode(array("registro" => "correo_existente"));
        exit();
    } else {
        // Insertar datos en la tabla usuarios
        $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";

        if ($conn->query($sql) === TRUE) {
            // Registro exitoso
            echo json_encode(array("registro" => "exitoso"));
            exit();
        } else {
            // Error en el registro
            echo json_encode(array("registro" => "error"));
            exit();
        }
    }

    // Cerrar la conexión
    $conn->close();
}

// Si llegamos aquí, significa que el formulario no se ha enviado correctamente
echo json_encode(array("registro" => "formulario_no_enviado"));
exit();
?>
