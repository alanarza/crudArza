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

}