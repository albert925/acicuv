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
		$idR=$_POST['idb'];
		$a=$_POST['slcm'];
		$b=$_POST['nmar'];
		$c=$_POST['rsar'];
		$d=$_POST['xxar'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id articulo no disponible');";
				echo "var pagina='articulo.php';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$modificar="UPDATE articulos set co_id=$a,tit_ar='$b',res_ar='$c',txt_ar='$d' where id_ar=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('articulo modificado');";
				echo "var pagina='modifarticulo.php?dt=$idR';";
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