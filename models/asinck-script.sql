-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2019 a las 03:07:33
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asinck`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fallas`
--

CREATE TABLE `fallas` (
  `idFalla` int(50) NOT NULL,
  `fechaFalla` date NOT NULL,
  `justificacionFalla` varchar(255) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fallas`
--

INSERT INTO `fallas` (`idFalla`, `fechaFalla`, `justificacionFalla`, `idUsuario`) VALUES
(37, '2019-08-26', '', 2147483647),
(38, '2019-08-26', '', 1001117307),
(39, '2019-08-26', '../uploads/asinck-1.png', 456),
(40, '2019-08-26', '', 711),
(41, '2019-08-26', '', 999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idtipoidentificacion`
--

CREATE TABLE `idtipoidentificacion` (
  `idTipoIdentificacion` varchar(1) COLLATE utf8_bin NOT NULL,
  `nombreTipoIdentificacion` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `idtipoidentificacion`
--

INSERT INTO `idtipoidentificacion` (`idTipoIdentificacion`, `nombreTipoIdentificacion`) VALUES
('0', 'C.C'),
('1', 'T.I'),
('2', 'C.E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idPrograma` varchar(11) COLLATE utf8_bin NOT NULL,
  `nombrePrograma` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idPrograma`, `nombrePrograma`) VALUES
('1821360', 'ADSI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` varchar(1) COLLATE utf8_bin NOT NULL,
  `nombreRol` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
('0', 'Aprendiz'),
('1', 'Instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombresUsuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `apellidosUsuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `passUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `IdTipoIdentificacion` varchar(1) COLLATE utf8_bin NOT NULL,
  `idRol` varchar(1) COLLATE utf8_bin NOT NULL,
  `idPrograma` varchar(3) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombresUsuario`, `apellidosUsuario`, `passUsuario`, `IdTipoIdentificacion`, `idRol`, `idPrograma`) VALUES
('', '', '', '', '', '', ''),
('1001117306', 'Roy', 'War', 'Roy', '1', '0', '182'),
('10011173064', 'M', 'Pinilla', '454552', '0', '0', '182'),
('1001117307', 'Roy', 'Pinilla', '123', '1', '0', '182'),
('101', 'Royer', 'Guerrero', '123', '1', '1', '1'),
('2', 'Lolo', 'Pepo', 'lalala', '1', '1', '1'),
('456', 'al', 'll', '123', '0', '0', '182'),
('52395071', 'Ma', 'x', 'vczvvxv', '1', '1', '182'),
('5239507185', 'Mafdfp', 'x8', '456', '1', '1', '182'),
('5239507185q', 'Mafdfp', 'x87', 'g', '1', '1', '182'),
('523950q3', 'Mafdfpd', 'x87', 'fds', '1', '1', '182'),
('711', 'Flory', 'Play', 'zapato', '1', '0', '182'),
('999', 'po', 'lo', '123', '0', '0', '182'),
('x', 'x', 'x', '832385', '0', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fallas`
--
ALTER TABLE `fallas`
  ADD PRIMARY KEY (`idFalla`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `idtipoidentificacion`
--
ALTER TABLE `idtipoidentificacion`
  ADD PRIMARY KEY (`idTipoIdentificacion`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idPrograma`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idPrograma` (`idPrograma`),
  ADD KEY `IdTipoIdentificacion` (`IdTipoIdentificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fallas`
--
ALTER TABLE `fallas`
  MODIFY `idFalla` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
