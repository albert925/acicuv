<?php
	include '../../../config.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$idrsead=$_SESSION['adm'];
		$admins="SELECT * from administrador where id_adm=$idrsead";
		$sql_adm=mysql_query($admins,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_adm)) {
			$idad=$ad['id_adm'];
			$usad=$ad['user_adm'];
			$tpad=$ad['tp_adm'];
		}
		$a=$_POST['ttde'];
		$b=$_POST['rsde'];
		$c=$_POST['xxtde'];
		$hoy=date("Y-m-d");
		if ($a=="" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alert('titulo o resumen en blanco');";
				echo "var pagina='../denuncia';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$ingresar="INSERT into denuncia(tit_dn,res_dn,txt_dn,fe_dn,es_dn) 
				values('$a','$b','$c','$hoy','1')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Denuncia ingresada');";
				echo "var pagina='../denuncia';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>