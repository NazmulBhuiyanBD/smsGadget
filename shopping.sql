-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 07:29 PM
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
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `userId`, `topic`, `description`) VALUES
(1, 5, 'hello', 'gdgdg'),
(2, 5, 'hello', 'gdgdgdg'),
(13, 5, 'hello', ''),
(14, 7, 'pika pika ', 'pika pika pikachuda'),
(15, 2, 'sifat bolod', 'sifat bolod .ghumai halai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(100) NOT NULL,
  `productId` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `quantity` int(100) NOT NULL,
  `OrderDescription` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Order Description';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `productId`, `status`, `quantity`, `OrderDescription`, `price`) VALUES
(1, 102, 'processing', 1, 'fsssf', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `category`, `image_path`, `description`, `price`) VALUES
(15, 'Redmi note 14 pro', 'Xiaomi', 'mobile', 'uploads/3.png', 'this is mobile', 250.00),
(16, 'bayzid', 'Human', 'speaker', 'uploads/photo_2024-12-03_23-01-48.jpg', 'valo chele', 150.00),
(17, 'bayzid', 'safasfsf', 'mobile', 'uploads/photo_2024-12-10_21-46-37.png', 'hay bayzid .best of luck', 105.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `password`, `phoneNumber`, `created_at`) VALUES
(1, 'Customer', 'fsfkasdhgfkjasdf', '$2y$10$ug43.IOiuJDFpCsX7I3DheaDsbkVj21kYWPO8p4wDg4L.5i3OsNSO', '015555', '2024-11-29 06:50:20'),
(2, 'Customer', 'Md nazmul haque', '$2y$10$BQ0tvObsQpWNW2XWz.HI1.vJolWCy5vauOhTUgsi6f2WZ49YdpO7e', '01839491585', '2024-11-29 14:55:35'),
(3, 'Customer', 'nazmul haque', '$2y$10$LDHuY5nG6gm9MXHredaLBeanHQDsklSZOAcQkabNJKyTJihHikMfy', '0183949158', '2024-11-29 15:07:19'),
(4, 'Customer', 'bayzid', '$2y$10$CASjuEXjvlG9INr8FP9LRu8AUQTNja9e9kKTN/NYRHI112aXn33Xm', '017775655', '2024-11-29 15:36:31'),
(5, 'Admin', 'Admin', '$2y$10$pqM/ty76YCDxvYlApXR.P.8rP8ZCvFgdBYEoX0TpU1pLfAKI3M8pm', '01999999999', '2024-11-30 16:09:56'),
(6, 'Customer', 'nazmul', '$2y$10$cIS0z89P/xgBQPMZ0I4NXu6MsOzCWXbuFDR/JBFL02V364ciwVXTy', '0155', '2024-12-10 14:30:57'),
(7, 'Customer', 'masud', '$2y$10$bkMRrqhTFzFB.tBtHXyYv.IVDQDeFmFAi512Oo028jhTSMR.5BNli', '0177', '2024-12-10 15:54:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
