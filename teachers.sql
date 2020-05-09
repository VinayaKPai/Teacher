-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 08:15 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vkpsolut_teachers_tools`
--

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherId` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `middleName` varchar(25) DEFAULT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `systemEmail` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `joinYear` varchar(4) DEFAULT NULL,
  `leftYear` varchar(4) DEFAULT NULL,
  `visibility` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherId`, `firstName`, `middleName`, `lastName`, `email`, `systemEmail`, `phoneNumber`, `joinYear`, `leftYear`, `visibility`) VALUES
(1, 'Haradi', 'Keshav', 'Pai', 'hkeshavpai@gmail.com', 'HaradiKeshavPai@mydomain.com', '+919611907001', NULL, NULL, 'Y'),
(2, 'Haradi', 'Aditya', 'Pai', 'adityapai@y7mail.com', 'HaradiAdityaPai@mydomain.com', '+917619118922 +46735147171', NULL, NULL, 'Y'),
(3, 'Haradi', 'Abhijit', 'Pai', 'apai1993@gmail.com', 'HaradiAbhijitPai@mydomain.com', '+919663304791', NULL, NULL, 'Y'),
(4, 'Vinaya', 'Keshav', 'Pai', 'vinayakeshavpai@gmail.com', 'VinayaKeshavPai@mydomain.com', '+919663304792', NULL, NULL, 'Y'),
(5, 'Kavya', 'Pai', 'T', 'kavyapai28@gmail.com', 'KavyaPaiT@mydomain.com', '+916366856667', NULL, NULL, 'Y'),
(6, 'Vasanta', 'Sudhakar', 'Rao', 'vinayapai@hotmail.com', 'VasantaSudhakarRao@mydomain.com', '+919611907001 mamama', NULL, NULL, 'Y'),
(7, 'Anita', 'Sudhakar', 'Rao', 'vkaapai@yahoo.com', 'AnitaSudhakarRao@mydomain.com', '+919611907001 pachi', NULL, NULL, 'Y'),
(9, 'Ganda', 'Wala', 'Teacher', 'gwt@asdf.com', 'GandaWalaTeacher@mydomain.com', '9686084792', '', '', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
