-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-03-2014 a las 09:08:14
-- Versión del servidor: 5.1.73
-- Versión de PHP: 5.3.2-1ubuntu4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `BDSHELL`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comandes`
--

USE BDSHELL;

CREATE TABLE IF NOT EXISTS `comandes` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `comanda` varchar(32) NOT NULL,
  `resultat_comanda` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `comandes`
--

INSERT INTO `comandes` (`id`, `user_id`, `comanda`, `resultat_comanda`) VALUES
(1, 1, 'ls', 'ConnexioBD.php<br />\nbottom.php<br />\nconfig.php<br />\ncontent.php<br />\ncreausuari.php<br />\nerror.php<br />\nform_comandes.php<br />\nintranet.php<br />\nlogincheck.php<br />\nmenu.php<br />\nmiscelania.php<br />\ntop.php<br />\nveure_comandes.php<br />\n'),
(2, 1, 'date', NULL),
(3, 1, 'cal', '     March 2014<br />\nSu Mo Tu We Th Fr Sa<br />\n                   1<br />\n 2  3  4  5  6  7  8<br />\n 9 10 11 12 13 14 15<br />\n16 17 18 19 20 21 22<br />\n23 24 25 26 27 28 29<br />\n30 31<br />\n'),
(4, 3, 'ls', NULL),
(5, 3, 'date', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE IF NOT EXISTS `usuaris` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `clau` varchar(64) NOT NULL,
  `administrador` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `clau`, `administrador`) VALUES
(1, 'willy', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(2, 'wonka', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(3, 'pepe', '2314b3f8e4315f077e10357bcdfd89a5', 0),
(5, 'pepeadmin', '2314b3f8e4315f077e10357bcdfd89a5', 1);