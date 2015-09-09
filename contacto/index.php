<?php
	include '../config.php';
	include '../fecha_format.php';
	$desde=0;
	$hasta=150;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Contacto de la empresa" />
	<meta name="keywords" content="Finaciero, prestacion de servicios" />
	<title>Contacto|Acicuv</title>
	<link rel="icon" href="../imagenes/icono.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/contacto.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrippag.js"></script>
	<script src="../js/contact.js"></script>
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
				<li><a class="sill" href="../contacto">Contáctenos</a></li>
			</ul>
		</nav>
	</article>
	<section>
		<h1>Contacto</h1>
		<article id="automargen" class="flccont">
			<article>
				<h2 id="hdosG">Datos</h2>
				<div>304 591 6717</div>
				<div>acicuv@gmail.com</div>
				<div>av 6 #10-20 Ofic. 10-03 Ed. Dacach</div>
				<div>Cúcuta-Colombia</div>
			</article>
			<article>
				<h2 id="hdosG">Mensaje</h2>
				<form action="#" method="post" class="columninput">
					<label>*<b>Nombres</b></label>
					<input type="text" id="nmsj" required />
					<label>*<b>Correo</b></label>
					<input type="email" id="corsj" required />
					<label>*<b>Teléfono</b></label>
					<input type="tel" id="tlsj" required />
					<label>*<b>Mensaje</b></label>
					<textarea rows="4" id="xxsj"></textarea>
					<div id="jxA"></div>
					<input type="submit" value="Enviar" id="nvxjs" />
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