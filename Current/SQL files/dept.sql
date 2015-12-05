-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2014 at 06:04 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dept`
--

-- --------------------------------------------------------

--
-- Table structure for table `co`
--

CREATE TABLE IF NOT EXISTS `co` (
  `Code` varchar(5) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Type` varchar(8) NOT NULL,
  `Credits` int(1) NOT NULL,
  `sem` int(1) NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co`
--

INSERT INTO `co` (`Code`, `Name`, `Type`, `Credits`, `sem`) VALUES
('CO200', 'Computer Organization and Architecture', 'Core', 4, 1),
('CO201', 'Theory of Computation', 'Core', 4, 1),
('CO202', 'Design of digital systems', 'Core', 4, 1),
('CO203', 'Data structures and algorithms', 'Core', 4, 1),
('CO204', 'Design of Digital systems Lab', 'Core', 2, 1),
('CO205', 'Data Structures and Algorithms', 'Core', 2, 1),
('CO250', 'Data Communication', 'Core', 4, 2),
('CO251', 'Software Engineering', 'Core', 4, 2),
('CO252', 'Operating Systems', 'Core', 4, 2),
('CO253', 'Design and Analysis of Algorithms', 'Core', 4, 2),
('CO254', 'Operating Systems lab', 'Core', 2, 2),
('CO255', 'Software Engineering lab', 'Core', 2, 2),
('CO260', 'Principles of Programming Language', 'Elective', 3, 2),
('CO261', 'Information Systems', 'Elective', 3, 2),
('CO262', 'System Programming', 'Elective', 3, 2),
('CO263', 'Object Oriented Programming ', 'Elective', 3, 2),
('CO300', 'Computer Networks', 'Core', 4, 1),
('CO301', 'Database Management System', 'Core', 4, 1),
('CO302', 'Computer Networks lab', 'Core', 2, 1),
('CO303', 'Database Management System lab', 'Core', 2, 1),
('CO310', 'Microprocessor Systems', 'Elective', 3, 1),
('CO311', 'Unix network programming', 'Elective', 3, 1),
('CO312', 'Computer graphics and multimedia', 'Elective', 3, 1),
('CO313', 'Number Theory and Cryptography', 'Elective', 3, 1),
('CO314', 'Simulation and Modelling', 'Elective', 3, 1),
('CO315', 'Object Oriented Systems', 'Elective', 3, 1),
('CO316', 'Computer Architecture Lab', 'Elective', 3, 1),
('CO350', 'Compiler Design', 'Core', 4, 2),
('CO351', 'Compiler Design lab', 'Core', 2, 2),
('CO352', 'Computer Graphics Mini Project', 'Core', 2, 2),
('CO360', 'Advance Data Structures', 'Elective', 3, 2),
('CO361', 'Logic for Computer science', 'Elective', 3, 2),
('CO362', 'Information Security', 'Elective', 3, 2),
('CO363', 'Web Engineering', 'Elective', 3, 2),
('CO364', 'Soft Computing', 'Elective', 3, 2),
('CO365', 'Advanced Computer Networks', 'Elective', 3, 2),
('CO366', 'Formal Methods', 'Elective', 3, 2),
('CO367', 'Distributed Computing', 'Elective', 3, 2),
('CO368', 'Internet Technology and Applications', 'Elective', 3, 2),
('HU300', 'Engineering Economics', 'Core', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ee`
--

CREATE TABLE IF NOT EXISTS `ee` (
  `Code` varchar(5) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Type` varchar(8) NOT NULL,
  `Credits` int(1) NOT NULL,
  `Years` int(1) NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ee`
--

INSERT INTO `ee` (`Code`, `Name`, `Type`, `Credits`, `Years`) VALUES
('EE255', 'Introduction to algorithm and data structures', 'Elective', 4, 2),
('EE256', 'Signals and Systems', 'Core', 6, 2),
('EE258', 'ELectrical Machines II', 'Core', 6, 2),
('EE260', 'Digital Computer Organization and Architecture', 'Elective', 4, 2),
('EE365', 'Power System Engineering II', 'Core', 6, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
