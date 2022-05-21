//script que se cargará en el apartado misdatos del paciente

$(document).ready(function () {
    //mostramos la cantidad de notificaciones
    $("#notificaciones").text(localStorage.getItem("notificaciones"));

    $("#cambiarClave").on("click", function () {
        //mostramos un pop-up
        Swal.fire({
            icon: 'info',
            title: 'Cambiar clave',
            text: 'No podrás deshacer esta opción',
            input: 'password',
            inputPlaceholder: 'Introduce tu contraseña',
            inputAttributes: {
                maxlength: 10,
                autocapitalize: 'off',
                autocorrect: 'off'
            }
        }).then(password => {
            //cuando se introduzca una contraseña
            $("#clave").val(password.value);
        });
    });

});