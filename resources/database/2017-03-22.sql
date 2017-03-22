-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 06:36 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pncaa_election`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `identifier` varchar(40) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sex` char(5) NOT NULL,
  `promotion` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `crdate` int(10) NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`identifier`, `first_name`, `last_name`, `sex`, `promotion`, `avatar`, `crdate`) VALUES
('29abb841-1f63-47ca-868c-a3efac0f9e09', 'Vuthy', 'Im', 'm', 'DMO2014', 'vuthy-im.jpg', 1490120597),
('42f23562-2ec1-44d8-b2b4-ae1e9b954932', 'Kimheng', 'Luot', 'f', 'SNA2015', 'kimheng-luot.jpg', 1490120651),
('49e34b72-53fa-456b-b8b6-4e8110cbf13f', 'Birosa', 'Saret', 'f', 'SNA2013', 'birosa-saret.jpg', 1490120537),
('5528e6ff-a2a3-44e9-bdcb-dfd61d9352bf', 'Rotha', 'Khoeurn', 'f', 'WEP2014', 'rotha-khoeurn.jpg', 1490120618),
('57f8a572-d8f4-4939-a9c6-951bd43f9419', 'Vannakpanha', 'Mao', 'm', 'WEP2014', 'vannakpanha-mao.jpg', 1490120575),
('7de8ce3a-ab3d-42c1-b4d4-178ffa02388e', 'Phatsa', 'Sorn', 'f', 'WEP2015', 'phatsa-sorn.jpg', 1490120693),
('8a00757f-df00-4ab0-bab0-4665e558d44b', 'Rotha', 'Rorng', 'f', 'DMO2014', 'rotha-rorng.jpg', 1490120548),
('97cf448c-5c4c-4ce6-a592-c87fe8bd073c', 'Makara', 'Prom', 'f', 'WEP2015', 'makara-prom.jpg', 1490120663),
('c7c92dc5-4536-44b7-95b8-8c877134cf15', 'Rith', 'Nhel', 'm', 'WEP2016', 'rith-nhel.jpg', 1490120679),
('e3b237d4-d528-40ca-8e1a-531bc8d27c4d', 'Chanthy', 'Loem', 'f', 'SNA2013', 'chanthy-loem.jpg', 1490120636),
('e5ebc9d8-db2e-473e-ae5c-b619f60620d0', 'Sophanith', 'Chhom', 'm', 'SNA2011', 'sophanith-chhom.jpg', 1490120505);

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `identifier` varchar(40) NOT NULL,
  `candidate` varchar(40) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `major` varchar(10) NOT NULL,
  `promotion` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `crdate` int(10) NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
