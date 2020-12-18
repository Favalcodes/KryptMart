-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2020 at 07:48 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, ''),
(2, 'Bag'),
(3, 'Shoe');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(500) DEFAULT NULL,
  `category` varchar(500) NOT NULL,
  `amount` varchar(500) DEFAULT NULL,
  `discount` varchar(500) DEFAULT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `moq` varchar(500) DEFAULT NULL,
  `product` varchar(500) DEFAULT NULL,
  `download` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(150) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `category`, `amount`, `discount`, `tags`, `moq`, `product`, `download`, `created_at`, `description`, `image_1`, `image_2`, `image_3`, `image_4`) VALUES
(25, 'Alexander Alston', 'hair', 'Aute tempor sit et ', 'Blanditiis et beatae', 'Eius debitis eveniet', '89', '', '102', '2020-12-18 19:45:23', 'Id sapiente voluptat', 'back.PNG', 'back.PNG', 'back.PNG', 'back.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `discount` varchar(500) DEFAULT NULL,
  `tags` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `product` varchar(500) NOT NULL,
  `download` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `tag` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `country`, `role`, `username`, `store_name`, `company`, `product_type`, `comp`, `created_at`) VALUES
(1, 'Favour', 'Godwin', 'admin@blockvilla.com', '$2y$10$td8C0eNlnYw2mGEGnPfaCOBGfut1CaxhR.frSP76cSh7K1YFuL1gS', '09061591694', 'Nigeria', 'seller', NULL, 'valStore', '', '', NULL, '2020-12-16 19:43:07'),
(2, 'Favour', 'Arua', 'admin@block.com', '$2y$10$Nsv5pV.FCeOgiDo6wguogusMXns.kSb4auFnpVBZFEqh/RFFgGfkK', '+2347054528890', 'Nigeria', 'manufacturer', NULL, '', '', 'Hair', NULL, '2020-12-17 11:25:33'),
(3, 'Favour', 'Godwin', 'godwinvalerie3@gmail.com', '$2y$10$PjICQyNFg3ovsqX5T76zw.QNHLAtqwBO3cQ78cW6UgECmaxQnCNgi', 'godwinvalerie3@gmail.com', 'Nigeria', 'seller', NULL, 'valStore', 'Valtech', '', NULL, '2020-12-17 15:37:11'),
(4, 'Favour', 'Arua', 'vendor@me.com', '$2y$10$j.2V/ZOMO1hAXLFCMOHG7OQjadwzZPCdFfxtN4zNuh0zDrWS3Fqg.', '07054528890', 'Nigeria', 'customer', NULL, '', '', '', NULL, '2020-12-17 15:42:44'),
(5, 'val', 'baby', 'val@me.com', '$2y$10$JlBzvwIR6JNqRywRbiVnrOmZig1AVqHtmbzPcbaVuF37CqZEHjkXe', '09061591694', 'Nigeria', 'merchant', NULL, '', '', '', 'QuickDeliver', '2020-12-17 15:54:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
