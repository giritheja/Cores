-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2014 at 06:05 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `co`
--

CREATE TABLE IF NOT EXISTS `co` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `elective1` varchar(70) NOT NULL,
  `elective2` varchar(70) NOT NULL,
  `elective3` varchar(70) NOT NULL,
  `elective4` varchar(70) NOT NULL,
  `core1` varchar(70) NOT NULL,
  `core2` varchar(70) NOT NULL,
  `core3` varchar(70) NOT NULL,
  `core4` varchar(70) NOT NULL,
  `core5` varchar(70) NOT NULL,
  `core6` varchar(70) NOT NULL,
  `feereceipt` varchar(16) NOT NULL,
  `bankname` varchar(16) NOT NULL,
  `cgpa` float(4,2) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `co`
--

INSERT INTO `co` (`id_user`, `name`, `email`, `username`, `elective1`, `elective2`, `elective3`, `elective4`, `core1`, `core2`, `core3`, `core4`, `core5`, `core6`, `feereceipt`, `bankname`, `cgpa`, `phone_number`, `password`, `confirmcode`) VALUES
(1, 'sunil shetty', 'sunil@gmail.com', '13co112', 'CO263 | Object Oriented Programming ', '', '', '', 'CO250 | Data Communication', 'CO255 | Software Engineering lab', 'CO254 | Operating Systems lab', 'CO251 | Software Engineering', 'CO252 | Operating Systems', 'CO253 | Design and Analysis of Algorithms', '123456789', 'SBI', 8.90, '123456789', '5d41402abc4b2a76b9719d911017c592', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `ee`
--

CREATE TABLE IF NOT EXISTS `ee` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `elective1` varchar(70) NOT NULL,
  `elective2` varchar(70) NOT NULL,
  `elective3` varchar(70) NOT NULL,
  `elective4` varchar(70) NOT NULL,
  `core1` varchar(70) NOT NULL,
  `core2` varchar(70) NOT NULL,
  `core3` varchar(70) NOT NULL,
  `core4` varchar(70) NOT NULL,
  `core5` varchar(70) NOT NULL,
  `core6` varchar(70) NOT NULL,
  `feereceipt` varchar(16) NOT NULL,
  `bankname` varchar(16) NOT NULL,
  `cgpa` float(4,2) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ee`
--

INSERT INTO `ee` (`id_user`, `name`, `email`, `username`, `elective1`, `elective2`, `elective3`, `elective4`, `core1`, `core2`, `core3`, `core4`, `core5`, `core6`, `feereceipt`, `bankname`, `cgpa`, `phone_number`, `password`, `confirmcode`) VALUES
(2, 'gta', 's.giritheja@gmail.com', '13ee141', 'EE255 | Introduction to algorithm and data structures', '', '', '', 'EE256 | Signals and Systems', 'EE258 | ELectrical Machines II', '', '', '', '', '123345678', 'SBI', 11.00, '7411928407', '533c5ba8368075db8f6ef201546bd71a', 'y');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mechdept`
--

INSERT INTO `mechdept` (`id_user`, `name`, `email`, `username`, `elective1`, `elective2`, `elective3`, `core1`, `core2`, `core3`, `core4`, `feereceipt`, `bankname`, `cgpa`, `phone_number`, `password`, `confirmcode`) VALUES
(5, 'Abhinav Pathak', 'sampath1993sam@gmail.com', '11ee37', '', '', '', '', '', '', '', '22', 'SBI', 9.90, '8971970433', '9e77441693279b2265143308e0cc4d16', 'y'),
(3, 'Vinay', 'abp.11m106@nitk.edu.in', '11m101', '2', '7', '10', 'ME350|Heat Transfer', 'ME351|Machine Dynamics & Vibrations', 'ME352|Machine Shop â€“ I', 'HU300|Engineering Economics', '5674', 'sbi', 7.80, '9035224985', '247184f5fcf8c0afea1291676dc6df8f', 'y'),
(4, 'Gourav Shet', 'pathak.abhinav@hotmail.com', '11m164', '2', '4', '10', 'ME350|Heat Transfer', 'ME351|Machine Dynamics & Vibrations', 'ME352|Machine Shop â€“ I', 'HU300|Engineering Economics', '7632', 'SBI', 9.10, '7834526778', '247184f5fcf8c0afea1291676dc6df8f', 'y'),
(7, 'gta', 's.giritheja@gmail.com', '13ee14', '', 'EE260 | Digital Computer Organization and Architec', '', 'EE256 | Signals and Systems', 'EE258 | ELectrical Machines II', '', '', '123456789', 'SBI', 11.00, '0741192840', '533c5ba8368075db8f6ef201546bd71a', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `mechdept1`
--

CREATE TABLE IF NOT EXISTS `mechdept1` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `elective1` varchar(70) NOT NULL,
  `elective2` varchar(70) NOT NULL,
  `elective3` varchar(70) NOT NULL,
  `core1` varchar(70) NOT NULL,
  `core2` varchar(70) NOT NULL,
  `core3` varchar(70) NOT NULL,
  `core4` varchar(70) NOT NULL,
  `feereceipt` varchar(16) NOT NULL,
  `bankname` varchar(16) NOT NULL,
  `cgpa` float(4,2) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mechdept1`
--

INSERT INTO `mechdept1` (`id_user`, `name`, `email`, `username`, `elective1`, `elective2`, `elective3`, `core1`, `core2`, `core3`, `core4`, `feereceipt`, `bankname`, `cgpa`, `phone_number`, `password`, `confirmcode`) VALUES
(5, 'Abhinav Pathak', 'sampath1993sam@gmail.com', '11ee37', '', '', '', '', '', '', '', '22', 'SBI', 9.90, '8971970433', '9e77441693279b2265143308e0cc4d16', 'y'),
(3, 'Vinay', 'abp.11m106@nitk.edu.in', '11m101', '2', '7', '10', 'ME350|Heat Transfer', 'ME351|Machine Dynamics & Vibrations', 'ME352|Machine Shop â€“ I', 'HU300|Engineering Economics', '5674', 'sbi', 7.80, '9035224985', '247184f5fcf8c0afea1291676dc6df8f', 'y'),
(4, 'Gourav Shet', 'pathak.abhinav@hotmail.com', '11m164', '2', '4', '10', 'ME350|Heat Transfer', 'ME351|Machine Dynamics & Vibrations', 'ME352|Machine Shop â€“ I', 'HU300|Engineering Economics', '7632', 'SBI', 9.10, '7834526778', '247184f5fcf8c0afea1291676dc6df8f', 'y'),
(7, 'gta', 's.giritheja@gmail.com', '13ee14', 'EE255 | Introduction to algorithm and data structures', 'EE260 | Digital Computer Organization and Architecture', '', 'EE256 | Signals and Systems', 'EE258 | ELectrical Machines II', '', '', '123456789', 'SBI', 11.00, '7411928407', '533c5ba8368075db8f6ef201546bd71a', 'y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
