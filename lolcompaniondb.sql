-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2021 at 01:00 PM
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
  `iditem1` int(11) DEFAULT NULL,
  `iditem2` int(11) DEFAULT NULL,
  `iditem3` int(11) DEFAULT NULL,
  `idhchamp` int(11) NOT NULL,
  `winrate` double NOT NULL,
  `pickrate` double NOT NULL,
  `lane` varchar(45) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iditems_idx` (`iditem1`),
  KEY `fk2_iditems_idx` (`iditem2`),
  KEY `fk3_iditems_idx` (`iditem3`),
  KEY `fk_idchamps_idx` (`idhchamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `champions`
--

DROP TABLE IF EXISTS `champions`;
CREATE TABLE IF NOT EXISTS `champions` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `champions`
--

INSERT INTO `champions` (`id`, `name`) VALUES
(1, 'Annie'),
(2, 'Olaf'),
(3, 'Galio'),
(4, 'Twisted Fate'),
(5, 'Xin Zhao'),
(6, 'Urgot'),
(7, 'LeBlanc'),
(8, 'Vladimir'),
(9, 'Fiddlesticks'),
(10, 'Kayle'),
(11, 'Master Yi'),
(12, 'Alistar'),
(13, 'Ryze'),
(14, 'Sion'),
(15, 'Sivir'),
(16, 'Soraka'),
(17, 'Teemo'),
(18, 'Tristana'),
(19, 'Warwick'),
(20, 'Nunu & Willump'),
(21, 'Miss Fortune'),
(22, 'Ashe'),
(23, 'Tryndamere'),
(24, 'Jax'),
(25, 'Morgana'),
(26, 'Zilean'),
(27, 'Singed'),
(28, 'Evelynn'),
(29, 'Twitch'),
(30, 'Karthus'),
(31, 'Cho\'Gath'),
(32, 'Amumu'),
(33, 'Rammus'),
(34, 'Anivia'),
(35, 'Shaco'),
(36, 'Dr. Mundo'),
(37, 'Sona'),
(38, 'Kassadin'),
(39, 'Irelia'),
(40, 'Janna'),
(41, 'Gangplank'),
(42, 'Corki'),
(43, 'Karma'),
(44, 'Taric'),
(45, 'Veigar'),
(48, 'Trundle'),
(50, 'Swain'),
(51, 'Caitlyn'),
(53, 'Blitzcrank'),
(54, 'Malphite'),
(55, 'Katarina'),
(56, 'Nocturne'),
(57, 'Maokai'),
(58, 'Renekton'),
(59, 'Jarvan IV'),
(60, 'Elise'),
(61, 'Orianna'),
(62, 'Wukong'),
(63, 'Brand'),
(64, 'Lee Sin'),
(67, 'Vayne'),
(68, 'Rumble'),
(69, 'Cassiopeia'),
(72, 'Skarner'),
(74, 'Heimerdinger'),
(75, 'Nasus'),
(76, 'Nidalee'),
(77, 'Udyr'),
(78, 'Poppy'),
(79, 'Gragas'),
(80, 'Pantheon'),
(81, 'Ezreal'),
(82, 'Mordekaiser'),
(83, 'Yorick'),
(84, 'Akali'),
(85, 'Kennen'),
(86, 'Garen'),
(89, 'Leona'),
(90, 'Malzahar'),
(91, 'Talon'),
(92, 'Riven'),
(96, 'Kog\'Maw'),
(98, 'Shen'),
(99, 'Lux'),
(101, 'Xerath'),
(102, 'Shyvana'),
(103, 'Ahri'),
(104, 'Graves'),
(105, 'Fizz'),
(106, 'Volibear'),
(107, 'Rengar'),
(110, 'Varus'),
(111, 'Nautilus'),
(112, 'Viktor'),
(113, 'Sejuani'),
(114, 'Fiora'),
(115, 'Ziggs'),
(117, 'Lulu'),
(119, 'Draven'),
(120, 'Hecarim'),
(121, 'Kha\'Zix'),
(122, 'Darius'),
(126, 'Jayce'),
(127, 'Lissandra'),
(131, 'Diana'),
(133, 'Quinn'),
(134, 'Syndra'),
(136, 'Aurelion Sol'),
(141, 'Kayn'),
(142, 'Zoe'),
(143, 'Zyra'),
(145, 'Kai\'Sa'),
(147, 'Seraphine'),
(150, 'Gnar'),
(154, 'Zac'),
(157, 'Yasuo'),
(161, 'Vel\'Koz'),
(163, 'Taliyah'),
(164, 'Camille'),
(201, 'Braum'),
(202, 'Jhin'),
(203, 'Kindred'),
(222, 'Jinx'),
(223, 'Tahm Kench'),
(234, 'Viego'),
(235, 'Senna'),
(236, 'Lucian'),
(238, 'Zed'),
(240, 'Kled'),
(245, 'Ekko'),
(246, 'Qiyana'),
(254, 'Vi'),
(266, 'Aatrox'),
(267, 'Nami'),
(268, 'Azir'),
(350, 'Yuumi'),
(360, 'Samira'),
(412, 'Thresh'),
(420, 'Illaoi'),
(421, 'Rek\'Sai'),
(427, 'Ivern'),
(429, 'Kalista'),
(432, 'Bard'),
(497, 'Rakan'),
(498, 'Xayah'),
(516, 'Ornn'),
(517, 'Sylas'),
(518, 'Neeko'),
(523, 'Aphelios'),
(526, 'Rell'),
(555, 'Pyke'),
(777, 'Yone'),
(875, 'Sett'),
(876, 'Lillia'),
(887, 'Gwen');

-- --------------------------------------------------------

--
-- Table structure for table `global`
--

DROP TABLE IF EXISTS `global`;
CREATE TABLE IF NOT EXISTS `global` (
  `name` varchar(30) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`questId`, `description`, `title`, `image`) VALUES
(0, 'The first quest is a very good quest. Play Xin top.', 'The First Questic', '../slike/dummyQuestPic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questattributes`
--

DROP TABLE IF EXISTS `questattributes`;
CREATE TABLE IF NOT EXISTS `questattributes` (
  `attributeId` int(11) NOT NULL,
  `questId` int(11) NOT NULL,
  `attributeKey` varchar(50) NOT NULL,
  `attributeValue` varchar(50) NOT NULL,
  PRIMARY KEY (`attributeId`),
  KEY `fk_quest_idx` (`questId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questattributes`
--

INSERT INTO `questattributes` (`attributeId`, `questId`, `attributeKey`, `attributeValue`) VALUES
(0, 0, 'champion', 'Xin Zhao'),
(1, 0, 'role', 'Top'),
(2, 0, 'kills', '5');

-- --------------------------------------------------------

--
-- Table structure for table `userquest`
--

DROP TABLE IF EXISTS `userquest`;
CREATE TABLE IF NOT EXISTS `userquest` (
  `summonerName` varchar(40) NOT NULL,
  `questId` int(11) NOT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`summonerName`,`questId`),
  KEY `fk_summoner_idx` (`summonerName`),
  KEY `fk_quest_idx` (`questId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userquest`
--

INSERT INTO `userquest` (`summonerName`, `questId`, `completed`) VALUES
('GINDRA', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `fk_champion` FOREIGN KEY (`idhchamp`) REFERENCES `champions` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item1` FOREIGN KEY (`iditem1`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item2` FOREIGN KEY (`iditem2`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item3` FOREIGN KEY (`iditem3`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `fk_champ` FOREIGN KEY (`idchamp`) REFERENCES `champions` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_summoner` FOREIGN KEY (`summonername`) REFERENCES `korisnik` (`summonerName`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `questattributes`
--
ALTER TABLE `questattributes`
  ADD CONSTRAINT `fk_quest` FOREIGN KEY (`questId`) REFERENCES `quest` (`questId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `userquest`
--
ALTER TABLE `userquest`
  ADD CONSTRAINT `fk_questquest` FOREIGN KEY (`questId`) REFERENCES `quest` (`questId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sumquest` FOREIGN KEY (`summonerName`) REFERENCES `korisnik` (`summonerName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
