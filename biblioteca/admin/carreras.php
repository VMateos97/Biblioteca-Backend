<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/carrera.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];
	
	$datos = [];

	switch ($accion) {
		case 'nuevo':
			permiso($token,1);
			$datos["error"] = nueva_carrera(
				$_POST["nombre_carrera"]
			);
		break;

		case 'editar':
			permiso($token,1);
			$datos["error"] = editar_carrera(
				$_POST["f"],
				$_POST["nombre_carrera"]
			);
		break;

		case 'eliminar':
			permiso($token,1);
			$datos["error"] = eliminar_carrera($_POST["idCarrera"]);
		break;
		
		case 'mostrar':
			permiso($token,1);
			$datos = mostrar_carreras();

		break;
		/*case 'mostrarPage':
			permiso($token,1);
			$datos = mostrar_carrerasPage($_POST["page"]);

		break;
		*/
		default:
			$datos["error"]	= 1;
			$datos["m"] = "La accion no existe";
		break;
	}
	//var_dump($datos);
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);