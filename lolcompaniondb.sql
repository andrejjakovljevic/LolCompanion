-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2021 at 10:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lolcompaniondb`
--
CREATE DATABASE IF NOT EXISTS `lolcompaniondb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lolcompaniondb`;

-- --------------------------------------------------------

--
-- Table structure for table `builds`
--

DROP TABLE IF EXISTS `builds`;
CREATE TABLE IF NOT EXISTS `builds` (
  `iditem1` int(11) NOT NULL,
  `iditem2` int(11) DEFAULT NULL,
  `iditem3` int(11) DEFAULT NULL,
  `idhchamp` int(11) DEFAULT NULL,
  `winrate` double DEFAULT NULL,
  `pickrate` double DEFAULT NULL,
  `lane` varchar(45) DEFAULT NULL,
  KEY `iditems_idx` (`iditem1`),
  KEY `fk2_iditems_idx` (`iditem2`),
  KEY `fk3_iditems_idx` (`iditem3`),
  KEY `fk_idchamps_idx` (`idhchamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `champions`
--

DROP TABLE IF EXISTS `champions`;
CREATE TABLE IF NOT EXISTS `champions` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `champions`
--

INSERT INTO `champions` (`id`, `name`) VALUES
(266, 'Aatrox'),
(103, 'Ahri'),
(84, 'Akali'),
(12, 'Alistar'),
(32, 'Amumu'),
(34, 'Anivia'),
(1, 'Annie'),
(523, 'Aphelios'),
(22, 'Ashe'),
(136, 'Aurelion Sol'),
(268, 'Azir'),
(432, 'Bard'),
(53, 'Blitzcrank'),
(63, 'Brand'),
(201, 'Braum'),
(51, 'Caitlyn'),
(164, 'Camille'),
(69, 'Cassiopeia'),
(31, 'Cho\'Gath'),
(42, 'Corki'),
(122, 'Darius'),
(131, 'Diana'),
(119, 'Draven'),
(36, 'Dr. Mundo'),
(245, 'Ekko'),
(60, 'Elise'),
(28, 'Evelynn'),
(81, 'Ezreal'),
(9, 'Fiddlesticks'),
(114, 'Fiora'),
(105, 'Fizz'),
(3, 'Galio'),
(41, 'Gangplank'),
(86, 'Garen'),
(150, 'Gnar'),
(79, 'Gragas'),
(104, 'Graves'),
(887, 'Gwen'),
(120, 'Hecarim'),
(74, 'Heimerdinger'),
(420, 'Illaoi'),
(39, 'Irelia'),
(427, 'Ivern'),
(40, 'Janna'),
(59, 'Jarvan IV'),
(24, 'Jax'),
(126, 'Jayce'),
(202, 'Jhin'),
(222, 'Jinx'),
(145, 'Kai\'Sa'),
(429, 'Kalista'),
(43, 'Karma'),
(30, 'Karthus'),
(38, 'Kassadin'),
(55, 'Katarina'),
(10, 'Kayle'),
(141, 'Kayn'),
(85, 'Kennen'),
(121, 'Kha\'Zix'),
(203, 'Kindred'),
(240, 'Kled'),
(96, 'Kog\'Maw'),
(7, 'LeBlanc'),
(64, 'Lee Sin'),
(89, 'Leona'),
(876, 'Lillia'),
(127, 'Lissandra'),
(236, 'Lucian'),
(117, 'Lulu'),
(99, 'Lux'),
(54, 'Malphite'),
(90, 'Malzahar'),
(57, 'Maokai'),
(11, 'Master Yi'),
(21, 'Miss Fortune'),
(62, 'Wukong'),
(82, 'Mordekaiser'),
(25, 'Morgana'),
(267, 'Nami'),
(75, 'Nasus'),
(111, 'Nautilus'),
(518, 'Neeko'),
(76, 'Nidalee'),
(56, 'Nocturne'),
(20, 'Nunu & Willump'),
(2, 'Olaf'),
(61, 'Orianna'),
(516, 'Ornn'),
(80, 'Pantheon'),
(78, 'Poppy'),
(555, 'Pyke'),
(246, 'Qiyana'),
(133, 'Quinn'),
(497, 'Rakan'),
(33, 'Rammus'),
(421, 'Rek\'Sai'),
(526, 'Rell'),
(58, 'Renekton'),
(107, 'Rengar'),
(92, 'Riven'),
(68, 'Rumble'),
(13, 'Ryze'),
(360, 'Samira'),
(113, 'Sejuani'),
(235, 'Senna'),
(147, 'Seraphine'),
(875, 'Sett'),
(35, 'Shaco'),
(98, 'Shen'),
(102, 'Shyvana'),
(27, 'Singed'),
(14, 'Sion'),
(15, 'Sivir'),
(72, 'Skarner'),
(37, 'Sona'),
(16, 'Soraka'),
(50, 'Swain'),
(517, 'Sylas'),
(134, 'Syndra'),
(223, 'Tahm Kench'),
(163, 'Taliyah'),
(91, 'Talon'),
(44, 'Taric'),
(17, 'Teemo'),
(412, 'Thresh'),
(18, 'Tristana'),
(48, 'Trundle'),
(23, 'Tryndamere'),
(4, 'Twisted Fate'),
(29, 'Twitch'),
(77, 'Udyr'),
(6, 'Urgot'),
(110, 'Varus'),
(67, 'Vayne'),
(45, 'Veigar'),
(161, 'Vel\'Koz'),
(254, 'Vi'),
(234, 'Viego'),
(112, 'Viktor'),
(8, 'Vladimir'),
(106, 'Volibear'),
(19, 'Warwick'),
(498, 'Xayah'),
(101, 'Xerath'),
(5, 'Xin Zhao'),
(157, 'Yasuo'),
(777, 'Yone'),
(83, 'Yorick'),
(350, 'Yuumi'),
(154, 'Zac'),
(238, 'Zed'),
(115, 'Ziggs'),
(26, 'Zilean'),
(142, 'Zoe'),
(143, 'Zyra');

-- --------------------------------------------------------

--
-- Table structure for table `global`
--

DROP TABLE IF EXISTS `global`;
CREATE TABLE IF NOT EXISTS `global` (
  `name` varchar(30) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global`
--

INSERT INTO `global` (`name`, `value`) VALUES
('api', 'RGAPI-24b0644f-6f97-483d-99d0-ed2e9322be96');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `summonerName` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`summonerName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`summonerName`, `password`, `email`, `role`) VALUES
('GINDRA', '123', 'gindra@gindra.ac.bg.rs', 0),
('Sensei God', '123', 'andrej@andrej.ec.bf.rs', 0),
('wdaw', '123', 'a@a.a', 2);

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

DROP TABLE IF EXISTS `plays`;
CREATE TABLE IF NOT EXISTS `plays` (
  `summonername` varchar(40) NOT NULL,
  `idchamp` int(11) NOT NULL,
  `winrate` double NOT NULL,
  `games_played` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL,
  KEY `fk_korisnik_idx` (`summonername`),
  KEY `fk_champion_idx` (`idchamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

DROP TABLE IF EXISTS `quest`;
CREATE TABLE IF NOT EXISTS `quest` (
  `questId` int(11) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`questId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`questId`, `description`, `title`, `image`) VALUES
(0, 'The first quest is a very good quest. Play Xin top.', 'The First Questic', '../slike/dummyQuestPic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userquest`
--

DROP TABLE IF EXISTS `userquest`;
CREATE TABLE IF NOT EXISTS `userquest` (
  `summonerName` varchar(40) NOT NULL,
  `questId` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  PRIMARY KEY (`questId`,`summonerName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userquest`
--

INSERT INTO `userquest` (`summonerName`, `questId`, `completed`) VALUES
('GINDRA', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
