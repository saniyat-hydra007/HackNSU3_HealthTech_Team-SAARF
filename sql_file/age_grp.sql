-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 11:30 AM
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
-- Table structure for table `age_grp`
--

CREATE TABLE `age_grp` (
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `location` varchar(11) NOT NULL,
  `bp` varchar(11) NOT NULL,
  `diabetics` varchar(11) NOT NULL,
  `temp` varchar(11) NOT NULL,
  `heartrate` varchar(11) NOT NULL,
  `cholesterol` varchar(11) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
