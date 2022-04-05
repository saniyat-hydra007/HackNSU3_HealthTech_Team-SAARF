-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 11:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medica`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `name` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `appointment_number` int(11) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `visiting_charge` int(11) NOT NULL,
  `hospital_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `designation`, `appointment_number`, `thana`, `district`, `visiting_charge`, `hospital_name`) VALUES
('', '', 0, '', '', 0, ''),
('skdf', 'MBBS', 0, 'sdfs', 'dfsd', 0, 'dfdddd'),
('', '', 0, '', '', 0, ''),
('', '', 0, '', '', 0, ''),
('lamim', 'mbbs', 1213, 'mirpur', 'dhaka', 355, 'ibne sina'),
('lamim', 'MBBS', 1981092, 'mirpur', 'dhaka', 700, 'inbe sina');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
