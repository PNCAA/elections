-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2016 at 02:15 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.19-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumni-election`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `identifier` varchar(40) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sex` char(5) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`identifier`, `first_name`, `last_name`, `sex`, `batch`, `facebook`, `linkedin`) VALUES
('0015410a-cf57-3204-01b8-ab8bce266ba0', 'ChhingChhing', 'Hem', 'f', 'WEP2013', 'chhingchhing.hem', 'chhingchhing-hem-00a0a753'),
('003968a7-b6b5-7f40-b9cc-2a3869cff303', 'Hatta', 'Set', 'f', 'WEP2015', 'hattha.set1', 'hattha-set-97689196'),
('003e074e-57eb-f629-bbc8-2143b8cbdd51', 'Sithon', 'Poy', 'f', 'SNA2013', 'poy.sithon', 'sithon-poy-4470aa53'),
('00576ab7-be17-84f4-3a67-f3b0cc84c838', 'Rachana', 'Khe', 'f', 'SNA2012', 'RachanaPinkGirl', 'rachana-khe-9295863b'),
('006e2a81-1e0b-7d9d-1bf4-6a4daf3c4b53', 'Yan', 'Say', 'm', 'WEP2012', 'say.yan.52', 'say-yan-45576453'),
('007d1cc6-9da8-8e4e-e53a-916f04cf9f77', 'Nira', 'Te', 'f', 'SNA2014', 'emtyheartgirl', 'nirate'),
('00c40bdd-5497-3afc-4667-070e1aefabbe', 'Sophorn', 'Phou', 'm', 'WEP2013', 'sophornpanhaleak', 'sophorn-phou-1326a06b');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` varchar(40) NOT NULL,
  `major` varchar(50) NOT NULL,
  `promotion` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `crdate` int(11) NOT NULL,
  `identifier` varchar(40) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
