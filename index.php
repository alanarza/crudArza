<?php include "controllers/cont_index.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Clientes</title>

    <!-- Bootstrap -->
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Cliente</h4>
          </div>
          <div class="modal-body">
            

            <form class="form-horizontal" role="form" action="controllers/cont_index.php" method="POST">
              <fieldset>
                  
                  <div class="form-group">
                  <label for="nombre" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="nombre" name="nombre">
                      </div>
                  </div>
                
                <div class="form-group">
                  <label for="apellido" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="apellido" name="apellido">
                      </div>
                  </div>

                  <div class="form-group">
                  <label for="fecha_nac" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                    <div class="col-lg-10">
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Activo</label>
                    <div class="col-lg-10">
                      <div class="radio">
                        <label>
                          <input type="radio" name="activo" id="optionsRadios1" value="1">
                          Activo
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="activo" id="optionsRadios2" value="0">
                          Inactivo
                        </label>
                      </div>
                    </div>
                  </div>

                  <input id="action" type="hidden" name="action" value="nuevo"/>

              </fieldset>
            


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="col-md-2"></div>

    <div class="col-md-8">

    <legend> <h2>Bienvenido al listado de Clientes</h2></legend>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Clientes</h3>
      </div>
      <div class="panel-body">

      <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Edad</th>
          <th>Activo</th>
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody>
        
        <?php if(!empty($resultado)): ?>
        
          <?php foreach ($resultado as $cliente): ?>

            <tr>
              <td><?php echo $cliente['id']; ?></td>
              <td><?php echo $cliente['nombre']; ?></td>
              <td><?php echo $cliente['apellido']; ?></td>
              <td><?php echo $cliente['fecha_nac']; ?></td>

              <?php if($cliente['activo'] == 0):?>
                <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
              <?php else:?>
                <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
              <?php endif;?>

              <td><a href="editar.php?id=<?php echo $cliente['id'];?>" class="btn btn-primary btn-sm">Editar <span class="glyphicon glyphicon-pencil"></span></a><a href="controllers/cont_index.php?id=<?php echo $cliente['id'];?>&action=borrar" class="btn btn-danger btn-sm">Borrar <span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>

          <?php endforeach; ?>
          
        <?php endif; ?>

      </tbody>
      </table>

      <a  class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal">Crear Nuevo <span class="glyphicon glyphicon-plus"></span></a>

      </div>
    </div>
    </div>

    <div class="col-md-2"></div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="recursos/js/bootstrap.min.js"></script>
  </body>
</html>