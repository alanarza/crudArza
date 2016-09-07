<?php

	session_start();

	require_once __DIR__."/../db/cliente.class.php";

	if(isset($_POST['action']) && $_POST['action'] == 'datos')
	{
		try {

			$c = new Cliente();

			$usuario['id'] = $_POST['id'];
			$usuario['apellido'] = $_POST['apellido'];
			$usuario['nombre'] = $_POST['nombre'];
			$usuario['fecha_nac'] = $_POST['fecha_nac'];
			$usuario['activo'] = $_POST['activo'];

			$respuesta = $c->modificar_cliente($usuario);

			if($respuesta == "oks")
			{
				header("Location: ../index.php");
				die();
			}
			else
			{
				header("Location: ../editar.php");	
				die();
			}
			
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	try
	{

		$c = new Cliente();

		$resultado = $c->seleccionar_cliente($_GET['id']);

	}
	catch(Exception $e)
	{
		header("Location: /error/Errores.php?msg".$e->getMessage());
		die();  
	}
	
?>