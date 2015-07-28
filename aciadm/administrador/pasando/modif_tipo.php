<?php
	include '../../../config.php';
	$idR=$_POST['fa'];
	$a=$_POST['a'];
	if ($idR=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE tp_ps set nam_tp='$a' where id_tp=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>