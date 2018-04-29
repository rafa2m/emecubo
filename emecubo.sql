-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2018 a las 21:50:58
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aquelo`
--
CREATE DATABASE IF NOT EXISTS `emecubo` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `emecubo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracionsensor`
--

DROP TABLE IF EXISTS `configuracionsensor`;
CREATE TABLE `configuracionsensor` (
  `fechahora` datetime NOT NULL,
  `id` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo` bigint(20) NOT NULL,
  `marca` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `modelo` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `idestacion` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '' COMMENT 'Identificador de la estación al que se asocia la configuración',
  `altura` double NOT NULL COMMENT 'Altura a la que está instalado (metros)',
  `calibracion` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Datos de calibración del fabricante',
  `offset` float DEFAULT NULL COMMENT 'Datos de calibración del fabricante',
  `slope` float DEFAULT NULL COMMENT 'Datos de calibración del fabricante',
  `fechafinconfig` datetime DEFAULT NULL COMMENT 'Fecha en la que concluye una configuración (null es la configuración actual)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

DROP TABLE IF EXISTS `estacion`;
CREATE TABLE `estacion` (
  `id` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `longitud` float NOT NULL,
  `latitud` float NOT NULL,
  `altura` float NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `nombre_corto` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `altitud` float NOT NULL,
  `idlogger` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'Identificador del microcontralador que toma las medidas de los sensores (arduino)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE `incidencia` (
  `fecha_incidencia` datetime NOT NULL,
  `detalles` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Mensaje largo de la incidencia encontrada (HTML)',
  `resultado` varchar(256) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Mensaje resumido de la incidencia encontrada (html)',
  `fechareglaaviso` datetime NOT NULL COMMENT 'Fecha de la regla de aviso que genera la incidencia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidasensor`
--

DROP TABLE IF EXISTS `medidasensor`;
CREATE TABLE `medidasensor` (
  `fecha_medida` datetime NOT NULL,
  `nombre` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre corto de la medida',
  `fechaconfigsensor` datetime NOT NULL COMMENT 'Fecha de configuración del sensor asociada',
  `idsensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tiposensor` bigint(20) NOT NULL,
  `marcasensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `modelosensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `idestacion` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `valor` decimal(9,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelodispositivo`
--

DROP TABLE IF EXISTS `modelodispositivo`;
CREATE TABLE `modelodispositivo` (
  `id_tipo` bigint(20) NOT NULL,
  `marca` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `modelo` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglaaviso`
--

DROP TABLE IF EXISTS `reglaaviso`;
CREATE TABLE `reglaaviso` (
  `fecha_creada` datetime NOT NULL COMMENT 'Fecha en que se crea la regla',
  `periodicidad_incidencia` smallint(6) NOT NULL COMMENT 'Período de tiempo (10 minutales) durante el que se la regla se cumple',
  `secuencial` bit(1) NOT NULL COMMENT 'Indica si el período de observación es secuencial',
  `estado` int(11) DEFAULT NULL COMMENT 'Estado del sensor: activo o inactivo',
  `observacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(500) NOT NULL COMMENT 'Correos de mantenedores a los que se avisa en caso de que la regla se active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE `sensor` (
  `id` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo` bigint(20) NOT NULL,
  `marca` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `modelo` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `idestacion` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo_comunicacion` int(11) DEFAULT NULL COMMENT 'Digital o analógica',
  `formato_integracion` int(11) DEFAULT NULL,
  `canal` int(11) DEFAULT NULL COMMENT 'Canal al que está conectado en el datalogger (arduino)',
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT 'Activo o inactivo',
  `potencia_soportada` varchar(45) DEFAULT NULL COMMENT 'Potencia de trabajo según el fabricante',
  `idzona` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Sólo para aquelo, emecubo debe quitar este campo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodispositivo`
--

DROP TABLE IF EXISTS `tipodispositivo`;
CREATE TABLE `tipodispositivo` (
  `id_tipo` bigint(20) NOT NULL,
  `nombre` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomedidasensor`
--

DROP TABLE IF EXISTS `tipomedidasensor`;
CREATE TABLE `tipomedidasensor` (
  `nombre` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre corto de la medida (Ejemplo: sa1)',
  `fechaconfigsensor` datetime NOT NULL,
  `idsensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `idtiposensor` bigint(20) NOT NULL,
  `marcasensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `modelosensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `idestacion` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nombre_descriptivo` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Nombre largo de la medida (Ejemplo: velocidad media)',
  `dimension` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Unidad de medida',
  `valor_max` decimal(9,3) DEFAULT NULL COMMENT 'Valor máximo indicado por el fabricante',
  `valor_min` decimal(9,3) DEFAULT NULL COMMENT 'Valor mínimo indicado por el fabricante',
  `valores_error` varchar(255) DEFAULT NULL COMMENT 'Lista de errores tipificados separados con '','' ',
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `fechareglaaviso` datetime DEFAULT NULL COMMENT 'Fecha de la regla de aviso asociada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracionsensor`
--
ALTER TABLE `configuracionsensor`
  ADD PRIMARY KEY (`fechahora`,`id`,`tipo`,`marca`,`modelo`,`idestacion`),
  ADD KEY `id` (`id`,`tipo`),
  ADD KEY `id_2` (`id`,`tipo`,`marca`,`modelo`),
  ADD KEY `id_3` (`id`,`tipo`,`marca`,`modelo`),
  ADD KEY `id_4` (`id`,`tipo`,`marca`,`modelo`,`idestacion`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`fecha_incidencia`,`fechareglaaviso`),
  ADD KEY `fechareglaaviso` (`fechareglaaviso`);

--
-- Indices de la tabla `medidasensor`
--
ALTER TABLE `medidasensor`
  ADD PRIMARY KEY (`fecha_medida`,`fechaconfigsensor`,`nombre`,`idsensor`,`tiposensor`,`marcasensor`,`modelosensor`,`idestacion`);

--
-- Indices de la tabla `modelodispositivo`
--
ALTER TABLE `modelodispositivo`
  ADD PRIMARY KEY (`id_tipo`,`marca`,`modelo`);

--
-- Indices de la tabla `reglaaviso`
--
ALTER TABLE `reglaaviso`
  ADD PRIMARY KEY (`fecha_creada`);

--
-- Indices de la tabla `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`,`tipo`,`modelo`,`marca`,`idestacion`),
  ADD KEY `id` (`id`,`tipo`,`marca`,`modelo`),
  ADD KEY `id_2` (`id`,`tipo`,`marca`,`modelo`),
  ADD KEY `tipo` (`tipo`,`marca`,`modelo`),
  ADD KEY `idestacion` (`idestacion`),
  ADD KEY `id_3` (`id`,`tipo`,`marca`,`modelo`,`idestacion`);

--
-- Indices de la tabla `tipodispositivo`
--
ALTER TABLE `tipodispositivo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipomedidasensor`
--
ALTER TABLE `tipomedidasensor`
  ADD PRIMARY KEY (`nombre`,`fechaconfigsensor`,`idsensor`,`idtiposensor`,`marcasensor`,`modelosensor`,`idestacion`),
  ADD KEY `fechaconfigsensor` (`fechaconfigsensor`,`idsensor`,`idtiposensor`,`marcasensor`,`modelosensor`,`idestacion`),
  ADD KEY `fechaconfigsensor_2` (`fechaconfigsensor`,`idsensor`,`idtiposensor`,`marcasensor`,`modelosensor`,`idestacion`),
  ADD KEY `fechareglaaviso` (`fechareglaaviso`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuracionsensor`
--
ALTER TABLE `configuracionsensor`
  ADD CONSTRAINT `fk_ConfiguracionesSensor_Sensor_1` FOREIGN KEY (`id`,`tipo`,`marca`,`modelo`,`idestacion`) REFERENCES `sensor` (`id`, `tipo`, `marca`, `modelo`, `idestacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `fk_Incidencia_ReglaAviso1` FOREIGN KEY (`fechareglaaviso`) REFERENCES `reglaaviso` (`fecha_creada`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelodispositivo`
--
ALTER TABLE `modelodispositivo`
  ADD CONSTRAINT `fk_ModelosSensor_TiposSensores_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipossensores` (`id_tipo`);

--
-- Filtros para la tabla `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `fk_Sensor_Estacion1` FOREIGN KEY (`idestacion`) REFERENCES `estacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Sensor_ModelosDispositivo_1` FOREIGN KEY (`tipo`,`marca`,`modelo`) REFERENCES `modelodispositivo` (`id_tipo`, `marca`, `modelo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipomedidasensor`
--
ALTER TABLE `tipomedidasensor`
  ADD CONSTRAINT `fk_TipoMedida_ConfiguracionSensor1` FOREIGN KEY (`fechaconfigsensor`,`idsensor`,`idtiposensor`,`marcasensor`,`modelosensor`,`idestacion`) REFERENCES `configuracionsensor` (`fechahora`, `id`, `tipo`, `marca`, `modelo`, `idestacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_TipoMedida_ReglaAviso1` FOREIGN KEY (`fechareglaaviso`) REFERENCES `reglaaviso` (`fecha_creada`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
