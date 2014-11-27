CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Bericht` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;
-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2014 at 12:09 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtmtl_06`
--
CREATE DATABASE IF NOT EXISTS `dbtmtl_06` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbtmtl_06`;

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Bericht` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Naam`, `Email`, `Bericht`) VALUES
(1, '3fe432f', '32323232@gmail.com', '3232323232'),
(2, '143214', '72362@glr.nl', 'g3knj34n4iun'),
(3, '1324', '72362@glr.nl', ' r21r3r'),
(4, '1324', '72362@glr.nl', ' r21r3r'),
(5, '323232', '32323232@gmail.com', '32323232'),
(6, '323232', '32323232@gmail.com', '32233232'),
(7, '313232', '72362@glr.nl', '3232323232'),
(8, '313232', '72362@glr.nl', '3232323232'),
(9, '323232', '72362@glr.nl', '32323232'),
(10, '323232', '72362@glr.nl', '32323232'),
(11, '323232', '72362@glr.nl', '32323232'),
(12, '323232', '72362@glr.nl', '32323232'),
(13, '323232', '32323232@gmail.com', '323232'),
(14, '3232', '32323232@gmail.com', '323232'),
(15, '3232', '32323232@gmail.com', '323232'),
(16, '3232', '32323232@gmail.com', '323232'),
(17, '3232', '32323232@gmail.com', '323232'),
(18, '3232', '32323232@gmail.com', '323232');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;