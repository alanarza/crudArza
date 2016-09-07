<?php

	session_start();

	require_once __DIR__."/../db/cliente.class.php";

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