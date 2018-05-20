-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2017 at 07:06 PM
-- Server version: 5.6.33-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amoodf5_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersx`
--

CREATE TABLE IF NOT EXISTS `usersx` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `fName` text NOT NULL,
  `lName` text NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastLogin` int(11) NOT NULL,
  `salt` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `usersx`
--

INSERT INTO `usersx` (`userID`, `fName`, `lName`, `userName`, `password`, `lastLogin`, `salt`) VALUES
(10, 'Ashley', 'Smith', 'asmith', '1234', 0, 0),
(11, 'Dave', 'Foster', 'dfoster', 'password', 0, 0),
(12, 'Jim', 'Larson', 'jlarson', '12345', 0, 0),
(13, 'Ralph', 'Miller', 'rmiller', 'test', 0, 0),
(14, 'Mary', 'Thorson', 'mthorson', 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `workHours`
--

CREATE TABLE IF NOT EXISTS `workHours` (
  `recordID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `periodStart` date NOT NULL,
  `periodEnd` date NOT NULL,
  `Monday` double NOT NULL,
  `Tuesday` double NOT NULL,
  `Wednesday` double NOT NULL,
  `Thursday` double NOT NULL,
  `Friday` double NOT NULL,
  `Saturday` double NOT NULL,
  `Sunday` double NOT NULL,
  PRIMARY KEY (`recordID`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workHours`
--

INSERT INTO `workHours` (`recordID`, `userID`, `periodStart`, `periodEnd`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`) VALUES
(1, 10, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0),
(2, 11, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0),
(3, 12, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0),
(4, 13, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0),
(5, 14, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
