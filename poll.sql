-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2020 at 12:37 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

DROP TABLE IF EXISTS `polls`;
CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_name` text NOT NULL,
  `expire_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `poll_name`, `expire_date`) VALUES
(1, 'What is favorite color?', '2020-02-20 00:00:00'),
(2, 'What Pizza do you like?', '2020-02-22 00:00:00'),
(4, 'test1', '2222-02-22 00:00:00'),
(33, 'testmunni', '2020-02-22 00:00:00'),
(8, 'test3', '2020-02-04 00:00:00'),
(10, 'test3', '2020-02-04 00:00:00'),
(11, 'test3', '2020-02-04 00:00:00'),
(12, 'err', '4444-04-04 00:00:00'),
(13, 'err', '4444-04-04 00:00:00'),
(14, 'err', '4444-04-04 00:00:00'),
(16, 'err', '4444-04-04 00:00:00'),
(17, 'rere', '3333-03-03 00:00:00'),
(18, 'rere', '3333-03-03 00:00:00'),
(19, 'rere', '3333-03-03 00:00:00'),
(20, 'rere', '3333-03-03 00:00:00'),
(21, 'rere', '3333-03-03 00:00:00'),
(22, 'rere', '3333-03-03 00:00:00'),
(23, 'rere', '3333-03-03 00:00:00'),
(24, 'rere', '3333-03-03 00:00:00'),
(25, 'rere', '3333-03-03 00:00:00'),
(26, 'rere', '3333-03-03 00:00:00'),
(34, 'question 1', '2222-02-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

DROP TABLE IF EXISTS `poll_answers`;
CREATE TABLE IF NOT EXISTS `poll_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `counter` int(11) DEFAULT '0',
  `color` varchar(10) DEFAULT NULL,
  `sort_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll_answers`
--

INSERT INTO `poll_answers` (`id`, `poll_id`, `answer`, `counter`, `color`, `sort_order`) VALUES
(21, 2, 'Greek Pizza', 20, '#00FF00', 2),
(20, 2, 'Neapolitan Pizza.', 3, '#00FF00', 1),
(18, 1, 'Yellow', 40, '#00FF00', 4),
(17, 1, 'Blue', 50, '#CD5222', 3),
(16, 1, 'Green', 50, '#CD5222', 2),
(15, 1, 'Red', 1, '#000080', 1),
(14, 34, 'answer12', 30, '#FF0000', 2),
(13, 34, 'answer22', 40, '#008000', 1),
(12, 33, 'test1', 75, '#CD5222', 1),
(22, 2, ' Chicago Pizza. New York-Style Pizza', 100, '#FFFF00', 3),
(23, 2, '. Sicilian Pizza. ', 40, '#FF0000', 4),
(25, 4, 'test', 30, '#000080', 1),
(27, 4, 'test2', 50, '#CD5222', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
