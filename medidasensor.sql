-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Servidor: db732013555.db.1and1.com
-- Tiempo de generación: 01-05-2018 a las 18:19:46
-- Versión del servidor: 5.5.59-0+deb7u1-log
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidasensor`
--

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
  PRIMARY KEY (`fecha_medida`),
  UNIQUE KEY `fecha_medida` (`fecha_medida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `medidasensor`
--

INSERT INTO `medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES
('2018-04-30 00:00:00', 'sa1', '2018-04-15 00:00:00', 'AN1', 2, 'ANEMO KMS', 'MODELO - 1 ', 'STC1', '20.000'),
('2018-05-01 00:00:00', 'sth1', '2018-05-01 02:05:32', 'TH1', 1, 'AOSONG', 'DHT22', 'SCT2', '50.000'),
('2018-05-01 01:05:23', 'sb1', '2018-04-15 00:00:00', 'AN1', 2, 'ANEMO KMS', 'MODELO - 1', 'STC1', '20.000'),
('2018-05-01 02:05:32', 'spl1', '2018-05-01 02:05:32', 'TH1', 1, 'AOSONG', 'DHT22', 'SCT2', '50.000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
