<?php
	//echo password_hash("123456",PASSWORD_DEFAULT);
	include_once("utilerias/config.php");
	
	if(!empty($_POST)){
		$usuario = trim($_POST["usuario"]);
		$pass = trim($_POST["password"]);

		$sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
		$datos = [];
		$c = query($sql);
		if( contar($c) > 0){
			$r = result_query($c);
			if(password_verify($pass, $r->password)){
				$token = password_hash($r->id, PASSWORD_DEFAULT);
				$sql = "UPDATE usuario SET token = '$token' WHERE id = $r->id";
				query($sql);
				$datos = [
					"encontrado"=>"si",
					"datos"=>[
						"usuario"=>$r->usuario,
						"token"=>$token,
						"tipo"=>$r->status
					],
					"m"=>"",
					"error"=>0
				];
			}else
				$datos = [
					"encontrado"=>"si",
					"m"=>"Contraseña invalida",
					"error"=>1
				];
		}else
			$datos = [
					"encontrado"=>"no",
					"m"=>"Usuario no encontrado",
					"error"=>1,
			];

	}else
		$datos = [
			"error"=>1,
			"m"=>"Sin acceso 403",
		];

	echo json_encode($datos);