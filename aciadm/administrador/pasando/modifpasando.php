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
		$idR=$_GET['dt'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id pasando no disponible');";
				echo "var pagina='../pasando';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from pasando where id_ps=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$tpps=$dt['tp_id'];
					$ttps=$dt['tit_ps'];
					$rtps=$dt['rut_ps'];
					$xtps=$dt['txt_ps'];
					$feps=$dt['fe_ps'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administrar pasando" />
	<meta name="keywords" content="todos las pasando" />
	<title><?php echo "$ttps"; ?>|Acicuv</title>
	<link rel="icon" href="../../../imagenes/icono.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/admin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scrippag.js"></script>
	<script src="../../../js/scadmin.js"></script>
	<script src="../../../js/pasas.js"></script>
	<script src="../../../ckeditor/ckeditor.js"></script>
</head>
<body>
	<header id="automargen">
		<article id="redes">
			<a href="" target="_blank"><span class="icon-facebook"></span></a>
			<a href="" target="_blank"><span class="icon-twitter"></span></a>
			<a href="" target="_blank"><span class="icon-instagram"></span></a>
			<a href="" target="_blank"><span class="icon-youtube3"></span></a>
		</article>
	</header>
	<article id="cajmn" class="obautomarg">
		<div id="mn_mv"><span class="icon-menu"></span></div>
		<nav id="mnP">
			<ul>
				<li><a href="../galery">Slide Imágenes</a></li>
				<li><a href="../sitios">Sitios de Interés</a></li>
				<li><a href="../denuncia">Quejas o denuncias</a></li>
				<li><a href="../publicidad">Publicidad</a></li>
				<li><a class="sill" href="../pasando">Que está pasando</a></li>
				<li class="submen" data-num="1"><a href="../columnis">Columnistas</a>
					<ul class="children1">
						<li><a href="../columnis/articulo.php">Articulos</a></li>
					</ul>
				</li>
				<li><a href="../clasificados">Clasificados</a></li>
				<li class="submen" data-num="2">
					<a href="../"><?php echo "$usad"; ?></a>
					<ul class="children2">
						<li><a href="../../../cerrar">Salir</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</article>
	<nav id="mnB">
		<a href="../pasando">Ver articulos que está pasando</a>
		<a href="tipo_queesta.php">Tipos o submenu de que está pasando</a>
	</nav>
	<section>
		<h1><?php echo "$ttps"; ?></h1>
		<article id="automargen"> 
			<article>
				<h2>Imagen de Visualizacion</h2>
				<form action="#" method="post" enctype="multipart/form-data" id="glPa" class="columninput">
					<input type="text" id="idda" name="idda" value="<?php echo $idR ?>" required style="display:none;" />
					<a href="../../../<?php echo $rtps ?>" target="_blank"><?php echo "$rtps"; ?></a>
					<label>resolución 1200 x 1080</label>
					<input type="file" id="jhpas" name="jhpas" required />
					<div id="txC"></div>
					<input type="submit" value="Cambiar y subir" id="camvspu" />
				</form>
			</article>
			<article>
				<h2>Datos</h2>
				<form action="modifc_pasando.php" method="post" class="columninput">
					<input type="text" id="iddb" name="iddb" value="<?php echo $idR ?>" required style="display:none;" />
					<label>*<b>Titulo</b></label>
					<input type="text" id="ttpas" name="ttpas" value="<?php echo $ttps ?>" required />
					<label>*<b>Del tipo o submenu</b></label>
					<select id="sltp" name="sltp">
						<option value="0">Seleccione</option>
						<?php
							$Ttp="SELECT * from tp_ps order by nam_tp asc";
							$sql_ttp=mysql_query($Ttp,$conexion) or die (mysql_error());
							while ($up=mysql_fetch_array($sql_ttp)) {
								$idtp=$up['id_tp'];
								$nmtp=$up['nam_tp'];
								if ($idtp==$tpps) {
									$seltipo="selected";
								}
								else{
									$seltipo="";
								}
						?>
						<option value="<?php echo $idtp ?>" <?php echo $seltipo ?>><?php echo "$nmtp"; ?></option>
						<?php
							}
						?>
					</select>
					<textarea id="editor1" name="xxpas"><?php echo "$xtps"; ?></textarea>
					<script>
						CKEDITOR.replace('xxpas');
					</script>
					<div id="txA"></div>
					<input type="submit" value="Modificar" id="nvpasand" />
				</form>
			</article>
		</article>
	</section>
	<footer>
		<article id="automargen" class="fooflex">
			<article class="fotcont">
				<div>304 591 6717</div>
				<div>acicuv@gmail.com</div>
				<div>av 6 #10-20 Ofic. 10-03 Ed. Dacach</div>
				<div>Cúcuta-Colombia</div>
			</article>
			<article class="redfin">
				<article id="redes">
					<a href="" target="_blank"><span class="icon-facebook"></span></a>
					<a href="" target="_blank"><span class="icon-twitter"></span></a>
					<a href="" target="_blank"><span class="icon-instagram"></span></a>
					<a href="" target="_blank"><span class="icon-youtube3"></span></a>
				</article>
			</article>
		</article>
		<article id="automargen" class="fooffin">
			CONAXPORT © 2015 &nbsp;&nbsp;todos los derechos reservados &nbsp;- &nbsp;PBX (5) 841 733 &nbsp;&nbsp;Cúcuta - Colombia &nbsp;&nbsp;
			<a href="http://conaxport.com/" target="_blank">www.conaxport.com</a>
		</article>
	</footer>
</body>
</html>
<?php
			}
			else{
				echo "<script type='text/javascript'>";
					echo "alert('no existe o ha sido eliminada');";
					echo "var pagina='../pasando';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>