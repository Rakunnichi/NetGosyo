-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 12:07 PM
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
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `seller_id`, `name`, `price`, `image`, `quantity`) VALUES
(78, 1, 3, 7, 'Banig Bag - ZigZag', '400', '3.png', 1),
(79, 2, 4, 7, 'I Love Tacloban Shirt', '250', '4.png', 1),
(80, 38, 2, 8, 'Banig Bag - Rectangular', '300', '2.png', 1),
(83, 1, 2, 0, 'Banig Bag - Rectangular', '300', '2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `convo`
--

CREATE TABLE `convo` (
  `convo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `convo_added` datetime NOT NULL DEFAULT current_timestamp(),
  `convo_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `convo`
--

INSERT INTO `convo` (`convo_id`, `user_id`, `recipient`, `subject`, `convo_added`, `convo_updated`) VALUES
(1, 4, '5', 'Test', '2023-05-28 04:42:38', NULL),
(2, 5, '1', 'Order', '2023-05-31 20:09:24', NULL),
(3, 2, '1', 'Order', '2023-06-01 14:17:30', NULL),
(4, 7, '2', 'sasad', '2023-07-12 00:22:32', NULL),
(5, 7, '8', 'programmer', '2023-07-14 17:45:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `order_id`, `user_id`, `product_id`, `seller_id`, `qty`) VALUES
(32, 27, 1, 1, 8, 1),
(33, 27, 1, 3, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `convo_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `attachment` varchar(500) NOT NULL,
  `message_added` datetime NOT NULL DEFAULT current_timestamp(),
  `message_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `convo_id`, `message`, `from_id`, `to_id`, `attachment`, `message_added`, `message_updated`) VALUES
(1, 1, 'test', 4, 5, 'attachments/el.png', '2023-05-28 04:42:38', NULL),
(2, 2, 'qwerty', 5, 1, '', '2023-05-31 20:09:24', NULL),
(3, 2, 'qwerty', 5, 1, '', '2023-05-31 20:09:24', NULL),
(4, 2, '', 1, 5, 'attachments/1252336.jpg', '2023-05-31 20:14:42', NULL),
(5, 2, '', 1, 5, 'attachments/Prayer and Lupang Hinirang.mp4', '2023-05-31 20:15:01', NULL),
(6, 3, '123456', 2, 1, '', '2023-06-01 14:17:30', '2023-06-01 14:17:30'),
(7, 3, '123456', 2, 1, '', '2023-06-01 14:17:30', '2023-06-01 14:17:30'),
(8, 3, '', 1, 2, 'attachments/R (1).png', '2023-06-01 14:17:49', '2023-06-01 14:17:49'),
(9, 4, 'sdad', 7, 2, '', '2023-07-12 00:22:32', '2023-07-12 00:22:32'),
(10, 4, 'sdad', 7, 2, '', '2023-07-12 00:22:32', '2023-07-12 00:22:32'),
(11, 4, 'wagabogaboga', 7, 2, '', '2023-07-12 00:23:26', '2023-07-12 00:23:26'),
(13, 4, 'sadasdsa', 7, 2, '', '2023-07-13 15:08:14', '2023-07-13 15:08:14'),
(14, 5, 'helloo', 7, 8, '', '2023-07-14 17:45:07', '2023-07-14 17:45:07'),
(15, 5, 'helloo', 7, 8, '', '2023-07-14 17:45:07', '2023-07-14 17:45:07'),
(16, 5, 'hello pooo', 8, 7, '', '2023-07-14 17:48:54', '2023-07-14 17:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification` varchar(255) NOT NULL,
  `notification_added` datetime NOT NULL DEFAULT current_timestamp(),
  `notification_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `notification`, `notification_added`, `notification_updated`) VALUES
(1, 5, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-05-05 06:19:17', '2023-05-05 06:37:00'),
(2, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-05-06 12:02:57', NULL),
(3, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-05-06 12:06:30', NULL),
(4, 1, 'The seller rejected your order. You can contact the seller for more info. Thank you!', '2023-05-06 12:08:26', NULL),
(5, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-05-06 12:11:03', NULL),
(6, 6, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-05-06 12:11:03', NULL),
(7, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-05-26 02:32:56', NULL),
(8, 16, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-05-26 02:36:03', NULL),
(9, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-05-31 20:16:30', NULL),
(10, 17, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-05-31 20:16:48', NULL),
(11, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-05-31 20:18:01', NULL),
(12, 5, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-05-31 20:18:15', NULL),
(13, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-01 14:09:25', '2023-06-01 14:09:25'),
(14, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-01 14:10:56', '2023-06-01 14:10:56'),
(15, 2, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-06-01 14:11:18', '2023-06-01 14:11:18'),
(16, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-06-11 11:38:09', '2023-06-11 11:38:09'),
(17, 7, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-06-11 11:38:09', '2023-06-11 11:38:09'),
(18, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-13 19:33:39', '2023-06-13 19:33:39'),
(19, 1, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-06-13 19:37:54', '2023-06-13 19:37:54'),
(20, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-19 15:06:55', '2023-06-19 15:06:55'),
(21, 1, 'The seller rejected your order. You can contact the seller for more info. Thank you!', '2023-06-19 15:07:44', '2023-06-19 15:07:44'),
(22, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-23 14:01:17', '2023-06-23 14:01:17'),
(23, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-23 14:07:45', '2023-06-23 14:07:45'),
(24, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-06-23 14:13:47', '2023-06-23 14:13:47'),
(25, 8, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-06-23 14:13:47', '2023-06-23 14:13:47'),
(26, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-23 14:23:02', '2023-06-23 14:23:02'),
(27, 1, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-06-23 17:03:01', '2023-06-23 17:03:01'),
(28, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-23 17:07:30', '2023-06-23 17:07:30'),
(29, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-06-24 13:58:54', '2023-06-24 13:58:54'),
(30, 1, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-06-24 14:15:49', '2023-06-24 14:15:49'),
(31, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-20 17:50:21', '2023-07-20 17:50:21'),
(32, 9, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-20 17:50:21', '2023-07-20 17:50:21'),
(33, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-20 19:53:01', '2023-07-20 19:53:01'),
(34, 10, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-20 19:53:01', '2023-07-20 19:53:01'),
(35, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-20 19:54:06', '2023-07-20 19:54:06'),
(36, 11, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-20 19:54:06', '2023-07-20 19:54:06'),
(37, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 00:46:20', '2023-07-21 00:46:20'),
(38, 12, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:46:20', '2023-07-21 00:46:20'),
(39, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 00:48:24', '2023-07-21 00:48:24'),
(40, 13, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:48:24', '2023-07-21 00:48:24'),
(41, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 00:53:11', '2023-07-21 00:53:11'),
(42, 14, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:53:11', '2023-07-21 00:53:11'),
(43, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 00:54:23', '2023-07-21 00:54:23'),
(44, 15, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:54:23', '2023-07-21 00:54:23'),
(45, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 00:56:06', '2023-07-21 00:56:06'),
(46, 16, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:56:06', '2023-07-21 00:56:06'),
(47, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 02:51:47', '2023-07-21 02:51:47'),
(48, 17, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 02:51:47', '2023-07-21 02:51:47'),
(49, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 02:53:04', '2023-07-21 02:53:04'),
(50, 18, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 02:53:04', '2023-07-21 02:53:04'),
(51, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 03:15:34', '2023-07-21 03:15:34'),
(52, 19, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 03:15:34', '2023-07-21 03:15:34'),
(53, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 03:18:43', '2023-07-21 03:18:43'),
(54, 20, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 03:18:43', '2023-07-21 03:18:43'),
(55, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 03:19:06', '2023-07-21 03:19:06'),
(56, 21, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 03:19:06', '2023-07-21 03:19:06'),
(57, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 13:25:34', '2023-07-21 13:25:34'),
(58, 22, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 13:25:34', '2023-07-21 13:25:34'),
(59, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 13:34:35', '2023-07-21 13:34:35'),
(60, 23, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 13:34:35', '2023-07-21 13:34:35'),
(61, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-21 13:38:17', '2023-07-21 13:38:17'),
(62, 24, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 13:38:17', '2023-07-21 13:38:17'),
(63, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 01:51:36', '2023-07-27 01:51:36'),
(64, 25, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 01:51:36', '2023-07-27 01:51:36'),
(65, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 01:53:11', '2023-07-27 01:53:11'),
(66, 26, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 01:53:11', '2023-07-27 01:53:11'),
(67, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 01:56:27', '2023-07-27 01:56:27'),
(68, 27, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 01:56:27', '2023-07-27 01:56:27'),
(69, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 02:58:28', '2023-07-27 02:58:28'),
(70, 28, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 02:58:28', '2023-07-27 02:58:28'),
(71, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 02:59:38', '2023-07-27 02:59:38'),
(72, 29, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 02:59:38', '2023-07-27 02:59:38'),
(73, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 03:00:40', '2023-07-27 03:00:40'),
(74, 30, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 03:00:40', '2023-07-27 03:00:40'),
(75, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 03:05:17', '2023-07-27 03:05:17'),
(76, 31, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 03:05:17', '2023-07-27 03:05:17'),
(77, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-27 03:08:04', '2023-07-27 03:08:04'),
(78, 32, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 03:08:04', '2023-07-27 03:08:04'),
(79, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-29 20:02:03', '2023-07-29 20:02:03'),
(80, 33, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-29 20:02:03', '2023-07-29 20:02:03'),
(81, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-29 20:26:43', '2023-07-29 20:26:43'),
(82, 34, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-29 20:26:43', '2023-07-29 20:26:43'),
(83, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-29 23:01:52', '2023-07-29 23:01:52'),
(84, 35, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-29 23:01:52', '2023-07-29 23:01:52'),
(85, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-30 18:19:52', '2023-07-30 18:19:52'),
(86, 36, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:19:52', '2023-07-30 18:19:52'),
(87, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-30 18:23:52', '2023-07-30 18:23:52'),
(88, 37, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:23:52', '2023-07-30 18:23:52'),
(89, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-30 18:29:29', '2023-07-30 18:29:29'),
(90, 38, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:29:29', '2023-07-30 18:29:29'),
(91, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-07-30 18:58:32', '2023-07-30 18:58:32'),
(92, 39, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:58:32', '2023-07-30 18:58:32'),
(93, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-08-03 16:10:04', '2023-08-03 16:10:04'),
(94, 40, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-08-03 16:10:04', '2023-08-03 16:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `pmode` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `order_added` datetime NOT NULL DEFAULT current_timestamp(),
  `order_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_number`, `name`, `contact`, `address`, `city`, `state`, `zip`, `pmode`, `status`, `order_added`, `order_updated`) VALUES
(27, 1, 'ECC1687586334', 'Earl Cartney Centino', '09154715779', 'Rainbow Village', 'Tacloban City', 'Leyte', '6500', 'Cash on Delivery', 'Accepted', '2023-06-24 13:58:54', '2023-06-24 14:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `item_brand` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `price`, `image`, `item_brand`, `quantity`, `date_added`) VALUES
(1, 8, 'Banig Bag - Rounded', '200', '1.png', 'Banig', 20, '2023-07-09 17:21:26'),
(2, 8, 'Banig Bag - Rectangular', '300', '2.png', 'Banig', 100, '2023-07-09 17:21:38'),
(3, 7, 'Banig Bag - ZigZag', '400', '3.png', 'Banig', 50, '2023-07-09 17:21:50'),
(4, 7, 'I Love Tacloban Shirt', '250', '4.png', 'Clothes', 30, '2023-07-09 17:22:02'),
(5, 7, 'Baybayin Jacket', '400', '5.png', 'Clothes', 60, '2023-07-09 17:22:13'),
(6, 7, 'Baybayin Taktop', '134', '6.png', 'Clothes', 60, '2023-07-09 17:22:33'),
(7, 7, 'Leyte`s Special Binagol', '150', '7.png', 'Foods', 200, '2023-07-09 17:22:44'),
(8, 7, 'Leyte`s Chocolate Moron', '45', '8.png', 'Foods', 211, '2023-07-09 17:22:57'),
(9, 7, 'Samsung Galaxy', '500', '1690791628-12.png', 'Gadget', 23, '2023-07-31 08:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text CHARACTER SET utf8mb4 NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `product_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 1, 'Earl Cartney', 4, 'Good Product', 1693636467),
(2, 1, 'James ', 5, 'Bad Product', 1693636534),
(3, 0, 'Asoy', 3, 'Meh', 1693636660),
(4, 0, 'Andrew', 1, 'Scam', 1693636724),
(5, 0, 'Kennan', 1, 'ew', 1693636819),
(6, 0, 'Joey', 5, 'Great Product', 1693636919),
(7, 0, 'Theresa', 3, 'Okay', 1693638755),
(8, 0, 'Earl Cartney', 3, 'asdadads', 1693638802),
(9, 0, 'Coline', 4, 'Nice Product ', 1693653937),
(10, 0, 'Earl Cartney Centino', 4, 'Sample Review Readonly', 1693654404),
(11, 0, 'Rakunnichi', 2, 'Hey Hey Hey', 1693721304),
(12, 5, 'Rakunnichi', 2, 'Not true to size', 1693742995);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `shopname` varchar(250) NOT NULL DEFAULT 'user',
  `vkey` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `fullname`, `email`, `username`, `password`, `phonenumber`, `address`, `dateofbirth`, `gender`, `image`, `shopname`, `vkey`, `verified`, `register_date`) VALUES
(1, 'Earl Cartney Centino', 'izukumidoriya032@gmail.com', 'Rakunnichi', '81dc9bdb52d04dc20036dbd8313ed055', '09154715779', 'Rainbow Village', '2000-07-02', 'Male', 'profile_924862043.JPG', 'user', '', 1, '2023-08-03 08:02:49'),
(2, 'Kuya Ey', 'centinoearl@gmail.com', 'Joey', '81dc9bdb52d04dc20036dbd8313ed055', '09154715772', 'Tacloban City', '2023-09-12', 'Male', '', 'user', '', 0, '2023-09-02 11:47:44'),
(3, 'dummy', 'dummy@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', 'user', '', 0, '2023-08-03 08:07:16'),
(4, 'Franz', 'franz@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', 'user', '', 0, '2023-08-03 08:07:31'),
(5, 'Test Admin', 'test@test.com', 'test', '098f6bcd4621d373cade4e832627b4f6', '09150125941', 'Tacloban City', '1994-07-30', 'test', '', 'user', '', 0, '2023-08-03 08:32:01'),
(7, 'Earl Cartney N. Centino', 'seller@gmail.com', 'Seller102', '81dc9bdb52d04dc20036dbd8313ed055', '09154715779', 'Rainbow Village Tacloban City', '2000-07-02', 'Male', 'profile_1030987840.jpg', 'Anyeong Ukay', '', 1, '2023-09-05 13:14:02'),
(8, 'Seller2', 'seller2@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', 'Master Store', '', 0, '2023-08-03 08:35:34'),
(39, 'Dariel Rarugal', 'centino.earlcartney.n@gmail.com', 'Seler101', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', 'Earl`s Ukay', 'bf5e7bece61ea61e580983f2ce115bfd', 1, '2023-07-30 11:01:55'),
(40, 'Mark Angelo Asoy', 'centinoearlcartney@gmail.com', 'Rakunnichi', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', 'user', 'a9fb5181f187c6e291d595e22f49cf50', 0, '2023-08-03 08:10:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `convo`
--
ALTER TABLE `convo`
  ADD PRIMARY KEY (`convo_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
