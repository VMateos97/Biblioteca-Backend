<?php

	function mostrar_dependencias(){
		$sql = "SELECT * FROM dependencia ORDER BY nombre_dependencia ASC";
		$c = query($sql);
		//echo $sql;
		$datos["count"] = contar($c);
		if($datos["count"] > 0){
			while ($r = result_query($c)) {
				$datos["dependencias"][] = [
				"rfc_dependencia"=>$r->rfc_dependencia,
				"nombre_dependencia"=>$r->nombre_dependencia,
				"domicilio_dependencia"=>$r->domicilio_dependencia,
				"colonia_dependencia"=>$r->colonia_dependencia,
				"cp_dependencia"=>$r->cp_dependencia,
				"fax_dependencia"=>$r->fax_dependencia,
				"ciudad_dependencia"=>$r->ciudad_dependencia,
				"tel_dependencia"=>$r->tel_dependencia,
				"mision"=>$r->mision,
				"giro"=>$r->giro,
				"titular_dependencia"=>$r->titular_dependencia,
				"puesto_titular"=>$r->puesto_titular
			]; 
			}
		}
		return $datos;
	}

	function nueva_dependencia($rfc_dependencia,$nombre_dependencia,$domicilio_dependencia,$colonia_dependencia,$cp_dependencia,$fax_dependencia,$ciudad_dependencia,$tel_dependencia,$mision,$giro,$titular_dependencia,$puesto_titular){
		$sql = "INSERT dependencia VALUES ('$rfc_dependencia','$nombre_dependencia','$domicilio_dependencia','$colonia_dependencia','$cp_dependencia','$fax_dependencia','$ciudad_dependencia','$tel_dependencia','$mision','$giro','$titular_dependencia','$puesto_titular')";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function editar_dependencia($rfc_dependencia,$nombre_dependencia,$domicilio_dependencia,$colonia_dependencia,$cp_dependencia,$fax_dependencia,$ciudad_dependencia,$tel_dependencia,$mision,$giro,$titular_dependencia,$puesto_titular){
		$sql = "UPDATE dependencia SET 
		nombre_dependencia = '$nombre_dependencia',
		domicilio_dependencia = '$domicilio_dependencia',
		colonia_dependencia = '$colonia_dependencia',
		cp_dependencia = '$cp_dependencia',
		fax_dependencia = '$fax_dependencia',
		ciudad_dependencia = '$ciudad_dependencia',
		tel_dependencia = '$tel_dependencia',
		mision = '$mision',
		giro = '$giro',
		titular_dependencia = '$titular_dependencia',
		puesto_titular = '$puesto_titular'";
		$sql .= " WHERE rfc_dependencia = '$rfc_dependencia'";
		$c = query($sql);
		//echo $sql;
		if($c){
			return 0;
		}
		return 1;
	}

	function eliminar_dependencia($rfc_dependencia){
		$sql = "DELETE FROM dependencia WHERE rfc_dependencia = '$rfc_dependencia'";
		$c = query($sql);
		if($c)
			return 0;
		return 1;
	}