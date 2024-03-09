<?php

	function mostrar_carreras(){
		$sql = "SELECT * FROM carrera ORDER BY nombre_carrera DESC";
		$c = query($sql);
		//echo $sql;
		$datos["count"] = contar($c);
		if($datos["count"] > 0){
			while ($r = result_query($c)) {
				$datos["carreras"][] = [
				"idCarrera"=>$r->idCarrera,
				"nombre_carrera"=>$r->nombre_carrera
			]; 
			}
		}
		return $datos;
	}

	/*function mostrar_carrerasPage($page){
		$sql = "SELECT * FROM carrera LIMIT '$page'";
		$c = query($sql);
		//echo $sql;
		$datos["count"] = contar($c);
		if($datos["count"] > 0){
			while ($r = result_query($c)) {
				$datos["carreras"][] = [
				"idCarrera"=>$r->idCarrera,
				"nombre_carrera"=>$r->nombre_carrera
			]; 
			}
		}
		return $datos;
	}*/


	function nueva_carrera($nombre_carrera){
		$sql = "INSERT carrera VALUES (null,'$nombre_carrera')";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function editar_carrera($f,$nombre_carrera){
		$sql = "UPDATE carrera SET 
		nombre_carrera = '$nombre_carrera'";
		$sql .= " WHERE idCarrera = '$f'";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function eliminar_carrera($idCarrera){
		$sql = "DELETE FROM carrera WHERE idCarrera = '$idCarrera'";
		$c = query($sql);
		if($c)
			return 0;
		return 1;
	}