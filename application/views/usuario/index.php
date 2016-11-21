<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Veterinaria</title>

    <link rel = "stylesheet"  type = "text/css" href="<?php echo base_url("css/bootstrap.min.css"); ?>">
    <link rel = "stylesheet"  type = "text/css" href="<?php echo base_url("bootstrap-theme.min.css"); ?>">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('css/personal.css'); ?>">
    <script>
      function confirmar(){
        return confirm("¿Seguro que desea eliminar este usuario?");
      }
    </script>
    <?php
      if(isset($err)){
          echo $err;
      }

    ?>
  </head>
  <body>
    <div class="container background-opaco">
      <h3>Ingreso de Usuarios</h3>
      <div class="row">
        <form method="post" action="<?php echo base_url("accion/guardarU"); ?>" >
          <div class="col-md-6">
            <div class="form-group input-group">
              <span class="input-group-addon">Código</span>
              <input type="text" readonly class="form-control" name="id" value="<?php echo isset($editusuario->id)? $editusuario->id: 0; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">E-Mail</span>
              <input type="text" required class="form-control" name="email" value="<?php echo isset($editusuario->email)? $editusuario->email: ''; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Usuario</span>
              <input type="text" required class="form-control" name="nombre" value="<?php echo isset($editusuario->nombre)? $editusuario->nombre: '';  ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Contraseña</span>
              <input type="password" required class="form-control" name="clave" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Confirmar Contraseña</span>
              <input type="password" required class="form-control" name="clave2" />
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
          </div>
        </form>
        <div class="col-md-6">
          <a href="<?php echo base_url('Accion/index');?>" class='btn btn-sm btn-warning'>Página Pricipal</a>
          <a href= "<?php echo base_url('accion/tipo');?>" class='btn btn-sm btn-warning'>Modificar tipos</a>
          <a href= "<?php echo base_url('login/salir');?>" class='btn btn-sm btn-danger'>Cerrar Sección</a>
        </div>
      </div>
      <div class="row">
        <h3>usuarios Registrados</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Código</th>
              <th>E-Mail</th>
              <th>Nombre</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($usuario as $u) {
                $linkedit = base_url("/accion/usuario/?edit={$u->id}");
                $linkdel = base_url("/accion/borrarU/?del={$u->id}");
                echo "<tr>";
                unset($u->clave);
                foreach ($u as $campo) {
                  echo "<td>{$campo}</td>";
                }
                echo "<td>
                  <a href='{$linkedit}' class='btn btn-sm btn-info'>Editar</a>
                  <a href='{$linkdel}' onclick='return confirmar();' class='btn btn-sm btn-danger'>Eliminar</a>
                </td>";
                echo "</tr>";
              }
             ?>
          </tbody>
        </table>
      </div>
    </div>

  </body>
</html>
