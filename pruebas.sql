-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2019 a las 00:45:39
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE IF NOT EXISTS `contador` (
  `id_contad` int(11) NOT NULL AUTO_INCREMENT,
  `usu_mail` varchar(32) NOT NULL,
  `cont_fecha` datetime NOT NULL,
  PRIMARY KEY (`id_contad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horari` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelicu` int(11) NOT NULL,
  `hor_horas` varchar(512) NOT NULL,
  PRIMARY KEY (`id_horari`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE IF NOT EXISTS `peliculas` (
  `id_pelicu` int(11) NOT NULL AUTO_INCREMENT,
  `pel_nombre` varchar(64) NOT NULL,
  `pel_duraci` time NOT NULL,
  `pel_sinops` varchar(256) NOT NULL,
  `pel_extens` varchar(8) NOT NULL,
  `pel_fechae` date NOT NULL,
  `pel_fechaf` date NOT NULL,
  PRIMARY KEY (`id_pelicu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicu`, `pel_nombre`, `pel_duraci`, `pel_sinops`, `pel_extens`, `pel_fechae`, `pel_fechaf`) VALUES
(19, 'avenger', '03:30:00', 'avengers xd\r\n', 'jpg', '2019-05-01', '2019-05-31'),
(20, 'hellboy', '00:00:00', 'Un heroe del infiernoo', 'jpg', '0000-00-00', '0000-00-00'),
(23, 'la bella y la bestia', '22:22:00', 'una pelicla d disney creo', 'jpg', '2019-05-21', '2019-05-31'),
(24, 'la torre oscura', '02:20:00', 'una pelicula de no se xd', 'jpg', '2019-05-01', '2019-05-20'),
(25, 'piratas del caribe la venganza d', '02:30:00', 'quinta o sexta entrega de piratas del caribe creo ', 'jpg', '2019-05-31', '2019-06-30'),
(27, 'venom', '02:45:00', 'pelÃ­cula de Venom', 'jpg', '2019-05-01', '2019-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_mail` varchar(32) NOT NULL,
  `usu_user` varchar(32) NOT NULL,
  `usu_pass` varchar(128) NOT NULL,
  `usu_nombre` varchar(32) NOT NULL,
  `usu_fnacim` date NOT NULL,
  `usu_nivel` varchar(16) NOT NULL,
  PRIMARY KEY (`usu_mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_mail`, `usu_user`, `usu_pass`, `usu_nombre`, `usu_fnacim`, `usu_nivel`) VALUES
('mail1@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'administrador', '2019-05-01', 'admin'),
('mail2@gmail.com', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'usuario', '2019-05-02', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
