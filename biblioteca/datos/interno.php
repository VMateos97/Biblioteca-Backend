<?php

	function mostrar_internos(){
		$sql = "SELECT * FROM asesor_interno ORDER BY nombre_asesor_interno DESC";
		$c = query($sql);
		$datos["count"] = contar($c);
		if($datos["count"] > 0){
			while ($r = result_query($c)) {
				$datos["internos"][] = [
				"idAsesorInterno"=>$r->idAsesorInterno,
				"nombre_asesor_interno"=>$r->nombre_asesor_interno,
				"puesto_asesor_interno"=>$r->puesto_asesor_interno,
				"correo"=>$r->correo
			]; 
			}
		}else{
			echo "no se pudo mostrar";
		}

		return $datos;
	}

	function nuevo_interno($nombre_asesor_interno,$puesto_asesor_interno,$correo){
		$sql = "INSERT asesor_interno VALUES (null,'$nombre_asesor_interno','$puesto_asesor_interno','$correo')";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function editar_interno($f,$nombre_asesor_interno,$puesto_asesor_interno,$correo){
		$sql = "UPDATE asesor_interno SET 
		nombre_asesor_interno = '$nombre_asesor_interno',
		puesto_asesor_interno = '$puesto_asesor_interno',
		correo = '$correo'";
		$sql .= " WHERE idAsesorInterno = '$f'";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function eliminar_interno($idAsesorInterno){
		$sql = "DELETE FROM asesor_interno WHERE idAsesorInterno = '$idAsesorInterno'";
		$c = query($sql);
		if($c)
			return 0;
		return 1;
	}