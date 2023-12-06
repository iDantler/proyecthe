// modal.js

$(document).ready(function () {
    $("#create-thread-btn").click(function () {
        $("#myModal").css("display", "block");
    });

    $(window).click(function (e) {
        // Verifica si el clic fue en el primer modal
        if (e.target.id === "myModal") {
            $("#myModal").css("display", "none");
        }
    });
});
