<?php
//variables para el minimo y el maximo de la fecha
$min = new DateTime('now');
$min->add(new DateInterval('P1D'));
$min = $min->format("Y-m-d");

$max = new DateTime('now');
$max->add(new DateInterval('P14D'));
$max = $max->format("Y-m-d");
?>
<section id="citas-contenido">
    <table class="table table-bordered">

        <tr class="table-primary">
            <th scope="col">Médico</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Acciones</th>
        </tr>

        <?php
        if (count($citas) > 0) {

            //mostramos una fila por cada cita
            foreach ($citas as $cita) {
                $html = "<tr>";
                $html .= "<td>$cita[nombre_medico]</td>";
                $html .= "<td>" . date('d-m-Y', strtotime($cita['fecha'])) . "</td>";
                $html .= "<td>$cita[hora]</td>";
                $html .= "<td class='citas-anular'><button class='btn btn-danger w-75 anular-cita-btn' data-id-cita='$cita[id]'>&times;</button></td>";
                $html .= "</tr>";
                echo $html;
            }
        } else {
            echo "<tr><td colspan='4'><h5>No tienes citas programadas</h5></td></tr>";
        }
        ?>
    </table>

    <button type="button" class="btn btn-primary w-75" data-toggle="modal" data-target="#pedirCita">Nueva Cita</button>


    <!-- Modal de nueva cita-->
    <div class="modal fade" id="pedirCita" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pedir nueva cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" id="citas-cerrar-form">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <label for="medico">Médico:</label>
                    <select id="medico" class="form-control">
                        <?php
                        foreach ($facultativos as $facultativo) {
                            echo "<option value='$facultativo[CIU_medico]'>$facultativo[medico]</option>";
                        }
                        ?>
                    </select>

                    <label for="fecha">Fecha:</label>

                    <!--Fecha aproximada de la cita. Se especifica un mínimo y un máximo-->
                    <input type="date" min="<?php echo $min ?>" max="<?php echo $max ?>" class="form-control" id="fecha" value="<?php echo $min ?>" required>


                    <label for="hora">Hora aproximada</label>
                    <select name="hora" id="hora" class="form-control citas-select">
                        <?php
                        for ($i = 9; $i <= 15; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                    <select name="minuto" id="minuto" class="form-control citas-select">
                        <?php
                        for ($i = 0; $i <= 55; $i += 5) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="citas-buscar-cita">Buscar</button>
                </div>
            </div>
        </div>
    </div>


    <!--Modal que muestra las citas disponibles tras la búsqueda-->
    <button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target=".bd-example-modal-xl" id="mostrarListaCitas">Extra large modal</button>

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content citas-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Horas que te podrían interesar en función de tu búsqueda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="citas-cerrar-buscador">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <table id="horas" class="table mt-3">
                        <thead>
                            <tr class="table-primary">
                                <td>Fecha</td>
                                <td>Hora</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</body>