-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2017 a las 00:30:55
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e-comerce`
--
CREATE DATABASE IF NOT EXISTS `e-comerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `e-comerce`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comenta`
--

CREATE TABLE `comenta` (
  `id_comen` int(11) NOT NULL,
  `id_usucom` int(11) NOT NULL,
  `id_pubcom` int(11) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `denunciado_com` tinyint(1) NOT NULL,
  `responde_com` varchar(400) NOT NULL,
  `respondido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comenta`
--

INSERT INTO `comenta` (`id_comen`, `id_usucom`, `id_pubcom`, `comentario`, `denunciado_com`, `responde_com`, `respondido`) VALUES
(11, 1, 14, 'Comentario eliminado por administrador', 0, 'Respuesta Eliminada por administrador', 1),
(13, 1, 14, 'lindo para hablar por chat', 0, '		si buenisimo verda martin  \r\n				   ', 1),
(15, 1, 14, 'hola\r\n', 0, '', 0),
(16, 1, 12, 'y peluda?', 0, 'si re peluda', 1),
(17, 11, 9, 'cuanto me haces por dos?', 0, '		  \r\n				   400 pesos LINCE', 1),
(18, 2, 9, 'Comentario eliminado por administrador', 0, 'Respuesta Eliminada por administrador', 1),
(19, 1, 14, 'Un comentario para probar un select', 0, '		  \r\n				   Responder', 1),
(20, 12, 17, 'aceptas tarjeta?', 0, '', 0),
(21, 2, 11, 'hola tengo una pregunta', 0, '', 0),
(22, 2, 11, 'hola tengo otra pregunta', 0, '', 0),
(23, 2, 9, 'es no es un perro grande!', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nombre_admin` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `accion` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id_log`, `id_admin`, `nombre_admin`, `fecha`, `accion`) VALUES
(1, 11, 'andy', '2017-06-22', 'Sanciono'),
(2, 11, 'andy', '2017-06-23', 'Sanciono'),
(3, 11, 'andy', '2017-06-23', 'PremiumSI'),
(4, 11, 'andy', '2017-06-23', 'PremiumNO'),
(5, 11, 'andy', '2017-06-23', 'Levantasancion'),
(6, 11, 'andy', '2017-06-24', 'Sanciono a 11'),
(7, 11, 'andy', '2017-06-24', 'Sanciono a 12'),
(8, 11, 'andy', '2017-06-24', 'Levanto sancion a 11'),
(9, 11, 'andy', '2017-06-24', 'Sanciono a 11'),
(10, 11, 'andy', '2017-06-24', 'Levanto sancion a 12'),
(11, 11, 'andy', '2017-06-24', 'Levanto sancion a 11'),
(12, 11, 'andy', '2017-06-24', 'Sanciono a 11'),
(13, 11, 'andy', '2017-06-24', 'Levanto sancion a 11'),
(14, 0, '', '0000-00-00', ''),
(15, 11, 'andy', '2017-06-24', 'Finalizo Publicacion NÂ° 15'),
(16, 11, 'andy', '2017-06-24', 'Quito Denuncia de publicacion NÂ° 12'),
(17, 11, 'andy', '2017-06-24', 'Verifico Pago de Transaccion NÂ° 2'),
(18, 11, 'andy', '2017-06-24', 'Quito denuncia de comentario NÂ° 16'),
(19, 11, 'andy', '2017-06-24', 'Elimino comentario NÂ° 18'),
(20, 11, 'andy', '2017-06-24', 'Elimino comentario NÂ° 18'),
(21, 11, 'andy', '2017-06-24', 'Sanciono a 1'),
(22, 11, 'andy', '2017-06-24', 'Levanto sancion a 1'),
(23, 11, 'andy', '2017-06-24', 'Sanciono a 1'),
(24, 11, 'andy', '2017-06-24', 'Levanto sancion a 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permuta`
--

CREATE TABLE `permuta` (
  `id_permuta` int(11) NOT NULL,
  `id_pub1` int(11) NOT NULL,
  `id_pub2` int(11) NOT NULL,
  `fechap` date DEFAULT NULL,
  `solicita_permuta` int(11) NOT NULL,
  `permutar` int(11) NOT NULL,
  `permuta_concretada` int(11) NOT NULL,
  `id_ususolper` int(11) NOT NULL,
  `id_usurecper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permuta`
--

INSERT INTO `permuta` (`id_permuta`, `id_pub1`, `id_pub2`, `fechap`, `solicita_permuta`, `permutar`, `permuta_concretada`, `id_ususolper`, `id_usurecper`) VALUES
(11, 12, 16, '2017-06-08', 1, 0, 0, 1, 2),
(12, 12, 16, '2017-06-08', 1, 0, 0, 1, 2),
(13, 11, 17, '2017-06-08', 1, 1, 1, 2, 1),
(14, 9, 14, '2017-06-08', 1, 0, 0, 2, 1),
(15, 9, 14, '2017-06-08', 1, 1, 0, 2, 1),
(16, 11, 12, '2017-06-08', 1, 1, 0, 2, 1),
(17, 9, 21, '2017-06-24', 1, 1, 0, 11, 1),
(18, 12, 21, '2017-06-24', 1, 1, 0, 11, 2),
(19, 12, 21, '2017-06-24', 1, 1, 0, 11, 2),
(20, 12, 21, '2017-06-24', 1, 1, 0, 11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_per` int(11) NOT NULL,
  `ci_per` int(11) DEFAULT NULL,
  `nick_per` varchar(20) DEFAULT NULL,
  `password_per` varchar(200) DEFAULT NULL,
  `nom1_per` varchar(20) DEFAULT NULL,
  `nom2_per` varchar(20) NOT NULL,
  `ape1_per` varchar(20) DEFAULT NULL,
  `ape2_per` varchar(20) DEFAULT NULL,
  `email_per` varchar(60) DEFAULT NULL,
  `tel_per` int(20) DEFAULT NULL,
  `dir_per` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_per`, `ci_per`, `nick_per`, `password_per`, `nom1_per`, `nom2_per`, `ape1_per`, `ape2_per`, `email_per`, `tel_per`, `dir_per`) VALUES
(1, 11111111, 'fabri', '5a249da2a61e7d4d05fdba7fa6a14507', 'fabri', 'fabri', 'olaza', 'benenatti', 'mail@mail.com', 14521, 'mi direccion'),
(2, 11111111, 'pichu', '12345', 'pi', 'ka', 'chu', 'pokemon', 'pikachu@picapica.com', 99090909, 'isla pokemon'),
(11, 11111111, 'andy', '231badb19b93e44f47da1bd64a8147f2', 'andy', 'andy', 'ape1', 'ape2', 'mail@mail.com', 999999999, 'la direccion'),
(12, 11111111, 'Usuario', '12345', 'nombre1', 'nombre2', 'apellido1', 'apellido2', 'Usuario@hotmail.com', 123123123, 'en algun lugar del mundo.'),
(13, 11111111, 'puto', '827ccb0eea8a706c4c34a16891f84e7b', 'puto', 'puto', 'puto', 'puto', 'puto@chumingalapocha', 234234244, 'puto'),
(14, 65656565, 'ertreter', '827ccb0eea8a706c4c34a16891f84e7b', 'rertertert', 'tertert', 'erterter', 'ertertert', 'tretretertert', 2147483647, 'etertertretet'),
(15, 11111111, 'gsgs', '7cdd347489383ef85cb3526af2a7a0aa', 'gsgs', 'gsgs', 'gsgs', 'gsgs', 'gsgs@gsgs', 24237000, 'gsgs'),
(16, 11111111, 'google', 'c822c1b63853ed273b89687ac505f9fa', 'google', 'google', 'google', 'google', 'google@google.com', 45555555, 'google'),
(17, 11111111, 'pachuchi', '0adf74d947875858a9ef3b704b8210d5', 'pachuchi', 'pachuchi', 'pachuchi', 'pachuchi', 'pachuchi@pachuchi', 2147483647, 'pachuchi'),
(18, 22222222, 'LINCE', '2ef0e020fb1a7cd686518922fd03eb9d', 'LINCE', 'LINCE', 'LINCE', 'LINCE', 'LINCE@asdasdasd', 23333333, 'LINCE'),
(19, 23424324, 'Macho', 'ef59e23314cdfb29c721a1a85f828807', 'Macho', 'Macho', 'Macho', 'Macho', 'macho@msvho.com', 23423424, 'Macho'),
(20, 38177122, 'donatelo', 'e1f2f91dfb76f57ee637e3ba2a1f3c96', 'donatelo', 'donatelo', 'donatelo', 'donatelo', 'donatelo@donatelo', 24444444, 'donatelo'),
(21, 45645647, 'cholo', '32eb50d8e68e5ebd93d0b3291de250cb', 'donatelo', 'donatelo', 'donatelo', 'donatelo', 'cholo@donatelo', 21123131, 'donatelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_pub` int(11) NOT NULL,
  `id_usup` int(11) NOT NULL,
  `nom_pub` varchar(40) DEFAULT NULL,
  `precio_pub` int(11) DEFAULT NULL,
  `stock_pub` int(11) DEFAULT NULL,
  `descripcion_pub` varchar(400) DEFAULT NULL,
  `img01_pub` varchar(100) DEFAULT NULL,
  `img02_pub` varchar(100) NOT NULL,
  `img03_pub` varchar(100) NOT NULL,
  `nuevo_pub` varchar(20) DEFAULT NULL,
  `fecha_pub` date DEFAULT NULL,
  `acepta_permuta_pub` varchar(20) DEFAULT NULL,
  `categoria_pub` varchar(20) DEFAULT NULL,
  `denuncia_pub` tinyint(1) DEFAULT NULL,
  `activa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_pub`, `id_usup`, `nom_pub`, `precio_pub`, `stock_pub`, `descripcion_pub`, `img01_pub`, `img02_pub`, `img03_pub`, `nuevo_pub`, `fecha_pub`, `acepta_permuta_pub`, `categoria_pub`, `denuncia_pub`, `activa`) VALUES
(9, 1, 'perro grande', 200, 1, 'descripcion local', 'perrogrande.png', '', '', 'nuevo', '2017-06-05', 'permuta', 'OTROS', 0, 'si'),
(10, 1, 'Gato', 300, 1, 'descripcion local', 'gato.jpg', '', '', 'usado', '2017-06-05', 'permuta', 'OTROS', 0, 'si'),
(11, 1, 'dragon grande', 450, 11, 'prueba modificacion', 'dragon.jpg', '', '', 'nuevo', '2017-06-04', 'permuta', 'OTROS', 0, 'no'),
(12, 2, 'OSO PELUDO', 10, 8, 'Negro y grande y peludo', 'oso peludo.jpg', 'oso2.jpg', 'oso3.jpg', 'usado', '2017-06-02', 'permuta', 'OTROS', 0, 'si'),
(14, 2, 'Prueba articulo', 123, 225, 'Prueba para ver si queda premium', '', '', '', 'nuevo', '2017-05-30', 'nopermuta', 'MODA', 1, 'no'),
(15, 1, 'rodri', 2, 1, 'ta divino', 'rodri.jpg', '', '', 'usado', '2017-06-02', 'permuta', 'MODA', 0, 'no'),
(16, 1, 'prueba activa', 233, 26, 'una prueba si ingresa este articulo', 'activa.jpg', '', '', 'nuevo', '2017-06-05', 'nopermuta', 'VEHICULOS', 0, 'si'),
(17, 2, 'prueba sobre calificacion.', 344, 121, 'una prueba para verificar ciertas cosas', '', '', '', 'usado', '2017-06-06', 'nopermuta', 'MODA', 0, 'si'),
(18, 12, 'PUERTA GRANDE MADERA', 3400, 2, 'PUERTA DE MADERA GRANDE PARA INTERIOR.\r\nMEDIDAS 190 cm x 120.\r\nMadera de pino', '', '', '', 'nuevo', '2017-06-10', 'nopermuta', 'HOGAR', 0, 'si'),
(19, 2, 'auto', 3000, 2, 'Joya nunca taxi', 'GetPhoto (7).jpg', '', '', 'usado', '2017-06-21', 'permuta', 'VEHICULOS', 0, 'si'),
(20, 2, 'chorizo', 30, 397, 'Caserito caserito', 'chorizo.png', '', '', 'nuevo', '2017-06-21', 'nopermuta', 'OTROS', 0, 'si'),
(21, 11, 'Ramo de flores', 2000, 56, 'Flores naturalmente naturales', 'd81b7b2628dfb3d206a54a09a9eed438.jpg', '', '', 'nuevo', '2017-06-21', 'permuta', 'OTROS', 0, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `id_trans` int(11) NOT NULL,
  `id_usut` int(11) NOT NULL,
  `id_pubt` int(11) NOT NULL,
  `precio_finalt` int(11) DEFAULT NULL,
  `fechat` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `calificaciont` int(1) DEFAULT NULL,
  `pago_comision` tinyint(1) NOT NULL,
  `comision_monto` int(11) NOT NULL,
  `comentariot` varchar(400) NOT NULL,
  `califico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id_trans`, `id_usut`, `id_pubt`, `precio_finalt`, `fechat`, `cantidad`, `calificaciont`, `pago_comision`, `comision_monto`, `comentariot`, `califico`) VALUES
(1, 2, 11, 500, '2017-05-29', 1, -1, 1, 0, 'una porqueria ', 1),
(2, 2, 11, 500, '2017-06-02', 1, 1, 1, 0, 'muy bueno', 1),
(3, 2, 11, 500, '2017-06-03', 1, 0, 0, 0, '', 0),
(6, 2, 10, 500, '2017-06-09', 1, 1, 0, 0, 'excelente', 1),
(7, 1, 12, 10, '2017-06-07', 5, -1, 0, 0, 'una cagada era blanco, chico y pelado', 1),
(9, 1, 14, 615, '2017-05-31', 5, 1, 1, 31, 'muy bueno', 1),
(10, 1, 12, 50, '2017-05-31', 5, 1, 0, 3, 'excelente', 1),
(12, 1, 12, 10, '2017-06-01', 1, 1, 0, 1, 'muy loco', 1),
(13, 1, 14, 123, '2017-06-01', 1, 1, 0, 6, 'excelente', 1),
(14, 1, 14, 123, '2017-06-01', 1, 1, 0, 6, 'Excelente super peludo el oso', 1),
(15, 1, 14, 123, '2017-06-01', 1, 1, 0, 6, 'muy bueno', 1),
(16, 1, 14, 123, '2017-06-01', 1, 1, 0, 6, 'muy bueno', 1),
(17, 1, 14, 123, '2017-06-01', 1, -1, 0, 6, 'recien comentario', 1),
(20, 1, 14, 369, '2017-06-01', 3, 0, 0, 18, '', 0),
(21, 1, 12, 10, '2017-06-01', 1, 0, 0, 1, '', 0),
(22, 1, 12, 50, '2017-06-01', 5, 0, 0, 3, '', 0),
(23, 1, 14, 369, '2017-06-02', 3, 0, 0, 18, '', 0),
(27, 11, 9, 200, '2017-06-02', 1, 0, 0, 10, '', 0),
(28, 11, 9, 200, '2017-06-02', 1, 0, 0, 10, '', 0),
(29, 11, 10, 600, '2017-06-02', 2, 0, 1, 30, '', 0),
(30, 1, 12, 10, '2017-06-06', 1, 0, 0, 1, '', 0),
(31, 2, 10, 300, '2017-06-07', 1, 1, 0, 15, 'muy bueno', 1),
(32, 1, 12, 10, '2017-06-07', 1, 0, 0, 1, '', 0),
(33, 2, 10, 300, '2017-06-09', 1, 0, 0, 15, '', 0),
(34, 12, 17, 344, '2017-06-10', 1, 0, 0, 17, '', 0),
(35, 13, 12, 10, '2017-07-05', 1, 0, 0, 1, '', 0),
(36, 11, 20, 30, '2017-07-05', 1, 0, 0, 2, '', 0),
(37, 11, 20, 30, '2017-07-05', 1, 0, 0, 2, '', 0),
(38, 11, 20, 30, '2017-07-05', 1, 0, 0, 2, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL COMMENT 'id usuario',
  `reputacion_usu` int(11) NOT NULL,
  `suspendido` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `id_personau` int(11) NOT NULL COMMENT 'FK id-persona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `reputacion_usu`, `suspendido`, `rol`, `premium`, `id_personau`) VALUES
(1, 0, 0, 'user', 0, 1),
(2, 0, 0, 'user', 1, 2),
(11, 0, 0, 'admin', 0, 11),
(12, 0, 0, 'user', 0, 12),
(13, 0, 0, 'user', 0, 13),
(14, 0, 0, 'user', 0, 14),
(15, 0, 0, 'user', 0, 15),
(16, 0, 0, 'user', 0, 16),
(17, 0, 0, 'user', 0, 17),
(18, 0, 0, 'user', 0, 18),
(19, 0, 0, 'user', 0, 19),
(20, 0, 0, 'user', 0, 20),
(21, 0, 0, 'user', 0, 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comenta`
--
ALTER TABLE `comenta`
  ADD PRIMARY KEY (`id_comen`,`id_usucom`,`id_pubcom`),
  ADD KEY `id_usucom` (`id_usucom`),
  ADD KEY `id_pubcom` (`id_pubcom`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `permuta`
--
ALTER TABLE `permuta`
  ADD PRIMARY KEY (`id_permuta`,`id_pub1`,`id_pub2`),
  ADD KEY `id_pub1` (`id_pub1`),
  ADD KEY `id_pub2` (`id_pub2`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_per`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_pub`,`id_usup`),
  ADD KEY `id_usup` (`id_usup`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id_trans`,`id_usut`,`id_pubt`),
  ADD KEY `id_usut` (`id_usut`),
  ADD KEY `id_pubt` (`id_pubt`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`,`id_personau`),
  ADD KEY `id_personau` (`id_personau`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comenta`
--
ALTER TABLE `comenta`
  MODIFY `id_comen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `permuta`
--
ALTER TABLE `permuta`
  MODIFY `id_permuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id usuario', AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comenta`
--
ALTER TABLE `comenta`
  ADD CONSTRAINT `comenta_ibfk_1` FOREIGN KEY (`id_usucom`) REFERENCES `usuario` (`id_usu`),
  ADD CONSTRAINT `comenta_ibfk_2` FOREIGN KEY (`id_pubcom`) REFERENCES `publicacion` (`id_pub`);

--
-- Filtros para la tabla `permuta`
--
ALTER TABLE `permuta`
  ADD CONSTRAINT `permuta_ibfk_1` FOREIGN KEY (`id_pub1`) REFERENCES `publicacion` (`id_pub`),
  ADD CONSTRAINT `permuta_ibfk_2` FOREIGN KEY (`id_pub2`) REFERENCES `publicacion` (`id_pub`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_usup`) REFERENCES `usuario` (`id_usu`);

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`id_usut`) REFERENCES `usuario` (`id_usu`),
  ADD CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`id_pubt`) REFERENCES `publicacion` (`id_pub`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_personau`) REFERENCES `persona` (`id_per`);
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"e-comerce\",\"table\":\"persona\"},{\"db\":\"e-comerce\",\"table\":\"usuario\"},{\"db\":\"e-comerce\",\"table\":\"transaccion\"},{\"db\":\"e-comerce\",\"table\":\"publicacion\"},{\"db\":\"e-comerce\",\"table\":\"permuta\"},{\"db\":\"e-comerce\",\"table\":\"log\"},{\"db\":\"e-comerce\",\"table\":\"comenta\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-05-12 17:11:20', '{\"lang\":\"es\",\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
