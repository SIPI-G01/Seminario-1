/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 5.7.26 : Database - seminario1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`seminario1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `seminario1`;

/*Table structure for table `objetivo` */

DROP TABLE IF EXISTS `objetivo`;

CREATE TABLE `objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `objetivo` */

insert  into `objetivo`(`id`,`nombre`,`descripcion`,`activo`) values 
(1,'Objetivo 1',NULL,1),
(2,'Objetivo 2',NULL,1),
(3,'Objetivo 3',NULL,1);

/*Table structure for table `objetivo_tiempo` */

DROP TABLE IF EXISTS `objetivo_tiempo`;

CREATE TABLE `objetivo_tiempo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) DEFAULT NULL,
  `tiempo` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `objetivo_tiempo` */

insert  into `objetivo_tiempo`(`id`,`id_objetivo`,`tiempo`,`activo`) values 
(1,1,'Tiempo 1',1),
(2,1,'Tiempo 2',1),
(3,1,'Tiempo 3',1),
(4,2,'Tiempo 1',1),
(5,2,'Tiempo 2',1);

/*Table structure for table `publicacion` */

DROP TABLE IF EXISTS `publicacion`;

CREATE TABLE `publicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `texto` text,
  `estado` int(5) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `publicacion` */

/*Table structure for table `publicacion_comentario` */

DROP TABLE IF EXISTS `publicacion_comentario`;

CREATE TABLE `publicacion_comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `texto` text,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_comentario` */

/*Table structure for table `publicacion_imagen` */

DROP TABLE IF EXISTS `publicacion_imagen`;

CREATE TABLE `publicacion_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_imagen` */

/*Table structure for table `publicacion_like` */

DROP TABLE IF EXISTS `publicacion_like`;

CREATE TABLE `publicacion_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` int(4) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_like` */

/*Table structure for table `publicacion_objetivo` */

DROP TABLE IF EXISTS `publicacion_objetivo`;

CREATE TABLE `publicacion_objetivo` (
  `id_publicacion` int(11) DEFAULT NULL,
  `id_objetivo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_objetivo` */

/*Table structure for table `publicacion_tiempo` */

DROP TABLE IF EXISTS `publicacion_tiempo`;

CREATE TABLE `publicacion_tiempo` (
  `id_publicacion` int(11) DEFAULT NULL,
  `id_tiempo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_tiempo` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `activado` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `creado_fecha` datetime DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

/*Table structure for table `usuario_objetivo` */

DROP TABLE IF EXISTS `usuario_objetivo`;

CREATE TABLE `usuario_objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_objetivo` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usuario_objetivo` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
