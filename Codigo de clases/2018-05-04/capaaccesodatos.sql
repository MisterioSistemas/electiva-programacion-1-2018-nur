-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2018 a las 14:40:37
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capaaccesodatos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_materiaxpersona_insert` (IN `p_idMateria` INT, IN `p_idPersona` INT)  NO SQL
insert into materiaxpersona (idMateria,idPersona)
VALUES (p_idMateria,p_idPersona)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_materia_delete` (IN `p_id` INT)  NO SQL
DELETE FROM materia
WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_materia_insert` (IN `p_nombre` VARCHAR(200), IN `creditos` INT)  NO SQL
INSERT into materia(nombre, creditos)
VALUES (p_nombre, p_creditos)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_materia_selectAll` ()  NO SQL
SELECT id, nombre, creditos
FROM materia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_materia_selectById` (IN `p_id` INT)  NO SQL
SELECT id, nombre, creditos
FROM materia
WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_materia_update` (IN `p_nombre` VARCHAR(200), IN `p_creditos` DECIMAL(10,2), IN `p_id` INT)  NO SQL
UPDAtE materia
SET nombre = p_nombre,
creditos = p_creditos
WHERE
id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_persona_delete` (IN `p_id` INT)  NO SQL
DELETE FROM persona
                WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_persona_insert` (IN `p_nombres` VARCHAR(200), IN `p_apellidos` VARCHAR(200), IN `p_ciudad` VARCHAR(200), IN `p_edad` INT, IN `p_fechaNacimiento` DATE)  NO SQL
INSERT INTO persona (nombres, apellidos, ciudad, edad, fechaNacimiento)
VALUES (p_nombres, p_apellidos, p_ciudad, p_edad, p_fechaNacimiento)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_persona_selectAll` ()  NO SQL
SELECT id, nombres, apellidos, ciudad, edad, fechaNacimiento
FROM persona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_persona_selectById` (IN `p_id` INT)  NO SQL
SELECT id, nombres, apellidos, ciudad, edad, fechaNacimiento
FROM persona
WHERE id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_persona_update` (IN `p_nombres` VARCHAR(200), IN `p_apellidos` VARCHAR(200), IN `p_ciudad` VARCHAR(200), IN `p_edad` INT, IN `p_fechaNacimiento` DATE, IN `p_id` INT)  NO SQL
UPDATE persona
                SET
                    nombres = p_nombres,
                    apellidos = p_apellidos,
                    ciudad = p_ciudad,
                    edad = p_edad,
                    fechaNacimiento = p_fechaNacimiento
                WHERE
                    id = p_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `creditos` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `creditos`) VALUES
(1, 'estructura de datos', '4.00'),
(2, 'Programacion 1', '4.00'),
(3, 'Algebra Discreta', '3.00'),
(4, 'Algebra Lineal', '4.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaxpersona`
--

CREATE TABLE `materiaxpersona` (
  `id` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiaxpersona`
--

INSERT INTO `materiaxpersona` (`id`, `idMateria`, `idPersona`) VALUES
(1, 2, 4),
(2, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `edad` int(11) NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apellidos`, `ciudad`, `edad`, `fechaNacimiento`) VALUES
(1, 'Juan', 'Perez', 'Santa Cruz', 20, '2018-05-05'),
(4, 'Juan', 'Perez', 'Santa Cruz', 20, '2018-05-05'),
(5, 'juan', 'perez', 'scz', 1, '2018-04-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiaxpersona`
--
ALTER TABLE `materiaxpersona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateria` (`idMateria`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `materiaxpersona`
--
ALTER TABLE `materiaxpersona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `materiaxpersona`
--
ALTER TABLE `materiaxpersona`
  ADD CONSTRAINT `materiaxpersona_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `materiaxpersona_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
