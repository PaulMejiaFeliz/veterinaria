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
        return confirm("¿Seguro que desea eliminar al animal?");
      }
    </script>
  </head>
  <body>
    <div class="container background-opaco">
      <h3>Ingreso de animales</h3>
      <div class="row">
        <form method="post" action="<?php echo base_url("Accion/guardarA"); ?>" enctype='multipart/form-data' >
          <div class="col-md-6">
            <div class="form-group input-group">
              <span class="input-group-addon">Código</span>
              <input type="text" readonly class="form-control" name="id" value="<?php echo isset($editanimal->id)? $editanimal->id: 0; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">tipo</span>
              <select class="form-control" required name="tipo" value="<?php echo isset($editanimal->tipo)? $editanimal->tipo: 0; ?>" >
                <?php

                  if (isset($tipo)) {
                    if(count($tipo) > 0){
                      foreach ($tipo as $t) {
                        echo "<option value='{$t->id}'>{$t->id} |{$t->tipo} </option>";
                      }
                    } else{
                      echo "<option value='0'>---------No hay tipos--------</option>";
                    }
                  }

                ?>
              </select>
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Nombre</span>
              <input type="text" class="form-control" name="nombre" value="<?php echo isset($editanimal->nombre)? $editanimal->nombre: '';  ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Raza</span>
              <input type="text" class="form-control" name="raza" value="<?php echo isset($editanimal->raza)? $editanimal->raza: '';  ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Comentario</span>
              <input type="text" class="form-control" name="comentario" value="<?php echo isset($editanimal->comentario)? $editanimal->comentario: ''; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Peso</span>
              <input type="text" class="form-control" name="peso" value="<?php echo isset($editanimal->peso)? $editanimal->peso: ''; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Color</span>
              <input type="text" class="form-control" name="color" value="<?php echo isset($editanimal->color)? $editanimal->color: '';  ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Foto</span>
              <input type="file" accept="image/*" class="form-control" name="foto" value="<?php echo isset($editanimal->foto)? $editanimal->foto: ''; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">fecha</span>
              <input type="date" class="form-control" name="fecha" value="<?php echo isset($editanimal->fecha)? $editanimal->fecha: ''; ?>" />
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
          </div>
        </form>
        <div class="col-md-6">
          <a href= "<?php echo base_url('accion/tipo');?>" class='btn btn-sm btn-warning'>Modificar tipos</a>
          <a href= "<?php echo base_url('accion/usuario');?>" class='btn btn-sm btn-warning'>Modificar Usuarios</a>
          <a href= "<?php echo base_url('login/salir');?>" class='btn btn-sm btn-danger'>Cerrar Sección</a>
        </div>
      </div>
      <div class="row">
        <h3>Animales Registrados</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Código</th>
              <th>tipo</th>
              <th>Nombre</th>
              <th>raza</th>
              <th>Comentario</th>
              <th>Peso</th>
              <th>Color</th>
              <th>foto</th>
              <th>fecha</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($animal as $a) {
                $linkedit = base_url("/accion/?edit={$a->id}");
                $linkdel = base_url("/accion/borrarA/?del={$a->id}");
                echo "<tr>";
                foreach ($a as $campo=>$valor) {
                  if ($campo=='foto') {
                    echo "<td><img id='foto' src='".base_url($valor)."' alt='{$valor}' /></td>";
                  } else{
                    echo "<td>{$valor}</td>";
                  }
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
