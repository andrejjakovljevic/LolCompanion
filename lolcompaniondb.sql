-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2021 at 01:46 PM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
