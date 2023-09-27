<?php
	require_once "../../config/config.php";
	require_once "../../core/routes.php";
	require_once "../../config/database.php";
	require_once "../../controllers/articulos.php";
	
	if(isset($_POST['controlador'])){
		
		$controlador = cargarControlador($_POST['controlador']);
		
		if(isset($_POST['accion'])){
			if(isset($_POST['id'])){
				cargarAccion($controlador, $_POST['accion'], $_POST['id']);
				} else {
				cargarAccion($controlador, $_POST['accion']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
		
		} else {
		
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}
?>