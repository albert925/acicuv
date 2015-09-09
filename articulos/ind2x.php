<?php
	include '../config.php';
	include '../fecha_format.php';
	$desde=0;
	$hasta=150;
	$idR=$_GET['nt'];
	$clR=$_GET['cl'];
	if ($clR=="") {
		$ccc=0;
	}
	else{
		$ccc=$clR;
	}
	if ($idR=="") {
		echo "<script type='text/javascript'>";
			echo "alert('id columnista no disponible');";
			echo "var pagina='../index.php?cl=$ccc';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
	else{
		$datos="SELECT * from articulos where id_ar=$idR";
		$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_datos);
		if ($numero>0) {
			while ($arar=mysql_fetch_array($sql_datos)) {
				$coar=$arar['co_id'];
				$ttar=$arar['tit_ar'];
				$rsar=$arar['res_ar'];
				$xxar=$arar['txt_ar'];
				$fear=$arar['fe_ar'];
			}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Descripción del artivulo <?php echo $ttar ?>" />
	<meta name="keywords" content="Finaciero, prestacion de servicios" />
	<title><?php echo "$ttar"; ?>|Acicuv</title>
	<link rel="icon" href="../imagenes/icono.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/sitinres.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrippag.js"></script>
</head>
<body>
	<header id="automargen">
		<article id="redes">
			<a href="https://www.facebook.com/cucuta.ciudadverde" target="_blank"><span class="icon-facebook"></span></a>
			<a href="" target="_blank"><span class="icon-twitter"></span></a>
			<a href="" target="_blank"><span class="icon-instagram"></span></a>
			<a href="" target="_blank"><span class="icon-youtube3"></span></a>
		</article>
	</header>
	<article id="cajmn" class="obautomarg">
		<div id="mn_mv"><span class="icon-menu"></span></div>
		<nav id="mnP">
			<ul>
				<li><a href="../">Inicio</a></li>
				<li><a href="../quejas">Quejas</a></li>
				<li><a href="../nosotros">Quienes somos</a></li>
				<li class="submen" data-num="1"><a href="../pasando">Que está pasando</a>
					<ul class="children1">
						<?php
							$tdTPqs="SELECT * from tp_ps order by id_tp desc";
							$sql_tp=mysql_query($tdTPqs,$conexion) or die (mysql_error());
							while ($ttpp=mysql_fetch_array($sql_tp)) {
								$idpts=$ttpp['id_tp'];
								$nmtps=$ttpp['nam_tp'];
						?>
						<li><a href="../pasando/ind2x.php?tp=<?php echo $idpts ?>"><?php echo "$nmtps"; ?></a></li>
						<?php
							}
						?>
					</ul>
				</li>
				<li><a href="../sitios">Sitios de interés</a></li>
				<li><a href="../columnistas">Columnistas</a></li>
				<li><a href="../contacto">Contáctenos</a></li>
			</ul>
		</nav>
	</article>
	<section>
		<h1><?php echo "$ttar"; ?></h1>
		<article id="automargen">
			<?php echo "$xxar"; ?>
		</article>
		<article id="automargen">
			<i><?php echo fechatraducearray($fear); ?></i>
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
				echo "alert('articulo no existe o ha sido eliminado');";
				echo "var pagina='../index.php?cl=$ccc';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
?>