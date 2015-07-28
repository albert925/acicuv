<?php
	include 'config.php';
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
		$a=$_POST['ttpas'];
		$b=$_POST['sltp'];
		$c=$_POST['xxpas'];
		$hoy=date("Y-m-d");
		//-------------------------------------------
		$fotAcosmodT=$_FILES['igpas']['name'];
		$tipfotA=$_FILES['igpas']['type'];
	 	$almfotA=$_FILES['igpas']['tmp_name'];
	 	$tamfotA=$_FILES['igpas']['size'];
	 	$erorfotA=$_FILES['igpas']['error'];
		//----------------------------------------
		if ($a=="" || $b=="0" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alertr('nombre o titulo en blanco');";
				echo "var pagina='aciadm/administrador/pasando/';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($fotAcosmodT=="") {
				$ingresar="INSERT into pasando(tp_id,tit_ps,txt_ps,fe_ps) values($b,'$a','$c','$hoy')";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alertr('ndato ingresado');";
					echo "var pagina='aciadm/administrador/pasando/';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				if ($erorfotA>0) {
					echo "<script type='text/javascript'>";
						echo "alert('Carpeta sin permisos o resolucion maxima no permitida');";
						echo "var pagina='aciadm/administrador/pasando/';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
				else{
					$maAximo = 100204000;
					if ($tamfotA<=$maAximo*1024) {
						$ruta="imagenes/pasando/".$fotAcosmodT;
						if (file_exists($ruta)) {
							echo "Una imagen tiene el mismo nombre";
							echo "<script type='text/javascript'>";
								echo "alert('Una imagen tiene el mismo nombre');";
								echo "var pagina='aciadm/administrador/pasando/';";
								echo "document.location.href=pagina;";
							echo "</script>";
						}
						else{
							$size=getimagesize($almfotA);
							$anchoimagen=$size[0];
							$altoimagen=$size[1];
							$anchodetermindo=1200;
							$altodeterminad=1080;
							if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
								echo "Resolucion de imagen no permitida debe ser 1200 x 1080";
								echo "<script type='text/javascript'>";
									echo "alert('Resolucion de imagen no permitida');";
									echo "var pagina='aciadm/administrador/pasando/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
							else{
								$subiendo=@move_uploaded_file($almfotA, $ruta);
								if ($subiendo) {
									$ddf="INSERT into pasando(tp_id,tit_ps,txt_ps,rut_ps,fe_ps) 
										values($b,'$a','$c','$ruta','$hoy')";
									mysql_query($ddf,$conexion) or die (mysql_error());
									echo "<script type='text/javascript'>";
										echo "alert('Dato ingresado');";
										echo "var pagina='aciadm/administrador/pasando/';";
										echo "document.location.href=pagina;";
									echo "</script>";
								}
								else{
									echo "<script type='text/javascript'>";
										echo "alert('Carpeta sin permisos o resolucion maxima no permitida');";
										echo "var pagina='aciadm/administrador/pasando/';";
										echo "document.location.href=pagina;";
									echo "</script>";
								}
							}
						}
					}
					else{
						echo "3";
					}
				}
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='aciadm/erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>