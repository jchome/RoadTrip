-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: jc.specs.sql.free.fr
-- Generation Time: Nov 27, 2022 at 07:21 AM
-- Server version: 5.0.83
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `roadtrip`
--


-- --------------------------------------------------------

--
-- Table structure for table `rtpetp`
--

CREATE TABLE IF NOT EXISTS `rtpetp` (
  `etpidetp` int(11) NOT NULL auto_increment COMMENT 'Identifiant',
  `etplbnom` varchar(255) collate latin1_general_ci NOT NULL COMMENT 'Nom',
  `etpnulat` float NOT NULL COMMENT 'Latitude',
  `etpnulon` float NOT NULL COMMENT 'Longitude',
  `etpfgarr` char(1) collate latin1_general_ci NOT NULL COMMENT 'Arrêt',
  `etpiditi` int(11) NOT NULL COMMENT 'Itinéraire',
  `etpnuord` int(11) NOT NULL COMMENT 'Ordre',
  `etptxdes` text collate latin1_general_ci COMMENT 'Description',
  PRIMARY KEY  (`etpidetp`),
  KEY `FK_etpiditi_rtpini_itiiditi` (`etpiditi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=133 ;

--
-- Dumping data for table `rtpetp`
--

INSERT INTO `rtpetp` (`etpidetp`, `etplbnom`, `etpnulat`, `etpnulon`, `etpfgarr`, `etpiditi`, `etpnuord`, `etptxdes`) VALUES
(1, 'Départ', 45.586, 4.75297, 'O', 1, 1, NULL),
(57, 'Vienne', 45.529, 4.8757, '', 1, 2, ''),
(3, 'Saint-Jean-de-Bournay', 45.5022, 5.12881, '0', 1, 3, NULL),
(4, 'Semons', 45.4327, 5.20112, '0', 1, 4, NULL),
(5, 'La Frette', 45.39, 5.36249, '0', 1, 5, NULL),
(6, 'Beaucroissant', 45.3441, 5.48203, '0', 1, 6, NULL),
(7, 'La Roize / Voreppe', 45.2982, 5.63697, 'O', 1, 7, 'Pause café'),
(8, 'Voreppe', 45.2982, 5.63697, '0', 2, 1, NULL),
(9, 'Embranchement "Le Revolet"', 45.3628, 5.67911, '0', 2, 2, NULL),
(10, 'Entrée de Chambéry', 45.5538, 5.89158, '0', 2, 3, 'Faire le plein'),
(11, 'Chambéry le haut', 45.5996, 5.91543, 'O', 2, 4, ''),
(71, 'Sortie du tunel', 45.7508, 5.70769, '', 10, 2, 'Tout de suite à droite'),
(43, 'Le revard', 45.6815, 5.97517, '', 3, 1, ''),
(16, 'St Jean d''Arvey', 45.6162, 6.01511, '0', 3, 3, ''),
(17, 'Aillon-le-Jeune', 45.6194, 6.08007, '0', 3, 4, ''),
(18, 'Pont d''Escorchevel', 45.674, 6.14354, '0', 3, 5, NULL),
(19, 'Cusy', 45.765, 6.03055, '0', 3, 6, NULL),
(20, 'Grezy-sur-Aix', 45.7249, 5.93262, '0', 3, 7, NULL),
(44, 'Bifurcation', 45.642, 6.01381, '', 3, 2, ''),
(94, 'Chambéry', 45.5784, 5.91777, '', 14, 2, 'Passage à Chambéry'),
(93, 'Brignais', 45.6747, 4.74967, '', 14, 1, 'Départ'),
(33, 'Lagnieu', 45.8849, 5.34588, '0', 5, 1, ''),
(37, 'Méry', 45.643, 5.93365, '', 2, 5, ''),
(38, 'Le Revard', 45.6815, 5.97491, '', 2, 6, 'Pause déjeuner\nhttp://lesquatrevallees.fr/\n04 79 54 00 43'),
(92, 'Crémieux', 45.7343, 5.23499, '', 5, 6, ''),
(41, 'Péage pour rentrer sur Lyon', 45.6559, 5.09859, '', 5, 9, '0.80 € pour les motos'),
(42, 'St Priest', 45.6991, 4.9744, '', 5, 10, 'Retour sur Lyon'),
(79, 'Corlier', 46.0277, 5.50209, '', 11, 3, ''),
(82, 'Départ', 45.5844, 4.75006, '', 12, 1, 'Parking de Carrefour Givors'),
(81, 'Lanieu', 45.9051, 5.3482, '', 11, 5, 'Pause 4h'),
(80, 'Avant Ambérieu', 45.9833, 5.34794, '', 11, 4, ''),
(78, 'Hauteville', 45.9761, 5.60309, '', 11, 2, ''),
(77, 'Restaurant', 45.9044, 5.66167, '', 11, 1, NULL),
(59, 'Grezy-sur-Aix', 45.7052, 5.88747, '', 8, 1, NULL),
(60, 'Vers la plage', 45.7044, 5.89477, '', 8, 2, 'Pause plage en fin de journée ?'),
(61, 'Long du lac', 45.7856, 5.86189, '', 8, 3, ''),
(62, 'Hotel Belley', 45.7572, 5.69066, '', 8, 4, '37 r Sainte Marie 01300 Belley - Maison Saint Anthelme - 04 79 81 02 29'),
(63, 'Balade sur le port', 45.705, 5.88652, '', 3, 8, 'pause 4h avec glaces devant les bateaux'),
(64, 'Départ de l''hotel', 45.8109, 5.85055, '', 9, 1, ''),
(65, 'Belvédaire de la Chambotte', 45.7754, 5.87239, '', 9, 2, 'Pause vue sur le lac'),
(66, 'Albens', 45.7859, 5.94507, '', 9, 3, ''),
(67, 'Bords du lac', 45.6542, 5.89348, '', 9, 4, ''),
(68, 'Tunel du chat', 45.7589, 5.70628, '', 9, 5, 'Pause vue sur le lac et pause café'),
(70, 'Tunel du chat', 45.7604, 5.69172, '', 10, 1, NULL),
(72, 'Jongieux', 45.7455, 5.73981, '', 10, 3, ''),
(73, 'Bifurcation pour Hautecombe', 45.7839, 5.82447, '', 10, 4, 'Possibilité de rallonger vers Hautecombe'),
(74, 'Culoz', 45.8486, 5.80645, '', 10, 5, ''),
(75, 'Artemare', 45.8733, 5.69469, '', 10, 6, ''),
(76, 'Restaurant', 45.9043, 5.66174, '', 10, 7, 'http://le-vieux-tilleul.fr/\n04 79 87 64 51'),
(83, 'Vienne', 45.5282, 4.87358, '', 12, 2, 'Traversée de Vienne'),
(84, 'Entrée de St Jean de Bournay', 45.5022, 5.12928, '', 12, 3, ''),
(85, 'Entrée de St Jean de Bournay', 45.5022, 5.12928, '', 13, 1, NULL),
(86, 'Semons', 45.4313, 5.20563, '', 13, 2, ''),
(87, 'Montrevel', 45.4846, 5.40047, '', 13, 3, ''),
(88, 'Les Abrets', 45.5363, 5.58655, '', 13, 4, ''),
(89, 'Pont de Beauvoisin', 45.5354, 5.67204, '', 13, 5, ''),
(90, 'avant le lac', 45.5422, 5.76147, '', 13, 6, ''),
(91, 'St Alban plage', 45.5623, 5.79572, '', 13, 7, ''),
(95, 'Modane', 45.1947, 6.67814, '', 14, 3, ''),
(96, 'Susa', 45.1373, 7.05348, '', 14, 4, 'Halte pour la nuit + visite'),
(97, 'Susa', 45.1373, 7.05348, '', 15, 1, NULL),
(98, 'Rivoli', 45.0818, 7.50718, '', 15, 2, ''),
(99, 'Alessandria', 44.9339, 8.55801, '', 15, 3, ''),
(100, 'Predosa', 44.7594, 8.64383, '', 15, 4, ''),
(101, 'Gênes', 44.4048, 8.90236, '', 15, 5, ''),
(102, 'Gênes', 44.433, 8.95969, '', 16, 1, NULL),
(103, 'Massa', 44.0223, 10.102, '', 16, 2, ''),
(104, 'Pise', 43.7246, 10.3798, '', 16, 3, ''),
(105, 'Florence', 43.7757, 11.2362, '', 16, 4, ''),
(106, 'Florence', 43.7757, 11.2362, '', 17, 1, NULL),
(107, 'Cavallina', 43.982, 11.2116, '', 17, 2, ''),
(108, 'Bologne', 44.4796, 11.2639, '', 17, 3, ''),
(109, 'Vérone', 45.4071, 10.9128, '', 17, 4, ''),
(110, 'Vérone', 45.4071, 10.9128, '', 18, 1, NULL),
(111, 'Bergamo', 45.6688, 9.67706, '', 18, 2, ''),
(112, 'Brivio', 45.7398, 9.44659, '', 18, 3, ''),
(113, 'Côme', 45.8031, 9.09685, '', 18, 4, ''),
(114, 'Côme', 45.8031, 9.09685, '', 19, 1, NULL),
(115, 'Rho (Milan)', 45.5424, 9.05866, '', 19, 2, ''),
(116, 'Turin', 45.0828, 7.5095, '', 19, 3, ''),
(117, 'Sant Ambrogio di Torino', 45.0988, 7.36505, '', 19, 4, ''),
(118, 'Sant Ambrogio di Torino', 45.0988, 7.36505, '', 20, 1, NULL),
(119, 'Modane', 45.1948, 6.67415, '', 20, 2, ''),
(120, 'Chambéry', 45.5517, 5.95819, '', 20, 3, ''),
(121, 'Brignais', 45.6744, 4.76219, '', 20, 4, ''),
(122, 'Brignais', 45.6747, 4.74967, '', 21, 1, ''),
(123, 'Chambéry', 45.5784, 5.91777, '', 21, 2, ''),
(124, 'Modane', 45.1917, 6.66332, '', 21, 3, ''),
(125, 'Turin', 45.0839, 7.53216, '', 21, 4, ''),
(126, 'Alessandria', 44.9335, 8.5532, '', 21, 5, ''),
(127, 'Golfe de Gênes', 44.4303, 8.76091, '', 21, 6, ''),
(128, 'Gênes', 44.4178, 8.90339, '', 21, 7, ''),
(129, 'Gênes', 44.4178, 8.90339, '', 22, 1, NULL),
(130, 'Massa', 44.0141, 10.1218, '', 22, 2, ''),
(131, 'Florence', 43.7701, 11.1662, '', 22, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `rtpiti`
--

CREATE TABLE IF NOT EXISTS `rtpiti` (
  `itiiditi` int(11) NOT NULL auto_increment COMMENT 'Identifiant',
  `itilbnom` varchar(255) collate latin1_general_ci NOT NULL COMMENT 'Nom',
  `itiidvoy` int(11) NOT NULL COMMENT 'Voyage',
  `itinuord` int(11) NOT NULL COMMENT 'numéro d''ordre',
  `itilbdur` varchar(255) collate latin1_general_ci default NULL COMMENT 'Durée',
  `itinudst` float default NULL COMMENT 'Distance',
  `ititxdes` text collate latin1_general_ci COMMENT 'Description',
  PRIMARY KEY  (`itiiditi`),
  KEY `FK_itiidvoy_rtpvoy_voyidvoy` (`itiidvoy`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `rtpiti`
--

INSERT INTO `rtpiti` (`itiiditi`, `itilbnom`, `itiidvoy`, `itinuord`, `itilbdur`, `itinudst`, `ititxdes`) VALUES
(1, 'Trajet Lyon - Voreppe', 1, 1, '01:18', 86.4, 'Belles courbes à grande vitesse'),
(2, 'Voreppe - Aix-les-Bains', 1, 2, '01:31', 77, 'Virages de montagne puis grande vitesse sur le plateau. Faire le plein en arrivant à Chambéry.'),
(3, 'Les Beauges', 1, 3, '01:43', 76, 'Tour dans les Bauges et pause 4h'),
(5, 'Retour', 1, 10, '00:42', 47, '0.80 € par moto en prenant l''autoroute après le péage de St Quentin'),
(11, 'Balade dimanche après-midi', 1, 8, '00:59', 57, ''),
(8, 'Aller à l''hotel', 1, 4, '00:39', 38, 'Le long du lac (pause à la plage ?)'),
(9, 'Balade dimanche matin', 1, 5, '01:06', 54, 'Avec 2 pauses "vue sur le lac" (rajouter 30-40 minutes)'),
(10, 'Balade dimanche avant midi', 1, 6, '01:11', 51, 'Balade tranquille'),
(12, 'Départ vers le point de rencontre', 3, 1, '00:31', 34.7, ''),
(13, 'Au lac !', 3, 2, '01:25', 72.7, ''),
(14, '1er jour : Lyon / Italie', 4, 1, '02:58', 262, 'Aller en Italie + Nuit à Susa (70 € à 87 €)'),
(15, 'Susa - Genes', 4, 2, '02:13', 215, 'Passage par Turin ? (besoin de plus de temps)'),
(16, 'Gênes - Florence', 4, 3, '02:54', 243, 'Via Pise'),
(17, 'Florence - Vérone', 4, 4, '02:14', 221, 'Remontée vers le Nord'),
(18, 'Vérone - Côme', 4, 5, '02:19', 174, ''),
(19, 'Côme - Retour', 4, 6, '01:59', 191, ''),
(20, 'Retour à Brignais', 4, 7, '03:02', 291, ''),
(21, 'Départ', 5, 1, '04:56', 474, ''),
(22, 'Gênes - Florence', 5, 2, '02:22', 231, ''),
(23, 'Islande', 6, 1, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `rtppar`
--

CREATE TABLE IF NOT EXISTS `rtppar` (
  `paridpar` int(11) NOT NULL auto_increment COMMENT 'identifiant',
  `paridvoy` int(11) NOT NULL COMMENT 'Voyage partagé',
  `paridami` int(11) NOT NULL COMMENT 'Ami',
  PRIMARY KEY  (`paridpar`),
  KEY `FK_paridvoy_rtpvoy_voyidvoy` (`paridvoy`),
  KEY `FK_paridami_rtpusr_usridusr` (`paridami`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `rtppar`
--

INSERT INTO `rtppar` (`paridpar`, `paridvoy`, `paridami`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 5),
(20, 1, 15),
(18, 1, 13),
(19, 1, 14),
(10, 1, 8),
(11, 1, 8),
(12, 1, 9),
(13, 1, 9),
(17, 1, 12),
(16, 1, 11),
(21, 1, 16),
(22, 3, 8),
(23, 3, 10),
(24, 3, 7),
(25, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `rtpusr`
--

CREATE TABLE IF NOT EXISTS `rtpusr` (
  `usridusr` int(11) NOT NULL auto_increment COMMENT 'identifiant',
  `usrlbnom` varchar(255) collate latin1_general_ci NOT NULL COMMENT 'Nom',
  `usrlblgn` varchar(32) collate latin1_general_ci NOT NULL COMMENT 'Login',
  `usrlbpwd` varchar(32) collate latin1_general_ci NOT NULL COMMENT 'Mot de passe',
  `usrlbmai` varchar(255) collate latin1_general_ci NOT NULL COMMENT 'Email',
  `usrfipho` varchar(4000) collate latin1_general_ci default NULL COMMENT 'Photo',
  PRIMARY KEY  (`usridusr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `rtpusr`
--

INSERT INTO `rtpusr` (`usridusr`, `usrlbnom`, `usrlblgn`, `usrlbpwd`, `usrlbmai`, `usrfipho`) VALUES
(1, 'test', 'test', 'test', 'JUJUJU@gmail.com', 'User_usrfipho_1_file.jpg'),
(6, 'test00', 'test00', 'test00', 'test@yopmail.com', NULL),
(7, 'zazaza@gmail.com', '-', 'xxxxxxxx', 'zazaza@gmail.com', NULL),
(8, 'MMMMMMM', 'y0y0y0@free.fr', 'xxxxxxxx', 'MMMMMMM@free.fr', NULL),
(9, 'CCCCCCC', 'CCCCCCC@yahoo.fr', 'xxxxxxxx', 'CCCCCCC@yahoo.fr', NULL),
(10, 'llllll', 'llll@hotmail.com', 'xxxxxxxx', 'llllll@hotmail.com', NULL),
(11, 'ssssss', 'ssssss', 'xxxxxxxx', 'ssssss@free.fr', NULL),
(12, 'gggg@ggggg-group.fr', 'gggg', 'xxxxxxxx', 'gggg@gggg-group.fr', NULL),
(13, 'cmcmcm@mail-sc.com', 'cmcmcm', 'xxxxxxxx', 'cmcmcm@mail-sc.com', NULL),
(14, 'jjjjj@jj.fr', 'jjjjj', 'xxxxxxxx', 'jjjjjj@jj.fr', NULL),
(15, 'ddddddd@free.fr', 'ddddddd', 'xxxxxxxx', 'ddddddd@free.fr', NULL),
(16, 'cncncn@al.com', 'cncncn', 'xxxxxxxx', 'cncncn@al.com', NULL),
(17, 'eeeee', 'eeeee', 'xxxxxxxx', 'elina.chrea@gmail.com', NULL),
(18, 'LALALALA', 'LALALALA@gmail.com', 'xxxxxxxx', 'LALALALA@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rtpvoy`
--

CREATE TABLE IF NOT EXISTS `rtpvoy` (
  `voyidvoy` int(11) NOT NULL auto_increment COMMENT 'identifiant',
  `voylbnom` varchar(255) collate latin1_general_ci NOT NULL COMMENT 'Nom',
  `voyidusr` int(11) NOT NULL COMMENT 'Auteur',
  PRIMARY KEY  (`voyidvoy`),
  KEY `FK_voyidusr_rtpusr_usridusr` (`voyidusr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rtpvoy`
--

INSERT INTO `rtpvoy` (`voyidvoy`, `voylbnom`, `voyidusr`) VALUES
(1, 'Sortie Moto en Savoie', 1),
(2, 'Balade à Aiguebelette', 0),
(3, 'Sortie au lac d&#39;Aiguebelette', 1),
(4, 'Italie du Nord', 1),
(5, 'Italie : Gênes / Florence', 1),
(6, 'Islande', 17),
(7, 'TEST1', 18);
