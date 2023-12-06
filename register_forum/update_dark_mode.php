<?php
// Comprueba si la solicitud es una solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene el estado del modo oscuro de la solicitud POST
    $darkMode = $_POST['dark_mode'];

    // Aquí deberías actualizar la preferencia del modo oscuro del usuario en la base de datos
    // ...
    //Esto no está funcionando, ya veré cuando lo toco xd estoy harto hahaha
}
?>


