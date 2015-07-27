<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$lkgal=$_POST['lkgal'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['galig']['name'];
		$tipfotA=$_FILES['galig']['type'];
	 	$almfotA=$_FILES['galig']['tmp_name'];
	 	$tamfotA=$_FILES['galig']['size'];
	 	$erorfotA=$_FILES['galig']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/galery/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=1170;
						$altodeterminad=570;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 1170 x 570";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ddf="INSERT into galeria(rut_gal,lk_gal) values('$ruta','$lkgal')";
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