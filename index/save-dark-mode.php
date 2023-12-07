<?php
// Inicia la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    // $data->darkMode contendrá la preferencia del modo oscuro
    $darkMode = $data->darkMode;

    // Ejemplo utilizando MySQLi
    $conn = new mysqli("localhost", "dantler", "admin", "foro_db");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID del usuario desde la sesión
    $userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if ($userId !== null) {
        $stmt = $conn->prepare("UPDATE usuarios SET dark_mode = ? WHERE id = ?");
        $stmt->bind_param("ii", $darkMode, $userId);
        $stmt->execute();
        $stmt->close();

        // Se devuelve una respuesta indicando el éxito o el fracaso
        $response = ["success" => true, "message" => "Preferencia del modo oscuro guardada correctamente"];

        // Aqui igual se devuelve la respuesta como JSON con el encabezado adecuado
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = ["success" => false, "message" => "Sesión no válida"];

        // Devuelve la respuesta como JSON con el encabezado adecuado
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    $conn->close();
} else {
    $response = ["success" => false, "message" => "Método no permitido"];

    // Se devuelve la respuesta como JSON con el encabezado adecuado
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
