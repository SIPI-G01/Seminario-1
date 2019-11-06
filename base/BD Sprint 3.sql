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

/*Table structure for table `avatar` */

DROP TABLE IF EXISTS `avatar`;

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componente` varchar(255) DEFAULT NULL,
  `nombre_original` varchar(255) DEFAULT NULL,
  `nombre_traducido` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=317 DEFAULT CHARSET=latin1;

/*Data for the table `avatar` */

insert  into `avatar`(`id`,`componente`,`nombre_original`,`nombre_traducido`,`activo`) values 
(4,'estilo_avatar','Circle','Redondo',1),
(5,'estilo_avatar','Transparent','Trasparente',1),
(6,'cabeza','NoHair','SinPelo',1),
(7,'cabeza','Eyepatch','Parche',1),
(8,'cabeza','Hat','Sombrero',1),
(9,'cabeza','Hijab','Hijab',1),
(10,'cabeza','Turban','Turbante',1),
(11,'cabeza','WinterHat1','GorroInvernal1',1),
(12,'cabeza','WinterHat2','GorroInvernal2',1),
(13,'cabeza','WinterHat3','GorroInvernal3',1),
(14,'cabeza','WinterHat4','GorroInvernal4',1),
(15,'cabeza','LongHairBigHair','PeloLargoVoluminoso',1),
(16,'cabeza','LongHairBob ','PeloLargoBob',1),
(17,'cabeza','LongHairBun','Rodete',1),
(18,'cabeza','LongHairCurly','PeloLargoEnrulado',1),
(19,'cabeza','LongHairCurvy','PeloLargoOndas',1),
(20,'cabeza','LongHairDreads','Rastas',1),
(21,'cabeza','LongHairFrida','FridaKahlo',1),
(22,'cabeza','LongHairFro','Afro',1),
(23,'cabeza','LongHairFroBand','AfroVincha',1),
(24,'cabeza','LongHairNotTooLong','PeloMediaMelena',1),
(25,'cabeza','LongHairShavedSides','PeloLargoCostadosRapados',1),
(26,'cabeza','LongHairMiaWallace','CorteMiaWallace',1),
(27,'cabeza','LongHairStraight','PeloLargoLasio',1),
(28,'cabeza','LongHairStraight2','PeloLargoLasio2',1),
(29,'cabeza','LongHairStraightStrand','PeloLargoLasioMechones',1),
(30,'cabeza','ShortHairDreads1','PeloCortoRastas1',1),
(31,'cabeza','ShortHairDreads2','PeloCortoRastas2',1),
(32,'cabeza','ShortHairFrizzle','PeloCortoEncrespado',1),
(33,'cabeza','ShortHairShaggyMullet','CorteShaggyMullet',1),
(34,'cabeza','ShortHairShortCurly','PeloCortoEnrulado',1),
(35,'cabeza','ShortHairShortFlat','PeloCortoPlano',1),
(36,'cabeza','ShortHairShortRound','PeloCortoRedondeado',1),
(37,'cabeza','ShortHairShortWaved','PeloCortoOndulado',1),
(38,'cabeza','ShortHairSides','PeloALosCostados',1),
(39,'cabeza','ShortHairTheCaesar','CorteTheCaesar',1),
(40,'cabeza','ShortHairTheCaesarSidePart','CorteTheCaesarConRaya',1),
(41,'accesorios','Blank','Vacio',1),
(42,'accesorios','Kurt','LentesDeSolKurtCobain',1),
(43,'accesorios','Prescription01','Anteojos01',1),
(44,'accesorios','Prescription02','Anteojos02',1),
(45,'accesorios','Round','AnteojosHarryPotter',1),
(46,'accesorios','SunGlasses','LentesDeSol',1),
(47,'accesorios','Wayfarers','LentesDeSolRayBan',1),
(48,'colorSombrero','Black','Negro',1),
(49,'colorSombrero','Blue01','Azul01',1),
(50,'colorSombrero','Blue02','Azul02',1),
(51,'colorSombrero','Blue03','Azul03',1),
(52,'colorSombrero','Gray01','Gris01',1),
(53,'colorSombrero','Gray02','Gris02',1),
(54,'colorSombrero','Heather','Gris03',1),
(55,'colorSombrero','PastelBlue','AzulPastel',1),
(56,'colorSombrero','PastelGreen','VerdePastel',1),
(57,'colorSombrero','PastelOrange','NaranjaPastel',1),
(58,'colorSombrero','PastelRed','RojoPastel',1),
(59,'colorSombrero','PastelYellow','AmarilloPastel',1),
(60,'colorSombrero','Pink','Rosa',1),
(61,'colorSombrero','Red','Rojo',1),
(62,'colorSombrero','White','Blanco',1),
(63,'colorPelo','Auburn','Bermejo',1),
(64,'colorPelo','Black','Negro',1),
(65,'colorPelo','Blonde','Rubio',1),
(66,'colorPelo','BlondeGolden','RubioDorado',1),
(67,'colorPelo','Brown','Casta&ntilde;o',1),
(68,'colorPelo','BrownDark','Casta&ntilde;oOscuro',1),
(69,'colorPelo','PastelPink','RosaPastel',1),
(70,'colorPelo','Platinum','Platinado',1),
(71,'colorPelo','Red','Rojo',1),
(72,'colorPelo','SilverGray','GrisPlata',1),
(73,'barba','Blanck','Rasurado',1),
(74,'barba','BeardMedium','BarbaMedia',1),
(75,'barba','BeardLight','BarbaTenue',1),
(76,'barba','BeardMagestic','BarbaMagestuosa',1),
(77,'barba','MoustacheFancy','MostachoFrances',1),
(78,'barba','MoustacheMagnum','MostachoMagnum',1),
(79,'colorBarba','Auburn','Bermejo',1),
(80,'colorBarba','Black','Negro',1),
(81,'colorBarba','Blonde','Rubio',1),
(82,'colorBarba','BlondeGolden','RubioDorado',1),
(83,'colorBarba','Brown','Casta&ntilde;o',1),
(84,'colorBarba','BrownDark','Casta&ntilde;oOscuro',1),
(85,'colorBarba','PastelPink','RosaPastel',1),
(86,'colorBarba','Platinum','Platinado',1),
(87,'colorBarba','Red','Rojo',1),
(88,'atuendos','BlazerShirt','RemeraConSaco',1),
(89,'atuendos','BlazerSweater','PuloverConSaco',1),
(90,'atuendos','CollarSweater','PuloverConCuello',1),
(91,'atuendos','GraphicShirt','RemeraEstampada',1),
(92,'atuendos','Hoodie','Cangurito',1),
(93,'atuendos','Overall','Enterito',1),
(94,'atuendos','ShirtCrewNeck','RemeraCuelloRedondo',1),
(95,'atuendos','ShirtScoopNeck','RemeraCuelloRedondoAbierto',1),
(96,'atuendos','ShirtVNeck','RemeraCuelloEnV',1),
(97,'colorTela','Black','Negro',1),
(98,'colorTela','Blue01','Azul01',1),
(99,'colorTela','Blue02','Azul02',1),
(100,'colorTela','Blue03','Azul03',1),
(101,'colorTela','Gray01','Gris01',1),
(102,'colorTela','Gray02','Gris02',1),
(103,'colorTela','Heather','Gris03',1),
(104,'colorTela','PastelBlue','AzulPastel',1),
(105,'colorTela','PastelGreen','VerdePastel',1),
(106,'colorTela','PastelOrange','NaranjaPastel',1),
(107,'colorTela','PastelRed','RojoPastel',1),
(108,'colorTela','PastelYellow','AmarilloPastel',1),
(109,'colorTela','Pink','Rosa',1),
(110,'colorTela','Red','Rojo',1),
(111,'colorTela','White','Blanco',1),
(112,'ojos','Close','Cerrados',1),
(113,'ojos','Cry','Llorando',1),
(114,'ojos','Default','PorDefecto',1),
(115,'ojos','Dizzy','EnCruz',1),
(116,'ojos','EyeRoll','RodarOjos',1),
(117,'ojos','Happy','Feliz',1),
(118,'ojos','Hearts','Corazones',1),
(119,'ojos','Side','Picaro',1),
(120,'ojos','Squint','Entrecerrados',1),
(121,'ojos','Surprised','Sorprendido',1),
(122,'ojos','Wink','Gui&ntilde;o1',1),
(123,'ojos','WinkWacky','Gui&ntilde;o2',1),
(124,'cejas','Angry','Enojado1',1),
(125,'cejas','AngryNatural','Enojado2',1),
(126,'cejas','Default','PorDefecto1',1),
(127,'cejas','DefaultNatural','PorDefecto2',1),
(128,'cejas','FlatNatural','Chatas',1),
(129,'cejas','RaisedExcited','Elevadas1',1),
(130,'cejas','RaisedExcitedNatural','Elevadas2',1),
(131,'cejas','SadConcerned','TristePreocupado1',1),
(132,'cejas','SadConcernedNatural','TristePreocupado2',1),
(133,'cejas','UnibrowNatural','Uniceja',1),
(134,'cejas','UpDown','UnaCejaElevada1',1),
(135,'cejas','UpDownNatural','UnaCejaElevada2',1),
(136,'boca','Concerned','Preocupado',1),
(137,'boca','Default','PorDefecto',1),
(138,'boca','Disbelief','Boquiabierto',1),
(139,'boca','Eating','Sonrojado',1),
(140,'boca','Grimace','Mueca',1),
(141,'boca','Sad','Triste',1),
(142,'boca','ScreamOpen','Asustado',1),
(143,'boca','Serious','Serio',1),
(144,'boca','Smile','SonrisaDientes',1),
(145,'boca','Tongue','Lengua',1),
(146,'boca','Twinkie','Sonrisa',1),
(147,'boca','Vomit','Vomito',1),
(148,'piel','Tanned','Bronceado',1),
(149,'piel','Yellow','Amarillenta',1),
(150,'piel','Pale','Palido',1),
(151,'piel','Light','Claro',1),
(152,'piel','Brown','Moreno',1),
(153,'piel','DarkBrown','MorenoOscuro1',1),
(154,'piel','Black','MorenoOscuro2',1),
(155,'estilo_avatar','Circle','Redondo',1),
(156,'estilo_avatar','Transparent','Trasparente',1),
(157,'cabeza','NoHair','SinPelo',1),
(158,'cabeza','Eyepatch','Parche',1),
(159,'cabeza','Hat','Sombrero',1),
(160,'cabeza','Hijab','Hijab',1),
(161,'cabeza','Turban','Turbante',1),
(162,'cabeza','WinterHat1','GorroInvernal1',1),
(163,'cabeza','WinterHat2','GorroInvernal2',1),
(164,'cabeza','WinterHat3','GorroInvernal3',1),
(165,'cabeza','WinterHat4','GorroInvernal4',1),
(166,'cabeza','LongHairBigHair','PeloLargoVoluminoso',1),
(167,'cabeza','LongHairBob ','PeloLargoBob',1),
(168,'cabeza','LongHairBun','Rodete',1),
(169,'cabeza','LongHairCurly','PeloLargoEnrulado',1),
(170,'cabeza','LongHairCurvy','PeloLargoOndas',1),
(171,'cabeza','LongHairDreads','Rastas',1),
(172,'cabeza','LongHairFrida','FridaKahlo',1),
(173,'cabeza','LongHairFro','Afro',1),
(174,'cabeza','LongHairFroBand','AfroVincha',1),
(175,'cabeza','LongHairNotTooLong','PeloMediaMelena',1),
(176,'cabeza','LongHairShavedSides','PeloLargoCostadosRapados',1),
(177,'cabeza','LongHairMiaWallace','CorteMiaWallace',1),
(178,'cabeza','LongHairStraight','PeloLargoLasio',1),
(179,'cabeza','LongHairStraight2','PeloLargoLasio2',1),
(180,'cabeza','LongHairStraightStrand','PeloLargoLasioMechones',1),
(181,'cabeza','ShortHairDreads1','PeloCortoRastas1',1),
(182,'cabeza','ShortHairDreads2','PeloCortoRastas2',1),
(183,'cabeza','ShortHairFrizzle','PeloCortoEncrespado',1),
(184,'cabeza','ShortHairShaggyMullet','CorteShaggyMullet',1),
(185,'cabeza','ShortHairShortCurly','PeloCortoEnrulado',1),
(186,'cabeza','ShortHairShortFlat','PeloCortoPlano',1),
(187,'cabeza','ShortHairShortRound','PeloCortoRedondeado',1),
(188,'cabeza','ShortHairShortWaved','PeloCortoOndulado',1),
(189,'cabeza','ShortHairSides','PeloALosCostados',1),
(190,'cabeza','ShortHairTheCaesar','CorteTheCaesar',1),
(191,'cabeza','ShortHairTheCaesarSidePart','CorteTheCaesarConRaya',1),
(192,'accesorios','Blank','Vacio',1),
(193,'accesorios','Kurt','LentesDeSolKurtCobain',1),
(194,'accesorios','Prescription01','Anteojos01',1),
(195,'accesorios','Prescription02','Anteojos02',1),
(196,'accesorios','Round','AnteojosHarryPotter',1),
(197,'accesorios','SunGlasses','LentesDeSol',1),
(198,'accesorios','Wayfarers','LentesDeSolRayBan',1),
(199,'colorSombrero','Black','Negro',1),
(200,'colorSombrero','Blue01','Azul01',1),
(201,'colorSombrero','Blue02','Azul02',1),
(202,'colorSombrero','Blue03','Azul03',1),
(203,'colorSombrero','Gray01','Gris01',1),
(204,'colorSombrero','Gray02','Gris02',1),
(205,'colorSombrero','Heather','Gris03',1),
(206,'colorSombrero','PastelBlue','AzulPastel',1),
(207,'colorSombrero','PastelGreen','VerdePastel',1),
(208,'colorSombrero','PastelOrange','NaranjaPastel',1),
(209,'colorSombrero','PastelRed','RojoPastel',1),
(210,'colorSombrero','PastelYellow','AmarilloPastel',1),
(211,'colorSombrero','Pink','Rosa',1),
(212,'colorSombrero','Red','Rojo',1),
(213,'colorSombrero','White','Blanco',1),
(214,'colorPelo','Auburn','Bermejo',1),
(215,'colorPelo','Black','Negro',1),
(216,'colorPelo','Blonde','Rubio',1),
(217,'colorPelo','BlondeGolden','RubioDorado',1),
(218,'colorPelo','Brown','Casta&ntilde;o',1),
(219,'colorPelo','BrownDark','Casta&ntilde;oOscuro',1),
(220,'colorPelo','PastelPink','RosaPastel',1),
(221,'colorPelo','Platinum','Platinado',1),
(222,'colorPelo','Red','Rojo',1),
(223,'colorPelo','SilverGray','GrisPlata',1),
(224,'barba','Blanck','Rasurado',1),
(225,'barba','BeardMedium','BarbaMedia',1),
(226,'barba','BeardLight','BarbaTenue',1),
(227,'barba','BeardMagestic','BarbaMagestuosa',1),
(228,'barba','MoustacheFancy','MostachoFrances',1),
(229,'barba','MoustacheMagnum','MostachoMagnum',1),
(230,'colorBarba','Auburn','Bermejo',1),
(231,'colorBarba','Black','Negro',1),
(232,'colorBarba','Blonde','Rubio',1),
(233,'colorBarba','BlondeGolden','RubioDorado',1),
(234,'colorBarba','Brown','Casta&ntilde;o',1),
(235,'colorBarba','BrownDark','Casta&ntilde;oOscuro',1),
(236,'colorBarba','PastelPink','RosaPastel',1),
(237,'colorBarba','Platinum','Platinado',1),
(238,'colorBarba','Red','Rojo',1),
(239,'atuendos','BlazerShirt','RemeraConSaco',1),
(240,'atuendos','BlazerSweater','PuloverConSaco',1),
(241,'atuendos','CollarSweater','PuloverConCuello',1),
(242,'atuendos','GraphicShirt','RemeraEstampada',1),
(243,'atuendos','Hoodie','Cangurito',1),
(244,'atuendos','Overall','Enterito',1),
(245,'atuendos','ShirtCrewNeck','RemeraCuelloRedondo',1),
(246,'atuendos','ShirtScoopNeck','RemeraCuelloRedondoAbierto',1),
(247,'atuendos','ShirtVNeck','RemeraCuelloEnV',1),
(248,'colorTela','Black','Negro',1),
(249,'colorTela','Blue01','Azul01',1),
(250,'colorTela','Blue02','Azul02',1),
(251,'colorTela','Blue03','Azul03',1),
(252,'colorTela','Gray01','Gris01',1),
(253,'colorTela','Gray02','Gris02',1),
(254,'colorTela','Heather','Gris03',1),
(255,'colorTela','PastelBlue','AzulPastel',1),
(256,'colorTela','PastelGreen','VerdePastel',1),
(257,'colorTela','PastelOrange','NaranjaPastel',1),
(258,'colorTela','PastelRed','RojoPastel',1),
(259,'colorTela','PastelYellow','AmarilloPastel',1),
(260,'colorTela','Pink','Rosa',1),
(261,'colorTela','Red','Rojo',1),
(262,'colorTela','White','Blanco',1),
(263,'estampa','Bat','Murci&eacute;lago',1),
(264,'estampa','Cumbia','Cumbia',1),
(265,'estampa','Deer','Ciervo',1),
(266,'estampa','Diamond','Diamante',1),
(267,'estampa','Hola','Hola',1),
(268,'estampa','Pizza','Pizza',1),
(269,'estampa','Resist','Resist',1),
(270,'estampa','Selena','Selena',1),
(271,'estampa','Bear','Oso',1),
(272,'estampa','SkullOutLine','Calavera1',1),
(273,'estampa','Skull','Calavera2',1),
(274,'ojos','Close','Cerrados',1),
(275,'ojos','Cry','Llorando',1),
(276,'ojos','Default','PorDefecto',1),
(277,'ojos','Dizzy','EnCruz',1),
(278,'ojos','EyeRoll','RodarOjos',1),
(279,'ojos','Happy','Feliz',1),
(280,'ojos','Hearts','Corazones',1),
(281,'ojos','Side','Picaro',1),
(282,'ojos','Squint','Entrecerrados',1),
(283,'ojos','Surprised','Sorprendido',1),
(284,'ojos','Wink','Gui&ntilde;o1',1),
(285,'ojos','WinkWacky','Gui&ntilde;o2',1),
(286,'cejas','Angry','Enojado1',1),
(287,'cejas','AngryNatural','Enojado2',1),
(288,'cejas','Default','PorDefecto1',1),
(289,'cejas','DefaultNatural','PorDefecto2',1),
(290,'cejas','FlatNatural','Chatas',1),
(291,'cejas','RaisedExcited','Elevadas1',1),
(292,'cejas','RaisedExcitedNatural','Elevadas2',1),
(293,'cejas','SadConcerned','TristePreocupado1',1),
(294,'cejas','SadConcernedNatural','TristePreocupado2',1),
(295,'cejas','UnibrowNatural','Uniceja',1),
(296,'cejas','UpDown','UnaCejaElevada1',1),
(297,'cejas','UpDownNatural','UnaCejaElevada2',1),
(298,'boca','Concerned','Preocupado',1),
(299,'boca','Default','PorDefecto',1),
(300,'boca','Disbelief','Boquiabierto',1),
(301,'boca','Eating','Sonrojado',1),
(302,'boca','Grimace','Mueca',1),
(303,'boca','Sad','Triste',1),
(304,'boca','ScreamOpen','Asustado',1),
(305,'boca','Serious','Serio',1),
(306,'boca','Smile','SonrisaDientes',1),
(307,'boca','Tongue','Lengua',1),
(308,'boca','Twinkie','Sonrisa',1),
(309,'boca','Vomit','Vomito',1),
(310,'piel','Tanned','Bronceado',1),
(311,'piel','Yellow','Amarillenta',1),
(312,'piel','Pale','Palido',1),
(313,'piel','Light','Claro',1),
(314,'piel','Brown','Moreno',1),
(315,'piel','DarkBrown','MorenoOscuro1',1),
(316,'piel','Black','MorenoOscuro2',1);

/*Table structure for table `objetivo` */

DROP TABLE IF EXISTS `objetivo`;

CREATE TABLE `objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1,
  `activo` tinyint(1) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `objetivo` */

insert  into `objetivo`(`id`,`nombre`,`alias`,`descripcion`,`activo`,`categoria`) values 
(1,'Aumentar masa muscular','AumentarM','Aumentar la masa muscular',1,2),
(2,'Aumentar peso','AumentarP','Rutinas para aumentar el peso corporal',1,2),
(3,'Disminuir Peso','DisminuirP','Disminuir peso corporal',1,2),
(4,'Tonificar','Tonif','Tonificar el cuerpo',1,2),
(5,'Aumentar la energ&iacute;a','AumentarE','Aumentar la energia',1,2),
(6,'Disminuir el estr&eacute;s','Estres','Disminuir el Estres',1,2),
(7,'Mejorar el estado f&iacute;sico','MejorarFisico','Aumentar la resistencia fisica',1,2),
(8,'Rutinas','Rutinas','Rutinas de ejercicios',1,2),
(9,'Mejorar la elongaci&oacute;n','elongacion','Mejorar la elasticidad de los musculos',1,2),
(10,'Recetas vegetarianas','vegetarianas','Dietas aptas para vegetarianos',1,1),
(11,'Recetas para cel&iacute;acos','celiacos ','Dietas aptas para celiacos',1,1),
(12,'Recetas mediterr&aacute;neas','mediterranea','Recetas mediterraneas',1,1),
(13,'Recetas bajas en sodio','bajasodio','Dietas bajas en sodio',1,1),
(14,'Recetas libres de gluten','LibreGluten','Dietas libres de gluten',1,1),
(15,'Recetas bajas en purinas','purinas','Dietas bajas en purinas',1,1),
(16,'Dietas para bajar de peso','adelgazar','Dietas para disminuir la grasa',1,1);

/*Table structure for table `objetivo_tiempo` */

DROP TABLE IF EXISTS `objetivo_tiempo`;

CREATE TABLE `objetivo_tiempo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) DEFAULT NULL,
  `tiempo` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `desde` int(11) DEFAULT NULL,
  `hasta` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `objetivo_tiempo` */

insert  into `objetivo_tiempo`(`id`,`id_objetivo`,`tiempo`,`alias`,`activo`,`categoria`,`desde`,`hasta`) values 
(1,1,'Un mes','1-mes',1,2,NULL,43800),
(2,1,'Entre 2 y 4 meses','2-y-4-meses',1,2,87600,175200),
(3,1,'M&aacute;s de 4 meses','mas-de-4-meses',1,2,175201,NULL),
(4,2,'Un mes','1-mes',1,2,NULL,43800),
(5,2,'Entre dos y seis meses','2-y-6-meses',1,2,87600,262800),
(6,2,'M&aacute;s de seis meses','mas-de-6',1,2,262801,NULL),
(7,3,'Un mes','1-mes',1,2,NULL,43800),
(8,3,'Entre dos y seis meses','2-y-6-meses',1,2,87600,262800),
(9,2,'Entre dos y seis meses','2-y-6-meses',1,2,87600,262800),
(10,2,'M&aacute;s de seis meses','mas-de-6',1,2,262801,NULL),
(11,6,'Un mes','1-mes',1,2,NULL,43800),
(12,3,'Entre dos y seis meses','2-y-6-meses',1,2,87600,262800),
(13,3,'M&aacute;s de seis meses','mas-de-6',1,2,262801,NULL),
(14,4,'Dos semanas','2-semanas',1,2,NULL,20160),
(15,4,'Un mes','1-mes',1,2,20161,43800),
(16,4,'M&aacute;s de un mes','mas-de-1-mes',1,2,43800,NULL),
(17,5,'Una semana','1-semana',1,2,NULL,10080),
(18,5,'Entre dos y tres semanas','Entre-2-y-3-semanas',1,2,20160,30240),
(19,6,'Un mes','1-mes',1,2,30240,43800),
(20,6,'Quince minutos','15-minutos',1,2,NULL,15),
(21,6,'Media hora','30-minutos',1,2,16,30),
(22,6,'Una hora','1-hora',1,2,31,60),
(23,7,'Tres meses','3-meses',1,2,NULL,131400),
(24,7,'Seis meses','6-meses',1,2,131401,262800),
(25,7,'Un a&ntilde;o','1-ano',1,2,262801,525600),
(26,8,'Media hora','30-minutos',1,2,NULL,30),
(27,8,'Una hora','1-hora',1,2,31,60),
(28,8,'M&aacute;s de una hora','mas-de-1-hora',1,2,61,NULL),
(29,9,'Quince minutos','15-minutos',1,2,NULL,15),
(30,9,'Hasta media hora','30-minutos',1,2,16,30),
(31,10,'Quince minutos','15-minutos',1,1,NULL,15),
(32,10,'Hasta media hora','30-minutos',1,1,16,30),
(33,2,'Entre dos y seis meses','2-y-6-meses',1,2,87600,262800),
(34,2,'M&aacute;s de seis meses','mas-de-6',1,2,262801,NULL),
(35,3,'Un mes','1-mes',1,2,NULL,43800),
(36,3,'Entre dos y seis meses','2-y-6-meses',1,2,87600,262800),
(37,3,'M&aacute;s de seis meses','mas-de-6',1,2,262801,NULL),
(38,4,'Dos semanas','2-semanas',1,2,NULL,20160),
(39,4,'Un mes','1-mes',1,2,20161,43800),
(40,4,'M&aacute;s de un mes','mas-de-1-mes',1,2,43800,NULL),
(41,5,'Una semana','1-semana',1,2,NULL,10080),
(42,5,'Entre dos y tres semanas','Entre-2-y-3-semanas',1,2,20160,30240),
(43,5,'Un mes','1-mes',1,2,30240,43800),
(44,6,'Quince minutos','15-minutos',1,2,NULL,15),
(45,6,'Media hora','30-minutos',1,2,16,30),
(46,6,'Una hora','1-hora',1,2,31,60),
(47,7,'Tres meses','3-meses',1,2,NULL,131400),
(48,7,'Seis meses','6-meses',1,2,131401,262800),
(49,7,'Un a&ntilde;o','1-ano',1,2,262801,525600),
(50,8,'Media hora','30-minutos',1,2,NULL,30),
(51,8,'Una hora','1-hora',1,2,31,60),
(52,8,'M&aacute;s de una hora','mas-de-1-hora',1,2,61,NULL),
(53,9,'Quince minutos','15-minutos',1,2,NULL,15),
(54,9,'Hasta media hora','30-minutos',1,2,16,30),
(55,10,'Quince minutos','15-minutos',1,1,NULL,15),
(56,10,'Hasta media hora','30-minutos',1,1,16,30),
(57,10,'Una hora o mas','1-hora-mas',1,1,60,NULL),
(58,11,'Hasta media hora','30-minutos',1,1,NULL,30),
(59,11,'Una hora o mas','1-hora-mas',1,1,60,NULL),
(60,13,'Hasta media hora','30-minutos',1,1,NULL,30),
(61,13,'Una hora o mas','1-hora-mas',1,1,60,NULL),
(62,14,'Hasta media hora','30-minutos',1,1,NULL,30),
(63,14,'Una hora o mas','1-hora-mas',1,1,60,NULL),
(64,15,'Hasta media hora','30-minutos',1,1,NULL,30),
(65,15,'Una hora o mas','1-hora-mas',1,1,60,NULL),
(66,16,'Un mes','1-mes',1,1,NULL,43800),
(67,16,'Entre dos y seis meses','2-y-6-meses',1,1,87600,262800),
(68,16,'M&aacute;s de seis meses','mas-de-6',1,1,262801,NULL),
(69,1,'Menos de 15 minutos','menos-de-15-minutos',1,1,NULL,15),
(70,1,'Entre 15 y media hora','entre-15-y-media-hora',1,1,16,30),
(71,1,'Mas de media hora','mas-de-media-hora',1,1,31,NULL),
(72,2,'Hasta 3 semanas','hasta-3-semanas',1,2,NULL,30240),
(73,2,'Mas de 3 semanas','mas-de-3-semanas',1,2,30241,NULL),
(74,12,'Quince minutos','15-minutos',1,1,NULL,15),
(75,12,'Media hora o mas','30-minutos-o-mas',1,1,16,NULL);

/*Table structure for table `publicacion` */

DROP TABLE IF EXISTS `publicacion`;

CREATE TABLE `publicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `texto` text,
  `estado` int(5) DEFAULT NULL,
  `valoracion` int(11) DEFAULT '0',
  `activo` tinyint(1) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `unidad_tiempo` int(11) DEFAULT NULL,
  `tiempo_minutos` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `publicacion` */

insert  into `publicacion`(`id`,`id_usuario`,`fecha`,`titulo`,`alias`,`descripcion`,`texto`,`estado`,`valoracion`,`activo`,`categoria`,`fecha_modificado`,`tiempo`,`unidad_tiempo`,`tiempo_minutos`) values 
(1,1,'2019-11-02 18:09:30','Lasagna de verduras gratinadas con queso ','Lasagna-de-verduras-gratinadas-con-queso--20191102060930','Increible receta para comer en casa','<p><b>Los ingredientes para la receta son:</b></p><p>6 laminas de lasagna</p><p>2 zanahorias</p><p>1 puerro</p><p>1/2 berenjena</p><p>20 hojas de espinaca</p><p>1 cebolla</p><p>60 gr de quesoÂ </p><p>150 ml. de leche</p><p>30 gÂ  de harina</p><p>salsa de tomate</p><p><b>Los pasos para la elaboracion de la receta son</b>:</p><p>Paso 1:Hervir agua en una olla. Cuando empiece a hervir se debe aÃ±ade las espinacas.Luego se agrega las laminas de lasagna yÂ  se debe dejar cocinar durante 10 minutos.Al transcurrir los 10 minutos se sacan de la ollas</p><p>Paso 2:lavar las verduras, pelar las zanahorias y picarlas,Â  a continuacion se pica el puerro ,se corta la cebolla ,se pela la berenjena y finalmente se cortan.</p><p>Paso 3:Colocar las laminas de zanahoria en una sarten con aceite,saltearlas brevemente en una sarten con un poco de aceite. Se debe hacer lo mismo con el puerro, la cebolla y la berenjena.</p><p>Paso 4: colocar en los platos en el fondo ,una lÃ¡mina de lasaÃ±a, encimaÂ  un poco de zanahoria y de puerro, cubrir con otra lamina de lasaÃ±a, encima espinacas y la cebolla y tapar con la otra lamina de lasaÃ±a y extender sobre la mismalas rodajas de berenjena.</p><p>Paso 5:Introducir en el horno para gratinar. Retirar y decorar cada plato con un poco de salsa de tomate.</p><div style=\"text-align: left;\"><br></div>',1,1,1,1,'2019-11-02 19:03:11',1,2,60),
(2,1,'2019-11-02 19:02:21','Flan vegano de chocolate','Flan-vegano-de-chocolate-20191102070221','El flan vegano de chocolate y tofu es un postre vegano sin gluten, apto para celiacos. Se prepara en tan sÃ³lo 15 minutos y sin horno.','<p><span style=\"font-family: &quot;Arial Black&quot;;\">Ingredientes:</span></p><p><span style=\"white-space:pre\">	</span>Para&nbsp; un flan necesitaras:</p><p>&nbsp; &nbsp; &nbsp; &nbsp; <span style=\"white-space:pre\">	</span>250 g de tofu silken</p><p><span style=\"white-space:pre\">		</span>2 cucharadas de cacao puro en polvo</p><p><span style=\"white-space:pre\">		</span>2 cucharadas de leche de soja</p><div style=\"text-align: left;\"><div>Para la cobertura necesitaras:</div><div><br></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><span style=\"white-space:pre\">		</span>2 cucharadas de cacao puro en polvo</font></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><span style=\"white-space:pre\">		</span>2 cucharadas de agua aprox.</font></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><span style=\"white-space:pre\">		</span>2 cucharadas de sirope de agave</font><br></font></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><span style=\"white-space:pre\">		</span>Avellanas trituradas</font></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Tiempo de preparaciÃ³n: 15 minutos + 2 horas de reposo en la nevera</font></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Pasos a seguir:</font></div><div><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><div>Colocar en&nbsp;<span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">&nbsp;una batidora o la leche y&nbsp; agrega el tofu, el cacao y el sirope de agave.</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Trituralo todo hasta obtener una crema sin grumos.</span></div><div><br></div><div>Luego se debe vertir en moldes de silicona y dejala en la nevera unas 2 horas.</div><div><br></div><div>Apenas el flan de chocolate este compacto, colocar el flan en un plato encima del molde, dale la vuelta y desmoldarlo delicadamente.</div><div><br></div><div>Para la cobertura, en un vaso mezcla el cacao y el agua hasta obtener una crema.</div><div><br></div><div>Con la ayuda de una&nbsp; cuchara, verter la crema encima del flan vegano y decorar finalmente con las avellanas.</div></font></div></div>',1,1,1,1,'2019-11-02 22:56:25',15,1,15),
(3,1,'2019-11-02 19:21:09','Albondigas de cordero con salsa de yogurt ','Albondigas-de-cordero-con-salsa-de-yogurt--20191102072109','Esta receta de albÃ³ndigas de cordero con salsa de yogur es estupenda para compartir al centro en una mesa de invitados ','<p><span style=\"background-color: rgb(255, 255, 255); font-family: Helvetica;\">INGREDIENTES para 4 personas para las albÃ³ndigas de cordero&nbsp;</span></p><p>600 gr de carne de cordero picada</p><p>1 huevo grande</p><p>100 gr de miga de pan</p><p>4 cucharadas de perejil picado</p><p>Una buena rama de menta fresca</p><p>2 dientes de ajo</p><p>1 cucharada de comino molido</p><p>sal y pimienta</p><p>Aceite de oliva</p><p><br></p><p>Para la salsa de yogur</p><p><br></p><p>2 yogures naturales sin azucar&nbsp;</p><p>1 diente de ajo pequeÃ±o triturado o una cucharadita de ajo en polvo</p><p>Unas 12 hojas de menta picada</p><p>Sal</p><p>2 cucharadas de aceite de oliva</p><p>ELABORACIÃ“N de las albÃ³ndigas de cordero con salsa de yogur</p><p>Colocar en un bol la carne picada, la miga de pan mojada en leche y escurrida, el ajo triturado (o ajo en polvo), el huevo, el perejil y la menta muy picaditos, el comino, la sal y la pimienta blanca.&nbsp; MÃ©zclalo todo bien hasta que quede una masa compacta.</p><p>Forma las albÃ³ndigas , enharinalas y colocarles&nbsp; un poco de aceite hasta que estÃ©n bien doradas por todos lados. Sirve las albÃ³ndigas calientes acompaÃ±adas con la salsa frÃ­a y con unos palitos de aperitivo para poder pincharlas y mojar en la salsa.</p><p>Para la salsa de yogur:</p><p>Mezclamos muy bien todos los ingredientes hasta que quede una mezcla bien integrada y dejamos reposar unos 10 minutos.</p>',1,NULL,1,1,NULL,40,1,40),
(4,1,'2019-11-02 19:31:38','Tallarines de calabacin con pesto rojo','Tallarines-de-calabacin-con-pesto-rojo-20191102073138','Unos deliciosos tallarines vegetales que no tienen nada que envidiar a los tradicionales de pasta.','<p>INGREDIENTES:</p><p>2 CALABACINES</p><p>6 TOMATES SECOS</p><p>1 CEBOLLA DE VERDEO</p><p>40 G DE AVELLANAS</p><p>1 DIENTE DE AJO</p><p>1 RAMITA DE TOMILLO</p><p>50 G DE QUESO PARMESANO RALLADO</p><p>ACEITE DE OLIVA</p><p>SAL</p><p>COMO REALIZARLO PASO A PASO:</p><p><br></p><p>PREPARAR LAS VERDURAS. POR UN LADO, COLOCAR LOS TOMATES SECOS EN UN RECIPIENTE, CUBRIRLOS CON AGUA TEMPLADA Y DEJARLOS EN REMOJO DURANTE UNOS 15 MINUTOS PARA ELABORAR DESPUES EL PESTO ROJO.</p><p>PARA HACER LOS TALLARINES, SOLO SE TIENE QUE CORTAR PRIMERO EN LAMINAS FINAS A LO LARGO&nbsp;</p><p>ELABORAR EL PESTO ROJO:</p><p><span style=\"white-space:pre\">	</span> LIMPIAR LA CEBOLLA DE VERDEO RETIRANDO LAS RAICES, LA PRIMERA CAPA Y LA PARTE VERDE MAS DURA; LUEGO, SE DEBE LAVAR Y DEJARLA SECAR.PELAR EL AJO, TAMBIEN.ESCURRIR LOS TOMATES QUE&nbsp; SE HABIA DEJADO EN REMOJO.LAVAR EL TOMILLO Y SEPARAR LAS HOJITAS.PICAR TODOS LOS INGREDIENTES MUY MENUDOS Y MEZCLALOS EN UN RECIPIENTE.</p><p>FINALMENTE, AÃ‘ADIR EL QUESO PARMESANO Y 3 CUCHARADAS DE ACEITE, Y REMUEVE EL CONJUNTO HASTA QUE TODO QUEDE BIEN INTEGRADO.&nbsp;</p><p>HERVIR LOS TALLARINES Y SERVIR:</p><p>LUEGO DE HERVIRLOS, RETIRALOS Y DEJALOS ESCURRIR EN UN COLADOR.YA TENDREMOS LA COMIDA LISTA PARA SERVIR.</p><p><br></p>',1,NULL,1,1,NULL,30,1,30),
(5,1,'2019-11-02 19:38:56','Â¡BAJA 10 KG EN UN MES!','BAJA-10-KG-EN-UN-MES-20191102073856','Lo que soÃ±aste se puede hacer realidad','<p><span style=\"font-family: \"Times New Roman\";\"><b>Â¿Que incluye una dieta para adelgazar 10 kg?</b></span></p><p><br></p><p>LACTEOS<br></p><p>Preferiblemente desnatados (leche, yogur y queso fresco 0%). Si tomas bebidas vegetales, elige las enriquecidas en calcio.</p><p>VERDURAS</p><p>Todas las verduras son recomendables para bajar de peso rapido. Incluyelas tanto en la comida como en la cena como plato principal.</p><p><br></p><p>FRUTAS:</p><p>Tambien se aconsejan todas las frutas .Lo ideal es tomar 2 o 3 raciones cada dia.</p><p><br></p><p>CEREALES, LEGUMBRES y TUBERCULOS</p><p>Este grupo de alimentos es el que utilizamos de forma energetica, como si fuera nuestra gasolina. Debemos tomarlo para que el organismo pueda hacer sus funciones, pero debemos controlar la cantidad para que el cuerpo tambien pueda aprovechar las reservas energeticas (grasa acumulada) y asi adelgazar.</p><p><br></p><p>PROTEICOS</p><p>Huevos: 3-4 huevos a la semana.</p><p>Carnes: Preferiblemente blancas (pollo o pavo) y una, mÃ¡ximo dos veces de carne roja (ternera)</p><p>Marisco: tambien puedes incorporarlo en tus recetas como pescado blanco. Almejas, berberechos, calamar, sepia, gambasâ€¦</p><p><br></p><p>ACEITES Y GRASAS</p><p>La mas recomendable es el aceite de oliva (mejor en crudo), aunque hay que moderar su cantidad a 2 o 3 cucharadas soperas al dia.</p><p><br></p>',1,NULL,1,1,'2019-11-02 23:02:57',1,5,302400),
(6,1,'2019-11-02 19:58:19','Wok de verduras y marisco ','Wok-de-verduras-y-marisco--20191102075819','Excelente wok de verduras hecho con puras verduras y mariscos\r\n','<p>Ingredientes:</p><p>12 langostinos</p><p>200 g de champiÃ±ones</p><p>1 cebolla de verdeo</p><p>1 morron verde</p><p>1 chorro de aceite de oliva</p><p>1 chorro de salsa de Soja</p><p><br></p><p>PASO 1</p><p>Retira las cabezas de los langostinos y pelar los langostinos.</p><p>PASO 2</p><p>Lava, pela y corta en trozos grandes el pimiento .Lavar los champiÃ±ones y pelar el jengibre. Picar el jengibre lo mas fino posible.</p><p>Colocar en&nbsp; un wok al fuego con un chorro de aceite de oliva. Luego aÃ±ade las cabezas de los langostinos y deja que se tuesten bien, sin dejar de remover. Despues, retiralas.</p><p>PASO 3</p><p>Sin retirar el wok del fuego, aÃ±ade las colas de los langostinos y freirlas bien por ambos lados. Cuando esten listos, retiralas y reservalas.</p><p>Saltear ahora las verduras, empezando por la cebolla de verdeo, luego por el morron&nbsp; y despuÃ©s&nbsp; los champiÃ±ones,luego se debe agregar el jengibre y sal</p><p>PASO 4</p><p>Cocinar las hortalizas a fuego fuerte durante cinco minutos.&nbsp;</p><p>PASO 5</p><p>Incorpora de nuevo las colas de los langostinos al wok y deja que se mezclen bien los sabores. Finalmente estara el plato listo para comer.Se sugiere que se sirva bien caliente el plato.</p><p><br></p>',1,1,1,1,'2019-11-04 01:33:47',1,2,60),
(7,1,'2019-11-02 20:03:26',' Rutina sencilla de cardio','-Rutina-sencilla-de-cardio-20191102080326','El cardio a primera instancia puede parecer muy facil pero en realidad no lo es. Requiere de esfuerzo y determinacion, pero realmente sirve  ya que se notan los resultados rapidamente. Nivel: principiante','<p>El secreto para las personas que estÃ¡n iniciando en el mundo del ejercicio aerobico es ser constantes. Entrenar esporadicamente no permitira que tu cuerpo adquiera las habilidades para seguir avanzando.<br></p><p>Recomiendo realizar tres rondas de estos ejercicios,&nbsp; se puede descansar 5 minutos luego de terminar cada ronda:<br></p><p>Trotar suavemente por 2 minutos.<br></p><p>Hacer 20 saltos variados</p><p>Saltar la cuerda por 2 minutos.</p><p>Trotar suavemente por 5 minutos.</p><p><br></p>',1,NULL,1,2,NULL,3,4,30240),
(8,1,'2019-11-02 20:09:08','Rutina intermedia','Rutina-intermedia-20191102080908',' La rutina intermedia es para personas que ya tienen una condicion fisica algo mas estable. Es un entrenamiento mucho mas movido y requiere de una correcta ejecucion para evitar lesiones. Por lo que tambien amerita un buen calentamiento previo.','<p><b><u>Hacer cuatro series de los siguientes ejercicios:</u></b></p><p>2 minutos de skipping</p><p>2 minutos de saltos de tijeras.</p><p>2 minutos de saltar la cuerda.</p><p>25 sentadillas saltadas.</p><p>1 minuto y 30 segundos de plancha.</p><p>Recuerda hidratarte bien antes de comenzar la rutina, y tambien es clave controlar la respiracion durante los ejercicios. AsÃ­ que no respires por la boca, inhala por la nariz en todo momento y mantener la respiracion estable.</p>',1,NULL,1,2,NULL,6,5,1814400),
(9,1,'2019-11-02 20:11:41','Rutina aerobica para expertos','Rutina-aerobica-para-expertos-20191102081141','Es para personas experimentadas; que llevan bastante tiempo entrenando y poseen la resistencia que esta rutina exige. Para mayor efectividad hacer  esta rutina una hora despues de haber ingerido proteina, ademÃ¡s de darte energÃ­a te ayudara a crecer musculo y bajar de peso.\r\n','<p>Debes realizar dos rondas de los siguientes ejercicios:</p><p>5 minutos de trote.</p><p>25 burpees.</p><p>1 minuto de plancha.</p><p>20 flexiones.</p><p>30 abdominales crunch.</p><p>30 saltos de tijera.</p><p>20 sentadillas .</p><p>En esta rutina puedes descansar 45 segundos entre cada ejercicio.&nbsp;</p><p>Es necesario que estires y relajes la respiraciÃ³n al terminar la rutina.</p><p>Asimismo, que te hidrates y mantengas una buena alimentacion para un buen desempeÃ±o durante el cardio.</p>',1,1,1,2,'2019-11-02 20:23:06',8,5,2419200),
(10,2,'2019-11-02 20:21:40','Sigue estos consejos para bajar de peso','Sigue-estos-consejos-para-bajar-de-peso-20191102082140','Logra disminuir tu peso con estos consejos\r\n','<p>contenido:</p><p>8 REGLAS BÃSICAS PARA UNA ALIMENTACION SALUDABLE PARA LA PERDIDA DE PESO</p><p>Resumen</p><p>1. Un balance calorico negativo es esencial<br></p><p>2. Una alimentacion equilibrada es importante</p><p>3. Evitar los hidratos de carbono simples</p><p>4. Consumo moderado de grasas</p><p>5. Cinco raciones de fruta y verdura</p><p>6. Ingerir liquidos&nbsp; siempre.</p><div style=\"text-align: left;\"><div>Para poder perder peso con una alimentacion saludable, hay que tener en cuenta algunas cosas.</div><div>Ademas de la magnitud del aporte energetico, la elecciÃ³n de los alimentos es fundamental.</div><div>Algunos alimentos deben evitarse durante el proceso de reduccion de peso. Otros, por el contrario, pueden favorecer la quema de grasa</div></div>',1,NULL,1,2,'2019-11-02 20:22:52',12,4,120960),
(11,2,'2019-11-02 20:31:17','Rutina Antiestres','Rutina-Antiestres-20191102083117','El estres es la respuesta fisiologica, mental y de comportamiento que produce un estado general de agotamiento cuando recibimos presion tanto interna como externa. Generalmente, esa presiÃ³n proviene del trabajo o los estudios e influye directamente en la salud fisica y mental.','<p><br></p><p>RelajaciÃ³n:</p><p><br></p><p>Enrolla una toalla, colocala detras del cuello y sujÃ©tala con firmeza de los extremos. Luego, descansa la base del crÃ¡neo, mueve la cabeza hacia delante, atras y los lados. Repite el ejercicio para la prevenciÃ³n de cansancio en esa zona.</p><p><br></p><p><br></p><p><br></p><p>Masaje en los hombros:</p><p>Coloca una mano por encima del hombro y realiza movimientos suaves; luego, presiona el musculo, despuÃ©s cambia de lado.</p><p>Estiramiento de la espalda:<br></p><p>Separa los pies, apoya los brazos en el espaldar de una silla y estira bien la espalda, procura no doblar las rodillas. Mientras lo haces, relajacion de hombros, respiracion profunda y repite.</p><p>Flexibilidad de la cabeza:<br></p><p>Sientate y coloca la mano derecha sobre la oreja izquierda, respira suavemente. Manten esta postura por 30 segundos. Vuelve a la posiciÃ³n inicial y cambia de lado.</p><p>Al momento de la practica de la rutina desconectate del mundo, no pienses en los problemas, unicamente enfocate en vos y tus minutos de relax. Luego, toma una ducha, bebe un poco de infusion de manzanilla y descansa placidamente.</p>',1,NULL,1,2,NULL,5,1,5),
(12,1,'2019-11-04 01:38:41','Budin de banana ','Budin-de-banana--20191104013841','Una buena opcion a la hora de elegir un postre','<p><b><u>Muy rico y facil de hacer, Solo se necesitan:</u></b></p><p>4 bananas&nbsp;</p><p>2 tazas de harina leudante</p><p>1/4 de azucar</p><p>1/2 de aceite</p><p>Pasos:</p><p>1-Pisar las bananas</p><p>2-AÃ±adir la harina, azucar y las bananas a un bol</p><p>3-Agregar el aceite y mezclar</p><p>4-opcional: agregar almendras o nueces a la preparacion</p><p>5-Precalentar el horno, hornear y en 25 minutos estara listo</p>',1,NULL,1,1,NULL,30,1,30),
(13,1,'2019-11-04 01:43:00','Tortilla de papa vegana','Tortilla-de-papa-vegana-20191104014300','Apto para celiacos','<p>INGREDIENTES:</p><p>1KG DE PAPAS</p><p>1/2 CEBOLLA</p><p>1/2 TAZA DE HARINA DE GARBANZO</p><p>1 TAZA DE AGUA</p><p>UNA CUCHARADITA DE SAL</p><p><br></p><p>INSTRUCCIONES:</p><p>LAVAR Y PELAR LAS PAPAS Y LA CEBOLLA</p><p>COCINAR LAS PAPAS EN UNA SARTEN CON UN POCO DE ACEITE</p><p>HACER UNA MEZCLA HOMOGENEA CON LA HARINA Y EL AGUA</p><p>AÃ‘ADIR LAS PAPAS, LA CEBOLLA Y UN POCO DE SAL</p><p>COCINAR LA MEZCLA EN UNA SARTEN</p><p>ESPERO QUE LES GUSTE</p>',1,NULL,1,1,NULL,20,1,20);

/*Table structure for table `publicacion_comentario` */

DROP TABLE IF EXISTS `publicacion_comentario`;

CREATE TABLE `publicacion_comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `texto` text,
  `fecha` datetime DEFAULT NULL,
  `reply` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_comentario` */

insert  into `publicacion_comentario`(`id`,`id_publicacion`,`id_usuario`,`texto`,`fecha`,`reply`) values 
(1,1,1,'Les invito a probar este innovador plato','2019-11-02 18:39:46',NULL),
(2,2,1,'Excelente receta,la recomiendo','2019-11-02 22:56:47',NULL);

/*Table structure for table `publicacion_imagen` */

DROP TABLE IF EXISTS `publicacion_imagen`;

CREATE TABLE `publicacion_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_imagen` */

insert  into `publicacion_imagen`(`id`,`id_publicacion`,`imagen`,`archivo`,`activo`) values 
(38,1,'lasanadeverduras1.jpg','1572730737.jpg',1),
(39,2,'flan-vegano-sin-azucar.jpg','1572732138.jpg',1),
(40,1,'lasanadeverduaras2.jpg','1572732188.jpg',1),
(41,3,'albondigas-espinacas-cordero.jpg','1572733239.jpg',1),
(42,4,'receta-tallarines-de-calabacin-con-pesto.jpg','1572733881.jpg',1),
(43,5,'dieta.jpg','1572734324.jpg',1),
(44,5,'saludable.jpg','1572734465.jpg',1),
(45,6,'Wok.jpg','1572735489.jpg',1),
(46,7,'beneficios-de-saltar-a-la-cuerda.jpg','1572735803.jpg',1),
(47,8,'calentar-de-forma-correcta-correr.jpg','1572736147.jpg',1),
(48,9,'beneficios-de-hacer-burpees.jpg','1572736299.jpg',1),
(49,10,'Frau_auf_Laufband-_BraunS.png','1572736887.png',1),
(50,11,'antiestres.jpg','1572737452.jpg',1),
(51,12,'budin-vegano-de-banana-y-nueces-â¤ï¸-foto-principal.jpg','1572842297.jpg',1),
(52,13,'Tortilla-de-patata-vegana.jpg','1572842573.jpg',1);

/*Table structure for table `publicacion_like` */

DROP TABLE IF EXISTS `publicacion_like`;

CREATE TABLE `publicacion_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` int(4) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_like` */

insert  into `publicacion_like`(`id`,`id_publicacion`,`id_usuario`,`tipo`,`activo`) values 
(9,1,1,1,1),
(10,9,2,1,1),
(11,2,1,1,1),
(12,6,1,1,1);

/*Table structure for table `publicacion_objetivo` */

DROP TABLE IF EXISTS `publicacion_objetivo`;

CREATE TABLE `publicacion_objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_objetivo` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `publicacion_objetivo` */

insert  into `publicacion_objetivo`(`id`,`id_publicacion`,`id_objetivo`) values 
(52,1,15),
(53,2,10),
(54,3,12),
(55,4,10),
(56,5,16),
(57,6,13),
(58,7,5),
(59,7,3),
(60,8,7),
(61,8,4),
(62,8,5),
(63,9,1),
(64,9,3),
(65,9,5),
(66,9,7),
(67,10,8),
(68,11,6),
(69,12,10),
(70,13,10);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `imagen` varchar(600) DEFAULT NULL,
  `archivo` varchar(600) DEFAULT NULL,
  `activado` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `creado_fecha` datetime DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`mail`,`alias`,`usuario`,`password`,`nombre`,`apellido`,`fecha_nacimiento`,`imagen`,`archivo`,`activado`,`activo`,`creado_fecha`) values 
(1,'u1@gmail.com','usuario-1','Ricardo',NULL,'Ricardo','Gomez','1979-05-15','https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Blank&hatColor=Black&hairColor=Auburn&facialHairType=Blank&facialHairColor=Auburn&clotheType=BlazerShirt&clotheColor=Black&graphicType=Bat&eyeType=Close&eyebrowType=Angry&mouthType=Concerned&skinColor=Tanned','https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Blank&hatColor=Black&hairColor=Auburn&facialHairType=Blank&facialHairColor=Auburn&clotheType=BlazerShirt&clotheColor=Black&graphicType=Bat&eyeType=Close&eyebrowType=Angry&mouthType=Concerned&skinColor=Tanned',1,1,'2019-10-01 13:59:24'),
(2,'u2@hotmail.com','usuario-2','Usuario 2',NULL,'Maria Julia','Bustamante','1997-06-25','girl.png','girl.png',1,1,'2019-10-06 14:00:51'),
(3,'rickygomez@gmail.com','Ricky','ricardo79','1234','Ricardo','Gomez','1979-05-15',NULL,NULL,1,1,'2019-10-01 13:59:24'),
(4,'mariaj@hotmail.com','Mari','marij','1234','Maria Julia','Bustamante','1997-06-25',NULL,NULL,1,1,'2019-10-06 14:00:51'),
(5,'agustinramirez@gmail.com','agus85','agustin85','1234','Agustin','Ramirez','2019-10-01',NULL,NULL,1,1,'2019-10-09 17:30:20'),
(6,'macarenarod@gmail.com','Maca','macaR','1234','Macarena','Rodriguez','1996-03-09',NULL,NULL,1,1,'2019-10-09 17:05:30'),
(7,'rickygomez@gmail.com','Ricky','ricardo79','1234','Ricardo','Gomez','1979-05-15',NULL,NULL,1,1,'2019-10-01 13:59:24'),
(8,'mariaj@hotmail.com','Mari','marij','1234','Maria Julia','Bustamante','1997-06-25',NULL,NULL,1,1,'2019-10-06 14:00:51'),
(9,'agustinramirez@gmail.com','agus85','agustin85','1234','Agustin','Ramirez','2019-10-01',NULL,NULL,1,1,'2019-10-09 17:30:20'),
(10,'macarenarod@gmail.com','Maca','macaR','1234','Macarena','Rodriguez','1996-03-09',NULL,NULL,1,1,'2019-10-09 17:05:30'),
(11,'geruburgos@gmail.com','Ger','gerbk','1234','German','Burgos Kim','1988-10-14',NULL,NULL,1,1,'2019-10-13 17:00:00'),
(12,'nicodf@gmail.com','Nico99','nicodf','1234','Nicolas','Fernandez','1999-08-16',NULL,NULL,1,1,'2019-10-15 17:05:00'),
(13,'rickygomez@gmail.com','Ricky','ricardo79','1234','Ricardo','Gomez','1979-05-15',NULL,NULL,1,1,'2019-10-01 13:59:24'),
(14,'mariaj@hotmail.com','Mari','marij','1234','Maria Julia','Bustamante','1997-06-25',NULL,NULL,1,1,'2019-10-06 14:00:51'),
(15,'agustinramirez@gmail.com','agus85','agustin85','1234','Agustin','Ramirez','2019-10-01',NULL,NULL,1,1,'2019-10-09 17:30:20'),
(16,'macarenarod@gmail.com','Maca','macaR','1234','Macarena','Rodriguez','1996-03-09',NULL,NULL,1,1,'2019-10-09 17:05:30'),
(17,'geruburgos@gmail.com','Ger','gerbk','1234','German','Burgos Kim','1988-10-14',NULL,NULL,1,1,'2019-10-13 17:00:00'),
(18,'nicodf@gmail.com','Nico99','nicodf','1234','Nicolas','Fernandez','1999-08-16',NULL,NULL,1,1,'2019-10-15 17:05:00'),
(19,'amar@gmail.com','Marla','mar1','1234','Marla','Fischer','1985-09-06',NULL,NULL,1,1,'2019-10-09 12:45:18'),
(20,'carlosc@gmail.com','charly','charly','1234','Carlos','Castiñeiras','1998-10-09',NULL,NULL,1,1,'2019-10-18 13:02:51'),
(21,'rodribueno@gmail.com','Rodri','rod54','1234','Rodrigo','Bueno','1973-05-24',NULL,NULL,1,1,'2019-10-22 11:47:40'),
(22,'maityc@gmail.com','Maity','maity','1234','Maiten','Careaga','1998-08-30',NULL,NULL,1,1,'2019-10-22 19:32:35'),
(23,'milidom@gmail.com','MiliCARP','milicarp','1234','Milagros','Dominguez','1998-08-20',NULL,NULL,1,1,'2019-10-13 16:54:20'),
(24,'brisconech@gmail.com','Nech','nech','1234','Nacho','Brisco','1996-02-13',NULL,NULL,1,1,'2019-10-28 17:22:46'),
(25,'martoaaaj@gmail.com','Marto','martin','1234','Martin','Aiscar','1999-06-10',NULL,NULL,1,1,'2019-10-29 15:25:45'),
(26,'gastim@gmail.com','GastiBasquet','gasti','1234','Gaston','Mancov','1998-07-18',NULL,NULL,1,1,'2019-10-30 15:14:56'),
(27,'maiacug@gmail.com','Mai','maicug','1234','Maia','Cugnasco','1992-03-15',NULL,NULL,1,1,'2019-10-31 18:27:12'),
(28,'camip@gmail.com','CamiS','camisol','1234','Camila Sol','Palombo','1989-01-03',NULL,NULL,1,1,'2019-10-31 20:59:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `usuario_objetivo` */

insert  into `usuario_objetivo`(`id`,`id_usuario`,`id_objetivo`,`fecha_inicio`,`fecha_fin`,`activo`) values 
(1,1,1,NULL,NULL,1),
(2,1,2,NULL,NULL,1),
(3,1,3,NULL,NULL,1),
(4,1,4,NULL,NULL,1),
(5,1,5,NULL,NULL,1),
(6,2,6,NULL,NULL,1),
(7,1,7,NULL,NULL,1),
(8,2,8,NULL,NULL,1),
(9,2,9,NULL,NULL,1),
(10,1,10,NULL,NULL,1),
(11,1,11,NULL,NULL,1),
(12,1,12,NULL,NULL,1),
(13,1,13,NULL,NULL,1),
(14,1,14,NULL,NULL,1),
(15,1,15,NULL,NULL,1),
(16,1,16,NULL,NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
