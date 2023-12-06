document.addEventListener('DOMContentLoaded', function () {
    // Procesar el formulario y mostrar la alerta
    function procesarFormulario() {
        fetch('register_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'nombre': document.getElementById('nombre').value,
                'correo': document.getElementById('correo').value,
                'contrasena': document.getElementById('contrasena').value,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.registro === 'exitoso') {
                // Registro exitoso
                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso',
                    text: 'Redirigiendo...',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didClose: () => {
                        window.location.href = "../login_forum/login.php";
                    }
                });
            } else if (data.registro === 'error') {
                // Error en el registro
                Swal.fire({
                    icon: 'error',
                    title: 'Error en el registro',
                    text: 'Por favor, inténtalo de nuevo.',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didClose: () => {
                        window.location.href = "../register_forum/register.php?registro=error";
                    }
                });
            } else if (data.registro === 'correo_existente') {
                // Correo ya registrado
                Swal.fire({
                    icon: 'warning',
                    title: 'Correo no disponible',
                    text: 'El correo ya está registrado. Por favor, elige otro.',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                });
            } else {
                // Manejar cualquier otro caso que pueda surgir
                console.error('Respuesta del servidor inesperada:', data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Escuchar el envío del formulario
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault(); // Evitar el envío normal del formulario
        procesarFormulario(); // Llamar a la función para procesar el formulario
    });
});
