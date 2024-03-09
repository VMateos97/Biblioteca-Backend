<?php
	//config de conexion al servidor de MySQL
	define("HOST","localhost");
	define("USER","root");
	define("PASSWORD","");
	define("BD","virtuallibrary");
	define("RUTA",$_SERVER['DOCUMENT_ROOT']."/biblioteca/");
	define("UPLOAD",RUTA . "upload/");
	//cargando utilerias
	include_once( RUTA . "utilerias/conexion.php" );
	include_once( RUTA . "utilerias/funciones.php" );



	//CORS
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");

	header('Content-Type: application/json');