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
		$a=$_POST['nmcla'];
		$b=$_POST['xxcla'];
		$hoy=date("Y-m-d");
		if ($a=="") {
			echo "<script type='text/javascript'>";
				echo "alert('titulo en blanco');";
				echo "var pagina='../clasificados';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$ingresar="INSERT into clasificados(tit_cla,txt_cla,fe_cla) 
				values('$a','$b','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('clasificado ingresado');";
				echo "var pagina='../clasificados';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>