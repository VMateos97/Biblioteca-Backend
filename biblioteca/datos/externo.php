<?php

	function mostrar_externos($w = 1){
		$sql = "SELECT * FROM asesor_externo,dependencia WHERE dependencia = rfc_dependencia AND $w";
		$c = query($sql);
		$datos["count"] = contar($c);
		if($datos["count"] > 0){
			while ($r = result_query($c)) {
				$datos["externos"][] = [
				"idAsesorExterno"=>$r->idAsesorExterno,
				"nombre_asesor_externo"=>$r->nombre_asesor_externo,
				"puesto_asesor_externo"=>$r->puesto_asesor_externo,
				"correo"=>$r->correo,
				"dependencia"=>["rfc_dependencia"=>$r->rfc_dependencia,"nombre_dependencia"=>$r->nombre_dependencia]
			]; 
			}
		}else{
			echo "no se pudo mostrar";
		}
		return $datos;
	}

	function nuevo_externo($nombre_asesor_externo,$puesto_asesor_externo,$correo,$dependencia){
		$sql = "INSERT asesor_externo VALUES (null,'$nombre_asesor_externo','$puesto_asesor_externo','$correo','$dependencia')";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function editar_externo($f,$nombre_asesor_externo,$puesto_asesor_externo,$correo,$dependencia){
		$sql = "UPDATE asesor_externo SET 
		nombre_asesor_externo = '$nombre_asesor_externo',
		puesto_asesor_externo = '$puesto_asesor_externo',
		correo = '$correo',
		dependencia = '$dependencia'";
		$sql .= " WHERE idAsesorExterno = '$f'";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function eliminar_externo($idAsesorExterno){
		$sql = "DELETE FROM asesor_externo WHERE idAsesorExterno = '$idAsesorExterno'";
		$c = query($sql);
		if($c)
			return 0;
		return 1;
	}