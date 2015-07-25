<?php
	include '../../config.php';
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administradfor <?php echo $usad ?>" />
	<meta name="keywords" content="Datos de ingresos" />
	<title>Adminsitrador <?php echo "$usad"; ?>|Acicuv</title>
	<link rel="icon" href="../../imagenes/icono.png" />
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<link rel="stylesheet" href="../../css/admin.css" />
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scrippag.js"></script>
	<script src="../../js/admin.js"></script>
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
				<li><a href="galery">Slide Imágenes</a></li>
				<li><a href="sitios">Sitios de Interés</a></li>
				<li><a href="denuncia">Quejas o denuncias</a></li>
				<li><a href="publicidad">Publicidad</a></li>
				<li><a href="pasando">Que está pasando</a></li>
				<li class="submen" data-num="1"><a href="columnis">Columnistas</a>
					<ul class="children1">
						<li><a href="columnis/articulo.php">Articulos</a></li>
					</ul>
				</li>
				<li><a href="clasificados">Clasificados</a></li>
				<li class="submen" data-num="2">
					<a href=""><?php echo "$usad"; ?></a>
					<ul class="children2">
						<li><a href="../../cerrar">Salir</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</article>
	<section>
		<h1><?php echo "$usad"; ?></h1>
		<article id="automargen" class="flA">
			<article class="columninput">
				<h2 id="hdosG">Usuario</h2>
				<input type="text" id="usfF" value="<?php echo $usad ?>" />
				<div id="txB"></div>
				<input type="submit" value="Modificar" id="cambA" data-adm="<?php echo $idad ?>" />
			</article>
			<article class="columninput">
				<h2 id="hdosG">Cambiar contraseña</h2>
				<label>*<b>Contraseña actual</b></label>
				<input type="password" id="coac" />
				<label>*<b>Contraseña nueva</b></label>
				<input type="password" id="cona" />
				<label>*<b>Repite la contraseña nueva</b></label>
				<input type="password" id="conb" />
				<div id="txC"></div>
				<input type="submit" value="Modificar" id="cambB" data-adm="<?php echo $idad ?>" />
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
			echo "var pagina='../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>