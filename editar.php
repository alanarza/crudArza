<?php include "controllers/cont_editar.php"; ?>

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

  	<div class="col-md-3"></div>

  	<div class="col-md-6">

  		<legend> <h2>Bienvenido al listado de Clientes</h2></legend>
  		
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title">Modificar Cliente</h3>
		  </div>
		  <div class="panel-body">

			<form class="form-horizontal" role="form" action="controllers/cont_editar.php" method="POST">
				<fieldset>
				    
				    <div class="form-group">
						<label for="nombre" class="col-lg-2 control-label">Nombre</label>
				    	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $resultado['nombre']; ?>">
				      	</div>
				    </div>
					
					<div class="form-group">
						<label for="apellido" class="col-lg-2 control-label">Apellido</label>
				    	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $resultado['apellido']; ?>">
				      	</div>
				    </div>

				    <div class="form-group">
						<label for="fecha_nac" class="col-lg-2 control-label">Fecha de Nacimiento</label>
				    	<div class="col-lg-10">
				        	<input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $resultado['fecha_nac']; ?>">
				      	</div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label">Activo</label>
				      <div class="col-lg-10">
				        <div class="radio">
				          <label>
				            <input type="radio" name="activo" id="optionsRadios1" value="1" <?php if($resultado['activo'] == 1){ echo 'checked=""'; }?> >
				            Activo
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="activo" id="optionsRadios2" value="0" <?php if($resultado['activo'] == 0){ echo 'checked=""'; }?> >
				            Inactivo
				          </label>
				        </div>
				      </div>
				    </div>

				    <input id="action" type="hidden" name="action" value="datos"/>

					<input id="action" type="hidden" name="id" value=" <?php echo $_GET['id']; ?> "/>

				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="cancel" class="btn btn-danger" href="index.php">Cancelar</button>
				        <button type="submit" class="btn btn-success">Guardar</button>
				      </div>
				    </div>

				</fieldset>
			</form>
		    
		  </div>
		</div>

  	</div>

  	<div class="col-md-3"></div>

  </body>
  </html>