<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/alumno.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];
	
	$datos = [];

	switch ($accion) {
		case 'nuevo':
			permiso($token,1);
			$datos["error"] = nuevo_alumno(
				$_POST["no_de_control"],
				$_POST["nip"],
				$_POST["nombre_alumno"],
				$_POST["apPaterno"],
				$_POST["apMaterno"],
				$_POST["residencia"],
				$_POST["asesorinterno"],
				$_POST["carrera"]
			);
		break;

		
		case 'editar':
			permiso($token,1);
			$datos["error"] = editar_alumno(
				$_POST["f"],
				$_POST["no_de_control"],
				$_POST["nip"],
				$_POST["nombre_alumno"],
				$_POST["apPaterno"],
				$_POST["apMaterno"],
				$_POST["residencia"],
				$_POST["asesorinterno"],
				$_POST["carrera"]
			);
		break;

		case 'eliminar':
			permiso($token,1);
			$datos["error"] = eliminar_alumno($_POST["no_de_control"]);
		break;
/*
		case "agregar-autor":
			permiso($token,1);
			$datos = agregar_autor($_POST["autor"],$_POST["folio"]);
		break;
		*/
		case 'mostrar':
			permiso($token,1);
			$datos = mostrar_alumnos();

		break;
		
		default:
			$datos["error"]	= 1;
			$datos["m"] = "La accion no existe";
		break;
	}
	//var_dump($datos);
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);