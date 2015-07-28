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
		$idR=$_POST['idsbb'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id sitio no disponible');";
				echo "var pagina='../sitios';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$a=$_POST['ttst'];
			$b=$_POST['lkst'];
			$c=$_POST['xxttst'];
			$modificar="UPDATE sitios set nam_st='$a',txt_ts='$c',lk_st='$b' where id_st=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('datos modificado');";
				echo "var pagina='modifsitios.php?dt=$idR';";
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