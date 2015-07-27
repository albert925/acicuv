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
		$a=$_POST['ttst'];
		$b=$_POST['lkst'];
		$c=$_POST['xxttst'];
		$hoy=date("Y-m-d");
		//-------------------------------------------
		$fotAcosmodT=$_FILES['galst']['name'];
		$tipfotA=$_FILES['galst']['type'];
	 	$almfotA=$_FILES['galst']['tmp_name'];
	 	$tamfotA=$_FILES['galst']['size'];
	 	$erorfotA=$_FILES['galst']['error'];
		//----------------------------------------
		if ($a=="") {
			echo "<script type='text/javascript'>";
				echo "alertr('nombre o titulo en blanco');";
				echo "var pagina='aciadm/administrador/sitios/';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($fotAcosmodT=="") {
				echo "<script type='text/javascript'>";
					echo "alert('Imagen no seleccionada');";
					echo "var pagina='aciadm/administrador/sitios/';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				if ($erorfotA>0) {
					echo "<script type='text/javascript'>";
						echo "alert('Carpeta sin permisos o resolucion maxima no permitida');";
						echo "var pagina='aciadm/administrador/sitios/';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
				else{
					$maAximo = 100204000;
					if ($tamfotA<=$maAximo*1024) {
						$ruta="imagenes/sitios/".$fotAcosmodT;
						if (file_exists($ruta)) {
							echo "Una imagen tiene el mismo nombre";
							echo "<script type='text/javascript'>";
								echo "alert('Una imagen tiene el mismo nombre');";
								echo "var pagina='aciadm/administrador/sitios/';";
								echo "document.location.href=pagina;";
							echo "</script>";
						}
						else{
							$size=getimagesize($almfotA);
							$anchoimagen=$size[0];
							$altoimagen=$size[1];
							$anchodetermindo=1400;
							$altodeterminad=870;
							if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
								echo "Resolucion de imagen no permitida debe ser 1400 x 870";
								echo "<script type='text/javascript'>";
									echo "alert('Resolucion de imagen no permitida');";
									echo "var pagina='aciadm/administrador/sitios/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
							else{
								$subiendo=@move_uploaded_file($almfotA, $ruta);
								if ($subiendo) {
									$ddf="INSERT into sitios(nam_st,txt_ts,rt_st,lk_st) 
										values('$a','$c','$ruta','$b')";
									mysql_query($ddf,$conexion) or die (mysql_error());
									echo "<script type='text/javascript'>";
										echo "alert('Sitio ingresado');";
										echo "var pagina='aciadm/administrador/sitios/';";
										echo "document.location.href=pagina;";
									echo "</script>";
								}
								else{
									echo "<script type='text/javascript'>";
										echo "alert('Carpeta sin permisos o resolucion maxima no permitida');";
										echo "var pagina='aciadm/administrador/sitios/';";
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