-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2013 a las 16:18:48
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
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receta_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` float NOT NULL,
  `unidad` varchar(30) NOT NULL,
  `prioridad` enum('obligatorio','alternativo','opcional') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receta_id` (`receta_id`,`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `receta_id`, `nombre`, `cantidad`, `unidad`, `prioridad`) VALUES
(1, 1, 'tomate frito', 1, 'brick 100ml', 'obligatorio'),
(2, 1, 'Patata', 4, 'piezas', 'obligatorio'),
(3, 1, 'Pimienta', 1, 'pizca', 'obligatorio'),
(4, 2, 'cerdo', 1, 'costillares grandes', 'obligatorio'),
(5, 2, 'miel', 50, 'ml', 'obligatorio'),
(6, 3, 'nata (para cocinar)', 1, 'brick 100ml', 'obligatorio'),
(7, 2, 'pan', 0.5, 'barra', 'obligatorio'),
(8, 3, 'pollo', 4, 'filetes, corte fino troceados', 'obligatorio'),
(9, 3, 'queso azul', 100, 'gr', 'obligatorio');

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
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Receta sin nombre',
  `slug` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `desc_corta` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_larga` text COLLATE utf8_spanish_ci,
  `foto` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `t_preparacion` time DEFAULT NULL,
  `t_coccion` time DEFAULT NULL,
  `t_refrigeracion` time DEFAULT NULL,
  `num_raciones` tinyint(4) NOT NULL DEFAULT '2',
  `consejos` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dificultad` enum('Fácil','Media','Difícil') COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `usuario_id`, `nombre`, `slug`, `desc_corta`, `desc_larga`, `foto`, `t_preparacion`, `t_coccion`, `t_refrigeracion`, `num_raciones`, `consejos`, `dificultad`) VALUES
(1, 1, 'Patatas Bravas', 'patatas-bravas', 'Descripcion corta', '<br/><strong>Iconos útiles</strong><br/>\r\n<i class="icon-user"></i> icon-user </br>\r\n<i class="icon-envelope"></i> icon-envelope </br>\r\n<i class="icon-inbox"></i> icon-inbox</br>\r\n<i class="icon-home"></i> icon-home </br>\r\n<i class="icon-ok"></i> icon-ok </br>\r\n<i class="icon-heart"></i> icon-heart </br>\r\n<i class="icon-pencil"></i> icon-pencil </br>\r\n<i class="icon-eye-open"></i> icon-eye-open (para hacer publica una receta) </br>\r\n<i class="icon-eye-close"></i> icon-eye-close</br>\r\n<i class="icon-remove"></i> icon-remove </br>\r\n<i class="icon-camera"></i> icon-camera </br>\r\n<i class="icon-picture"></i> icon-picture</br>\r\n<i class="icon-info-sign"></i> icon-info-sign</br>\r\n<i class="icon-exclamation-sign"></i> icon-exclamation-sign</br>\r\n<i class="icon-warning-sign"></i> icon-warning-sign</br>\r\n<i class="icon-th"></i> icon-th</br>\r\n<i class="icon-th-large"></i> icon-th-large</br>\r\n<i class="icon-th-list"></i> icon-th-list</br>\r\n\r\n', NULL, NULL, NULL, NULL, 2, NULL, 'Media'),
(2, 2, 'Costillas a la miel', 'Costillas-miel', 'Riquísimas costillas, generalmente de carne de cerdo, a la miel, cocinadas al horno.', 'Ponemos muy poco de aceite en una fuente, echamos un poco de sal a las costillas, las poenmos en la fuente y las metemos en el horno a 200 grados durante unos diez minutos. A continuación, les damos la vuelta y le echamos miel por encima. Las dejamos otros 10 minutos. Repetiremos la operacion de darles y la vuelta y echarles miel tres veces, cuatro o las que hagan falta. Se pueden hacer con unas patatas bravas, pero estas tardan menos en hacerse, por lo que no se ponen desde el principio.', NULL, '00:05:00', '01:10:00', '00:05:00', 2, 'Cuidado con el aceite. Debemos echar lo justo para que no se pegue, pero si echamos mucho las costillas se freirán.', 'Fácil'),
(3, 3, 'Pollo con salsa de queso azul', 'pollo-salsa-queso-azul', 'Si te gusta el queso fuerte, te gustará este plato. Imprescindible servir con pan.', 'Partimos los filetes de pollo en trozos pequeños, los freímos un poco hasta que veamos que estan casi hechos. Añadimos nata y queso azul, sin especias pero con algo de sal. Lo movemos durante un rato hasta que se haya fundido el queso y esté todo bien mezclado y lo dejamos unos minutos.', NULL, '00:05:00', '00:20:00', '00:05:00', 2, 'Servir con pan. ', 'Fácil'),
(4, 1, 'Receta sin nombre 1', 'slug1', 'Descripcion corta', 'Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit veritus placerat per. Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus deserunt quaestio ei. Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no nullam semper audiam. ', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(5, 0, 'Receta sin nombre 2', 'slug2', 'Descripcion corta', 'Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit veritus placerat per. Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus deserunt quaestio ei. Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no nullam semper audiam. ', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(6, 0, 'Receta sin nombre 3', 'slug3', 'Descripcion corta', 'Descripcion corta', 'Lorem ipsum ad his scripta bland', NULL, NULL, NULL, 2, NULL, NULL),
(7, 0, 'Receta sin nombre 4', 'slug4', 'Descripcion corta', 'Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit veritus placerat per. Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te.', NULL, NULL, NULL, NULL, 2, NULL, NULL);


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
  `foto` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `foto`) VALUES
(1, '\0\0', 'administrador', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1366362564, 1, 'Admin', NULL),
(2, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'rosaml82', '74ee07e83b6bbaf521f07554ba245cc43b1edffc', NULL, 'rosaml82@hotmail.com', NULL, 'd82d9462444cbd5bdf830caf069f286c07087aac', 1365794603, 'b692bdc8f4b99714f7e12f82892a06046ba5d769', 1365782232, 1366726566, 1, 'Rosa Marín López', NULL),
(9, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'miguelitomp', 'af5987896062f8075707caf6989e4563864a7a95', NULL, 'miguelitomp@hotmail.com', NULL, NULL, NULL, NULL, 1365964435, 1365964435, 1, 'Miguel Molina', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(11, 2, 2),
(12, 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_ingr`
--

-- CREATE TABLE IF NOT EXISTS `categoria_ingr` (
--   `id` int(11) NOT NULL,
--   `nombre` varchar(30) NOT NULL,
--   PRIMARY KEY (`id`),
--   KEY `nombre` (`nombre`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_ingr`
--

-- INSERT INTO `categoria_ingr` (`id`, `nombre`) VALUES
-- (1, 'general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

-- CREATE TABLE IF NOT EXISTS `ingrediente` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `nombre` varchar(50) NOT NULL,
--   `categoria` int(11) DEFAULT NULL,
--   `foto` varchar(32) DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   UNIQUE KEY `foto` (`foto`),
--   KEY `fk_ingrediente_categoria_ingr` (`categoria`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `ingrediente`
--

-- INSERT INTO `ingrediente` (`id`, `nombre`, `categoria`, `foto`) VALUES
-- (1, 'patata', 1, NULL),
-- (2, 'tomate frito', 1, NULL),
-- (3, 'cerdo', 1, NULL),
-- (4, 'miel', 1, NULL),
-- (5, 'nata (para cocinar)', 1, NULL),
-- (6, 'pan', 1, NULL),
-- (7, 'pollo', 1, NULL),
-- (8, 'queso azul', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_ingrediente`
--

-- CREATE TABLE IF NOT EXISTS `receta_ingrediente` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `receta_id` int(11) NOT NULL,
--   `ingrediente_id` int(11) NOT NULL,
--   `cantidad` float NOT NULL,
--   `unidad` varchar(30) NOT NULL COMMENT 'piezs, e.g.: ml, gr, brik, filetes fino, pizca,...',
--   `prioridad` enum('obligatorio','alternativo','opcional') NOT NULL DEFAULT 'obligatorio',
--   PRIMARY KEY (`id`),
--   KEY `fk_receta_ingrediente_receta` (`receta_id`),
--   KEY `fk_receta_ingrediente_ingrediente` (`ingrediente_id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `receta_ingrediente`
--

-- INSERT INTO `receta_ingrediente` (`id`, `receta_id`, `ingrediente_id`, `cantidad`, `unidad`, `prioridad`) VALUES
-- (1, 1, 1, 4, 'piezas', 'obligatorio'),
-- (2, 2, 3, 2, 'costillar grande', 'obligatorio'),
-- (3, 2, 4, 50, 'ml', 'obligatorio'),
-- (6, 2, 6, 0.5, 'barra', 'opcional'),
-- (7, 3, 7, 4, 'filetes corte fino, troceados', 'obligatorio'),
-- (8, 3, 8, 100, 'gr', 'obligatorio'),
-- (9, 3, 5, 1, 'brick 100ml', 'obligatorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

-- CREATE TABLE IF NOT EXISTS `news` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `title` varchar(128) NOT NULL,
--   `slug` varchar(128) NOT NULL,
--   `text` text NOT NULL,
--   PRIMARY KEY (`id`),
--   KEY `slug` (`slug`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `news`
--

-- INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
-- (1, 'Noticia del dia', 'noticia-del-dia', 'bueno... esto es una noticia: Lorem Ipsum dolor sit aemet... perra');

-- --------------------------------------------

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingrediente`
--
-- ALTER TABLE `ingrediente`
--   ADD CONSTRAINT `ingrediente_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria_ingr` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
