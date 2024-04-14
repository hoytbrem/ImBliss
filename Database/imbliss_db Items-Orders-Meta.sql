-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2024 at 06:22 PM
-- Server version: 11.2.3-MariaDB
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imbliss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `meta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `price`, `description`, `category`, `image`, `meta_id`) VALUES
(3, 'Test', 3, 'Product description goes here', 'test', 'CustomLoginLogo31.png', 15),
(7, 'This is another test', 3, 'test', 'chocolate bars', 'dsfdf.png', 20),
(8, 'Banana', 5, 'its an apple now', 'vegetables', 'dsfdf.png', 21),
(9, 'New Product Version Tester', 99, 'Testing new product here.', 'test', 'dsfdf.png', 22),
(10, 'Lakeshore Logo', 10, 'A logo of Lakeshore Technical College', 'merchandise', 'ltc.png', 23);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `meta_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `title` varchar(70) DEFAULT NULL,
  `keywords` varchar(50) DEFAULT NULL,
  `robots` varchar(50) DEFAULT 'all',
  `alt_text` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`meta_id`, `description`, `title`, `keywords`, `robots`, `alt_text`) VALUES
(15, 'Meta Description goes here', 'Title of page', 'key, words', 'noindex, nofollow', 'A test image'),
(16, 'Meta Description goes here', 'meta title and title goes here', 'key, words', 'noindex', 'alttext goes here'),
(17, 'test', 'test', 'test', '', 'test'),
(18, '', '', '', '', ''),
(19, NULL, NULL, NULL, NULL, NULL),
(20, 'test', 'test', 'test', 'noindex', 'test'),
(21, 'this is a new meta', 'new title', 'new keywords', 'noindex, nofollow', 'testest'),
(22, 'A meta description will go here.', 'A meta title will go here.', 'some, key, words', 'noindex, nofollow', 'Image alt text will go here.'),
(23, 'Meta description goes here', 'Meta title goes here', 'keywords, go, here', 'noindex', 'The Lakeshore Technical College logo.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '' CHECK (json_valid(`items`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci COMMENT='Using the plural "orders" as "order" is a reserved keyword.';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `meta_id` (`meta_id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`meta_id`) REFERENCES `meta` (`meta_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
