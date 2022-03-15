-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 11:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emarket2`
--

DROP DATABASE IF EXISTS emarket2;
CREATE DATABASE IF NOT EXISTS emarket2;
USE emarket2;
-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `District` varchar(25) NOT NULL,
  `Area` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`District`, `Area`) VALUES
('Chittagong', 'Chawk Bazar'),
('Chittagong', 'Pahartali'),
('Chittagong', 'Patenga'),
('Dhaka', 'Badda'),
('Dhaka', 'Mirpur'),
('Dhaka', 'Mohammadpur'),
('Khulna', 'coming soon'),
('Rajshahi', 'Chhota Banagram'),
('Rajshahi', 'Shaheb Bazar'),
('Rajshahi', 'Shiroil'),
('Sylhet', 'coming soon');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `b_username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact_no` int(10) NOT NULL,
  `District` varchar(25) NOT NULL,
  `Area` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--


-- --------------------------------------------------------

--
-- Table structure for table `buyer_product`
--

CREATE TABLE `buyer_product` (
  `Buyerb_username` varchar(25) NOT NULL,
  `Productp_id` int(10) NOT NULL,
  `productName` varchar(25) NOT NULL,
  `totalQuantity` int(10) NOT NULL,
  `totalPrice` int(10) NOT NULL,
  `BidCheck` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact_no` int(10) NOT NULL,
  `District` varchar(25) NOT NULL,
  `Area` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--
-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notify_id` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  `notify_datetime` datetime NOT NULL,
  `farmerf_username` varchar(25) NOT NULL,
  `Buyerb_username` varchar(25) NOT NULL,
  `f_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `trans_id` int(10) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `delivery_status` varchar(25) NOT NULL,
  `Buyerb_username` varchar(25) NOT NULL,
  `farmerf_username` varchar(25) NOT NULL,
  `payment_time` datetime NOT NULL,
  `p_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL,
  `productName` varchar(25) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price_perUnit` int(10) NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `Added_date` datetime NOT NULL,
  `farmerf_username` varchar(25) NOT NULL,
  `AvailableQuantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`District`,`Area`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`b_username`),
  ADD KEY `FKBuyer19772` (`District`,`Area`);

--
-- Indexes for table `buyer_product`
--
ALTER TABLE `buyer_product`
  ADD PRIMARY KEY (`Buyerb_username`,`Productp_id`),
  ADD KEY `FKBuyer_Prod253` (`Productp_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`f_username`),
  ADD KEY `FKfarmer247222` (`District`,`Area`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notify_id`),
  ADD KEY `FKnotificati27373` (`farmerf_username`),
  ADD KEY `FKnotificati754038` (`Buyerb_username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FKpayment301829` (`Buyerb_username`),
  ADD KEY `FKpayment943095` (`farmerf_username`),
  ADD KEY `id` (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `FKProduct80401` (`farmerf_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notify_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `FKBuyer19772` FOREIGN KEY (`District`,`Area`) REFERENCES `area` (`District`, `Area`) ON DELETE CASCADE;

--
-- Constraints for table `buyer_product`
--
ALTER TABLE `buyer_product`
  ADD CONSTRAINT `FKBuyer_Prod253` FOREIGN KEY (`Productp_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKBuyer_Prod310173` FOREIGN KEY (`Buyerb_username`) REFERENCES `buyer` (`b_username`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKBuyer_Prod310174` FOREIGN KEY (`Buyerb_username`) REFERENCES `buyer` (`b_username`) ON DELETE CASCADE;

--
-- Constraints for table `farmer`
--
ALTER TABLE `farmer`
  ADD CONSTRAINT `FKfarmer247222` FOREIGN KEY (`District`,`Area`) REFERENCES `area` (`District`, `Area`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FKnotificati27373` FOREIGN KEY (`farmerf_username`) REFERENCES `farmer` (`f_username`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKnotificati754038` FOREIGN KEY (`Buyerb_username`) REFERENCES `buyer` (`b_username`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FKpayment301829` FOREIGN KEY (`Buyerb_username`) REFERENCES `buyer` (`b_username`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKpayment943095` FOREIGN KEY (`farmerf_username`) REFERENCES `farmer` (`f_username`) ON DELETE CASCADE,
  ADD CONSTRAINT `id` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FKProduct80401` FOREIGN KEY (`farmerf_username`) REFERENCES `farmer` (`f_username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
