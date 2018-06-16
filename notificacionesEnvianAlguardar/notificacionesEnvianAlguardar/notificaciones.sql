-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-06-2018 a las 14:22:10
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notificaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listanegra`
--

CREATE TABLE `listanegra` (
  `ip` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `imagen_url` varchar(250) NOT NULL,
  `audiencia` varchar(50) NOT NULL DEFAULT 'computer',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enviado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `titulo`, `mensaje`, `imagen_url`, `audiencia`, `fecha`, `enviado`) VALUES
(33, 'mensaje', 'otro', 'adminNotificaciones/user_images/904727.jpg', 'computer', '2018-06-13 11:07:42', 0),
(34, 'mensaje', 'otro', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/988100.jpg', 'computer', '2018-06-13 11:08:39', 0),
(35, 'mensaje', 'otro', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/858394.jpg', 'computer', '2018-06-13 11:09:22', 0),
(36, 'Esto es un titulo para notificacion', '1546546565465', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/116118.jpg', 'computer', '2018-06-13 11:09:55', 0),
(37, 'mensaje', 'otro', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/24137.jpg', 'computer', '2018-06-13 11:10:25', 0),
(38, 'mensaje', 'otro', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/769352.jpg', 'computer', '2018-06-13 11:10:43', 0),
(39, 'mensaje', 'otro', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/589568.jpg', 'computer', '2018-06-13 11:27:16', 0),
(40, 'Esto es un titulo para notificacion', 'adsfdsa asd dasf dasf ads', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/736219.jpg', 'computer', '2018-06-13 11:27:50', 0),
(41, 'mensaje', 'otro', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/121858.jpg', 'computer', '2018-06-13 11:28:56', 0),
(42, 'mensaje', 'otro', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/980126.jpg', 'computer', '2018-06-13 11:29:10', 0),
(43, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/98852.jpg', 'computer', '2018-06-13 11:29:47', 0),
(44, '', '', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/231465.', 'computer', '2018-06-13 11:29:57', 0),
(45, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/622982.jpg', 'computer', '2018-06-13 11:30:13', 0),
(46, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/674829.jpg', 'computer', '2018-06-13 11:30:39', 0),
(47, 'adsf', 'adsfdasfds adsf asd', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/804051.png', 'computer', '2018-06-13 11:31:37', 0),
(48, 'adsf', 'adsfdasfds adsf asd', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/190895.png', 'computer', '2018-06-13 11:32:00', 0),
(49, 'adsf', 'adsfdasfds adsf asd', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/34572.png', 'computer', '2018-06-13 11:32:24', 0),
(50, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/513579.jpg', 'computer', '2018-06-13 11:41:17', 0),
(51, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/1119.jpg', 'computer', '2018-06-13 11:46:00', 0),
(52, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/398873.jpg', 'computer', '2018-06-13 11:46:14', 0),
(53, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/855629.jpg', 'computer', '2018-06-13 11:46:21', 0),
(54, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/471313.jpg', 'computer', '2018-06-13 11:55:39', 0),
(55, 'DESDES ADMIN', 'ADIOS', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/867214.jpg', 'computer', '2018-06-13 11:56:34', 0),
(56, 'Esto es un titulo para notificacion', 'adsfdsa asd dasf dasf ads', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/382952.jpg', 'computer', '2018-06-13 11:58:05', 0),
(57, 'Esto es un titulo para notificacion', 'adsfdsa asd dasf dasf ads', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/759511.jpg', 'computer', '2018-06-13 11:58:16', 0),
(58, 'Esto es un titulo para notificacion', 'adsfdsa asd dasf dasf ads', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/85799.jpg', 'computer', '2018-06-13 11:58:51', 0),
(59, 'Esto es un titulo para notificacion', 'adsfdsa asd dasf dasf ads', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/898754.jpg', 'computer', '2018-06-13 11:59:14', 0),
(60, 'Esto es un titulo para notificacion', 'adsfdsa asd dasf dasf ads', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/962198.jpg', 'computer', '2018-06-13 12:02:36', 0),
(61, 'Esto es un titulo para notificacion', 'adsfdsa asd dasf dasf ads', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/470981.jpg', 'computer', '2018-06-13 12:02:36', 0),
(62, 'click', 'click', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/225680.jpg', 'computer', '2018-06-13 12:04:52', 0),
(63, 'click', 'click', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/54454.jpg', 'computer', '2018-06-13 12:05:25', 0),
(64, 'click', 'click', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/33331.jpg', 'computer', '2018-06-13 12:05:38', 0),
(65, 'click2', 'click2', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/554593.png', 'computer', '2018-06-13 12:07:44', 0),
(66, 'Esto es un titulo para notificacion', 'asdf asdf asd 45546546546 546 546 546 546 546 546 546 546 546 546546 46 546 546 546 546 546 546546 546 546 546 546546 546 546 546546 546 546 546546 546 546 5 546 546546 546 546 546 546546 546 546 546 ', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/531106.png', 'computer', '2018-06-13 12:10:05', 0),
(67, 'Esto es un titulo para notificacion', 'asdf asdf asd 45546546546 546 546 546 546 546 546 546 546 546 546546 46 546 546 546 546 546 546546 546 546 546 546546 546 546 546546 546 546 546546 546 546 5 546 546546 546 546 546 546546 546 546 546 ', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/639615.png', 'computer', '2018-06-13 12:13:20', 0),
(68, 'Esto es un titulo para notificacion', 'asdf asdf asd 45546546546 546 546 546 546 546 546 546 546 546 546546 46 546 546 546 546 546 546546 546 546 546 546546 546 546 546546 546 546 546546 546 546 5 546 546546 546 546 546 546546 546 546 546 ', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/590576.png', 'computer', '2018-06-13 12:13:35', 0),
(69, 'javie es la caña', 'ouh yeah!!! birra!!!', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/732434.png', 'computer', '2018-06-13 12:14:15', 0),
(70, 'click3', '3', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/53944.jpg', 'computer', '2018-06-13 12:20:57', 0),
(71, 'Esto es un titulo para notificacion', 'asdf asdf asd 45546546546 546 546 546 546 546 546 546 546 546 546546 46 546 546 546 546 546 546546 546 546 546 546546 546 546 546546 546 546 546546 546 546 5 546 546546 546 546 546 546546 546 546 546 ', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/48452.png', 'computer', '2018-06-13 12:21:34', 0),
(72, '4', '4', 'https://pwa.desarrollando-web.es/adminNotificaciones/user_images/458838.jpg', 'computer', '2018-06-13 12:21:58', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id` int(4) NOT NULL,
  `token` varchar(300) NOT NULL,
  `dispositivo` varchar(50) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `tipo` enum('1','2') NOT NULL DEFAULT '1',
  `latitud` varchar(20) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `dispositivo`, `ip`, `created_date`, `tipo`, `latitud`, `longitud`, `email`, `password`) VALUES
(46, 'ex9NCk2Jdfs:APA91bGq-Azx6qakk5ve_TPQY2dzX4ZBWvKFfT5zg23lyFw3Tc0qvvrx0OUotL8w5D8fM-WXFpJ-AzUgaC-emJVRswf3-5_0DtkK6gsfwEXYL3Yu1a668haktawJHPpGzwkmradFkYLF', 'computer', '80.28.220.118', '2018-06-13 10:34:39', '1', '37.8881751', '-4.7793835', 'ihor', NULL),
(49, 'fw9fZS_wFzs:APA91bFwUBCbOgB0R73rx_qTAYJR_bqDSTRZaptxCIIIImw1TBwBD1Cbm2TuDFLbfU0W_nO0Hd72yhPsKBF_BFWMkTGKURzatHa_E0MsSwjT5yooX_IzMaf_k8NggZcn8d4b01PVPUzp', 'phone', '31.4.194.249', '2018-06-13 11:28:39', '1', '37.8932755', '-4.7757764', 'ihor movil', NULL),
(50, 'fRp5gCj-JXo:APA91bGzi7DuYpfZWQiHbZDq1HZ4rhnLnhnvp1bNrcFtd9PDxlBcbEKZ9Fq7DIDAK0Vd09lo2WXmjV56c6ZsRkpnB9o2ZLG6gIAs9BbOR7MAl-326TO0sfnP4Sjm4wRONsZr__U5Q4HH', 'phone', '176.83.129.210', '2018-06-13 12:03:16', '1', '37.8933171', '-4.7757603', 'javi movil', NULL),
(51, 'dkWfHkteVOk:APA91bH2h8sDzyH9cJcFh9-K6h_LUQQc9Ee6PEX18iZeDMoKavILvAkRZSYpHjDlA7NPJsokKPrI2RYWgRlxR1TKAaeZ44aWRxUhef2rX1zqZW29Mrnys4EyUr9eSMITfogtj1NUwEM0', 'computer', '80.28.220.118', '2018-06-13 12:03:10', '1', '37.8881751', '-4.7793835', 'javi', NULL),
(52, 'cHGRszBBnWM:APA91bFBBXNO7Z2clDRDQgEa6-wDkW5fg7J_1Gwz4g910MN4bhPEeutUtCSy_K2ImQyClrVHeePcAUKk4KxFH2fCLyceMppMo3YQPBWZvwWvCfCzI269UYvw0CDOFaZKIcl92-5eu_4X', 'computer', '81.40.54.232', '2018-06-13 12:13:02', '1', '37.8934102', '-4.7757163', 'javi mac', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `regId` varchar(254) COLLATE latin1_spanish_ci NOT NULL,
  `dispositivo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ip` varchar(16) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` enum('1','2') COLLATE latin1_spanish_ci NOT NULL DEFAULT '1',
  `latitud` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `longitud` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `regId`, `dispositivo`, `ip`, `fecha`, `tipo`, `latitud`, `longitud`, `email`, `password`) VALUES
(128, 'f4LRMs4B1Vw:APA91bGpvlFlQomn34dwwEFlxuihNiriPFS0VlH_0WrRrONYcwL7UIkIXUYaMQfD1lYdsrsRoDQyW1UXk6gF4azQYiT98KsSLnJGeyR4f88fNimypa54ctHTzOcFm4FGPYAf4hjr6uDo', 'computer', '80.28.220.118', '2018-06-12 07:22:35', '2', '', '', 'javiealiaga@gmail.com', 'piramide');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
