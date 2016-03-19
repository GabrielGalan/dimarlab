-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2016 a las 06:34:39
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dimarlab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clavesdescripciones`
--

CREATE TABLE IF NOT EXISTS `clavesdescripciones` (
`id` int(11) NOT NULL,
  `claveInstitucion` text,
  `descripcionInstitucion` text,
  `idInstitucion` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clavesdescripciones`
--

INSERT INTO `clavesdescripciones` (`id`, `claveInstitucion`, `descripcionInstitucion`, `idInstitucion`, `idProducto`) VALUES
(1, '8', '8', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
`id` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `tituloFoto` text NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `direccion`, `tituloFoto`, `idProducto`) VALUES
(1, 'controller/php/imagenes/Captura de pantalla (8).png', '', 1),
(2, 'controller/php/imagenes/Captura de pantalla (10).png', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE IF NOT EXISTS `instituciones` (
`id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Juan', 'Graham', 'J');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
`id` int(11) NOT NULL,
  `marca` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca`) VALUES
(1, 'roche'),
(2, 'BD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`idProducto` int(11) NOT NULL,
  `nomComercial` text NOT NULL,
  `codigoBarra` text NOT NULL,
  `codigoReferencia` text NOT NULL,
  `observacion` text NOT NULL,
  `claveCuadroBasico` text NOT NULL,
  `descripcionCuadroBasico` text NOT NULL,
  `terminado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nomComercial`, `codigoBarra`, `codigoReferencia`, `observacion`, `claveCuadroBasico`, `descripcionCuadroBasico`, `terminado`) VALUES
(1, '0', '0', '0', '', '0', '0', 1),
(2, '8', '8', '8', '', '8', '8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_marcas`
--

CREATE TABLE IF NOT EXISTS `producto_marcas` (
  `idProducto` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_marcas`
--

INSERT INTO `producto_marcas` (`idProducto`, `idMarca`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedores`
--

CREATE TABLE IF NOT EXISTS `producto_proveedores` (
  `idProducto` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_proveedores`
--

INSERT INTO `producto_proveedores` (`idProducto`, `idProveedor`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
`id` int(11) NOT NULL,
  `proveedor` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `proveedor`) VALUES
(1, 'proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_usuario` int(11) NOT NULL,
  `at_user` varchar(254) NOT NULL,
  `at_pass` varchar(254) NOT NULL,
  `at_nombre` varchar(90) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_usuario`, `at_user`, `at_pass`, `at_nombre`) VALUES
(1, 'mabel', 'e34d5c131ae4bffdd4384c2810564b142bcba7b03eac4f970d1fdbf8d0a0e37d', 'Lic. Mabel Martinez Candelario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clavesdescripciones`
--
ALTER TABLE `clavesdescripciones`
 ADD PRIMARY KEY (`id`,`idInstitucion`,`idProducto`), ADD KEY `fk_clavesDescripciones_tbl_salud1_idx` (`idInstitucion`), ADD KEY `fk_clavesDescripciones_producto1_idx` (`idProducto`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_imagen_producto1_idx` (`idProducto`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `producto_marcas`
--
ALTER TABLE `producto_marcas`
 ADD PRIMARY KEY (`idProducto`,`idMarca`), ADD KEY `fk_producto_has_tbl_marca_tbl_marca1_idx` (`idMarca`), ADD KEY `fk_producto_has_tbl_marca_producto1_idx` (`idProducto`);

--
-- Indices de la tabla `producto_proveedores`
--
ALTER TABLE `producto_proveedores`
 ADD PRIMARY KEY (`idProducto`,`idProveedor`), ADD KEY `fk_producto_has_tbl_proveedores_tbl_proveedores1_idx` (`idProveedor`), ADD KEY `fk_producto_has_tbl_proveedores_producto1_idx` (`idProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clavesdescripciones`
--
ALTER TABLE `clavesdescripciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clavesdescripciones`
--
ALTER TABLE `clavesdescripciones`
ADD CONSTRAINT `fk_clavesDescripciones_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_clavesDescripciones_tbl_salud1` FOREIGN KEY (`idInstitucion`) REFERENCES `instituciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
ADD CONSTRAINT `fk_imagen_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_marcas`
--
ALTER TABLE `producto_marcas`
ADD CONSTRAINT `fk_producto_has_tbl_marca_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_producto_has_tbl_marca_tbl_marca1` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_proveedores`
--
ALTER TABLE `producto_proveedores`
ADD CONSTRAINT `fk_producto_has_tbl_proveedores_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_producto_has_tbl_proveedores_tbl_proveedores1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
