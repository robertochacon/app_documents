# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Base de datos: app_documentos
# Tiempo de Generación: 2022-03-12 21:19:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla documents
# ------------------------------------------------------------

CREATE TABLE `documents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `type_document` varchar(100) DEFAULT NULL,
  `shape_document` varchar(100) DEFAULT NULL,
  `date_document` date DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;

INSERT INTO `documents` (`id`, `title`, `type_document`, `shape_document`, `date_document`, `date_create`, `comment`, `file`, `status`)
VALUES
	(1,'test example','test','example','2022-03-12','2022-03-12','comentario de ejemplo','Kawasaki Ninja ZR6R 636 2014.jpg',b'1'),
	(2,'example','123','si si sis','2022-03-25','2022-03-12','otro mas','Captura de Pantalla 2021-08-18 a la(s) 6.05.13 p. m..png',b'1'),
	(8,'sisisiisisisis','test','example','2022-03-04','2022-03-12','si','Selecion-2021-unibe.pdf',b'1');

/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla shapes
# ------------------------------------------------------------

CREATE TABLE `shapes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `shapes` WRITE;
/*!40000 ALTER TABLE `shapes` DISABLE KEYS */;

INSERT INTO `shapes` (`id`, `name`, `status`)
VALUES
	(1,'example',b'1'),
	(4,'si si sis',b'1');

/*!40000 ALTER TABLE `shapes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla types
# ------------------------------------------------------------

CREATE TABLE `types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;

INSERT INTO `types` (`id`, `name`, `status`)
VALUES
	(1,'test',b'1'),
	(3,'123',b'1'),
	(5,'real',b'1');

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `status`)
VALUES
	(2,'r.chacon','admin',b'1'),
	(3,'holaaa','asiasi',b'1'),
	(5,'prueba nueva no mas','sisis',b'1');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
