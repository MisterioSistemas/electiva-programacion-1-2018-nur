-- ******* CREACION DE LA BASE DE DATOS *******

CREATE DATABASE youtube;

USE youtube;

CREATE TABLE tblVideos(
	codigo_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	titulo VARCHAR(150) NOT NULL,
	autor VARCHAR(150) NOT NULL,
	descripcion VARCHAR(500) NOT NULL,
	fecha DATE NOT NULL,
	video VARCHAR(200) NOT NULL,
	imagen VARCHAR(150) NOT NULL
);

CREATE TABLE tblCategorias(
	codigo_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(150) NOT NULL
);

-- DROP TABLE IF EXISTS tblVideoCategorias
CREATE TABLE tblVideoCategorias(
	codigo_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	video_id INT NOT NULL REFERENCES tblVideos(codigo_id),
	categoria_id INT NOT NULL REFERENCES tblCategorias(codigo_id)
);


-- ******* CREACION DE PROCDIMIENTOS ALMACNADOS *******

DELIMITER $$

CREATE PROCEDURE `mk_tblVideos` (prm_titulo varchar(150), prm_autor varchar(150),
	prm_descripcion varchar(500), prm_video varchar(150), prm_imagen varchar(150))
BEGIN
	INSERT INTO `youtube`.`tblvideos`
	(`codigo_id`,`titulo`, `autor`,	`descripcion`,	`fecha`, `video`, `imagen`)
	VALUES
	(default, prm_titulo, prm_autor, prm_descripcion, CURRENT_DATE, prm_video, prm_imagen);
END;
$$

DELIMITER $$
CREATE PROCEDURE `mk_tblCategorias` (
	prm_nombre varchar(150)
)
BEGIN
	INSERT INTO `youtube`.`tblcategorias`
	(`codigo_id`,
	`nombre`)
	VALUES
	(DEFAULT,
	prm_nombre);

END
$$

DELIMITER $$
CREATE PROCEDURE `mk_tblVideosCategorias` (
	prm_videoId int,
	prm_categoriaId int
)
BEGIN
	INSERT INTO `youtube`.`tblvideocategorias`
	(`codigo_id`,
	`video_id`,
	`categoria_id`)
	VALUES
	(DEFAULT,
	prm_videoId,
	prm_categoriaId);

END
$$

DELIMITER $$
CREATE PROCEDURE `upd_tblVideos` (prm_titulo varchar(150), prm_autor varchar(150),
	prm_descripcion varchar(500), prm_video varchar(150), prm_imagen varchar(150), prm_videoId int)
BEGIN
	UPDATE `youtube`.`tblvideos`
	SET
	`titulo` = prm_titulo,
	`autor` = prm_autor,
	`descripcion` = prm_descripcion,
	`fecha` = CURRENT_DATE,
	`video` = prm_video,
	`imagen` = prm_imagen
	WHERE `codigo_id` = prm_videoId;
	END
$$

DELIMITER $$
CREATE PROCEDURE `upd_tblCategorias` (prm_nombre varchar(150), prm_categoriaId int)
BEGIN
	UPDATE `youtube`.`tblCategorias`
	SET
	`nombre` = prm_nombre
	WHERE `codigo_id` = prm_categoriaId;
END
$$

DELIMITER $$
CREATE PROCEDURE `upd_tblVideosCategorias` (prm_videoId int, prm_categoriaId int, prm_codigoId int)
BEGIN
	UPDATE `youtube`.`tblVideoCategorias`
	SET
	`video_id` = prm_videoId,
	`categoria_id` = prm_categoriaId
	WHERE `codigo_id` = prm_categoriaId;
END
$$

DELIMITER $$
CREATE PROCEDURE `del_tblVideos` (prm_codigoId int)
BEGIN
	DELETE FROM `youtube`.`tblvideos`
	WHERE codigo_id = prm_codigoId;
END
$$

DELIMITER $$
CREATE PROCEDURE `del_tblCategorias` (prm_codigoId int)
BEGIN
	DELETE FROM `youtube`.`tblcategorias`
	WHERE codigo_id = prm_codigoId;
END
$$

DELIMITER $$
CREATE PROCEDURE `del_tblVideosCategorias` (prm_codigoId int)
BEGIN
	DELETE FROM `youtube`.`tblvideocategorias`
	WHERE codigo_id = prm_codigoId;
END
$$

DELIMITER $$
CREATE PROCEDURE `get_tblVideos` ()
BEGIN
	SELECT * FROM tblVideos;
END
$$

DELIMITER $$
CREATE PROCEDURE `get_tblVideosById` (prm_codigoId int)
BEGIN
	SELECT * FROM tblVideos
	WHERE codigo_id = prm_codigoId;
END
$$

DELIMITER $$
CREATE PROCEDURE `get_tblVideosByCategoria` (prm_categoriaId int)
BEGIN
	SELECT V.*
	FROM tblVideos V,
	(
		SELECT VC.video_id
		FROM tblVideoCategorias VC,
		(
			SELECT codigo_id FROM tblcategorias
		) C
		WHERE VC.categoria_id = prm_categoriaId
	) B
	WHERE V.codigo_id = B.video_id
	GROUP BY V.codigo_id;
END
$$

DELIMITER $$
CREATE PROCEDURE `get_tblCategoriasByVideo` (prm_videoId int)
BEGIN
	SELECT C.nombre
	FROM tblcategorias C,
	(
		SELECT VC.categoria_id
		FROM tblVideoCategorias VC,
		(
			SELECT codigo_id FROM tblvideos
		) V
		WHERE VC.video_id = prm_videoId
	) B
	WHERE C.codigo_id = B.categoria_id
	GROUP BY C.nombre;

END
$$

DELIMITER $$
CREATE PROCEDURE `get_tblCategorias` ()
BEGIN
	SELECT * FROM tblCategorias;
END
$$

DELIMITER $$
CREATE PROCEDURE `get_tblCategoriasById` (prm_codigoId int)
BEGIN
	SELECT * FROM tblCategorias
	WHERE codigo_id = prm_codigoId;
END
$$


DELIMITER $$
CREATE PROCEDURE `get_tblVideoCategorias` ()
BEGIN
	SELECT * FROM tblVideoCategorias;
END
$$



call get_tblVideosByCategoria(1)