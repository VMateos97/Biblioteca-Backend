<?php
	
	function conexion(){
		@$conex = mysqli_connect(HOST,USER,PASSWORD,BD);
		if(!$conex){
			echo "Error de conexion";
			exit();
		}
		return $conex;
	}

	function query($sql){
		$conex = conexion();
		$c = mysqli_query($conex,$sql);
		/*if(!$c){
			echo "Error al ejecutar la consulta";
			exit();
		}*/
		mysqli_close($conex);
		return $c; 
	}

	function result_query($query){
		return mysqli_fetch_object($query);//obtiene el resultado de la consulta a traves de objetos
	}

	function contar($query){
		return mysqli_num_rows($query);
	}