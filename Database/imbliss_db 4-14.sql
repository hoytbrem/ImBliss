-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2024 at 12:37 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci,
  `category` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `meta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `price`, `description`, `category`, `image`, `meta_id`) VALUES
(4, 'Recycled Cotton T-Shirt', 15, 'Wear the ImBliss brand in 100% recycled cotton- soft, breathable and eco-friendly.', 'merch', 'ImBliss-Hanging-White-T-Shirt.jpg', 16),
(5, 'ImBliss Recycled Cotton Sweatshirt', 22, 'Wear the ImBliss brand in 100% recycled cotton- soft and breathable.', 'merch', 'ImBliss-Model-Sweatshirt.jpg', 17),
(6, 'Stainless-Steel Bottle', 12, 'Hot drink? Cold drink? This stainless-steel bottle keeps both at just the right temperature for up to 8 hours. That way you can take your favorite drink on the go, anywhere life leads you. Recycled rubber seal keeps drinks air-tight. Free from BPA. Dishwasher safe.', 'merch', 'ImBliss-Water-Bottle.jpg', 18),
(7, 'ImBliss Stoneware Mug', 9, 'Vibrant stoneware mugs, thoughtfully designed with durability and eco-friendly materials to reduce waste. Perfect to enjoy any coffee, tea, or even a little cup of soup! Dishwasher and microwave safe.', 'merch', 'ImBliss-Coffee-Mug-Condensed.jpg', 19),
(8, 'ImBliss Tote Bag', 9, 'This tote is perfect for groceries, travel, or a quick trip to the beach! Our hemp and cotton fiber bags are long-lasting, durable and soft. ', 'merch', 'ImBliss-Tote-Bag.jpg', 20),
(9, 'Hemp Drawstring Bag', 15, 'Keep it all safe with a reusable tote bag, made with durable hemp rope and soft cotton fiber. Great for packing, your favorite book, or gym and sports. (And maybe to hold your delicious ImBliss bar!) ', 'merch', 'ImBliss-Burlap-Bag.jpg', 21),
(10, 'ImBliss Sticker', 4, 'Decorate your life with our recycled paper sticker. Inspired by fresh air, green leaves and delicious ripe fruit. ', 'merch', 'ImBliss-Sticker.jpg', 22),
(11, 'Premium Box ', 5, 'Deliver your order in a biodegradable box. Give it that little extra something. Perfect for gifts! Comes in two styles: SIMPLE and SLOGAN. Max 15 items per box.', 'merch', 'ImBliss-Premium-Package-Condensed.jpg', 23),
(12, 'Pecan Cherry Energy Bites', 13, 'Eco friendly pecans and delicious dried cherries dipped in free-trade dark chocolate deliver you a delicious, sweet and fruity snack. ', 'energy bites', 'ImBliss-Pecan-Cherry-Energy-Bites.jpg', 24),
(13, 'Antioxidant Blend', 8, 'Nurture your body with antioxidant rich granola. Loaded with delicious dried cranberries, orange peel, fair-trade dark chocolate on a classic oat base- This blend is sure to leave you feeling refreshed and energized.', 'granola', 'ImBliss-Antioxidant-Blend-Granola.jpg', 25),
(14, 'ImBliss Blend Granola', 8, 'Our fan-favorite ImBliss blend in a snackable granola form! Fruit, nuts, toasted oats and chocolate go perfectly with a plant based milk, yogurt, or on its own as a quick energy boost.', 'granola', 'ImBliss-Blend-Granola.jpg', 26),
(15, 'Chocolate Rain Granola', 8, 'Did we hear that right, quadruple chocolate!? That\'s right! With organic cocoa butter, dutch-processed cocoa powder, chocolate chips and real cocoa nibs, you can have it all. Plus, our granola is vegan, has no added sugar, and all the health benefits of delicious dark chocolate!', 'granola', 'ImBliss-Chocolate-Rain-Granola.jpg', 27),
(16, 'Lemon Vanilla & Blueberry Granola', 8, 'Bright lemon zest gives a zing to delicious dried California blueberries, supported by a classic oat base. Plus, vanilla bean paste and maple syrup sweeten the blend and make delicious, snackable clusters! A fresh and healthy snack, perfect for a sunny Spring day.', 'granola', 'ImBliss-Lemon-Vanilla-Blueberry-Granola.jpg', 28),
(17, 'Maple Pecan Cluster Granola', 8, 'Organic maple syrup and pecans are featured in this blend, making sweet caramely clusters of granola perfect for a quick snack or added to your breakfast. With no added sugar and a list of vegan, organic ingredients, you can feel good knowing your next meal is healthy.', 'granola', 'ImBliss-Maple-Pecan-Cluster-Granola.jpg', 29),
(18, 'Orange Cranberry Granola', 8, 'Orange zest and dried cranberries pair with walnuts, oats, cinnamon and maple syrup to make delicious clusters of crunchy granola. Specially crafted to bring you flavors reminiscent of a homemade, chewy and sweet oatmeal cookie.', 'granola', 'ImBliss-Orange-Cranberry-Granola.jpg', 30),
(19, 'Peanut Butter Cup Granola ', 8, 'The classic combo of peanut butter and chocolate shine in this granola mix. Featuring roasted peanuts, free-trade dark chocolate and 100% peanut protein powder, all tied together with a cocoa and peanut butter base to make delicious crunchy clusters.', 'granola', 'ImBliss-Peanut-Butter-Cup-Granola.jpg', 31),
(20, 'Pina Colada Granola', 8, 'Take a little vacation! Dried pineapple, coconut, fresh lime zest and Caribbean spices will teleport you to tropical beaches. Think fresh, natural and organic- plus, in a convenient granola form. Perfect to enjoy on yogurt, as cereal or simply as a quick snack!', 'granola', 'ImBliss-Pina-Colada-Granola.jpg', 32);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `meta_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci,
  `title` varchar(70) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `keywords` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `robots` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT 'all',
  `alt_text` varchar(125) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`meta_id`, `description`, `title`, `keywords`, `robots`, `alt_text`) VALUES
(15, 'Meta Description goes here', 'Title of page', 'key, words', 'noindex, nofollow', 'A test image'),
(16, 'ImBliss | Products |  ImBliss 100% Recycled Cotton T-Shirt. Wear the ImBliss brand in 100% recycled cotton- soft, breathable and eco-friendly.', 'Recycled Cotton T-Shirt | ImBliss. Shop green products now', 'eco-friendly, recycled, ImBliss, T-shirt, green', '', 'T-shirt with the ImBliss logo, on a wooden coat hanger, on light blue background'),
(17, 'ImBliss | Products |  ImBliss 100% Recycled Cotton Sweatshirt. Wear the ImBliss brand in 100% recycled cotton- soft, breathable and eco-friendly.', 'Recycled Cotton Sweatshirt | ImBliss. Show green products now', 'eco-friendly, recycled, ImBliss, sweatshirt, green', '', 'Woman on a beach, joyful, wearing a white sweatshirt with the ImBliss logo.'),
(18, 'ImBliss | Products |  ImBliss Stainless Steel Bottle. Hot drink? Cold drink? This stainless-steel bottle keeps both at just the right temperature.', 'Stainless Steel Bottle | ImBliss. Shop green products now', 'ImBliss, drink, air-tight bottle, stainless-steel', '', 'A stainless steel mug with a metal lid, and a matte design on its side displaying the ImBliss logo.'),
(19, 'ImBliss | Products |  ImBliss Stoneware Mug. Vibrant stoneware mugs, thoughtfully designed with durability and eco-friendly materials to reduce waste.', 'Stoneware Mug | Imbliss. Shop green products now', 'eco-friendly, mug, stoneware', '', 'A mug with a green inside and handle. The outside is white with a black and green pattern, featuring the ImBliss logo.'),
(20, 'ImBliss | Products |  ImBliss Hemp Tote Bag. This tote is perfect for groceries, travel, or a quick trip to the beach! See more ', 'Tote Bag | ImBliss. Shop green products now', 'bag, tote, hemp, durable', '', 'A tote bag featuring the ImBliss logo and a simple floral design, arranged on a blue surface, with wood and dried ornamentals'),
(21, 'ImBliss | Products |  ImBliss Hemp Drawstring Bag. Keep it all safe with a reusable tote bag, made with durable hemp rope and soft cotton fiber.', 'Hemp Drawstring Bag | ImBliss. Show green products now', 'ImBliss, bag, drawstring, hemp, durable', '', 'A drawstring bag, with an abstract green and orange design featuring the ImBliss logo. Pictured on a blue surface with wood.'),
(22, 'ImBliss | Products |  ImBliss Sticker. Decorate your life with our recycled paper sticker. Inspired by fresh air, green leaves and delicious ripe frui', 'ImBliss Sticker | Imbliss. Shop green products now', 'sticker, recycled, decorate, ImBliss', '', 'A round sticker with an abstract floral design, featuring the ImBliss logo in its center. It rests on a blue surface.'),
(23, 'ImBliss | Products | Premium Box. Deliver your order in a biodegradable box. Give it that little extra something. ', 'Premium Box | Imbliss. Shop green products now', 'ImBliss, box, premium, biodegradable, gift', '', 'A cardboard box with a simple floral pattern. The ImBliss logo is displayed on its top, and slogan on its front.'),
(24, 'ImBliss | Products |  Pecan Cherry Energy Bites. Eco friendly pecans and delicious dried cherries dipped in free-trade dark chocolate.', ' Pecan Cherry Energy Bites | ImBliss. Shop green products now', 'Energy Bites, ImBliss, pecan, cherry, eco-friendly', '', 'A bag of ImBliss energy bites, decorated with pecans and fresh cherries, and the ImBliss logo, on a light blue background'),
(25, 'ImBliss | Products |  Antioxidant blend granola. Nurture your body with antioxidant rich granola. Loaded with delicious dried cranberries, orange peel', 'Antioxidant blend granola | ImBliss. Shop green products now', 'antioxidant, granola, imbliss, fair-trade', '', 'A bag of ImBliss granola, decorated with oats, dried fruit, orange and a splash of red cranberry juice.'),
(26, 'ImBliss | Products |  ImBliss Blend Granola. Our fan-favorite ImBliss blend in a snackable granola form! Fruit, nuts, toasted oats and chocolate.', 'ImBliss Blend Granola | ImBliss. Shop green products now', 'ImBliss, granola, snack, energy', '', 'A bag of ImBliss granola, decorated with pecans, chocolate, oats and dried fruit.'),
(27, 'ImBliss | Products |  Chocolate Rain Granola. With organic cocoa butter, dutch-processed cocoa powder, chocolate chips and real cocoa nibs, you can ha', 'Chocolate Rain Granola | ImBliss. Shop green products now', 'imbliss, granola, chocolate, organic, vegan', '', 'A bag of ImBliss granola, decorated with oats, dried fruit and melted chocolate chunks.'),
(28, 'ImBliss | Products |  Lemon Vanilla & Blueberry Granola. Bright lemon zest gives a zing to delicious dried California blueberries, supported by a clas', 'Lemon Vanilla & Blueberry Granola | ImBliss. Shop green products now', 'granola, imbliss, lemon, blueberry, healthy, snack', '', 'A bag of ImBliss granola, decorated with lemon, blueberries, oats and a vanilla orchid blossom'),
(29, 'ImBliss | Products |  Maple Pecan Cluster GranolaOrganic maple syrup and pecans are featured in this blend, making sweet caramely clusters of granola ', 'Maple Pecan Cluster Granola | ImBliss. Shop green products now', 'ImBliss, granola, snack, vegan, healthy, organic', '', 'A bag of ImBliss granola, decorated with oats, pecans and a splash of maple syrup.'),
(30, 'ImBliss | Products | Orange Cranberry Granola', 'Orange Cranberry Granola | ImBliss. Shop green products now', 'granola, imbliss, orange, cranberry', '', 'A bag of ImBliss granola, decorated with oats, dried fruit, orange and a splash of red cranberry juice.'),
(31, 'ImBliss | Products |  Peanut Butter Cup Granola', 'Peanut Butter Cup Granola | ImBliss. Shop green products now', 'granola, imbliss, protein, chocolate, peanut', '', 'A bag of ImBliss granola, decorated with oats, peanut butter cups and splashes of chocolate and peanut butter'),
(32, 'ImBliss | Products | Pina Colada Granola', 'Pina Colada Granola', 'granola, imbliss, snack, organic, natural', '', 'A bag of ImBliss granola, decorated with oats, sliced pineapple, coconuts and a pina collada.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(125) NOT NULL,
  `user_last_name` varchar(125) NOT NULL,
  `user_email` varchar(125) NOT NULL,
  `user_password` varchar(125) NOT NULL,
  `user_admin` tinyint(1) DEFAULT NULL,
  `user_street_address` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_state` varchar(255) DEFAULT NULL,
  `user_zip_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_admin`, `user_street_address`, `user_city`, `user_state`, `user_zip_code`) VALUES
(1, 'Devon', 'Plagemann', 'test@email.com', 'test', 1, NULL, NULL, NULL, NULL),
(2, 'Person', 'PersonLName', 'person@email.com', 'test', 1, NULL, NULL, NULL, NULL),
(3, 'Sam', 'Samson', 'sam@email.com', 'Sam', NULL, NULL, NULL, NULL, NULL),
(4, 'Alex', 'Johnson', 'alex@email.com', 'testing', NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
