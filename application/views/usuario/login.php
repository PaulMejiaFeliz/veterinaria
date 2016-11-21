<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Veterinaria</title>

    <link rel = "stylesheet"  type = "text/css" href="<?php echo base_url("css/bootstrap.min.css"); ?>">
    <link rel = "stylesheet"  type = "text/css" href="<?php echo base_url("bootstrap-theme.min.css"); ?>">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('css/personal.css'); ?>">

    <?php
      if(isset($err)){
          echo $err;
      }

    ?>
  </head>
  <body>
    <div class="container background-opaco">
      <div class="row">
        <div class="col col-md-4">

        </div>
        <div class="col col-md-4 text-center">
          <form method="post" action="<?php echo base_url("Login/entrar"); ?>" >
              <h3>Login</h3>
              <div class="form-group input-group">
                <span class="input-group-addon">Usuario</span>
                <input type="text" required class="form-control" name="nombre" />
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">Contraseña</span>
                <input type="password" required class="form-control" name="clave" />
              </div>
              <div>
                <button class="btn btn-primary" type="submit">Entrar</button>
              </div>
          </form>
        </div>
      </div>
      </div>
    </div>

  </body>
</html>
