-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Servidor: db732013555.db.1and1.com
-- Tiempo de generación: 21-05-2018 a las 01:10:16
-- Versión del servidor: 5.5.60-0+deb7u1-log
-- Versión de PHP: 5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db732013555`
--
CREATE DATABASE IF NOT EXISTS `db732013555` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `db732013555`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracionsensor`
--

DROP TABLE IF EXISTS `configuracionsensor`;
CREATE TABLE IF NOT EXISTS `configuracionsensor` (
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
  `fechafinconfig` datetime DEFAULT NULL COMMENT 'Fecha en la que concluye una configuración (null es la configuración actual)',
  PRIMARY KEY (`fechahora`,`id`,`tipo`,`marca`,`modelo`,`idestacion`),
  KEY `id` (`id`,`tipo`),
  KEY `id_2` (`id`,`tipo`,`marca`,`modelo`),
  KEY `id_3` (`id`,`tipo`,`marca`,`modelo`),
  KEY `id_4` (`id`,`tipo`,`marca`,`modelo`,`idestacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `configuracionsensor`
--

INSERT INTO `configuracionsensor` (`fechahora`, `id`, `tipo`, `marca`, `modelo`, `idestacion`, `altura`, `calibracion`, `offset`, `slope`, `fechafinconfig`) VALUES
('2018-05-20 12:44:00', 'AC1', 2, 'Sparkfun', 'SEN-08942', 'STC1', 1.55, NULL, NULL, NULL, NULL),
('2018-05-20 12:44:00', 'PL1', 3, 'Sparkfun', 'SEN-08942', 'STC1', 1.4, NULL, NULL, NULL, NULL),
('2018-05-20 12:44:00', 'VV1', 1, 'Sparkfun', 'SEN-08942', 'STC1', 1.55, NULL, NULL, NULL, NULL),
('2018-05-20 12:47:00', 'TH1h', 5, 'Aosong', 'DHT22', 'STC1', 0.55, NULL, NULL, NULL, NULL),
('2018-05-20 12:47:00', 'TH1t', 4, 'Aosong', 'DHT22', 'STC1', 0.55, NULL, NULL, NULL, NULL),
('2018-05-20 12:49:00', 'IO1d', 6, 'Rohm', 'BH1750FVI', 'STC1', 1.05, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

DROP TABLE IF EXISTS `estacion`;
CREATE TABLE IF NOT EXISTS `estacion` (
  `id` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `longitud` float NOT NULL,
  `latitud` float NOT NULL,
  `altura` float NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `nombre_corto` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `altitud` float NOT NULL,
  `idlogger` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'Identificador del microcontralador que toma las medidas de los sensores (arduino)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`id`, `longitud`, `latitud`, `altura`, `fecha`, `nombre_corto`, `observacion`, `altitud`, `idlogger`) VALUES
('STC1', -5.27939, 37.7047, 1.5, '2018-04-15 11:25:00', 'Palma', 'Estación de Palma del río, colocada en un balcón', 69, 'Arduino Yun');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE IF NOT EXISTS `incidencia` (
  `fecha_incidencia` datetime NOT NULL,
  `detalles` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Mensaje largo de la incidencia encontrada (HTML)',
  `resultado` varchar(256) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Mensaje resumido de la incidencia encontrada (html)',
  `fechareglaaviso` datetime NOT NULL COMMENT 'Fecha de la regla de aviso que genera la incidencia',
  PRIMARY KEY (`fecha_incidencia`,`fechareglaaviso`),
  KEY `fechareglaaviso` (`fechareglaaviso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`fecha_incidencia`, `detalles`, `resultado`, `fechareglaaviso`) VALUES
('2018-04-15 00:02:00', '<h1>error del sensor</h1>\r\n<p>el sensor dio error en la medida</p>', '<p>el sensor dio error en la medida</p>', '2018-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidasensor`
--

DROP TABLE IF EXISTS `medidasensor`;
CREATE TABLE IF NOT EXISTS `medidasensor` (
  `fecha_medida` datetime NOT NULL,
  `nombre` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre corto de la medida',
  `fechaconfigsensor` datetime NOT NULL COMMENT 'Fecha de configuración del sensor asociada',
  `idsensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tiposensor` bigint(20) NOT NULL,
  `marcasensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `modelosensor` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `idestacion` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `valor` decimal(9,3) NOT NULL,
  PRIMARY KEY (`fecha_medida`,`nombre`,`fechaconfigsensor`,`idsensor`,`tiposensor`,`marcasensor`,`modelosensor`,`idestacion`),
  KEY `fk_medidasensor_tipomedidasensor` (`nombre`,`fechaconfigsensor`,`idsensor`,`tiposensor`,`marcasensor`,`modelosensor`,`idestacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `medidasensor`
--

INSERT INTO `medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES
('2018-05-20 12:29:14', 'A', '2018-05-20 12:44:00', 'AC1', 2, 'Sparkfun', 'SEN-08942', 'STC1', '10.000'),
('2018-05-20 12:29:14', 'H', '2018-05-20 12:47:00', 'TH1h', 5, 'Aosong', 'DHT22', 'STC1', '64.520'),
('2018-05-20 12:29:14', 'P', '2018-05-20 12:44:00', 'PL1', 3, 'Sparkfun', 'SEN-08942', 'STC1', '0.000'),
('2018-05-20 12:29:14', 'T', '2018-05-20 12:47:00', 'TH1t', 4, 'Aosong', 'DHT22', 'STC1', '18.800'),
('2018-05-20 12:29:14', 'V', '2018-05-20 12:44:00', 'VV1', 1, 'Sparkfun', 'SEN-08942', 'STC1', '270.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelodispositivo`
--

DROP TABLE IF EXISTS `modelodispositivo`;
CREATE TABLE IF NOT EXISTS `modelodispositivo` (
  `id_tipo` bigint(20) NOT NULL,
  `marca` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `modelo` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo`,`marca`,`modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `modelodispositivo`
--

INSERT INTO `modelodispositivo` (`id_tipo`, `marca`, `modelo`, `observacion`) VALUES
(1, 'Sparkfun', 'SEN-08942', 'Veleta de viento, respuesta en grados'),
(2, 'Sparkfun', 'SEN-08942', 'Anemómetro de copa, respuesta en km/h'),
(3, 'Sparkfun', 'SEN-08942', 'Pluviometro, respuesta en mm'),
(4, 'Aosong', 'DHT22', 'Termómetro, respuesta en grados centígrados'),
(5, 'Aosong', 'DHT22', 'Hidrómetro, respuesta tanto porciento'),
(6, 'Rohm', 'BH1750FVI', 'Luxómetro , respuesta en lux ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglaaviso`
--

DROP TABLE IF EXISTS `reglaaviso`;
CREATE TABLE IF NOT EXISTS `reglaaviso` (
  `fecha_creada` datetime NOT NULL COMMENT 'Fecha en que se crea la regla',
  `periodicidad_incidencia` smallint(6) NOT NULL COMMENT 'Período de tiempo (10 minutales) durante el que se la regla se cumple',
  `secuencial` bit(1) NOT NULL COMMENT 'Indica si el período de observación es secuencial',
  `estado` int(11) DEFAULT NULL COMMENT 'Estado del sensor: activo o inactivo',
  `observacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(500) NOT NULL COMMENT 'Correos de mantenedores a los que se avisa en caso de que la regla se active',
  PRIMARY KEY (`fecha_creada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `reglaaviso`
--

INSERT INTO `reglaaviso` (`fecha_creada`, `periodicidad_incidencia`, `secuencial`, `estado`, `observacion`, `email`) VALUES
('2018-04-15 00:00:00', 10, b'1', 1, 'observación de actividad 1', 'javiealiaga@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo` bigint(20) NOT NULL,
  `marca` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `modelo` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `idestacion` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo_comunicacion` varchar(11) DEFAULT NULL COMMENT 'Digital o analógica',
  `formato_integracion` int(11) DEFAULT NULL,
  `canal` varchar(2) DEFAULT NULL COMMENT 'Canal al que está conectado en el datalogger (arduino)',
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT 'Activo o inactivo',
  `potencia_soportada` varchar(45) DEFAULT NULL COMMENT 'Potencia de trabajo según el fabricante',
  PRIMARY KEY (`id`,`tipo`,`modelo`,`marca`,`idestacion`),
  KEY `id` (`id`,`tipo`,`marca`,`modelo`),
  KEY `id_2` (`id`,`tipo`,`marca`,`modelo`),
  KEY `tipo` (`tipo`,`marca`,`modelo`),
  KEY `idestacion` (`idestacion`),
  KEY `id_3` (`id`,`tipo`,`marca`,`modelo`,`idestacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `sensor`
--

INSERT INTO `sensor` (`id`, `tipo`, `marca`, `modelo`, `idestacion`, `observacion`, `tipo_comunicacion`, `formato_integracion`, `canal`, `estado`, `potencia_soportada`) VALUES
('AC1', 2, 'Sparkfun', 'SEN-08942', 'STC1', 'Revisar la calibración, es demasiado sensible.', 'digital', NULL, '2', 1, '3.3V'),
('IO1d', 6, 'Rohm', 'BH1750FVI', 'STC1', 'Falta por activar', 'digital', NULL, NULL, 0, '3.3-5V'),
('PL1', 3, 'Sparkfun', 'SEN-08942', 'STC1', 'Se queda marcando aunque no esté lloviendo a veces...observar\r\n', 'digital', NULL, '3', 1, '3.3V'),
('TH1h', 5, 'Aosong', 'DHT22', 'STC1', 'Funciona perfectamente', 'digital', NULL, '5', 1, '3.3-5V'),
('TH1t', 4, 'Aosong', 'DHT22', 'STC1', 'Medición exacta', 'digital', NULL, '5', 1, '3.3-5V'),
('VV1', 1, 'Sparkfun', 'SEN-08942', 'STC1', 'Revisar la calibración, aunqeu esté parado el viento hay oscilaciones', 'analógico', NULL, 'A2', 1, '3.3-5V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodispositivo`
--

DROP TABLE IF EXISTS `tipodispositivo`;
CREATE TABLE IF NOT EXISTS `tipodispositivo` (
  `id_tipo` bigint(20) NOT NULL,
  `nombre` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tipodispositivo`
--

INSERT INTO `tipodispositivo` (`id_tipo`, `nombre`, `observacion`) VALUES
(1, 'Veleta de viento', 'mide la dirección del viento en grados'),
(2, 'Anemometro de copa', 'mide la fuerza del viento en km/h'),
(3, 'Pluviometro', 'mide cantidad de agua de lluvia recogida en mm'),
(4, 'TermoHidrometro', 'mide temperatura ambiente'),
(5, 'TermoHidrometro', 'mide la humedad ambiente'),
(6, 'Sensor de iluminación ', 'mide la intensidad óptica digital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomedidasensor`
--

DROP TABLE IF EXISTS `tipomedidasensor`;
CREATE TABLE IF NOT EXISTS `tipomedidasensor` (
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
  `fechareglaaviso` datetime DEFAULT NULL COMMENT 'Fecha de la regla de aviso asociada',
  PRIMARY KEY (`nombre`,`fechaconfigsensor`,`idsensor`,`idtiposensor`,`marcasensor`,`modelosensor`,`idestacion`),
  KEY `fechaconfigsensor` (`fechaconfigsensor`,`idsensor`,`idtiposensor`,`marcasensor`,`modelosensor`,`idestacion`),
  KEY `fechareglaaviso` (`fechareglaaviso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomedidasensor`
--

INSERT INTO `tipomedidasensor` (`nombre`, `fechaconfigsensor`, `idsensor`, `idtiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `nombre_descriptivo`, `dimension`, `valor_max`, `valor_min`, `valores_error`, `observacion`, `fechareglaaviso`) VALUES
('A', '2018-05-20 12:44:00', 'AC1', 2, 'Sparkfun', 'SEN-08942', 'STC1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('H', '2018-05-20 12:47:00', 'TH1h', 5, 'Aosong', 'DHT22', 'STC1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('I', '2018-05-20 12:49:00', 'IO1d', 6, 'Rohm', 'BH1750FVI', 'STC1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('P', '2018-05-20 12:44:00', 'PL1', 3, 'Sparkfun', 'SEN-08942', 'STC1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('T', '2018-05-20 12:47:00', 'TH1t', 4, 'Aosong', 'DHT22', 'STC1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('V', '2018-05-20 12:44:00', 'VV1', 1, 'Sparkfun', 'SEN-08942', 'STC1', 'Dirección del viento', NULL, NULL, NULL, 'valores negativos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variable`
--

DROP TABLE IF EXISTS `variable`;
CREATE TABLE IF NOT EXISTS `variable` (
  `fecha` datetime NOT NULL,
  `id` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `variable`
--

INSERT INTO `variable` (`fecha`, `id`, `nombre`, `valor`) VALUES
('2018-05-20 08:39:20', '1', 'temperatura', 25.3),
('2018-05-20 08:39:35', '1', 'temperatura', 25.3),
('2018-05-20 08:39:50', '1', 'temperatura', 25.4),
('2018-05-20 08:40:05', '1', 'temperatura', 25.4),
('2018-05-20 08:40:20', '1', 'temperatura', 25.4),
('2018-05-20 08:40:36', '1', 'temperatura', 25.4),
('2018-05-20 08:40:50', '1', 'temperatura', 25.5),
('2018-05-20 08:41:05', '1', 'temperatura', 25.5),
('2018-05-20 08:41:20', '1', 'temperatura', 25.6),
('2018-05-20 08:41:35', '1', 'temperatura', 25.6),
('2018-05-20 08:41:50', '1', 'temperatura', 25.6),
('2018-05-20 08:42:05', '1', 'temperatura', 25.6),
('2018-05-20 08:42:20', '1', 'temperatura', 25.7),
('2018-05-20 08:42:35', '1', 'temperatura', 25.7),
('2018-05-20 08:46:43', '1', 'temperatura', 25.7),
('2018-05-20 08:47:13', '1', 'temperatura', 26.2),
('2018-05-20 08:47:43', '1', 'temperatura', 26.2),
('2018-05-20 08:48:13', '1', 'temperatura', 26.2),
('2018-05-20 08:48:43', '1', 'temperatura', 26.3),
('2018-05-20 08:48:53', '1', 'temperatura', 26.2),
('2018-05-20 08:49:13', '1', 'temperatura', 26.3),
('2018-05-20 08:49:43', '1', 'temperatura', 26.4),
('2018-05-20 08:50:13', '1', 'temperatura', 26.4),
('2018-05-20 08:50:43', '1', 'temperatura', 26.3),
('2018-05-20 08:51:13', '1', 'temperatura', 26.4),
('2018-05-20 08:51:43', '1', 'temperatura', 26.4),
('2018-05-20 08:52:13', '1', 'temperatura', 26.4),
('2018-05-20 08:52:43', '1', 'temperatura', 26.4),
('2018-05-20 08:53:13', '1', 'temperatura', 26.4),
('2018-05-20 08:53:43', '1', 'temperatura', 26.4),
('2018-05-20 08:54:13', '1', 'temperatura', 26.4),
('2018-05-20 08:54:43', '1', 'temperatura', 26.4),
('2018-05-20 08:55:16', '1', 'temperatura', 26.4),
('2018-05-20 08:55:43', '1', 'temperatura', 26.4),
('2018-05-20 08:56:13', '1', 'temperatura', 26.4),
('2018-05-20 08:56:43', '1', 'temperatura', 26.4),
('2018-05-20 08:57:13', '1', 'temperatura', 26.5),
('2018-05-20 08:57:13', '1', 'agualluvia', 327.31),
('2018-05-20 08:57:43', '1', 'temperatura', 26.5),
('2018-05-20 08:57:43', '1', 'agualluvia', 342.32),
('2018-05-20 08:58:13', '1', 'temperatura', 26.4),
('2018-05-20 08:58:13', '1', 'agualluvia', 357.31),
('2018-05-20 08:58:43', '1', 'temperatura', 26.5),
('2018-05-20 08:58:43', '1', 'agualluvia', 372.3),
('2018-05-20 08:59:13', '1', 'temperatura', 26.5),
('2018-05-20 08:59:13', '1', 'agualluvia', 387.29),
('2018-05-20 08:59:43', '1', 'temperatura', 26.5),
('2018-05-20 08:59:43', '1', 'agualluvia', 402.29),
('2018-05-20 09:00:13', '1', 'temperatura', 26.5),
('2018-05-20 09:00:13', '1', 'agualluvia', 417.3),
('2018-05-20 09:00:43', '1', 'temperatura', 26.6),
('2018-05-20 09:00:43', '1', 'agualluvia', 432.28),
('2018-05-20 09:01:13', '1', 'temperatura', 26.5),
('2018-05-20 09:01:13', '1', 'agualluvia', 447.27),
('2018-05-20 09:01:43', '1', 'temperatura', 26.6),
('2018-05-20 09:01:43', '1', 'agualluvia', 462.27),
('2018-05-20 09:02:13', '1', 'temperatura', 26.6),
('2018-05-20 09:02:13', '1', 'agualluvia', 477.26),
('2018-05-20 09:02:43', '1', 'temperatura', 26.6),
('2018-05-20 09:02:43', '1', 'agualluvia', 492.26),
('2018-05-20 09:03:13', '1', 'temperatura', 26.6),
('2018-05-20 09:03:13', '1', 'agualluvia', 507.25),
('2018-05-20 09:03:43', '1', 'temperatura', 26.6),
('2018-05-20 09:03:43', '1', 'agualluvia', 522.25),
('2018-05-20 09:04:13', '1', 'temperatura', 26.5),
('2018-05-20 09:04:13', '1', 'agualluvia', 537.25),
('2018-05-20 09:04:43', '1', 'temperatura', 26.5),
('2018-05-20 09:04:43', '1', 'agualluvia', 552.24),
('2018-05-20 09:05:13', '1', 'temperatura', 26.4),
('2018-05-20 09:05:13', '1', 'agualluvia', 567.26),
('2018-05-20 09:05:43', '1', 'temperatura', 26.4),
('2018-05-20 09:05:43', '1', 'agualluvia', 582.17),
('2018-05-20 09:06:13', '1', 'temperatura', 26.4),
('2018-05-20 09:06:13', '1', 'agualluvia', 597.17),
('2018-05-20 09:06:43', '1', 'temperatura', 26.4),
('2018-05-20 09:06:43', '1', 'agualluvia', 612.16),
('2018-05-20 09:07:13', '1', 'temperatura', 26.3),
('2018-05-20 09:07:13', '1', 'agualluvia', 627.18),
('2018-05-20 09:07:43', '1', 'temperatura', 26.3),
('2018-05-20 09:07:43', '1', 'agualluvia', 642.19),
('2018-05-20 09:08:13', '1', 'temperatura', 26.3),
('2018-05-20 09:08:13', '1', 'agualluvia', 657.19),
('2018-05-20 09:08:43', '1', 'temperatura', 26.3),
('2018-05-20 09:08:43', '1', 'agualluvia', 672.19),
('2018-05-20 09:09:13', '1', 'temperatura', 26.2),
('2018-05-20 09:09:13', '1', 'agualluvia', 687.18),
('2018-05-20 09:09:43', '1', 'temperatura', 26.3),
('2018-05-20 09:09:43', '1', 'agualluvia', 702.17),
('2018-05-20 09:10:13', '1', 'temperatura', 26.3),
('2018-05-20 09:10:13', '1', 'agualluvia', 717.16),
('2018-05-20 09:10:43', '1', 'temperatura', 26.4),
('2018-05-20 09:10:43', '1', 'agualluvia', 732.16),
('2018-05-20 09:11:13', '1', 'temperatura', 26.3),
('2018-05-20 09:11:13', '1', 'agualluvia', 747.15),
('2018-05-20 09:11:43', '1', 'temperatura', 26.3),
('2018-05-20 09:11:43', '1', 'agualluvia', 762.14),
('2018-05-20 09:12:13', '1', 'temperatura', 26.3),
('2018-05-20 09:12:13', '1', 'agualluvia', 777.15),
('2018-05-20 09:12:43', '1', 'temperatura', 26.3),
('2018-05-20 09:12:43', '1', 'agualluvia', 792.15),
('2018-05-20 09:13:13', '1', 'temperatura', 26.3),
('2018-05-20 09:13:13', '1', 'agualluvia', 807.15),
('2018-05-20 09:13:43', '1', 'temperatura', 26.2),
('2018-05-20 09:13:43', '1', 'agualluvia', 822.14),
('2018-05-20 09:14:13', '1', 'temperatura', 26.3),
('2018-05-20 09:14:13', '1', 'agualluvia', 837.15),
('2018-05-20 09:14:43', '1', 'temperatura', 26.3),
('2018-05-20 09:14:43', '1', 'agualluvia', 852.15),
('2018-05-20 09:15:13', '1', 'temperatura', 26.2),
('2018-05-20 09:15:13', '1', 'agualluvia', 867.15),
('2018-05-20 09:15:43', '1', 'temperatura', 26.2),
('2018-05-20 09:15:43', '1', 'agualluvia', 882.14),
('2018-05-20 09:16:13', '1', 'temperatura', 26.2),
('2018-05-20 09:16:13', '1', 'agualluvia', 897.14),
('2018-05-20 09:16:43', '1', 'temperatura', 26.2),
('2018-05-20 09:16:43', '1', 'agualluvia', 912.14),
('2018-05-20 09:17:13', '1', 'temperatura', 26.2),
('2018-05-20 09:17:13', '1', 'agualluvia', 927.14),
('2018-05-20 09:17:43', '1', 'temperatura', 26.2),
('2018-05-20 09:17:43', '1', 'agualluvia', 942.13),
('2018-05-20 09:18:13', '1', 'temperatura', 26.2),
('2018-05-20 09:18:13', '1', 'agualluvia', 957.13),
('2018-05-20 09:18:43', '1', 'temperatura', 26.1),
('2018-05-20 09:18:43', '1', 'agualluvia', 972.13),
('2018-05-20 09:19:13', '1', 'temperatura', 26.2),
('2018-05-20 09:19:13', '1', 'agualluvia', 987.13),
('2018-05-20 09:19:43', '1', 'temperatura', 26.2),
('2018-05-20 09:19:43', '1', 'agualluvia', 1002.13),
('2018-05-20 09:20:13', '1', 'temperatura', 26.1),
('2018-05-20 09:20:13', '1', 'agualluvia', 1017.12),
('2018-05-20 09:20:43', '1', 'temperatura', 26.1),
('2018-05-20 09:20:43', '1', 'agualluvia', 1032.13),
('2018-05-20 09:21:13', '1', 'temperatura', 26.1),
('2018-05-20 09:21:13', '1', 'agualluvia', 1047.14),
('2018-05-20 09:21:43', '1', 'temperatura', 26.1),
('2018-05-20 09:21:43', '1', 'agualluvia', 1061.95),
('2018-05-20 09:28:23', '1', 'temperatura', 23.5),
('2018-05-20 09:28:23', '1', 'agualluvia', 12.45),
('2018-05-20 09:28:52', '1', 'temperatura', 20.1),
('2018-05-20 09:28:52', '1', 'agualluvia', 27.44),
('2018-05-20 09:29:22', '1', 'temperatura', 19.8),
('2018-05-20 09:29:22', '1', 'agualluvia', 42.43),
('2018-05-20 09:29:52', '1', 'temperatura', 19.6),
('2018-05-20 09:29:52', '1', 'agualluvia', 57.11),
('2018-05-20 09:30:22', '1', 'temperatura', 19.6),
('2018-05-20 09:30:22', '1', 'agualluvia', 72.12),
('2018-05-20 09:30:52', '1', 'temperatura', 19.4),
('2018-05-20 09:30:52', '1', 'agualluvia', 87.09),
('2018-05-20 09:31:22', '1', 'temperatura', 19.3),
('2018-05-20 09:31:22', '1', 'agualluvia', 102.09),
('2018-05-20 09:31:52', '1', 'temperatura', 19.2),
('2018-05-20 09:31:52', '1', 'agualluvia', 117.08),
('2018-05-20 09:32:22', '1', 'temperatura', 19.2),
('2018-05-20 09:32:22', '1', 'agualluvia', 132.07),
('2018-05-20 09:32:52', '1', 'temperatura', 19.1),
('2018-05-20 09:32:52', '1', 'agualluvia', 147.07),
('2018-05-20 09:33:22', '1', 'temperatura', 19),
('2018-05-20 09:33:22', '1', 'agualluvia', 162.07),
('2018-05-20 09:33:52', '1', 'temperatura', 18.9),
('2018-05-20 09:33:52', '1', 'agualluvia', 177.06),
('2018-05-20 09:34:22', '1', 'temperatura', 18.8),
('2018-05-20 09:34:22', '1', 'agualluvia', 185.46),
('2018-05-20 09:34:52', '1', 'temperatura', 18.8),
('2018-05-20 09:34:52', '1', 'agualluvia', 190.55),
('2018-05-20 09:35:22', '1', 'temperatura', 18.7),
('2018-05-20 09:35:22', '1', 'agualluvia', 196.22),
('2018-05-21 00:14:20', '1', 'temperatura', 26);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuracionsensor`
--
ALTER TABLE `configuracionsensor`
  ADD CONSTRAINT `fk_ConfiguracionesSensor_Sensor_1` FOREIGN KEY (`id`, `tipo`, `marca`, `modelo`, `idestacion`) REFERENCES `sensor` (`id`, `tipo`, `marca`, `modelo`, `idestacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `fk_Incidencia_ReglaAviso1` FOREIGN KEY (`fechareglaaviso`) REFERENCES `reglaaviso` (`fecha_creada`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `medidasensor`
--
ALTER TABLE `medidasensor`
  ADD CONSTRAINT `fk_medidasensor_tipomedidasensor` FOREIGN KEY (`nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`) REFERENCES `tipomedidasensor` (`nombre`, `fechaconfigsensor`, `idsensor`, `idtiposensor`, `marcasensor`, `modelosensor`, `idestacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelodispositivo`
--
ALTER TABLE `modelodispositivo`
  ADD CONSTRAINT `fk_ModelosSensor_TiposDispositivo_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipodispositivo` (`id_tipo`);

--
-- Filtros para la tabla `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `fk_Sensor_Estacion1` FOREIGN KEY (`idestacion`) REFERENCES `estacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Sensor_ModelosDispositivo_1` FOREIGN KEY (`tipo`, `marca`, `modelo`) REFERENCES `modelodispositivo` (`id_tipo`, `marca`, `modelo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipomedidasensor`
--
ALTER TABLE `tipomedidasensor`
  ADD CONSTRAINT `fk_TipoMedida_ConfiguracionSensor1` FOREIGN KEY (`fechaconfigsensor`, `idsensor`, `idtiposensor`, `marcasensor`, `modelosensor`, `idestacion`) REFERENCES `configuracionsensor` (`fechahora`, `id`, `tipo`, `marca`, `modelo`, `idestacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_TipoMedida_ReglaAviso1` FOREIGN KEY (`fechareglaaviso`) REFERENCES `reglaaviso` (`fecha_creada`) ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
DROP EVENT `mytimer`$$
CREATE DEFINER=`dbo732013555`@`%` EVENT `mytimer` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-05-11 14:23:01' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO temporizador (fecha)
VALUES (Now())$$

DROP EVENT `eventosMysqlTutorial`$$
CREATE DEFINER=`dbo732013555`@`%` EVENT `eventosMysqlTutorial` ON SCHEDULE EVERY 1 HOUR STARTS '2012-10-04 23:59:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Ha sido facil, ¿verdad?' DO SELECT NOW() FROM DUAL$$

DROP EVENT `pruebaEventoJavi`$$
CREATE DEFINER=`dbo732013555`@`%` EVENT `pruebaEventoJavi` ON SCHEDULE EVERY 5 MINUTE STARTS '2018-05-12 00:00:00' ENDS '2018-05-13 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO SELECT NOW() FROM DUAL$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
