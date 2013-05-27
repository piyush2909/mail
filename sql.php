-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2013 at 08:12 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dragdrop`
--

CREATE TABLE IF NOT EXISTS `dragdrop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maildescription` varchar(255) DEFAULT NULL,
  `productname` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `listorder` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `dragdrop`
--

INSERT INTO `dragdrop` (`id`, `maildescription`, `productname`, `discount`, `listorder`) VALUES
(2, 'Take the dog for a walk', '', '', 2),
(4, 'Go to the Gym', '', '', 8),
(5, 'Pick up the wife from work', '', '', 7),
(6, 'Wash the car', '', '', 6),
(7, 'Take the kids to school', '', '', 4),
(8, 'sdfsdf', 'sdf', 'sdfsdf', 5),
(10, 'Take the kids to school', 'sdf', '33', 1),
(9, 'fsdfsdfsdfs', 'test', '55', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
