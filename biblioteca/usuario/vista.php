<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/residencia.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];

	switch ($accion) {
		case 'buscar_residencias':
			$buscar = trim($_POST["buscar"]);
			$where = "(titulo LIKE '%$buscar%' OR nombre_dependencia LIKE '%$buscar%' OR nombre_periodo LIKE '%$buscar%')";
			permiso($token,0);
			$datos = mostrar_residencia($where);	
		break;
		
		default:
			# code...
			break;
	}

	echo json_encode($datos);