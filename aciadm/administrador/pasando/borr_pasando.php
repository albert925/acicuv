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
		$idR=$_GET['br'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id pasando no disponible');";
				echo "var pagina='../pasando';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$obruta="SELECT * from pasando where id_ps=$idR";
			$sql_ruta=mysql_query($obruta,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_ruta)) {
				$rutdel=$tr['rut_ps'];
			}
			if ($rutdel!="") {
				unlink("../../../".$rutdel);
			}
			$borrar="DELETE from pasando where id_ps=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('borrado');";
				echo "var pagina='../pasando';";
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