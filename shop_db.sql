-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 09:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `supplier`) VALUES
(90, 'Tilapia', 345, 'Tilapia.jpg', '8'),
(91, 'Yellowfin Tuna', 450, 'Tuna-Yellow-Fin.jpg', '20'),
(93, 'Bangus', 430, 'Bangus.jpg', '16'),
(94, 'Lapu Lapu', 235, 'Lapu-Lapu-Red.jpg', '15'),
(95, 'Tamban', 330, 'Tamban.jpg', '18'),
(96, 'Anchovies', 290, 'Dilis.jpg', '22'),
(97, 'Red Snapper', 745, 'Red Snapper.jpg', '45'),
(98, 'Tulingan', 400, 'Tulingan.jpg', '52'),
(99, 'Galunggong', 220, 'Galunggong.jpg', '10'),
(100, 'Dalagang Bukid', 400, 'Dalagang-Bukid.jpg', '68'),
(101, 'Slipmouth Fish', 425, 'Sapsap.jpg', '17'),
(102, 'Hasahasa', 300, 'Hasahasa.jpg', '13'),
(103, 'Barramundi', 1000, 'Apahap.jpg', '21'),
(104, 'Pompano', 600, 'Pompano.jpg', '9'),
(105, 'Threadfin Bream', 500, 'Bisugo.jpg', '12'),
(106, 'Tanigue Steak Cut', 800, 'Tanigue-Steak-Cut.jpg', '22'),
(107, 'Shrimps', 800, 'Shrimps.jpg', '8'),
(108, 'Alumahan', 560, 'Alumahan.jpg', '64'),
(109, 'Salmon Fillet', 1300, 'Salmon-Fillet.jpg', '25'),
(111, 'Caviar', 5500, 'Caviar.jpg', '62'),
(112, 'Pusit', 600, 'Pusit.jpg', '47'),
(113, 'Sugpo', 1100, 'Sugpo.jpg', '24'),
(114, 'Oyster', 300, 'Talaba.jpg', '22'),
(115, 'Mussels', 150, 'Tahon.jpg', '20'),
(116, 'Crab', 900, 'Crab.jpg', '21'),
(117, 'Mud Crab', 750, 'Mud Crab.jpg', '26'),
(118, 'Blue Marlin Cut', 650, 'Blue Marlin.jpg', '9'),
(119, 'Tawilis', 350, 'Tawilis.jpg', '59'),
(120, 'Tinapa Salinas', 435, 'Tinapa-Salinas.jpg', '42'),
(121, 'Tuyo Salinas', 400, 'Tuyo-Salinas.jpg', '14'),
(122, 'Labahita', 400, 'Labahita.jpg', '8'),
(123, 'Jackfish', 700, 'Talakitok.jpg', '10'),
(124, 'Catfish', 350, 'Catfish.jpg', '25'),
(125, 'Snail', 200, 'Kuhol.jpg', '25'),
(126, 'Moonfish', 300, 'Hiwas.jpg', '24');

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
(4, 'Test User 2', 'test.user2@pmail.com', 'a119e534072584a0ea88cdea4664aecd', 'user');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
