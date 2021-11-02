-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2021 at 03:50 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers_table`
--

INSERT INTO `customers_table` (`customer_id`, `customer_name`, `email`, `phone`, `address`) VALUES
(1, 'Daniel', 'dfung001@e.ntu.edu.sg', 98304575, 'Toa Payoh Blk 53 Lorong 5'),
(2, 'Daniel', 'dfung001@e.ntu.edu.sg', 98304575, 'Toa Payoh Blk 53 Lorong 5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
