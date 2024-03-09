<?php
	function mostrar_alumnos($w = 1){
		$sql = "SELECT * FROM alumno,residencia,asesor_interno,carrera WHERE residencia = idResidencia AND asesorinterno = idAsesorInterno AND carrera = idCarrera AND $w";
		//echo "$sql";
		$c = query($sql);
		$datos  = array();//$datos = [];
		$datos["count"] = contar($c);
		while($r = result_query($c)){
			$datos["alumnos"][] = [
				"no_de_control"=>$r->no_de_control,
				"nip"=>$r->nip,
				"nombre_alumno"=>$r->nombre_alumno,
				"apPaterno"=>$r->apPaterno,
				"apMaterno"=>$r->apMaterno,
				"residencia"=>["idResidencia"=>$r->idResidencia,"titulo"=>$r->titulo],
				"asesorinterno"=>["idAsesorInterno"=>$r->idAsesorInterno,"nombre_asesor_interno"=>$r->nombre_asesor_interno],
				"carrera"=>["idCarrera"=>$r->idCarrera,"nombre_carrera"=>$r->nombre_carrera]
			]; 
		}
		return $datos;
	}


	function nuevo_alumno($no_de_control,$nip,$nombre_alumno,$apPaterno,$apMaterno,$residencia,$asesorinterno,$carrera){
		$sql = "INSERT alumno VALUES ('$no_de_control','$nip','$nombre_alumno','$apPaterno','$apMaterno','$residencia','$asesorinterno','$carrera')";
		$c = query($sql);
		//echo "$sql";
		if($c){
			return 0;
		}
		return 1;
	}


	function editar_alumno($f,$no_de_control,$nip,$nombre_alumno,$apPaterno,$apMaterno,$residencia,$asesorinterno,$carrera){
		$sql = "UPDATE alumno SET 
		no_de_control = '$no_de_control',
		nip = '$nip',
		nombre_alumno = '$nombre_alumno',
		apPaterno = '$apPaterno',
		apMaterno = '$apMaterno',
		residencia = '$residencia',
		asesorinterno = '$asesorinterno',
		carrera = '$carrera'";
		$sql .= " WHERE no_de_control = '$f'";
		$c = query($sql);
		//echo $sql;
		if($c){
			
			return 0;
		}
		return 1;
	}


	function eliminar_alumno($no_de_control){
		$sql = "DELETE FROM alumno WHERE no_de_control = '$no_de_control'";
		$c = query($sql);
		if($c)
			return 0;
		return 1;
	}
