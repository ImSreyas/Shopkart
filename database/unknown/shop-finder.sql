-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 02:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `Phone1` bigint(12) NOT NULL,
  `phone2` bigint(12) NOT NULL,
  `pin` int(10) NOT NULL,
  `t_money` bigint(100) NOT NULL,
  `t_reviews` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `location`, `address`, `email`, `Phone1`, `phone2`, `pin`, `t_money`, `t_reviews`) VALUES
(15, 'sreyas', 'kattappana', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'sreyassatheesh755@gmail.com', 2147483647, 2147483647, 685511, 0, 0),
(16, 'sreyas satheesh', 'nedumkandam', 'vazhakalayil(H)\r\nnedumkandam p.o \r\nnedumkandam', 'sreyassatheesh50@gmail.com', 2147483647, 2147483647, 685511, 0, 0),
(17, 'sreyas satheesh', 'kattappana', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'sreyassatheesh755@gmail.com', 0, 2147483647, 685511, 0, 0),
(18, 'sreyas satheesh', 'Consequatur asperio', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'sreyassatheesh755@gmail.com', 1111111111, 0, 654654, 0, 0),
(19, 'Chelsea Riggs', 'Do a laborum Cillum', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'lawuko@mailinator.com', 5555555555, 6666666666, 212356, 0, 0),
(20, 'Sopoline Moody', 'Beatae sed eum offic', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'qazyvysopi@mailinator.com', 9916141580, 9961856408, 254124, 0, 0),
(21, 'Dennis Fulton', 'Minim minim ipsam cu', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'buti@mailinator.com', 1234567899, 9999999999, 685515, 0, 0),
(22, 'Cara Patrick', 'Aliquid dolor ration', 'Qui veritatis unde c', 'rogarifar@mailinator.com', 1234567899, 9961856489, 235627, 0, 0),
(23, 'sreyas', 'kattappana', 'kanjirathinkal(h)\r\nthoppoppala p.o \r\nmattappally', 'sreyassatheesh755@gmail.com', 1234567899, 0, 125421, 0, 0);

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
(15, '9961856470', '5f95ba034a1a1bede24c8eec50fa3a96'),
(16, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(17, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(18, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(19, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(20, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(21, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(22, '9658745865', '373ff06b95460562fd3f90b013424d2b'),
(23, '9961856444', '93ae906d8d0a591c1d6954b40e30efe6');

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
  `seller_status` int(1) NOT NULL DEFAULT 0,
  `home_delivery` int(1) NOT NULL DEFAULT 0,
  `rating` float DEFAULT NULL,
  `total_rating` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `shop_name`, `location`, `license_no`, `category`, `email`, `cover_img`, `phone1`, `phone2`, `seller_status`, `home_delivery`, `rating`, `total_rating`, `status`) VALUES
(10, 'pittappally', 'nedumkandam', 123456254124, 'digital', 'pezitobiki@mailinator.com', 'cover-images/images.jpg', 6325648569, NULL, 0, 1, 4.9, 5, 1),
(11, 'nanthilath g mart', 'kattappana', 965826315242, 'electronics', 'bamikypa@mailinator.com', 'cover-images/variety-computers-both-laptop-desktops-sale-computer-store-computers-sale-computer-store-135429635.jpg', 8547512653, NULL, 0, 0, 4, 1, 1),
(12, 'cochin', 'kattappana', 125412632512, 'bakery', 'sreyassatheesh555@gmail.com', 'cover-images/bakery-shop-row-pastry-bread-53928141.jpg', 1252362365, NULL, 0, 0, 1.9, 102, 1),
(13, 'gozzip', 'kattappana', 125475485463, 'clothing', 'email@gamil.com', 'cover-images/istockphoto-901863672-170667a.jpg', 1252523252, 12452122123, 0, 1, 3.1, 55, 1),
(14, 'uk', 'kattappana', 125475485463, 'clothing', 'sreyas@gmail.com', 'cover-images/photo-1567401893414-76b7b1e5a7a5.jpg', 1252523252, 12452122123, 0, 1, 3, 50, 1),
(15, 'myG digital ', 'kattappana', 125475485463, 'digital ', 'mygkattappana@gmail.com', 'cover-images/IMG_6393.jpg', 1252523252, 12452122123, 0, 1, 4.5, 100, 1),
(16, 'highrange home appliances', 'kattappana', 125475485477, 'home appliances', 'highrangehomeappliances@gmail.com', 'cover-images/oxygen-digital-shop-kottayam-5yyvr.jpg', 1252523252, 12452122123, 0, 1, 3.5, 200, 1),
(17, 'jio books', 'kattappana', 125475485444, 'books', 'jiobooks22@gmail.com', 'cover-images/23032018_bookstore_05.jpg', 1245215421, NULL, 0, 0, 3.7, 105, 1),
(18, 'lassy bay', 'kattappana', 421542152365, 'coffee bar', 'lassybay@gmail.com', 'cover-images/109_506071941.jpg', 9652132564, 8532653241, 0, 1, 0, 0, 1),
(19, 'petrol', 'kattappana', 546236636325, 'clothing', 'petrolkattappana@gmail.com\r\n', 'cover-images/download.jpg', 9656696696, 8559667234, 0, 0, 0, 0, 1),
(20, 'trends', 'kattappana', 856633636353, 'kattappana', 'trendsktpns@gmail.com', 'cover-images/99bcef09e0a15c7d68edfaf7a16ed982.jpg', 9652132544, NULL, 0, 0, NULL, NULL, 1),
(21, 'my cochin', 'kattappana', 754558965996, 'bakery ', 'mycochin@gmail.com', 'cover-images/blogimage_1525255196m.jpg', 9652444132, NULL, 0, 0, NULL, NULL, -1),
(22, 'oppo mobile store ', 'kattappana', 455562256623, 'mobile store', 'opponearoldbusstand@gmail.com', 'cover-images/mobile-stores.jpg', 752226339, NULL, 0, 0, NULL, NULL, 1),
(23, 'vivo mobile store ', 'kattappana', 966966965868, 'mobile store', 'vivonearoldbusstand@gmail.com', 'cover-images/download (1).jpg', 9665366842, NULL, 0, 0, NULL, NULL, 1),
(24, 'kgees', 'kattappana', 696696585326, 'jewellery', 'kgeesjewellery@gmail.com', 'cover-images/be609d0df853138a8081705bb10d3e59--shop-interiors-designers.jpg', 8548556952, NULL, 0, 0, NULL, NULL, 1),
(25, 'pavitra jewellery', 'kattappana', 966413725631, 'jewellery', 'pavitrajewellery@gmail.com', 'cover-images/gold-jewelry-shop-little-india-sigapore-shiny-watches-necklaces-braces-singapore-92633770.jpg', 9785316459, 9548751254, 0, 0, NULL, NULL, 1),
(26, 'ammu electronics', 'kattappana', 856565475654, 'electronics', 'ammuelectronics2@gmail.com', 'cover-images/125975-15350210.jpg', 9656696585, NULL, 0, 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller_login`
--

CREATE TABLE `seller_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `login_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_login`
--

INSERT INTO `seller_login` (`id`, `username`, `password`, `login_status`) VALUES
(10, 'sreyassatheesh755@gmail.com', '62ec4a203ab9e836fd0d602440c2e38f', 0),
(11, '9961856470', '774e1888cff8c74a3cada862fa4fab64', 0),
(12, '4251632563', 'b7ec3a5593ff41beafb6d6e7041a0dd6', 0);

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
-- AUTO_INCREMENT for table `seller_login`
--
ALTER TABLE `seller_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
