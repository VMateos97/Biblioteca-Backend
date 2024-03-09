<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/interno.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];
	
	$datos = [];

	switch ($accion) {
		case 'nuevo':
			permiso($token,1);
			$datos["error"] = nuevo_interno(
				$_POST["nombre_asesor_interno"],
				$_POST["puesto_asesor_interno"],
				$_POST["correo"]
			);
		break;

		
		case 'editar':
			permiso($token,1);
			$datos["error"] = editar_interno(
				$_POST["f"],
				$_POST["nombre_asesor_interno"],
				$_POST["puesto_asesor_interno"],
				$_POST["correo"]
			);
		break;

		case 'eliminar':
			permiso($token,1);
			$datos["error"] = eliminar_interno($_POST["idAsesorInterno"]);
		break;

		case 'mostrar':
			permiso($token,1);
			$datos = mostrar_internos();

		break;
		
		default:
			$datos["error"]	= 1;
			$datos["m"] = "La accion no existe";
		break;
	}
	//var_dump($datos);
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);