//script que se cargará en el apartado inicio del paciente

$(document).ready(function () {
    //si estamos en la pagina de inicio
    if (window.location.href == localStorage.getItem("hc_base_url") + "paciente/inicio") {
        //guardamos las notificaciones en localstorage, ya que solo se leen aqui
        localStorage.setItem("notificaciones", $("#card-notificaciones").text());

        //mostramos las notificaciones en la barra superior
        $("#notificaciones").text($("#card-notificaciones").text());
    }
});