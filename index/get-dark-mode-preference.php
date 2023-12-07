<?php
// Este archivo debe devolver la preferencia actual del modo oscuro almacenada en la base de datos

// Inicia la sesión
session_start();

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "dantler";
$password = "admin";
$dbname = "foro_db";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    $response = ["success" => false, "message" => "Conexión fallida: " . $conn->connect_error];
} else {
    // Consulta para obtener la preferencia actual del modo oscuro
    $sql = "SELECT dark_mode FROM usuarios WHERE id = ?";

    // Obtén el ID del usuario desde la sesión
    $userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if ($userId !== null) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($darkMode);
        $stmt->fetch();
        $stmt->close();

        if ($darkMode !== null) {
            $response = ["success" => true, "darkMode" => (bool) $darkMode];
        } else {
            // Si no se encuentra la preferencia, asume que el modo oscuro está desactivado
            $response = ["success" => true, "darkMode" => false];
        }
    } else {
        $response = ["success" => false, "message" => "ID de usuario no válido"];
    }

    // Cierra la conexión
    $conn->close();
}

// Limpia el búfer de salida y envía la respuesta como JSON con el encabezado adecuado
ob_end_flush();
header('Content-Type: application/json');
echo json_encode($response);
?>
