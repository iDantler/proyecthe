// Este es el código para la lupa
function toggleSearchInput() {
    const searchContainer = document.querySelector('.search-container');
    searchContainer.classList.toggle('show-input');
}

// Esto es para el modo negro y claro
document.addEventListener('DOMContentLoaded', function () {
    var icon = document.getElementById('theme-icon');
    var body = document.body;
    var header = document.querySelector('header');
    var footer = document.querySelector('footer');
    var buttons = document.querySelectorAll('.btn');

    body.classList.add('loaded');

    // Verifica el estado del modo oscuro en el almacenamiento local
    if (localStorage.getItem('darkMode') === 'enabled') {
        enableDarkMode();
    }

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
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
        body.classList.add('dark-theme');
        header.classList.add('dark-theme');
        footer.classList.add('dark-theme');
        buttons.forEach(function (button) {
            button.classList.add('dark-theme');
        });
        // Guarda el estado en el almacenamiento local
        localStorage.setItem('darkMode', 'enabled');
    }

    function disableDarkMode() {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
        body.classList.remove('dark-theme');
        header.classList.remove('dark-theme');
        footer.classList.remove('dark-theme');
        buttons.forEach(function (button) {
            button.classList.remove('dark-theme');
        });
        // Guarda el estado en el almacenamiento local
        localStorage.setItem('darkMode', null);
    }
});