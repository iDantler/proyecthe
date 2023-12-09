<?php
// getUserInfo.php
session_start();

function obtenerIdUsuario() {
    // Implementa la lógica para obtener el ID del usuario (puedes usar tu propia lógica aquí)
    if (isset($_SESSION['id'])) {
        return $_SESSION['id'];
    } else {
        return 0;  // Valor predeterminado si no hay sesión iniciada
    }
}

try {
    // Conectar a la base de datos (ajusta según tu configuración)
    $conn = new mysqli("localhost", "dantler", "admin", "foro_db");

    // Verificar la conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID del usuario solicitado (si se proporciona)
    $userId = isset($_GET['user_id']) ? $_GET['user_id'] : obtenerIdUsuario();

    // Consulta SQL para obtener la información del perfil del usuario
    $sql = "SELECT u.nombre, p.foto_perfil, p.descripcion, p.publicaciones, p.seguidores, p.seguidos
            FROM perfiles p
            INNER JOIN usuarios u ON p.usuario_id = u.id
            WHERE u.id = $userId";
    $result = $conn->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result->num_rows > 0) {
        // Obtener los datos del perfil del usuario
        $userData = $result->fetch_assoc();
    } else {
        // Manejar el caso en que no se encuentre el perfil
        throw new Exception("Perfil no encontrado");
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

    // Devolver los datos del usuario como JSON
    header('Content-Type: application/json');
    echo json_encode($userData);
    
    // Manejar errores
} catch (Exception $e) {
    // Devolver un mensaje de error como JSON
    header('Content-Type: application/json');
    echo json_encode(array('error' => $e->getMessage()));
}
?>