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
		$idR=$_POST['ida'];
		$a=$_POST['ttde'];
		$b=$_POST['rsde'];
		$c=$_POST['xxtde'];
		$d=$_POST['selestado'];
		if ($idR=="" || $d=="0" || $d=="") {
			echo "<script type='text/javascript'>";
				echo "alerrt('id de denunia no disponble');";
				echo "var pagina='../denuncia';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$modificar="UPDATE denuncia set tit_dn='$a',res_dn='$b',txt_dn='$c',es_dn='$d' where id_dn=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Denuncia modificada');";
				echo "var pagina='modifcdenuncia.php?dt=$idR';";
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