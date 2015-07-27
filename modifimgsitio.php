<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['idstgl'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['fgsgt']['name'];
		$tipfotA=$_FILES['fgsgt']['type'];
	 	$almfotA=$_FILES['fgsgt']['tmp_name'];
	 	$tamfotA=$_FILES['fgsgt']['size'];
	 	$erorfotA=$_FILES['fgsgt']['error'];
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
					$ruta="imagenes/sitios/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=1400;
						$altodeterminad=870;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 1400 x 870";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$elminarant="SELECT * from sitios where id_st=$idR";
								$sql_rutas=mysql_query($elminarant,$conexion) or die (mysql_error());
								while ($tr=mysql_fetch_array($sql_rutas)) {
									$unruta=$tr['rt_st'];
								}
								unlink($unruta);
								$ddf="UPDATE sitios set rt_st='$ruta' where id_st=$idR";
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