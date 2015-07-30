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
	<link rel="stylesheet" href="css/popu_c.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/scrippag.js"></script>
	<script src="js/owl_carousel_min.js"></script>
</head>
<body>
	<aside class="popupContact">
		<div class="popupContactClose"></div>
		<article id="popcont">
			<h2>Nueva Denuncia</h2>
			<form action="#" method="post" class="columninput">
				<label>*<b>Nombres y Apellidos</b></label>
				<input type="text" id="nmevdn" required />
				<label>*<b>Correo</b></label>
				<input type="email" id="corevdn" required />
				<label>*<b>Asunto</b></label>
				<input type="text" id="ausevdn" required />
				<label>*<b>Mensaje</b></label>
				<textarea rows="4" id="xxttevdn"></textarea>
				<div id="txDn"></div>
				<input type="submit" value="Enviar" id="nvmsms" />
			</form>
		</article>
	</aside>
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
				<li><a class="sill" href="">Inicio</a></li>
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
				<figure class="pub1 gpubli">
					<?php
						$igA="SELECT * from publicidad where po_pu='1' order by id_pu desc limit 1";
						$sql_iga=mysql_query($igA,$conexion) or die (mysql_error());
						$numAA=mysql_num_rows($sql_iga);
						if ($numAA>0) {
							while ($uua=mysql_fetch_array($sql_iga)) {
								$idpua=$uua['id_pu'];
								$rtpua=$uua['rt_pu'];
								$lkpua=$uua['lk_pu'];
							}
						?>
						<a href="<?php echo $lkpua ?>" target="_blank">
							<img src="<?php echo $rtpua ?>" alt="ig<?php echo $idpua ?>" />
						</a>
					<?php
						}
					?>
				</figure>
				<figure class="pub2 gpubli">
					<?php
						$igB="SELECT * from publicidad where po_pu='2' order by id_pu desc limit 1";
						$sql_igb=mysql_query($igB,$conexion) or die (mysql_error());
						$numBB=mysql_num_rows($sql_igb);
						if ($numBB>0) {
							while ($doa=mysql_fetch_array($sql_igb)) {
								$idpub=$doa['id_pu'];
								$rtpub=$doa['rt_pu'];
								$lkpub=$doa['lk_pu'];
							}
						?>
						<a href="<?php echo $lkpub ?>" target="_blank">
							<img src="<?php echo $rtpub ?>" alt="ig<?php echo $idpub ?>" />
						</a>
					<?php
						}
					?>
				</figure>
			</article>
			<article class="art2">
				<article class="deun">
					<h2 id="hdosG">Opinión</h2>
					<article class="caddnun">
						<?php
							$Ttresden="SELECT * from denuncia where es_dn='1' order by id_dn desc limit 3";
							$sql_den=mysql_query($Ttresden,$conexion) or die (mysql_error());
							while ($dnd=mysql_fetch_array($sql_den)) {
								$iddn=$dnd['id_dn'];
								$ttdn=$dnd['tit_dn'];
								$rsdn=$dnd['res_dn'];
								$xtdn=$dnd['txt_dn'];
								$fedn=$dnd['fe_dn'];
						?>
						<article>
							<h3><?php echo "$ttdn"; ?></h3>
							<p>
								<?php echo "$rsdn"; ?>
							</p>
							<a href="quejas/ind2x.php?dn=<?php echo $iddn ?>">Leer más</a>
						</article>
						<?php
							}
						?>
					</article>
					<a id="bonG" href="quejas">Mas +</a>
				</article>
				<article class="editorial">
					<h2 id="hdosG">Articulos</h2>
					<article class="caddcolumn">
						<?php
							$Tdart="SELECT * from articulos order by id_ar desc limit 4";
							$slart=mysql_query($Tdart,$conexion) or die (mysql_error());
							while ($arar=mysql_fetch_array($slart)) {
								$idar=$arar['id_ar'];
								$coar=$arar['co_id'];
								$ttar=$arar['tit_ar'];
								$rsar=$arar['res_ar'];
								$xxar=$arar['txt_ar'];
								$fear=$arar['fe_ar'];
						?>
						<article>
							<h3><?php echo "$ttar"; ?></h3>
							<p>
								<?php echo "$rsar"; ?>
							</p>
							<a href="articulos/ind2x.php?nt=<?php echo $idar ?>&cl=0">Leer más</a>
						</article>
						<?php
							}
						?>
					</article>
					<a id="bonG" href="articulos/index.php?cl=0">Mas +</a>
				</article>
			</article>
			<article class="art3">
				<figure class="pub3 gpubli">
					<?php
						$igCc="SELECT * from publicidad where po_pu='3' order by id_pu desc limit 1";
						$sql_igc=mysql_query($igCc,$conexion) or die (mysql_error());
						$numCC=mysql_num_rows($sql_igc);
						if ($numCC>0) {
							while ($tra=mysql_fetch_array($sql_igc)) {
								$idpuc=$tra['id_pu'];
								$rtpuc=$tra['rt_pu'];
								$lkpuc=$tra['lk_pu'];
							}
						?>
						<a href="<?php echo $lkpuc ?>" target="_blank">
							<img src="<?php echo $rtpuc ?>" alt="ig<?php echo $idpuc ?>" />
						</a>
					<?php
						}
					?>
				</figure>
				<figure class="pub4 gpubli">
					<?php
						$igDd="SELECT * from publicidad where po_pu='4' order by id_pu desc limit 1";
						$sql_igd=mysql_query($igDd,$conexion) or die (mysql_error());
						$numDD=mysql_num_rows($sql_igd);
						if ($numDD>0) {
							while ($cua=mysql_fetch_array($sql_igd)) {
								$idpud=$cua['id_pu'];
								$rtpud=$cua['rt_pu'];
								$lkpud=$cua['lk_pu'];
							}
						?>
						<a href="<?php echo $lkpud ?>" target="_blank">
							<img src="<?php echo $rtpud ?>" alt="ig<?php echo $idpud ?>" />
						</a>
					<?php
						}
					?>
				</figure>
				<article class="clasificados">
					<h2 id="hdosG">Clasificados</h2>
					<article class="cadclasif">
						<?php
							$tcla="SELECT * from clasificados order by id_cla desc limit 8";
							$sqlcla=mysql_query($tcla,$conexion) or die (mysql_error());
							while ($clv=mysql_fetch_array($sqlcla)) {
								$idcl=$clv['id_cla'];
								$ttcl=$clv['tit_cla'];
								$txcl=$clv['txt_cla'];
								$fecl=$clv['fe_cla'];
						?>
						<article>
							<i><?php echo fechatraducearray($fecl); ?></i>
							<h3>
								<?php echo "$ttcl"; ?> 
								<a href="clasificados/ind2x.php?cl=<?php echo $idcl ?>">Leer más</a>
							</h3>
						</article>
						<?php
							}
						?>
					</article>
					<a id="bonG" href="clasificados">Mas +</a>
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
	<script src="js/popup_b.js"></script>
</body>
</html>