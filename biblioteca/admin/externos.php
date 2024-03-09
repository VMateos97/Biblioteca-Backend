<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/externo.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];
	
	$datos = [];

	switch ($accion) {
		case 'nuevo':
			permiso($token,1);
			$datos["error"] = nuevo_externo(
				$_POST["nombre_asesor_externo"],
				$_POST["puesto_asesor_externo"],
				$_POST["correo"],
				$_POST["dependencia"]
			);
		break;

		
		case 'editar':
			permiso($token,1);
			$datos["error"] = editar_externo(
				$_POST["f"],
				$_POST["nombre_asesor_externo"],
				$_POST["puesto_asesor_externo"],
				$_POST["correo"],
				$_POST["dependencia"]
			);
		break;

		case 'eliminar':
			permiso($token,1);
			$datos["error"] = eliminar_externo($_POST["idAsesorExterno"]);
		break;

		case 'mostrar':
			permiso($token,1);
			$datos = mostrar_externos();

		break;
		
		default:
			$datos["error"]	= 1;
			$datos["m"] = "La accion no existe";
		break;
	}
	//var_dump($datos);
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);