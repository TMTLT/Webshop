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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(60) NOT NULL,
  `parent` int(11) NOT NULL,
  `beschrijving` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(8,2) NOT NULL,
  `categorie` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `titel`, `beschrijving`, `prijs`, `categorie`, `aantal`) VALUES
(1, 'Philips X-23 TL UltraBright 1000lux', 'De nagenoeg perfecte TL balk voor al uw fabrieken.\r\nZeer laag energiegebruik voor de hoeveelheid licht. \r\n\r\nZeer lange levensduur met 6 jaar garantie.', '8.20', 1, 50),
(2, 'Axai 2100-BRB Uz1 ', 'Deze gloeilamp word gloeiend heet maar produceerd ook erg veel licht (2500 lux).', '2.50', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `transid` varchar(16) NOT NULL,
  `hash` varchar(60) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transid`, `hash`, `status`) VALUES
(1, 'l7pwTgll', '2a37726251599c6ad50ca0aec02e09e02bd3c3f4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(60) NOT NULL,
  `tussenvoegsel` varchar(11) DEFAULT NULL,
  `achternaam` varchar(60) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `huisnummer` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `pepper` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
