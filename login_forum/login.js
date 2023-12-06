$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'login_process.php',
            data: $('#loginForm').serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    // Agrega la clase cuando se muestra SweetAlert2
                    $('#loginForm').addClass('sweet-alert-open');

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    }).then(() => {
                        // Elimina la clase cuando se cierra SweetAlert2
                        $('#loginForm').removeClass('sweet-alert-open');
                    });
                }
            },
            error: function () {
                // Maneja errores si es necesario
            }
        });
    });
});
