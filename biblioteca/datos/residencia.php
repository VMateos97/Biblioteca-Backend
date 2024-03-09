<?php
	function mostrar_residencia($w = 1){
		$sql = "SELECT * FROM residencia,dependencia,periodo WHERE dependencia = rfc_dependencia AND periodo = idPeriodo AND $w";
		//echo "$sql";
		$c = query($sql);
		$datos  = array();//$datos = [];
		$datos["count"] = contar($c);
		while($r = result_query($c)){
			$datos["residencias"][] = [
				"idResidencia"=>$r->idResidencia,
				"titulo"=>$r->titulo,
				"fecha_de_entrega"=>$r->fecha_de_entrega,
				"caratula"=>$r->caratula,
				"num_residentes"=>$r->num_residentes,
				"archivo"=>$r->archivo,
				"dependencia"=>["rfc_dependencia"=>$r->rfc_dependencia,"nombre_dependencia"=>$r->nombre_dependencia],
				"periodo"=>["idPeriodo"=>$r->idPeriodo,"nombre_periodo"=>$r->nombre_periodo]
			]; 
		}
		return $datos;
	}


	function nueva_residencia($titulo,$fecha_de_entrega,$caratula,$num_residentes,$archivo,$dependencia,$periodo){
		$sql = "INSERT residencia VALUES (null,'$titulo','$fecha_de_entrega','$caratula','$num_residentes','$archivo','$dependencia','$periodo')";
		$c = query($sql);
		//echo "$sql";
		if($c){
			return 0;
		}
		return 1;
	}


	function editar_residencia($f,$idResidencia,$titulo,$fecha_de_entrega,$caratula,$num_residentes,$archivo,$dependencia,$periodo){
		$sql = "UPDATE residencia SET 
		titulo = '$titulo',
		fecha_de_entrega = '$fecha_de_entrega',
		num_residentes = '$num_residentes',
		dependencia = '$dependencia',
		periodo = '$periodo'";
		if (!empty($caratula)) {
			$sql .= ", caratula = '$caratula'";
		}
		if (!empty($archivo)) {
			$sql .= ", archivo = '$archivo'";
		}
		$sql .= " WHERE idResidencia = '$f'";
		$c = query($sql);
		//echo $sql;
		if($c){
			
			return 0;
		}
		return 1;
	}


	function eliminar_residencia($idResidencia){
		$sql = "DELETE FROM residencia WHERE idResidencia = '$idResidencia'";
		$c = query($sql);
		if($c)
			return 0;
		return 1;
	}


/*	
	function agregar_autor($ida,$folio){
		$sql = "SELECT * FROM escribe WHERE autor = $ida AND libro = '$folio'";
		$c = query($sql);
		if(contar($c) > 0)
			return ["error"=>1,"m"=>"El autor ya se encuentra registrado"];
		$sql = "INSERT escribe VALUES ('$ida','$folio')";
		
		if(query($sql))
			return ["error"=>0,"m"=>"autor agregado"];

		return ["error"=>1,"m"=>"Error al agregar el autor"];
	}

*/


	function buscar_residencias(){
		$sql = "SELECT * FROM residencia,periodo,dependencia WHERE periodo = idPeriodo AND dependencia = rfc_dependencia";
		$c = query($sql);
		$datos  = array();//$datos = [];
		$datos["count"] = contar($c);
		while($r = result_query($c)){
			$datos["residencias"][] = [
				"idResidencia"=>$r->idResidencia,
				"titulo"=>$r->titulo,
				"fecha_de_entrega"=>$r->fecha_de_entrega,
				"caratula"=>$r->caratula,
				"num_residentes"=>$r->num_residentes,
				"archivo"=>$r->archivo,
				"dependencia"=>["rfc_dependencia"=>$r->rfc_dependencia,"nombre_dependencia"=>$r->nombre_dependencia],
				"periodo"=>["idPeriodo"=>$r->idPeriodo,"nombre_periodo"=>$r->nombre_periodo]
			]; 
		}

		return $datos;
	}
