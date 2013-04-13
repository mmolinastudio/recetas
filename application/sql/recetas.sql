-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2013 a las 21:06:12
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `recetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_ingr`
--

CREATE TABLE IF NOT EXISTS `categoria_ingr` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_ingr`
--

INSERT INTO `categoria_ingr` (`id`, `nombre`) VALUES
(1, 'general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE IF NOT EXISTS `ingrediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `foto` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `foto` (`foto`),
  KEY `fk_ingrediente_categoria_ingr` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`id`, `nombre`, `categoria`, `foto`) VALUES
(1, 'patata', 1, NULL),
(2, 'tomate frito', 1, NULL),
(3, 'cerdo', 1, NULL),
(4, 'miel', 1, NULL),
(5, 'nata (para cocinar)', 1, NULL),
(6, 'pan', 1, NULL),
(7, 'pollo', 1, NULL),
(8, 'queso azul', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Noticia del dia', 'noticia-del-dia', 'bueno... esto es una noticia: Lorem Ipsum dolor sit aemet... perra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Receta sin nombre',
  `slug` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `desc_corta` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_larga` varchar(2048) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `t_preparacion` time DEFAULT NULL,
  `t_coccion` time DEFAULT NULL,
  `t_refrigeracion` time DEFAULT NULL,
  `num_raciones` tinyint(4) NOT NULL DEFAULT '2',
  `consejos` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `criticas` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dificultad` enum('Fácil','Media','Difícil') COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `nombre`, `slug`, `desc_corta`, `desc_larga`, `foto`, `t_preparacion`, `t_coccion`, `t_refrigeracion`, `num_raciones`, `consejos`, `criticas`, `dificultad`) VALUES
(1, 'Patatas Bravas', 'patatas-bravas', 'Descripcion corta', 'Descripcion Largaaa', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Media'),
(2, 'Costillas a la miel', 'Costillas-miel', 'Riquísimas costillas, generalmente de carne de cerdo, a la miel, cocinadas al horno.', 'Ponemos muy poco de aceite en una fuente, echamos un poco de sal a las costillas, las poenmos en la fuente y las metemos en el horno a 200 grados durante unos diez minutos. A continuación, les damos la vuelta y le echamos miel por encima. Las dejamos otros 10 minutos. Repetiremos la operacion de darles y la vuelta y echarles miel tres veces, cuatro o las que hagan falta. Se pueden hacer con unas patatas bravas, pero estas tardan menos en hacerse, por lo que no se ponen desde el principio.', NULL, '00:05:00', '00:45:00', '00:05:00', 2, 'Cuidado con el aceite. Debemos echar lo justo para que no se pegue, pero si echamos mucho las costillas se freirán.', 'Plato buenísimo con un aire a Juego de Tronos.', 'Fácil'),
(3, 'Pollo con salsa de queso azul', 'pollo-salsa-queso-azul', 'Si te gusta el queso fuerte, te gustará este plato. Imprescindible servir con pan.', 'Partimos los filetes de pollo en trozos pequeños, los freímos un poco hasta que veamos que estan casi hechos. Añadimos nata y queso azul, sin especias pero con algo de sal. Lo movemos durante un rato hasta que se haya fundido el queso y esté todo bien mezclado y lo dejamos unos minutos.', NULL, '00:05:00', '00:20:00', '00:05:00', 2, 'Servir con pan. ', NULL, 'Fácil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-ingrediente`
--

CREATE TABLE IF NOT EXISTS `receta-ingrediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receta_id` int(11) NOT NULL,
  `ingrediente_id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `unidad` varchar(30) NOT NULL COMMENT 'piezs, e.g.: ml, gr, brik, filetes fino, pizca,...',
  `prioridad` enum('obligatorio','alternativo','opcional') NOT NULL DEFAULT 'obligatorio',
  PRIMARY KEY (`id`),
  KEY `fk_receta_ingrediente_receta` (`receta_id`),
  KEY `fk_receta_ingrediente_ingrediente` (`ingrediente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `receta-ingrediente`
--

INSERT INTO `receta-ingrediente` (`id`, `receta_id`, `ingrediente_id`, `cantidad`, `unidad`, `prioridad`) VALUES
(1, 1, 1, 4, 'piezas', 'obligatorio'),
(2, 2, 3, 2, 'costillar grande', 'obligatorio'),
(3, 2, 4, 50, 'ml', 'obligatorio'),
(6, 2, 6, 0.5, 'barra', 'opcional'),
(7, 3, 7, 4, 'filetes corte fino, troceados', 'obligatorio'),
(8, 3, 8, 100, 'gr', 'obligatorio'),
(9, 3, 5, 1, 'brick 100ml', 'obligatorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1365794857, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'rosa marin', '74ee07e83b6bbaf521f07554ba245cc43b1edffc', NULL, 'rosaml82@hotmail.com', NULL, 'd82d9462444cbd5bdf830caf069f286c07087aac', 1365794603, NULL, 1365782232, 1365864682, 1, 'Rosa', 'Marin', 'mierder', '034-959-3238');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `ingrediente_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria_ingr` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `receta-ingrediente`
--
ALTER TABLE `receta-ingrediente`
  ADD CONSTRAINT `receta@002dingrediente_ibfk_1` FOREIGN KEY (`receta_id`) REFERENCES `receta` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `receta@002dingrediente_ibfk_2` FOREIGN KEY (`ingrediente_id`) REFERENCES `ingrediente` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
