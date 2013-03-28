CREATE TABLE news (
	id int(11) NOT NULL AUTO_INCREMENT,
	title varchar(128) NOT NULL,
	slug varchar(128) NOT NULL,
	text text NOT NULL,
	PRIMARY KEY (id),
	KEY slug (slug)
);

-- *****************************************************************
-- *****************************************************************
-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-03-2013 a las 18:07:37
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
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE IF NOT EXISTS `ingrediente` (
  `nombre` varchar(56) NOT NULL,
  `foto` varchar(32) DEFAULT NULL,
  `unidad` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`nombre`, `foto`, `unidad`) VALUES
('patata', NULL, 'piezas'),
('tomate', NULL, 'brick 100ml');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Receta sin nombre',
  `desc_corta` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_larga` varchar(2048) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `t_preparacion` time DEFAULT NULL,
  `t_coccion` time DEFAULT NULL,
  `t_refrigeracion` time DEFAULT NULL,
  `consejos` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `criticas` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dificultad` enum('Fácil','Media','Difícil') COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `nombre`, `desc_corta`, `desc_larga`, `foto`, `t_preparacion`, `t_coccion`, `t_refrigeracion`, `consejos`, `criticas`, `dificultad`) VALUES
(1, 'Patatas Bravas', NULL, 'Descripcion Largaaa', NULL, NULL, NULL, NULL, NULL, NULL, 'Media');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-ingrediente`
--

CREATE TABLE IF NOT EXISTS `receta-ingrediente` (
  `receta` int(11) NOT NULL,
  `ingrediente` varchar(56) NOT NULL,
  `cantidad` float DEFAULT NULL,
  `raciones` tinyint(4) DEFAULT NULL,
  `ingr_obligatorio` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`receta`,`ingrediente`),
  KEY `ingrediente` (`ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `receta-ingrediente`
--

INSERT INTO `receta-ingrediente` (`receta`, `ingrediente`, `cantidad`, `raciones`, `ingr_obligatorio`) VALUES
(1, 'patata', 4, 2, 1),
(1, 'tomate', 0.5, 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `receta-ingrediente`
--
ALTER TABLE `receta-ingrediente`
  ADD CONSTRAINT `receta@002dingrediente_ibfk_3` FOREIGN KEY (`receta`) REFERENCES `receta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receta@002dingrediente_ibfk_4` FOREIGN KEY (`ingrediente`) REFERENCES `ingrediente` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
