-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2021 at 09:25 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_table`
--

CREATE TABLE IF NOT EXISTS `customers_table` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` char(50) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` bigint(20) unsigned NOT NULL,
  `address` char(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customers_table`
--

INSERT INTO `customers_table` (`customer_id`, `customer_name`, `email`, `phone`, `address`) VALUES
(1, 'Peter Lim', 'peterlim@gmail.com', 86268921, '86 sixth avenue'),
(2, 'John Tan', 'johntan22@yahoo.com', 94312682, 'Blk 87 Ah Gao Lane #02-09'),
(3, 'Yam Seng', 'yamseng@gmail.com', 98432138, 'Yishun Ring Road Blk 99'),
(4, 'Tom', 'tommyt@yahoo.com', 83423523, 'Sembawang Close Blk 320 #04-20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
