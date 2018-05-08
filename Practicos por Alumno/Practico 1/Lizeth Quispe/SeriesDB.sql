-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: seriesdb
-- ------------------------------------------------------
-- Server version	5.6.26-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_genero`
--

DROP TABLE IF EXISTS `tbl_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_genero` (
  `Id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_genero` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_genero`
--

LOCK TABLES `tbl_genero` WRITE;
/*!40000 ALTER TABLE `tbl_genero` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pelicula`
--

DROP TABLE IF EXISTS `tbl_pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pelicula` (
  `Id_pelicula` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_pelicula` varchar(60) NOT NULL,
  `subtitulo_pelicula` varchar(100) DEFAULT NULL,
  `descripcion_pelicula` varchar(800) DEFAULT NULL,
  `emision` date NOT NULL,
  `duracion` time NOT NULL,
  `posters` varchar(100) DEFAULT NULL,
  `portada` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `rango` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`Id_pelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pelicula`
--

LOCK TABLES `tbl_pelicula` WRITE;
/*!40000 ALTER TABLE `tbl_pelicula` DISABLE KEYS */;
INSERT INTO `tbl_pelicula` VALUES (1,'Coraline y la puerta de los Secretos','','Una niña descubre una puerta secreta en su nueva casa y entra a una realidad alterna que la refleja fielmente de muchas formas.','2009-01-01','01:40:00','Imagenes/PostersPelicula/1poster.jpg','Imagenes/PortadasPelicula/1portada.jpg','Imagenes/LogosPeliculas/1logo.png','PG'),(2,'UP:','Una aventura de altura','Carl Fredricksen es un vendedor de globos que esta dispuesto a cumlpir su sueño: atar miles de globos a su casa y volar pero descubrira a un pequeño polizon.','2009-05-16','01:36:00','Imagenes/PostersPelicula/2poster.jpg','Imagenes/PortadasPelicula/2portada.jpg','Imagenes/LogosPeliculas/2logo.png','G'),(3,'WALL·E','','Un robot deja la Tierra para iniciar una gran búsqueda a través de la galaxia.','2008-06-26','01:38:00','Imagenes/PostersPelicula/3poster.jpg','Imagenes/PortadasPelicula/3portada.jpg','Imagenes/LogosPeliculas/3logo.png','G'),(4,'El gigante de hierro','','Un malévolo agente gubernamental amenaza con destruir la amistad entre un chico y un robot gigante alienígena.','1999-07-31','01:27:00','Imagenes/PostersPelicula/4poster.jpg','Imagenes/PortadasPelicula/4portada.jpg','Imagenes/LogosPeliculas/4logo.png','G'),(5,'The Nightmare Before Christmas','','El rey de las calabazas en el pueblo de las brujas planea secuestrar a Santa Claus y al mismo tiempo llevar pánico en vez de alegría.','1993-10-13','01:16:00','Imagenes/PostersPelicula/5poster.jpg','Imagenes/PortadasPelicula/5portada.jpg','Imagenes/LogosPeliculas/5logo.png','PG'),(6,'Akira','','Un joven telépata deambula por las calles de Tokio al darse cuenta de que los poderes que posee son asombrosos.','1988-07-16','02:05:00','Imagenes/PostersPelicula/6poster.jpg','Imagenes/PortadasPelicula/6portada.jpg','Imagenes/LogosPeliculas/6logo.png','18A'),(7,'El Rey León','','Tras la muerte de su padre, un león vuelve a enfrentar a su malvado tío y reclamar el trono de Rey de la Selva.','1994-05-07','01:29:00','Imagenes/PostersPelicula/7poster.jpg','Imagenes/PortadasPelicula/7portada.jpg','Imagenes/LogosPeliculas/7logo.png','G'),(8,'Kubo y la Búsqueda del Samurái','','Kubo vive tranquilamente en un pueblo pequeño y corriente, hasta que por error invoca a un demonio vengativo del pasado. A partir de entonces, dioses y monstruos comienzan a perseguirlo con la intención de acabar con él. Sólo encontrando la armadura mágica de su padre, un legendario guerrero samurai, podrá sobrevivir.','2016-07-08','01:42:00','Imagenes/PostersPelicula/8poster.jpg','Imagenes/PortadasPelicula/8portada.jpg','Imagenes/LogosPeliculas/8logo.png','PG'),(9,'Kimi no nawa','Tu nombre','Taki vive en Tokio y Mitsuha en un pequeño pueblo. Mientras duermen, intercambian cuerpos y comienzan a comunicarse entre ellos.','2016-08-26','01:52:00','Imagenes/PostersPelicula/9poster.jpg','Imagenes/PortadasPelicula/9portada.jpg','Imagenes/LogosPeliculas/9logo.png','G'),(10,'La tumba de las luciérnagas','','Un adolescente se ve obligado a cuidar a su hermana menor después de que un bombardeo aliado durante la Segunda Guerra Mundial destruye su casa y mata a su madre.','1988-04-16','01:30:00','Imagenes/PostersPelicula/10poster.jpg','Imagenes/PortadasPelicula/10portada.jpg','Imagenes/LogosPeliculas/10logo.png','PG'),(11,'Gantz','Zenpen','Kei Kurono es un chico que se reencuentra con un amigo de la infancia, Masaru Kato quien quiere ayudar a un borracho a salir de las vías del tren pero se topan con una esfera negra despues de su muerte.','2011-01-28','01:58:00','Imagenes/PostersPelicula/11poster.jpg','Imagenes/PortadasPelicula/11portada.jpg','Imagenes/LogosPeliculas/11logo.png','14A'),(12,'Mi Vecino Totoro','','Satsuke y Mei se establecen en su casa de campo con su padre y esperan a que su madre se recupere de una enfermedad, mientras se hacne amigas de un vecino algo particular.','1988-04-16','01:40:00','Imagenes/PostersPelicula/12poster.jpg','Imagenes/PortadasPelicula/12portada.jpg','Imagenes/LogosPeliculas/12logo.png','G'),(13,'La Tortuga Roja','','Atrapado en una isla desierta, rodeado de todo tipo de animales, un náufrago tiene que adaptarse a la vida en la naturaleza más pura y salvaje. Durante sus inútiles intentos por escapar, conoce a una misteriosa tortuga roja y, desde ese momento, su vida cambia para siempre.','2017-01-20','01:21:00','Imagenes/PostersPelicula/13poster.jpg','Imagenes/PortadasPelicula/13portada.jpg','Imagenes/LogosPeliculas/13logo.png','PG');
/*!40000 ALTER TABLE `tbl_pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pelicula_generos`
--

DROP TABLE IF EXISTS `tbl_pelicula_generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pelicula_generos` (
  `Id_pelicula_genero` int(11) NOT NULL AUTO_INCREMENT,
  `Id_pelicula` int(11) NOT NULL,
  `Id_genero` int(11) NOT NULL,
  PRIMARY KEY (`Id_pelicula_genero`),
  KEY `Id_pelicula` (`Id_pelicula`),
  KEY `Id_genero` (`Id_genero`),
  CONSTRAINT `tbl_pelicula_generos_ibfk_1` FOREIGN KEY (`Id_pelicula`) REFERENCES `tbl_pelicula` (`Id_pelicula`),
  CONSTRAINT `tbl_pelicula_generos_ibfk_2` FOREIGN KEY (`Id_genero`) REFERENCES `tbl_genero` (`Id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pelicula_generos`
--

LOCK TABLES `tbl_pelicula_generos` WRITE;
/*!40000 ALTER TABLE `tbl_pelicula_generos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pelicula_generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_serie`
--

DROP TABLE IF EXISTS `tbl_serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_serie` (
  `Id_serie` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_serie` varchar(60) NOT NULL,
  `descripcion_serie` varchar(1000) NOT NULL,
  `logo_serie` varchar(900) DEFAULT NULL,
  `portada_serie` varchar(900) DEFAULT NULL,
  `emision` date NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `temporadas` int(3) DEFAULT NULL,
  PRIMARY KEY (`Id_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_serie`
--

LOCK TABLES `tbl_serie` WRITE;
/*!40000 ALTER TABLE `tbl_serie` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_serie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_serie_generos`
--

DROP TABLE IF EXISTS `tbl_serie_generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_serie_generos` (
  `Id_serie_genero` int(11) NOT NULL AUTO_INCREMENT,
  `Id_serie` int(11) NOT NULL,
  `Id_genero` int(11) NOT NULL,
  PRIMARY KEY (`Id_serie_genero`),
  KEY `Id_serie` (`Id_serie`),
  KEY `Id_genero` (`Id_genero`),
  CONSTRAINT `tbl_serie_generos_ibfk_1` FOREIGN KEY (`Id_serie`) REFERENCES `tbl_serie` (`Id_serie`),
  CONSTRAINT `tbl_serie_generos_ibfk_2` FOREIGN KEY (`Id_genero`) REFERENCES `tbl_genero` (`Id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_serie_generos`
--

LOCK TABLES `tbl_serie_generos` WRITE;
/*!40000 ALTER TABLE `tbl_serie_generos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_serie_generos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-07 22:03:55
