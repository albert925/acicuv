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
				echo "alert('id de imagen no disponble');";
				echo "var pagina='../galery';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$tomarrut="SELECT * from galeria where id_gal=$idR";
			$sql_rut=mysql_query($tomarrut,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_rut)) {
				$rutbot=$tr['rut_gal'];
			}
			unlink("../../../".$rutbot);
			$borrar="DELETE from galeria where id_gal=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('imagen borrado');";
				echo "var pagina='../galery';";
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