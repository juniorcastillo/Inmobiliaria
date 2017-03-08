-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2017 a las 13:15:51
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `idinmueble` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio` int(11) NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idtipo` int(11) NOT NULL,
  `visita` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`idinmueble`, `fecha`, `precio`, `direccion`, `operacion`, `provincia`, `idtipo`, `visita`) VALUES
(26, '2017-04-01', 500, 'Los alcarrizos/ Invi', 'Venta', 'Santo Domingo', 4, 1),
(27, '2017-03-10', 106, 'La calle primera', 'Alquiler', 'Malaga', 2, 3),
(28, '2017-01-08', 106, 'Mi casa', 'Alquiler', 'Malaga', 2, 0),
(29, '2017-12-01', 2000000, 'Mi casa', 'Alquiler', 'Malaga', 2, 0),
(30, '2017-12-01', 2000000, 'Mi casa', 'Alquiler', 'Malaga', 2, 1),
(31, '2017-01-12', 300, 'malaga', 'xvbxx', 'xcvxc', 2, 5),
(32, '2017-01-12', 2, 'vcx', 'VEnta', 'xcvxcv', 2, 0),
(33, '0000-00-00', 0, '', '', '', 1, 0),
(42, '2017-01-06', 10000, 'Santo Domingo', 'Alquiler', 'Malaga', 1, 0),
(43, '2017-01-05', 101, 'ssfd', 'sdfas', 'fsdf', 1, 0),
(44, '2017-01-03', 100, 'xcv', 'ZXCVzx', 'xcvz', 1, 0),
(45, '2017-01-10', 100, 'asdgf', 'sadfga', 'asdf', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listavisita`
--

CREATE TABLE `listavisita` (
  `idlistavisita` int(11) NOT NULL,
  `idvisita` int(11) NOT NULL,
  `idinmueble` int(11) NOT NULL,
  `numero` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nombre`) VALUES
(1, 'Apartamento'),
(2, 'Chalet'),
(3, 'Estudio'),
(4, 'Piso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `idvisita` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `confirmada` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`idinmueble`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indices de la tabla `listavisita`
--
ALTER TABLE `listavisita`
  ADD PRIMARY KEY (`idlistavisita`),
  ADD KEY `idvisita` (`idvisita`),
  ADD KEY `idinmueble` (`idinmueble`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idvisita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `idinmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `listavisita`
--
ALTER TABLE `listavisita`
  MODIFY `idlistavisita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idvisita` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `inmueble_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `listavisita`
--
ALTER TABLE `listavisita`
  ADD CONSTRAINT `listavisita_ibfk_1` FOREIGN KEY (`idvisita`) REFERENCES `visita` (`idvisita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `listavisita_ibfk_2` FOREIGN KEY (`idinmueble`) REFERENCES `inmueble` (`idinmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
