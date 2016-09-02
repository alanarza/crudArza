<?php 

	require_once "db/cliente.class.php";

	try
	{

		$c = new Cliente();

		$resultado = $c->modificar_cliente($_GET['id']);

	}
	catch(Exception $e)
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

  	<div class="col-md-3"></div>

  	<div class="col-md-6">

  		<legend> <h2>Bienvenido al listado de Clientes</h2></legend>
  		
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title">Modificar Cliente</h3>
		  </div>
		  <div class="panel-body">

			<form class="form-horizontal">
				<fieldset>
				    
				    <div class="form-group">
						<label for="nombre" class="col-lg-2 control-label">Nombre</label>
				    	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="nombre" value="<?php echo $resultado['nombre']; ?>">
				      	</div>
				    </div>
					
					<div class="form-group">
						<label for="nombre" class="col-lg-2 control-label">Apellido</label>
				    	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="nombre" value="<?php echo $resultado['apellido']; ?>">
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