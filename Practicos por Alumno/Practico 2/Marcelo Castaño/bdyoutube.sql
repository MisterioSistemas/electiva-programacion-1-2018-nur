-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2018 a las 04:31:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdyoutube`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategoriasVideos_SelectById` (IN `p_id` INT)  NO SQL
SELECT nombre from tblcategorias c, tblcategoriasvideos cv, tblvideos v 
where c.categoriaId = cv.categoriaId and v.video_id = cv.videoId
and v.video_id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategoriasvideos_Update` (IN `p_categoriaId` INT, IN `p_videoId` INT)  BEGIN
    DECLARE var INT;
    set var = (SELECT idcategoriavideo FROM tblcategoriasvideos 
    where categoriaId = p_categoriaId
    and videoId = p_videoId);
     IF var > 0 THEN
        UPDATE tblcategoriasvideos
    	set categoriaId = p_categoriaId, videoId = p_videoId
    	where idCategoriaVideo = var;
    ELSE
        insert into tblcategoriasvideos (categoriaId,videoId)
		VALUES (p_categoriaId,p_videoId);
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategorias_Delete` (IN `p_id` INT)  NO SQL
DELETE FROM tblcategorias where categoriaId = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategorias_Insert` (IN `p_nombre` VARCHAR(400))  NO SQL
INSERT into tblcategorias (nombre) values (p_nombre)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategorias_SelectAll` ()  NO SQL
select categoriaId,nombre from tblcategorias Order By nombre ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategorias_SelectById` (IN `p_id` INT)  NO SQL
SELECT nombre FROM tblcategorias WHERE categoriaId = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategorias_SelectByVideos` (IN `p_id` INT)  NO SQL
select video_id,titulo,autor,fecha_subida FROM tblcategorias c, tblvideos v, tblcategoriasvideos cv
where c.categoriaId = cv.categoriaId and cv.videoId = v.video_id
and c.categoriaId = p_id ORDER by titulo ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblcategorias_Update` (IN `p_nombre` VARCHAR(400), IN `p_id` INT)  NO SQL
UPDATE tblcategorias
set nombre = p_nombre
where categoriaId = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblvideocategoria_Delete` (IN `p_id` INT)  NO SQL
DELETE FROM tblcategoriasvideos where videoId = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblvideo_BuscarTitulo` (IN `p_titulo` VARCHAR(400))  NO SQL
BEGIN
    DECLARE var varchar(400);
    set var = p_titulo;
SELECT video_id,titulo,autor,fecha_subida from tblvideos where titulo like CONCAT ('%',var, '%');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblvideo_Delete` (IN `p_id` INT)  NO SQL
DELETE From tblvideos 
                WHERE video_id = p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblvideo_Insert` (IN `p_titulo` VARCHAR(400), IN `p_descripcion` VARCHAR(400), IN `p_fecha` DATE, IN `p_autor` VARCHAR(400))  NO SQL
INSERT INTO tblvideos(titulo,descripcion,fecha_subida,autor)
VALUES (p_titulo,p_descripcion,p_fecha,p_autor)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblvideo_SelectAll` ()  NO SQL
SELECT video_id,titulo,descripcion,fecha_subida,autor
                FROM tblvideos
                ORDER BY titulo ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblvideo_SelectById` (IN `p_id` INT)  NO SQL
SELECT video_id,titulo,descripcion,fecha_subida,autor
                FROM tblvideos
                WHERE video_id =p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tblvideo_Update` (IN `p_titulo` VARCHAR(400), IN `p_descripcion` VARCHAR(400), IN `p_fecha` DATE, IN `p_autor` VARCHAR(400), IN `p_id` INT)  NO SQL
UPDATE tblvideos SET 
                titulo = p_titulo,
                descripcion = p_descripcion,
                fecha_subida = p_fecha,
                autor = p_autor
                WHERE 
                video_id = p_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategorias`
--

CREATE TABLE `tblcategorias` (
  `categoriaId` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblcategorias`
--

INSERT INTO `tblcategorias` (`categoriaId`, `nombre`) VALUES
(3, 'Accion'),
(4, 'Romance'),
(5, 'Drama'),
(6, 'Comedia2'),
(7, 'Nueva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoriasvideos`
--

CREATE TABLE `tblcategoriasvideos` (
  `idCategoriaVideo` int(11) NOT NULL,
  `categoriaId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblcategoriasvideos`
--

INSERT INTO `tblcategoriasvideos` (`idCategoriaVideo`, `categoriaId`, `videoId`) VALUES
(5, 3, 4),
(6, 6, 4),
(7, 5, 4),
(8, 4, 4),
(9, 3, 6),
(10, 6, 6),
(11, 5, 6),
(12, 4, 6),
(13, 3, 7),
(14, 6, 7),
(24, 3, 9),
(25, 6, 9),
(26, 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvideos`
--

CREATE TABLE `tblvideos` (
  `video_id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_subida` date NOT NULL,
  `autor` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblvideos`
--

INSERT INTO `tblvideos` (`video_id`, `titulo`, `descripcion`, `fecha_subida`, `autor`) VALUES
(4, 'fddf', 'fddf', '2018-05-10', 'fdfdfd'),
(5, 'caca', 'aaaaa', '2018-05-12', 'aaa'),
(6, 'q', 'q', '2018-05-09', 'qqqqqqqqqqqqqqqq'),
(7, 'ffffffaaaa', 'dddddd', '2018-05-15', 'fffff'),
(8, 'holap', 'holita', '2018-05-07', 'marcelo'),
(9, 'nuevo', 'ndddddd', '2018-05-16', 'aaaaaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcategorias`
--
ALTER TABLE `tblcategorias`
  ADD PRIMARY KEY (`categoriaId`);

--
-- Indices de la tabla `tblcategoriasvideos`
--
ALTER TABLE `tblcategoriasvideos`
  ADD PRIMARY KEY (`idCategoriaVideo`),
  ADD KEY `idCategoriaVideo` (`idCategoriaVideo`),
  ADD KEY `videoId` (`videoId`),
  ADD KEY `categoriaId` (`categoriaId`),
  ADD KEY `idCategoriaVideo_2` (`idCategoriaVideo`),
  ADD KEY `videoId_2` (`videoId`);

--
-- Indices de la tabla `tblvideos`
--
ALTER TABLE `tblvideos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcategorias`
--
ALTER TABLE `tblcategorias`
  MODIFY `categoriaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tblcategoriasvideos`
--
ALTER TABLE `tblcategoriasvideos`
  MODIFY `idCategoriaVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `tblvideos`
--
ALTER TABLE `tblvideos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblcategoriasvideos`
--
ALTER TABLE `tblcategoriasvideos`
  ADD CONSTRAINT `fk_categoriaId` FOREIGN KEY (`categoriaId`) REFERENCES `tblcategorias` (`categoriaId`),
  ADD CONSTRAINT `fk_videoId` FOREIGN KEY (`videoId`) REFERENCES `tblvideos` (`video_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
