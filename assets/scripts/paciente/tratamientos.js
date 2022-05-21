$(document).ready(function () {
    //mostramos la cantidad de notificaciones
    $("#notificaciones").text(localStorage.getItem("notificaciones"));

    $.post(localStorage.getItem("hc_base_url") + "Tratamientos_controller/leerTratamientos", {}, function (data) {
        data = JSON.parse(data);

        //si no hay datos, mostramos un mensaje de informacion y paramos la ejecucion
        if (data.length == 0) {
            $("#lista").append("<h3>No tienes tratamientos activos, ¡Genial!</h3>");
        };

        //borramos el contenido del cuerpo
        $("#tratamientos").html("");


        for (let tratamiento of data) {


            //primero leemos el nombre del medicamento
            fetch(`https://cima.aemps.es/cima/rest/medicamento?nregistro=${tratamiento.nregistro}`)
                .then(function (respuesta) {
                    //convertimos la respuesta en un objeto literal json
                    return respuesta.json();
                })
                .then(function (respuesta) {
                    //creamos un elemento td y lo almacenamos
                    let enlace = document.createElement("a");
                    enlace.innerText = respuesta.nombre;
                    enlace.href = "";

                    let li = document.createElement("li");
                    $(enlace).appendTo(li);
                    $(li).appendTo("#lista");

                    let dosis = JSON.parse(tratamiento.dosis);

                    let contenidoModal = "";
                    contenidoModal += `<p>Fecha de inicio del tratamiento ${new Date(tratamiento.fecha_inicio).toLocaleDateString()}</p><br>`;
                    contenidoModal += `<p>Fecha de fin del tratamiento ${new Date(tratamiento.fecha_fin).toLocaleDateString()}</p><br>`;
                    contenidoModal += `<p>Dosis: ${dosis.dosis} ${dosis.presentacion} en las siguientes horas:</p>`;
                    
                    contenidoModal += "<ul class='ul-modal'>";
                    for(let hora of dosis.horas){
                        contenidoModal += `<li class='li-modal'>${hora}</li>`;
                    }
                    contenidoModal += "</ul>";

                    //"{"presentacion":"unidades","dosis":[{"hora":"7","cantidad":"25"},{"hora":"15","cantidad":"25"},{"hora":"23","cantidad":"25"}]}
                    //VENTANA POPUP
                    $(enlace).on("click", function (e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Tratamiento',
                            html: contenidoModal,
                            showCloseButton: true,
                            showCancelButton: false,
                            focusConfirm: true,
                            confirmButtonText: "Cerrar",
                            
                            cancelButtonAriaLabel: 'Thumbs down'
                        })
                    })
                });


        }

    })
});