drop database videosdb;
CREATE DATABASE  IF NOT EXISTS `videosdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `videosdb`;

CREATE TABLE `tbl_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
);

INSERT INTO `tbl_categoria` VALUES (1,'Juegos'),(2,'Ocio'),(3,'Noticias'),(4,'Trailers'),(5,'Música'),(6,'TV'),(7,'Animación'),(8,'Entrevistas'),(9,'Curiosidades'),(10,'Random'),(11,'Naturaleza'),(12,'Animales'),(13,'Peliculas');

CREATE TABLE `tbl_video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) NOT NULL,
  `descripcion` varchar(10000) NOT NULL,
  `fecha` date NOT NULL,
  `video` varchar(2000) NOT NULL,
  `imagen` varchar(2000) NOT NULL,
  `autor` varchar(200) NOT NULL,
  PRIMARY KEY (`id_video`)
);

CREATE TABLE `tbl_categoria_video` (
  `id_cat_vid` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_cat_vid`),
  KEY `id_video` (`id_video`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `tbl_categoria_video_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `tbl_video` (`id_video`),
  CONSTRAINT `tbl_categoria_video_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`)
);

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addVideoImage`(video text, image text, id int)
BEGIN
	UPDATE `videosdb`.`tbl_video`
	SET
	`video` = video,
	`imagen` = image
	WHERE `id_video` = id;

END ;;
DELIMITER ;


DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarCategoria`(id_video int, id_categoria int)
BEGIN
	INSERT INTO `videosdb`.`tbl_categoria_video`
	(`id_video`,`id_categoria`)
	VALUES(id_video,id_categoria);
END ;;
DELIMITER ;


DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `allCategorias`()
BEGIN
	SELECT `tbl_categoria`.`id_categoria`,
    `tbl_categoria`.`nombre`
FROM `videosdb`.`tbl_categoria`;

END ;;
DELIMITER ;


DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `allVideos`()
BEGIN
	SELECT `tbl_video`.`id_video`,
    `tbl_video`.`titulo`,
    `tbl_video`.`descripcion`,
    `tbl_video`.`fecha`,
    `tbl_video`.`video`,
    `tbl_video`.`imagen`,
    `tbl_video`.`autor`
FROM `videosdb`.`tbl_video`
ORDER BY `tbl_video`.`titulo`;

END ;;
DELIMITER ;



DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearVideo`(titulo text, descripcion text, fecha date, video text, imagen text, autor text)
BEGIN
	INSERT INTO `videosdb`.`tbl_video`
(`titulo`,`descripcion`,`fecha`,`video`,`imagen`,`autor`)
VALUES
(titulo,descripcion,fecha,video,imagen,autor);
END ;;
DELIMITER ;



DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideoById`( id int)
BEGIN
	SELECT 
    `tbl_video`.`titulo`,
    `tbl_video`.`descripcion`,
    `tbl_video`.`fecha`,
    `tbl_video`.`video`,
    `tbl_video`.`imagen`,
    `tbl_video`.`autor`
FROM `videosdb`.`tbl_video`
WHERE`tbl_video`.`id_video`= id ;
END ;;
DELIMITER ;


DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_MaximoVideo`()
BEGIN
	select MAX(id_video)
    FROM tbl_video;
END ;;
DELIMITER ;



DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateVideo`(idVideo int,titulo text,descripcion text,fecha date,video text,imagen text, autor text)
BEGIN
	UPDATE `videosdb`.`tbl_video`
	SET
	`titulo` = titulo,
	`descripcion` = descripcion,
	`fecha` = fecha,
	`video` = video,
	`imagen` = imagen,
	`autor` = autor
	WHERE `id_video` = idVideo;

END ;;
DELIMITER ;

DELIMITER $$
USE `videosdb`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VideosCategoria`(idCategoria int)
BEGIN
	select v.id_video, v.titulo, v.descripcion, v.fecha, v.video, v.imagen, v.autor
	from tbl_categoria_video cv join tbl_video v on cv.id_video = v.id_video
	where cv.id_categoria = idCategoria;

END$$

DELIMITER ;

DELIMITER $$
USE `videosdb`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategorias`(id_video int)
BEGIN
	select cat.id_categoria, cat.nombre
	from tbl_categoria cat join tbl_categoria_video CV on cat.id_categoria = CV.id_categoria join tbl_video Vi on CV.id_video = Vi.id_video
	Where Vi.id_video = id_video;
END$$

DELIMITER ;


DELIMITER $$
USE `videosdb`$$
CREATE PROCEDURE videoBusqueda (palabra text)
BEGIN
	SELECT `tbl_video`.`id_video`,
    `tbl_video`.`titulo`,
    `tbl_video`.`descripcion`,
    `tbl_video`.`fecha`,
    `tbl_video`.`video`,
    `tbl_video`.`imagen`,
    `tbl_video`.`autor`
FROM `videosdb`.`tbl_video`
WHERE `tbl_video`.`titulo` = palabra
UNION
SELECT `tbl_video`.`id_video`,
    `tbl_video`.`titulo`,
    `tbl_video`.`descripcion`,
    `tbl_video`.`fecha`,
    `tbl_video`.`video`,
    `tbl_video`.`imagen`,
    `tbl_video`.`autor`
FROM `videosdb`.`tbl_video`
WHERE `tbl_video`.`titulo` like concat(palabra,'%')
UNION
SELECT `tbl_video`.`id_video`,
    `tbl_video`.`titulo`,
    `tbl_video`.`descripcion`,
    `tbl_video`.`fecha`,
    `tbl_video`.`video`,
    `tbl_video`.`imagen`,
    `tbl_video`.`autor`
FROM `videosdb`.`tbl_video`
WHERE `tbl_video`.`titulo` like concat('%',palabra,'%');

END$$

DELIMITER ;

