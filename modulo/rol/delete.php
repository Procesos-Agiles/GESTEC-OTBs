<?php

	include_once("../../class/dbmanager.class.php");
	$db = ManagerBDPostgres::getInstanceBDPostgres();
	
	$id     = $_GET['id'];
	$estado = $_GET['est'];
	$accion = '';
	
	if ($estado > 0) {
		$accion = 'A';
	} else {
		$accion = 'I';
	}
	$sqlRol = $db->executeQuerySQL("UPDATE rol SET vch_rolestado = '$accion' WHERE pk_rol = '$id';");
	header("location: index.php");

?>