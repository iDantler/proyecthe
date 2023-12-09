document.addEventListener('DOMContentLoaded', function () {
    // Utiliza fetch para obtener la información del usuario desde getUserInfo.php
    fetch('getUserInfo.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('La solicitud no pudo ser completada correctamente');
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Verifica la estructura de la respuesta en la consola

        // Asegúrate de que 'nombre' esté presente en el objeto 'data'
        if (data.hasOwnProperty('nombre')) {
            // Actualizar la interfaz de usuario con la información obtenida
            document.getElementById('nombreUsuario').innerText = data.nombre;
            document.getElementById('descripcionUsuario').textContent = data.descripcion;
            document.getElementById('publicacionesUsuario').textContent = data.publicaciones;
            document.getElementById('seguidoresUsuario').textContent = data.seguidores;
            document.getElementById('seguidosUsuario').textContent = data.seguidos;
        } else {
            console.error('El campo "nombre" no está presente en la respuesta del servidor.');
        }
    })
    .catch(error => console.error('Error en la solicitud:', error.message, error));
});


