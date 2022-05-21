//cuando el documento se haya cargado
$(document).ready(function () {
    //mostramos la cantidad de notificaciones
    $("#notificaciones").text(localStorage.getItem("notificaciones"));

    //el numero de paginas dependera del alto de la pagina
    let paginas = 5;
    if (window.innerHeight < 920) paginas = 4;
    
    //declaramos la parte de los botones
    $('#botonera').pagination({
        dataSource: function (done) {
            //cuando se complete la solicitud llamamos a done como callback
            $.post(localStorage.getItem("hc_base_url") + "Informes_controller/leerListaInformes", { ajax: true, propio: true }, function (data) {
                done(JSON.parse(data));
            });
        },

        pageSize: paginas,
        showPageNumbers: false,
        showNavigator: true,
        showPrevious: true,
        showNext: true,
        formatNavigator: " Página <%= currentPage %> de <%= totalPage %>",

        callback: (data, pagination) => {
            //data son los datos a mostrar en esta página
            //eliminamos el contenido de la lista
            $("#lista").html("");
            //para cada informe
            for (let informe of data) {
                let elemento = document.createElement("li");
                elemento.classList.add("elemento-lista");
                elemento.classList.add("alert");
                elemento.classList.add("alert-secondary");

                let enlace = document.createElement("a");
                enlace.href = localStorage.getItem("hc_base_url") + `Informes_controller/verInforme/${informe.id}`;
                enlace.innerText = "Ir al informe";

                let cabecera = document.createElement("p");
                cabecera.innerHTML = `Informe de ${informe.especialidad}. <a href="${localStorage.getItem("hc_base_url")}Informes_controller/verInforme/${informe.id}">Ver informe</a>`;

                let fecha = document.createElement("small");
                fecha.innerText = `Fecha: ${new Date(informe.fecha).toLocaleDateString()}`

                let medico = document.createElement("p");
                medico.innerText = `Facultativo: ${informe.nombre_completo_medico}`;

                elemento.appendChild(cabecera);
                elemento.appendChild(medico);
                elemento.appendChild(fecha);


                $(elemento).appendTo($("#lista"));

            }
        }
    })
});
