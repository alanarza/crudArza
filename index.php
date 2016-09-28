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

  <!--Modal ver cliente-->
  <div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Cliente</h4>
        </div>
        <div class="modal-body">
          
          <form class="form-horizontal" role="form">
            <fieldset>
                
                <div class="form-group">
                <label for="nombre" class="col-lg-2 control-label">Nombre</label>
                  <div class="col-lg-10">
                      <input type="text" class="form-control" id="nombre" name="nombre" value=" <?php echo $cliente['nombre']; ?> " readonly>
                    </div>
                </div>
              
                <div class="form-group">
                  <label for="apellido" class="col-lg-2 control-label">Apellido</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $cliente['apellido']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                <label for="fecha_nac" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                  <div class="col-lg-10">
                      <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $cliente['fecha_nac']; ?>" readonly>
                    </div>
                </div>

                <?php if($cliente['activo'] == 0):?>
                  <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                <?php else:?>
                  <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                <?php endif;?>

               

            </fieldset>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                        
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal ver cliente-->

  <!--Modal de agregar usuario-->
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
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                      </div>
                  </div>
                
                  <div class="form-group">
                    <label for="apellido" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="fecha_nac" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                    <div class="col-lg-10">
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Activo</label>
                    <div class="col-lg-10">
                      <div class="radio">
                        <label>
                          <input type="radio" name="activo" id="optionsRadios1" value="1" required>
                          Activo
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="activo" id="optionsRadios2" value="0" required>
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
    <!--Modal de agregar usuario-->



    <!--Navbar de login de usuario-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Listado de Clientes</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>
          
          <ul class="nav navbar-nav navbar-right">

            <?php if(!isset($_SESSION['nombre'])):?>

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Iniciar Session <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <div class="container-fluid">
                <form class="form-horizontal" role="form" action="controllers/cont_index.php" method="POST">
                <fieldset>

                  <li><div class="form-group">                  
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="nombre" name="user" placeholder="Usuario" required>
                      </div>
                  </div></li>

                  <li><div class="form-group">                  
                    <div class="col-lg-12">
                        <input type="password" class="form-control" id="nombre" name="pass" placeholder="Contraseña" required>
                      </div>
                  </div></li>

                  <li>

                  <input id="action" type="hidden" name="action" value="login"/>

                  <div class="col-lg-12"><button type="submit" class="btn btn-default btn-sm">Iniciar Sesion</button></div>

                  </li>

                </fieldset>
                </form>
                </div>
              </ul>
              </li>

            <?php else:?>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo($_SESSION['nombre']); ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  
                   <li><a href="controllers/cont_index.php?action=logout">Cerrar Sesion</a></li>

                </ul>
              </li>

            <?php endif;?>

          </ul>
        </div>
      </div>
    </nav>
    <!--Navbar de login de usuario-->
    
    <!--Cuerpo de la pagina web-->
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
          <?php if(isset($_SESSION['nombre'])):?> <th>Acciones</th> <?php endif;?>

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

              <?php if($cliente['activo'] == 0):?>
                <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
              <?php else:?>
                <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
              <?php endif;?>
              
              <td>

                <?php if( isset($_SESSION['permisos']) && $res = strpos( $_SESSION['permisos'] ,'ver') !== false ): ?>
                <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#usuarioModal">Ver <span class="glyphicon glyphicon-user"></span></a>
                <?php endif;?>

                <?php if(isset($_SESSION['permisos']) && $res = strpos( $_SESSION['permisos'] ,'editar') !== false ): ?>
                <a href="editar.php?id=<?php echo $cliente['id'];?>" class="btn btn-primary btn-sm">Editar <span class="glyphicon glyphicon-pencil"></span></a>
                <?php endif;?>

                <?php if(isset($_SESSION['permisos']) && $res = strpos( $_SESSION['permisos'] ,'borrar') !== false ): ?>
                <a href="controllers/cont_index.php?id=<?php echo $cliente['id'];?>&action=borrar" class="btn btn-danger btn-sm">Borrar <span class="glyphicon glyphicon-trash"></span></a>
                <?php endif;?>

              </td>
            </tr>

          <?php endforeach; ?>
          
        <?php endif; ?>

      </tbody>
      </table>

      <?php if(isset($_SESSION['permisos']) && $res = strpos( $_SESSION['permisos'] ,'crear') !== false ): ?>
      <a  class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal">Crear Nuevo <span class="glyphicon glyphicon-plus"></span></a>
      <?php endif;?>

      </div>
    </div>
    </div>

    <div class="col-md-2"></div>
    <!--Cuerpo de la pagina web-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="recursos/js/bootstrap.min.js"></script>
  </body>
</html>