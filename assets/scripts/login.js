//evento de documento cargado
$(document).ready(() => {
    //evitamos que al pulsar el boton de escanear qr envie el formulario
    $("#qr").on("click", function (event) {
        //evitamos que envie el formulario al pulsar el boton de escanear qr
        event.preventDefault();
    });

    $("#iniciar-sesion").on("click", function () {
        if ($("#recuerdame").prop("checked")) {
            localStorage.setItem("email", $("#email").val());
            localStorage.setItem("clave", $("#clave").val());
        }
    });

    
    //comprobamos si existe el item de email
    if (localStorage.getItem("email") != undefined) {
        //si existe lo escribiemos en los cuadros de login
        $("#email").val(localStorage.getItem("email"));
        $("#clave").val(localStorage.getItem("clave"));
    }

    //añadimos al localstorage la url base. lo hacemos aqui ya que se usará en varias partes de la aplicación
    localStorage.setItem("hc_base_url", "http://localhost/HealthCare/");
});