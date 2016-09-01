<?php

  include "db/cliente.class.php";

  try
  {
    $c = new Cliente();

    $resultado = $c->obtener_clientes();



  }catch(Exception $e)
  {
    header("Location: /error/Errores.php?msg".$e->getMessage());
    die();  
  }


?>

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
    
    <div class="col-md-2"></div>

    <div class="col-md-8">



    <legend>Bienvenido al listado de Clientes</legend>

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
              <td><?php echo $cliente['edad']; ?></td>
            </tr>

          <?php endforeach; ?>
          
        <?php endif; ?>

      </tbody>
      </table>

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