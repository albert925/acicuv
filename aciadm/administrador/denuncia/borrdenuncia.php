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
		$arrestad=["selecione","Activado","Desactivado"];
		$idR=$_GET['br'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id de denuncia');";
				echo "var pagina='../denuncia';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from denuncia where id_dn=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('denuncia borrada');";
				echo "var pagina='../denuncia';";
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