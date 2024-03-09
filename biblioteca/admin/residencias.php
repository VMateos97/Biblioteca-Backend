<?php
	include_once("../utilerias/config.php");
	include_once(RUTA."datos/residencia.php");
	@$token = $_REQUEST["token"];
	@$accion = $_REQUEST["accion"];
	
	$datos = [];

	switch ($accion) {
		case 'nuevo':
			permiso($token,1);
			@$img = $_FILES["caratula"]["name"];
			if(!empty($img)){
				$img = $_POST["titulo"].$img;
				$ruta = UPLOAD.$img;
				if(!upload("caratula",$ruta))
					$img = "";
			}
			@$pdf = $_FILES["archivo"]["name"];
			if(!empty($pdf)){
				$pdf = $_POST["titulo"].$pdf;
				$ruta = UPLOAD.$pdf;
				if(!upload("archivo",$ruta))
					$pdf = "";
			}
			$datos["error"] = nueva_residencia(
				$_POST["titulo"],
				$_POST["fecha_de_entrega"],
				$img,
				$_POST["num_residentes"],
				$pdf,
				$_POST["dependencia"],
				$_POST["periodo"]
			);
		break;

		
		case 'editar':
			permiso($token,1);
			@$img = $_FILES["caratula"]["name"];
			if(!empty($img)){
				$img = $_POST["titulo"].$img;
				$ruta = UPLOAD.$img;
				if(!upload("caratula",$ruta))
					$img = "";
			}
			@$pdf = $_FILES["archivo"]["name"];
			if(!empty($pdf)){
				$pdf = $_POST["titulo"].$pdf;
				$ruta = UPLOAD.$pdf;
				if(!upload("archivo",$ruta))
					$pdf = "";
			}
			$datos["error"] = editar_residencia(
				$_POST["f"],
				$_POST["titulo"],
				$_POST["fecha_de_entrega"],
				$caratula,
				$_POST["num_residentes"],
				$pdf,
				$_POST["dependencia"],
				$_POST["periodo"]
			);
		break;

		case 'eliminar':
			permiso($token,1);
			$datos["error"] = eliminar_residencia($_POST["idResidencia"]);
		break;
/*
		case "agregar-autor":
			permiso($token,1);
			$datos = agregar_autor($_POST["autor"],$_POST["folio"]);
		break;
		*/
		case 'mostrar':
			permiso($token,1);
			$datos = mostrar_residencia();

		break;
		
		default:
			$datos["error"]	= 1;
			$datos["m"] = "La accion no existe";
		break;
	}
	//var_dump($datos);
	echo json_encode($datos, JSON_UNESCAPED_UNICODE);