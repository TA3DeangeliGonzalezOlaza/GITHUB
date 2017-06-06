-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2017 a las 20:56:01
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

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
(11, 1, 14, 'Otra prueba', 1, 'prueba responde', 1),
(13, 1, 14, 'lindo para hablar por chat', 0, '', 0),
(15, 1, 14, 'hola\r\n', 0, '', 0),
(16, 1, 12, 'y peluda?', 1, 'si re peluda', 1),
(17, 11, 9, 'cuanto me haces por dos?', 0, '		  te los regalo no me dejan dormir\r\n				   ', 1),
(18, 2, 9, 'prueba si comentario queda en "no"', 0, '', 0),
(19, 1, 14, 'Un comentario para probar un select', 0, '		  \r\n				   Responder', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permuta`
--

CREATE TABLE `permuta` (
  `id_permuta` int(11) NOT NULL,
  `id_pub1` int(11) NOT NULL,
  `id_pub2` int(11) NOT NULL,
  `fechap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_per` int(11) NOT NULL,
  `ci_per` int(11) DEFAULT NULL,
  `nick_per` varchar(20) DEFAULT NULL,
  `password_per` varchar(20) DEFAULT NULL,
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
(1, 11111111, 'fabri', 'fabri', 'fabri', 'fabri', 'olaza', 'olaza', 'mail', 14521, 'direccion'),
(2, 11111111, 'pichu', 'pichu', 'pi', 'ka', 'chu', 'pokemon', 'pikachu@picapica.com', 99090909, 'isla pokemon'),
(11, 11111111, 'andres', 'andres', 'andres', 'andres', 'Deangeli', 'Deangeli', 'andres@bla.com', 95555555, 'direccion');

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
  `img01_pub` varchar(20) DEFAULT NULL,
  `img02_pub` varchar(20) NOT NULL,
  `img03_pub` varchar(20) NOT NULL,
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
(9, 1, 'perro grande', 200, 3, 'descripcion local', '', '', '', 'nuevo', '2017-06-05', 'permuta', 'OTROS', 0, 'si'),
(10, 1, 'Gato', 300, 3, 'descripcion local', '', '', '', 'usado', '2017-06-05', 'permuta', 'OTROS', 0, 'si'),
(11, 1, 'dragon grande', 450, 12, 'prueba modificacion', '', '', '', 'nuevo', '2017-06-04', 'permuta', 'OTROS', 0, 'si'),
(12, 2, 'Sodape Bastante grande', 10, 11, 'Negra y grande y peluda', '', '', '', 'usado', '2017-06-02', 'permuta', 'OTROS', 1, 'si'),
(14, 2, 'Prueba articulo', 123, 227, 'Prueba para ver si queda premium', '', '', '', 'nuevo', '2017-05-30', 'nopermuta', 'MODA', 0, 'si'),
(15, 1, 'rodri', 2, 1, 'ta divino', '', '', '', 'usado', '2017-06-02', 'permuta', 'MODA', 0, 'no'),
(16, 1, 'prueba activa', 233, 34, 'una prueba si ingresa este articulo', '', '', '', 'nuevo', '2017-06-05', 'nopermuta', 'VEHICULOS', 0, 'si'),
(17, 2, 'prueba sobre calificacion.', 344, 123, 'una prueba para verificar ciertas cosas', '', '', '', 'usado', '2017-06-06', 'nopermuta', 'MODA', 0, 'si');

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
  `comision_monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id_trans`, `id_usut`, `id_pubt`, `precio_finalt`, `fechat`, `cantidad`, `calificaciont`, `pago_comision`, `comision_monto`) VALUES
(1, 2, 11, 500, '0000-00-00', 1, 0, 0, 0),
(2, 2, 11, 500, '0000-00-00', 1, 0, 0, 0),
(3, 2, 11, 500, '0000-00-00', 1, 0, 0, 0),
(6, 2, 10, 500, '0000-00-00', 1, 0, 0, 0),
(7, 1, 12, 10, '0000-00-00', 5, 0, 0, 0),
(9, 1, 14, 615, '2017-05-31', 5, NULL, 0, 31),
(10, 1, 12, 50, '2017-05-31', 5, NULL, 0, 3),
(12, 1, 12, 10, '2017-06-01', 1, NULL, 0, 1),
(13, 1, 14, 123, '2017-06-01', 1, NULL, 0, 6),
(14, 1, 14, 123, '2017-06-01', 1, NULL, 0, 6),
(15, 1, 14, 123, '2017-06-01', 1, NULL, 0, 6),
(16, 1, 14, 123, '2017-06-01', 1, NULL, 0, 6),
(17, 1, 14, 123, '2017-06-01', 1, NULL, 0, 6),
(20, 1, 14, 369, '2017-06-01', 3, NULL, 0, 18),
(21, 1, 12, 10, '2017-06-01', 1, NULL, 0, 1),
(22, 1, 12, 50, '2017-06-01', 5, NULL, 0, 3),
(23, 1, 14, 369, '2017-06-02', 3, NULL, 0, 18),
(27, 11, 9, 200, '2017-06-02', 1, NULL, 0, 10),
(28, 11, 9, 200, '2017-06-02', 1, NULL, 0, 10),
(29, 11, 10, 600, '2017-06-02', 2, NULL, 0, 30),
(30, 1, 12, 10, '2017-06-06', 1, 0, 0, 1);

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
(1, 5, 0, 'admin', 0, 1),
(2, 5, 0, 'admin', 1, 2),
(11, 0, 0, 'user', 0, 11);

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
  MODIFY `id_comen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `permuta`
--
ALTER TABLE `permuta`
  MODIFY `id_permuta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id usuario', AUTO_INCREMENT=12;
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
('root', '{"angular_direct":"direct","snap_to_grid":"off","relation_lines":"true"}');

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
('root', '[{"db":"e-comerce","table":"transaccion"},{"db":"e-comerce","table":"comenta"},{"db":"e-comerce","table":"publicacion"},{"db":"e-comerce","table":"persona"},{"db":"e-comerce","table":"permuta"},{"db":"e-comerce","table":"usuario"},{"db":"programacion","table":"esp_sec"},{"db":"programacion","table":"sector"},{"db":"programacion","table":"lugar"},{"db":"programacion","table":"espectaculo"}]');

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
('root', '2016-10-28 16:46:41', '{"lang":"es","collation_connection":"utf8mb4_unicode_ci"}');

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
-- Base de datos: `programacion`
--
CREATE DATABASE IF NOT EXISTS `programacion` DEFAULT CHARACTER SET utf32 COLLATE utf32_general_ci;
USE `programacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `tipo_cat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `tipo_cat`) VALUES
(1, 'cine'),
(2, 'teatro'),
(3, 'danza'),
(4, 'musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_sec`
--

CREATE TABLE `esp_sec` (
  `id_esp_sec` int(11) NOT NULL,
  `id_esp` int(11) NOT NULL,
  `id_sec` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `esp_sec`
--

INSERT INTO `esp_sec` (`id_esp_sec`, `id_esp`, `id_sec`, `precio`) VALUES
(4, 2, 1, 100),
(5, 2, 2, 100),
(6, 2, 3, 150),
(7, 3, 4, 200),
(8, 3, 5, 200),
(9, 3, 6, 400),
(10, 4, 1, 100),
(11, 4, 2, 100),
(12, 4, 3, 150),
(13, 5, 6, 200),
(14, 5, 7, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espectaculo`
--

CREATE TABLE `espectaculo` (
  `id_esp` int(11) NOT NULL,
  `nom_esp` varchar(30) NOT NULL,
  `des_esp` varchar(120) NOT NULL,
  `img_esp` varchar(30) NOT NULL,
  `id_lug` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `fec_esp` date NOT NULL,
  `entradas_disp` int(11) NOT NULL,
  `activo_esp` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `espectaculo`
--

INSERT INTO `espectaculo` (`id_esp`, `nom_esp`, `des_esp`, `img_esp`, `id_lug`, `id_cat`, `fec_esp`, `entradas_disp`, `activo_esp`) VALUES
(2, 'Batman 2', 'pelicula de batman', 'imgbat2.jpg', 1, 1, '2016-10-10', 128, 'si'),
(3, 'ballet ruso', 'rusos disfrazados de osos amanerados bailando', 'balrus.jpg', 2, 3, '2016-11-05', 496, 'si'),
(4, 'Terminator', 'Descripcion de la pelicula', 'termi.jpg', 1, 1, '2016-09-13', 150, 'si'),
(5, 'Rock', 'Descripcion de la Rock', 'rock.jpg', 3, 4, '2016-10-22', 1000, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id_lug` int(11) NOT NULL,
  `nom_lug` varchar(30) NOT NULL,
  `dir_lug` varchar(30) NOT NULL,
  `activo_lug` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id_lug`, `nom_lug`, `dir_lug`, `activo_lug`) VALUES
(1, 'movie', 'mtv shopping', 'si'),
(2, 'teatro solis', 'bs.aires 11000', 'si'),
(3, 'teatro de verano', 'rambla pte.wilson', 'si'),
(4, 'auditorio del sodre', 'andes esq. mercedes 11100', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id_sec` int(11) NOT NULL,
  `id_lug` int(11) NOT NULL,
  `nom_sec` varchar(30) NOT NULL,
  `activo_sec` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id_sec`, `id_lug`, `nom_sec`, `activo_sec`) VALUES
(1, 1, 'sala1', 'si'),
(2, 1, 'sala2', 'si'),
(3, 1, 'sala3', 'si'),
(4, 2, 'plateaA', 'si'),
(5, 2, 'plateaB', 'si'),
(6, 2, 'palco', 'si'),
(7, 3, 'plateaA', 'si'),
(8, 3, 'plateaB', 'si'),
(9, 4, 'sectorA', 'si'),
(10, 4, 'sectorB', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_agre`
--

CREATE TABLE `usu_agre` (
  `id_usu_agr` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `id_sec` int(11) NOT NULL,
  `id_esp` int(11) NOT NULL,
  `cantEnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usu_agre`
--

INSERT INTO `usu_agre` (`id_usu_agr`, `id_usu`, `id_sec`, `id_esp`, `cantEnt`) VALUES
(1, 10, 1, 2, 100),
(2, 10, 1, 2, 100),
(3, 10, 1, 2, 100),
(4, 10, 1, 2, 100),
(5, 10, 1, 2, 100),
(6, 10, 1, 2, 100),
(7, 10, 1, 2, 100),
(8, 10, 1, 2, 100),
(9, 10, 1, 2, 100),
(10, 10, 3, 2, 1),
(11, 10, 1, 2, 1),
(12, 10, 1, 2, 3),
(13, 10, 1, 2, 1),
(14, 10, 1, 2, 1),
(15, 10, 1, 2, 1),
(16, 10, 1, 2, 1),
(17, 10, 1, 2, 1),
(18, 10, 1, 2, 1),
(21, 10, 6, 3, 4),
(22, 10, 1, 2, 3),
(23, 10, 1, 2, 1),
(24, 8, 1, 2, 1),
(25, 8, 1, 2, 4),
(26, 8, 2, 2, 2),
(27, 8, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `ci_usu` int(11) NOT NULL,
  `nom_usu` varchar(30) NOT NULL,
  `ape_usu` varchar(30) NOT NULL,
  `correo_usu` varchar(30) NOT NULL,
  `cel_usu` int(11) NOT NULL,
  `tipo_usu` varchar(30) NOT NULL,
  `login_usu` varchar(20) NOT NULL,
  `pass_usu` varchar(16) NOT NULL,
  `num_tarj` varchar(30) NOT NULL,
  `cod_tarj` int(3) NOT NULL,
  `fec_ven_tar` date NOT NULL,
  `activo_usu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `ci_usu`, `nom_usu`, `ape_usu`, `correo_usu`, `cel_usu`, `tipo_usu`, `login_usu`, `pass_usu`, `num_tarj`, `cod_tarj`, `fec_ven_tar`, `activo_usu`) VALUES
(1, 42655891, 'pablo', 'real', 'pabloreal@gmail.com', 94123456, 'admin', 'admin', 'admin', '2147483647', 576, '2004-05-18', 'si'),
(2, 52344321, 'candela', 'suarez', 'candelasuarez@gmail.com', 96876543, 'Usuario', 'cande', 'cande', '2147483647', 195, '0000-00-00', 'si'),
(3, 28214329, 'antonio', 'pacheco', 'antoniopacheco@gmail.com', 94189155, 'Usuario', 'tony', 'tony', '2147483647', 777, '2018-05-10', 'si'),
(4, 11111111, 'cacho', 'cacho', 'cacho@cacho.com', 99999999, 'Usuario', 'cacho', 'cacho', '2147483647', 123, '2016-12-01', 'no'),
(5, 11111111, 'cato', 'cato', 'cato@cato.com', 95456393, 'Usuario', 'cato', 'cato', '1234567812345678', 987, '2005-11-11', 'si'),
(6, 11111111, 'Perro', 'Perro', 'perro@perro.com', 99999999, 'Usuario', 'Perro', 'Perro', '3214654798746541', 654, '0000-00-00', 'si'),
(7, 11111111, 'andres', 'deangeli', 'come@poronga.com', 456123789, 'Usuario', 'andres', 'adnres', '654564697897987', 3213, '2121-01-23', ''),
(8, 11111111, 'Fabrizio', 'Olaza', 'perro@gato.com', 94967574, 'Usuario', 'fabri', 'fabri', '1234656498760345', 234, '2016-11-03', 'si'),
(10, 11111111, 'gato', 'gato', 'gato@gato.com', 99123123, 'Usuario', 'gato', 'gato', '1234656498760345', 654, '2016-11-09', 'si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `esp_sec`
--
ALTER TABLE `esp_sec`
  ADD PRIMARY KEY (`id_esp_sec`,`id_esp`,`id_sec`),
  ADD KEY `id_esp` (`id_esp`),
  ADD KEY `id_sec` (`id_sec`);

--
-- Indices de la tabla `espectaculo`
--
ALTER TABLE `espectaculo`
  ADD PRIMARY KEY (`id_esp`,`id_lug`,`id_cat`),
  ADD KEY `id_lug` (`id_lug`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id_lug`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id_sec`,`id_lug`),
  ADD KEY `id_lug` (`id_lug`);

--
-- Indices de la tabla `usu_agre`
--
ALTER TABLE `usu_agre`
  ADD PRIMARY KEY (`id_usu_agr`,`id_usu`,`id_sec`,`id_esp`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_sec` (`id_sec`),
  ADD KEY `id_esp` (`id_esp`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `esp_sec`
--
ALTER TABLE `esp_sec`
  MODIFY `id_esp_sec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `espectaculo`
--
ALTER TABLE `espectaculo`
  MODIFY `id_esp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id_lug` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usu_agre`
--
ALTER TABLE `usu_agre`
  MODIFY `id_usu_agr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `esp_sec`
--
ALTER TABLE `esp_sec`
  ADD CONSTRAINT `esp_sec_ibfk_1` FOREIGN KEY (`id_esp`) REFERENCES `espectaculo` (`id_esp`),
  ADD CONSTRAINT `esp_sec_ibfk_2` FOREIGN KEY (`id_sec`) REFERENCES `sector` (`id_sec`);

--
-- Filtros para la tabla `espectaculo`
--
ALTER TABLE `espectaculo`
  ADD CONSTRAINT `espectaculo_ibfk_1` FOREIGN KEY (`id_lug`) REFERENCES `lugar` (`id_lug`),
  ADD CONSTRAINT `espectaculo_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);

--
-- Filtros para la tabla `sector`
--
ALTER TABLE `sector`
  ADD CONSTRAINT `sector_ibfk_1` FOREIGN KEY (`id_lug`) REFERENCES `lugar` (`id_lug`);

--
-- Filtros para la tabla `usu_agre`
--
ALTER TABLE `usu_agre`
  ADD CONSTRAINT `usu_agre_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`),
  ADD CONSTRAINT `usu_agre_ibfk_2` FOREIGN KEY (`id_sec`) REFERENCES `sector` (`id_sec`),
  ADD CONSTRAINT `usu_agre_ibfk_3` FOREIGN KEY (`id_esp`) REFERENCES `espectaculo` (`id_esp`);
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
