-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2022 at 01:23 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

DROP TABLE IF EXISTS `student_record`;
CREATE TABLE IF NOT EXISTS `student_record` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `gmail` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL DEFAULT 'defaultimage.jpg',
  `level` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`id`, `name`, `gmail`, `telephone`, `dob`, `gender`, `profile`, `level`) VALUES
(51, 'Akinyemi Goodness', 'goodnesstek@gmail.com', '09093874745', '2022-09-14', 'Male', '444922.jpg', 'HND (Higer National Diplioma)'),
(52, 'Okunola Raphael Temitope', 'topmantek@gmail.com', '09088345353', '2022-09-13', 'Male', '113222.jpg', 'HND (Higer National Diplioma)'),
(54, 'Odion Goodnews', 'odiinosaze564@gmail.com', '08147364485', '2022-09-06', 'Male', 'defaultimage.jpg', 'ND (National diplioma)');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_record`
--

DROP TABLE IF EXISTS `virtual_record`;
CREATE TABLE IF NOT EXISTS `virtual_record` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `gmail` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `virtual_record`
--

INSERT INTO `virtual_record` (`id`, `name`, `gmail`, `telephone`, `dob`, `gender`, `level`) VALUES
(17, 'Odion Goodnews', 'odiinosaze564@gmail.com', '08147364485', '2022-09-06', 'Male', 'ND (National diplioma)'),
(16, 'Johnson Jide Michael', 'jyde453@gmail.com', '09090283837', '2022-09-14', 'Male', 'RPT (Regular Per Time)'),
(15, 'Okunola Raphael Temitope', 'topmantek@gmail.com', '09088345353', '2022-09-13', 'Male', 'HND (Higer National Diplioma)'),
(14, 'Odion Goodnews', 'odionosaze564@gmail.coms', '08147364485', '2022-09-14', 'Male', 'HND (Higer National Diplioma)'),
(13, 'Odion Goodnews', 'odionosaze564@gmail.com', '08147364485', '2022-09-07', 'Female', 'HND (Higer National Diplioma)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
