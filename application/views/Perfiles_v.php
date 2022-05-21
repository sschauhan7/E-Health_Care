<body>
    <div class="row shadow-lg p-3 mb-5 bg-white rounded">
        <?php

        //si tiene acceso al perfil de paciente
        if ($perfiles['paciente'] == true) {
        ?>
            <div class="card" style="width: 18em;">
                <div class="card-logo">
                    <i class="fas fa-briefcase-medical"></i>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Paciente</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Entrar como paciente</h6>
                    <p class="card-text">Accede a la plataforma como paciente de tu centro de salud</p>
                    <a href="<?php echo base_url()?>paciente/inicio" class="btn btn-primary">Entrar</a>

                </div>
            </div>
        <?php
        }

        //si tiene acceso al perfil de medico
        if ($perfiles['medico'] == true) {
        ?>
            <div class="card" style="width: 18em;">
                <div class="card-logo">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Facultativo</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Entrar como facultativo</h6>
                    <p class="card-text">Accede a la plataforma como profesional médico en tu centro de salud</p>
                    <a href="<?php echo base_url()?>facultativo" class="btn btn-primary">Entrar</a>

                </div>
            </div>
        <?php
        }

        //si tiene acceso al perfil de laboratorio
        if ($perfiles['personal_lab'] == true) {
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-logo">
                    <i class="fas fa-syringe"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?php echo base_url()?>laboratorio" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>