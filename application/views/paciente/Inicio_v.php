        <section id="inicio-contenido">
            <div class="card bg-light mb-3 inicio-card" style="max-width: 18rem;">
                <div class="card-header">Tienes</div>
                <div class="card-body">
                    <div class="card-title"><?php echo $datos['citas'] ?></div>
                    <p class="card-text">citas programadas</p>
                </div>
            </div>

            <div class="card bg-light mb-3 inicio-card" style="max-width: 18rem;">
                <div class="card-header">Tienes</div>
                <div class="card-body">
                    <div class="card-title"><?php echo $datos['tratamientos'] ?></div>
                    <p class="card-text">tratamientos activos</p>
                </div>
            </div>

            <div class="card bg-light mb-3 inicio-card" style="max-width: 18rem;">
                <div class="card-header">Tienes</div>
                <div class="card-body">

                    <div class="card-title" id="card-notificaciones"><?php echo $datos['notificaciones'] ?></div>
                    <p class="card-text">nueva notificación</p>
                </div>
            </div>
        </section>
        </div>
        </body>