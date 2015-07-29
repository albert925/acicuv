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
				echo "alert('id articulo no disponible');";
				echo "var pagina='articulo.php';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from articulos where id_ar=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$coar=$dt['co_id'];
					$ttar=$dt['tit_ar'];
					$rsar=$dt['res_ar'];
					$xxar=$dt['txt_ar'];
					$fear=$dt['fe_ar'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administrar publicidad" />
	<meta n<?php echo "$ttar"; ?>|Acicuv</title>
	<link rel="icon" href="../../../imagenes/icono.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/admin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scrippag.js"></script>
	<script src="../../../js/scadmin.js"></script>
	<script src="../../../js/columnis.js"></script>
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
				<li><a href="../pasando">Que está pasando</a></li>
				<li class="sill" class="submen" data-num="1"><a href="../columnis">Columnistas</a>
					<ul class="children1">
						<li><a class="sill" href="../columnis/articulo.php">Articulos</a></li>
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
		<a href="../columnis">Columnistas</a>
		<a href="articulo.php">Ver Articulos</a>
	</nav>
	<section>
		<h1><?php echo "$ttar"; ?></h1>
		<article id="automargen"> 
			<form action="modifc_articulo.php" method="post" class="columninput">
				<input type="text" id="idb" name="idb" value="<?php echo $idR ?>" required style="display:none;" />
				<label>*<b>Del comunista</b></label>
				<select id="slcm" name="slcm">
					<option value="0">Selecione</option>
					<?php
						$colm="SELECT * from columnistas order by id_co desc";
						$sql_colm=mysql_query($colm,$conexion) or die (mysql_error());
						while ($clm=mysql_fetch_array($sql_colm)) {
							$idcl=$clm['id_co'];
							$nmcl=$clm['nam_co'];
							if ($idcl==$coar) {
								$sleocol="selected";
							}
							else{
								$sleocol="";
							}
					?>
					<option value="<?php echo $idcl ?>" <?php echo $sleocol ?>><?php echo "$nmcl"; ?></option>
					<?php
						}
					?>
				</select>
				<label>*<b>titulo</b></label>
				<input type="text" id="nmar" name="nmar" value="<?php echo $ttar ?>" required />
				<label><b>Resumen</b></label>
				<textarea rows="4" name="rsar"><?php echo "$rsar"; ?></textarea>
				<label><b>Texto</b></label>
				<textarea id="editor1" name="xxar"><?php echo "$xxar"; ?></textarea>
				<script>
					CKEDITOR.replace('xxar');
				</script>
				<div id="txA"></div>
				<input type="submit" value="Modificar" id="nvartc" />
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
					echo "alert('articulo eliminado o no existe');";
					echo "var pagina='articulo.php';";
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