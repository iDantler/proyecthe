<?php
// Procesamiento del formulario de inicio de sesión
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
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El usuario existe, verificar la contraseña
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row['contrasena'])) {
            // Contraseña correcta, iniciar sesión
            session_start();
            $_SESSION['username'] = $row['nombre'];
            $response = ["success" => true, "redirect" => "../index/index.php"];
        } else {
            // Contraseña incorrecta
            $response = ["success" => false, "message" => "Contraseña incorrecta"];
        }
    } else {
        // Usuario no encontrado
        $response = ["success" => false, "message" => "Usuario no encontrado"];
    }

    // Devuelve la respuesta como JSON
    echo json_encode($response);
    exit();
}
?>
