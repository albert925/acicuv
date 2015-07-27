<?php
	include '../../../config.php';
	$idR=$_POST['fad'];
	$a=$_POST['a'];
	if ($idR=="" || $a=="0" || $a=="") {
		echo "1";
	}
	else{
		$cambiar="UPDATE denuncia set es_dn='$a' where id_dn=$idR";
		mysql_query($cambiar,$conexion) or die (mysql_error());
		echo "2";
	}
?>