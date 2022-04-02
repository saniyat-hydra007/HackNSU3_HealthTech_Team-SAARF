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
-- Table structure for table `baby_vaccine`
--

CREATE TABLE `baby_vaccine` (
  `name` varchar(20) NOT NULL,
  `father_name` varchar(20) NOT NULL,
  `mother_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baby_vaccine`
--

INSERT INTO `baby_vaccine` (`name`, `father_name`, `mother_name`, `date_of_birth`, `phone_number`, `email`) VALUES
('', '', '', '0000-00-00', 0, ''),
('ds', 'dd', 'dfsd', '0000-00-00', 0, 'sdfas'),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('adfd', 'dd', 'dfsd', '0000-00-00', 0, 'sdfas'),
('adfd', 'dd', 'dfsd', '0000-00-00', 0, 'sdfas'),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('saniyat', 'mushrat', 'lamim', '0000-00-00', 1683951610, 'skj@gmail.com'),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('', '', '', '0000-00-00', 0, ''),
('lamim', 'hamim', 'shamima', '2000-12-12', 235521, 'ds@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
