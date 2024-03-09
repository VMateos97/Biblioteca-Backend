<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/periodo.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];
	
	$datos = [];

	switch ($accion) {
		case 'nuevo':
			permiso($token,1);
			$datos["error"] = nuevo_periodo(
				$_POST["nombre_periodo"]
			);
		break;

		
		case 'editar':
			permiso($token,1);
			$datos["error"] = editar_periodo(
				$_POST["f"],
				$_POST["nombre_periodo"]
			);
		break;

		case 'eliminar':
			permiso($token,1);
			$datos["error"] = eliminar_periodo($_POST["idPeriodo"]);
		break;
/*
		case "agregar-autor":
			permiso($token,1);
			$datos = agregar_autor($_POST["autor"],$_POST["folio"]);
		break;
		*/
		case 'mostrar':
			permiso($token,1);
			$datos = mostrar_periodos();

		break;
		
		default:
			$datos["error"]	= 1;
			$datos["m"] = "La accion no existe";
		break;
	}
	//var_dump($datos);
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);