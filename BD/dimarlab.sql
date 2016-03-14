-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2015 a las 22:22:08
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE dimarlab;

USE dimarlab;
--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `id` int NOT NULL,
  `idProducto` int NOT NULL,
  `direccion` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tituloFoto` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int NOT NULL,
  `nomComercial` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `codigoBarra` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `codigoReferencia` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `observacion` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `claveCuadroBasico` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcionCuadroBasico` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `tbl_marca` (
  `id` int NOT NULL,
  `idProducto` int NOT NULL,
  `marca` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `tbl_proveedores` (
  `id` int NOT NULL,
  `idProducto` int NOT NULL,
  `proveedor` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_proveedores`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salud`
--

CREATE TABLE IF NOT EXISTS `tbl_salud` (
  `id` int NOT NULL,
  `idProducto` int NOT NULL,
  `nombreInstitucion` text NOT NULL,
  `claveSalud` text NOT NULL,
  `descripcionSalud` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_usuario` int(11) NOT NULL,
  `at_user` varchar(254) NOT NULL,
  `at_pass` varchar(254) NOT NULL,
  `at_nombre` varchar(90) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id_usuario`, `at_user`, `at_pass`, `at_nombre`) VALUES
(1, 'mabel', 'e34d5c131ae4bffdd4384c2810564b142bcba7b03eac4f970d1fdbf8d0a0e37d', 'Lic. Mabel Martinez Candelario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `tbl_marca`
--
ALTER TABLE `tbl_marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_salud`
--
ALTER TABLE `tbl_salud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_marca`
--
ALTER TABLE `tbl_marca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_salud`
--
ALTER TABLE `tbl_salud`
  MODIFY `id` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
