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

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $verificar_correo = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt_verificar = $conn->prepare($verificar_correo);
    $stmt_verificar->bind_param("s", $correo);
    $stmt_verificar->execute();
    $result_correo = $stmt_verificar->get_result();

    if ($result_correo->num_rows > 0) {
        $response = ["registro" => "correo_existente"];
        $stmt_verificar->close();
    } else {
        $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $correo, $contrasena);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response = ["registro" => "exitoso"];
        } else {
            $response = ["registro" => "error"];
        }

        $stmt->close();
    }

    $conn->close();

    echo json_encode($response);
    exit();
}
?>
