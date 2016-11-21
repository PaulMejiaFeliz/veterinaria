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
        return confirm("¿Seguro que desea eliminar al tipo?\nAl realizar esta acción tambien borrara a los animales de este tipo.");
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
      <h3>Ingreso de tipos</h3>
      <div class="row">
        <form method="post" action="<?php echo base_url("Accion/guardarT"); ?>" >
          <div class="col-md-6">
            <div class="form-group input-group">
              <span class="input-group-addon">Código</span>
              <input type="text" readonly class="form-control" name="id" value="<?php echo isset($edittipo->id)? $edittipo->id: 0; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Tipo</span>
              <input type="text" class="form-control" name="tipo" value="<?php echo isset($edittipo->tipo)? $edittipo->tipo: '';  ?>" />
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
          </div>
        </form>
        <div class="col-md-6">
            <a href="<?php echo base_url('Accion/index');?>" class='btn btn-sm btn-warning'>Página Pricipal</a>
            <a href= "<?php echo base_url('accion/usuario');?>" class='btn btn-sm btn-warning'>Modificar Usuarios</a>
            <a href= "<?php echo base_url('login/salir');?>" class='btn btn-sm btn-danger'>Cerrar Sección</a>
        </div>
      </div>
      <div class="row">
        <h3>tipos Registrados</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Código</th>
              <th>Tipo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($tipo as $t) {
                $linkedit = base_url("/Accion/tipo/?edit={$t->id}");
                $linkdel = base_url("/Accion/borrarT/?del={$t->id}");
                echo "<tr>";
                foreach ($t as $campo) {
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
