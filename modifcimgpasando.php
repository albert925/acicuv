<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['idda'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['jhpas']['name'];
		$tipfotA=$_FILES['jhpas']['type'];
	 	$almfotA=$_FILES['jhpas']['tmp_name'];
	 	$tamfotA=$_FILES['jhpas']['size'];
	 	$erorfotA=$_FILES['jhpas']['error'];
		//----------------------------------------
		if ($idR=="" || $fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/pasando/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=1200;
						$altodeterminad=1080;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 1200 x 1080";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$elminarant="SELECT * from pasando where id_ps=$idR";
								$sql_rutas=mysql_query($elminarant,$conexion) or die (mysql_error());
								while ($tr=mysql_fetch_array($sql_rutas)) {
									$unruta=$tr['rut_ps'];
								}
								unlink($unruta);
								$ddf="UPDATE pasando set rut_ps='$ruta' where id_ps=$idR";
								mysql_query($ddf,$conexion) or die (mysql_error());
								echo "5";
							}
							else{
								echo "4";
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
	else{
		echo "error";
	}
?>