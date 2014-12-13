-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2014 at 11:14 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `orderedproducts`
--

CREATE TABLE IF NOT EXISTS `orderedproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `orderedproducts`
--

INSERT INTO `orderedproducts` (`id`, `orderid`, `productid`, `quantity`, `price`) VALUES
(1, 0, 0, 0, '0.00'),
(2, 0, 0, 0, '0.00'),
(3, 0, 0, 0, '0.00'),
(4, 0, 0, 0, '0.00'),
(5, 1, 0, 0, '0.00'),
(6, 1, 0, 0, '0.00'),
(7, 2, 1, 3, '0.00'),
(8, 2, 2, 2, '0.00'),
(9, 3, 1, 3, '8.20'),
(10, 3, 2, 2, '2.50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
