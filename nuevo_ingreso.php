<?php
	include "class/dbmanager.class.php";
	
	$db = ManagerBDPostgres::getInstanceBDPostgres();
	
	if(isset($_POST["enviar"]))
	{
		$pk_Gestion   = $_POST["gestion"];
		$pk_Vesino    = $_POST["usuario"];
		$montoAporte  = $_POST["monto"];
		$descrip      = $_POST["descrip"];
		$pk_ConceptoIE= $_POST["actividad"];
		$fechaIngreso = date("Y-m-d");
		$tipoMovimiento     = "I"; //I -> Ingreso
		
		$sql = $db->executeQuerySQL("INSERT INTO movimiento VALUES(default, $pk_Gestion, $pk_Vesino, '$fechaIngreso', $montoAporte, '$descrip', '$pk_ConceptoIE', '$tipoMovimiento')");
		echo"<script type=\"text/javascript\">alert('Los datos fueron registrados correctamente'); window.location='registrar_ingreso.php';</script>";  
	}
?>