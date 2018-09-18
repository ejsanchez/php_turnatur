-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2018 a las 00:13:36
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `turnaturdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `career` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `academy_level` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `es_unam` tinyint(1) NOT NULL DEFAULT '0',
  `institution_sector` varchar(255) DEFAULT NULL,
  `objetive` longtext,
  `join_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `user_reference` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `middle_name`, `email`, `phone_number`, `career`, `occupation`, `academy_level`, `institution`, `es_unam`, `institution_sector`, `objetive`, `join_date`, `expiration_date`, `user_reference`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Evelyn Jazmin', 'Sánchez', 'Fragoso', 'esanchez@iiec.unam.mx', 56230161, 'Lic. En Informática', 'Técnico Académico', 'Licenciatura', 'IIEc', 1, 'público', NULL, '2013-02-01 00:00:00', '2200-12-12 00:00:00', 'admin', '2013-02-13 00:00:00', '2013-02-13 00:00:00', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
