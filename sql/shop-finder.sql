-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 03:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@7736558377@6449', '70c3fb494f99ed2a1335d581f5c6aee0');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone1` bigint(12) NOT NULL,
  `phone2` bigint(12) DEFAULT NULL,
  `pin` int(10) NOT NULL,
  `profile_image` varchar(250) NOT NULL DEFAULT 'profile-images/default.jpeg',
  `t_money` bigint(100) DEFAULT 0,
  `t_order` bigint(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `location`, `address`, `email`, `phone1`, `phone2`, `pin`, `profile_image`, `t_money`, `t_order`) VALUES
(15, 'sreyas satheesh', 'Thoppippla', 'kanjirathinkal(H) thoppippla p.o mattappally', 'sreyassatheesh755@gamil.com', 7736558377, 8606648072, 685511, 'profile-images/63673c5adb1807.84004294.jpeg', 657, 3),
(16, 'sreyas satheesh', 'nedumkandam', 'vazhakalayil(H)\r\nnedumkandam p.o \r\nnedumkandam', 'sreyassatheesh50@gmail.com', 2147483647, 2147483647, 685511, 'profile-images/default.jpeg', 0, 0),
(17, 'sreyas satheesh', 'kattappana', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'sreyassatheesh755@gmail.com', 0, 2147483647, 685511, 'profile-images/default.jpeg', 0, 0),
(18, 'sreyas satheesh', 'Consequatur asperio', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'sreyassatheesh755@gmail.com', 1111111111, NULL, 654654, 'profile-images/default.jpeg', 0, 0),
(19, 'Chelsea Riggs', 'Do a laborum Cillum', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'lawuko@mailinator.com', 5555555555, 6666666666, 212356, 'profile-images/default.jpeg', 0, 0),
(20, 'Sopoline Moody', 'Beatae sed eum offic', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'qazyvysopi@mailinator.com', 9916141580, 9961856408, 254124, 'profile-images/default.jpeg', 0, 0),
(21, 'Dennis Fulton', 'Minim minim ipsam cu', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'buti@mailinator.com', 1234567899, 9999999999, 685515, 'profile-images/default.jpeg', 0, 0),
(22, 'Cara Patrick', 'Aliquid dolor ration', 'Qui veritatis unde c', 'rogarifar@mailinator.com', 1234567899, 9961856489, 235627, 'profile-images/default.jpeg', 0, 0),
(23, 'sreyas', 'Kattappana', 'kanjirathinkal(h)thoppoppala p.o mattappally', 'sreyassatheesh755@gmail.com', 1234567899, 0, 125421, 'profile-images/default.jpeg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`id`, `username`, `password`) VALUES
(15, '9961856470', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(16, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(17, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(18, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(19, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(20, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(21, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(22, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(23, '9961856444', 'b7ec3a5593ff41beafb6d6e7041a0dd6');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `products` varchar(10000) NOT NULL,
  `delivery_stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `s_id`, `name`, `p_category`, `category`, `weight`, `description`, `price`, `status`, `stock`, `image`) VALUES
(51, 0, 'fizilo', 'Tempor tenetur aperi', 'grocery', 50, 'Perferendis facilis ', 557, 0, 100, '635dfa133ea9f0.78861248.jpg'),
(52, 0, 'oreo', 'Placeat aut dolore ', 'grocery', 76, 'Exercitation autem c', 529, 0, 100, '635df997e49168.09018998.jpg'),
(54, 0, 'fuse', 'chocolate', 'grocery', 50, 'it is a nice product that comes with nuts in it', 20, 0, 30, '63626813c5e507.68370873.jpg'),
(55, 0, 'snickers', 'chocolate', 'grocery', 40, 'it is a good chocolate product .', 15, 0, 80, '636270d7b4fdd4.33151816.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `location` varchar(250) NOT NULL,
  `license_no` bigint(25) NOT NULL,
  `category` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cover_img` varchar(250) NOT NULL,
  `phone1` bigint(20) NOT NULL,
  `phone2` bigint(20) DEFAULT NULL,
  `home_delivery` int(1) NOT NULL DEFAULT 0,
  `rating` float DEFAULT 0,
  `shop_status` int(1) NOT NULL DEFAULT 0,
  `total_rating` int(10) DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `shop_name`, `location`, `license_no`, `category`, `email`, `cover_img`, `phone1`, `phone2`, `home_delivery`, `rating`, `shop_status`, `total_rating`, `status`) VALUES
(10, 'pittappally', 'nedumkandam', 123456254124, 'digital', 'pezitobiki@mailinator.com', 'cover-images/images.jpg', 6325648569, NULL, 1, 4.9, 0, 5, 1),
(11, 'nandilath g mart', 'kattappana', 965826315242, 'electronics', 'bamikypa@mailinator.com', 'cover-images/63680d2aa74e80.49672339.jpeg', 8547512653, 9696586858, 0, 4, 1, 1, 1),
(12, 'cochin', 'kattappana', 125412632512, 'bakery', 'sreyassatheesh555@gmail.com', 'cover-images/bakery-shop-row-pastry-bread-53928141.jpg', 1252362365, NULL, 0, 1.9, 0, 102, 0),
(13, 'gozzip', 'kattappana', 125475485463, 'clothing', 'email@gamil.com', 'cover-images/istockphoto-901863672-170667a.jpg', 1252523252, 12452122123, 1, 3.1, 0, 55, 1),
(14, 'uk', 'kattappana', 125475485463, 'clothing', 'sreyas@gmail.com', 'cover-images/photo-1567401893414-76b7b1e5a7a5.jpg', 1252523252, 12452122123, 1, 3, 0, 50, 0),
(15, 'myG digital ', 'kattappana', 125475485463, 'digital ', 'mygkattappana@gmail.com', 'cover-images/IMG_6393.jpg', 1252523252, 12452122123, 1, 4.5, 0, 100, 1),
(16, 'highrange home appliances', 'kattappana', 125475485477, 'home appliances', 'highrangehomeappliances@gmail.com', 'cover-images/oxygen-digital-shop-kottayam-5yyvr.jpg', 1252523252, 12452122123, 1, 3.5, 0, 200, 1),
(17, 'jio books', 'kattappana', 125475485444, 'books', 'jiobooks22@gmail.com', 'cover-images/23032018_bookstore_05.jpg', 1245215421, NULL, 0, 3.7, 0, 105, 1),
(18, 'lassy bay', 'kattappana', 421542152365, 'coffee bar', 'lassybay@gmail.com', 'cover-images/109_506071941.jpg', 9652132564, 8532653241, 1, 0, 0, 0, 1),
(19, 'petrol', 'kattappana', 546236636325, 'clothing', 'petrolkattappana@gmail.com\r\n', 'cover-images/download.jpg', 9656696696, 8559667234, 0, 0, 0, 0, 1),
(20, 'trends', 'kattappana', 856633636353, 'kattappana', 'trendsktpns@gmail.com', 'cover-images/99bcef09e0a15c7d68edfaf7a16ed982.jpg', 9652132544, NULL, 0, NULL, 0, NULL, 1),
(21, 'my cochin', 'kattappana', 754558965996, 'bakery ', 'mycochin@gmail.com', 'cover-images/blogimage_1525255196m.jpg', 9652444132, NULL, 0, NULL, 0, NULL, 0),
(22, 'oppo mobile store ', 'kattappana', 455562256623, 'mobile store', 'opponearoldbusstand@gmail.com', 'cover-images/mobile-stores.jpg', 752226339, NULL, 0, NULL, 0, NULL, 1),
(23, 'vivo mobile store ', 'kattappana', 966966965868, 'mobile store', 'vivonearoldbusstand@gmail.com', 'cover-images/download (1).jpg', 9665366842, NULL, 0, NULL, 0, NULL, 0),
(25, 'pavitra jewellery', 'kattappana', 966413725631, 'jewellery', 'pavitrajewellery@gmail.com', 'cover-images/gold-jewelry-shop-little-india-sigapore-shiny-watches-necklaces-braces-singapore-92633770.jpg', 9785316459, 9548751254, 0, NULL, 0, NULL, 1),
(26, 'ammu electronics', 'kattappana', 856565475654, 'electronics', 'ammuelectronics2@gmail.com', 'cover-images/125975-15350210.jpg', 9656696585, NULL, 0, NULL, 0, NULL, 1),
(27, 'sadi supermarket', 'thodupuzha', 654565856231, 'grocery', 'sadi@mailinator.com', 'cover-images/634ebee2e176d3.50588185.jpg', 9858955858, 6954854754, 0, NULL, 0, NULL, 1),
(28, 'ld corps', 'kattappana', 521421568565, 'clothing', 'ldcorps@gmail.com', 'cover-images/634fa4504c3437.72050754.jpg', 7421452111, 4455588755, 0, 0, 0, 0, 1),
(29, 'hello', 'kattappana', 754854569585, 'clothing', 'vuzufamma@ilinator.com', 'cover-images/634fbe37e991a2.84595407.jpg', 6666655555, 6954854754, 0, 0, 0, 0, 1),
(31, 'Audrey Nguyen', 'Porro laudantium pl', 142525236523, 'clothing', 'bynuvupyba@mailinator.com', 'cover-images/635f48f43d8c61.47291744.jpg', 1254454547, 0, 0, 0, 0, 0, -1),
(32, 'Shaine Pope', 'Voluptatibus iste de', 122321521425, 'medical', 'zogucejis@mailinator.com', 'cover-images/635f4af2ea8ec2.51407484.jpg', 6969586958, 0, 0, 0, 0, 0, 0),
(33, 'John Weeks', 'Aut sed laborum reru', 152421524125, 'meat', 'karyfow@mailinator.com', 'cover-images/635f4b458b0891.51524560.jpg', 9696965869, 0, 0, 0, 0, 0, -1),
(34, 'Portia Johnston', 'Dolores eligendi qui', 858585845758, 'medical', 'subom@mailinator.com', 'cover-images/635f4b855f6418.24450598.jpg', 8564592371, 0, 0, 0, 0, 0, 0),
(35, 'Dean Adams', 'Doloremque libero no', 658558547542, 'meat', 'codynamyp@mailinator.com', 'cover-images/635f4d961fa5c7.35640631.jpg', 9685874575, 9854785475, 0, 0, 0, 0, 0),
(36, 'Mannix Cook', 'Deserunt ullamco ver', 123456789101, 'clothing', 'myporaka@mailinator.com', 'cover-images/635f4e7bb2fb35.83119822.jpg', 1111111111, 0, 0, 0, 0, 0, 0),
(37, 'trends', 'kattappana', 565865458754, 'clothing', 'trendsktpna@mailinator.com', 'cover-images/6362b2aeb97268.30178638.webp', 9854585652, 9855457585, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller_login`
--

CREATE TABLE `seller_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_login`
--

INSERT INTO `seller_login` (`id`, `username`, `password`) VALUES
(10, 'sreyassatheesh755@gmail.com', '62ec4a203ab9e836fd0d602440c2e38f'),
(11, '9961856470', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(12, '4251632563', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(13, '9961856488', '54418cdd3b5a13819b63047edf82c96b'),
(25, '9961856491', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(26, '9961856445', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(27, '9961856777', '545b8af5c6ebaac3298d2997eeea851e'),
(28, '8654875487', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(29, '2514265857', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(31, '9961856471', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(32, '9961856473', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(33, '9961856474', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(34, '9961856475', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(35, '9961856476', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(36, '1111111111', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(37, '9961856499', 'b7ec3a5593ff41beafb6d6e7041a0dd6');

-- --------------------------------------------------------

--
-- Table structure for table `shop_images`
--

CREATE TABLE `shop_images` (
  `i_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_images`
--

INSERT INTO `shop_images` (`i_id`, `s_id`, `image`) VALUES
(5, 11, 'img/shop-images/6368029641de92.50376741.jpeg'),
(6, 11, 'img/shop-images/6368029a7d3a30.86834594.jpeg'),
(7, 11, 'img/shop-images/63680be903c233.32261207.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_login`
--
ALTER TABLE `seller_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_images`
--
ALTER TABLE `shop_images`
  ADD PRIMARY KEY (`i_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `seller_login`
--
ALTER TABLE `seller_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `shop_images`
--
ALTER TABLE `shop_images`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
