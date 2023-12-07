<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "dantler";
    $password = "admin";
    $dbname = "foro_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT id, nombre, contrasena FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row['contrasena'])) {
            // Establece la sesión
            session_start();
            $_SESSION['id'] = $row['id'];
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

    $stmt->close();
    $conn->close();

    echo json_encode($response);
    exit();
}
?>
