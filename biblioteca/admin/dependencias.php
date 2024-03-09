<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/dependencia.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];
	
	$datos = [];

	switch ($accion) {
		case 'nuevo':
			permiso($token,1);
			$datos["error"] = nueva_dependencia(
				$_POST["rfc_dependencia"],
				$_POST["nombre_dependencia"],
				$_POST["domicilio_dependencia"],
				$_POST["colonia_dependencia"],
				$_POST["cp_dependencia"],
				$_POST["fax_dependencia"],
				$_POST["ciudad_dependencia"],
				$_POST["tel_dependencia"],
				$_POST["mision"],
				$_POST["giro"],
				$_POST["titular_dependencia"],
				$_POST["puesto_titular"]
			);
		break;

		
		case 'editar':
			permiso($token,1);
			$datos["error"] = editar_dependencia(
				$_POST["rfc_dependencia"],
				$_POST["nombre_dependencia"],
				$_POST["domicilio_dependencia"],
				$_POST["colonia_dependencia"],
				$_POST["cp_dependencia"],
				$_POST["fax_dependencia"],
				$_POST["ciudad_dependencia"],
				$_POST["tel_dependencia"],
				$_POST["mision"],
				$_POST["giro"],
				$_POST["titular_dependencia"],
				$_POST["puesto_titular"]
			);
		break;

		case 'eliminar':
			permiso($token,1);
			$datos["error"] = eliminar_dependencia($_POST["rfc_dependencia"]);
		break;
/*
		case "agregar-autor":
			permiso($token,1);
			$datos = agregar_autor($_POST["autor"],$_POST["folio"]);
		break;
		*/
		case 'mostrar':
			permiso($token,1);
			$datos = mostrar_dependencias();

		break;
		
		default:
			$datos["error"]	= 1;
			$datos["m"] = "La accion no existe";
		break;
	}
	//var_dump($datos);
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);