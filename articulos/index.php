<?php
	include '../config.php';
	include '../fecha_format.php';
	$desde=0;
	$hasta=150;
	$clR=$_GET['cl'];
	switch ($clR) {
		case '':
			$ccc="1";
			break;
		case '0':
			$ccc="1";
			break;
		default:
			$ccc="co_id=$clR";
			break;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Todos los articulos" />
	<meta name="keywords" content="Finaciero, prestacion de servicios" />
	<title>Articulos|Acicuv</title>
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
		<h1>Articulos</h1>
		<article id="automargen" class="flGa">
			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				$tamno_pagina=15;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT * from articulos where $ccc order by id_ar desc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from articulos where $ccc order by id_ar desc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($arar=mysql_fetch_array($impsql)) {
					$idar=$arar['id_ar'];
					$coar=$arar['co_id'];
					$ttar=$arar['tit_ar'];
					$rsar=$arar['res_ar'];
					$xxar=$arar['txt_ar'];
					$fear=$arar['fe_ar'];
			?>
			<article class="mincol">
				<h2><?php echo "$ttar"; ?></h2>
				<article>
					<?php echo "$rsar"; ?>
				</article>
				<article class="flaas">
					<a href="../articulos/ind2x.php?nt=<?php echo $idar ?>&cl=<?php echo $clR ?>">Leer más</a>
				</article>
			</article>
			<?php
				}
			?>
		</article>
		<article id="automargen">
			<br />
			<b>Páginas: </b>
			<?php
				//muestro los distintos indices de las paginas
				if ($total_paginas>1) {
					for ($i=1; $i <=$total_paginas ; $i++) { 
						if ($pagina==$i) {
							//si muestro el indice del la pagina actual, no coloco enlace
				?>
					<b><?php echo $pagina." "; ?></b>
				<?php
						}
						else{
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
				?>
							<a href="index.php?cl=<?php echo $clR ?>&pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

				<?php
						}
					}
				}
			?>
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