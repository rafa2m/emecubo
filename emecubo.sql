-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Servidor: db732013555.db.1and1.com
-- Tiempo de generación: 06-05-2018 a las 14:18:11
-- Versión del servidor: 5.5.60-0+deb7u1-log
-- Versión de PHP: 5.4.45-0+deb7u13

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
('2018-04-12 00:00:00', 'AN1', 2, 'ANEMO KMS', 'MODELO - 1 ', 'STC1', 1.5, '+-100', NULL, NULL, '2018-04-15 00:00:00'),
('2018-04-13 00:00:00', 'SMD1', 3, 'SMD BR', 'modelo1', 'STC1', 1, '+-100', NULL, NULL, '2018-04-15 00:00:00'),
('2018-04-14 00:00:00', 'PL1', 4, 'LLUVIA R', 'MODELO1', 'STC1', 1.7, '+-1500', NULL, NULL, '2018-04-15 00:00:00'),
('2018-04-15 00:00:00', 'TH1', 1, 'AOSONG', 'DHT22', 'STC1', 2, '+-2grados', NULL, NULL, '2018-04-15 00:00:00');

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
('SCT2', 3.0001, 11.2222, 4, '2018-04-29 00:00:00', 'Estación 2', 'segunda estación para mostrar en el listado general', 42, 'ARDUINOYUM2'),
('STC1', 5.28017, 37.6982, 2, '2018-04-15 11:25:00', 'ESTACION 1', 'primera estación', 55, 'ARDUINOYUM1');

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
(1, 'AOSONG', 'DHT22', 'más menos 2 grados en sensibilidad'),
(2, 'ANEMO KMS', 'MODELO - 1 ', 'calibrar cada 15 días'),
(3, 'SMD BR', 'modelo1', 'tener en cuenta para cálculos la altitud de la estación '),
(4, 'LLUVIA R', 'MODELO1', 'cuidado con la conversión de datos'),
(5, 'AOSONG', 'DHT11', 'su rango de medicion es pequeño y mayor de error');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

DROP TABLE IF EXISTS `pruebas`;
CREATE TABLE IF NOT EXISTS `pruebas` (
  `nombre` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`nombre`) VALUES
('2018-05-01 02:05:32'),
('2018-05-01 02:05:32'),
('2018-05-01 02:05:32');

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
  `tipo_comunicacion` int(11) DEFAULT NULL COMMENT 'Digital o analógica',
  `formato_integracion` int(11) DEFAULT NULL,
  `canal` int(11) DEFAULT NULL COMMENT 'Canal al que está conectado en el datalogger (arduino)',
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
('AN1', 2, 'ANEMO KMS', 'MODELO - 1 ', 'STC1', 'colocado en la punta de la estacion', 1, NULL, 3, 1, '3-5.5V'),
('PL1', 4, 'LLUVIA R', 'MODELO1', 'STC1', 'captura los metros cúbicos caídos en la zona', 1, NULL, 2, 1, '3-5.5V'),
('SMD1', 3, 'SMD BR', 'modelo1', 'STC1', 'barómetro colocado en la mitad de la estación', 1, NULL, 4, 1, '3-5.5V'),
('TH1', 1, 'AOSONG', 'DHT22', 'STC1', NULL, NULL, NULL, NULL, 0, NULL),
('TH2', 1, 'AOSONG', 'DHT22', 'SCT2', 'es peor que dht22 ', 1, 1, 6, 0, 'max 5.5V');

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
(1, 'TERMOHIGROMETRO', 'mide humedad y temperatura'),
(2, 'ANEMOVELETA', 'mide la fuerza del viento'),
(3, 'BAROMETRO', 'mide presión atmosférica'),
(4, 'PLUVIOMETRO', 'cantidad de agua precipitada'),
(5, 'TERMOHIGROMETRO', NULL);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
