-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 10:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beeradvisor`
--

-- --------------------------------------------------------

--
-- Table structure for table `beer`
--

CREATE TABLE `beer` (
  `ID_beer` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `ID_color` int(11) DEFAULT NULL,
  `strength` decimal(3,2) DEFAULT NULL,
  `ID_taste` int(11) DEFAULT NULL,
  `brewery` varchar(50) DEFAULT NULL,
  `ID_category` int(11) DEFAULT NULL,
  `ID_hops` int(11) DEFAULT NULL,
  `ID_grains` int(11) DEFAULT NULL,
  `IBU` decimal(6,2) DEFAULT NULL,
  `clarity` decimal(4,1) DEFAULT NULL,
  `calories` decimal(5,1) DEFAULT NULL,
  `carbohydrates` decimal(5,1) DEFAULT NULL,
  `beer_picture` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beer`
--

INSERT INTO `beer` (`ID_beer`, `name`, `location`, `ID_color`, `strength`, `ID_taste`, `brewery`, `ID_category`, `ID_hops`, `ID_grains`, `IBU`, `clarity`, `calories`, `carbohydrates`, `beer_picture`) VALUES
(1, '1664 Kronenbourg', 'Strasbourg, France', 3, '6.00', 2, 'Kronenbourg', 2, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(2, 'Grimbergen', 'Waarlos, Belgium', 2, '6.40', 2, 'Maes', 3, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(3, '3 monts', 'St Sylvestre Cappel, France', 3, '4.80', 2, 'St Sylvestre', 8, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(4, 'Adelscott', 'Schiltigheim, France', 4, '6.60', 1, 'Fisher', 8, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(5, 'Arabier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(6, 'Arten braü', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(7, 'Artevelde Grand', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(8, 'Asahi', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(9, 'Augustijn anno', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(10, 'Augustijn grand', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(11, 'Augustiner', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(12, 'Augustinerbraü', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(14, 'Aulne 10°', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(15, 'Aulne 8°', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(16, 'Aulne des Peres', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(17, 'Australian', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(18, 'Bacchus', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(19, 'Ballards gone', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(20, 'Barbar', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(21, 'Bass Pale Ale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(22, 'Bécasse', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(24, 'Bécasse Kriek', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(25, 'Becks bier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(26, 'Bell pils', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(27, 'Belle-Vue', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(29, 'Belle-Vue Kriek', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(31, 'Belzebuth', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(32, 'Benedict', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(33, 'Benelux Pils', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(34, 'Bernoville', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(35, 'Bière de Garde', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(36, 'Bière de luxe de', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(37, 'Bière de luxe', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(38, 'Bière de Mars', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(42, 'Bière de St', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(43, 'Bière des sans', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(45, 'Bière du désert', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(46, 'Bière du Mont', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(47, 'Bischoff', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(48, 'Bitburger', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(49, 'Black Sheep Ale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(50, 'Black Stout', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(54, 'Blanche de Thy', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(56, 'Blanch-ke', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(57, 'Blondine', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(58, 'Bock du Moulin', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(59, 'Bofferding lager', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(60, 'Bofferding', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(61, 'Bohemia', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(62, 'Bonne-espérance', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(63, 'Bons voeux de', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(64, 'Bornem dubbel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(65, 'Bornem triple', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(66, 'Bos Keun', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(67, 'Bourgogne des', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(68, 'Caves Bruegel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(69, 'Celebrator', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(70, 'Ceres royal', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(71, 'Cezarken', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(72, 'Chapeau Fraise', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(73, 'Chapeau', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(74, 'Chapeau Peche', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(75, 'Charles Quint', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(83, 'CHTI Blonde', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(84, 'Ciney blonde', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(85, 'Clausen 0.4', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(86, 'Colvert', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(87, 'Coreff ambrée', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(88, 'Coreff étiquette', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(89, 'Corona Extra', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(90, 'Corsendonk', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(91, 'Corsendonk', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(92, 'Cripple Dick', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(93, 'Cuvée château', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(94, 'Cuvée de CINEY', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(98, 'Eggenberger', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(99, 'Erdinger', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(100, 'Ex bier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(101, 'n Dunkle Perle', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(102, 'Kasteel bier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(103, 'Kerelsbier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(104, 'Killians', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(105, 'Kingston', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(106, 'Kirin beer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(107, 'Kochersbier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(108, 'König Ludwig', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(109, 'Korma 5', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(110, 'Korma Cassis', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(111, 'Kortrijk 800', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(112, 'Kriek', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(113, 'Krieken bier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(114, 'Kronen gold', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(115, 'Kronenbourg', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(117, 'Kronenpils', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(118, 'Kwak', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(119, 'La Bavaisienne', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(120, 'La belle Siska', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(121, 'La cave des', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(122, 'La Cervoise des', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(123, 'La Chouffe', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(124, 'La Choulette', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(125, 'La Choulette', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(126, 'La Cuivrée', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(127, 'La Divine', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(128, 'La Facon', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(129, 'La Fanette', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(130, 'La Guignolette', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(131, 'La Guillotine', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(132, 'La Pucelle', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(133, 'La Trappe', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(134, 'La Trappe brune', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(135, 'La Vieille Bon', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(136, 'Het kapittel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(138, 'Hieronymus', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(139, 'Hoegaarden', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(141, 'Holba', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(142, 'Holsten', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(143, 'Hommelbier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(144, 'Hoppeland Bier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(146, 'Horse ale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(147, 'Hostan 11%', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(148, 'Hostan 12%', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(149, 'Houten kop', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(150, 'Ice Beer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(151, 'Ichtegems oud', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(152, 'Imperial russian', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(153, 'Jack-op', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(154, 'Jacobins', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(155, 'Jade', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(156, 'Jenlain', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(157, 'Jenlain de Noël', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(158, 'John Bull bitter', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(159, 'Judas', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(160, 'Julius', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(161, 'Jupiler', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(162, 'K 8', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(163, 'Kaltenberg', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(164, 'Kaly Pils', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(165, 'Kanterbräu', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(166, 'Kastaar', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(167, 'Godefroy', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(168, 'Golden promise', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(169, 'Gouden carolus', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(170, 'Grimbergen', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(173, 'Guapa', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(174, 'Guinness', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(176, 'Guinness Extra', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(178, 'Guinness Stout', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(179, 'Gulden Draak', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(180, 'Hamovniky beer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(181, 'Hannen Alt', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(182, 'Hanssens', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(183, 'Hanssens Kriek', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(184, 'Hapkin', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(185, 'Harveys', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(186, 'Heineken Lager', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(187, 'Helleketelbier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(188, 'Herold', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(189, 'Herold', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(190, 'Het kapittel Abt', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(191, 'La Villeneuvoise', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(192, 'Labatts Classic', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(193, 'Lavesnoise', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(194, 'Le pavé de', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(195, 'Lécume des', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(196, 'Leffe blonde', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(197, 'Leffe Brune', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(198, 'Leffe Radieuse', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(199, 'Leffe Triple', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(200, 'Leffe Vieille', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(201, 'Liefmans', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(205, 'Liefmans Odnar', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(206, 'Lilliput', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(208, 'Lindemans Faro', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(212, 'Livinus blonde', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(213, 'Livinus brune', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(214, 'Loburg', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(215, 'London Pride', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(216, 'Lone star', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(217, 'Loteling', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(218, 'Loteling Brune', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(219, 'Louwaege Stout', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(220, 'Löwenbrau', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(221, 'Lucifer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(222, 'Luxe du moulin', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(223, 'Mac Chouffe', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(224, 'Mac Ewans', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(225, 'Maes Pils', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(226, 'Maisels hefe', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(227, 'Maredsous 10', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(228, 'Maredsous 6', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(229, 'Maredsous 8', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(230, 'Martins pale ale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(231, 'Mechelschen', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(232, 'Mechelschen', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(233, 'Messina', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(234, 'Méthode', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(235, 'Michelob', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(236, 'Milleneir', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(237, 'Moeder Overste', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(238, 'Moinette', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(239, 'Moinette II', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(240, 'Montagnarde', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(241, 'Mort subite', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(246, 'Mortimer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(247, 'Mousel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(248, 'Münchner Kindl', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(249, 'Murphys', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(250, 'Mutlanger', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(251, 'Mützig Old', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(252, 'Namur Blanche', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(253, 'Napoléon', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(254, 'Nastro Azzuro', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(255, 'Ne Janneman', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(256, 'Ne', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(257, 'Newcastle', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(259, 'Noreni', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(260, 'Nounou', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(261, 'Obernai', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(262, 'Oerbier nat en', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(263, 'Oettinger', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(264, 'Oettinger export', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(266, 'Oettinger hell', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(267, 'Oettinger Pils', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(268, 'Old Nick', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(269, 'Ophélia', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(270, 'Original', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(271, 'Orval', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(272, 'Oud Beersel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(273, 'Oudenaards wit', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(274, 'Owd Rodger', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(275, 'Paaske Bryg', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(276, 'Palm Green', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(277, 'Palm Spéciale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(278, 'Pandoer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(279, 'Paranoia', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(280, 'Pastor Ale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(281, 'Pater lieven', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(282, 'Paulaner Hefe', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(283, 'Paulaner Leicht', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(284, 'Pelforth brune', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(285, 'Pelforth pale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(286, 'Pertotale Faro', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(287, 'Petrus Oud', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(288, 'Petrus Triple', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(289, 'Piedboeuf', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(290, 'Pietra', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(291, 'Pikantus', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(292, 'Pilsen Urquell', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(293, 'Pilshem', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(294, 'Piraat', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(295, 'Pony Stout', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(296, 'Porter', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(297, 'Porter 39', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(298, 'Postel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(299, 'Pot flamand', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(300, 'Pragovar', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(301, 'Primus', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(302, 'Purkmistr', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(303, 'Rochefort 6', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(304, 'Samuel Smiths', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(305, 'San Miguel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(306, 'Sapporo', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(307, 'Satan Gold', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(308, 'Schavuit', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(309, 'Scherdel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(310, 'Schneider', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(311, 'Schulten Braü', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(312, 'Sebourg', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(313, 'Septante 5', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(314, 'Sezoens', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(315, 'Sherry Poesy', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(316, 'Simon pils', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(317, 'Simon Régal', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(318, 'Sixtus Abt 12', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(319, 'Sixtus Pater 6', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(320, 'Sixtus Prior 8', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(321, 'SKÅL', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(322, 'Sloeber', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(323, 'Smithwicks', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(324, 'Snake Beer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(325, 'Snoek', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(326, 'Sol', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(327, 'Spaten Gold', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(328, 'Spéciale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(329, 'Speltor', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(330, 'Spelty', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(331, 'St Bernardus', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(333, 'St Hermes', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(334, 'St Michael', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(335, 'St Michael Extra', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(336, 'St Paul Spéciale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(337, 'St Pierre', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(338, 'St Sixtus Abt', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(341, 'Staropramen', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(342, 'Steenbrugge', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(344, 'Steendonk', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(345, 'Stella', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(346, 'Stella Artois', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(348, 'Stonehenge', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(349, 'Stones Bitter', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(350, 'Stout Leroy', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(351, 'Straffe Hendrik', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(352, 'Streekbier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(353, 'Stropken', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(354, 'Student', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(355, 'Sublim', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(356, 'Taddy Porter', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(357, 'Tennents', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(358, 'Tennents Extra', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(359, 'Tennents Super', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(360, 'Terken brune', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(361, 'The bishops', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(362, 'Thomas Hardys', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(363, 'Timmermans', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(369, 'Titje', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(370, 'Toison dor', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(371, 'Tongerlo 6', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(372, 'Tongerlo 8', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(373, 'Tourtel brune', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(374, 'Traquair House', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(375, 'Triboulette (la)', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(376, 'Triple abbaye', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(377, 'Triple Moine', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(378, 'Triple Riva', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(379, 'Trompe la mort', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(380, 'Tsingtao beer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(381, 'Tuborg', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(382, 'Tverskoe beer', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(384, 'Tzar Cannon', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(385, 'Uberland', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(386, 'Unic bier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(387, 'Upper 19', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(388, 'Valenciennoise', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(389, 'Van Malder', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(390, 'Vapeur', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(392, 'Vapeur rousse', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(393, 'Vedett', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(394, 'Velkopopovické', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(395, 'Kozel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(396, 'Velkopopovicky', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(397, 'Verboden', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(398, 'Vézelise', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(399, 'Vichtenaar', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(400, 'Vieille Garde', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(401, 'Vieille Villers', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(402, 'Vieux Bruges', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(403, 'Vieux Temps', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(404, 'Villers triple', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(405, 'Vlaamse', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(406, 'Vondel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(407, 'Warsteiner', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(408, 'Warteck Lager', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(409, 'Watneys', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(410, 'Watous wit bier', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(411, 'Wenzels', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(412, 'Westmalle', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(413, 'Westmalle tripel', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(414, 'Whitbread Pale', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(415, 'Whitebread', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(416, 'Wieze kriek', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(417, 'Witkap Pater', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(420, 'Xingu', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(421, 'Yersekes', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(422, 'Youngs strong', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(423, 'Zatte Bie', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(424, 'Zottegemse', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(425, 'Zulte', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL),
(426, 'Zywiec', NULL, 1, '0.00', 1, NULL, 1, 1, 1, '0.00', '0.0', '0.0', '0.0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beer_user`
--

CREATE TABLE `beer_user` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_beer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID_category` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_category`, `category_name`) VALUES
(1, 'unknown'),
(2, 'lager'),
(3, 'ale'),
(4, 'lambic'),
(5, 'stout'),
(6, 'pilsner'),
(7, 'abbay'),
(8, 'special'),
(9, 'cellar');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `ID_color` int(11) NOT NULL,
  `color_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`ID_color`, `color_name`) VALUES
(1, 'unknown'),
(2, 'white'),
(3, 'blonde'),
(4, 'amber'),
(5, 'brown'),
(6, 'black');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID_comment` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_beer` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `grade` decimal(2,1) NOT NULL,
  `date_publication` date NOT NULL DEFAULT current_timestamp(),
  `date_drinking` date NOT NULL,
  `picture` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_followed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grains`
--

CREATE TABLE `grains` (
  `ID_grains` int(11) NOT NULL,
  `grains_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grains`
--

INSERT INTO `grains` (`ID_grains`, `grains_name`) VALUES
(1, 'unknown'),
(2, 'malted barley'),
(3, 'though wheat'),
(4, 'corn'),
(5, 'rice');

-- --------------------------------------------------------

--
-- Table structure for table `hops`
--

CREATE TABLE `hops` (
  `ID_hops` int(11) NOT NULL,
  `hops_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hops`
--

INSERT INTO `hops` (`ID_hops`, `hops_name`) VALUES
(1, 'unknown'),
(2, 'chinook'),
(3, 'citra');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `ID_rank` int(11) NOT NULL,
  `rank_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`ID_rank`, `rank_name`) VALUES
(1, 'novice'),
(2, 'amateur'),
(3, 'intermediate'),
(4, 'expert'),
(5, 'professional');

-- --------------------------------------------------------

--
-- Table structure for table `taste`
--

CREATE TABLE `taste` (
  `ID_taste` int(11) NOT NULL,
  `taste_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taste`
--

INSERT INTO `taste` (`ID_taste`, `taste_name`) VALUES
(1, 'unknown'),
(2, 'apple'),
(3, 'cherry'),
(4, 'lemon'),
(5, 'grass');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `profile_picture` longblob DEFAULT NULL,
  `password` text NOT NULL,
  `ID_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_user`, `name`, `firstname`, `username`, `mail`, `profile_picture`, `password`, `ID_rank`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.fr', 0x89504e470d0a1a0a0000000d4948445200000037000000380802000000d6eff7c4000000097048597300000f6100000f6101a83fa76900001083494441546881b55a795c55f5b65f6bef33ec337080c32420a30c86c08d411c7308ed6aa9a959e6bdb7aebd77cbca7773c85ee5eb1abdcc4a2bcd313353d434cd97a5160e1938cf13020e47044c060564388733ece1b7de1f07104cc63e77fd059bb57eebbbd7f85b6b8344045d2122b2596d06a381e3b82e09368a03dc2c29090b0beb9254973521e299b367b67efbad28ba00baf886400773723efde4d3ae2a05ea3a9d387162f0c391b367cebe5d51c198d249298529bfee3f30edc9d8b4c478a7c3d9258dddf19aa7c934b9bf30c69c35ed85bf9d3f779e7518330444947de0c0ee15d3178c67a921524dcddd2e69ec0e4a0f9387d5260f8ab47f3ab678edbb533664ae175d2e6881d5fd53b32518537edab57bcfaae9f3c649468d333184dd2a2ded9246553750ea057d7503112a2126f9a3a7355b4e2d7cfdf4d9b7ffe76d6fb3ef9ddb1515e5e575b575b686064110743aa1aaaafacca993fa3b3fbd3396746a118845f9434971496a6aeabf17a5562794d6701c70008a56254d1dc8ce94ec7f71f22983c0f5ed5913e1c3cc463e40858a42752ea5be8e4ff5e043e341af12011800049be15841c1449a80d8594f2275b1120100110d494e38f0861d4944424202c0db565dee1d6164a415506a6403440020040091d41acee5d66897744f650667eddfa7e6d5809dd2d89db80484f0de7f72c91c00103606610f0f477aaf3a40b9051701102003644d100180f46a577a58c5a68d1b1545e9a4c26ea124f0f3f7b18b9ad6cf08811136217c00a142ea8ba5c6a3851ecfa462ddb18fbf58f5852ccb9da9b9ddb325faf9fb3945e77d47315211d3b6ad14b32b47f6fcfbaf03de3ad930744b44cc20d7c56599eb3319631d2aec4ef600818faf4f83fd9ec15cb226e7ee13fa3e6388c98eabbbd38cbf786b45c0560eb5cb6aeffecf07f8072262627c6258d86269cddc82ec4f7e090d7a6ce4e8f603b43b281993ae5c2e1c1aa101684c889cfa71e92f2fd0e9f4404c1a31e2d0beac5e2573824dad50d6dbd1d7bf07bad1209a4c1e03a6ccf5b25f58b5e85f4949a97e7e7eed68ecbac7090e661f8a75ee8af475b81f58456d8ffe7fd5e9f40000c8a9559ae1a3c61604feaf5d12a88589b46ade6eb737872c02171418447da63f9fd6f0cbfefdedebec32ca067bc3974b174e4a6300ee74e66a6c2c3028a8050b22c2a37f1e7fba3ab9651a79ea9c9545d7a945b22062efb447024daa6d9b373a9df745f91f4149909d933df9a1220fc1e94680043ccf4992d8920b9117747a889bc25a441422832bdf48a204004074f6f499eaeaeac01e8136ea91ec59545474e30fa16c99b3b2227f9bb961580c036afc0b21f3372aa5378b9bd9eedebd6bb7db0120282cbab6e19e2d9120c5efdc91ec7d4444006bbe5a63b158389e631a7352282bbc5ed87d949595958772726a6a6adc2dea46e18d87f5170c82d83223d5bc5c9fbb5391450020a2a54b3edfbf7f3f00083a83536a5965c8a091fc2fcfcdbf741100162f59929696e6b03b84f0a101dedacb055714596eab8af1191919eda0d4ebf541c1c18585857997f23cbd3c2f9cbf10e9d817e223dd57374c54942fa6f40c0d01c098d89898981841106e141606d4ec50ab64044e223dc77188b2af5eb95dcd5fa9e40283028928e7d79c7ee963f591c3730baeeff87e47424282d1c388ee424044ee18ef7c1f5714e552eea5afd6ac99d13b3bd4d7cadd2745aa4b770255e9abe2131339e488485194fd7bb3863f64e2ae6e3f7ce6d0f2037abd4af110380f2d7b76ce870f25f6cfcf2f9024313e21c16432b921e5e7e5cd9f3fffc38f3e0a0f0f0780eacaaa82cb0543860eed024af741b366ceea271c9898d8c0c1bd74212042e4082df6d442bfe743232211b0a8b868f8f0611e460f02a5a4a8f09d59b3548a84402e91fd6bc9b2b83ef10f3a1f722f5e7c2f2363d6ec59a228f9fbfbc7f589e3791eba54d5115191e59131360ee4168f098167812f42c2a45873542c71f575f5442c212101390400042e22b2f7c2556bbf5ef3e5b983fbfffccc5f7ac7f569c30a4c51e43163c7da6cb651a3462362731debc096a22816e4e77b7a79a9d56a77664c34ff981ce16cf63801c7c2676807fc13508d48048880c4a8babadac7d7a731c2dcf666545955e56336ab54ed99a6b8a878fdba7519ef6500de0bfe0e6ca9516ba26362ac56abcbe5e2793e3e21bea16827c7b8e61e8d00183b0e39f7fda8f1e0eaeaaaa3478e6a05c16834c4c5f5f1367b23227218e0efdfbe3a2232180c377ffbedbee71d791cc16030180c06f76f83060f5ebf971f12d3a2a51081d6789fd0ad5ba5e92347180d46a7cb79f9f2e5d3a74f190cc6debd7bfbf8f8b8c3a02d88870e1eb2dbede1e1618c88732bc1cea06c4dbd2223c5e031d72b7745fbd91a8f4686ce7af0086cc966b7370882000882202425250180c3e1b0582ce7cf9f43e44c2653cf9ec17e7e7e2ab51a5bb81511870c1db269e346b3d97cf8d0218ee3ff949868f2f26c7c832ed175cbf5698fc7d667868b9b82c54dc1e2a65047ee76c664c6a4669e4bb9b935d5771f28ce18b359add7ae5e3b987370e58a954e67abc1dc6eb74f1c3fa1a2a2e28fcee391bd22474c9dbff9b88648e5b6255cfd5272d623f0f74cde2b2a3737f781e28868301aa3a2a2789e1ff5f8688db6d5857ffbf6ede39e1ce7ffbbf0edce0666fc84f1f5612ffcdf3983023c12f0ae7c7666b5a2b818317773d7e975665f9ffcbcbc079ee07038f6ecc98a888c88080f6f2a364444d9d9d9c78e1e7dfa99675a8641a3d2eecc90402e876bd9f265c61b6b9eeb2f695412122747bda94df90f5069b9a6f9d562b1582c96a4a4a4c01e3ddcd9ef743a2f5dccada9ad1dfcc860bd5edf7ca024bb7edef5d30f3fecfc78d1c2df1bb29b28dd244b72e6faf527bf5f34f331ea15e004e258c0b37cda4cdee8cb71bcdb48b22c5fbb7aadacac0c001041a3d1c627c47b7b7bb77ce192a2a2d5ab560a7a8f1933677879793d50d70350daac36cb754b484888afaf6f9b1065292b6bcffaa50b464434c8242b0423e3a45efe32aafda0cf5baa98919cda88edcd93208ae2d5ab57b37efef9c4f113b35e9f3d60e00015df66c1b91f654d4dcd8c7fbe3678f0e0ec9cec050b3e0c8f8cf8bd12bbc3b17cf932ddb575cf0d94f41a1981aca266cb696d2f3353907a18e5c0803053d2342162201afd794e0d0004c01466b35aabaaaa7efbed665e5edece9d3b939392c78e1b9b92922ae884b6f03d0025117dbb654b6050d0d0a1438b8b8b3ffc60c1d2e5cb044168c9505555b9e083058f68f73e91e8e4400240f70ee3178b6944948d90ea1c7c598da6aa0165c66ea91e2da8d1c98a5c5d5d6db96631799a5253531f8a8b8b8d8d8d8e8af6f6f66ea7c8b787f2e5692f2f5cb4d0d3d31300366fdeecede5356af46877d211d189e3c717bfffe6ec217792434504f7a68580b86b553a605c4c80adf5e19cccb8ed173447ea87cd9b37cfdbc7acd56a398e2322a628a228e9f43a68ba41b64fad2a1163aca2a2dc686cec7863c78eddb469536d6dad7baa282828d8fcd10bcb9f2a4f0e752088001c01cf80bb50e66175a8a3039c0400c03155b0c299093824e479f9d924a9aff6c8f193c7049dc0f33c63ecf0a143cf4c183f6178e2f2e5cb1d7647676cd90a2587a8d7eb15b9f12661341a5f9a366dc3860deec1efdcb9735307336f9d138101a0c23897a2da97efe9ab6329a1560485d4a1f2e0adfca41cf5c4c390f6b5224423f1846c725fe781ccf74e9d3c595656b6e4f32587be7a69e5f86b3b5e43bf92951b32333b53645a5775c4f8f8f8db776e133122225206f44fa9afaf3e78308711d3e9740ed73dfeeb959aad678521b10dc1e60600460038e40b21348de7054e6b5247a5c3c8b5a5f65e771d2a1d2fcf1b27ee5931f58397862558d7bc314a32eb1c6a14c73dacfcf8edfa66a3b443ad921f11070e1c78fedcb9e09e8172d57576ea63b4e6be12a69bfbf10ea62c8e898dc9cec27e918dcc3101ceaa0695d521e83d6c0040a0e53c4300386cbacba84d2117f0b151bab504e46370cd1d4d483c92428d8148b7eb20b24f0aafe2a123babf43f6ed9bb66debb6fa7a1be56fe2ebf671ca6d135fb26092786cddab6b56adde7642b68a3af7c602810d8cb49db98912530100074e567484dcdb400000282f2d9ff759e68fe738061c122001804c0800c480af6e30ccdfad7d75faab1d4284dfcf901aadc6cfcf6fe70f3fa67a97f24e0b00208056250f8ca6086d89a7075a4575946fe3d083400126bc5aa609f4120100ee9ca95627683d03799e932479d1c28573de7c33b7da5c6ac98b0b541015778527e0cfffa679779fff6b19cb131f7e98ebc446f8011c03070df2f5f55db6fda05dd212708084c038906303ec2f0e76987570dbaa25002415219ab4acded5683c64b7b5c7ffbe6fdb3a5966dbb76f8f8e89e9d7afffcc19332da629dbce0b2e45279326bfdc30ef47cdcf0d5396acd9d637ad5f6720425b7d9c3165ef9ebd998bfff58f41b6d450d20b7624cebd1527c09faf98e2fd95501f9743d4ecc983a4308a303b9a1c8d77edda8db79eaa7240c67bef69750202389cf66d5bb77ebd7a9522ba463df9f4f809e3e2e2e2bbf4e9adbddbc6ed8a8aacacacefbec94cf32bef13cc7c3d50af2559c13b7655a827dda9079d961e0ac263d770488cd343909a23b2b456fff6deb085cbd7f60c0d6dbe99499204001a8da62d75dd41494465e56517cf5f946585a1b27ac5ea9b16cbd461fc5329d0d3530494110800013889605f9ec723d1a249b037ca025ebf63f8e068dc672b560504047403566751161717bff5f2a4bf25db45593a598883a2212592fc0d323436c6263cc097d66abfc851d53b69fe04c9a87535f7bbdc32c38abcfe8b3efbccece3d3b94f115d47f9fdf7dffbe5cfed17e902604808a80030000e0919327749ac750abb2ee2af9529b3fffb8dbadaba5d4b5f99379e0c2a7be33a0eb8d32586ccc2811f7ff249cb3b6537a8cd1056f32a02852319410194a1d1bfc49010f86abbe1bb33fafffc2ec46fe4a76bd7ad4f4e4a1e366cd8632f2e5e92c5898a1a9a0a6a5a98f5f9882373df7ab3aaaaeadf8232223222af9463ad2e2c7c83a4bf784bfbe901ddf4ddb15e23177fb3fd87314f8cd10a5a0040c4c7468f8a9b90b126479049d3eca07e110dcf851f7c73ce9caaaa2ac688809ada6f176684363dee7239a74e9eb472dc15a3b671977cb5d2f47536a962c64cfecb94c43e092ab5eaf7972e5996bffce24b75dee7cf0d76f1f7be50e1855bfa8c03c13aa3a9bcb43c242c2cbc57587252dffefdfb87848474e6e6d6762522d8b57bb72367cef8e40600402002bc5963585cf0e8e74b97b6b9eb21122569d5ca5546cbeabf0e70f2a80028004080754e0dcfa9551c272952bd1daf5571db4ee2e3ff983f71e244f78eb21d946d97568411e9e95977524a6b748d5f3f00c3bd6d7eb5bfdcba75ff1ea78514aad5eae9d35f75c4bebce1b84a26bee930f2125c1e1a9b4e556fd23a82cd0de951f62553c4b35be65ebe9c47ed426c1725804eaf7bfb9d790bb2847a978e8003501860ef602c2f2f6f470a11556ad5b4575e91e35efbeab046665a028edc509b79080949c7c9e352b94bb9973a7479076d2a2a26fad9598b327660a54d20d0d824e1f06508eed9b3a36351ad56bf346d9abeefeb4bb3b9d21a8d5dd428e09e9f5a2cc29054088acc3afcff8fb6e2929a4f648c9d3d73f69305ef476a6e5daed4fcd7dcf7d3d3477472aa5218cbdafdd3899327732f5c902aaef60a821e5e2ab34ed4a91191ab7570476fe8df5dba213ee101abe18e51ca8a4bc56b5b3e713a9d15e5653ebe7e1e468f26fc5d202272389cf5d63a6b7dbdd3e172381d406430ea838282bdbcbc3b4cf3ff079bccaf3dffd5a2a70000000049454e44ae426082, '21232f297a57a5a743894a0e4a801fc3', 5);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `beer`
--
ALTER TABLE `beer`
  ADD PRIMARY KEY (`ID_beer`),
  ADD KEY `ID_category` (`ID_category`),
  ADD KEY `ID_color` (`ID_color`),
  ADD KEY `ID_taste` (`ID_taste`),
  ADD KEY `ID_hops` (`ID_hops`),
  ADD KEY `ID_grains` (`ID_grains`);

--
-- Indexes for table `beer_user`
--
ALTER TABLE `beer_user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_beer` (`ID_beer`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_category`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`ID_color`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_beer` (`ID_beer`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_followed` (`ID_followed`);

--
-- Indexes for table `grains`
--
ALTER TABLE `grains`
  ADD PRIMARY KEY (`ID_grains`);

--
-- Indexes for table `hops`
--
ALTER TABLE `hops`
  ADD PRIMARY KEY (`ID_hops`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`ID_rank`);

--
-- Indexes for table `taste`
--
ALTER TABLE `taste`
  ADD PRIMARY KEY (`ID_taste`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `ID_rank` (`ID_rank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beer`
--
ALTER TABLE `beer`
  MODIFY `ID_beer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beer_user`
--
ALTER TABLE `beer_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `ID_color` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grains`
--
ALTER TABLE `grains`
  MODIFY `ID_grains` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hops`
--
ALTER TABLE `hops`
  MODIFY `ID_hops` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `ID_rank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taste`
--
ALTER TABLE `taste`
  MODIFY `ID_taste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beer`
--
ALTER TABLE `beer`
  ADD CONSTRAINT `beer_ibfk_1` FOREIGN KEY (`ID_category`) REFERENCES `category` (`ID_category`),
  ADD CONSTRAINT `beer_ibfk_2` FOREIGN KEY (`ID_color`) REFERENCES `color` (`ID_color`),
  ADD CONSTRAINT `beer_ibfk_3` FOREIGN KEY (`ID_taste`) REFERENCES `taste` (`ID_taste`),
  ADD CONSTRAINT `beer_ibfk_4` FOREIGN KEY (`ID_hops`) REFERENCES `hops` (`ID_hops`),
  ADD CONSTRAINT `beer_ibfk_5` FOREIGN KEY (`ID_grains`) REFERENCES `grains` (`ID_grains`);

--
-- Constraints for table `beer_user`
--
ALTER TABLE `beer_user`
  ADD CONSTRAINT `beer_user_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`),
  ADD CONSTRAINT `beer_user_ibfk_2` FOREIGN KEY (`ID_beer`) REFERENCES `beer` (`ID_beer`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ID_beer`) REFERENCES `beer` (`ID_beer`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`ID_followed`) REFERENCES `user` (`ID_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_rank`) REFERENCES `rank` (`ID_rank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
