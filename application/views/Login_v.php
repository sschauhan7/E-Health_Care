<body>
    <div class="row shadow-lg p-3 mb-5 bg-white rounded">

        <img src="<?php echo base_url() ?>assets/img/logo.png" alt="" srcset="" class="col-12 col-md-8 col-l-7 col-xl-5">

        <form method="POST" action="<?php echo base_url() ?>login/autenticar" class="col-md-12 col-xl-5">
            <?php if ($this->session->flashdata('error') == 'no_user') { ?>
                <div class="alert alert-danger" role="alert">
                    Datos de acceso incorrectos. Prueba de nuevo.
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" required>
                
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="recuerdame">
                <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
            </div>
            <button id="qr" class="btn btn-outline-primary" type="button">Escanear QR</button>
            <input type="submit" class="btn btn-success" value="Iniciar sesión" id="iniciar-sesion">
        </form>
    </div>
</body>