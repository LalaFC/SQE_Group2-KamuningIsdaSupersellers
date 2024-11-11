-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 01:15 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `inventory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`) VALUES
(8, 'E-Mars Enterprises'),
(9, 'Korea-Philippines Seafood Processing Complex'),
(10, 'Amanda’s Marine Products'),
(11, 'Angel Farmers Gourmet Food Corp.'),
(12, 'Bulacan HJR International Incorporation'),
(13, 'Elite Del Dragon Inc.'),
(14, 'Golden Tiger Export Ventures, Inc'),
(15, 'Mica by the Sea'),
(16, 'TGA Foods Corp.'),
(17, 'Aling Ludy’s Seafood Dealer'),
(18, 'Akian Food Processing Corp.'),
(19, 'Arko Food Phils, Inc'),
(20, 'AFOW Marine Product'),
(21, 'A. Tung Chingco Manufacturing Corp.'),
(22, 'Bernas Seafoods Trading'),
(23, 'Bluefin Seafood Export, Inc.'),
(24, 'Chen-Kao Marine Corp.'),
(25, 'CMSE Seafoods Trading'),
(26, 'Eoana Canning and Food Processing Corp.'),
(27, 'Frabelle Market Corp.'),
(28, 'Golden Hands Manufacturing Corp.'),
(29, 'Kai-Anya Foods, Inc.'),
(30, 'Millennium Ocean Star Corp.'),
(31, 'Ozean 8 Trading Corp.'),
(32, 'Penamae Fish Trading'),
(33, 'Philprawns and Seafood Corp.'),
(34, 'Royale Fishing Corp.'),
(35, 'Sakurey Trading'),
(36, 'Southern Giant Star Int’l. Seafood Providers, Inc.'),
(37, 'SLORD Development Corp.'),
(38, 'TC International Seafoods Provider, Inc'),
(39, 'Tiger Marine Products'),
(40, 'Unifish Inc.'),
(41, 'Yeung Marine Products'),
(42, 'Camarines Bigfin Seafoods Trading Inc.'),
(43, 'CARM Foods Enterprise, Inc.'),
(44, 'Donny’s Choice Food Processing Export & Import Corp.'),
(45, 'Doc Peter Foods Corp.'),
(46, 'Fukui Food Philippines Inc.'),
(47, 'JNCL Ocean Ventures, Inc.'),
(48, 'Ipil Oriental Food Export & Consolidator'),
(49, 'Ocean Aquamarine Products Enterprises'),
(50, 'Sunrich Manufacturing Corp.'),
(51, 'Verdure Seafood Republic, Inc'),
(52, 'Triton Products Corp.'),
(53, 'T & T Aquamarine Ventures Corp.'),
(54, 'Master Chang’s Seafoods'),
(55, 'SanMar Marine Products and Export'),
(56, 'PFL Export Trading'),
(57, 'Seaworld Export-Import Traders'),
(58, 'Siargo’s Bountry Seafoods Corp.'),
(59, 'Chinoy Seafood Exporter and Importer'),
(60, 'Millenium Ocean Star Corp. (Samar)'),
(61, 'TBK Manufacturing Corp.'),
(62, 'Alenter Food, Inc.'),
(63, 'Aquatic Food Manufacturing Corp.'),
(64, 'Bicol Blue Star Export Corp.'),
(65, 'Dai-Hai Marine Products Corp.'),
(66, 'Kim Marine Products'),
(67, 'B-KING Fish Processor'),
(68, 'Camsur Canning Corp.'),
(69, 'We Golden High International Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Miguel Angelo Malsi', 'miguelmalsi04@gmail.com', '0ad8f3b2ce6fe9ca0d8a534b0fb4f37e', 'admin'),
(2, 'Test User', 'test.user@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'user'),
(3, 'Boi Bawang', 'bawangboi@stanford.edu.ph', 'c93ccd78b2076528346216b3b2f701e6', 'admin'),
(4, 'Test User 2', 'test.user2@pmail.com', 'a119e534072584a0ea88cdea4664aecd', 'user'),
(9, 'supp3', 'supplier1@supp.com', '3367cfa4bfc7dc05bdc65aa7bf8d39ac', 'wholesale'),
(10, 'Patrick Ramos', 'lolol@gmail.com', '8f036369a5cd26454949e594fb9e0a2d', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wholesale`
--

CREATE TABLE `wholesale` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wholesale`
--

INSERT INTO `wholesale` (`id`, `supplier_id`, `supplier_name`, `product_id`, `product_name`, `image`) VALUES
(64, 8, 'E-Mars Enterprises', 90, 'Tilapia', 'uploaded_img/Tilapia.jpg'),
(65, 20, 'AFOW Marine Product', 91, 'Yellowfin Tuna', 'uploaded_img/Tuna-Yellow-Fin.jpg'),
(66, 16, 'TGA Foods Corp.', 93, 'Bangus', 'uploaded_img/Bangus.jpg'),
(67, 15, 'Mica by the Sea', 94, 'Lapu Lapu', 'uploaded_img/Lapu-Lapu-Red.jpg'),
(68, 18, 'Akian Food Processing Corp.', 95, 'Tamban', 'uploaded_img/Tamban.jpg'),
(69, 22, 'Bernas Seafoods Trading', 96, 'Anchovies', 'uploaded_img/white.jpg'),
(70, 45, 'Doc Peter Foods Corp.', 97, 'Red Snapper', 'uploaded_img/Red Snapper.jpg'),
(71, 52, 'Triton Products Corp.', 98, 'Tulingan', 'uploaded_img/Tulingan.jpg'),
(72, 10, 'Amanda’s Marine Products', 99, 'Galunggong', 'uploaded_img/Galunggong.jpg'),
(73, 68, 'Camsur Canning Corp.', 100, 'Dalagang Bukid', 'uploaded_img/Dalagang-Bukid.jpg'),
(74, 17, 'Aling Ludy’s Seafood Dealer', 101, 'Slipmouth Fish', 'uploaded_img/white.jpg'),
(75, 13, 'Elite Del Dragon Inc.', 102, 'Hasahasa', 'uploaded_img/Hasahasa.jpg'),
(76, 21, 'A. Tung Chingco Manufacturing Corp.', 103, 'Barramundi', 'uploaded_img/white.jpg'),
(77, 9, 'Korea-Philippines Seafood Processing Complex', 104, 'Pompano', 'uploaded_img/Pompano.jpg'),
(78, 12, 'Bulacan HJR International Incorporation', 105, 'Threadfin Bream', 'uploaded_img/white.jpg'),
(79, 22, 'Bernas Seafoods Trading', 106, 'Tanigue Steak Cut', 'uploaded_img/Tanigue-Steak-Cut.jpg'),
(80, 8, 'E-Mars Enterprises', 107, 'Shrimps', 'uploaded_img/Shrimp.jpg'),
(81, 64, 'Bicol Blue Star Export Corp.', 108, 'Alumahan', 'uploaded_img/Alumahan.jpg'),
(82, 25, 'CMSE Seafoods Trading', 109, 'Salmon Fillet', 'uploaded_img/Salmon-Fillet.jpg'),
(83, 62, 'Alenter Food, Inc.', 111, 'Caviar', 'uploaded_img/Caviar.jpg'),
(84, 47, 'JNCL Ocean Ventures, Inc.', 112, 'Pusit', 'uploaded_img/Pusit.jpg'),
(85, 24, 'Chen-Kao Marine Corp.', 113, 'Sugpo', 'uploaded_img/Sugpo.jpg'),
(86, 22, 'Bernas Seafoods Trading', 114, 'Oyster', 'uploaded_img/white.jpg'),
(87, 20, 'AFOW Marine Product', 115, 'Mussels', 'uploaded_img/white.jpg'),
(88, 21, 'A. Tung Chingco Manufacturing Corp.', 116, 'Crab', 'uploaded_img/Crab.jpg'),
(89, 26, 'Eoana Canning and Food Processing Corp.', 117, 'Mud Crab', 'uploaded_img/white.jpg'),
(90, 9, 'Korea-Philippines Seafood Processing Complex', 118, 'Blue Marlin Cut', 'uploaded_img/Blue Marlin.jpg'),
(91, 59, 'Chinoy Seafood Exporter and Importer', 119, 'Tawilis', 'uploaded_img/Tawilis.jpg'),
(92, 42, 'Camarines Bigfin Seafoods Trading Inc.', 120, 'Tinapa Salinas', 'uploaded_img/Tinapa-Salinas.jpg'),
(93, 14, 'Golden Tiger Export Ventures, Inc', 121, 'Tuyo Salinas', 'uploaded_img/Tuyo-Salinas.jpg'),
(94, 8, 'E-Mars Enterprises', 122, 'Labahita', 'uploaded_img/Labahita.jpg'),
(95, 10, 'Amanda’s Marine Products', 123, 'Jackfish', 'uploaded_img/white.jpg'),
(96, 25, 'CMSE Seafoods Trading', 124, 'Catfish', 'uploaded_img/Catfish.jpg'),
(97, 25, 'CMSE Seafoods Trading', 125, 'Snail', 'uploaded_img/white.jpg'),
(98, 24, 'Chen-Kao Marine Corp.', 126, 'Moonfish', 'uploaded_img/white.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholesale`
--
ALTER TABLE `wholesale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_supplier_product` (`supplier_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wholesale`
--
ALTER TABLE `wholesale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wholesale`
--
ALTER TABLE `wholesale`
  ADD CONSTRAINT `wholesale_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `wholesale_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
