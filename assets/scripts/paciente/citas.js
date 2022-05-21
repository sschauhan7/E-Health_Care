//script que se cargará en el apartado citas del paciente
$(document).ready(function () {
    //mostramos la cantidad de notificaciones
    $("#notificaciones").text(localStorage.getItem("notificaciones"));

    //botones de anular cita
    $(".anular-cita-btn").on("click", function () {
        //cogemos el tr, que es la cita que tiene todos los datos
        let cita = $(this).parent().parent();
        let id_cita = $(this).data("id-cita");
        let medico = $(cita).children().eq(0).text();
        let fecha = $(cita).children().eq(1).text();
        let hora = $(cita).children().eq(2).text();

        Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Quieres cancelar la cita con ${medico} el ${fecha} a las ${hora}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#218838',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, estoy seguro',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            //si el resultado no es true, no continua ejecutando
            if (!result.value) return;
            //propia indica al controlador si se quire borrar una cita propia o de otra persona.
            //hay que recordar que el controlador lo usaran varios tipos de usuario.
            $.post(localStorage.getItem("hc_base_url") + "Citas_controller/borrarCita", { cita: id_cita, propia: true }, function (data) {
                //si se ha borrado correctamente
                if (data == 1) {
                    $(cita).fadeOut(500);
                    Swal.fire(
                        'Cita borrada correctamente',
                        `Acabas de anular la cita con ${medico}`,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error',
                        `Ha ocurrido un error al borrar la cita. Inténtalo en unos minutos.`,
                        'error'
                    );
                }
            });
        })
    });

    $("#citas-buscar-cita").on("click", function () {
        //cogemos todos los datos del formulario
        //todos tendrán un valor por defecto, por lo que no hace falta comprobar su valor
        let medico = $("#medico").val();
        let fecha = $("#fecha").val();
        let hora = $("#hora").val();
        let minuto = $("#minuto").val();

        //cerramos la ventana modal
        $("#citas-cerrar-form").click();

        //mostramos una ventana de espera
        Swal.fire({
            title: 'Buscando cita',
            html: 'Te estamos buscando una cita lo más cerca posible a los datos solicitados',
            onBeforeOpen: () => {
                //hacemos que se muestre el icono de carga
                Swal.showLoading();
            }
        });


        //hacemos la peticion ajax al servidor con los datos solicitados
        $.post(localStorage.getItem("hc_base_url") + "Citas_controller/buscarLibres", { medico: medico, fecha: fecha, hora: hora, minuto: minuto }, function (data) {
            //cerramos la ventana de espera
            Swal.close();

            //parseamos a JSON
            data = JSON.parse(data);

            $("#mostrarListaCitas").click();
            let tabla_citas = $("#horas");

            for (let hora of data) {
                let fila = document.createElement("TR");
                let fecha = document.createElement("TD");
                let horaCita = document.createElement("TD");

                //=== APARTADO PARA EL BOTON DE SOLICITAR CITA ===
                let accion = document.createElement("TD");

                let btn = document.createElement("BUTTON");
                btn.classList.add("btn");
                btn.classList.add("btn-success");
                btn.classList.add("citas-btn-solicitar-cita");

                btn.dataset.info_cita = hora;

                btn.innerText = "Solicitar Cita";
                accion.appendChild(btn);


                btn.addEventListener("click", function () {
                    $.post(localStorage.getItem("hc_base_url") + "Citas_controller/seleccionarCita", { info: this.dataset.info_cita, medico: medico }, function (data) {
                        if (data == 1) {
                            $("#citas-cerrar-buscador").click();
                            Swal.fire({
                                title: 'Cita reservada',
                                text: 'Se ha confirmado tu cita con' + $("#medico").text(),
                                icon: 'success',
                                onClose: function () { window.location.reload(); }
                            }
                            )
                        }
                    });
                });
                //================================================

                fecha.innerText = hora[1];
                horaCita.innerText = hora[0];


                fila.appendChild(fecha);
                fila.appendChild(horaCita);
                fila.appendChild(accion);

                document.getElementById("horas").appendChild(fila);
            }
        });
    });
});