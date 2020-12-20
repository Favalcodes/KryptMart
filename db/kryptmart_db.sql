-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 11:43 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kryptmart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(2, 'Bag'),
(9, 'Electronics'),
(10, 'Gadgets'),
(8, 'Hair'),
(4, 'Perfume'),
(3, 'Shoe'),
(5, 'Tops'),
(6, 'Trousers'),
(7, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(50) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `discount` varchar(500) DEFAULT NULL,
  `tags` varchar(500) NOT NULL,
  `moq` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image_1` varchar(250) NOT NULL,
  `image_2` varchar(250) DEFAULT NULL,
  `image_3` varchar(250) DEFAULT NULL,
  `image_4` varchar(250) DEFAULT NULL,
  `product` varchar(250) DEFAULT NULL,
  `download` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`id`, `user_id`, `p_name`, `category`, `amount`, `discount`, `tags`, `moq`, `description`, `image_1`, `image_2`, `image_3`, `image_4`, `product`, `download`, `created_at`) VALUES
(1, 0, '', 'makeup', 'Zara', 'Eth 0.04', 'Makeup kit', '', '6', 'perf.jpg', 'bag2.jpg', 'bag3.jpg', 'bag4.jpg', 'powder, lipstick, zara', '', '2020-12-19 08:08:30'),
(2, 0, 'ValBag', 'bag', 'Eth0.02', '', 'bags, bag', '4', 'Durable Bags', 'bag1.jpg', '', '', '', '', '', '2020-12-19 08:14:10'),
(3, 0, 'ValBag', 'bag', '0.045', '', 'bags, bag', '7', 'Beautiful bags', 'bag2.jpg', 'bag3.jpg', '', '', '', '', '2020-12-19 08:37:40'),
(4, 2, 'Gucci', 'shoe', '0.5', '', 'shoe, shoes', '8', 'Original shoes', 'bag2.jpg', 'bag3.jpg', '', '', '', '', '2020-12-19 14:05:19'),
(5, 2, 'Channel', 'bag', '0.056', '', 'bags, bag', '3', 'beautiful and durable bag', 'bag4.jpg', 'bag3.jpg', '', '', '', '', '2020-12-19 14:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('Pending','Completed','Cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(50) NOT NULL,
  `tag` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(2, 'bag'),
(1, 'bags'),
(4, 'phone'),
(5, 'phones'),
(3, 'shoe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `username` varchar(500) DEFAULT NULL,
  `store_name` varchar(500) DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `product_type` varchar(500) DEFAULT NULL,
  `comp` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `country`, `role`, `username`, `store_name`, `company`, `product_type`, `comp`, `created_at`) VALUES
(1, 'Favour', 'Godwin', 'admin@blockvilla.com', '$2y$10$td8C0eNlnYw2mGEGnPfaCOBGfut1CaxhR.frSP76cSh7K1YFuL1gS', '09061591694', 'Nigeria', 'seller', NULL, 'valStore', '', '', NULL, '2020-12-16 19:43:07'),
(2, 'Favour', 'Arua', 'admin@block.com', '$2y$10$Nsv5pV.FCeOgiDo6wguogusMXns.kSb4auFnpVBZFEqh/RFFgGfkK', '+2347054528890', 'Nigeria', 'manufacturer', NULL, '', '', 'Hair', NULL, '2020-12-17 11:25:33'),
(3, 'Favour', 'Godwin', 'godwinvalerie3@gmail.com', '$2y$10$PjICQyNFg3ovsqX5T76zw.QNHLAtqwBO3cQ78cW6UgECmaxQnCNgi', 'godwinvalerie3@gmail.com', 'Nigeria', 'seller', NULL, 'valStore', 'Valtech', '', NULL, '2020-12-17 15:37:11'),
(4, 'Favour', 'Arua', 'vendor@me.com', '$2y$10$j.2V/ZOMO1hAXLFCMOHG7OQjadwzZPCdFfxtN4zNuh0zDrWS3Fqg.', '07054528890', 'Nigeria', 'customer', NULL, '', '', '', NULL, '2020-12-17 15:42:44'),
(5, 'val', 'baby', 'val@me.com', '$2y$10$JlBzvwIR6JNqRywRbiVnrOmZig1AVqHtmbzPcbaVuF37CqZEHjkXe', '09061591694', 'Nigeria', 'merchant', NULL, '', '', '', 'QuickDeliver', '2020-12-17 15:54:17'),
(6, 'Favour', 'Arua', 'valy@me.com', 'motherfuckers', '07054528890', 'Nigeria', 'seller', NULL, 'valStore', '', '', '', '2020-12-19 20:35:02'),
(7, 'Favour', 'Godwin', 'val@me.comy', '1234567890', '09061591694', 'Nigeria', 'customer', NULL, '', '', '', '', '2020-12-19 20:36:49'),
(8, 'boo', 'baby', 'baby@boo.com', 'e807f1fcf82d132f9bb018ca6738a19f', '09061591694', 'New Zealand', 'customer', 'Favalcodes', '', '', '', '', '2020-12-19 20:54:17'),
(9, 'hey', 'any', 'hey@any.com', '25d55ad283aa400af464c76d713c07ad', '09061591694', 'Nigeria', 'customer', 'valbae', '', '', '', '', '2020-12-19 20:57:59'),
(10, 'Favour', 'Godwin', 'vend@me.com', '$2y$10$MHb8qCw.jEFW7ZdM3C1wwerBHr18xARDGcN7mxeI0hE41v4lGSJZm', '09061591694', 'Nigeria', 'seller', '', 'love', '', '', '', '2020-12-19 23:04:00'),
(11, 'Valero', 'Godwin', 'customer@krypt.com', '$2y$10$9HkokevExosK78JS6tD3OugMjy89d.UeUdFN83T/i3kjrMRT7vsau', '09063476476', 'New Zealand', 'customer', 'valbae', '', '', '', '', '2020-12-19 23:05:39'),
(12, 'Gucci', 'bags', 'gucci@gucci.com', '$2y$10$v0IczHiLEGeCc507V3yWgeTpJwUVK9u2QGf7zRmOu9DmAR8dHc8EG', '23456785676', 'Algeria', 'manufacturer', '', '', 'Gucci', 'Bag', '', '2020-12-19 23:07:07'),
(13, 'Quick', 'way', 'quickway@mail.com', '$2y$10$HKTJDDqlCcbACG27uxplFugqzh5TC3mtMJa8psCUKcZGftH4PstF2', '45678987654', 'Algeria', 'merchant', '', '', '', '', 'QuickWay', '2020-12-20 20:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `discount` varchar(500) DEFAULT NULL,
  `tags` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image_1` varchar(500) NOT NULL,
  `image_2` varchar(250) DEFAULT NULL,
  `image_3` varchar(250) DEFAULT NULL,
  `image_4` varchar(250) DEFAULT NULL,
  `product` varchar(250) DEFAULT NULL,
  `download` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `user_id`, `p_name`, `category`, `amount`, `discount`, `tags`, `description`, `image_1`, `image_2`, `image_3`, `image_4`, `product`, `download`, `created_at`) VALUES
(1, 0, 'ValBag', 'bag', 'Eth 0.04', '', 'bags, bag', 'durable bag', 'bag2.jpg', 'bag3.jpg', '', '', '', '', '2020-12-19 10:36:51'),
(2, 2, 'Rolex', 'cloth', '0.35', '', 'watch, watches', 'Real Rolex', 'bag4.jpg', '', '', '', '', '', '2020-12-19 11:17:51'),
(3, 2, 'Zara', 'makeup', 'Eth 0.04', '', 'powder, lipstick, zara', 'Makeup Kit', '2.jpg', '1.jpg', '', '', '', '', '2020-12-19 11:19:00'),
(4, 2, 'Novel', 'shoe', '1', '', 'book, books, novel', 'A nice book to read.', 'Rejoice art wrk.png', '', '', '', 'kryptmart.docx', '3', '2020-12-19 11:30:49'),
(5, 2, 'Novel', 'shoe', '1', '', 'book, books, novel', 'A nice book to read.', 'Rejoice art wrk.png', '', '', '', 'kryptmart.docx', '3', '2020-12-19 11:33:55'),
(6, 2, 'Alice in wonderland', 'shoe', '0.15', '', 'book, books, novel', 'A nice novel', 'bag2.jpg', '', '', '', 'kryptmart.docx', '5', '2020-12-19 11:39:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`category`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
