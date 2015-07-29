<?php
	include 'config.php';
	$desde=0;
	$hasta=150;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Somos la Enidad Financiera del Departamento 
	Norte de Santander encargada de generar desarrollo económico y social 
	mediante la prestación de servicios financieros a los entes territoriales, 
	institutos descentralizados y empresas sociales del estado E.S.E" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title>Acicuv</title>
	<link rel="icon" href="imagenes/icono.png" />
	<link rel="image_src" href="imagenes/logo.png" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/iconos/style.css" />
	<link rel="stylesheet" href="css/default/default.css" />
	<link rel="stylesheet" href="css/nivo_slider.css" />
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
				<li><a href="">Inicio</a></li>
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
	<article id="botn_anunc" class="obautomarg">
		<div id="anunbtn">Denunciar</div>
	</article>
	<article id="idngal" class="obautomarg">
		<figure id="galery">
			<div class="slider-wrapper theme-default"><!--title="#caption1"-->
				<div id="slider" class="nivoSlider">
					<?php
						$slidgl="SELECT * from galeria order by id_gal desc";
						$sql_slid=mysql_query($slidgl,$conexion) or die (mysql_error());
						while ($ss=mysql_fetch_array($sql_slid)) {
							$idgl=$ss['id_gal'];
							$rtgl=$ss['rut_gal'];
							$lkgl=$ss['lk_gal'];
							if ($lkgl=="") {
								$ea="#";
							}
							else{
								$ea=$lkgl;
							}
					?>
					<a href="<?php echo $ea ?>">
						<img src="<?php echo $rtgl ?>" alt="imagen<?php echo $idgl ?>" />
					</a>
					<?php
						}
					?>
				</div>
				<!--div id="caption1" style="display:none;">
					<span>Texto</span>
				</div>-->
			</div>
		</figure>
		<article id="indicadores">
			<h2 class="ha">Indicadores</h2>
			<article id="cambios">
				<div id="bgBody">
					<script type="text/javascript">
						// <![CDATA[
						var bgHost = "http://www.applab.in/";
						var bgType = "CO-19284-1";
						var bgIndi = "9|10|3";
						(function(d){ var f = bgHost+ "apps/indicators/"+bgType+"/"+bgIndi+"/functions.js"; d.write(unescape("%3Cscript src='"+f+"' type='text/javascript'%3E%3C/script%3E")); })(document);
						// ]]>
						$("#bgBody").attr("style","padding:0;");
					</script>
				</div>
			</article>
			<h2 class="hb">Clima</h2>
			<article id="tiempo">
				<!-- www.TuTiempo.net - Ancho:158px - Alto:66px -->
				<div id="TT_vWZALxdxdrKat16KLfzDDjjjDWnKTQt2LYEdkZyoq1D"><a href="http://www.tutiempo.net">El tiempo 15 días</a></div>
				<script src="http://www.tutiempo.net/widget/eltiempo_vWZALxdxdrKat16KLfzDDjjjDWnKTQt2LYEdkZyoq1D"></script>
			</article>
			<article id="txcldo">
				Cúcuta - Norte de Santander
			</article>
		</article>
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
		<article id="automargen" class="columnflx">
			<article class="art1">
				<article class="pasan">
					<div id="htresG">
						<h2>Que está pasando</h2>
						<a id="bonG" href="pasando">Mas +</a>
					</div>
					<article class="yap">
						<?php
							$Tdpass="SELECT * from pasando order by id_ps desc limit 6";
							$sql_pass=mysql_query($Tdpass,$conexion) or die (mysql_error());
							while ($sps=mysql_fetch_array($sql_pass)) {
								$idps=$sps['id_ps'];
								$tpps=$sps['tp_id'];
								$ttps=$sps['tit_ps'];
								$rtps=$sps['rut_ps'];
								$xtps=$sps['txt_ps'];
								$feps=$sps['fe_ps'];
						?>
						<article>
							<?php
								if ($rtps!="") {
							?>
							<figure>
								<img src="<?php echo $rtps ?>" />
							</figure>
							<?php
								}
							?>
							<h3><?php echo "$ttps"; ?></h3>
							<div>
								<?php echo substr($xtps,$desde,$hasta)."..."; ?>
							</div>
							<a href="pasando/ind3x.php?nt=<?php echo $idps ?>">Leer más</a>
						</article>
						<?php
							}
						?>
					</article>
				</article>
				<figure class="pub1 gpubli"></figure>
				<figure class="pub2 gpubli"></figure>
			</article>
			<article class="art2">
				<article class="deun">
					<h2 id="hdosG">Opinión</h2>
					<article class="caddnun"></article>
					<a id="bonG" href="#">Mas +</a>
				</article>
				<article class="editorial">
					<h2 id="hdosG">Editorial</h2>
					<article class="caddcolumn"></article>
					<a id="bonG" href="#">Mas +</a>
				</article>
			</article>
			<article class="art3">
				<figure class="pub3 gpubli"></figure>
				<figure class="pub4 gpubli"></figure>
				<article class="clasificados">
					<h2 id="hodsoG">Clasificados</h2>
					<article class="cadclasif"></article>
					<a id="bonG" href="#">Mas +</a>
				</article>
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
	<script src="js/nivo_slider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
			$('#slider').nivoSlider({
				effect: 'fade',
				slices: 15,
				boxCols: 8,
				boxRows: 4,
				animSpeed: 500,
				pauseTime: 10000,
				pauseOnHover:true,
				startSlide: 0,
				directionNav: true,
				controlNav: false,
				controlNavThumbs: false,
				pauseOnHover: true,
				manualAdvance: false,
				prevText: 'Prev',
				nextText: 'Next',
				randomStart: false,
			});
		});
		// http://web.tursos.com/como-implementar-nivo-slider-en-tu-pagina-web/
	</script>
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