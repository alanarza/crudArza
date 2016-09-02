<?php

include "conexion.class.php";

class Cliente {

	function obtener_clientes()
	{
		$conn = new conexion();

		try{

			$sql = "SELECT * FROM clientes";
			$stmt = $conn->prepare($sql);
			$stmt->execute();

			if($stmt->rowCount() > 0)
			{
				$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $clientes;
			}
			

		} catch(PDOException $e){
			throw new Exception($e->getMessage());
		}
	}

	function modificar_cliente()
	{
		
	}

}