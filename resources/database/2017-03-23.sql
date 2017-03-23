-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 03:08 AM
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
  `commitment` text,
  `crdate` int(10) NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`identifier`, `first_name`, `last_name`, `sex`, `promotion`, `avatar`, `commitment`, `crdate`) VALUES
('29abb841-1f63-47ca-868c-a3efac0f9e09', 'Vuthy', 'Im', 'm', 'DMO2011', 'vuthy-im.jpg', 'We are a big family let come together to support, to join. PNC help me! PNC help you! Why don''t we help back to PNC, Why don''t we help back to our new generation like us. Let bring back our core value again.', 1490120597),
('42f23562-2ec1-44d8-b2b4-ae1e9b954932', 'Kimheng', 'Luot', 'f', 'SNA2015', 'kimheng-luot.jpg', 'I am helpful and hard-working person.', 1490120651),
('49e34b72-53fa-456b-b8b6-4e8110cbf13f', 'Birosa', 'Saret', 'f', 'SNA2013', 'birosa-saret.jpg', 'Lifelong relation are the foundation of my plan for alumni. To meet the needs, serve and connect with our alumni and our new generation.', 1490120537),
('5528e6ff-a2a3-44e9-bdcb-dfd61d9352bf', 'Rotha', 'Khoeurn', 'f', 'WEP2014', 'rotha-khoeurn.jpg', 'I want to share all my good experiences that I met with PNCAA members  and I  want to make PNCAA more popular by our actions and collaboration. The last, I want to keep a good relation and improve my skill to effective withmall members in PNCAA.', 1490120618),
('57f8a572-d8f4-4939-a9c6-951bd43f9419', 'Vannakpanha', 'Mao', 'm', 'WEP2014', 'vannakpanha-mao.jpg', 'I''m strongly believe that my contribution of time, power and ideas will continue to build the reputation of PNC by follow 3 directions: 1) Ensure everyone stay connect with PNC by organize more social activities. 2) Improve the quality of knowledge for alumni members by organize more workshops or seminars. 3) Accelerate solidarity acts project to move faster. ', 1490120575),
('7de8ce3a-ab3d-42c1-b4d4-178ffa02388e', 'Phatsa', 'Sorn', 'f', 'SNA2015', 'phatsa-sorn.jpg', 'My future plan is to lead myself, my family and society get happiness and success.', 1490120693),
('8a00757f-df00-4ab0-bab0-4665e558d44b', 'Rotha', 'Rorng', 'f', 'DMO2014', 'rotha-rorng.jpg', 'I will try my best to keep strong communicate between SNA/WEP and DMO alumni. Find more donations to help our PNC and for next generations.', 1490120548),
('97cf448c-5c4c-4ce6-a592-c87fe8bd073c', 'Makara', 'Prom', 'f', 'WEP2015', 'makara-prom.jpg', 'I plan to build a strong communication between Alumni and society via working on social activities. Otherwise, my passion to find the benefit to PNCAA and PNC to reach the same goal, and keep each other as a family. I commit to work as hard as I can, to reach PNCAA planning goal.', 1490120663),
('c7c92dc5-4536-44b7-95b8-8c877134cf15', 'Rith', 'Nhel', 'm', 'WEP2016', 'rith-nhel.jpg', 'We will work together to grow up our ability in technology by sharing each other. We will take responsible to our school back like Solidarity act. We will do the workshop in the province to convince young generation especially girls to be clear, and not being afraid of IT in their concept. We will contribute to our society by using our knowledge like provide training to some NGO or School. I like do something that will make fun. So I want to make all members in PNCAA always fun when they join this committee by using technology, and other activities.I commit that I will use all of my knowledge and use the rest of my time to serve all member in PNCAA for what all of us want.', 1490120679),
('e3b237d4-d528-40ca-8e1a-531bc8d27c4d', 'Chanthy', 'Loem', 'f', 'SNA2013', 'chanthy-loem.jpg', 'Helping, Sharing, Improving', 1490120636),
('e5ebc9d8-db2e-473e-ae5c-b619f60620d0', 'Sophanith', 'Chhom', 'm', 'SNA2011', 'sophanith-chhom.jpg', 'Making more activities and contributions to involve for social development and to build more and strong relationship for all across alumni members as well.', 1490120505);

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
