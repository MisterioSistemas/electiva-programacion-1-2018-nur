-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2018 a las 01:11:46
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practico2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarVideo` (IN `varNombre` VARCHAR(100))  NO SQL
SELECT `id`, `nombre`, `descripcion`, `fechaSubida`, `autor` 
FROM `videos`
WHERE nombre LIKE concat('%',varNombre,'%')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCategoria` (IN `varId` INT)  NO SQL
BEGIN
DELETE FROM `videocategoria` WHERE categoriaid = varId;
DELETE FROM `categoria` WHERE id = varId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteVideo` (IN `varID` INT)  NO SQL
DELETE FROM `videos` WHERE id = varID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteVideoCategoria` (IN `varId` INT)  NO SQL
DELETE FROM `videocategoria` WHERE id = varId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteVideoCategoriaByVideo` (IN `vatVideoId` INT)  NO SQL
DELETE FROM `videocategoria` WHERE videoid =  vatVideoId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategoriaById` (IN `varID` INT)  NO SQL
SELECT id, nombre
FROM categoria
WHERE id = varID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategoriaByVideo` (IN `varVideoID` INT)  NO SQL
SELECT categoria.id, categoria.nombre
FROM categoria JOIN videocategoria
ON	categoria.id = videocategoria.categoriaid
WHERE videocategoria.videoid = varVideoID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategorias` ()  NO SQL
SELECT id, nombre
FROM categoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideoByCategoria` (IN `varCatID` INT)  NO SQL
SELECT videos.id, videos.nombre, videos.descripcion, videos.fechaSubida, videos.autor
FROM `videos` JOIN videocategoria
ON	videos.id = videocategoria.videoid
WHERE videocategoria.categoriaid = varCatID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideoByID` (IN `varId` INT)  NO SQL
SELECT id, nombre, descripcion, fechaSubida, autor	
FROM videos
WHERE varId = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideoCategoria` ()  NO SQL
SELECT `id`, `categoriaid`, `videoid` FROM `videocategoria`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideoLastIndex` ()  NO SQL
SELECT `id`, `nombre`, `descripcion`, `fechaSubida`, `autor` 
FROM `videos` WHERE id = (SELECT MAX(id) FROM videos)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideos` ()  NO SQL
SELECT id, nombre, descripcion, fechaSubida, autor	
FROM videos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideosOrderName` ()  NO SQL
SELECT id, nombre, descripcion, fechaSubida, autor	
FROM videos
ORDER BY nombre$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCategoria` (IN `varNombre` VARCHAR(100))  NO SQL
INSERT INTO `categoria`(`nombre`) 
VALUES (varNombre)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertVideo` (IN `varNombre` VARCHAR(100), IN `varDesc` VARCHAR(200), IN `varSubida` DATE, IN `varAutor` VARCHAR(100))  NO SQL
INSERT INTO `videos`(`nombre`, `descripcion`, `FechaSubida`, `autor`) VALUES (varNombre,varDesc,varSubida,varAutor)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertVideoCategoria` (IN `varIdVideo` INT, IN `varIdCategoria` INT)  NO SQL
INSERT INTO `videocategoria`(`categoriaid`, `videoid`) 
VALUES (varIdCategoria,varIdVideo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCategoria` (IN `varId` INT, IN `varNombre` VARCHAR(100))  NO SQL
UPDATE `categoria` 
SET `nombre`=varNombre
WHERE `id`=varId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateVideo` (IN `varID` INT, IN `varNombre` VARCHAR(100), IN `varDesc` VARCHAR(200), IN `varSubida` DATE, IN `varAutor` VARCHAR(100))  NO SQL
UPDATE `videos` 
SET `nombre`=varNombre,`descripcion`=varDesc,
`FechaSubida`=varSubida,`autor`=varAutor 
WHERE `id`=varID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateVideoCategoria` (IN `varIdVideo` INT, IN `varIdCategoria` INT, IN `varId` INT)  NO SQL
UPDATE `videocategoria` 
SET `categoriaid`=varIdCategoria,`videoid`=varIdVideo 
WHERE `id`=varId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(2, 'panditas'),
(11, 'cosas locas'),
(14, 'gatitos'),
(16, 'animales'),
(17, 'comicos'),
(18, 'otros'),
(21, 'drama'),
(22, 'perritos'),
(23, 'otra categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videocategoria`
--

CREATE TABLE `videocategoria` (
  `id` int(11) NOT NULL,
  `categoriaid` int(11) NOT NULL,
  `videoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videocategoria`
--

INSERT INTO `videocategoria` (`id`, `categoriaid`, `videoid`) VALUES
(97, 2, 4),
(114, 11, 61),
(116, 17, 61),
(118, 11, 62),
(119, 14, 62),
(121, 16, 62),
(122, 17, 62),
(127, 2, 63),
(128, 16, 63),
(129, 22, 63),
(130, 11, 51),
(131, 17, 51),
(132, 18, 51),
(133, 21, 51),
(134, 23, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `FechaSubida` date NOT NULL,
  `autor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `nombre`, `descripcion`, `FechaSubida`, `autor`) VALUES
(2, 'juanita la huerfanita', 'esa niña', '2018-05-22', 'juanita'),
(3, 'gatosLocos', 'gatos gateando', '2018-05-08', 'catman2'),
(4, 'hola extraño', 'video raro', '2018-05-01', 'desconocido'),
(51, 'afedo camate', 'Un tipo pasado de ebrio', '2018-05-03', 'afedo'),
(61, 'ola k ase', 'el mismo video del pajaro pero con otro nombre', '2018-05-18', 'la Shama'),
(62, 'Otra vez los gatos', 'me da flojera descargar mas videos para hacer pruebas', '2018-05-18', 'catman2'),
(63, 'asdasd', 'test desc', '2018-05-19', 'test');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `videocategoria`
--
ALTER TABLE `videocategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`categoriaid`,`videoid`),
  ADD KEY `categoriaid` (`categoriaid`),
  ADD KEY `videoid` (`videoid`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `videocategoria`
--
ALTER TABLE `videocategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `videocategoria`
--
ALTER TABLE `videocategoria`
  ADD CONSTRAINT `videocategoria_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `videocategoria_ibfk_2` FOREIGN KEY (`videoid`) REFERENCES `videos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
