<?php

	session_start();

	require_once __DIR__."/../db/cliente.class.php";

	if(isset($_POST['action']) && $_POST['action'] == 'nuevo')
	{
		try {

			$c = new Cliente();

			$usuario['id'] = $_POST['id'];
			$usuario['apellido'] = $_POST['apellido'];
			$usuario['nombre'] = $_POST['nombre'];
			$usuario['fecha_nac'] = $_POST['fecha_nac'];
			$usuario['activo'] = $_POST['activo'];

			$respuesta = $c->nuevo_cliente($usuario);

			header("Location: ../index.php");
			die();
			
			
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'borrar')
	{
		try {
			
			$c = new Cliente();

			$usuario['id'] = $_GET['id'];

			$respuesta = $c->borrar_cliente($usuario);

			header("Location: ../index.php");
			die();

		} catch (Exception $e) {
			throw new Exception($e->getMessage());	
		}
	}

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