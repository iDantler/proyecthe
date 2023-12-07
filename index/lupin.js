// Este es el código para la lupa
function toggleSearchInput() {
    const searchContainer = document.querySelector('.search-container');
    searchContainer.classList.toggle('show-input');
}

document.addEventListener('DOMContentLoaded', function () {
    var icon = document.getElementById('theme-icon');
    var body = document.body;
    var header = document.querySelector('header');
    var footer = document.querySelector('footer');
    var buttons = document.querySelectorAll('.btn');

    body.classList.add('loaded');

    // Obtiene la preferencia del modo oscuro del servidor al cargar la página
    getDarkModePreference();

    icon.addEventListener('click', function () {
        icon.classList.add('fa-spin');
        setTimeout(function () {
            icon.classList.remove('fa-spin');
            if (icon.classList.contains('fa-sun')) {
                enableDarkMode();
            } else {
                disableDarkMode();
            }
        }, 500);
    });

    function enableDarkMode() {
        try {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            body.classList.add('dark-theme');
            header.classList.add('dark-theme');
            footer.classList.add('dark-theme');
            buttons.forEach(function (button) {
                button.classList.add('dark-theme');
            });
            // Envía el estado del modo oscuro al servidor al cambiar
            sendDarkModePreference(true);
        } catch (error) {
            console.error('Error en enableDarkMode:', error);
        }
    }

    function disableDarkMode() {
        try {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            body.classList.remove('dark-theme');
            header.classList.remove('dark-theme');
            footer.classList.remove('dark-theme');
            buttons.forEach(function (button) {
                button.classList.remove('dark-theme');
            });
            // Envía el estado del modo oscuro al servidor al cambiar
            sendDarkModePreference(false);
        } catch (error) {
            console.error('Error en disableDarkMode:', error);
        }
    }

    function getDarkModePreference() {
        // Realiza una solicitud AJAX para obtener la preferencia del modo oscuro del servidor
        fetch('get-dark-mode-preference.php', {
            method: 'GET',
            credentials: 'include',  // Agrega esta línea para incluir las cookies en la solicitud
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('La solicitud no pudo ser completada correctamente');
                }
                return response.text(); // Cambiamos a response.text() para manejar la respuesta como texto
            })
            .then(data => {
                try {
                    if (data.trim() !== "") {
                        const jsonData = JSON.parse(data);
                        if (jsonData.success) {
                            // Aplica el modo oscuro según la preferencia obtenida del servidor
                            if (jsonData.darkMode) {
                                enableDarkMode();
                            } else {
                                disableDarkMode();
                            }
                        } else {
                            // No mostrar mensaje si hay un error en la respuesta del servidor
                            // console.error('Error en la respuesta del servidor:', jsonData.message);
                        }
                    } // No mostrar mensaje si la respuesta está vacía
                } catch (error) {
                    // No mostrar mensaje si hay un error al analizar la respuesta JSON
                    // console.error('Error al analizar la respuesta JSON:', error.message);
                }
            })
            .catch(error => {
                // No mostrar mensaje si hay un error en la solicitud
                // console.error('Error en la solicitud:', error.message);
                // console.error('Error stack:', error.stack);
                return Promise.reject(error); // Agregamos esta línea para propagar el error
            });
    }
    
    
    
    function sendDarkModePreference(isDarkModeEnabled) {
        try {
            // Aquí deberías realizar una solicitud AJAX para enviar el estado al servidor
            // Puedes usar fetch o cualquier biblioteca AJAX como Axios.
            // Ejemplo con fetch:
            fetch('save-dark-mode.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ darkMode: isDarkModeEnabled }),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('La solicitud no pudo ser completada correctamente');
                    }
                    return response.json();
                })
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        } catch (error) {
            console.error('Error en sendDarkModePreference:', error);
        }
    }
});