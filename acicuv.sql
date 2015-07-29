-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2015 a las 23:36:51
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `acicuv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id_adm` int(11) NOT NULL,
  `user_adm` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass_adm` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `tp_adm` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_adm`, `user_adm`, `pass_adm`, `tp_adm`) VALUES
(1, 'admin', 'b774aeb573b0235c3ff48d00fa30bc1827fadd5d', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
`id_ar` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `tit_ar` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `res_ar` text COLLATE utf8_spanish_ci NOT NULL,
  `txt_ar` text COLLATE utf8_spanish_ci NOT NULL,
  `fe_ar` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_ar`, `co_id`, `tit_ar`, `res_ar`, `txt_ar`, `fe_ar`) VALUES
(1, 2, 'tituloi', 'resumen', '<p>asdasd</p>\r\n', '2015-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificados`
--

CREATE TABLE IF NOT EXISTS `clasificados` (
`id_cla` int(11) NOT NULL,
  `tit_cla` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `txt_cla` text COLLATE utf8_spanish_ci NOT NULL,
  `fe_cla` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clasificados`
--

INSERT INTO `clasificados` (`id_cla`, `tit_cla`, `txt_cla`, `fe_cla`) VALUES
(1, 'titulo 1', '<p>asdasdasd</p>\r\n', '2015-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `columnistas`
--

CREATE TABLE IF NOT EXISTS `columnistas` (
`id_co` int(11) NOT NULL,
  `nam_co` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `txt_co` text COLLATE utf8_spanish_ci NOT NULL,
  `fe_co` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `columnistas`
--

INSERT INTO `columnistas` (`id_co`, `nam_co`, `txt_co`, `fe_co`) VALUES
(2, 'colum25', '<p>sadasd<span style="color:#2F4F4F">asdsa</span></p>\r\n', '2015-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE IF NOT EXISTS `denuncia` (
`id_dn` int(11) NOT NULL,
  `tit_dn` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_dn` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cor_dn` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `res_dn` text COLLATE utf8_spanish_ci NOT NULL,
  `txt_dn` text COLLATE utf8_spanish_ci NOT NULL,
  `fe_dn` date NOT NULL,
  `es_dn` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`id_dn`, `tit_dn`, `user_dn`, `cor_dn`, `res_dn`, `txt_dn`, `fe_dn`, `es_dn`) VALUES
(1, 'denunci 2', '', '', 'esto es un resumen', '', '2015-07-27', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
`id_gal` int(11) NOT NULL,
  `rut_gal` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `lk_gal` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_gal`, `rut_gal`, `lk_gal`) VALUES
(2, 'imagenes/galery/deltae_1170_570.jpg', 'https://github.com/albert925/acicuv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasando`
--

CREATE TABLE IF NOT EXISTS `pasando` (
`id_ps` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  `tit_ps` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rut_ps` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `txt_ps` text COLLATE utf8_spanish_ci NOT NULL,
  `fe_ps` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pasando`
--

INSERT INTO `pasando` (`id_ps`, `tp_id`, `tit_ps`, `rut_ps`, `txt_ps`, `fe_ps`) VALUES
(1, 1, 'Pasando1', 'imagenes/pasando/deltae_1200_1080.jpg', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', '2015-07-29'),
(2, 2, 'Pasando2', '', '<p>sadasdas</p>\r\n', '2015-07-29'),
(4, 2, 'Pasando3', '', '<p>asdsa</p>\r\n', '2015-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE IF NOT EXISTS `publicidad` (
`id_pu` int(11) NOT NULL,
  `nam_pu` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rt_pu` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `lk_pu` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `po_pu` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id_pu`, `nam_pu`, `rt_pu`, `lk_pu`, `po_pu`) VALUES
(8, 'publicidad1', 'imagenes/carppu/fondo2.jpg', 'http://juegosmmorpg.zz.mu/', '1'),
(9, 'publicidad2', 'imagenes/carppu/deltae_1200_1080.jpg', '', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE IF NOT EXISTS `sitios` (
`id_st` int(11) NOT NULL,
  `nam_st` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `txt_ts` text COLLATE utf8_spanish_ci NOT NULL,
  `rt_st` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `lk_st` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sitios`
--

INSERT INTO `sitios` (`id_st`, `nam_st`, `txt_ts`, `rt_st`, `lk_st`) VALUES
(1, 'sitio1', '', 'imagenes/sitios/delta_1400_870.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tp_ps`
--

CREATE TABLE IF NOT EXISTS `tp_ps` (
`id_tp` int(11) NOT NULL,
  `nam_tp` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tp_ps`
--

INSERT INTO `tp_ps` (`id_tp`, `nam_tp`) VALUES
(1, 'tipo1'),
(2, 'tipo2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id_adm`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
 ADD PRIMARY KEY (`id_ar`), ADD KEY `co_id` (`co_id`);

--
-- Indices de la tabla `clasificados`
--
ALTER TABLE `clasificados`
 ADD PRIMARY KEY (`id_cla`);

--
-- Indices de la tabla `columnistas`
--
ALTER TABLE `columnistas`
 ADD PRIMARY KEY (`id_co`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
 ADD PRIMARY KEY (`id_dn`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
 ADD PRIMARY KEY (`id_gal`);

--
-- Indices de la tabla `pasando`
--
ALTER TABLE `pasando`
 ADD PRIMARY KEY (`id_ps`), ADD KEY `tp_id` (`tp_id`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
 ADD PRIMARY KEY (`id_pu`);

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
 ADD PRIMARY KEY (`id_st`);

--
-- Indices de la tabla `tp_ps`
--
ALTER TABLE `tp_ps`
 ADD PRIMARY KEY (`id_tp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
MODIFY `id_ar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clasificados`
--
ALTER TABLE `clasificados`
MODIFY `id_cla` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `columnistas`
--
ALTER TABLE `columnistas`
MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
MODIFY `id_gal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pasando`
--
ALTER TABLE `pasando`
MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
MODIFY `id_pu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `sitios`
--
ALTER TABLE `sitios`
MODIFY `id_st` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tp_ps`
--
ALTER TABLE `tp_ps`
MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`co_id`) REFERENCES `columnistas` (`id_co`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pasando`
--
ALTER TABLE `pasando`
ADD CONSTRAINT `pasando_ibfk_1` FOREIGN KEY (`tp_id`) REFERENCES `tp_ps` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
