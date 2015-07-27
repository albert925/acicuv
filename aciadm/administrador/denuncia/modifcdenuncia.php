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
		$idR=$_GET['dt'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alerrt('id de denunia no disponble');";
				echo "var pagina='../denuncia';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from denuncia where id_dn=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$ttdn=$dt['tit_dn'];
					$usdn=$dt['user_dn'];
					$crdn=$dt['cor_dn'];
					$rsdn=$dt['res_dn'];
					$xtdn=$dt['txt_dn'];
					$fedn=$dt['fe_dn'];
					$esdn=$dt['es_dn'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administrar denuncias" />
	<meta name="keywords" content="todos las denuncias" />
	<title><?php echo "$ttdn"; ?>|Acicuv</title>
	<link rel="icon" href="../../../imagenes/icono.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/admin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scrippag.js"></script>
	<script src="../../../js/scadmin.js"></script>
	<script src="../../../js/denunc.js"></script>
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
				<li><a class="sill" href="../denuncia">Quejas o denuncias</a></li>
				<li><a href="../publicidad">Publicidad</a></li>
				<li><a href="../pasando">Que está pasando</a></li>
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
		<a href="../denuncia">Ver Denuncias</a>
	</nav>
	<section>
		<h1><?php echo "$ttdn"; ?></h1>
		<article id="automargen"> 
			<form action="modifc_denuncia.php" method="post" class="columninput">
				<input type="text" id="ida" name="ida" value="<?php echo $idR ?>" required style="display:none;" />
				<label for="ttde">*<b>Título</b></label>
				<input type="text" id="ttde" name="ttde" required value="<?php echo $ttdn ?>" />
				<label>*<b>Estado</b></label>
				<select name="selestado">
					<?php
						for ($i=0; $i <=2 ; $i++) { 
							if ($i==$esdn) {
								$selestado="selected";
							}
							else{
								$selestado="";
							}
					?>
					<option value="<?php echo $i ?>" <?php echo $selestado ?>><?php echo $arrestad[$i]; ?></option>
					<?php
						}
					?>
				</select>
				<label>*<b>resumen</b></label>
				<textarea name="rsde" rows="3" required><?php echo "$rsdn"; ?></textarea>
				<label><b>Texto</b></label>
				<textarea id="editor1" name="xxtde"><?php echo "$xtdn"; ?></textarea>
				<script>
					CKEDITOR.replace('xxtde');
				</script>
				<div id="txA"></div>
				<input type="submit" value="Modificar" id="nvgaly" />
			</form>
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
					echo "alerrt('Denuncia no existe o ha sido elminado');";
					echo "var pagina='../denuncia';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>