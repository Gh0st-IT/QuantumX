-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2023 at 03:42 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interviewdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_table`
--

DROP TABLE IF EXISTS `applicant_table`;
CREATE TABLE IF NOT EXISTS `applicant_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cellphone_no` varchar(20) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applicant_table`
--

INSERT INTO `applicant_table` (`id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `gender`, `cellphone_no`, `address`) VALUES
(22, 'Mary', 'Jane', 'Watson', '1993-04-04', 'Female', '09234765819', '101 Pine Street'),
(23, 'Bruce', 'Wayne', 'Wayne', '1994-05-05', 'Male', '09423768159', '111 Maple Street'),
(18, 'Marc Racille', 'De Mesa', 'Arenga', '2023-01-10', 'Male', '09615365321', 'Limao, Calauan, Laguna'),
(19, 'John', 'Doe', 'Smith', '1990-01-01', 'Male', '09321468957', '123 Main Street'),
(20, 'Jane', 'Doe', 'Williams', '1991-02-02', 'Female', '09782365419', '456 Elm Street'),
(21, 'Peter', 'Parker', 'Parker', '1992-03-03', 'Male', '09782365419', '789 Oak Street'),
(24, 'Clark', 'Kent', 'Kent', '1995-06-06', 'Male', '09782365419', '121 Birch Street'),
(25, 'Diana', 'Prince', 'Prince', '1996-07-07', 'Female', '09782365419', '131 Willow Street'),
(26, 'Tony', 'Stark', 'Stark', '1997-08-08', 'Male', '09782365419', '141 Elm Street'),
(27, 'Steve', 'Rogers', 'Rogers', '1998-09-09', 'Male', '09123456789', '151 Oak Street'),
(28, 'Thor', 'Odinson', 'Odinson', '1999-10-10', 'Male', '09374621589', '161 Pine Street');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
