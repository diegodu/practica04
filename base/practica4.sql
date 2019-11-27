-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2019 a las 13:25:58
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitacion`
--

CREATE TABLE `invitacion` (
  `invi_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `reu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invitacion`
--

INSERT INTO `invitacion` (`invi_codigo`, `usu_codigo`, `reu_codigo`) VALUES
(6, 5, 11),
(7, 6, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunion`
--

CREATE TABLE `reunion` (
  `reu_codigo` int(11) NOT NULL,
  `reu_remitente` varchar(50) NOT NULL,
  `reu_fecha` date NOT NULL,
  `reu_hora` time NOT NULL,
  `reu_lugar` varchar(50) NOT NULL,
  `reu_motivo` varchar(100) NOT NULL,
  `reu_observaciones` varchar(100) NOT NULL,
  `reu_longitud` decimal(7,4) NOT NULL,
  `reu_latitud` decimal(7,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reunion`
--

INSERT INTO `reunion` (`reu_codigo`, `reu_remitente`, `reu_fecha`, `reu_hora`, `reu_lugar`, `reu_motivo`, `reu_observaciones`, `reu_longitud`, `reu_latitud`) VALUES
(11, '4', '2019-12-15', '10:00:00', 'Universidad Politécnica Salesiana', 'Entrega de notas', 'Traer todas las evaluaciones y trabajos calificados, así como el comprobante de pago.', '55.1236', '75.5897');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_codigo` int(11) NOT NULL,
  `usu_rol` varchar(5) NOT NULL,
  `usu_cedula` varchar(10) NOT NULL,
  `usu_nombres` varchar(50) NOT NULL,
  `usu_apellidos` varchar(50) NOT NULL,
  `usu_direccion` varchar(75) NOT NULL,
  `usu_telefono` varchar(10) NOT NULL,
  `usu_correo` varchar(50) NOT NULL,
  `usu_password` varchar(255) NOT NULL,
  `usu_fecha_nacimiento` date NOT NULL,
  `usu_eliminado` varchar(1) NOT NULL,
  `usu_fecha_creacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `usu_fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_rol`, `usu_cedula`, `usu_nombres`, `usu_apellidos`, `usu_direccion`, `usu_telefono`, `usu_correo`, `usu_password`, `usu_fecha_nacimiento`, `usu_eliminado`, `usu_fecha_creacion`, `usu_fecha_modificacion`) VALUES
(1, 'admin', '140106913', 'DANIEL DIONICIO', 'GUZMAN CHUVA', 'GUALACEO', '0123456734', 'dguzmanc4@est.ups.edu.ec', '202cb962ac59075b964b07152d234b70', '1999-07-10', 'N', '2019-11-24 23:36:46', '2019-11-25 05:29:33'),
(4, 'user', '0104567893', 'JUAN', 'LOPEZ', 'PAUTE', '0986573247', 'juanl@est.ups.edu.ec', '5b4eb6bb9090e6e39ac7063403d0d499', '1997-05-05', 'N', '2019-11-25 10:54:02', NULL),
(5, 'user', '0107836425', 'KAREN', 'MENDEZ', 'CUENCA', '0986537854', 'karenm@est.ups.edu.ec', '5b4eb6bb9090e6e39ac7063403d0d499', '1999-02-03', 'N', '2019-11-25 10:54:15', NULL),
(6, 'user', '1406378429', 'DAVID', 'MARIN', 'CHORDELEG', '0986378925', 'dmarin@est.ups.edu.ec', '5b4eb6bb9090e6e39ac7063403d0d499', '1998-03-05', 'N', '2019-11-25 10:54:32', NULL),
(7, 'user', '0106943258', 'ESTEFANIA', 'SANCHEZ', 'CUENCA', '0983657421', 'esanchez@est.ups.edu.ec', '5b4eb6bb9090e6e39ac7063403d0d499', '2000-04-05', 'S', '2019-11-25 11:19:18', '2019-11-25 17:19:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `invitacion`
--
ALTER TABLE `invitacion`
  ADD PRIMARY KEY (`invi_codigo`),
  ADD KEY `Invitados_Reunion` (`reu_codigo`),
  ADD KEY `Invitados_Usuario` (`usu_codigo`);

--
-- Indices de la tabla `reunion`
--
ALTER TABLE `reunion`
  ADD PRIMARY KEY (`reu_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `invitacion`
--
ALTER TABLE `invitacion`
  MODIFY `invi_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reunion`
--
ALTER TABLE `reunion`
  MODIFY `reu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `invitacion`
--
ALTER TABLE `invitacion`
  ADD CONSTRAINT `Invitados_Reunion` FOREIGN KEY (`reu_codigo`) REFERENCES `reunion` (`reu_codigo`),
  ADD CONSTRAINT `Invitados_Usuario` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
