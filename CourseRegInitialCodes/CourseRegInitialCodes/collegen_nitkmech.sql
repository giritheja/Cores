-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2014 at 08:51 PM
-- Server version: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `collegen_nitkmech`
--

-- --------------------------------------------------------

--
-- Table structure for table `mechdept`
--

CREATE TABLE IF NOT EXISTS `mechdept` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `elective1` varchar(50) NOT NULL,
  `elective2` varchar(50) NOT NULL,
  `elective3` varchar(50) NOT NULL,
  `core1` varchar(50) NOT NULL,
  `core2` varchar(50) NOT NULL,
  `core3` varchar(50) NOT NULL,
  `core4` varchar(50) NOT NULL,
  `feereceipt` varchar(16) NOT NULL,
  `bankname` varchar(16) NOT NULL,
  `cgpa` float(4,2) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mechdept`
--

INSERT INTO `mechdept` (`id_user`, `name`, `email`, `username`, `elective1`, `elective2`, `elective3`, `core1`, `core2`, `core3`, `core4`, `feereceipt`, `bankname`, `cgpa`, `phone_number`, `password`, `confirmcode`) VALUES
(5, 'Abhinav Pathak', 'sampath1993sam@gmail.com', '11ee37', '', '', '', '', '', '', '', '22', 'SBI', 9.90, '8971970433', '9e77441693279b2265143308e0cc4d16', 'y'),
(3, 'Vinay', 'abp.11m106@nitk.edu.in', '11m101', '2', '7', '10', 'ME350|Heat Transfer', 'ME351|Machine Dynamics & Vibrations', 'ME352|Machine Shop â€“ I', 'HU300|Engineering Economics', '5674', 'sbi', 7.80, '9035224985', '247184f5fcf8c0afea1291676dc6df8f', 'y'),
(4, 'Gourav Shet', 'pathak.abhinav@hotmail.com', '11m164', '2', '4', '10', 'ME350|Heat Transfer', 'ME351|Machine Dynamics & Vibrations', 'ME352|Machine Shop â€“ I', 'HU300|Engineering Economics', '7632', 'SBI', 9.10, '7834526778', '247184f5fcf8c0afea1291676dc6df8f', 'y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
