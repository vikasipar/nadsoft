-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 04:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nadsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(6) NOT NULL,
  `name_on_card` varchar(40) NOT NULL,
  `card_number` int(11) NOT NULL,
  `expiration` date NOT NULL,
  `cvv` int(3) NOT NULL,
  `delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `username`, `email`, `address`, `address2`, `country`, `state`, `zip`, `name_on_card`, `card_number`, `expiration`, `cvv`, `delete`) VALUES
(6, 'Vikas', 'Ipar', 'vikasipar', 'vikasipar4@gmail.com', 'Pune, Maharashtra, India', 'Pune, Maharashtra, India', 'United States', '', 0, 'Vikas Ipar', 2147483647, '2024-06-19', 654, 0),
(10, 'Vikas', 'Ipar', 'vikas', 'vikasipar.scoe.it@gm', '', '', 'United States', '', 0, 'Vikas', 2147483647, '2024-06-01', 432, 0),
(11, 'Vikas', 'Ipar', 'vikas', 'example@gmail.com', '', '', 'United States', '', 0, 'Vikas', 2147483647, '2024-05-26', 432, 0),
(12, 'Vicky', 'Ipar', 'vicky', 'vikasipar.scoe.it@gm', '', '', 'United States', '', 0, 'Vikas', 2147483647, '2024-05-31', 432, 0),
(13, 'Test', 'One', 'Test', 'test@example.com', 'Pune', 'Pune', '', '', 0, 'test name', 1234567890, '2024-05-31', 123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_orders`
--

CREATE TABLE `member_orders` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member_orders`
--

INSERT INTO `member_orders` (`id`, `member_id`, `product_name`, `product_price`) VALUES
(2, 6, 'Camera', '56,670'),
(3, 11, 'Camera', '56,670'),
(5, 11, 'Laptop', '1,12,9'),
(6, 13, 'Camera', '56,670'),
(7, 13, 'Laptop', '1,12,9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_orders`
--
ALTER TABLE `member_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `member_orders`
--
ALTER TABLE `member_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member_orders`
--
ALTER TABLE `member_orders`
  ADD CONSTRAINT `member_orders_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
