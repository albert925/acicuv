<?php
	include '../../config.php';
	$idR=$_POST['fb'];//id
	$a=$_POST['a'];//pass actual
	$b=$_POST['b'];//pass nuevo
	function cifrarpass($pass)
	{
		$salt="pneyan$/";
		$cifrar=sha1(md5($salt.$pass));
		return $cifrar;
	}
	if ($idR=="" || $a=="" || $b=="") {
		echo "1";
	}
	else{
		$passAC=cifrarpass($a);
		$passNV=cifrarpass($b);
		$existe="SELECT * from administrador where id_adm=$idR and pass_adm='$passAC'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			$modificar="UPDATE administrador set pass_adm='$passNV' where id_adm=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>