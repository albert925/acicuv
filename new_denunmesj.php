<?php
	include 'config.php';
	$a=$_POST['a'];//nombres
	$b=$_POST['b'];//correo
	$c=$_POST['c'];//asunto
	$d=$_POST['d'];//mensaje
	$hoy=date("Y-m-d");
	if ($a=="" || $b=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into denuncia(tit_dn,user_dn,cor_dn,txt_dn,fe_dn,es_dn) 
			values('$c','$a','$b','$d','$hoy','2')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
	}
?>