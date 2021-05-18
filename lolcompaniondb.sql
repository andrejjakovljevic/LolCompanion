-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2021 at 03:10 PM
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
  `idchamp` int(11) NOT NULL,
  `winrate` double NOT NULL,
  `lane` varchar(45) NOT NULL,
  `perk0` int(11) DEFAULT NULL,
  `perk1` int(11) DEFAULT NULL,
  `perk2` int(11) DEFAULT NULL,
  `perk3` int(11) DEFAULT NULL,
  `perk4` int(11) DEFAULT NULL,
  `perk5` int(11) DEFAULT NULL,
  `attrperk0` int(11) DEFAULT NULL,
  `attrperk1` int(11) DEFAULT NULL,
  `attrperk2` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iditem4` int(11) DEFAULT NULL,
  `iditem5` int(11) DEFAULT NULL,
  `iditem6` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idchamps_idx` (`idchamp`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `builds`
--

INSERT INTO `builds` (`iditem1`, `iditem2`, `iditem3`, `idchamp`, `winrate`, `lane`, `perk0`, `perk1`, `perk2`, `perk3`, `perk4`, `perk5`, `attrperk0`, `attrperk1`, `attrperk2`, `id`, `iditem4`, `iditem5`, `iditem6`) VALUES
(1036, 2031, 3134, 246, 54.2, 'Mid', 8112, 8143, 8138, 8135, 8345, 8347, 5008, 5008, 5003, 1, 3158, 6695, 6694),
(3850, 2003, 3802, 50, 48.3, 'Support', 8112, 8126, 8138, 8106, 8313, 8345, 5008, 5008, 5002, 2, 3853, 3020, 3157),
(3070, 2003, 3802, 69, 49.2, 'Mid', 8010, 8009, 9105, 8014, 8139, 8135, 5008, 5008, 5003, 3, 3003, 3157, 3116),
(1039, 2031, 6029, 141, 57.6, 'Jungle', 8010, 9111, 9105, 8299, 8143, 8135, 5008, 5008, 5002, 4, 3047, 3071, 3053),
(3858, 2003, 3117, 12, 53.1, 'Support', 8439, 8446, 8429, 8451, 8345, 8347, 5007, 5002, 5001, 5, 3860, 3050, 3109),
(1055, 2003, 6670, 523, 46.2, 'Bot', 8010, 8009, 9103, 8014, 8139, 8135, 5005, 5008, 5002, 6, 3006, 3085, 3031),
(1054, 2003, 6660, 31, 54.7, 'Top', 8437, 8446, 8429, 8451, 9111, 9105, 5005, 5008, 5002, 7, 3047, 3075, 3193),
(1056, 2003, 3145, 518, 53.9, 'Mid', 8112, 8139, 8138, 8135, 8226, 8237, 5005, 5008, 5003, 8, 3020, 3157, 3165),
(1056, 2003, 3802, 268, 52.2, 'Mid', 8008, 8009, 9104, 8014, 8226, 8210, 5005, 5008, 5003, 9, 3020, 3115, 3157),
(3850, 2003, 4642, 57, 54.2, 'Support', 8229, 8226, 8210, 8237, 8304, 8345, 5008, 5008, 5002, 10, 3853, 3020, 4637),
(1055, 2003, 3134, 110, 49.9, 'Bot', 9923, 8139, 8138, 8135, 8345, 8347, 5005, 5008, 5002, 11, 3158, 3004, 6694),
(3850, 2003, 4642, 350, 52.4, 'Support', 8214, 8226, 8210, 8237, 8009, 8017, 5008, 5008, 5002, 12, 3853, 6616, 3504),
(1039, 2031, 6660, 72, 60.5, 'Jungle', 8230, 8275, 8234, 8232, 8304, 8347, 5005, 5008, 5002, 13, 3158, 3742, 4401),
(1039, 2031, 3330, 9, 55.4, 'Jungle', 8112, 8126, 8138, 8106, 8313, 8347, 5008, 5008, 5002, 14, 3020, 3157, 3165),
(1056, 2003, 3802, 34, 55.6, 'Mid', 8112, 8126, 8138, 8105, 8009, 8014, 5008, 5008, 5003, 15, 3020, 3157, 3003),
(1055, 2003, 6670, 51, 52.1, 'Bot', 8021, 8009, 9103, 8014, 8139, 8135, 5005, 5008, 5002, 16, 3006, 3095, 3094),
(1056, 2003, 3802, 1, 55.9, 'Mid', 8112, 8126, 8138, 8105, 8226, 8237, 5008, 5008, 5003, 17, 3020, 3157, 3165),
(3850, 2003, 4642, 267, 54.6, 'Support', 8214, 8226, 8210, 8237, 8345, 8347, 5008, 5008, 5002, 18, 3853, 3158, 3011),
(1055, 2003, 1037, 122, 57.6, 'Top', 8010, 9111, 9105, 8299, 8473, 8242, 5005, 5008, 5002, 19, 3047, 3053, 3742),
(1039, 2031, 6660, 32, 57.7, 'Jungle', 8010, 9111, 9105, 8299, 8126, 8135, 5005, 5008, 5002, 20, 3047, 3075, 3001);

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
('api', 'RGAPI-15966e6c-4e1d-4880-827e-dffbacbe3836');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `summonerName` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastGamePlayed` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`summonerName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`summonerName`, `password`, `email`, `lastGamePlayed`, `role`) VALUES
('GINDRA', '123', 'gindra@gindra.ac.bg.rs', NULL, 0),
('Sensei God', '123', 'andrej@andrej.ec.bf.rs', NULL, 0),
('wdaw', '123', 'a@a.a', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

DROP TABLE IF EXISTS `plays`;
CREATE TABLE IF NOT EXISTS `plays` (
  `summonername` varchar(40) NOT NULL,
  `idchamp` int(11) NOT NULL,
  `games_won` int(11) NOT NULL,
  `games_played` int(11) NOT NULL,
  KEY `fk_korisnik_idx` (`summonername`),
  KEY `fk_champion_idx` (`idchamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

DROP TABLE IF EXISTS `quest`;
CREATE TABLE IF NOT EXISTS `quest` (
  `questId` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`questId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`questId`, `description`, `title`, `image`) VALUES
(1, 'The first quest is a very good quest. Play Xin top.', 'The First Questic', '../slike/dummyQuestPic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questattributes`
--

DROP TABLE IF EXISTS `questattributes`;
CREATE TABLE IF NOT EXISTS `questattributes` (
  `attributeId` int(11) NOT NULL AUTO_INCREMENT,
  `questId` int(11) NOT NULL,
  `attributeKey` varchar(50) NOT NULL,
  `attributeValue` varchar(50) NOT NULL,
  PRIMARY KEY (`attributeId`),
  KEY `fk_quest_idx` (`questId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  KEY `fk_quest_quest_idx` (`questId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `fk_champion` FOREIGN KEY (`idchamp`) REFERENCES `champions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `fk_champ` FOREIGN KEY (`idchamp`) REFERENCES `champions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_summoner` FOREIGN KEY (`summonername`) REFERENCES `korisnik` (`summonerName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questattributes`
--
ALTER TABLE `questattributes`
  ADD CONSTRAINT `fk_quest` FOREIGN KEY (`questId`) REFERENCES `quest` (`questId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userquest`
--
ALTER TABLE `userquest`
  ADD CONSTRAINT `fk_quest_quest` FOREIGN KEY (`questId`) REFERENCES `quest` (`questId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_summoner_quest` FOREIGN KEY (`summonerName`) REFERENCES `korisnik` (`summonerName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
