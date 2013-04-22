-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-04-2013 a las 00:14:18
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
(1, '\0\0', 'administrador', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1366311438, 1, 'Admin', NULL),
(2, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'rosaml82', '74ee07e83b6bbaf521f07554ba245cc43b1edffc', NULL, 'rosaml82@hotmail.com', NULL, 'd82d9462444cbd5bdf830caf069f286c07087aac', 1365794603, 'b692bdc8f4b99714f7e12f82892a06046ba5d769', 1365782232, 1366316028, 1, 'Rosa Marín López', NULL),
(9, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'miguelitomp', 'af5987896062f8075707caf6989e4563864a7a95', NULL, 'miguelitomp@hotmail.com', NULL, NULL, NULL, NULL, 1365964435, 1365964435, 1, 'Miguel Molina', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
