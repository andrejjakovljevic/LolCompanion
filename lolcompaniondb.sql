-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2021 at 12:00 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `builds`
--

INSERT INTO `builds` (`iditem1`, `iditem2`, `iditem3`, `idchamp`, `winrate`, `lane`, `perk0`, `perk1`, `perk2`, `perk3`, `perk4`, `perk5`, `attrperk0`, `attrperk1`, `attrperk2`, `id`, `iditem4`, `iditem5`, `iditem6`) VALUES
(3850, 2003, 4642, 267, 55.6, 'Support', 8214, 8226, 8210, 8237, 8345, 8347, 5008, 5008, 5002, 1, 3853, 3158, 3011),
(1056, 2003, 3802, 61, 52.2, 'Mid', 8230, 8226, 8210, 8237, 8345, 8352, 5005, 5008, 5003, 2, 3020, 3003, 3157),
(1039, 2031, 3802, 25, 55.7, 'Jungle', 8128, 8126, 8138, 8135, 8210, 8232, 5008, 5008, 5002, 3, 3020, 3157, 4637),
(1039, 2031, 6660, 32, 55.1, 'Jungle', 8010, 9111, 9105, 8299, 8126, 8135, 5005, 5008, 5002, 4, 3047, 3075, 3001),
(1056, 2003, 3802, 34, 54.9, 'Mid', 8112, 8126, 8138, 8105, 8009, 8014, 5008, 5008, 5003, 5, 3020, 3157, 3003),
(3850, 2003, 3158, 432, 54.8, 'Support', 8465, 8463, 8473, 8453, 8136, 8105, 5008, 5008, 5002, 6, 3853, 4629, 3110),
(1054, 2003, 1037, 266, 57.3, 'Top', 8010, 9111, 9105, 8299, 8473, 8453, 5008, 5008, 5002, 7, 3047, 3053, 6333),
(2033, 3116, 3020, 136, 58.5, 'Mid', 8112, 8139, 8138, 8105, 8345, 8352, 5005, 5008, 5003, 8, 3157, 3165, 3041);

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
('GINDRA', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72', 'gindroni@nudle.etf', 1622757428, 0);

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

--
-- Dumping data for table `plays`
--

INSERT INTO `plays` (`summonername`, `idchamp`, `games_won`, `games_played`) VALUES
('GINDRA', 61, 1, 1),
('GINDRA', 268, 1, 1),
('GINDRA', 34, 0, 1),
('GINDRA', 58, 1, 1),
('GINDRA', 85, 0, 1),
('GINDRA', 8, 3, 5),
('GINDRA', 427, 0, 1),
('GINDRA', 517, 1, 1),
('GINDRA', 127, 0, 1),
('GINDRA', 25, 0, 1),
('GINDRA', 10, 1, 3),
('GINDRA', 33, 0, 1),
('GINDRA', 2, 0, 2),
('GINDRA', 15, 0, 1),
('GINDRA', 412, 6, 11),
('GINDRA', 41, 5, 8),
('GINDRA', 150, 15, 26),
('GINDRA', 120, 2, 2),
('GINDRA', 126, 0, 1),
('GINDRA', 27, 2, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`questId`, `description`, `title`, `image`) VALUES
(23, 'Welcome! It\'s time to get started. Get your first kill!', 'Newbie', 'https://i.pinimg.com/236x/ea/a6/68/eaa668ece7e463e23e42db4c9bab09b2.jpg'),
(26, 'It\'s time to learn how to farm. Last hit those minions and clear that jungle as much as possible!', 'Learn to farm', 'https://i.pinimg.com/originals/85/bd/d1/85bdd1c465ac4422c217ca5456998c88.jpg'),
(27, 'Time to get serious about that farm.', 'Farmville', 'https://i.pinimg.com/originals/85/bd/d1/85bdd1c465ac4422c217ca5456998c88.jpg'),
(28, 'Deal some damage!', 'Damage dealer', 'https://static.wikia.nocookie.net/leagueoflegends/images/4/46/Blood_Moon_Twisted_Fate_profileicon.png/revision/latest?cb=20170505005916'),
(29, 'Put those carry pants on and carry the team from the mid lane!', 'Midlane carry', 'https://static.wikia.nocookie.net/leagueoflegends/images/1/1c/Pengu_Featherknight_profileicon.png/revision/latest?cb=20190614211501'),
(30, 'Become a midlane god.', 'Literally Chovy', 'https://i.redd.it/ztyw50b44hy51.jpg'),
(31, 'Destroy the first tower of the game.', 'First tower', 'https://i.ytimg.com/vi/iFIp2UOvT9E/maxresdefault.jpg'),
(33, 'The urge for killing rises. Ruthlessly slay your foes in battle.', 'Bloodthirster', 'https://cdnb.artstation.com/p/assets/images/images/026/072/753/large/hannah-hilton-bloodthirster.jpg?1587790038'),
(34, 'Minions and monsters are no longer enough for you. Time to farm some champions.', 'Farming champions', 'https://pbs.twimg.com/media/Ea41dsqX0AA09__.jpg'),
(35, 'Start earning some money for your items.', 'Start earning', 'https://static.wikia.nocookie.net/leagueoflegends/images/5/50/Essence_Poro_Tier_2_Emote.png/revision/latest/scale-to-width-down/250?cb=20181207222233'),
(36, 'Time to start earning some serious money.', 'Money money', 'https://i.pinimg.com/originals/da/4b/77/da4b77747065bfe9ce629314c55df47c.jpg'),
(37, 'Get a double kill!', 'Double kill!', 'https://static1-www.millenium.gg/articles/2/83/82/@/89706-1197099-em-rewards-ranked-tft-gold2019-inventory-full-1-article_m-1.png'),
(38, 'Get a triple kill now!', 'Triple kill!', 'https://static1-www.millenium.gg/articles/2/83/82/@/89706-1197099-em-rewards-ranked-tft-gold2019-inventory-full-1-article_m-1.png'),
(39, 'Wooow a quadra kill :O', 'Quadra kill!', 'https://static1-www.millenium.gg/articles/2/83/82/@/89706-1197099-em-rewards-ranked-tft-gold2019-inventory-full-1-article_m-1.png'),
(40, 'Penta kill o m g :O :D', 'Penta kill!', 'https://static1-www.millenium.gg/articles/2/83/82/@/89706-1197099-em-rewards-ranked-tft-gold2019-inventory-full-1-article_m-1.png'),
(41, 'Now that you have ascended and become a god it is time to play Xin Top.', 'Xin top supremacy', 'https://www.mobafire.com/images/avatars/xin-zhao-classic.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questattributes`
--

INSERT INTO `questattributes` (`attributeId`, `questId`, `attributeKey`, `attributeValue`) VALUES
(44, 23, 'champion', ''),
(45, 23, 'role', 'Any'),
(46, 23, 'Kills', '1'),
(53, 26, 'champion', ''),
(54, 26, 'role', 'Any'),
(55, 26, 'Prerequisite Id', '23'),
(56, 26, 'Cs per minute', '6.5'),
(57, 27, 'champion', ''),
(58, 27, 'role', 'Any'),
(59, 27, 'Prerequisite Id', '26'),
(60, 27, 'Cs per minute', '8'),
(61, 28, 'champion', ''),
(62, 28, 'role', 'Any'),
(63, 28, 'Dmg per minute', '400'),
(64, 28, 'Prerequisite Id', '23'),
(65, 29, 'champion', ''),
(66, 29, 'role', 'Mid'),
(67, 29, 'Prerequisite Id', '28'),
(68, 29, 'Prerequisite Id', '26'),
(69, 29, 'Dmg per minute', '500'),
(70, 29, 'Kills', '6'),
(71, 30, 'champion', ''),
(72, 30, 'role', 'Mid'),
(73, 30, 'Prerequisite Id', '27'),
(74, 30, 'Prerequisite Id', '29'),
(75, 30, 'Cs per minute', '10'),
(76, 30, 'Dmg per minute', '500'),
(77, 31, 'champion', ''),
(78, 31, 'role', 'Any'),
(79, 31, 'First turret', 'true'),
(80, 31, 'Prerequisite Id', '23'),
(85, 33, 'champion', ''),
(86, 33, 'role', 'Any'),
(87, 33, 'Prerequisite Id', '23'),
(88, 33, 'First blood', 'true'),
(89, 33, 'Kills', '6'),
(90, 34, 'champion', ''),
(91, 34, 'role', 'Any'),
(92, 34, 'Prerequisite Id', '33'),
(93, 34, 'Kills', '10'),
(94, 34, 'Multikill', '3'),
(95, 35, 'champion', ''),
(96, 35, 'role', 'Any'),
(97, 35, 'Prerequisite Id', '23'),
(98, 35, 'Gold per minute', '350'),
(99, 36, 'champion', ''),
(100, 36, 'role', 'Any'),
(101, 36, 'Prerequisite Id', '35'),
(102, 36, 'Gold per minute', '400'),
(103, 37, 'champion', ''),
(104, 37, 'role', 'Any'),
(105, 37, 'Prerequisite Id', '23'),
(106, 37, 'Multikill', '2'),
(107, 38, 'champion', ''),
(108, 38, 'role', 'Any'),
(109, 38, 'Prerequisite Id', '37'),
(110, 38, 'Multikill', '3'),
(111, 39, 'champion', ''),
(112, 39, 'role', 'Any'),
(113, 39, 'Prerequisite Id', '38'),
(114, 39, 'Multikill', '4'),
(115, 40, 'champion', ''),
(116, 40, 'role', 'Any'),
(117, 40, 'Prerequisite Id', '39'),
(118, 40, 'Multikill', '5'),
(119, 41, 'champion', 'Xin Zhao'),
(120, 41, 'role', 'Top'),
(121, 41, 'Prerequisite Id', '30'),
(122, 41, 'Prerequisite Id', '34'),
(123, 41, 'Prerequisite Id', '36'),
(124, 41, 'Prerequisite Id', '40'),
(125, 41, 'First blood', 'true'),
(126, 41, 'First turret', 'true'),
(127, 41, 'Kills', '12');

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
-- Dumping data for table `userquest`
--

INSERT INTO `userquest` (`summonerName`, `questId`, `completed`) VALUES
('GINDRA', 23, 0),
('GINDRA', 26, 0),
('GINDRA', 27, 0),
('GINDRA', 28, 0),
('GINDRA', 29, 0),
('GINDRA', 30, 0),
('GINDRA', 31, 0),
('GINDRA', 33, 0),
('GINDRA', 34, 0),
('GINDRA', 35, 0),
('GINDRA', 36, 0),
('GINDRA', 37, 0),
('GINDRA', 38, 0),
('GINDRA', 39, 0),
('GINDRA', 40, 0),
('GINDRA', 41, 0);

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
