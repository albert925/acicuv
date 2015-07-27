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
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administrar publicidad" />
	<meta name="keywords" content="todos las publicidad" />
	<title>Adminsitrar Publicidad|Acicuv</title>
	<link rel="icon" href="../../../imagenes/icono.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/admin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scrippag.js"></script>
	<script src="../../../js/scadmin.js"></script>
	<script src="../../../js/public.js"></script>
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
				<li><a class="sill" href="../publicidad">Publicidad</a></li>
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
		<a id="btA" href="#">Nueva Publicidad</a>
	</nav>
	<section>
		<h1>Publicidad</h1>
		<article id="cjA" class="tdscj">
			<article id="automargen"> 
				<form action="#" method="post" enctype="multipart/form-data" id="glPu" class="columninput">
					<label>*<b>Titulo</b></label>
					<input type="text" id="ttpu" name="ttpu" required />
					<label for="puig">*<b>Nuevo Imagen (resolución 1200 x 1080)</b></label>
					<input type="file" id="puig" name="puig" required />
					<label><b>Link o url ("http://www.dominio.com" o "https://www.dominio.com")</b></label>
					<input type="url" id="lkpu" name="lkpu" />
					<div id="txA"></div>
					<input type="submit" value="Subir e ingresar" id="nvpubli" />
				</form>
			</article>
		</article>
		<article id="automargen" class="flB">
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
				$ssql="SELECT * from publicidad order by id_pu desc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from publicidad order by id_pu desc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idpu=$gh['id_pu'];
					$rtpu=$gh['rt_pu'];
					$lkpu=$gh['lk_pu'];
			?>
			<figure>
				<img src="../../../<?php echo $rtpu ?>" alt="<?php echo $idpu ?>" />
				<figcaption class="columninput">
					<a href="<?php echo $lkpu ?>" target="_blank"><?php echo "$lkpu"; ?></a>
					<a class="doll" href="borr_publ.php?br=<?php echo $idpu ?>">Borrar</a>
				</figcaption>
			</figure>
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
							<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

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
<?php
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>