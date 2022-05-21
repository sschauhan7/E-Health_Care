//script que se cargara en todas las paginas del paciente

$(document).ready(function () {
    // MENU LATERAL
    //para cada elemento del menu lateral
    for (let a of document.getElementsByClassName("list-group")[0].children) {

        //si el href coincide con la url actual
        if (a.href == window.location.href) {

            //añade la clase active para que resalte en azul
            a.children[0].classList.add("active");
        }
    }

    $("#notificaciones").on("click", () => {
        //TODO: mostrar listado con notificaciones
    });

    //boton de logout
    $("#logout").on("click", () => {
        //si hace clic en el boton de logout, redirigimos al login
        window.location = localStorage.getItem("hc_base_url") + "login";
    });
});

