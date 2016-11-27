-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2016 a las 14:52:31
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

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
-- Estructura de tabla para la tabla `control_acceso`
--

CREATE TABLE `control_acceso` (
  `Usuario` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Contraseña` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Rol` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `control_acceso`
--

INSERT INTO `control_acceso` (`Usuario`, `Contraseña`, `Rol`) VALUES
('admi@hotmail.com', '1234', 'admin'),
('junior--45@hotmail.com', 'rhaydyris', 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `Referencia` int(9) NOT NULL,
  `FechaAlta` date NOT NULL,
  `Tipo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Operacion` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Provincia` varchar(27) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Superficie` int(10) NOT NULL,
  `PrecioVenta` int(40) NOT NULL,
  `FechaVenta` date NOT NULL,
  `Vendedor` int(9) NOT NULL,
  `Imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`Referencia`, `FechaAlta`, `Tipo`, `Operacion`, `Provincia`, `Superficie`, `PrecioVenta`, `FechaVenta`, `Vendedor`, `Imagen`) VALUES
(1, '2016-11-01', 'Casa', 'Venta', 'Malaga', 178, 10000, '2016-11-09', 3, ''),
(2, '2016-11-03', 'Casa', 'Venta ', 'oASD', 139, 188, '2016-11-16', 2, ''),
(3, '2016-11-03', 'rfgfdg', 'fsdgsdfg ', 'dfgsdfg', 103, 158, '2016-12-02', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `ClaveVendedor` int(9) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `DNI` varchar(8) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` int(13) NOT NULL,
  `Direccion` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`ClaveVendedor`, `Nombre`, `DNI`, `Telefono`, `Direccion`) VALUES
(1, 'dfgsd ', 'dfgsd', 0, 'dsfgfg'),
(2, 'jose peres', '4569875j', 203564789, 'Calle el rosal'),
(3, 'julio voltio ', '4567895j', 54865479, 'vsavasdv');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control_acceso`
--
ALTER TABLE `control_acceso`
  ADD UNIQUE KEY `usuario` (`Usuario`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`Referencia`),
  ADD KEY `Vendedor` (`Vendedor`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`ClaveVendedor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`Vendedor`) REFERENCES `vendedor` (`ClaveVendedor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
