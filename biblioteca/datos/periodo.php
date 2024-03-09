<?php

	function mostrar_periodos(){
		$sql = "SELECT * FROM periodo ORDER BY nombre_periodo DESC";
		$c = query($sql);
		//echo $sql;
		$datos["count"] = contar($c);
		if($datos["count"] > 0){
			while ($r = result_query($c)) {
				$datos["periodos"][] = [
				"idPeriodo"=>$r->idPeriodo,
				"nombre_periodo"=>$r->nombre_periodo
			]; 
			}
		}
		return $datos;
	}

	function nuevo_periodo($nombre_periodo){
		$sql = "INSERT periodo VALUES (null,'$nombre_periodo')";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function editar_periodo($f,$nombre_periodo){
		$sql = "UPDATE periodo SET 
		nombre_periodo = '$nombre_periodo'";
		$sql .= " WHERE idPeriodo = '$f'";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function eliminar_periodo($idPeriodo){
		$sql = "DELETE FROM periodo WHERE idPeriodo = '$idPeriodo'";
		$c = query($sql);
		if($c)
			return 0;
		return 1;
	}