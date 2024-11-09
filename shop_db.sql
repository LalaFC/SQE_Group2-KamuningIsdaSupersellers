-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 06:15 AM
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
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(90, 'Tilapia', 345, 'Tilapia.jpg'),
(91, 'Yellowfin Tuna', 450, 'Tuna-Yellow-Fin.jpg'),
(93, 'Bangus', 430, 'Bangus.jpg'),
(94, 'Lapu Lapu', 235, 'Lapu-Lapu-Red.jpg'),
(95, 'Tamban', 330, 'Tamban.jpg'),
(96, 'Anchovies', 290, 'Dilis.jpg'),
(97, 'Red Snapper', 745, 'Red Snapper.jpg'),
(98, 'Tulingan', 400, 'Tulingan.jpg'),
(99, 'Galunggong', 220, 'Galunggong.jpg'),
(100, 'Dalagang Bukid', 400, 'Dalagang-Bukid.jpg'),
(101, 'Slipmouth Fish', 425, 'Sapsap.jpg'),
(102, 'Hasa-hasa', 300, 'Hasahasa.jpg'),
(103, 'Barramundi', 1000, 'Apahap.jpg'),
(104, 'Pompano', 600, 'Pompano.jpg'),
(105, 'Threadfin Bream', 500, 'Bisugo.jpg'),
(106, 'Tanigue Steak Cut', 800, 'Tanigue-Steak-Cut.jpg'),
(107, 'Shrimps', 800, 'Shrimps.jpg'),
(108, 'Alumahan', 560, 'Alumahan.jpg'),
(109, 'Salmon Fillet', 1300, 'Salmon-Fillet.jpg'),
(111, 'Caviar', 5500, 'Caviar.jpg'),
(112, 'Pusit', 600, 'Pusit.jpg'),
(113, 'Sugpo', 1100, 'Sugpo.jpg'),
(114, 'Oyster', 300, 'Talaba.jpg'),
(115, 'Mussels', 150, 'Tahon.jpg'),
(116, 'Crab', 900, 'Crab.jpg'),
(117, 'Mud Crab', 750, 'Mud Crab.jpg'),
(118, 'Blue Marlin Cut', 650, 'Blue Marlin.jpg'),
(119, 'Tawilis', 350, 'Tawilis.jpg'),
(120, 'Tinapa Salinas', 435, 'Tinapa-Salinas.jpg'),
(121, 'Tuyo Salinas', 400, 'Tuyo-Salinas.jpg'),
(122, 'Labahita', 400, 'Labahita.jpg'),
(123, 'Jackfish', 700, 'Talakitok.jpg'),
(124, 'Catfish', 350, 'Catfish.jpg'),
(125, 'Snail', 200, 'Kuhol.jpg'),
(126, 'Moonfish', 300, 'Hiwas.jpg'),
(127, 'Espada', 500, 'Espada.jpg'),
(128, 'Matambaka', 450, 'Matambaka.jpg'),
(129, 'Clams', 250, 'Clam.jpg'),
(130, 'Dory Fillet', 250, 'Dory Fillet.jpg'),
(131, 'Halibut Fillet', 2500, 'Halibut.jpg'),
(132, 'Scallop Meat', 700, 'Scallop Meat.jpg'),
(133, 'Asohos', 800, 'Asohos.jpg'),
(134, 'Dapa', 725, 'Dapa.jpg'),
(135, 'Dulong', 600, 'Dulong.jpg'),
(136, 'Gindara', 950, 'Gindara.jpg'),
(137, 'Lato Seaweed', 400, 'Seaweed.jpg'),
(138, 'Lobster', 5000, 'Lobster.jpg'),
(139, 'Pampano', 750, 'Pampano.jpg'),
(140, 'Lawihan', 1000, 'Lawihan.jpg'),
(141, 'Salay Ginto', 600, 'Salay Ginto.jpg'),
(142, 'Samaral', 800, 'Samaral.jpg'),
(143, 'Sole Fish', 800, 'Sole.jpg');

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
(11, 'Angel Farmers Gourmet Food Corporation'),
(12, 'Bulacan HJR International Incorporation'),
(13, 'Elite Del Dragon Incorporated'),
(14, 'Golden Tiger Export Ventures, Inc'),
(15, 'Mica by the Sea'),
(16, 'TGA Foods Corporation'),
(17, 'Aling Ludy’s Seafood Dealer'),
(18, 'Akian Food Processing Corporation'),
(19, 'Arko Food Phils, Inc'),
(20, 'AFOW Marine Product'),
(21, 'A. Tung Chingco Manufacturing Corporation'),
(22, 'Bernas Seafoods Trading'),
(23, 'Bluefin Seafood Export, Incorporated'),
(24, 'Chen-Kao Marine Corporation'),
(25, 'CMSE Seafoods Trading'),
(26, 'Eoana Canning and Food Processing Corporation'),
(27, 'Frabelle Market Corporation'),
(28, 'Golden Hands Manufacturing Corporation'),
(29, 'Kai-Anya Foods, Incorporated'),
(30, 'Millennium Ocean Star Corporation'),
(31, 'Ozean 8 Trading Corporation'),
(32, 'Penamae Fish Trading'),
(33, 'Philprawns and Seafood Corporation'),
(34, 'Royale Fishing Corporation'),
(35, 'Sakurey Trading'),
(36, 'Southern Giant Star Int’l. Seafood Providers, Inc.'),
(37, 'SLORD Development Corporation'),
(38, 'TC International Seafoods Provider, Inc'),
(39, 'Tiger Marine Products'),
(40, 'Unifish Inc.'),
(41, 'Yeung Marine Products'),
(42, 'Camarines Bigfin Seafoods Trading Incorporated'),
(43, 'CARM Foods Enterprise, Incorporated'),
(44, 'Donny’s Choice Food Processing Export & Import Corporation'),
(45, 'Doc Peter Foods Corporation'),
(46, 'Fukui Food Philippines Incorporated'),
(47, 'JNCL Ocean Ventures, Incorporated'),
(48, 'Ipil Oriental Food Export & Consolidator'),
(49, 'Ocean Aquamarine Products Enterprises'),
(50, 'Sunrich Manufacturing Corporation'),
(51, 'Verdure Seafood Republic, Inc'),
(52, 'Triton Products Corporation'),
(53, 'T & T Aquamarine Ventures Corporation'),
(54, 'Master Chang’s Seafoods'),
(55, 'SanMar Marine Products and Export'),
(56, 'PFL Export Trading'),
(57, 'Seaworld Export-Import Traders'),
(58, 'Siargo’s Bountry Seafoods Corporation'),
(59, 'Chinoy Seafood Exporter and Importer'),
(60, 'Millenium Ocean Star Corporation (Samar)'),
(61, 'TBK Manufacturing Corporation'),
(62, 'Alenter Food, Incorporated'),
(63, 'Aquatic Food Manufacturing Corporation'),
(64, 'Bicol Blue Star Export Corporation'),
(65, 'Dai-Hai Marine Products Corporation'),
(66, 'Kim Marine Products'),
(67, 'B-KING Fish Processor'),
(68, 'Camsur Canning Corporation'),
(69, 'We Golden High International Incorporated');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

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
