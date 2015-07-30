<?php
	include 'config.php';
	include 'fecha_format.php';
	$desde=0;
	$hasta=150;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Enviar nueva denuncia" />
	<meta name="keywords" content="Denuncias" />
	<title>Quejas o denuncias|Acicuv</title>
	<link rel="icon" href="imagenes/icono.png" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/iconos/style.css" />
	<link rel="stylesheet" href="css/owl_carousel.css" />
	<link rel="stylesheet" href="css/owl_theme_min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/inicio.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/scrippag.js"></script>
	<script src="js/owl_carousel_min.js"></script>
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
				<li><a href="index.php">Inicio</a></li>
				<li><a href="quejas">Quejas</a></li>
				<li><a href="nosotros">Quienes somos</a></li>
				<li class="submen" data-num="1"><a href="pasando">Que está pasando</a>
					<ul class="children1">
						<?php
							$tdTPqs="SELECT * from tp_ps order by id_tp desc";
							$sql_tp=mysql_query($tdTPqs,$conexion) or die (mysql_error());
							while ($ttpp=mysql_fetch_array($sql_tp)) {
								$idpts=$ttpp['id_tp'];
								$nmtps=$ttpp['nam_tp'];
						?>
						<li><a href="pasando/ind2x.php?tp=<?php echo $idpts ?>"><?php echo "$nmtps"; ?></a></li>
						<?php
							}
						?>
					</ul>
				</li>
				<li><a href="sitios">Sitios de interés</a></li>
				<li><a href="columnistas">Columnistas</a></li>
				<li><a href="contacto">Contáctenos</a></li>
			</ul>
		</nav>
	</article>
	<section>
		<article id="sitio" class="obautomarg">
			<h2 id="hdosG">Sitios de Interés</h2>
			<article id="todositios">
				<article class="owl-carousel owl-theme owl-loaded">
					<?php
						$ttsit="SELECT * from sitios order by id_st desc limit 30";
						$sql_sit=mysql_query($ttsit,$conexion) or die (mysql_error());
						while ($tss=mysql_fetch_array($sql_sit)) {
							$idst=$tss['id_st'];
							$nmst=$tss['nam_st'];
							$rtst=$tss['rt_st'];
							$lkst=$tss['lk_st'];
							if ($lkst=="") {
								$laa="#";
							}
							else{
								$laa=$lkst;
							}
					?>
					<div class="item">
						<figure>
							<a href="<?php echo $laa ?>" target="_blank">
								<img src="<?php echo $rtst ?>" alt="<?php echo $nmst ?>" />
							</a>
						</figure>
					</div>
					<?php
						}
					?>
				</article>
			</article>
		</article>
		<article id="automargen">
			<h2 style="color: #005300;text-align: center;">Nueva denuncia</h2>
			<form action="#" method="post" class="columninput">
				<label>*<b>Nombres y Apellidos</b></label>
				<input type="text" id="nmevdn" required />
				<label>*<b>Correo</b></label>
				<input type="email" id="corevdn" required />
				<label>*<b>Mensaje</b></label>
				<textarea rows="4" id="xxttevdn"></textarea>
				<div id="txDn"></div>
				<input type="submit" value="Enviar" id="nvmsms" />
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
	<script type="text/javascript">
		$(document).on("ready",icionowl);
		function icionowl () {
			 $('.owl-carousel').owlCarousel({
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				dots:false,
				loop:false,
				margin:10,
				responsiveClass:true,
				nav:false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:3
					},
					1200:{
						items:4
					}
				}
			});
		}
	</script>
</body>
</html>