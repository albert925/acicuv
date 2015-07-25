<?php
	include '../config.php';
	$a=$_POST['a'];//usuario
	$b=$_POST['b'];//contraseña
	function cifrarpass($pass)
	{
		$salt="pneyan$/";
		$cifrar=sha1(md5($salt.$pass));
		return $cifrar;
	}
	if ($a=="" || $b=="") {
		echo "1";
	}
	else{
		$passc=cifrarpass($b);
		$existe="SELECT * from administrador where user_adm='$a' and pass_adm='$passc'";
		$sqlex=mysql_query($existe,$conexion) or die (mysql_error());
		$numex=mysql_num_rows($sqlex);
		if ($numex>0) {
			while ($ad=mysql_fetch_array($sqlex)) {
				$idad=$ad['id_adm'];
			}
			session_start();
			$_SESSION['adm']=$idad;
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>