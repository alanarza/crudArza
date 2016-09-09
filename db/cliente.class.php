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

				foreach ($clientes as &$cliente) 
				{
					list($Y,$m,$d) = explode("-", $cliente['fecha_nac']);
    				$cliente['edad'] = ( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
				}

				return $clientes;
			}
			
		} catch(PDOException $e){
			throw new Exception($e->getMessage());
		}
	}

	function seleccionar_cliente($id)
	{
		$conn = new conexion();

		try{

			$sql = "SELECT * FROM clientes WHERE id = :id";

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();

			if($stmt->rowCount() == 1)
			{
				$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
				return $cliente;
			}

		} catch(PDOException $e){
			throw new Exception($e->getMessage());
		}
	}

	function modificar_cliente($user)
	{
		$conn = new conexion();

		try {

			$sql = "UPDATE 	clientes SET apellido = :apellido, nombre = :nombre, fecha_nac = :fecha_nac, activo = :activo WHERE id = :id";
			
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':apellido', $user['apellido'], PDO::PARAM_STR);
			$stmt->bindParam(':nombre', $user['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(':fecha_nac', $user['fecha_nac'], PDO::PARAM_STR);
			$stmt->bindParam(':activo', $user['activo'], PDO::PARAM_STR);
			$stmt->bindParam(':id', $user['id'], PDO::PARAM_STR);
			$stmt->execute();

			if($stmt->rowCount() > 0)
			{
				return "oks";
			}
			else
			{
				return "nope";
			}

		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}

	function nuevo_cliente($user)
	{
		$conn = new conexion();

		try {

			$sql = "INSERT INTO clientes VALUES (null, :apellido, :nombre, :fecha_nac, :activo)";
			$stmt = $conn->prepare($sql);

			$stmt->bindParam('nombre', $user['nombre'], PDO::PARAM_STR);
			$stmt->bindParam('apellido', $user['apellido'], PDO::PARAM_STR);
			$stmt->bindParam('fecha_nac', $user['fecha_nac'], PDO::PARAM_STR);
			$stmt->bindParam('activo', $user['activo'], PDO::PARAM_STR);
			$stmt->execute();

			/*Devolver mensaje de confirmacion*/
			
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}

	}

	function borrar_cliente($user)
	{
		$conn = new conexion();

		try {

			$sql = "DELETE FROM clientes WHERE id = :id";
			$stmt = $conn->prepare($sql);

			$stmt->bindParam('id', $user['id'], PDO::PARAM_STR);
			$stmt->execute();

			/*Devolver mensaje de confirmacion*/
			
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}

	}

}