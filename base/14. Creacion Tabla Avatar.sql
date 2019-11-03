CREATE TABLE `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componente` varchar(255) DEFAULT NULL,
  `nombre_original` varchar(255) DEFAULT NULL,
  `nombre_traducido` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;