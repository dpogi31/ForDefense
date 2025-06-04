-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 03:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chronosync`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image_path`) VALUES
(1, 'Apple Watch Series 10 GPS', 16000.00, 'assets/images/P1.png'),
(2, 'AIYISHI Unisex Stainless Watch', 12999.00, 'assets/images/P2.png'),
(3, 'Apple Watch Series 11 GPS + Cellular', 42000.00, 'assets/images/P3.png'),
(4, 'Black Fashion Quartz Watch', 38000.00, 'assets/images/P4.png'),
(5, 'Deep Sea Omega Royalty', 36850.00, 'assets/images/P5.png'),
(6, 'Apple Watch Ultra', 68000.00, 'assets/images/P6.png'),
(7, 'Xiaomi REDMI Watch 5 Active', 28000.00, 'assets/images/P7.png'),
(8, 'COOBOS Luxury LED Luminous Watch', 30000.00, 'assets/images/P8.png'),
(9, 'Samsung Galaxy Watch FE', 43000.00, 'assets/images/P9.png'),
(10, 'SANDA Official 100% Genuine Mens Watch', 40000.00, 'assets/images/P10.png'),
(11, 'Titan Karishma Quartz Analog Silver Dial', 52000.00, 'assets/images/P11.png'),
(12, 'Carlington Men Stainless Steel Watch', 47000.00, 'assets/images/P12.png'),
(13, 'OLEVS Mens Chronograph Watch', 45000.00, 'assets/images/P13.png'),
(14, 'Fossil Men\'s Stainless Steel Chronograph Watch', 37000.00, 'assets/images/P14.png'),
(15, 'Omega Seamaster 75th Anniversary', 41000.00, 'assets/images/P15.png'),
(16, 'SRPJ45 Seiko Watch', 58000.00, 'assets/images/P16.png'),
(17, 'Curren 8356 Black Steel Chain Round Dial Men\'s Wrist Watch', 68000.00, 'assets/images/P17.png'),
(18, 'HUAWEI WATCH FIT 3 - Smart Watch', 39000.00, 'assets/images/P18.png'),
(19, 'Timex Expedition North Mechanical Men\'s Watch', 54000.00, 'assets/images/P19.png'),
(20, 'MVMT Men Blacktop Analogue Chronograph Watch', 56000.00, 'assets/images/P20.png'),
(21, 'Tom Brady\'s Exclusive Watch', 4000000.00, 'assets/images/P21.png'),
(22, 'Astos Millionaire\'s Watch', 1500000.00, 'assets/images/P22.png'),
(23, 'Fintime Sapphire and Silver Watch', 1000000.00, 'assets/images/P23.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
