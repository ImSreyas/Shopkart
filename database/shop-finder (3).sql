-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 06:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
CREATE DATABASE IF NOT EXISTS `shop-finder` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop-finder`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@7736558377@6449', '70c3fb494f99ed2a1335d581f5c6aee0');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
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
  `t_order` bigint(100) NOT NULL DEFAULT 0,
  `removed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `location`, `address`, `email`, `phone1`, `phone2`, `pin`, `profile_image`, `t_money`, `t_order`, `removed`) VALUES
(15, 'sreyas satheesh', 'Kattappana', 'kanjirathinkal(H) thoppippla p.o mattappally', 'sreyassatheesh755@gamil.com', 7736558377, 8606648070, 685511, 'profile-images/639d6a469989c9.42756179.jpg', 657, 3, 0),
(16, 'sreyas satheesh', 'nedumkandam', 'vazhakalayil(H)\r\nnedumkandam p.o \r\nnedumkandam', 'sreyassatheesh50@gmail.com', 2147483647, 2147483647, 685511, 'profile-images/default.jpeg', 0, 0, 0),
(17, 'sreyas satheesh', 'kattappana', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'sreyassatheesh755@gmail.com', 7548559658, 2147483647, 685511, 'profile-images/default.jpeg', 0, 0, 0),
(18, 'sreyas satheesh', 'Consequatur asperio', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'sreyassatheesh755@gmail.com', 1111111111, NULL, 654654, 'profile-images/default.jpeg', 0, 0, 0),
(19, 'Chelsea Riggs', 'Do a laborum Cillum', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'lawuko@mailinator.com', 5555555555, 6666666666, 212356, 'profile-images/default.jpeg', 0, 0, 0),
(20, 'Sopoline Moody', 'Beatae sed eum offic', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'qazyvysopi@mailinator.com', 9916141580, 9961856408, 254124, 'profile-images/default.jpeg', 0, 0, 0),
(21, 'Dennis Fulton', 'Minim minim ipsam cu', 'kanjirathinkal(H)\r\nthoppippala p.o\r\nmattappally', 'buti@mailinator.com', 1234567899, 9999999999, 685515, 'profile-images/default.jpeg', 0, 0, 0),
(22, 'Cara Patrick', 'nedumkandam', 'Qui veritatis unde c', 'rogarifar@mailinator.com', 1234567899, 9961856489, 235627, 'profile-images/default.jpeg', 0, 0, 0),
(23, 'sreyas', 'Kattappana', 'kanjirathinkal(h)thoppoppala p.o mattappally', 'sreyassatheesh755@gmail.com', 1234567899, 0, 125421, 'profile-images/default.jpeg', 0, 0, 0),
(24, 'sreyas', 'Quo impedit volupta', 'Doloribus magnam dol', 'davesykevy@mailinator.com', 9658695234, 7854525586, 965658, 'profile-images/default.jpeg', 0, 0, 0),
(25, 'Cheryl Park', 'swaraj', 'hello (H)\r\nthoppippala p.o\r\nswaraj', 'rikocax@mailinator.com', 9655266425, 7552364451, 685511, 'profile-images/default.jpeg', 0, 0, 0),
(26, 'amal manoj', 'pambadumpara', 'coding (H)\r\npampadumpara p.o\r\npampadumpara', 'amalmanoj@pcdev.com', 9999999999, 8888888888, 685564, 'profile-images/default.jpeg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

DROP TABLE IF EXISTS `customer_login`;
CREATE TABLE `customer_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`id`, `username`, `password`) VALUES
(15, '9961856470', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(16, '9658745865', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(17, '9658745865', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(18, '9658745865', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(19, '9658745865', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(20, '9658745865', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(21, '9658745865', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(22, '9658745865', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(23, '9961856444', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(24, '9961856478', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(25, '9961856449', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(26, '9999999999', 'b7ec3a5593ff41beafb6d6e7041a0dd6');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `primary_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `products` varchar(10000) NOT NULL,
  `location` varchar(250) DEFAULT NULL,
  `delivery` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `delivery_stage` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`primary_id`, `id`, `c_id`, `s_id`, `products`, `location`, `delivery`, `stock`, `total`, `delivery_stage`, `active`) VALUES
(72, 12, 15, 11, '51', 'Thoppippla', 0, 4, 2228, 4, 1),
(73, 13, 15, 11, '54', 'Thoppippla', 0, 7, 140, 3, 1),
(74, 14, 15, 11, '52', 'kattappana', 1, 8, 4232, 3, 1),
(75, 1, 23, 11, '52', 'mattappally', 1, 4, 2501, 3, 1),
(76, 1, 23, 11, '54', 'mattappally', 1, 2, 2501, 3, 1),
(77, 1, 23, 11, '55', 'mattappally', 1, 3, 2501, 3, 1),
(79, 1, 22, 11, '51', 'nedumkandam', 1, 1, 1201, 3, 1),
(80, 1, 22, 11, '52', 'nedumkandam', 1, 1, 1201, 3, 1),
(81, 1, 22, 11, '55', 'nedumkandam', 1, 1, 1201, 3, 1),
(83, 2, 22, 11, '52', 'nedumkandam', 0, 1, 529, 3, 1),
(84, 3, 22, 11, '55', 'nedumkandam', 0, 1, 115, 3, 1),
(86, 4, 22, 11, '51', 'nedumkandam', 0, 1, 557, 3, 1),
(87, 1, 0, 11, '54', NULL, 0, 1, 0, 0, 0),
(88, 1, 24, 11, '55', 'Quo impedit volupta', 0, 1, 15, 3, 1),
(89, 15, 15, 11, '54', 'Thoppippla', 0, 30, 600, 1, 1),
(90, 16, 15, 11, '54', 'Thoppippla', 0, 5, 100, 1, 1),
(91, 17, 15, 11, '54', NULL, 0, 25, 0, 0, 0),
(92, 18, 15, 11, '54', 'Thoppippla', 0, 25, 500, 0, 1),
(93, 19, 15, 11, '54', NULL, 0, 0, 0, 0, 0),
(94, 20, 15, 11, '51', NULL, 0, 1, 0, 0, 0),
(95, 20, 15, 11, '52', NULL, 0, 1, 0, 0, 0),
(96, 20, 15, 11, '55', NULL, 0, 1, 0, 0, 0),
(97, 21, 15, 11, '51', NULL, 0, 1, 0, 0, 0),
(98, 21, 15, 11, '52', NULL, 0, 1, 0, 0, 0),
(99, 21, 15, 11, '55', NULL, 0, 1, 0, 0, 0),
(104, 22, 15, 11, '54', NULL, 0, 0, 0, 0, 0),
(105, 23, 15, 11, '52', NULL, 0, 0, 0, 0, 0),
(106, 24, 15, 11, '52', NULL, 0, 0, 0, 0, 0),
(107, 25, 15, 11, '52', NULL, 0, 1, 0, 0, 0),
(112, 26, 15, 11, '51', 'Thoppippla', 0, 5, 5460, 0, 1),
(113, 26, 15, 11, '52', 'Thoppippla', 0, 5, 5460, 0, 1),
(114, 26, 15, 11, '55', 'Thoppippla', 0, 2, 5460, 0, 1),
(115, 27, 15, 11, '52', 'Thoppippla', 0, 5, 2720, 0, 1),
(116, 27, 15, 11, '55', 'Thoppippla', 0, 5, 2720, 0, 1),
(117, 28, 15, 11, '52', 'Thoppippla', 1, 1, 529, 0, 1),
(118, 29, 15, 11, '55', NULL, 0, 1, 0, 0, 0),
(119, 30, 15, 11, '51', 'Thoppippla', 0, 1, 1101, 0, 1),
(120, 30, 15, 11, '52', 'Thoppippla', 0, 1, 1101, 0, 1),
(121, 30, 15, 11, '54', 'Thoppippla', 0, 0, 1101, 0, 1),
(122, 30, 15, 11, '55', 'Thoppippla', 0, 1, 1101, 0, 1),
(123, 31, 15, 11, '52', 'Thoppippla', 1, 20, 10580, 4, 1),
(125, 2, 0, 11, '57', NULL, 0, 1, 0, 0, 0),
(126, 2, 0, 11, '58', NULL, 0, 1, 0, 0, 0),
(127, 2, 0, 11, '59', NULL, 0, 1, 0, 0, 0),
(128, 2, 0, 11, '60', NULL, 0, 1, 0, 0, 0),
(129, 2, 0, 11, '61', NULL, 0, 1, 0, 0, 0),
(130, 2, 0, 11, '62', NULL, 0, 1, 0, 0, 0),
(131, 2, 0, 11, '63', NULL, 0, 1, 0, 0, 0),
(132, 2, 0, 11, '64', NULL, 0, 1, 0, 0, 0),
(133, 2, 0, 11, '65', NULL, 0, 1, 0, 0, 0),
(134, 2, 0, 11, '66', NULL, 0, 1, 0, 0, 0),
(135, 2, 0, 11, '67', NULL, 0, 1, 0, 0, 0),
(150, 3, 0, 11, '65', NULL, 0, 1, 0, 0, 0),
(151, 32, 15, 11, '57', 'Kattappana', 1, 1, 25000, 0, 1),
(152, 4, 0, 11, '59', NULL, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `s_id`, `name`, `p_category`, `category`, `weight`, `description`, `price`, `status`, `stock`, `image`) VALUES
(51, 11, 'fizilo', 'Tempor tenetur aperi', 'grocery', 50, 'Perferendis facilis ', 557, 0, 87, '635dfa133ea9f0.78861248.jpg'),
(52, 11, 'oreo', 'Placeat aut dolore ', 'grocery', 76, 'Exercitation autem c', 529, 0, 57, '635df997e49168.09018998.jpg'),
(54, 11, 'fuse', 'chocolate', 'grocery', 50, 'it is a nice product that comes with nuts in it', 20, 0, 0, '63626813c5e507.68370873.jpg'),
(55, 11, 'snickers', 'chocolate', 'grocery', 40, 'it is a good chocolate product .', 15, 0, 63, '636270d7b4fdd4.33151816.jpg'),
(57, 11, 'ibell tv', 'tv', 'electronics', 3500, 'ibell is a well known company.', 25000, 1, 100, '639c0484c41dc9.23476551.jpg'),
(58, 11, 'samsung s22 ultra', 'phone', 'electronics', 205, 'it is the top selling phone of samsung right now.', 80000, 1, 18, '639c06f7a4d639.73736566.jpg'),
(59, 11, 'i phone 14 pro max', 'phone', 'electronics', 230, 'it is the latest phone launched by i phone.', 140000, 1, 25, '639c076fa978b0.85192094.jpg'),
(60, 11, 'panasonic', 'tv', 'electronics', 4000, 'panasic is a good tv manufacturer ', 24000, 1, 52, '639c07cad136a9.93672501.webp'),
(61, 11, 'cuboid', 'tv', 'grocery', 3100, 'good', 20000, 1, 12, '639c0818c712e3.40814801.jpg'),
(62, 11, 'panasonic washing machine', 'washing machine', 'grocery', 12000, 'good', 14000, 1, 20, '639c0894361c04.61929115.jpg'),
(63, 11, 'panasonic b2 washing machine', 'washing machine', 'grocery', 13000, 'good', 16000, 1, 21, '639c08b9b4dea5.63069583.jpg'),
(64, 11, 'crompton oven v1', 'oven', 'grocery', 6000, 'good', 23050, 1, 100, '639c091875be38.84093741.webp'),
(65, 11, 'nothing phone 1', 'phone', 'grocery', 200, 'its a good product', 45000, 1, 12, '639c094035b9f7.10234453.webp'),
(66, 11, 'v-guard w5', 'washing machine', 'grocery', 15000, 'good', 17000, 1, 15, '639c09a388e8d2.38810430.jpg'),
(67, 11, 'realme gt neo 3', 'phone', 'grocery', 201, 'good', 31000, 1, 40, '639c09e3ec6753.01640840.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `c_id`, `s_id`, `rating`) VALUES
(4, 15, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
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
  `rating` float NOT NULL DEFAULT 0,
  `shop_status` int(1) NOT NULL DEFAULT 0,
  `total_rating` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `removed` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(10000) NOT NULL DEFAULT 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you''re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!',
  `discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `shop_name`, `location`, `license_no`, `category`, `email`, `cover_img`, `phone1`, `phone2`, `home_delivery`, `rating`, `shop_status`, `total_rating`, `status`, `removed`, `description`, `discount`) VALUES
(10, 'pittappally', 'nedumkandam', 123456254124, 'digital', 'pezitobiki@mailinator.com', 'cover-images/images.jpg', 6325648569, NULL, 1, 4.9, 1, 5, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(11, 'nandilath g mart', 'kattappana', 965826315242, 'electronics', 'bamikypa@mailinator.com', 'cover-images/63680d2aa74e80.49672339.jpeg', 8547512653, 9696586858, 0, 5, 0, 1, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(12, 'cochin', 'kattappana', 125412632512, 'bakery', 'sreyassatheesh555@gmail.com', 'cover-images/bakery-shop-row-pastry-bread-53928141.jpg', 1252362365, NULL, 0, 1.9, 1, 102, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(13, 'gozzip', 'kattappana', 125475485463, 'clothing', 'email@gamil.com', 'cover-images/istockphoto-901863672-170667a.jpg', 1252523252, 12452122123, 1, 3.1, 1, 55, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(14, 'uk', 'kattappana', 125475485463, 'clothing', 'sreyas@gmail.com', 'cover-images/photo-1567401893414-76b7b1e5a7a5.jpg', 1252523252, 12452122123, 1, 3, 1, 50, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(15, 'myG digital ', 'kattappana', 125475485463, 'digital ', 'mygkattappana@gmail.com', 'cover-images/IMG_6393.jpg', 1252523252, 12452122123, 1, 4.5, 1, 100, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(16, 'highrange home appliances', 'kattappana', 125475485477, 'home appliances', 'highrangehomeappliances@gmail.com', 'cover-images/oxygen-digital-shop-kottayam-5yyvr.jpg', 1252523252, 12452122123, 1, 3.5, 1, 200, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(17, 'jio books', 'kattappana', 125475485444, 'books', 'jiobooks22@gmail.com', 'cover-images/23032018_bookstore_05.jpg', 1245215421, NULL, 0, 3.7, 1, 105, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(18, 'lassy bay', 'kattappana', 421542152365, 'coffee bar', 'lassybay@gmail.com', 'cover-images/109_506071941.jpg', 9652132564, 8532653241, 1, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(19, 'petrol', 'kattappana', 546236636325, 'clothing', 'petrolkattappana@gmail.com\r\n', 'cover-images/download.jpg', 9656696696, 8559667234, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(20, 'trends', 'kattappana', 856633636353, 'kattappana', 'trendsktpns@gmail.com', 'cover-images/99bcef09e0a15c7d68edfaf7a16ed982.jpg', 9652132544, NULL, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(21, 'my cochin', 'kattappana', 754558965996, 'bakery ', 'mycochin@gmail.com', 'cover-images/blogimage_1525255196m.jpg', 9652444132, NULL, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(22, 'oppo mobile store ', 'kattappana', 455562256623, 'mobile store', 'opponearoldbusstand@gmail.com', 'cover-images/mobile-stores.jpg', 752226339, NULL, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(23, 'vivo mobile store ', 'kattappana', 966966965868, 'mobile store', 'vivonearoldbusstand@gmail.com', 'cover-images/download (1).jpg', 9665366842, NULL, 0, 0, 1, 0, 1, 1, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(25, 'pavitra jewellery', 'kattappana', 966413725631, 'jewellery', 'pavitrajewellery@gmail.com', 'cover-images/gold-jewelry-shop-little-india-sigapore-shiny-watches-necklaces-braces-singapore-92633770.jpg', 9785316459, 9548751254, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(26, 'ammu electronics', 'kattappana', 856565475654, 'electronics', 'ammuelectronics2@gmail.com', 'cover-images/125975-15350210.jpg', 9656696585, NULL, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(27, 'sadi supermarket', 'thodupuzha', 654565856231, 'grocery', 'sadi@mailinator.com', 'cover-images/634ebee2e176d3.50588185.jpg', 9858955858, 6954854754, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(28, 'ld corps', 'kattappana', 521421568565, 'clothing', 'ldcorps@gmail.com', 'cover-images/634fa4504c3437.72050754.jpg', 7421452111, 4455588755, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(29, 'hello', 'kattappana', 754854569585, 'clothing', 'vuzufamma@ilinator.com', 'cover-images/634fbe37e991a2.84595407.jpg', 6666655555, 6954854754, 0, 0, 1, 0, -1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(31, 'Audrey Nguyen', 'Porro laudantium pl', 142525236523, 'clothing', 'bynuvupyba@mailinator.com', 'cover-images/635f48f43d8c61.47291744.jpg', 1254454547, 0, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(32, 'Shaine Pope', 'Voluptatibus iste de', 122321521425, 'medical', 'zogucejis@mailinator.com', 'cover-images/635f4af2ea8ec2.51407484.jpg', 6969586958, 0, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(33, 'John Weeks', 'Aut sed laborum reru', 152421524125, 'meat', 'karyfow@mailinator.com', 'cover-images/635f4b458b0891.51524560.jpg', 9696965869, 0, 0, 0, 1, 0, 0, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(34, 'Portia Johnston', 'Dolores eligendi qui', 858585845758, 'medical', 'subom@mailinator.com', 'cover-images/635f4b855f6418.24450598.jpg', 8564592371, 0, 0, 0, 1, 0, 0, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(35, 'Dean Adams', 'Doloremque libero no', 658558547542, 'meat', 'codynamyp@mailinator.com', 'cover-images/635f4d961fa5c7.35640631.jpg', 9685874575, 9854785475, 0, 0, 1, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(36, 'Mannix Cook', 'Deserunt ullamco ver', 123456789101, 'clothing', 'myporaka@mailinator.com', 'cover-images/635f4e7bb2fb35.83119822.jpg', 1111111111, 0, 0, 0, 1, 0, 0, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(37, 'trends', 'kattappana', 565865458754, 'clothing', 'trendsktpna@mailinator.com', 'cover-images/6362b2aeb97268.30178638.webp', 9854585652, 9855457585, 0, 0, 0, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0),
(38, 'Hilda Turner', 'kat', 856589656234, 'medical', 'puwa@mailinator.com', 'cover-images/6391d81b338154.82297101.png', 9655854267, 0, 0, 0, 0, 0, 1, 0, 'Welcome to our shop, where quality meets affordability. We are a locally owned and operated store that offers a wide variety of products to meet all your needs. From household essentials to unique and trendy items, you\'re sure to find something you love at our shop. Our friendly and knowledgeable staff are always available to assist you in finding the perfect item and ensuring your shopping experience is a pleasant one. We take pride in offering top-notch products at competitive prices, so you can get the most for your money. Come visit us today and see for yourself why [Shop Name] is the go-to destination for savvy shoppers!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_login`
--

DROP TABLE IF EXISTS `seller_login`;
CREATE TABLE `seller_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(37, '9961856499', 'b7ec3a5593ff41beafb6d6e7041a0dd6'),
(38, '9961856411', 'b7ec3a5593ff41beafb6d6e7041a0dd6');

-- --------------------------------------------------------

--
-- Table structure for table `shop_images`
--

DROP TABLE IF EXISTS `shop_images`;
CREATE TABLE `shop_images` (
  `i_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop_images`
--

INSERT INTO `shop_images` (`i_id`, `s_id`, `image`) VALUES
(27, 11, 'img/shop-images/6407a52ded9da3.28249636.jpeg'),
(28, 11, 'img/shop-images/6407a5350c28f9.35215460.jpeg'),
(29, 11, 'img/shop-images/6407a53b2a3dc6.46024066.jpeg'),
(30, 11, 'img/shop-images/6407a5424c3a08.25527251.jpeg'),
(33, 11, 'img/shop-images/6407a562761a70.09868730.jpeg'),
(34, 11, 'img/shop-images/6407a5684e5c48.70620061.jpeg');

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
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`primary_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `primary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_login`
--
ALTER TABLE `seller_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `shop_images`
--
ALTER TABLE `shop_images`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
