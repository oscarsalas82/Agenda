-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-03-2020 a las 20:34:11
-- Versión del servidor: 5.7.24
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) DEFAULT NULL,
  `Titulo` varchar(20) NOT NULL,
  `FechaInicio` date NOT NULL,
  `HoraInicio` time DEFAULT NULL,
  `FechaFinalizacion` date DEFAULT NULL,
  `HoraFinalizacion` time DEFAULT NULL,
  `DiaCompleto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `FechaNacimiento`, `Username`, `Password`) VALUES
(1, 'Oscar', '1980-08-25', 'oscar@hotmail.com', '$2y$10$XZi4NFJCj2nFZKaCSpyWzupoAF5ZWnJoiXgF4VRihzJA.TyZuxSgm'),
(2, 'Alejandra', '2000-10-01', 'alejandra@hotmail.com', '$2y$10$7GiTn/8n8r7odLkzr1CqH.NAzTuxHn4zMo9/XSI3/xFNe40d7LuiK'),
(3, 'Juan', '1975-12-31', 'juan@hotmail.com', '$2y$10$MHEKsLrhz2X8u3Euh.Xf9.7oS6I.OyXeCTsN1G/2sCNTCP125pRtS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
