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
		$a=$_POST['slcm'];
		$b=$_POST['nmar'];
		$c=$_POST['rsar'];
		$d=$_POST['xxar'];
		$hoy=date("Y-m-d");
		if ($a=="0" || $a=="" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id columnista o titulo en blanco');";
				echo "var pagina='articulo.php';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$ingresar="INSERT into articulos(co_id,tit_ar,res_ar,txt_ar,fe_ar) 
				values($a,'$b','$c','$d','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('articulo ingresado');";
				echo "var pagina='articulo.php';";
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