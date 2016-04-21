-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2014 at 05:04 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airline2013`
--
CREATE DATABASE IF NOT EXISTS `airline2013` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `airline2013`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin'),
('lecturer', 'lecturer'),
('rmiller', 'rmiller');

-- --------------------------------------------------------

--
-- Table structure for table `passangers`
--

CREATE TABLE IF NOT EXISTS `passangers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `passport` varchar(10) NOT NULL,
  `route` int(11) NOT NULL,
  `date` date NOT NULL,
  `registered` tinyint(1) NOT NULL,
  `registeredName` varchar(15) NOT NULL,
  `creditCardno` varchar(16) NOT NULL,
  `email` varchar(40) NOT NULL,
  `seatNo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `passangers`
--

INSERT INTO `passangers` (`id`, `name`, `passport`, `route`, `date`, `registered`, `registeredName`, `creditCardno`, `email`, `seatNo`) VALUES
(79, 'jamie', '121234343', 15, '2014-01-01', 1, 'jamie', '1234567890', 'jamie@hotmail.com', 7),
(80, 'jamie', '121234343', 15, '2014-01-01', 1, 'jamie', '1234567890', 'jamie@hotmail.com', 8),
(81, 'jamie', '121234343', 15, '2014-01-01', 1, 'jamie', '1234567890', 'jamie@hotmail.com', 9),
(82, 'jamie', '121234343', 15, '2014-01-01', 1, 'jamie', '1234567890', 'jamie@hotmail.com', 10),
(83, 'dennis mangan', '01232323', 15, '2014-01-01', 0, 'Guest', '012335353', 'dennia@hotmail.com', 11),
(84, 'dennis mangan', '01232323', 15, '2014-01-01', 0, 'Guest', '012335353', 'dennia@hotmail.com', 12);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `source`, `dest`, `start`, `end`, `price`) VALUES
(13, 'cork', 'heathrow', '2014-01-01', '2014-02-01', 56),
(15, 'cork', 'brussels', '2014-01-01', '2014-02-01', 76),
(16, 'cork', 'charles de gaulle', '2014-01-01', '2014-02-02', 21),
(17, 'cork', 'kelso', '2014-01-01', '2014-01-01', 34);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `CreditCardNo` varchar(16) NOT NULL,
  `passport` int(10) NOT NULL,
  `suspend` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `CreditCardNo`, `passport`, `suspend`) VALUES
(211, 'rmiller', 'rmiller', 'rmiller@mycit.ie', '1234355', 34, 0),
(212, 'dennis mangan', 'ferdia123', 'denis_nam@hotmail.com', '1234567890', 12344556, 0),
(213, 'jamie', 'hayes', 'jamie@hotmail.com', '1234567890', 121234343, 0),
(214, 'niall', 'ferdia123', 'denis_nam@hotmail.com', '1234567880', 121234343, 0),
(215, 'donny', 'buckley', 'donie@hotmail.com', '012335353', 1232323, 0),
(216, 'betty', 'davis', 'betty@horses.ie', '012335353', 1232323, 0),
(217, 'dinny', 'bones', 'dinny@apple.com', '012335353', 1232323, 0),
(218, 'connie', 'scully', 'connie@beauty.ie', '012335353', 1232323, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
