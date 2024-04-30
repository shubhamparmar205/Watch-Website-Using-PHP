-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 09:24 AM
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
-- Database: `watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(12, 1, 1),
(14, 3, 11),
(20, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(8) NOT NULL,
  `item_id` int(8) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'confirmed',
  `user_id` int(8) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `item_id`, `status`, `user_id`, `date`) VALUES
(4, 17, 'confirmed', 2, '2024-04-02'),
(5, 2, 'confirmed', 1, '2024-04-06'),
(8, 3, 'confirmed', 3, '2024-04-08'),
(11, 34, 'confirmed', 2, '2024-04-09'),
(12, 3, 'confirmed', 1, '2024-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT current_timestamp(),
  `Place` varchar(20) NOT NULL DEFAULT 'arrival',
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `Place`, `subject`) VALUES
(3, 'Calendrier', '', 10000.00, './assets/products/w1.png', '2020-03-28 11:08:57', 'featured', 'Women'),
(5, 'Sport Luxury', '', 10000.00, './assets/products/w2.png', '2020-03-28 11:08:57', 'featured', 'Women'),
(6, 'Citizen L Mae', '', 10000.00, './assets/products/w3.png', '2020-03-28 11:08:57', 'featured', 'Women'),
(7, 'Corso Diamond', '', 10000.00, './assets/products/w4.png', '2020-03-28 11:08:57', 'featured', 'Women'),
(8, 'Corso Diamond G', '', 10000.00, './assets/products/w5.png', '2020-03-28 11:08:57', 'arrival', 'Women'),
(9, 'Promaster Dive', '', 10000.00, './assets/products/w6.png', '2020-03-28 11:08:57', 'arrival', 'Women'),
(10, 'Sport Luxury', '', 10000.00, './assets/products/w7.png', '2020-03-28 11:08:57', 'arrival', 'Women'),
(11, 'Citizen L Mae G', '', 10000.00, './assets/products/w8.png', '2020-03-28 11:08:57', 'arrival', 'Women'),
(12, 'Empowered Minnie Mouse', '', 10000.00, './assets/products/w9.png', '2020-03-28 11:08:57', 'arrival', 'Women'),
(13, 'Bianca', '', 10000.00, './assets/products/w10.png', '2020-03-28 11:08:57', 'arrival', 'Women'),
(14, 'Tsuki-yomi A-T', '', 10000.00, './assets/products/1.png', '2020-03-28 11:08:57', 'arrival', 'Men'),
(15, 'Promaster Dive', '', 10000.00, './assets/products/2.png', '2020-03-28 11:08:57', 'arrival', 'Men'),
(16, 'Peyten', '', 10000.00, './assets/products/3.png', '2020-03-28 11:08:57', 'arrival', 'Men'),
(20, 'Series8 890', '', 10000.00, './assets/products/4.png', '2020-03-28 11:08:57', 'arrival', 'Men'),
(21, 'Series8 890', '', 10000.00, './assets/products/4.png', '0000-00-00 00:00:00', 'arrival', 'Men'),
(29, 'TSUYOSA', '', 10000.00, './assets/products/6.png', NULL, 'arrival', 'Men'),
(31, 'TSUYOSA', '', 10000.00, './assets/products/7.png', '2024-04-07 14:53:12', 'featured', 'Men'),
(32, 'HAKUTO-R', '', 10000.00, './assets/products/8.png', '2024-04-07 14:54:18', 'featured', 'Men'),
(33, 'Promaster Skyhawk A-T', '', 10000.00, './assets/products/10.png', '2024-04-09 11:05:17', 'arrival', 'Men'),
(34, 'Promaster Altichron', '', 10000.00, './assets/products/9.png', '2024-04-09 11:07:24', 'arrival', 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `access` varchar(20) NOT NULL DEFAULT 'consumer',
  `email` varchar(30) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `access`, `email`, `register_date`) VALUES
(1, 'admin', 'admin@123', 'admin', 'shubhamparmar200805@gmail.com', NULL),
(2, 'User', 'user@123', 'consumer', 'User123@gmail.com', '2020-03-28 13:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
