<?php
	function permiso($token,$tipo_us = 1){
		$sql = "SELECT status FROM usuario WHERE token = '$token'";
		$c = query($sql);
		$datos = [];
		if(contar($c) == 0){
			$datos["error"] =1;
			$datos["m"] = "Token no correspondiente";
		}else{
			$r = result_query($c);
			if($r->status != $tipo_us){
				$datos["error"] =1;
				$datos["m"] = "No tienes permiso para realizar la accion";
			}
		}

		if(count($datos) > 0){
			echo json_encode($datos);
			exit();
		}
	}

	function upload($file,$ruta){
		if(move_uploaded_file($_FILES[$file]['tmp_name'], $ruta))
			return true;
		else
			return false;
	}