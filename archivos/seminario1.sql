-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-11-2019 a las 02:32:37
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seminario1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE IF NOT EXISTS `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componente` varchar(255) DEFAULT NULL,
  `nombre_original` varchar(255) DEFAULT NULL,
  `nombre_traducido` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=317 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avatar`
--

INSERT INTO `avatar` (`id`, `componente`, `nombre_original`, `nombre_traducido`, `activo`) VALUES
(4, 'estilo_avatar', 'Circle', 'Redondo', 1),
(5, 'estilo_avatar', 'Transparent', 'Trasparente', 1),
(6, 'cabeza', 'NoHair', 'SinPelo', 1),
(7, 'cabeza', 'Eyepatch', 'Parche', 1),
(8, 'cabeza', 'Hat', 'Sombrero', 1),
(9, 'cabeza', 'Hijab', 'Hijab', 1),
(10, 'cabeza', 'Turban', 'Turbante', 1),
(11, 'cabeza', 'WinterHat1', 'GorroInvernal1', 1),
(12, 'cabeza', 'WinterHat2', 'GorroInvernal2', 1),
(13, 'cabeza', 'WinterHat3', 'GorroInvernal3', 1),
(14, 'cabeza', 'WinterHat4', 'GorroInvernal4', 1),
(15, 'cabeza', 'LongHairBigHair', 'PeloLargoVoluminoso', 1),
(16, 'cabeza', 'LongHairBob ', 'PeloLargoBob', 1),
(17, 'cabeza', 'LongHairBun', 'Rodete', 1),
(18, 'cabeza', 'LongHairCurly', 'PeloLargoEnrulado', 1),
(19, 'cabeza', 'LongHairCurvy', 'PeloLargoOndas', 1),
(20, 'cabeza', 'LongHairDreads', 'Rastas', 1),
(21, 'cabeza', 'LongHairFrida', 'FridaKahlo', 1),
(22, 'cabeza', 'LongHairFro', 'Afro', 1),
(23, 'cabeza', 'LongHairFroBand', 'AfroVincha', 1),
(24, 'cabeza', 'LongHairNotTooLong', 'PeloMediaMelena', 1),
(25, 'cabeza', 'LongHairShavedSides', 'PeloLargoCostadosRapados', 1),
(26, 'cabeza', 'LongHairMiaWallace', 'CorteMiaWallace', 1),
(27, 'cabeza', 'LongHairStraight', 'PeloLargoLasio', 1),
(28, 'cabeza', 'LongHairStraight2', 'PeloLargoLasio2', 1),
(29, 'cabeza', 'LongHairStraightStrand', 'PeloLargoLasioMechones', 1),
(30, 'cabeza', 'ShortHairDreads1', 'PeloCortoRastas1', 1),
(31, 'cabeza', 'ShortHairDreads2', 'PeloCortoRastas2', 1),
(32, 'cabeza', 'ShortHairFrizzle', 'PeloCortoEncrespado', 1),
(33, 'cabeza', 'ShortHairShaggyMullet', 'CorteShaggyMullet', 1),
(34, 'cabeza', 'ShortHairShortCurly', 'PeloCortoEnrulado', 1),
(35, 'cabeza', 'ShortHairShortFlat', 'PeloCortoPlano', 1),
(36, 'cabeza', 'ShortHairShortRound', 'PeloCortoRedondeado', 1),
(37, 'cabeza', 'ShortHairShortWaved', 'PeloCortoOndulado', 1),
(38, 'cabeza', 'ShortHairSides', 'PeloALosCostados', 1),
(39, 'cabeza', 'ShortHairTheCaesar', 'CorteTheCaesar', 1),
(40, 'cabeza', 'ShortHairTheCaesarSidePart', 'CorteTheCaesarConRaya', 1),
(41, 'accesorios', 'Blank', 'Vacio', 1),
(42, 'accesorios', 'Kurt', 'LentesDeSolKurtCobain', 1),
(43, 'accesorios', 'Prescription01', 'Anteojos01', 1),
(44, 'accesorios', 'Prescription02', 'Anteojos02', 1),
(45, 'accesorios', 'Round', 'AnteojosHarryPotter', 1),
(46, 'accesorios', 'SunGlasses', 'LentesDeSol', 1),
(47, 'accesorios', 'Wayfarers', 'LentesDeSolRayBan', 1),
(48, 'colorSombrero', 'Black', 'Negro', 1),
(49, 'colorSombrero', 'Blue01', 'Azul01', 1),
(50, 'colorSombrero', 'Blue02', 'Azul02', 1),
(51, 'colorSombrero', 'Blue03', 'Azul03', 1),
(52, 'colorSombrero', 'Gray01', 'Gris01', 1),
(53, 'colorSombrero', 'Gray02', 'Gris02', 1),
(54, 'colorSombrero', 'Heather', 'Gris03', 1),
(55, 'colorSombrero', 'PastelBlue', 'AzulPastel', 1),
(56, 'colorSombrero', 'PastelGreen', 'VerdePastel', 1),
(57, 'colorSombrero', 'PastelOrange', 'NaranjaPastel', 1),
(58, 'colorSombrero', 'PastelRed', 'RojoPastel', 1),
(59, 'colorSombrero', 'PastelYellow', 'AmarilloPastel', 1),
(60, 'colorSombrero', 'Pink', 'Rosa', 1),
(61, 'colorSombrero', 'Red', 'Rojo', 1),
(62, 'colorSombrero', 'White', 'Blanco', 1),
(63, 'colorPelo', 'Auburn', 'Bermejo', 1),
(64, 'colorPelo', 'Black', 'Negro', 1),
(65, 'colorPelo', 'Blonde', 'Rubio', 1),
(66, 'colorPelo', 'BlondeGolden', 'RubioDorado', 1),
(67, 'colorPelo', 'Brown', 'Casta&ntilde;o', 1),
(68, 'colorPelo', 'BrownDark', 'Casta&ntilde;oOscuro', 1),
(69, 'colorPelo', 'PastelPink', 'RosaPastel', 1),
(70, 'colorPelo', 'Platinum', 'Platinado', 1),
(71, 'colorPelo', 'Red', 'Rojo', 1),
(72, 'colorPelo', 'SilverGray', 'GrisPlata', 1),
(73, 'barba', 'Blanck', 'Rasurado', 1),
(74, 'barba', 'BeardMedium', 'BarbaMedia', 1),
(75, 'barba', 'BeardLight', 'BarbaTenue', 1),
(76, 'barba', 'BeardMagestic', 'BarbaMagestuosa', 1),
(77, 'barba', 'MoustacheFancy', 'MostachoFrances', 1),
(78, 'barba', 'MoustacheMagnum', 'MostachoMagnum', 1),
(79, 'colorBarba', 'Auburn', 'Bermejo', 1),
(80, 'colorBarba', 'Black', 'Negro', 1),
(81, 'colorBarba', 'Blonde', 'Rubio', 1),
(82, 'colorBarba', 'BlondeGolden', 'RubioDorado', 1),
(83, 'colorBarba', 'Brown', 'Casta&ntilde;o', 1),
(84, 'colorBarba', 'BrownDark', 'Casta&ntilde;oOscuro', 1),
(85, 'colorBarba', 'PastelPink', 'RosaPastel', 1),
(86, 'colorBarba', 'Platinum', 'Platinado', 1),
(87, 'colorBarba', 'Red', 'Rojo', 1),
(88, 'atuendos', 'BlazerShirt', 'RemeraConSaco', 1),
(89, 'atuendos', 'BlazerSweater', 'PuloverConSaco', 1),
(90, 'atuendos', 'CollarSweater', 'PuloverConCuello', 1),
(91, 'atuendos', 'GraphicShirt', 'RemeraEstampada', 1),
(92, 'atuendos', 'Hoodie', 'Cangurito', 1),
(93, 'atuendos', 'Overall', 'Enterito', 1),
(94, 'atuendos', 'ShirtCrewNeck', 'RemeraCuelloRedondo', 1),
(95, 'atuendos', 'ShirtScoopNeck', 'RemeraCuelloRedondoAbierto', 1),
(96, 'atuendos', 'ShirtVNeck', 'RemeraCuelloEnV', 1),
(97, 'colorTela', 'Black', 'Negro', 1),
(98, 'colorTela', 'Blue01', 'Azul01', 1),
(99, 'colorTela', 'Blue02', 'Azul02', 1),
(100, 'colorTela', 'Blue03', 'Azul03', 1),
(101, 'colorTela', 'Gray01', 'Gris01', 1),
(102, 'colorTela', 'Gray02', 'Gris02', 1),
(103, 'colorTela', 'Heather', 'Gris03', 1),
(104, 'colorTela', 'PastelBlue', 'AzulPastel', 1),
(105, 'colorTela', 'PastelGreen', 'VerdePastel', 1),
(106, 'colorTela', 'PastelOrange', 'NaranjaPastel', 1),
(107, 'colorTela', 'PastelRed', 'RojoPastel', 1),
(108, 'colorTela', 'PastelYellow', 'AmarilloPastel', 1),
(109, 'colorTela', 'Pink', 'Rosa', 1),
(110, 'colorTela', 'Red', 'Rojo', 1),
(111, 'colorTela', 'White', 'Blanco', 1),
(112, 'ojos', 'Close', 'Cerrados', 1),
(113, 'ojos', 'Cry', 'Llorando', 1),
(114, 'ojos', 'Default', 'PorDefecto', 1),
(115, 'ojos', 'Dizzy', 'EnCruz', 1),
(116, 'ojos', 'EyeRoll', 'RodarOjos', 1),
(117, 'ojos', 'Happy', 'Feliz', 1),
(118, 'ojos', 'Hearts', 'Corazones', 1),
(119, 'ojos', 'Side', 'Picaro', 1),
(120, 'ojos', 'Squint', 'Entrecerrados', 1),
(121, 'ojos', 'Surprised', 'Sorprendido', 1),
(122, 'ojos', 'Wink', 'Gui&ntilde;o1', 1),
(123, 'ojos', 'WinkWacky', 'Gui&ntilde;o2', 1),
(124, 'cejas', 'Angry', 'Enojado1', 1),
(125, 'cejas', 'AngryNatural', 'Enojado2', 1),
(126, 'cejas', 'Default', 'PorDefecto1', 1),
(127, 'cejas', 'DefaultNatural', 'PorDefecto2', 1),
(128, 'cejas', 'FlatNatural', 'Chatas', 1),
(129, 'cejas', 'RaisedExcited', 'Elevadas1', 1),
(130, 'cejas', 'RaisedExcitedNatural', 'Elevadas2', 1),
(131, 'cejas', 'SadConcerned', 'TristePreocupado1', 1),
(132, 'cejas', 'SadConcernedNatural', 'TristePreocupado2', 1),
(133, 'cejas', 'UnibrowNatural', 'Uniceja', 1),
(134, 'cejas', 'UpDown', 'UnaCejaElevada1', 1),
(135, 'cejas', 'UpDownNatural', 'UnaCejaElevada2', 1),
(136, 'boca', 'Concerned', 'Preocupado', 1),
(137, 'boca', 'Default', 'PorDefecto', 1),
(138, 'boca', 'Disbelief', 'Boquiabierto', 1),
(139, 'boca', 'Eating', 'Sonrojado', 1),
(140, 'boca', 'Grimace', 'Mueca', 1),
(141, 'boca', 'Sad', 'Triste', 1),
(142, 'boca', 'ScreamOpen', 'Asustado', 1),
(143, 'boca', 'Serious', 'Serio', 1),
(144, 'boca', 'Smile', 'SonrisaDientes', 1),
(145, 'boca', 'Tongue', 'Lengua', 1),
(146, 'boca', 'Twinkie', 'Sonrisa', 1),
(147, 'boca', 'Vomit', 'Vomito', 1),
(148, 'piel', 'Tanned', 'Bronceado', 1),
(149, 'piel', 'Yellow', 'Amarillenta', 1),
(150, 'piel', 'Pale', 'Palido', 1),
(151, 'piel', 'Light', 'Claro', 1),
(152, 'piel', 'Brown', 'Moreno', 1),
(153, 'piel', 'DarkBrown', 'MorenoOscuro1', 1),
(154, 'piel', 'Black', 'MorenoOscuro2', 1),
(155, 'estilo_avatar', 'Circle', 'Redondo', 1),
(156, 'estilo_avatar', 'Transparent', 'Trasparente', 1),
(157, 'cabeza', 'NoHair', 'SinPelo', 1),
(158, 'cabeza', 'Eyepatch', 'Parche', 1),
(159, 'cabeza', 'Hat', 'Sombrero', 1),
(160, 'cabeza', 'Hijab', 'Hijab', 1),
(161, 'cabeza', 'Turban', 'Turbante', 1),
(162, 'cabeza', 'WinterHat1', 'GorroInvernal1', 1),
(163, 'cabeza', 'WinterHat2', 'GorroInvernal2', 1),
(164, 'cabeza', 'WinterHat3', 'GorroInvernal3', 1),
(165, 'cabeza', 'WinterHat4', 'GorroInvernal4', 1),
(166, 'cabeza', 'LongHairBigHair', 'PeloLargoVoluminoso', 1),
(167, 'cabeza', 'LongHairBob ', 'PeloLargoBob', 1),
(168, 'cabeza', 'LongHairBun', 'Rodete', 1),
(169, 'cabeza', 'LongHairCurly', 'PeloLargoEnrulado', 1),
(170, 'cabeza', 'LongHairCurvy', 'PeloLargoOndas', 1),
(171, 'cabeza', 'LongHairDreads', 'Rastas', 1),
(172, 'cabeza', 'LongHairFrida', 'FridaKahlo', 1),
(173, 'cabeza', 'LongHairFro', 'Afro', 1),
(174, 'cabeza', 'LongHairFroBand', 'AfroVincha', 1),
(175, 'cabeza', 'LongHairNotTooLong', 'PeloMediaMelena', 1),
(176, 'cabeza', 'LongHairShavedSides', 'PeloLargoCostadosRapados', 1),
(177, 'cabeza', 'LongHairMiaWallace', 'CorteMiaWallace', 1),
(178, 'cabeza', 'LongHairStraight', 'PeloLargoLasio', 1),
(179, 'cabeza', 'LongHairStraight2', 'PeloLargoLasio2', 1),
(180, 'cabeza', 'LongHairStraightStrand', 'PeloLargoLasioMechones', 1),
(181, 'cabeza', 'ShortHairDreads1', 'PeloCortoRastas1', 1),
(182, 'cabeza', 'ShortHairDreads2', 'PeloCortoRastas2', 1),
(183, 'cabeza', 'ShortHairFrizzle', 'PeloCortoEncrespado', 1),
(184, 'cabeza', 'ShortHairShaggyMullet', 'CorteShaggyMullet', 1),
(185, 'cabeza', 'ShortHairShortCurly', 'PeloCortoEnrulado', 1),
(186, 'cabeza', 'ShortHairShortFlat', 'PeloCortoPlano', 1),
(187, 'cabeza', 'ShortHairShortRound', 'PeloCortoRedondeado', 1),
(188, 'cabeza', 'ShortHairShortWaved', 'PeloCortoOndulado', 1),
(189, 'cabeza', 'ShortHairSides', 'PeloALosCostados', 1),
(190, 'cabeza', 'ShortHairTheCaesar', 'CorteTheCaesar', 1),
(191, 'cabeza', 'ShortHairTheCaesarSidePart', 'CorteTheCaesarConRaya', 1),
(192, 'accesorios', 'Blank', 'Vacio', 1),
(193, 'accesorios', 'Kurt', 'LentesDeSolKurtCobain', 1),
(194, 'accesorios', 'Prescription01', 'Anteojos01', 1),
(195, 'accesorios', 'Prescription02', 'Anteojos02', 1),
(196, 'accesorios', 'Round', 'AnteojosHarryPotter', 1),
(197, 'accesorios', 'SunGlasses', 'LentesDeSol', 1),
(198, 'accesorios', 'Wayfarers', 'LentesDeSolRayBan', 1),
(199, 'colorSombrero', 'Black', 'Negro', 1),
(200, 'colorSombrero', 'Blue01', 'Azul01', 1),
(201, 'colorSombrero', 'Blue02', 'Azul02', 1),
(202, 'colorSombrero', 'Blue03', 'Azul03', 1),
(203, 'colorSombrero', 'Gray01', 'Gris01', 1),
(204, 'colorSombrero', 'Gray02', 'Gris02', 1),
(205, 'colorSombrero', 'Heather', 'Gris03', 1),
(206, 'colorSombrero', 'PastelBlue', 'AzulPastel', 1),
(207, 'colorSombrero', 'PastelGreen', 'VerdePastel', 1),
(208, 'colorSombrero', 'PastelOrange', 'NaranjaPastel', 1),
(209, 'colorSombrero', 'PastelRed', 'RojoPastel', 1),
(210, 'colorSombrero', 'PastelYellow', 'AmarilloPastel', 1),
(211, 'colorSombrero', 'Pink', 'Rosa', 1),
(212, 'colorSombrero', 'Red', 'Rojo', 1),
(213, 'colorSombrero', 'White', 'Blanco', 1),
(214, 'colorPelo', 'Auburn', 'Bermejo', 1),
(215, 'colorPelo', 'Black', 'Negro', 1),
(216, 'colorPelo', 'Blonde', 'Rubio', 1),
(217, 'colorPelo', 'BlondeGolden', 'RubioDorado', 1),
(218, 'colorPelo', 'Brown', 'Casta&ntilde;o', 1),
(219, 'colorPelo', 'BrownDark', 'Casta&ntilde;oOscuro', 1),
(220, 'colorPelo', 'PastelPink', 'RosaPastel', 1),
(221, 'colorPelo', 'Platinum', 'Platinado', 1),
(222, 'colorPelo', 'Red', 'Rojo', 1),
(223, 'colorPelo', 'SilverGray', 'GrisPlata', 1),
(224, 'barba', 'Blanck', 'Rasurado', 1),
(225, 'barba', 'BeardMedium', 'BarbaMedia', 1),
(226, 'barba', 'BeardLight', 'BarbaTenue', 1),
(227, 'barba', 'BeardMagestic', 'BarbaMagestuosa', 1),
(228, 'barba', 'MoustacheFancy', 'MostachoFrances', 1),
(229, 'barba', 'MoustacheMagnum', 'MostachoMagnum', 1),
(230, 'colorBarba', 'Auburn', 'Bermejo', 1),
(231, 'colorBarba', 'Black', 'Negro', 1),
(232, 'colorBarba', 'Blonde', 'Rubio', 1),
(233, 'colorBarba', 'BlondeGolden', 'RubioDorado', 1),
(234, 'colorBarba', 'Brown', 'Casta&ntilde;o', 1),
(235, 'colorBarba', 'BrownDark', 'Casta&ntilde;oOscuro', 1),
(236, 'colorBarba', 'PastelPink', 'RosaPastel', 1),
(237, 'colorBarba', 'Platinum', 'Platinado', 1),
(238, 'colorBarba', 'Red', 'Rojo', 1),
(239, 'atuendos', 'BlazerShirt', 'RemeraConSaco', 1),
(240, 'atuendos', 'BlazerSweater', 'PuloverConSaco', 1),
(241, 'atuendos', 'CollarSweater', 'PuloverConCuello', 1),
(242, 'atuendos', 'GraphicShirt', 'RemeraEstampada', 1),
(243, 'atuendos', 'Hoodie', 'Cangurito', 1),
(244, 'atuendos', 'Overall', 'Enterito', 1),
(245, 'atuendos', 'ShirtCrewNeck', 'RemeraCuelloRedondo', 1),
(246, 'atuendos', 'ShirtScoopNeck', 'RemeraCuelloRedondoAbierto', 1),
(247, 'atuendos', 'ShirtVNeck', 'RemeraCuelloEnV', 1),
(248, 'colorTela', 'Black', 'Negro', 1),
(249, 'colorTela', 'Blue01', 'Azul01', 1),
(250, 'colorTela', 'Blue02', 'Azul02', 1),
(251, 'colorTela', 'Blue03', 'Azul03', 1),
(252, 'colorTela', 'Gray01', 'Gris01', 1),
(253, 'colorTela', 'Gray02', 'Gris02', 1),
(254, 'colorTela', 'Heather', 'Gris03', 1),
(255, 'colorTela', 'PastelBlue', 'AzulPastel', 1),
(256, 'colorTela', 'PastelGreen', 'VerdePastel', 1),
(257, 'colorTela', 'PastelOrange', 'NaranjaPastel', 1),
(258, 'colorTela', 'PastelRed', 'RojoPastel', 1),
(259, 'colorTela', 'PastelYellow', 'AmarilloPastel', 1),
(260, 'colorTela', 'Pink', 'Rosa', 1),
(261, 'colorTela', 'Red', 'Rojo', 1),
(262, 'colorTela', 'White', 'Blanco', 1),
(263, 'estampa', 'Bat', 'Murci&eacute;lago', 1),
(264, 'estampa', 'Cumbia', 'Cumbia', 1),
(265, 'estampa', 'Deer', 'Ciervo', 1),
(266, 'estampa', 'Diamond', 'Diamante', 1),
(267, 'estampa', 'Hola', 'Hola', 1),
(268, 'estampa', 'Pizza', 'Pizza', 1),
(269, 'estampa', 'Resist', 'Resist', 1),
(270, 'estampa', 'Selena', 'Selena', 1),
(271, 'estampa', 'Bear', 'Oso', 1),
(272, 'estampa', 'SkullOutLine', 'Calavera1', 1),
(273, 'estampa', 'Skull', 'Calavera2', 1),
(274, 'ojos', 'Close', 'Cerrados', 1),
(275, 'ojos', 'Cry', 'Llorando', 1),
(276, 'ojos', 'Default', 'PorDefecto', 1),
(277, 'ojos', 'Dizzy', 'EnCruz', 1),
(278, 'ojos', 'EyeRoll', 'RodarOjos', 1),
(279, 'ojos', 'Happy', 'Feliz', 1),
(280, 'ojos', 'Hearts', 'Corazones', 1),
(281, 'ojos', 'Side', 'Picaro', 1),
(282, 'ojos', 'Squint', 'Entrecerrados', 1),
(283, 'ojos', 'Surprised', 'Sorprendido', 1),
(284, 'ojos', 'Wink', 'Gui&ntilde;o1', 1),
(285, 'ojos', 'WinkWacky', 'Gui&ntilde;o2', 1),
(286, 'cejas', 'Angry', 'Enojado1', 1),
(287, 'cejas', 'AngryNatural', 'Enojado2', 1),
(288, 'cejas', 'Default', 'PorDefecto1', 1),
(289, 'cejas', 'DefaultNatural', 'PorDefecto2', 1),
(290, 'cejas', 'FlatNatural', 'Chatas', 1),
(291, 'cejas', 'RaisedExcited', 'Elevadas1', 1),
(292, 'cejas', 'RaisedExcitedNatural', 'Elevadas2', 1),
(293, 'cejas', 'SadConcerned', 'TristePreocupado1', 1),
(294, 'cejas', 'SadConcernedNatural', 'TristePreocupado2', 1),
(295, 'cejas', 'UnibrowNatural', 'Uniceja', 1),
(296, 'cejas', 'UpDown', 'UnaCejaElevada1', 1),
(297, 'cejas', 'UpDownNatural', 'UnaCejaElevada2', 1),
(298, 'boca', 'Concerned', 'Preocupado', 1),
(299, 'boca', 'Default', 'PorDefecto', 1),
(300, 'boca', 'Disbelief', 'Boquiabierto', 1),
(301, 'boca', 'Eating', 'Sonrojado', 1),
(302, 'boca', 'Grimace', 'Mueca', 1),
(303, 'boca', 'Sad', 'Triste', 1),
(304, 'boca', 'ScreamOpen', 'Asustado', 1),
(305, 'boca', 'Serious', 'Serio', 1),
(306, 'boca', 'Smile', 'SonrisaDientes', 1),
(307, 'boca', 'Tongue', 'Lengua', 1),
(308, 'boca', 'Twinkie', 'Sonrisa', 1),
(309, 'boca', 'Vomit', 'Vomito', 1),
(310, 'piel', 'Tanned', 'Bronceado', 1),
(311, 'piel', 'Yellow', 'Amarillenta', 1),
(312, 'piel', 'Pale', 'Palido', 1),
(313, 'piel', 'Light', 'Claro', 1),
(314, 'piel', 'Brown', 'Moreno', 1),
(315, 'piel', 'DarkBrown', 'MorenoOscuro1', 1),
(316, 'piel', 'Black', 'MorenoOscuro2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campo` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivo`
--

DROP TABLE IF EXISTS `objetivo`;
CREATE TABLE IF NOT EXISTS `objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE latin1_spanish_ci,
  `activo` tinyint(1) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `objetivo`
--

INSERT INTO `objetivo` (`id`, `nombre`, `alias`, `descripcion`, `activo`, `categoria`) VALUES
(1, 'Aumentar masa muscular', 'AumentarM', 'Aumentar la masa muscular', 1, 2),
(2, 'Aumentar peso', 'AumentarP', 'Rutinas para aumentar el peso corporal', 1, 2),
(3, 'Disminuir Peso', 'DisminuirP', 'Disminuir peso corporal', 1, 2),
(4, 'Tonificar', 'Tonific', 'Tonificar el cuerpo', 1, 2),
(5, 'Aumentar la energ&iacute;a', 'AumentarE', 'Aumentar la energia', 1, 2),
(6, 'Disminuir el estr&eacute;s', 'Estres', 'Disminuir el Estres', 1, 2),
(7, 'Mejorar el estado f&iacute;sico', 'MejorarFisico', 'Aumentar la resistencia', 1, 2),
(8, 'Mejorar la elongaci&oacute;n', 'Elongacion', 'Mejorar la elasticidad de los musculos', 1, 2),
(9, 'Recetas vegetarianas', 'Vegetarianas', 'Recetas aptas para vegetarianos', 1, 1),
(10, 'Recetas para cel&iacute;acos', 'Celiacos', 'Recetas aptas para celiacos', 1, 1),
(11, 'Recetas mediterr&aacute;neas', 'Mediterranea', 'Recetas mediterraneas', 1, 1),
(12, 'Recetas bajas en sodio', 'Baja Sodio', 'Recertas bajas en sodio', 1, 1),
(13, 'Recetas libres de gluten', 'LibreGluten', 'Recetas libres de gluten', 1, 1),
(14, 'Recetas bajas en purinas', 'purinas', 'Recetas bajas en purinas', 1, 1),
(15, 'Recetas veganas', 'veganas', 'Recetas aptas para veganos', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivo_tiempo`
--

DROP TABLE IF EXISTS `objetivo_tiempo`;
CREATE TABLE IF NOT EXISTS `objetivo_tiempo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) DEFAULT NULL,
  `tiempo` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `desde` int(11) DEFAULT NULL,
  `hasta` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `objetivo_tiempo`
--

INSERT INTO `objetivo_tiempo` (`id`, `id_objetivo`, `tiempo`, `alias`, `activo`, `categoria`, `desde`, `hasta`) VALUES
(1, 1, 'Un mes', '1-mes', 1, 2, NULL, 43800),
(2, 1, 'Entre dos y cuatro meses', '2-y-4-meses', 1, 2, 87600, 175200),
(3, 1, 'M&aacute;s de cuatro meses', 'mas-de-4-meses', 1, 2, 175201, NULL),
(4, 2, 'Un mes', '1-mes', 1, 2, NULL, 43800),
(5, 2, 'Entre dos y seis meses', '2-y-6-meses', 1, 2, 87600, 262800),
(6, 2, 'M&aacute;s de seis meses', 'mas-de-6-meses', 1, 2, 262801, NULL),
(7, 3, 'Un mes', '1-mes', 1, 2, NULL, 43800),
(8, 3, 'Entre dos y seis meses', '2-y-6-meses', 1, 2, 87600, 262800),
(9, 4, 'Dos semanas', '2-semanas', 1, 2, NULL, 20160),
(10, 4, 'Un mes', '1-mes', 1, 2, 20161, 43800),
(11, 4, 'M&aacute;s de un mes', 'mas-de-1-mes', 1, 2, 43800, NULL),
(12, 5, 'Una semana', '1-semana', 1, 2, NULL, 10080),
(13, 5, 'Entre dos y tres semanas', 'entre-2-y-3-semanas', 1, 2, 20160, 30240),
(14, 6, 'Una hora', '1-hora', 1, 2, 31, 60),
(15, 6, 'Media hora', '30-minutos', 1, 2, 16, 30),
(16, 7, 'Tres meses', '3-meses', 1, 2, NULL, 131400),
(17, 7, 'Seis meses', '6-meses', 1, 2, 131401, 262800),
(18, 8, 'Quince minutos', '15-minutos', 1, 2, NULL, 15),
(19, 8, 'Media hora', '30-minutos', 1, 2, 16, 30),
(20, 9, 'Quince minutos', '15-minutos', 1, 1, NULL, 15),
(21, 9, 'Media hora', '30-minutos', 1, 1, 16, 30),
(22, 9, 'Mas de una hora', 'mas-de-1-hora', 1, 1, 60, NULL),
(23, 10, 'Hasta media hora', '30-minutos', 1, 1, NULL, 30),
(24, 10, 'Una hora o mas', '1-hora-mas', 1, 1, 60, NULL),
(25, 11, 'Hasta media hora', '30-minutos', 1, 1, NULL, 30),
(26, 11, 'Una hora o mas', '1-hora-mas', 1, 1, 60, NULL),
(27, 12, 'Hasta media hora', '30-minutos', 1, 1, NULL, 30),
(28, 12, 'Una hora o mas', '1-hora-mas', 1, 1, 60, NULL),
(29, 13, 'Hasta media hora', '30-minutos', 1, 1, NULL, 30),
(30, 13, 'Una hora o mas', '1-hora-mas', 1, 1, 60, NULL),
(31, 14, 'Hasta media hora', '30-minutos', 1, 1, NULL, 30),
(32, 14, 'Una hora o mas', '1-hora-mas', 1, 1, 60, NULL),
(33, 15, 'Hasta media hora', '30-minutos', 1, 1, NULL, 30),
(34, 15, 'Una hora o mas', '1-hora-mas', 1, 1, 60, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE IF NOT EXISTS `publicacion` (
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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id`, `id_usuario`, `fecha`, `titulo`, `alias`, `descripcion`, `texto`, `estado`, `valoracion`, `activo`, `categoria`, `fecha_modificado`, `tiempo`, `unidad_tiempo`, `tiempo_minutos`) VALUES
(1, 1, '2019-11-18 18:29:15', 'Rutina aerobica', 'Rutina-aerobica-20191118062915', 'les traigo una rutina facil de hacer en cualquier lugar, espero que les guste', '<p>Todo se debe repetir 3 veces :</p><ol><li>&nbsp;Estirar brazos: 20 segundos</li><li>&nbsp;Cuadriceps: 20 segundos</li><li>&nbsp;Gemelos: 10 segundos</li><li>&nbsp;Espalda: 30 segundos</li><li>&nbsp;Abdominales: 15 segundos</li><li>&nbsp;Plancha: 1 minuto</li><li>&nbsp;flexiones de brazo: 25</li><li>&nbsp;saltos en el lugar: 30 segundos</li><li>&nbsp;Correr: 5 minutos</li><li>&nbsp;Espinales: 20</li></ol>', 1, 4, 1, 2, '2019-11-19 00:44:45', 4, 5, 1209600),
(2, 1, '2019-11-18 18:32:44', 'Bajar de peso corriendo', 'Bajar-de-peso-corriendo-20191118063244', 'corre cada vez mas', '<p>es muy sencillo, debes correr cada dia un poco mas.comienza con una meta facil para luego llegar a un maximo de 21 km corre todos los dias comenzando por 2 km, debes hidratarte muy bien, elongar bien tus piernas y concentrarte utiliza musica si te ayuda, se siempre constante y no decaigas.</p><p>PRIMER SEMANA: 2 a 4 KM diarios</p><p>SEGUNDA SEMANA: 5 a 10 KM diarios</p><p>TERCERA SEMANA: 10 a 15 KM diarios</p><p>CUARTA SEMANA : 15 a 21 KM diarios</p><p>espero que lo logres , contame tus resultados en los comentarios</p>', 1, 4, 1, 2, '2019-11-19 00:36:10', 4, 4, 40320),
(3, 2, '2019-11-18 18:36:25', 'Flan vegano de chocolate y tofu', 'Flan-vegano-de-chocolate-y-tofu-20191118063625', 'El flan vegano de chocolate y tofu es un postre vegano sin gluten, apto para celiacos. Se prepara en tan s&oacute;lo 10 minutos y sin horno, simplemente triturando todos los ingredientes en una procesadora.', '<p>Ingredientes:</p><p><br></p><p><span style=\"white-space:pre\">	</span>Para 2 flanes grandes necesitaras:</p><p><br></p><p>&nbsp; &nbsp; &nbsp; &nbsp; <span style=\"white-space:pre\">	</span>250 g de tofu silken</p><p><br></p><p><span style=\"white-space:pre\">		</span>2 cucharadas de cacao puro en polvo</p><p><br></p><p><span style=\"white-space:pre\">		</span>2 cucharadas de sirope de agave</p><p><br></p><p><span style=\"white-space:pre\">		</span>1 cucharadita escasa de agar agar en polvo</p><p><br></p><p><span style=\"white-space:pre\">		</span>2 cucharadas de leche de soja</p><p><br></p><p><br></p><p><span style=\"white-space:pre\">	</span>Para la cobertura necesitaras:</p><p><br></p><p><span style=\"white-space:pre\">		</span>2 cucharadas de cacao puro en polvo</p><p><br></p><p><span style=\"white-space:pre\">		</span>2 cucharadas de agua aprox.</p><p><br></p><p><span style=\"white-space:pre\">		</span>Avellanas trituradas</p><p><br></p><p>Como hacer el flan vegano de chocolate y tofu</p><p><br></p><p><span style=\"white-space:pre\">		</span>Tiempo de preparacion: 10 minutos + 4 horas de reposo en la nevera</p><p><br></p><p><br></p><p>Calienta un poco la leche vegetal al fuego o al microondas.</p><p><br></p><p>Agrega el agar agar y mezcla hasta que se deshaga.</p><p><br></p><p>Ponla en una&nbsp; procesadora y agrega el tofu, el cacao y el sirope de agave.</p><p><br></p><p>Trituralo todo hasta obtener una crema sin grumos.</p><p><br></p><p>Vertela en moldes de silicona y dejala en la nevera unas 4 horas.</p><p><br></p><p>Apenas el flan de chocolate este compacto, pon un plato encima del molde, dale la vuelta y desmoldalo delicadamente.</p><p><br></p><p>Para la cobertura, en un vaso mezcla el cacao y el agua hasta obtener una crema.</p><p><br></p><p>Con la ayuda de una manga pastelera o de una cuchara, vierte la crema encima del flan vegano y decora con las avellanas.</p>', 1, 5, 1, 1, '2019-11-19 00:51:54', 30, 1, 30),
(4, 3, '2019-11-18 18:54:52', 'Lasa&ntilde;a vegetariana de verduras', 'Lasana-vegetariana-de-verduras-20191118065452', 'Les traigo esta riquisima lasa&ntilde;a de verduras que prepare el otro dia, es excelente para muchas personas, llena mucho y es facil de hacer', '<p>Ingredientes:</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;berenjena 1</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;brocoli 1</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;champi&ntilde;ones 12</p><p>&nbsp;&nbsp;&nbsp;&nbsp;zanahorias 2</p><p>&nbsp;&nbsp;&nbsp;&nbsp;Espinaca fresca 75g</p><p>&nbsp;&nbsp;&nbsp;&nbsp;Pasta para lasa&ntilde;a</p><p> </p><p>Preparacion:</p><p>&nbsp; &nbsp; capa inferior: saltear los champi&ntilde;ones junto a la espinaca , laminarlos, y colocar ambos en la primera capa</p><p>&nbsp; &nbsp; capa media: cortar el brocoli y las zanahorias en pedazos chicos, hervirlos (2 y 5 minutos), y colocarlos en la capa del medio</p><p>&nbsp;&nbsp;&nbsp;&nbsp;capa superior: cortar y cocinar las berenjenas en el microondas 5 minutos, cortar la cebolla en brunoise fina y saltearla junto a las berenjenas</p><p>&nbsp; &nbsp; por ultimo: agregar queso por encima y entre las capas si se quiere, y meter en el horno por 35 min&nbsp;<br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', 1, 6, 1, 1, '2019-11-19 00:51:50', 1, 2, 60),
(5, 4, '2019-11-18 19:01:16', 'Budin de banana', 'Budin-de-banana-20191118070116', '&iexcl;&iexcl;&iexcl;prueben este budin genial!!!', '<p>muy rico y facil de hacer, Solo se necesitan:</p><p>4 bananas&nbsp;</p><p>2 tazas de harina leudante</p><p>1/4 de azucar</p><p>1/2 de aceite</p><p>Pasos:</p><p>1-Pisar las bananas</p><p>2-A&ntilde;adir la harina, azucar y las bananas a un bol</p><p>3-Agregar el aceite y mezclar</p><p>4-opcional: agregar almendras o nueces a la preparacion</p><p>5-Precalentar el horno, hornear y en 25 minutos estara listo</p>', 1, 5, 1, 1, '2019-11-19 00:51:42', 40, 1, 40),
(6, 5, '2019-11-18 19:10:43', 'Rutina sencilla de cardio', 'Rutina-sencilla-de-cardio-20191118071043', 'El cardio a primera instancia puede parecer muy facil pero en realidad no lo es. Requiere de esfuerzo y determinacion, pero realmente lo vale puesto que se notan los resultados rapidamente. ', '<p>El secreto para las personas que est&&acute;n iniciando en el mundo del ejercicio aerobico es ser constantes. Entrenar esporadicamente no permitira que tu cuerpo adquiera las habilidades para seguir avanzando.</p><p><br></p><p>Realiza tres rondas de estos ejercicios, puedes descansar 5 minutos luego de terminar cada ronda<br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trota suavemente por 2 minutos.<br></p><p>&nbsp; &nbsp; &nbsp; &nbsp; Haz 20 saltos de tijera<br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Salta la cuerda por 2 minutos.<br></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trota suavemente por 5 minutos.<br></p>', 1, 2, 1, 2, '2019-11-19 00:41:44', 6, 4, 60480),
(7, 5, '2019-11-18 19:15:43', 'Pan de todos los dias SIN TACC', 'Pan-de-todos-los-dias-SIN-TACC-20191118071543', 'Una receta para que los que no pueden consumir gluten no tengan que resignar comer pan', '<p>Ingredientes:</p><p>145gr de harina de arroz</p><p>70gr de harina de ma&iacute;z</p><p>35gr de harina de mandioca</p><p>4gr de goma x&aacute;ntica</p><p>2gr de goma de guar</p><p>(Si no consiguen los elementos mencionados arriba - las 3 harinas, la goma x&aacute;ntica y la goma de guar- pueden reemplazarlos por 250gr de las pre mezclas que se consiguen en el mercado)</p><p>300gr papa pelada y rallada</p><p>5gr sal</p><p>3 huevos</p><p>3gr de levadura seca (o 20 gr de levadura fresca)</p><p>25gr aceite de oliva</p><p>25gr az&uacute;car</p><p>10gr jugo de lim&oacute;n</p><p><br></p><p>Preparaci&oacute;n:</p><p>Mezclar las harinas con las 2 gomas</p><p>Agregar la sal, los huevos, el az&uacute;car y el jugo de lim&oacute;n, y volver a mezclar</p><p>Por &uacute;ltimo, procesar con licuadora (o minipymer) las papas con el aceite de oliva.</p><p>Agregarlas a la mezcla anterior.</p><p>Cuando la masa est&aacute; homog&eacute;nea, verterla en una budinera</p><p>Cocinar a horno a 180 grados  durante unos 40min (el pan debe quedar seco por dentro).</p>', 1, 5, 1, 1, '2019-11-19 00:40:55', 1, 2, 60),
(8, 5, '2019-11-18 19:21:38', 'Rutina de hipertrofia en casa', 'Rutina-de-hipertrofia-en-casa-20191118072138', 'Solemos asociar el ejercicio en casa, con una metodologia para hacer deporte de manera suave. Pero no tiene que ser asi necesariamente, y dependera de la manera que solamos entrenar. Es decir, que para provocar cambios a nivel muscular, necesitaremos estimularlo correctamente. En este sentido, esta rutina de hipertrofia en casa, les sera util.\r\n', '<p>&nbsp;&nbsp;&nbsp;&nbsp;Dia 1</p><p>&nbsp; &nbsp; Ejercicio<span style=\"white-space:pre\">			</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Series<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Repeticiones<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Descanso</p><p>&nbsp; &nbsp; Press militar con mancuernas<span style=\"white-space:pre\">	</span>4<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 10/8/8/6<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Elevaciones laterales&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12/10/8&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;90 segundos</p><p>&nbsp; &nbsp; con mancuernas<span style=\"white-space:pre\">	</span></p><p>&nbsp; &nbsp; Elevaciones frontales&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12-15<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; con mancuerna<span style=\"white-space:pre\">	</span></p><p>&nbsp; &nbsp; Curl de biceps con mancuerna<span style=\"white-space:pre\">	</span> 4<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12/10/8/8<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Curl de biceps martillo<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 8-12<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 45 segundos</p><p><br></p><p>&nbsp; &nbsp; Dia 2</p><p>&nbsp; &nbsp; Ejercicio<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; Series<span style=\"white-space:pre\">	</span>Repeticiones<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Descanso</p><p>&nbsp; &nbsp; Sentadilla goblet<span style=\"white-space:pre\">	</span> 4&nbsp; &nbsp;<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; 10/8/8/6<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Sentadilla bulgara<span style=\"white-space:pre\">	</span> 3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; 12/10/8<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Peso muerto rumano&nbsp; 3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; 12-15<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; con mancuernas<span style=\"white-space:pre\">	</span></p><p>&nbsp; &nbsp; Plancha abdominal<span style=\"white-space:pre\">	</span>&nbsp; 3&nbsp; &nbsp; <span style=\"white-space:pre\">	</span>0:40 <span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Tijeras verticales<span style=\"white-space:pre\">	</span>&nbsp; 3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp;8-12<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 45 segundos</p><p><br></p><p>&nbsp; &nbsp; Dia 3</p><p>&nbsp; &nbsp; Ejercicio<span style=\"white-space:pre\">			</span>Series<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Repeticiones<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Descanso</p><p>&nbsp; &nbsp; Press de banca&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 10/8/8/6<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; con mancuernas<span style=\"white-space:pre\">	</span></p><p>&nbsp; &nbsp; Aperturas con&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12/10/8<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; mancuernas<span style=\"white-space:pre\">	</span></p><p>&nbsp; &nbsp; Flexiones pectorales&nbsp; &nbsp; 3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; al fallo <span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Tate press<span style=\"white-space:pre\">			</span>&nbsp; &nbsp; 4&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12-15<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 60 segundos</p><p>&nbsp; &nbsp; Press frances&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; 8-12<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 60 segundos</p><p>&nbsp; &nbsp; con mancuernas<span style=\"white-space:pre\">	</span></p><p><br></p><p>&nbsp; &nbsp; Dia 4</p><p>&nbsp; &nbsp; Ejercicio<span style=\"white-space:pre\">			</span>Series<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Repeticiones<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Descanso</p><p>&nbsp; &nbsp; Peso muerto&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 10/8/8/6<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; con mancuernas<span style=\"white-space:pre\">	</span></p><p>&nbsp; &nbsp; Zancadas con&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12/10/8<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; mancuerna&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>&nbsp; &nbsp; Remo con mancuerna&nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp;12-15<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Pullover con&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp;12-15<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; mancuerna<span style=\"white-space:pre\">	</span></p><p>&nbsp; &nbsp; Pajaros con&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; 8-12<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 45</p><p>&nbsp; &nbsp; &nbsp;mancuerna</p><p><br></p><p>&nbsp; &nbsp; Dia 5</p><p>&nbsp; &nbsp; Ejercicio<span style=\"white-space:pre\">			</span>&nbsp; &nbsp; Series<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Repeticiones<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; Descanso</p><p>&nbsp; &nbsp; Press de banca <span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; 4<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 10/8/8/6<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; con mancuernas</p><p>&nbsp; &nbsp; Press militar&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12/10/8<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; con mancuernas&nbsp; &nbsp;&nbsp;</p><p>&nbsp; &nbsp; Curl de biceps <span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12-15<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; con mancuerna</p><p>&nbsp; &nbsp; Plancha abdominal<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 4<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0:40<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 90 segundos</p><p>&nbsp; &nbsp; Abdominales bicicleta<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; 3<span style=\"white-space:pre\">	</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;10-15<span style=\"white-space:pre\">		</span>&nbsp; &nbsp; 45 segundos</p><p><br></p><p>Cada 2 semanas deberemos de incrementar el peso en los ejercicios realizados.</p>', 1, 6, 1, 2, '2019-11-19 00:33:25', 3, 5, 907200),
(9, 6, '2019-11-18 19:28:46', 'Tortilla de papa vegana', 'Tortilla-de-papa-vegana-20191118072846', 'Apto para celiacos , intolerantes al huevo y a la lactosa', '<p>INSTRUCCIONES:</p><p>LAVAR Y PELAR LAS PAPAS Y LA CEBOLLA</p><p>COCINAR LAS PAPAS EN UNA SARTEN CON UN POCO DE ACEITE</p><p>HACER UNA MEZCLA HOMOGENEA CON LA HARINA Y EL AGUA</p><p>A&Ntilde;ADIR LAS PAPAS, LA CEBOLLA Y UN POCO DE SAL</p><p>COCINAR LA MEZCLA EN UNA SARTEN</p><p>ESPERO QUE LES GUSTE</p><div style=\"text-align: left;\"><br></div>', 1, 5, 1, 1, '2019-11-18 23:45:41', 1, 2, 60),
(10, 6, '2019-11-18 19:38:39', 'Rutina intermedia', 'Rutina-intermedia-20191118073839', 'La rutina intermedia es para personas que ya tienen una condicion fisica algo mas estable. Es un entrenamiento mucho mas movido y requiere de una correcta ejecucion para evitar lesiones. Por lo que tambien amerita un buen calentamiento previo.\r\n', '<p>Haz cuatro series de los siguientes ejercicios:<br></p><ul><li>2 minutos de skipping<br></li><li>2 minutos de saltos de tijeras.</li><li>2 minutos de saltar la cuerda.</li><li>25 sentadillas saltadas.</li><li>1 minuto y 30 segundos de plancha.</li></ul><p><br></p><p>Recuerda hidratarte bien antes de comenzar la rutina, y tambien es clave controlar la respiracion durante los ejercicios. As&iacute; que no respires por la boca, inhala por la nariz en todo momento y manten la respiracion estable;</p><div style=\"text-align: left;\"><br></div>', 1, 4, 1, 2, '2019-11-19 00:44:19', 6, 4, 60480),
(11, 7, '2019-11-18 19:55:39', 'Menu con bajo contenido en sodio', 'Menu-con-bajo-contenido-en-sodio-20191118075539', 'Lo primero que debemos saber es que entre las principales fuentes de sodio de la dieta se encuentran los procesados y ultraprocesados, por lo que basar nuestra dieta en alimentos frescos y no en productos resulta de mucha ayuda. Tambien reducir la sal como condimento es importante.', '<p>Lunes</p><p>DESAYUNO<span style=\"white-space:pre\">	</span>Quinoa con chocolate amargo y fruta.</p><p>MEDIA MA&Ntilde;ANA&nbsp; &nbsp;Tazon de leche con avena, almendras y granos de granada.</p><p>COMIDA<span style=\"white-space:pre\">	</span>Arroz al horno con costillas, setas y casta&ntilde;as. Banana.</p><p>MERIENDA<span style=\"white-space:pre\">	</span>Vaso de leche con tostadas de pan integral con palta y tomate.</p><p>CENA<span style=\"white-space:pre\">	</span>Cintas de calabacin con berberechos. Manzana.</p><p><br></p><p>Martes</p><p>DESAYUNO<span style=\"white-space:pre\">	</span>Tazon de leche con avena y kiwi en trozos.</p><p>MEDIA MA&Ntilde;ANA<span style=\"white-space:pre\">	</span>jugo&nbsp;de naranja con medio bocadillo de pan integral con pechuga de pollo y tomate</p><p>COMIDA<span style=\"white-space:pre\">	</span>Paella de quinoa. Higos.</p><p>MERIENDA<span style=\"white-space:pre\">	</span>Vaso de leche y tostadas de pan integral con mermelada.</p><p>CENA<span style=\"white-space:pre\">	</span>Guiso de pollo con morrones y champi&ntilde;ones. Mandarina.</p><p><br></p><p>Miercoles</p><p>DESAYUNO<span style=\"white-space:pre\">	</span>Te o cafe con tostadas con aceite de oliva y tomate.</p><p>MEDIA MA&Ntilde;ANA<span style=\"white-space:pre\">	</span>Yogur natural con compota de pera y almendras tostadas.</p><p>COMIDA<span style=\"white-space:pre\">	</span>Tallarines en salsa de champi&ntilde;ones y ajo . Naranja</p><p>MERIENDA<span style=\"white-space:pre\">	</span>Vaso de leche con pan integral con mermelada.</p><p>CENA<span style=\"white-space:pre\">	</span>Guiso aromatico de pescado. Kiwi</p><p><br></p><p>Jueves</p><p>DESAYUNO<span style=\"white-space:pre\">	</span>Quinoa con manzana y canela.</p><p>MEDIA MA&Ntilde;ANA<span style=\"white-space:pre\">	</span>Zumo de naranja y bocadillo de pan integral con pechuga de pavo, tomate y aguacate.</p><p>COMIDA<span style=\"white-space:pre\">	</span>Ternera a la plancha con ensalada crujiente de lentejas rojas. Granada</p><p>MERIENDA<span style=\"white-space:pre\">	</span>Vaso de leche y galletas de pl&aacute;tano y coco con pipas de girasol.</p><p>CENA<span style=\"white-space:pre\">	</span>Crema de calabaza al eneldo y salteado de pechuga de pollo y verduras con hierbas frescas. Manzana.</p><p><br></p><p>Viernes</p><p>DESAYUNO<span style=\"white-space:pre\">	</span>Vaso de leche con tostadas de pan integral con aceite de oliva y tomate.</p><p>MEDIA MA&Ntilde;ANA<span style=\"white-space:pre\">	</span>Tazon de yogur o leche con avena, banana en rebanadas y nueces picadas.</p><p>COMIDA<span style=\"white-space:pre\">	</span>Garbanzos tostados al piment&oacute;n con langostinos y espinacas. Naranja</p><p>MERIENDA<span style=\"white-space:pre\">	</span>Batido de leche, pera y kiwi con pipas de girasol.</p><p>CENA<span style=\"white-space:pre\">	</span>Crema de coliflor al azafran y tortilla de verduras. Gelatina.</p><p><br></p><p>Sabado</p><p>DESAYUNO<span style=\"white-space:pre\">	</span>Jugo de naranja y pan integral con queso fresco y mermelada.</p><p>MEDIA MA&Ntilde;ANA<span style=\"white-space:pre\">	</span>Vaso de leche con tostadas de pan integral con aceite de oliva y tomate.</p><p>COMIDA<span style=\"white-space:pre\">	</span>Solomillo de cerdo especiado con hortalizas y quinoa. Pl&aacute;tano</p><p>MERIENDA<span style=\"white-space:pre\">	</span>Tazon de leche con granada, pipas de girasol y almendras picadas.</p><p>CENA<span style=\"white-space:pre\">	</span>Crema de calabaza y lentejas rojas. Mandarina.</p><p><br></p><p>Domingo</p><p>DESAYUNO<span style=\"white-space:pre\">	</span>Taz&oacute;n de leche con copos de quinoa, kiwi fresco en rebanadas, uvas pasas y pipas de girasol.</p><p>MEDIA MA&Ntilde;ANA<span style=\"white-space:pre\">	</span>Licuado de chocolate, pl&aacute;tano y amaranto.</p><p>COMIDA<span style=\"white-space:pre\">	</span>Lentejas guisadas. Higos</p>', 1, NULL, 1, 1, NULL, 1, 4, 10080),
(12, 7, '2019-11-18 20:05:58', 'Rutina aerobica para expertos ', 'Rutina-aerobica-para-expertos--20191118080558', 'Es para personas experimentadas; que llevan bastante tiempo entrenando y poseen la resistencia que esta rutina exige. Para mayor efectividad haz esta rutina una hora despues de haber ingerido proteina, adem&aacute;s de darte energ&iacute;a te ayudara a crecer musculo y bajar de peso.\r\n', '<p>Debes realizar dos rondas de los siguientes ejercicios:</p><p><br></p><p>5 minutos de trote.</p><p>25 burpees.</p><p>20 sentadillas sumo.</p><p>1 minuto de plancha.</p><p>20 flexiones.</p><p>30 abdominales crunch.</p><p>30 saltos de tijera.</p><p>20 sentadillas pistol.</p>', 1, 7, 1, 2, '2019-11-19 00:33:03', 2, 5, 604800),
(13, 8, '2019-11-18 20:23:41', 'Tips para subir de peso y aumentar la masa muscular', 'Tips-para-subir-de-peso-y-aumentar-la-masa-muscular-20191118082341', 'Les traigo unos consejos para subir de peso y aumentar la masa muscular siendo saludables.', '<p>1. Comer cada 3 horas</p><p>Comer cada 3 horas es muy importante para aumentar el consumo de calor&iacute;as a lo largo del dia y favorecer la ganancia de peso, debido a que se deben ingerir mas calorias que las que el organismo gasta. Asimismo, se debe mantener un buen balance diario tanto de las calor&iacute;as provenientes de los carbohidratos como de las proteinas y las grasas, esto tambi&eacute;n favorecer&aacute; el aumento de la masa muscular.</p><p><br></p><p>Por este motivo, es importante no saltarse las comidas para no perjudicar el aporte de nutrientes al organismo, y mantener los niveles adecuados de glucosa y aminoacidos en la sangre para favorecer la recuperacion y el crecimiento del musculo.&nbsp;</p><p><br></p><p>2. Incluir prote&iacute;nas en todas las comidas</p><p>Incluir prote&iacute;nas en todas las comidas del dia hace que los niveles de aminoacidos en la sangre se mantengan constantes a lo largo del dia, favoreciendo una buena recuperaci&oacute;n muscular post-entrenamiento.&nbsp;</p><p><br></p><p>Las proteinas estan presentes en alimentos como carnes, pollo, pescados, huevos, quesos y yogur, siendo muy importante hacer las meriendas con combinaciones eficientes como por ejemplo un s&aacute;ndwich de pollo y queso con pan integral o tostadas con queso y yogur. Vea algunos consejos para ganar masa muscular.</p><p><br></p><p>3. Comer por lo menos 3 frutas por dia</p><p>Consumir por lo menos 3 frutas por d&iacute;a y consumir ensalada en el almuerzo y en la cena ayuda a aumentar la cantidad de vitaminas y minerales de la dieta, los cuales son esenciales para el buen funcionamiento del metabolismo y para favorecer la ganancia de peso y de masa muscular.&nbsp;</p><p><br></p><p>Las frutas pueden consumirse frescas, en forma de jugos o batidos o las frutas secas, pudiendo incluirse en las meriendas o como postre del almuerzo o de la cena.</p><p><br></p><p>4. Consumir grasas buenas</p><p>Dieta para subir de peso con salud y ganar masa muscular</p><p>Los alimentos que son fuentes de grasas buenas como la palta, almendras, nueces, aguacate, coco, aceite de oliva, aceite de linaza y semillas en general, son excelentes opciones para aumentar las calorias de la dieta con poco volumen de alimentos. Ademas de esto, estas grasas tambien ayudan a ganar masa muscular y no estimulan la acumulacion de grasa en el cuerpo.</p><p><br></p><p>Algunos ejemplos de como utilizar estos alimentos son: agregarle mantequilla de cacahuate al pan, a las galletas o al batido de fruta; consumir un pu&ntilde;ado de frutos secos en las meriendas; agregarle 1 cucharada de coco rallado al yogur y; preparar batidos de aguacate en la merienda.&nbsp;</p><p><br></p><p>5. Beber por lo menos 2,5 L de agua por d&iacute;a</p><p>Beber bastante agua y mantenerse bien hidratado es esencial para ganar masa muscular, ya que la hipertrofia, que es el aumento del tama&ntilde;o de las celulas musculares, solo ocurre si las celulas se encuentran bien hidratadas.&nbsp;</p><p><br></p><p>Por este motivo es importante mantenerse atento y contabilizar el consumo de agua, recordando que los refrescos y jugos pasteurizados no cuentan como liquidos para el organismo. Ademas de esto, es importante que el consumo de agua se realice entre las comidas, porque si bebe en conjunto con las comidas podr&&acute; interferir con la ingesta de alimentos.&nbsp;</p><p><br></p><p>6. Realizar actividad fisica</p><p>Para garantizar que las calorias extras se transformen en musculo y no en grasa es importante realizar actividad fisica 3 a 5 veces por semana, principalmente ejercicios de musculatura y no aerobicos. Lo ideal es consultar un entrenador fisico o profesor de educaci&oacute;n fisica para que realice una rutina de ejercicios adecuada a tus necesidades individuales.&nbsp;&nbsp;</p>', 1, 5, 1, 2, '2019-11-19 00:32:54', 4, 5, 1209600),
(14, 9, '2019-11-18 21:13:34', 'Carne de seitan', 'Carne-de-seitan-20191118091334', 'Lo mejor para reemplazar la carne que acostumbras a comer', '<p>Ingredientes:</p><p>1 kg. de harina de trigo (no es necesario que sea integral ya que no aprovecharemos el salvado o la fibra).</p><p>agua en cantidad necesaria.</p><p>Un vaso (250 cl.) de salsa de soja.</p><p>1 cabeza de ajos.</p><p>1 cucharada sopera de jengibre rallado.</p><p>&nbsp;Un trozo de alga kombu seca, no es imprescindible, tambien podemos usar alguna otra alga que tengamos a mano (la encontramos en cualquier supermercado oriental,el alga Kombu ayudara en la digestion y tambien aumentara el contenido en minerales, pero si no tienes tampoco pasa nada).</p><p><br></p><p>Elaboracion:</p><p>Amasa la harina como si fueses a hacer pan, o sea s&oacute;lo con agua. La cantidad de agua sera aquella que permita hacer una masa compacta y sin que se pegue a los dedos.</p><p><br></p><p>Cuando este bien amasada, dejala dentro de un recipiente cubierta de agua durante un par de horas aproximadamente.</p><p><br></p><p>Una vez pasado el tiempo hay que lavar la masa dentro del agua, que de inmediato empezara a volverse blanca. Esto es se&ntilde;al de que el almid&oacute;n se va desprendiendo de la masa.</p><p><br></p><p>Cambiamos el agua y comenzamos a prensar con las manos para ir sacando el almid&oacute;n de dentro de la bola, tambien nos ayudaremos poniendo la bola directamente debajo del chorro de agua, importante usar algun tipo de recipiente para recolectar el agua que luego la podemos reutilizar para regar las plantas por ejemplo.</p><p><br></p><p><br></p><p>Cuando la mas va tornandose mas oscura: &iexcl;eso es el gluten! . Cuidado, porque tiende a desprenderse con facilidad.</p><p><br></p><p>Nos podemos ayudar con un colador de alambre, luego dara un poco de trabajo el limpiarlo pero hace bien el trabajo, tengo pendiente probar con alguna gasa o tela para comprimir la bola, es un idea&nbsp; que creo puede funcionar.</p><p><br></p><p>Continua el proceso de lavado hasta que el agua salga transparente, que es la se&ntilde;al de que ahora solo queda el Seitan (gluten o proteina del trigo). Esa bola resultante es mas peque&ntilde;a que la bola inicial, ligeramente mas oscura y pososa. Si quieres, la puedes dividir en dos o tres trozos, o dejar la pieza entera.</p><p><br></p><p>Ahora cocinemos el seitan en una olla grande, a fuego fuerte, poner agua para poder cubrir las piezas, agregar el vaso de salsa de soja, los ajos, el jengibre y el alga Kombu.</p><p><br></p><p>Cuando rompa a hervir, echamos las bolas de Seitan y dejamos que hierva a fuego lento durante 20 a 45 minutos, cuanto mas tiempo mas duro queda, asi que ya cuestion de gustos, lo mejor es ir probando y ver como nos gusta mas.</p><p><br></p><p>El tama&ntilde;o vuelve a aumentar con el hervor, y ahora se tornara mas oscuro y brillante, ademas de compacto. Una vez cocinado, apagamos el fuego y lo dejamos tapado hasta que se enfrie.</p><div style=\"text-align: left;\"><br></div>', 1, 5, 1, 1, '2019-11-19 00:50:39', 45, 1, 45),
(15, 9, '2019-11-18 21:20:46', 'Puchero Vegano', 'Puchero-Vegano-20191118092046', '&iexcl;&iexcl;Genial para el frio!!', '<p style=\"box-sizing: inherit; border: 0px; font-size: 15px; margin-bottom: 1.6em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(58, 58, 58); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: 700; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Ingredientes:</span></p><ul style=\"box-sizing: inherit; border: 0px; font-size: 15px; margin-bottom: 1.5em; margin-left: 3em; outline: 0px; vertical-align: baseline; list-style: disc; color: rgb(58, 58, 58); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; text-align: start; background-color: rgb(255, 255, 255);\"><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1/2 kilo seitan</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1 taza porotos pallares cocidos y/o garbazos</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">3 cdas aceite de oliva</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">2 puerros</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1/2 repollo blanco</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">3 ramas de apios</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1 papa grande</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1 batata grande</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">2 cebollas</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1 cabeza de ajo</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1/2 calabaza</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">2 zanahorias</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">2 ramitas de romero y tomillo preferentemente fresco</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1 ramito de perejil</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Pimienta negra molida a gusto</li><li style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Sal de mar a gusto</li></ul><div style=\"box-sizing: inherit; border: 0px; font-size: 15px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(58, 58, 58); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; text-align: start;\"><p style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin-bottom: 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\"><span style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: 700; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Instrucciones:</span></p><p style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin-bottom: 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\"><span style=\"box-sizing: inherit; border: 0px; font-style: inherit; font-weight: 700; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">En una cacerola grande rehogar con el aceite:&nbsp;</span>Las cebollas cortadas en cuartos, los puerros en juliana, las zanahorias cortadas en tercios y el ajo cortado a la mitad.Salpimentar y mezclar.Agregar la papa y batata peladas y cortadas en mitades, la calabaza cortada en trozos grandes. Los apios enteros y el resto de los ingredientes (por ultimo el seitan cortado en trozos).Agregar agua hasta cubrirlos en fuego moderado sin revolver mucho, hasta que todo en su punto ( no dejar que se rompan ni dezmenuzcan las papas ni la calabaza)Servir y espolvorear con perejil fresco bien picado.</p></div>', 1, 6, 1, 1, '2019-11-19 00:50:26', 1, 2, 60),
(16, 10, '2019-11-18 21:34:54', 'Rutina de pecho', 'Rutina-de-pecho-20191118093454', 'Esta es una rutina muy utilizada por culturistas, fue parte del entrenamiento del actor Arnold Schwarzenegger (ex culturista)', '<p><b><u>consiste en los siguientes ejercicios:</u></b></p><p><br></p><p>- Press de banca: cinco series, de 6 hasta 10 repeticiones.</p><p><br></p><p>- Aperturas: cinco series, de 6 hasta 10 repeticiones.</p><p><br></p><p>- Press inclinado: seis series, de 6 hasta 10 repeticiones.<br></p><p><br></p><p>- Cruce de poleas: seis series, de 10 a 12 repeticiones.<br></p><p><br></p><p>- Fondos en paralelas: cinco series al fallo.<br></p><p><br></p><p>- Pullover: cinco series, de 10 a 12 repeticiones.</p><p><br></p><p><u><b>TIPS:</b></u></p><p>es necesario hidratarse bien y llevar una alimentacion alta en proteinas y calorias para un correcto aumento de la masa corporal</p><p>evitar comida basura o llena de azucar , evitar aceites poco saludables y consumir en exceso grasa</p><p>cuidado con el peso!</p><p>consulta esta rutina con tu profesor de gimnasio&nbsp;</p>', 1, 5, 1, 2, '2019-11-19 00:02:28', 3, 5, 907200),
(17, 10, '2019-11-18 21:53:46', 'Rutina para empezar', 'Rutina-para-empezar-20191118095346', 'es una rutina sencilla para empezar en el gimnasio, se  debe realizar durante poco tiempo', '<p>&nbsp;bicicleta 20 min</p><p><b>repetir 4 veces:</b></p><p>&nbsp; &nbsp; Plancha 30 segs</p><p>&nbsp; &nbsp; Abdominales 20&nbsp;</p><p>&nbsp; &nbsp; Espinales 15</p><p>&nbsp; &nbsp; Silla de cuadriceps 15 repeticiones</p><p>&nbsp; &nbsp; Isquiotibiales&nbsp; 12 repeticiones</p><p>&nbsp;&nbsp;&nbsp;&nbsp;Press con mancuerna 12 repeticiones</p><p>&nbsp; &nbsp; Dorsales adelante 12 repeticiones</p><p>&nbsp; &nbsp; Remo bajo</p><p>&nbsp; &nbsp; Biceps y triceps con polea 12 repeticiones</p><p>&nbsp; &nbsp; Vuelos laterales<br></p>', 1, 5, 1, 2, '2019-11-19 00:03:42', 1, 5, 302400),
(18, 11, '2019-11-18 22:08:47', 'Bocaditos de Muzzarela libre de TACC', 'Bocaditos-de-Muzzarela-libre-de-TACC-20191118100847', 'Son riquisimos , se recomienda usar pan rallado libre de gluten para que sea apto Celiacos ', '<p><b><u>Ingredientes</u></b><br></p><p>250 gramos Muzzarella</p><p>1 Huevo</p><p>100 gramos Rebozador</p><p> 2 cucharada Oregano</p><p>1 pizca Sal</p><p>cantidad necesaria Aceite para freir</p><p><br></p><p><br></p><p><b><u>Procedimiento</u></b></p><p>Cortar la muzzarella de 1. 5 cm de espesor.</p><p>Batir el huevo con la sal y el or&eacute;gano.</p><p>Pasar la muzzarella por la premezcla. Luego por el huevo. Luego por el pan rallado. Volver a pasar la muzzarella por el huevo y luego por el pan rallado.</p><p>Reservar las muzzarellas tapadas en la heladera por 20 minutos.</p><p>En una cacerola o sart&eacute;n colocar abundante aceite. Cuando el aceite alcance los 175 grados de temperatura sumergir las muzzarellas y cocinar por un minuto hasta que est&eacute;n doradas.</p><p>Retirar y dejar poner sobre papel absorbente</p><p>Servir de inmediato con una ensalada verde o salsita de tomate casera.</p><p><br></p><p>PUEDEN USAR PAN RALLADO:</p><p>SANTAMARIA</p><p>CARREFOUR</p><p>GALLO</p>', 1, 5, 1, 1, '2019-11-19 00:54:24', 25, 1, 25),
(19, 12, '2019-11-18 22:17:26', 'Pizza', 'Pizza-20191118101726', 'Pizza libre de tacc', '<p><b><u>Ingredientes</u></b></p><p><b><u><br></u></b></p><p>280 gramos de harina sin TACC :</p><p>&nbsp; &nbsp; <b style=\"\">1- Harina sin gluten de ma&iacute;z.<br></b></p><p><b>&nbsp;&nbsp;&nbsp;&nbsp;2- Harina sin gluten de mijo.</b></p><p><b>&nbsp;&nbsp;&nbsp;&nbsp;3- Harina sin gluten de garbanzo.</b></p><p><b>&nbsp;&nbsp;&nbsp;&nbsp;4- Harina sin gluten de trigo sarraceno o alforf&oacute;n.</b></p><p><b>&nbsp;&nbsp;&nbsp;&nbsp;5- Harina sin gluten de arroz.</b></p><p><b style=\"\">&nbsp;&nbsp;&nbsp;&nbsp;6- Harina sin gluten de teff.</b></p><ul class=\"i8Z77e\" style=\"margin-bottom: 0px; border: 0px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; text-align: left; background-color: rgb(255, 255, 255);\"><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style-type: disc;\"><span style=\"color: black; font-size: 14px;\">35 gramos Levadura fresca</span><br></li></ul><p>20 gramos Azucar</p><p>6 gramos Sal</p><p>1 cucharada Aceite de oliva o neutro</p><p>240 cm Agua tibia</p><p>200 cm Salsa para Pizza</p><p>250 gramos Muzzarella</p><p>&nbsp;Oregano a gusto</p><p>&nbsp;Aceitunas verdes Opcionales</p><p><br></p><p><b><u>Procedimiento</u></b></p><p>Encender el horno a 200 grados de temperatura</p><p>Mezclar en la amasadora o procesadora la harina libre de gluten, el az&uacute;car, la sal y la levadura fresca.</p><p>Agregar el aceite y el agua tibia</p><p>Batir por 3 minutos hasta que se forme una masa lisa y cremosa.</p><p>Aceitar una pizzera de 30 cm. de di&eacute;metro.</p><p>Volcar la masa en el centro. Utilizar una cuchara mojada en agua para extender la masa sobre la pizzera. Dejar levar hasta que duplique su volumen.</p><p>Cocinar en la parte inferior de horno por 15 minutos para que dore la base.</p><p>Retirar del horno, cubrir con salsa y muzzarella. Llevar nuevamente al horno en la rejilla del medio y cocinar por 10 minutos m&aacute;s.</p><p>Retirar de horno, agregar las aceitunas y el or&eacute;gano. Esperar 2 minutos para cortarla.</p>', 1, 3, 1, 1, '2019-11-19 00:53:44', 1, 2, 60),
(20, 12, '2019-11-18 22:26:49', 'Para hacer en casa', 'Para-hacer-en-casa-20191118102649', 'rutina facil que cualquiera puede realizar en su casa ', '<p><b>Es importante elongar entre cada ejericio y al finalizar la rutina</b></p><p>Saltos en V 30 segs</p><p>Jumping jacks 30 segs</p><p>Plancha 1 min</p><p>Abdominales:</p><p>&nbsp; &nbsp; crunch 30 repeticiones</p><p>&nbsp; &nbsp; con elevacion de piernas 15 repeticiones</p><p>&nbsp; &nbsp; mantener la elevacion de piernas 30 segs</p><p>&nbsp; &nbsp; bicicleta 20 repeticiones</p><p>Flexiones de brazos 20 repeticiones</p><p>Espinales cruzados 15 repeticiones</p><p><br></p><p>REPETIR 4 VECES</p><p><br></p>', 1, 6, 1, 2, '2019-11-19 00:18:18', 2, 5, 604800),
(21, 13, '2019-11-18 22:36:16', 'Rutina para tonificar', 'Rutina-para-tonificar-20191118103616', 'Espero que les resulte tan buena como a mi', '<p><b><u>Dividir los siguientes ejercicios en 3 dias:</u></b></p><p><br></p><p>3x30 Zancadas (15 con cada pierna)</p><p>2x16 Zancadas laterales (8 con cada pierna)</p><p>3x12 Sentadilla con salto</p><p>3x25 Puente</p><p>3x15 Crunch</p><p>3x15 Hiperextensiones</p><p><br></p><p><br></p><p>4xfallo Flexiones</p><p>2x8 Flexiones de hombro</p><p>2x8 Flexiones diamante</p><p>2x8 Flexiones asimetricas</p><p>3x1:00 Plancha</p><p><br></p><p><br></p><p>3x30 Sentadillas</p><p>2x20 Zancadas (10 con cada pierna)</p><p>3xfallo Flexiones</p><p>3x m&aacute;ximo tiempo aguantando haciendo la vertical</p><p>3x20 Abdominales de crossfit</p><p>2x15 Hiperextensiones</p>', 1, 6, 1, 2, '2019-11-19 00:34:38', 3, 5, 907200),
(22, 13, '2019-11-18 22:45:00', 'Ejercicios aerobicos', 'Ejercicios-aerobicos-20191118104500', 'Rutina simple y rapida para hacer en casa', '<p>Se deben realizar 3 veces y 20 repeticiones de cada uno</p><p><br></p><p>-Burpees</p><p>-Jumping jacks</p><p>-Plancha con rodillas al pecho (30 segundos)</p><p>-Saltos de patinador</p><p>-Elevaciones de rodillas</p><p><br></p>', 1, 3, 1, 2, '2019-11-19 00:34:30', 30, 1, 30),
(23, 13, '2019-11-18 22:47:10', 'Masa para Empanadas', 'Masa-para-Empanadas-20191118104710', 'Masa para Empanadas facil de hacer, utilizar harinas sin TACC', '<p>Ingredientes</p><p>280 gramos harina sin tacc</p><p>1 Huevo</p><p>25 cm aproximadamente Agua tibia</p><p><br></p><p>Procedimiento</p><p>Encender el horno a 220 grados de temperatura</p><p>En la amasadora o procesadora de alimentos mezclar la harina con el huevo. Unir los ingredientes, agregar agua de a cucharadas hasta que se forme una masa suave y el&aacute;stica.</p><p>Espolvorear la mesada con harina y volcar la masa. Tomar peque&ntilde;as porciones de masa y estirar en forma circular con palo de amasar. Emparejar los c&iacute;rculos con cortante redondo del tama&ntilde;o deseado.</p><p>Humedecer los bordes con agua y rellenar. Cerrar sin dejar aire en el interior de la empanada, hacer el repulgue, pintar con huevo.</p><p>Cocinar en horno bien caliente hasta que est&eecute;n doradas.</p>', 1, 5, 1, 1, '2019-11-19 00:30:36', 20, 1, 20),
(24, 14, '2019-11-18 22:57:14', 'Bruschettas de tomate con albahaca', 'Bruschettas-de-tomate-con-albahaca-20191118105714', 'Bajas en sodio y buenisimas', '<p>Numero de porciones<br></p><p>6 porciones</p><p><br></p><p><b>Ingredientes</b></p><p>1/2 baguette de pan integral, cortada en 6 rebanadas diagonales de 1/2 pulgada (1 cm) de espesor</p><p>2 cucharadas de albahaca picada</p><p>1 cucharada de perejil picado</p><p>2 dientes de ajo picados</p><p>3 tomates, cortados en cubos</p><p>1/2 taza de hinojo en cubos</p><p>1 cucharadita de aceite de oliva</p><p>2 cucharaditas de vinagre bals&aacute;mico</p><p>1 cucharadita de pimienta negra</p><p><br></p><p><b>Instrucciones</b></p><p>Calienta el horno . Tuesta las rebanadas de baguette hasta que esten ligeramente doradas. Mezcla el resto de los ingredientes. Con una cuchara coloca la mezcla de manera uniforme sobre el pan tostado. Sirve de inmediato.</p>', 1, 1, 1, 1, '2019-11-18 23:11:46', 25, 1, 25),
(25, 14, '2019-11-18 23:04:51', 'Ensalada de tomate, cebolla y apio', 'Ensalada-de-tomate-cebolla-y-apio-20191118110451', 'Ensalada rica en fibra, para mantener la salud', '<p>Ingredientes&nbsp;</p><p>cebolla&nbsp; 1</p><p>tomates 2</p><p>una rama de apio</p><p>jugo de limon</p><p>oregano</p><p>aceite de oliva virgen</p><p><br></p><p>agregar los ingredientes en una ensaladera, agregarles el jugo del limon y el aceite , y mezclarlos</p><p><br></p><p>se puede agregar alcaucil como un extra</p><p><br></p><p>A disfurtar!</p>', 1, 2, 1, 1, '2019-11-18 23:54:41', 15, 1, 15),
(26, 15, '2019-11-18 23:11:26', 'Churros', 'Churros-20191118111126', '&iquestCansado de perderte esta increible comida solamente por ser celiaco? ', '<p>Ingredientes</p><p>100 cm Agua</p><p>100 cm Leche</p><p>media cucharadita Esencia de vainilla</p><p>media cucharadita Polvo leudante</p><p>100 gramos harina de maiz</p><p>1 pizca Sal</p><p>Aceite para freir</p><p><br></p><p>Procedimiento</p><p>Hervir la leche con el agua</p><p>Mezclar la harina con la sal y el polvo de hornear. Volcar la leche caliente sobre la premezcla. Batir por 3 minutos a velocidad media hasta formar una masa suave, apenas pegajosa.</p><p>Poner la masa tibia en la churrera. Presionar para que salgan la masa con forma de churros. Cortar del tama&ntilde;o deseado.</p><p>En una cacerola calentar abundante aceite a 175 grados. Fre&iacute;r los churros hasta que est&eacute;n dorados. Escurrir en papel absorbente y pasar por az&uacute;car mientras est&aacute;n tibios.</p><div style=\"text-align: left;\"><br></div>', 1, 5, 1, 1, '2019-11-19 00:39:18', 15, 1, 15),
(27, 15, '2019-11-18 23:15:11', 'Torta frita', 'Torta-frita-20191118111511', 'Para comer a la tarde con un mate', '<p>Tiempo coccion</p><p>10 minutos<br></p><p><br></p><p>Porciones<br></p><p>18 unidades<br></p><p><br></p><p>Ingredientes</p><p>250 gramos harina de maiz</p><p>media cucharadita Polvo de hornear</p><p>15 gramos Grasa</p><p>media cucharadita Sal</p><p>180 cm Agua caliente</p><p><br></p><p>Procedimiento</p><p>Mezclar la harina de maiz con el polvo de hornear\r\n\r\n</p><p>Hervir el agua, agregar la sal y la grasa. Agregar a los secos<br></p><p>Mezclar en amasadora o procesadora hasta que quede una masa suave y pegajosa pero no l&iacute;quida.</p><p>Espolvorear la mesada con harina de maiz. Volcar la masa y estirarla de 0.5 cm. de espesor con palo de amasar. Cortar cuadrados de 5x5 cm.</p><p>En una cacerola calentar aceite a 175 grados de temperatura. Freir los cuadrados 1 minuto de cada lado (hasta que est&eacute;n dorados). Escurrir sobre papel absorbente. Comer tibias.</p>', 1, 5, 1, 1, '2019-11-19 00:38:29', 20, 1, 20),
(28, 15, '2019-11-18 23:21:08', 'Cascaras de papa crujientes', 'Cascaras-de-papa-crujientes-20191118112108', 'Receta muy rica e increiblemente facil para servir antes del plato principal o como acompa&ntilde;amiento', '<p>2 porciones&nbsp;</p><p><br></p><p>Ingredientes</p><p>2 papas Russet medianas</p><p>Aceite de oliva&nbsp; c/n</p><p>1 cucharada de romero fresco picado</p><p>1/8 de cucharadita de pimienta negra reci&eacute;n molida</p><p><br></p><p>Instrucciones</p><p><br></p><p>Precalienta el horno.</p><p>Lava las papas y p&iacute;nchalas con un tenedor. Col&oacute;calas en el horno y horn&eacute;alas alrededor de 1 hora hasta que las c&aacute;scaras est&eacute;n crocantes.</p><p>Con cuidado ya que las papas estar&aacute;n muy calientes, c&oacute;rtalas a la mitad y quitales la pulpa; deja aproximadamente 1/8 de pulgada (0,3 cm) de la pulpa de la papa pegada a la c&aacute;scara. Guarda la pulpa para otro uso.</p><p>Esparce el interior de cada c&aacute;scara de papa con aceite de oliva. Presiona en el interior el romero y la pimienta. Vuelve a colocar las cascaras en el horno durante 5 a 10 minutos. Sirve de inmediato.</p>', 1, 5, 1, 1, '2019-11-19 00:08:57', 30, 1, 30);
INSERT INTO `publicacion` (`id`, `id_usuario`, `fecha`, `titulo`, `alias`, `descripcion`, `texto`, `estado`, `valoracion`, `activo`, `categoria`, `fecha_modificado`, `tiempo`, `unidad_tiempo`, `tiempo_minutos`) VALUES
(29, 15, '2019-11-18 23:30:26', 'Guacamole ', 'Guacamole--20191118113026', 'Perfecto para una picada o para acompa&ntilde;ar tus comidas', '<p>Ingredientes:</p><p>&nbsp; &nbsp; 4 paltas</p><p>&nbsp; &nbsp; 1 tomate</p><p>&nbsp; &nbsp; 1/2 cebolla</p><p>&nbsp; &nbsp; cilantro o perejil a gusto<br></p><p>&nbsp; &nbsp; jugo de 1 limon</p><p>&nbsp; &nbsp; pimienta al gusto</p><p>&nbsp; &nbsp; sal al gusto</p><p>&nbsp; &nbsp; picante a eleccion</p><p>&nbsp; &nbsp; aceite a gusto<br></p><p><br></p><p>Preparacion</p><p>&nbsp; &nbsp; cortar las paltas por la mitad y retirar el carozo, aplastar las paltas en un bol&nbsp;</p><p>&nbsp; &nbsp; cortar el tomate y la cebolla mezclar con el cilantro , y luego con la palta</p><p>&nbsp; &nbsp; condimentar con sal , pimienta y picante (no es obligatorio), agregarle aceite , mezclar y listo</p><p>&nbsp; &nbsp; servir!<br></p>', 1, 9, 1, 1, '2019-11-19 00:37:58', 0, 1, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_comentario`
--

DROP TABLE IF EXISTS `publicacion_comentario`;
CREATE TABLE IF NOT EXISTS `publicacion_comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `texto` text,
  `fecha` datetime DEFAULT NULL,
  `reply` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion_comentario`
--

INSERT INTO `publicacion_comentario` (`id`, `id_publicacion`, `id_usuario`, `texto`, `fecha`, `reply`) VALUES
(1, 2, 3, '&iexcl;&iexcl;&iexcl;Bastante buena!!! aunque los objetivos por semana parecen dificiles de alcanzar&nbsp;', '2019-11-18 18:38:52', NULL),
(2, 4, 4, 'Seria mejor una version vegetariana', '2019-11-18 18:56:14', NULL),
(3, 3, 4, 'Es genial esta receta!', '2019-11-18 19:02:17', NULL),
(4, 4, 2, '<p>hacela sin queso o bechamel y queda igual de excelente&nbsp;</p>', '2019-11-18 19:03:31', 2),
(5, 1, 5, 'S&uacute;per completa', '2019-11-18 19:11:41', NULL),
(6, 8, 6, 'Que se necesita para realizarla?', '2019-11-18 19:25:27', NULL),
(7, 5, 6, 'Super facil y rico gente, prueben de hacerlo, queda genial como postre y lo haces en nada', '2019-11-18 19:41:11', NULL),
(8, 2, 6, 'Dificiles los objetivos, pero buenos para fijar una meta complicada&nbsp; Me encanto', '2019-11-18 19:45:14', NULL),
(9, 2, 7, '<p>Si uno se lo propone se llega facil, sino volve intentar</p>', '2019-11-18 19:57:09', 1),
(10, 8, 7, 'Complet&iacute;sima', '2019-11-18 20:07:59', NULL),
(11, 1, 8, '<p>Esta buena para empezar, combina un poco de elongacion tambien lo cual es clave para no lastimarse&nbsp;</p>', '2019-11-18 20:15:17', 5),
(12, 8, 10, 'Con unas marcuenas y algo que puedas usar como banco podes realizarla&nbsp;', '2019-11-18 21:25:10', 6),
(13, 7, 11, 'Muchas gracias por compartir esta receta', '2019-11-18 22:09:23', NULL),
(14, 20, 1, 'Muy buena!', '2019-11-18 23:32:02', NULL),
(15, 8, 1, '<p>un crack compartiendo esto, sirve y no se necesita un gimnasio</p>', '2019-11-18 23:33:39', 10),
(16, 13, 1, 'Buenos tips', '2019-11-18 23:34:04', NULL),
(17, 2, 1, '<p>Gracias, tranqui que se puede hacer</p>', '2019-11-18 23:35:16', 8),
(18, 28, 2, 'Wow!! quedan super ricas&nbsp;', '2019-11-18 23:36:55', NULL),
(19, 29, 2, 'Un clasico que no puede faltar', '2019-11-18 23:37:07', NULL),
(20, 5, 2, 'Con nueces queda buenisimo&nbsp;', '2019-11-18 23:38:21', NULL),
(21, 3, 2, '<p>Gracias!</p><p><br></p>', '2019-11-18 23:38:52', 3),
(22, 29, 3, 'Que facil de hacer, muchas gracias', '2019-11-18 23:39:57', NULL),
(23, 28, 3, 'Prueben rellenandolas con queso vegano y seitan', '2019-11-18 23:40:40', NULL),
(24, 15, 3, 'No parece muy rico', '2019-11-18 23:41:18', NULL),
(25, 5, 3, '<p>la verdad que si , se puede usar cuando quieras , va genial con el caf&eacute;&nbsp;</p>', '2019-11-18 23:42:03', 7),
(26, 20, 3, 'Se hace tranqui, re f&aacute;cil', '2019-11-18 23:42:38', NULL),
(27, 2, 3, '<p>Confia un poco y lo haces</p>', '2019-11-18 23:43:14', 8),
(28, 29, 4, '<p>es lo mejor para picar con algo</p>', '2019-11-18 23:44:31', 19),
(29, 28, 4, 'Me encanto!', '2019-11-18 23:44:52', NULL),
(30, 15, 4, '<p>Lo mismo opino, pero hay que probarla y despues juzgar</p>', '2019-11-18 23:45:32', 24),
(31, 25, 5, 'Re simple, gracias por compartila', '2019-11-18 23:47:05', NULL),
(32, 26, 5, 'No sabia de esta receta, voy a poder comerlos despues de a&ntilde;os, gracias', '2019-11-18 23:49:23', NULL),
(33, 29, 5, 'Lo mejor que existe para acompa&ntilde;ar todo', '2019-11-18 23:49:57', NULL),
(34, 20, 5, 'le agregaria un par mas de ejericicios', '2019-11-18 23:50:32', NULL),
(35, 13, 5, 'Gracias por compartir', '2019-11-18 23:50:59', NULL),
(36, 28, 6, 'Que buena receta!', '2019-11-18 23:53:45', NULL),
(37, 29, 6, '<p>con nachos va de 10</p>', '2019-11-18 23:54:35', 33),
(38, 25, 6, 'Muy buen acompa&ntilde;amiento', '2019-11-18 23:54:57', NULL),
(39, 15, 6, 'Buenisimo!', '2019-11-18 23:55:17', NULL),
(40, 14, 6, 'No sabia que se podia hacer esto con el seitan, soy vegano hace poco tiempo, me viene muy bien la info', '2019-11-18 23:55:55', NULL),
(41, 22, 6, 'Muy cortita pero efectiva', '2019-11-18 23:56:39', NULL),
(42, 22, 7, 'demasiado escasa la rutina&nbsp;', '2019-11-18 23:58:49', NULL),
(43, 21, 7, 'se ve bastante complicada para los que recien empezamos&nbsp;', '2019-11-18 23:59:19', NULL),
(44, 10, 7, 'esta buena, agregale mas ejercicios para hacela mas completa', '2019-11-18 23:59:53', NULL),
(45, 13, 7, 'Me vino super bien, genial aporte', '2019-11-19 00:00:34', NULL),
(46, 1, 7, '<span style=\"text-align: left;\">Es una rutina muy util para el principio, pero no para realizar mucho tiempo</span> ', '2019-11-19 00:01:39', NULL),
(47, 16, 8, 'Es super completa para el pecho , si se hace de a poco y bien, los resultados llegan solos', '2019-11-19 00:03:37', NULL),
(48, 20, 8, 'serian ejercicios mas dificiles, para hacer en una casa sobra&nbsp;', '2019-11-19 00:04:29', 34),
(49, 12, 8, 'Prueben agregando mas minutos de trote, mejoran mucho los resultados', '2019-11-19 00:05:10', NULL),
(50, 8, 8, 'Da muy buenos resultados', '2019-11-19 00:06:01', NULL),
(51, 1, 8, 'Hacen falta mas ejercicios', '2019-11-19 00:06:52', NULL),
(52, 29, 9, 'Prueben de ponerle habanero, no pica tanto en el guacamole y le da rico gusto', '2019-11-19 00:08:54', NULL),
(53, 15, 9, '<p>haganlo y me dicen, es lo mismo que cualquier puchero y encima el seitan agarra todo el sabor de las verduras</p>', '2019-11-19 00:10:09', 24),
(54, 5, 9, '<p>Queda re bien con cualquier fruto seco</p>', '2019-11-19 00:10:41', 20),
(55, 4, 9, 'Muy rico', '2019-11-19 00:13:32', NULL),
(56, 3, 9, '<p>Comparti mas postres asi porfa</p>', '2019-11-19 00:13:53', 3),
(57, 23, 9, 'Re facil de hacer&nbsp;', '2019-11-19 00:14:49', NULL),
(58, 7, 9, 'Es genial y super rico', '2019-11-19 00:15:41', NULL),
(59, 16, 10, '<p>La verdad que si , la comparti mas que nada por los resultados que me dio, espero que les sirva</p>', '2019-11-19 00:17:20', 47),
(60, 13, 10, 'Importante respetar las comidas durante el dia!', '2019-11-19 00:18:11', NULL),
(61, 12, 10, 'muy completa , me encanta', '2019-11-19 00:18:57', NULL),
(62, 8, 10, 'Para no aburrirse, llena de ejercicios', '2019-11-19 00:21:05', NULL),
(63, 29, 11, '<p>esta muy bueno con eso, aunque no es apto para todos</p>', '2019-11-19 00:25:01', 52),
(64, 27, 11, 'Las hice el otro dia y estan genialesm, van muy bien con un mate', '2019-11-19 00:25:33', NULL),
(65, 26, 11, '<p>Con todo lo que hay sin TACC de a poco se puede volver a comer estas comidas tan ricas&nbsp;</p>', '2019-11-19 00:27:05', 32),
(66, 23, 11, 'Gracias por compartir, pense que iba a ser mucho mas complicado', '2019-11-19 00:27:35', NULL),
(67, 19, 11, 'Lo mismo de siempre pero solo cambia la harina', '2019-11-19 00:28:14', NULL),
(68, 29, 12, 'Gracias genio', '2019-11-19 00:30:11', NULL),
(69, 27, 12, 'Riquisimas', '2019-11-19 00:30:26', NULL),
(70, 23, 12, 'Que facil! gracias por compartir la receta', '2019-11-19 00:30:59', NULL),
(71, 18, 12, 'Estan buenisimas', '2019-11-19 00:31:40', NULL),
(72, 20, 12, '<p>esta pensado para principiantes</p>', '2019-11-19 00:32:16', 34),
(73, 17, 12, 'Correcta para empezar en el gym', '2019-11-19 00:32:40', NULL),
(74, 12, 12, 'Con mas trote o repeticiones da muy buenos resultados', '2019-11-19 00:33:22', NULL),
(75, 8, 12, 'Me encanto la rutina, super detallada y completa', '2019-11-19 00:34:03', NULL),
(76, 1, 12, 'Muy basica', '2019-11-19 00:34:24', NULL),
(77, 21, 12, '<p>Si te propones hacerla es super facil</p>', '2019-11-19 00:35:14', 43),
(78, 10, 12, '<p>Pienso igual</p>', '2019-11-19 00:36:07', 44),
(79, 29, 13, 'No podia faltar, excelente publicacion', '2019-11-19 00:38:20', NULL),
(80, 27, 13, 'Una receta muy buena y recontra rica', '2019-11-19 00:39:11', NULL),
(81, 19, 13, 'Muy bueno que lo hayas compartido , pero no cambia mucho la receta', '2019-11-19 00:40:04', NULL),
(82, 18, 13, 'Se hacen muy rapido y son una comida muy buena para picar algo antes del plato principal', '2019-11-19 00:40:51', NULL),
(83, 7, 13, 'Me viene re bien , gracias', '2019-11-19 00:41:06', NULL),
(84, 21, 13, '<p>Es facil , te aconsejo que la hagas a tu tiempo, todo se puede hacer</p>', '2019-11-19 00:41:40', 43),
(85, 20, 13, 'Se podria poner mas ejericicos para los brazos y espalda , parece una rutina de abdominales solamente', '2019-11-19 00:42:58', NULL),
(86, 22, 13, '<p>Tengo otra rutina mas completa, buscala y fijate, ojala te sirva</p>', '2019-11-19 00:44:09', 42),
(87, 4, 14, 'Se puede hacer de las dos formas, queda muy buena de cualquier manera', '2019-11-19 00:46:49', 2),
(88, 25, 14, '<p>De nada, ojala la hagan mucho</p>', '2019-11-19 00:47:14', 31),
(89, 25, 14, '<p>Gracias</p>', '2019-11-19 00:47:30', 38),
(90, 29, 15, '<p>De nada crack! que bueno que te guste</p>', '2019-11-19 00:49:29', 68),
(91, 29, 15, '<p>Gracias disfrutalo</p>', '2019-11-19 00:49:41', 79),
(92, 29, 15, '<p>De nada</p>', '2019-11-19 00:49:56', 22),
(93, 28, 15, '<p>Quedan de 10 con eso, muy buen consejo</p>', '2019-11-19 00:50:23', 23),
(94, 14, 15, '<p>Te va a venir bien para no extra&ntilde;ar las hamburguesas ni los sandwiches de carne</p>', '2019-11-19 00:51:35', 40),
(95, 3, 15, 'Lo probe y me quedo riquisimo, gracias por la idea', '2019-11-19 00:52:16', NULL),
(96, 9, 15, 'Que buena idea para reemplazar al huevo, me encanta&nbsp;', '2019-11-19 00:52:57', NULL),
(97, 26, 15, '<p>la verdad que si , menos mal que cada vez mas marcas sacan estos productos</p>', '2019-11-19 00:53:30', 32),
(98, 19, 15, 'No cambia para nada el sabor, muy rica queda la masa con esa harina, buena idea , gracias', '2019-11-19 00:54:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_imagen`
--

DROP TABLE IF EXISTS `publicacion_imagen`;
CREATE TABLE IF NOT EXISTS `publicacion_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion_imagen`
--

INSERT INTO `publicacion_imagen` (`id`, `id_publicacion`, `imagen`, `archivo`, `activo`) VALUES
(1, 1, 'espinales.jpg', '1574112510.jpg', 1),
(2, 1, 'AAFbtGI.jpg', '1574112514.jpg', 1),
(3, 1, 'flexiones-de-brazos-1211.png', '1574112524.png', 1),
(4, 1, 'correr-felicidad-beneficios.jpg', '1574112535.jpg', 1),
(5, 2, 'calentar-de-forma-correcta-correr.jpg', '1574112763.jpg', 1),
(6, 3, 'flan-vegano-sin-azucar.jpg', '1574112975.jpg', 1),
(7, 4, 'lasanadeverduras1.jpg', '1574114080.jpg', 1),
(8, 4, 'lasanadeverduaras2.jpg', '1574114084.jpg', 1),
(9, 5, 'budin-vegano-de-banana-y-nueces-??-foto-principal.jpg', '1574114439.jpg', 1),
(10, 6, 'beneficios-de-saltar-a-la-cuerda.jpg', '1574114950.jpg', 1),
(11, 6, 'cardio2.jpg', '1574114988.jpg', 1),
(12, 6, 'cardio3.jpg', '1574115021.jpg', 1),
(13, 7, 'Pan sin tacc.jpg', '1574115341.jpg', 1),
(14, 8, 'hipertrofia.jpg', '1574115676.jpg', 1),
(15, 8, 'hipertrofia (1).jpg', '1574115678.jpg', 1),
(16, 8, 'hipertrofia2.jpg', '1574115683.jpg', 1),
(17, 8, 'hipertrofia3.jpg', '1574115686.jpg', 1),
(18, 9, 'Tortilla-de-patata-vegana.jpg', '1574116121.jpg', 1),
(19, 10, 'skipping.jpg', '1574116656.jpg', 1),
(20, 10, 'sentadilals con salgo.jpg', '1574116710.jpg', 1),
(21, 11, 'no-salt-symbol-eps-vector_csp58586584.jpg', '1574117715.jpg', 1),
(22, 11, 'no-sal.jpg', '1574117719.jpg', 1),
(23, 12, 'beneficios-de-hacer-burpees.jpg', '1574118231.jpg', 1),
(24, 12, '6a0133ec991857970b01bb07a34670970d.png', '1574118310.png', 1),
(25, 12, 'sentadilla-pistol-una-pierna.jpg', '1574118323.jpg', 1),
(26, 12, 'plan2-1000.jpg', '1574118357.jpg', 1),
(27, 13, 'dieta-para-engordar_24992_l.jpg', '1574119378.jpg', 1),
(28, 13, 'dieta-para-engordar_24993_l.jpg', '1574119388.jpg', 1),
(29, 14, 'carne seitan.jpg', '1574122392.jpg', 1),
(30, 15, 'puchero vegano.jpg', '1574122839.jpg', 1),
(31, 16, 'fondos en paralelas.jpg', '1574123508.jpg', 1),
(32, 16, 'apertura.jpg', '1574123511.jpg', 1),
(33, 16, 'press banca.jpg', '1574123518.jpg', 1),
(34, 16, '450_1000.jpg', '1574123547.jpg', 1),
(35, 16, 'cruce de poleas.jpg', '1574123579.jpg', 1),
(36, 17, 'cuadriceps.jpg', '1574124791.jpg', 1),
(37, 17, 'dorsales.jpg', '1574124795.jpg', 1),
(38, 17, 'press mancuerna.jpg', '1574124801.jpg', 1),
(39, 17, 'vuelos laterales.jpg', '1574124806.jpg', 1),
(40, 17, 'isquiotibiales-en-mquina.jpg', '1574124813.jpg', 1),
(41, 18, 'muzzarelas.jpg', '1574125665.jpg', 1),
(42, 19, 'pizza.jpg', '1574126224.jpg', 1),
(43, 20, 'espinales cruzados.jpg', '1574126775.jpg', 1),
(44, 20, 'jumpin.jpg', '1574126783.jpg', 1),
(45, 20, 'elevacion.jpg', '1574126806.jpg', 1),
(46, 21, '3474090193_c5c2a0f956_b.jpeg', '1574127279.jpeg', 1),
(47, 21, 'hombre-tonificado.jpg', '1574127283.jpg', 1),
(48, 22, 'jumping jacks.jpg', '1574127839.jpg', 1),
(49, 22, 'Burpees-infografia-1-k0vH-U3028395032930xD-510x460@abc.jpg', '1574127843.jpg', 1),
(50, 22, 'rodillas al choe.jpg', '1574127896.jpg', 1),
(51, 23, 'empanada.jpg', '1574128025.jpg', 1),
(52, 24, 'bruschettas-de-tomate-y-albahaca.jpg', '1574128624.jpg', 1),
(53, 24, 'brochetasdetomate1450x450.jpg', '1574128630.jpg', 1),
(54, 25, 'ensalada-de-apio-tomate-y-cebolla-foto-principal.jpg', '1574129087.jpg', 1),
(55, 25, 'ensalada-de-tomate-y-apio.jpg', '1574129090.jpg', 1),
(56, 26, 'churros.jpg', '1574129473.jpg', 1),
(57, 27, 'Torta frita.jpg', '1574129700.jpg', 1),
(58, 28, 'v4-728px-Make-a-Baked-Potato-Skin-Crispy-Step-5.jpg', '1574130055.jpg', 1),
(59, 28, 'Cascaras-de-papa-1.jpg', '1574130060.jpg', 1),
(60, 29, 'receta-guacamole.jpg', '1574130581.jpg', 1),
(61, 29, '1494888800-palta-istocl.jpg', '1574130602.jpg', 1),
(62, 29, '_95069494_chillis_getty.jpg', '1574130625.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_like`
--

DROP TABLE IF EXISTS `publicacion_like`;
CREATE TABLE IF NOT EXISTS `publicacion_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` int(4) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion_like`
--

INSERT INTO `publicacion_like` (`id`, `id_publicacion`, `id_usuario`, `tipo`, `activo`) VALUES
(1, 1, 3, 1, 1),
(2, 2, 3, 1, 1),
(3, 4, 4, -1, 1),
(4, 3, 4, 1, 1),
(5, 4, 2, 1, 1),
(6, 1, 5, 1, 1),
(7, 4, 5, 1, 1),
(8, 7, 6, 1, 1),
(9, 6, 6, 1, 1),
(10, 8, 6, 1, 1),
(11, 3, 6, 1, 1),
(12, 5, 6, 1, 1),
(13, 2, 6, 1, 1),
(14, 8, 7, 1, 1),
(15, 10, 7, 1, 1),
(16, 9, 7, 1, 1),
(17, 8, 8, 1, 1),
(18, 1, 8, -1, 1),
(19, 12, 8, 1, 1),
(20, 9, 9, 1, 1),
(21, 7, 9, 1, 1),
(22, 5, 9, 1, 1),
(23, 13, 10, 1, 1),
(24, 12, 10, 1, 1),
(25, 8, 10, 1, 1),
(26, 15, 11, 1, 1),
(27, 7, 11, 1, 1),
(28, 18, 12, 1, 1),
(29, 17, 12, 1, 1),
(30, 16, 12, 1, 1),
(31, 20, 13, -1, 1),
(32, 9, 14, 1, 1),
(33, 4, 14, 1, 1),
(34, 23, 15, 1, 1),
(35, 24, 15, 1, 1),
(36, 20, 1, 1, 1),
(37, 8, 1, 1, 1),
(38, 12, 1, 1, 1),
(39, 13, 1, 1, 1),
(40, 16, 1, 1, 1),
(41, 17, 1, 1, 1),
(42, 21, 1, 1, 1),
(43, 28, 2, 1, 1),
(44, 29, 2, 1, 1),
(45, 15, 2, 1, 1),
(46, 14, 2, 1, 1),
(47, 5, 2, 1, 1),
(48, 29, 3, 1, 1),
(49, 28, 3, 1, 1),
(50, 15, 3, -1, 1),
(51, 14, 3, 1, 1),
(52, 9, 3, 1, 1),
(53, 5, 3, 1, 1),
(54, 3, 3, 1, 1),
(55, 22, 3, 1, 1),
(56, 21, 3, 1, 1),
(57, 20, 3, 1, 1),
(58, 12, 3, 1, 1),
(59, 10, 3, 1, 1),
(60, 29, 4, 1, 1),
(61, 28, 4, 1, 1),
(62, 15, 4, -1, 1),
(63, 14, 4, 1, 1),
(64, 9, 4, 1, 1),
(65, 25, 5, 1, 1),
(66, 27, 5, 1, 1),
(67, 26, 5, 1, 1),
(68, 23, 5, 1, 1),
(69, 19, 5, 1, 1),
(70, 18, 5, 1, 1),
(71, 29, 5, 1, 1),
(72, 17, 5, 1, 1),
(73, 20, 5, -1, 1),
(74, 16, 5, 1, 1),
(75, 13, 5, 1, 1),
(76, 12, 5, 1, 1),
(77, 22, 5, 1, 1),
(78, 21, 5, 1, 1),
(79, 28, 6, 1, 1),
(80, 29, 6, 1, 1),
(81, 25, 6, 1, 1),
(82, 15, 6, 1, 1),
(83, 14, 6, 1, 1),
(84, 22, 6, 1, 1),
(85, 21, 6, 1, 1),
(86, 20, 6, 1, 1),
(87, 12, 6, 1, 1),
(88, 1, 6, 1, 1),
(89, 22, 7, -1, 1),
(90, 21, 7, 1, 1),
(91, 20, 7, 1, 1),
(92, 2, 7, 1, 1),
(93, 1, 7, 1, 1),
(94, 17, 7, 1, 1),
(95, 16, 7, 1, 1),
(96, 13, 7, 1, 1),
(97, 16, 8, 1, 1),
(98, 17, 8, 1, 1),
(99, 20, 8, 1, 1),
(100, 29, 9, 1, 1),
(101, 28, 9, 1, 1),
(102, 4, 9, 1, 1),
(103, 3, 9, 1, 1),
(104, 27, 9, 1, 1),
(105, 26, 9, 1, 1),
(106, 23, 9, 1, 1),
(107, 18, 9, 1, 1),
(108, 19, 9, 1, 1),
(109, 20, 10, 1, 1),
(110, 1, 10, 1, 1),
(111, 29, 11, 1, 1),
(112, 27, 11, 1, 1),
(113, 26, 11, 1, 1),
(114, 23, 11, 1, 1),
(115, 19, 11, 1, 1),
(116, 29, 12, 1, 1),
(117, 27, 12, 1, 1),
(118, 26, 12, 1, 1),
(119, 23, 12, 1, 1),
(120, 7, 12, 1, 1),
(121, 13, 12, 1, 1),
(122, 12, 12, 1, 1),
(123, 8, 12, 1, 1),
(124, 1, 12, -1, 1),
(125, 22, 12, 1, 1),
(126, 21, 12, 1, 1),
(127, 10, 12, 1, 1),
(128, 2, 12, 1, 1),
(129, 29, 13, 1, 1),
(130, 27, 13, 1, 1),
(131, 26, 13, 1, 1),
(132, 19, 13, -1, 1),
(133, 18, 13, 1, 1),
(134, 7, 13, 1, 1),
(135, 6, 13, 1, 1),
(136, 10, 13, 1, 1),
(137, 1, 13, 1, 1),
(138, 15, 15, 1, 1),
(139, 14, 15, 1, 1),
(140, 5, 15, 1, 1),
(141, 4, 15, 1, 1),
(142, 3, 15, 1, 1),
(143, 19, 15, 1, 1),
(144, 18, 15, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_objetivo`
--

DROP TABLE IF EXISTS `publicacion_objetivo`;
CREATE TABLE IF NOT EXISTS `publicacion_objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_objetivo` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion_objetivo`
--

INSERT INTO `publicacion_objetivo` (`id`, `id_publicacion`, `id_objetivo`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 3),
(4, 3, 15),
(5, 3, 9),
(6, 4, 14),
(7, 4, 9),
(8, 5, 15),
(9, 5, 9),
(10, 6, 4),
(11, 7, 13),
(12, 8, 1),
(13, 9, 15),
(14, 9, 12),
(15, 10, 3),
(16, 11, 12),
(17, 12, 3),
(18, 12, 1),
(19, 13, 2),
(20, 13, 1),
(21, 14, 9),
(22, 14, 15),
(23, 15, 9),
(24, 15, 15),
(25, 16, 1),
(26, 16, 2),
(27, 17, 1),
(28, 17, 2),
(29, 18, 13),
(30, 19, 13),
(31, 20, 1),
(32, 20, 3),
(33, 21, 4),
(34, 21, 3),
(35, 22, 4),
(36, 22, 3),
(37, 23, 13),
(38, 24, 12),
(39, 25, 14),
(40, 25, 12),
(41, 26, 13),
(42, 27, 13),
(43, 28, 12),
(44, 28, 9),
(45, 28, 15),
(46, 29, 15),
(47, 29, 9),
(48, 29, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
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
  `token` varchar(255) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `mail`, `alias`, `usuario`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `imagen`, `archivo`, `activado`, `activo`, `creado_fecha`, `token`) VALUES
(1, 'rickygomez@gmail.com', 'Ricky', 'ricardo79', '8c827be157bc21fe45380aa9af2ae6a3', 'Ricardo', 'Gomez', '1979-05-15', 'https://avataaars.io/?avatarStyle=Transparent&topType=NoHair&accessoriesType=Prescription02&hatColor=Blue02&hairColor=PastelPink&facialHairType=BeardLight&facialHairColor=Platinum&clotheType=ShirtVNeck&clotheColor=Gray01&graphicType=Resist&eyeType=Surprised&eyebrowType=RaisedExcited&mouthType=Smile&skinColor=DarkBrown', 'https://avataaars.io/?avatarStyle=Transparent&topType=NoHair&accessoriesType=Prescription02&hatColor=Blue02&hairColor=PastelPink&facialHairType=BeardLight&facialHairColor=Platinum&clotheType=ShirtVNeck&clotheColor=Gray01&graphicType=Resist&eyeType=Surprised&eyebrowType=RaisedExcited&mouthType=Smile&skinColor=DarkBrown', 1, 1, '2019-10-01 13:59:24', NULL),
(2, 'mariaj@hotmail.com', 'Mari', 'marij', '6bef6105e42b550af25b4ead789becda', 'Maria Juila', 'Bustamante', '1997-06-25', 'https://avataaars.io/?avatarStyle=Circle&topType=LongHairBigHair&accessoriesType=Blank&hatColor=Heather&hairColor=SilverGray&facialHairType=BeardMagestic&facialHairColor=Red&clotheType=GraphicShirt&clotheColor=Pink&graphicType=Pizza&eyeType=Hearts&eyebrowType=RaisedExcited&mouthType=Default&skinColor=Light', 'https://avataaars.io/?avatarStyle=Circle&topType=LongHairBigHair&accessoriesType=Blank&hatColor=Heather&hairColor=SilverGray&facialHairType=BeardMagestic&facialHairColor=Red&clotheType=GraphicShirt&clotheColor=Pink&graphicType=Pizza&eyeType=Hearts&eyebrowType=RaisedExcited&mouthType=Default&skinColor=Light', 1, 1, '2019-10-06 14:00:51', NULL),
(3, 'agustinramirez64gmail.com', 'agus85', 'agustin85', '7edb43cacfbd534b4da638a9ccdca732', 'Agustin', 'Ramirez', '2000-01-10', 'https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortCurly&accessoriesType=Kurt&hatColor=Pink&hairColor=Brown&facialHairType=BeardLight&facialHairColor=BrownDark&clotheType=Hoodie&clotheColor=Gray01&graphicType=Hola&eyeType=Side&eyebrowType=Default&mouthType=Eating&skinColor=Light', 'https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortCurly&accessoriesType=Kurt&hatColor=Pink&hairColor=Brown&facialHairType=BeardLight&facialHairColor=BrownDark&clotheType=Hoodie&clotheColor=Gray01&graphicType=Hola&eyeType=Side&eyebrowType=Default&mouthType=Eating&skinColor=Light', 1, 1, '2019-11-08 14:00:51', NULL),
(4, 'macarenarod@gmail.com', 'Maca', 'macaR', 'b1806159550c9e6ba77aec8b4ca3cbbc', 'Macarena', 'Rodriguez', '1997-05-02', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShaggyMullet&accessoriesType=Round&hatColor=PastelOrange&hairColor=Black&facialHairType=Blanck&facialHairColor=Auburn&clotheType=ShirtCrewNeck&clotheColor=White&graphicType=Diamond&eyeType=Hearts&eyebrowType=Default&mouthType=Smile&skinColor=Light', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShaggyMullet&accessoriesType=Round&hatColor=PastelOrange&hairColor=Black&facialHairType=Blanck&facialHairColor=Auburn&clotheType=ShirtCrewNeck&clotheColor=White&graphicType=Diamond&eyeType=Hearts&eyebrowType=Default&mouthType=Smile&skinColor=Light', 1, 1, '2019-05-06 15:00:51', NULL),
(5, 'geruburgos@gmail.com', 'Ger', 'gerBK', 'eb49956e51296cb68af962157a0e1e4e', 'German', 'Burgos Kim', '1976-11-11', 'https://avataaars.io/?avatarStyle=Transparent&topType=Eyepatch&accessoriesType=Blank&hatColor=Black&hairColor=Brown&facialHairType=BeardMedium&facialHairColor=Red&clotheType=Overall&clotheColor=Red&graphicType=SkullOutLine&eyeType=Happy&eyebrowType=Default&mouthType=Serious&skinColor=Tanned', 'https://avataaars.io/?avatarStyle=Transparent&topType=Eyepatch&accessoriesType=Blank&hatColor=Black&hairColor=Brown&facialHairType=BeardMedium&facialHairColor=Red&clotheType=Overall&clotheColor=Red&graphicType=SkullOutLine&eyeType=Happy&eyebrowType=Default&mouthType=Serious&skinColor=Tanned', 1, 1, '2019-12-08 14:55:51', NULL),
(6, 'marcelocattarello@gmail.com', 'marce', 'marce92', 'c22fc381f7b601ebdc9bc60317b993e2', 'Marcerlo', 'Cattarello', '1992-04-27', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairTheCaesarSidePart&accessoriesType=Wayfarers&hatColor=White&hairColor=Blonde&facialHairType=MoustacheFancy&facialHairColor=Black&clotheType=CollarSweater&clotheColor=Heather&graphicType=Pizza&eyeType=Close&eyebrowType=SadConcerned&mouthType=Disbelief&skinColor=Light', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairTheCaesarSidePart&accessoriesType=Wayfarers&hatColor=White&hairColor=Blonde&facialHairType=MoustacheFancy&facialHairColor=Black&clotheType=CollarSweater&clotheColor=Heather&graphicType=Pizza&eyeType=Close&eyebrowType=SadConcerned&mouthType=Disbelief&skinColor=Light', 1, 1, '2019-01-21 12:00:06', NULL),
(7, 'pabloarrua@hotmail.com', 'Pablo', 'pablo94', 'e4a8865a39c6dfc31b0d8d4b82db5e99', 'Pablo', 'Arrua', '1994-09-09', 'https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Blank&hatColor=PastelYellow&hairColor=Red&facialHairType=MoustacheFancy&facialHairColor=Platinum&clotheType=GraphicShirt&clotheColor=Pink&graphicType=Bat&eyeType=Squint&eyebrowType=RaisedExcitedNatural&mouthType=Vomit&skinColor=Yellow', 'https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Blank&hatColor=PastelYellow&hairColor=Red&facialHairType=MoustacheFancy&facialHairColor=Platinum&clotheType=GraphicShirt&clotheColor=Pink&graphicType=Bat&eyeType=Squint&eyebrowType=RaisedExcitedNatural&mouthType=Vomit&skinColor=Yellow', 1, 1, '2019-06-02 10:00:51', NULL),
(8, 'nahuellago@gmail.com', 'nahue', 'nahueLago', 'a09ac91c839711a9ca88a83f23e8a809', 'Nahuel', 'Lago', '1980-01-02', 'https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortCurly&accessoriesType=Prescription02&hatColor=Blue03&hairColor=Red&facialHairType=BeardLight&facialHairColor=Blonde&clotheType=CollarSweater&clotheColor=Blue03&graphicType=Pizza&eyeType=EyeRoll&eyebrowType=SadConcernedNatural&mouthType=Grimace&skinColor=Pale', 'https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortCurly&accessoriesType=Prescription02&hatColor=Blue03&hairColor=Red&facialHairType=BeardLight&facialHairColor=Blonde&clotheType=CollarSweater&clotheColor=Blue03&graphicType=Pizza&eyeType=EyeRoll&eyebrowType=SadConcernedNatural&mouthType=Grimace&skinColor=Pale', 1, 1, '2019-10-10 16:26:33', NULL),
(9, 'emimena@hotmail.com', 'emi', 'emiMena', '6228c11932909c650037662d3dd3fc0e', 'Emiliano', 'Mena', '1977-03-19', 'https://avataaars.io/?avatarStyle=Transparent&topType=LongHairFro&accessoriesType=Prescription02&hatColor=Gray02&hairColor=Blonde&facialHairType=BeardLight&facialHairColor=Red&clotheType=ShirtCrewNeck&clotheColor=PastelBlue&graphicType=Deer&eyeType=Squint&eyebrowType=UnibrowNatural&mouthType=Tongue&skinColor=Light', 'https://avataaars.io/?avatarStyle=Transparent&topType=LongHairFro&accessoriesType=Prescription02&hatColor=Gray02&hairColor=Blonde&facialHairType=BeardLight&facialHairColor=Red&clotheType=ShirtCrewNeck&clotheColor=PastelBlue&graphicType=Deer&eyeType=Squint&eyebrowType=UnibrowNatural&mouthType=Tongue&skinColor=Light', 1, 1, '2019-09-22 22:51:50', NULL),
(10, 'andreagiayetto@hotmail.com', 'andre', 'andreG', 'e8000c5b830200b9e5d18c5289ff96a1', 'Andrea', 'Giayetto', '1996-05-06', 'https://avataaars.io/?avatarStyle=Transparent&topType=LongHairShavedSides&accessoriesType=Kurt&hatColor=Blue02&hairColor=Platinum&facialHairType=MoustacheFancy&facialHairColor=Blonde&clotheType=Hoodie&clotheColor=PastelBlue&graphicType=Cumbia&eyeType=Default&eyebrowType=AngryNatural&mouthType=Sad&skinColor=Tanned', 'https://avataaars.io/?avatarStyle=Transparent&topType=LongHairShavedSides&accessoriesType=Kurt&hatColor=Blue02&hairColor=Platinum&facialHairType=MoustacheFancy&facialHairColor=Blonde&clotheType=Hoodie&clotheColor=PastelBlue&graphicType=Cumbia&eyeType=Default&eyebrowType=AngryNatural&mouthType=Sad&skinColor=Tanned', 1, 1, '2019-11-13 17:06:01', NULL),
(11, 'verocristofalo@hotmail.com', 'vero', 'veroC', '5a5a99d840429fc6a9226332c01759f8', 'Veronica', 'Cristofalo', '1986-10-12', 'https://avataaars.io/?avatarStyle=Circle&topType=LongHairCurly&accessoriesType=SunGlasses&hatColor=Heather&hairColor=BrownDark&facialHairType=BeardMagestic&facialHairColor=Brown&clotheType=ShirtVNeck&clotheColor=Blue03&graphicType=Deer&eyeType=Hearts&eyebrowType=Angry&mouthType=Grimace&skinColor=Yellow', 'https://avataaars.io/?avatarStyle=Circle&topType=LongHairCurly&accessoriesType=SunGlasses&hatColor=Heather&hairColor=BrownDark&facialHairType=BeardMagestic&facialHairColor=Brown&clotheType=ShirtVNeck&clotheColor=Blue03&graphicType=Deer&eyeType=Hearts&eyebrowType=Angry&mouthType=Grimace&skinColor=Yellow', 1, 1, '2019-08-08 14:22:36', NULL),
(12, 'agustinsa94@gmail.com', 'agusSa', 'agusSa', '858f511656d73150db877b0d74c8e512', 'Agustin', 'Sa', '1994-12-25', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairTheCaesarSidePart&accessoriesType=Prescription01&hatColor=Pink&hairColor=Blonde&facialHairType=BeardMagestic&facialHairColor=Auburn&clotheType=ShirtScoopNeck&clotheColor=White&graphicType=Deer&eyeType=Hearts&eyebrowType=Default&mouthType=Default&skinColor=Light', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairTheCaesarSidePart&accessoriesType=Prescription01&hatColor=Pink&hairColor=Blonde&facialHairType=BeardMagestic&facialHairColor=Auburn&clotheType=ShirtScoopNeck&clotheColor=White&graphicType=Deer&eyeType=Hearts&eyebrowType=Default&mouthType=Default&skinColor=Light', 1, 1, '2019-08-26 14:04:03', NULL),
(13, 'ramirovitale@gmail.com', 'rama', 'ramaVitale', '8599540a4bc7a7e3f72923680424e6d4', 'Ramiro', 'Vitale', '1996-01-24', 'https://avataaars.io/?avatarStyle=Circle&topType=WinterHat1&accessoriesType=Wayfarers&hatColor=Red&hairColor=BrownDark&facialHairType=BeardMagestic&facialHairColor=BlondeGolden&clotheType=GraphicShirt&clotheColor=Blue03&graphicType=Bear&eyeType=Hearts&eyebrowType=UnibrowNatural&mouthType=Concerned&skinColor=Black', 'https://avataaars.io/?avatarStyle=Circle&topType=WinterHat1&accessoriesType=Wayfarers&hatColor=Red&hairColor=BrownDark&facialHairType=BeardMagestic&facialHairColor=BlondeGolden&clotheType=GraphicShirt&clotheColor=Blue03&graphicType=Bear&eyeType=Hearts&eyebrowType=UnibrowNatural&mouthType=Concerned&skinColor=Black', 1, 1, '2019-07-01 19:10:22', NULL),
(14, 'facupereyra@hotmail.com', 'facu', 'facuP', '9e24d19aa9c6d32b1b40c61d996e9173', 'Facundo', 'Pereyra', '1986-11-09', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairTheCaesarSidePart&accessoriesType=Prescription01&hatColor=PastelGreen&hairColor=Brown&facialHairType=BeardLight&facialHairColor=Blonde&clotheType=BlazerSweater&clotheColor=Blue01&graphicType=Deer&eyeType=Default&eyebrowType=UnibrowNatural&mouthType=Eating&skinColor=Yellow', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairTheCaesarSidePart&accessoriesType=Prescription01&hatColor=PastelGreen&hairColor=Brown&facialHairType=BeardLight&facialHairColor=Blonde&clotheType=BlazerSweater&clotheColor=Blue01&graphicType=Deer&eyeType=Default&eyebrowType=UnibrowNatural&mouthType=Eating&skinColor=Yellow', 1, 1, '2019-09-06 13:10:24', NULL),
(15, 'lucianoperez86@gmail.com', 'lucianoPerez', 'lucianoPerez', 'a2c550a9fbb2f6c9f583884ddc18dbb3', 'Luciano', 'Perez', '1986-09-22', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairSides&accessoriesType=Prescription02&hatColor=White&hairColor=Blonde&facialHairType=MoustacheFancy&facialHairColor=Platinum&clotheType=BlazerSweater&clotheColor=PastelBlue&graphicType=SkullOutLine&eyeType=Wink&eyebrowType=DefaultNatural&mouthType=Vomit&skinColor=Brown', 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairSides&accessoriesType=Prescription02&hatColor=White&hairColor=Blonde&facialHairType=MoustacheFancy&facialHairColor=Platinum&clotheType=BlazerSweater&clotheColor=PastelBlue&graphicType=SkullOutLine&eyeType=Wink&eyebrowType=DefaultNatural&mouthType=Vomit&skinColor=Brown', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_objetivo`
--

DROP TABLE IF EXISTS `usuario_objetivo`;
CREATE TABLE IF NOT EXISTS `usuario_objetivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_objetivo` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_objetivo`
--

INSERT INTO `usuario_objetivo` (`id`, `id_usuario`, `id_objetivo`, `fecha_inicio`, `fecha_fin`, `activo`) VALUES
(1, 1, 1, '2019-11-21', '2020-04-21', 1),
(2, 1, 3, '2019-11-21', '2020-04-21', 1),
(3, 2, 9, NULL, NULL, 1),
(4, 2, 15, NULL, NULL, 1),
(5, 3, 3, '2019-12-04', '2020-02-07', 1),
(6, 3, 15, NULL, NULL, 1),
(7, 3, 14, NULL, NULL, 1),
(8, 3, 9, NULL, NULL, 1),
(9, 4, 15, NULL, NULL, 1),
(10, 4, 9, NULL, NULL, 1),
(11, 5, 1, '2019-11-26', '2020-03-26', 1),
(12, 5, 4, '2019-11-27', '2020-01-27', 1),
(13, 5, 14, NULL, NULL, 1),
(14, 5, 13, NULL, NULL, 1),
(15, 6, 3, '2019-11-27', '2020-04-27', 1),
(16, 6, 12, NULL, NULL, 1),
(17, 6, 15, NULL, NULL, 1),
(18, 7, 12, NULL, NULL, 1),
(19, 7, 3, '2019-11-27', '2020-01-27', 1),
(20, 7, 1, '2019-11-27', '2020-01-27', 1),
(21, 8, 2, '2019-11-19', '2020-03-19', 1),
(22, 8, 1, '2019-11-19', '2020-03-19', 1),
(23, 9, 9, NULL, NULL, 1),
(24, 9, 15, NULL, NULL, 1),
(25, 9, 13, NULL, NULL, 1),
(26, 10, 2, '2019-11-20', '2020-02-20', 1),
(27, 10, 1, '2019-11-19', '2020-03-18', 1),
(28, 11, 13, NULL, NULL, 1),
(29, 12, 13, NULL, NULL, 1),
(30, 12, 1, '2019-10-29', '2020-02-28', 1),
(31, 12, 3, '2019-11-01', '2020-01-31', 1),
(32, 13, 4, '2019-11-27', '2020-02-19', 1),
(33, 13, 3, '2019-11-27', '2020-02-19', 1),
(34, 13, 13, NULL, NULL, 1),
(35, 14, 12, NULL, NULL, 1),
(36, 14, 14, NULL, NULL, 1),
(37, 15, 9, NULL, NULL, 1),
(38, 15, 15, NULL, NULL, 1),
(39, 15, 12, NULL, NULL, 1),
(40, 15, 13, NULL, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
