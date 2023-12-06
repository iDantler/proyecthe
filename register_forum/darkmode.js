$('#dark-mode-toggle').click(function() {
    // Alterna el modo oscuro
    $('body').toggleClass('dark-mode');

    // Guarda el estado del modo oscuro en la base de datos
    var darkModeEnabled = $('body').hasClass('dark-mode') ? 1 : 0;
    $.post('update_dark_mode.php', {dark_mode: darkModeEnabled});
});
