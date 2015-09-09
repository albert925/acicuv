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
	<meta name="description" content="Información de la empresa" />
	<meta name="keywords" content="Finaciero, prestacion de servicios" />
	<title>Quienes somos|Acicuv</title>
	<link rel="icon" href="../imagenes/icono.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/denunc.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrippag.js"></script>
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
				<li><a href="../">Inicio</a></li>
				<li><a href="../quejas">Quejas</a></li>
				<li><a class="sill" href="../nosotros">Quienes somos</a></li>
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
		<h1>Información</h1>
		<article id="automargen" class="infnsotros">
			<h2>¿Porque el nombre de Ciudad Verde?</h2>
			<p>
				En el año 1988 se recibió el premio al mérito forestal “Roble de Oro”, 
				y fue elegida Ciudad Verde por el Inderena que dos años después le concedió el 
				título de “Municipio verde de Colombia”. 
			</p>
			<h2>¿Qué es ACICUV?</h2>
			<p>
				Es una organización de utilidad pública sin ánimo de lucro, fundada hace un año.
			</p>
			<h2>Nuestro Objetivos</h2>
			<p>
				La ASOCIACION realizara las actividades de bienestar social a sus asociados con la promoción, 
				divulgación, implementación, vigencia y defensa de la democracia, 
				de los derechos fundamentales, los derechos humanos, el derecho internacional humanitario, 
				la promoción de la justicia mediante la consultoría, 
				asesoría y asistencia profesional interdisciplinaria, 
				buscando el equilibrio y el restablecimiento de los derechos de las personas y grupos afectados por la violencia.
			</p>
			<p>
				De igual forma adelantara actividades a la protección y preservación del patrimonio natural, 
				ecológico y del medio ambiente en el ámbito local y regional.
			</p>
			<p>
				La vigilancia de la gestión pública por parte de la Veeduría Ciudadana y 
				la observancia de los principios de igualdad, moralidad, eficacia, economía, 
				celeridad, imparcialidad y publicidad
			</p>
			<h2>Algunos de nuestros Controles ACICUV</h2>
			<p>
				En la Administración Municipal se controlan los sobre costos en papelería, 
				entrega de las tablas, la inversión de Malecón entre otras.
			</p>
			<p>
				Por el lado de la Administración Departamental controlamos la recuperación de dineros mal embargados.
			</p>
			<h2>Nuestros Asociados</h2>
			<p>
				Todos los que quieran ingresar conforme a los estatutos, hoy sumamos 237 asociados y 
				en proceso de aceptación 132 lo cual nos hace una sumatoria de 369 miembros.
			</p>
			<h2>Nuestras Instalaciones</h2>
			<p>
				Edificio DACCAH oficina 1003 ubicado en la AV. 6 #10-20 Centro frente al Parque Santander.
			</p>
			<h2>ACICUV</h2>
			<p>
				El nombre de ASOCIACION podrá utilizar las siglas ACICUV la cual es una institución de utilidad común y sin ánimo de lucro.
			</p>
			<p>
				Su naturaleza ACICUV, es una persona jurídica de derecho privado en lo pertinente en 
				los artículos 633 a 625 del Código Civil Colombiano
			</p>
			<p>
				Su domicilio principal es en la ciudad de Cúcuta Norte de Santander pero podrá realizar actividades en otras ciudades del país y del exterior con autorización de Asamblea General.
			</p>
			<p>
				Su duración será de 10 años prorrogables por un término igual al inicial.
			</p>
			<p>
				Nuestro objeto social es realizar actividades de bienestar social, nuestro patrimonio está conformado por los aportes económicos, donaciones y cuotas de sus miembros.
			</p>
			<p>
				Nuestro patrimonio inicial es de dos millones cien mil pesos $ (2.100.000) aportado por los asociados.
			</p>
			<p>
				Las donaciones las pueden hacer personas naturales o jurídicas, nacionales o extranjeras, y que la ASOCIACION acepte.
			</p>
			<p>
				Los asociados cumplen con unos derechos y deberes.
			</p>
			<p>
				Algunos de los derechos son programas de capacitación, acceder y participar con prelación, acceder como beneficiarios, participara en los proyectos y programas de la ASOCIACION entre otros.
			</p>
			<p>
				Los deberes son cumplir con los presentes estatutos, asumir funciones y responsabilidades, asistir a reuniones ordinarias y extraordinarias, contribuir a los aportes entre otros.
			</p>
			<p>
				La ASOCIACION también puede implementar sanciones como Amonestaciones, suspensión temporal, expulsión, otras sanciones.
			</p>
			<p>
				La Administración de ACICUV está conformada por: Asamblea General, Junta Directiva, Director Ejecutivo (Representante Legal) y El Fiscal. 
			</p>
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