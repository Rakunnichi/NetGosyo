-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 04:47 PM
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
(6, 41, '2', 'asda', '2023-11-13 14:49:46', NULL),
(7, 45, '7', 'Greetings', '2023-11-17 15:32:03', NULL),
(8, 8, '48', 'Greetings', '2023-11-17 16:31:11', NULL),
(9, 8, '48', 'Greetings', '2023-11-17 16:34:07', NULL),
(10, 8, '43', 'Greetings', '2023-11-17 16:36:05', NULL),
(11, 8, '41', 'Greetings', '2023-11-17 16:38:45', NULL);

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
(67, 60, 45, 2, 8, 1);

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
(17, 6, 'asdasd', 41, 2, 'attachments/test.jpeg', '2023-11-13 14:49:46', '2023-11-13 14:49:46'),
(18, 7, 'Hi Mith!', 45, 7, 'attachments/316291285_175167271775868_4682741577002420220_n.jpg', '2023-11-17 15:32:03', '2023-11-17 15:32:03'),
(19, 7, 'master looking good', 45, 7, '', '2023-11-17 15:33:19', '2023-11-17 15:33:19'),
(20, 7, 'master looking good', 45, 7, '', '2023-11-17 15:33:53', '2023-11-17 15:33:53'),
(21, 7, 'master looking good', 45, 7, '', '2023-11-17 15:35:26', '2023-11-17 15:35:26'),
(22, 7, 'master looking good', 45, 7, '', '2023-11-17 15:35:40', '2023-11-17 15:35:40'),
(23, 7, 'master looking good', 45, 7, '', '2023-11-17 15:35:47', '2023-11-17 15:35:47'),
(24, 7, 'master looking good', 45, 7, '', '2023-11-17 15:35:54', '2023-11-17 15:35:54'),
(26, 8, 'Hi New User! Interested in this?', 8, 48, 'attachments/10.png', '2023-11-17 16:31:11', '2023-11-17 16:31:11'),
(27, 9, 'Hi New Seller Interested In this New Product?', 8, 48, '../attachments/10.png', '2023-11-17 16:34:07', '2023-11-17 16:34:07'),
(28, 10, 'Hi!', 8, 43, '', '2023-11-17 16:36:05', '2023-11-17 16:36:05'),
(29, 10, 'Hi!', 8, 43, '', '2023-11-17 16:36:05', '2023-11-17 16:36:05'),
(30, 11, 'Hey!', 8, 41, '', '2023-11-17 16:38:45', '2023-11-17 16:38:45'),
(31, 11, 'Hey!', 8, 41, '', '2023-11-17 16:38:45', '2023-11-17 16:38:45');

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
(6, 6, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-05-06 12:11:03', NULL),
(8, 16, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-05-26 02:36:03', NULL),
(10, 17, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-05-31 20:16:48', NULL),
(12, 5, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-05-31 20:18:15', NULL),
(15, 2, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-06-01 14:11:18', '2023-06-01 14:11:18'),
(17, 7, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-06-11 11:38:09', '2023-06-11 11:38:09'),
(25, 8, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-06-23 14:13:47', '2023-06-23 14:13:47'),
(32, 9, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-20 17:50:21', '2023-07-20 17:50:21'),
(34, 10, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-20 19:53:01', '2023-07-20 19:53:01'),
(36, 11, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-20 19:54:06', '2023-07-20 19:54:06'),
(38, 12, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:46:20', '2023-07-21 00:46:20'),
(40, 13, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:48:24', '2023-07-21 00:48:24'),
(42, 14, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:53:11', '2023-07-21 00:53:11'),
(44, 15, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:54:23', '2023-07-21 00:54:23'),
(46, 16, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 00:56:06', '2023-07-21 00:56:06'),
(48, 17, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 02:51:47', '2023-07-21 02:51:47'),
(50, 18, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 02:53:04', '2023-07-21 02:53:04'),
(52, 19, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 03:15:34', '2023-07-21 03:15:34'),
(54, 20, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 03:18:43', '2023-07-21 03:18:43'),
(56, 21, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 03:19:06', '2023-07-21 03:19:06'),
(58, 22, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 13:25:34', '2023-07-21 13:25:34'),
(60, 23, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 13:34:35', '2023-07-21 13:34:35'),
(62, 24, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-21 13:38:17', '2023-07-21 13:38:17'),
(64, 25, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 01:51:36', '2023-07-27 01:51:36'),
(66, 26, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 01:53:11', '2023-07-27 01:53:11'),
(68, 27, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 01:56:27', '2023-07-27 01:56:27'),
(70, 28, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 02:58:28', '2023-07-27 02:58:28'),
(72, 29, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 02:59:38', '2023-07-27 02:59:38'),
(74, 30, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 03:00:40', '2023-07-27 03:00:40'),
(76, 31, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 03:05:17', '2023-07-27 03:05:17'),
(78, 32, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-27 03:08:04', '2023-07-27 03:08:04'),
(80, 33, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-29 20:02:03', '2023-07-29 20:02:03'),
(82, 34, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-29 20:26:43', '2023-07-29 20:26:43'),
(84, 35, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-29 23:01:52', '2023-07-29 23:01:52'),
(86, 36, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:19:52', '2023-07-30 18:19:52'),
(88, 37, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:23:52', '2023-07-30 18:23:52'),
(90, 38, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:29:29', '2023-07-30 18:29:29'),
(92, 39, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-30 18:58:32', '2023-07-30 18:58:32'),
(94, 40, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-08-03 16:10:04', '2023-08-03 16:10:04'),
(101, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-09-26 17:54:39', '2023-09-26 17:54:39'),
(102, 1, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-09-26 17:57:08', '2023-09-26 17:57:08'),
(103, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-09-26 18:15:01', '2023-09-26 18:15:01'),
(104, 1, 'The seller rejected your order. You can contact the seller for more info. Thank you!', '2023-09-26 18:16:10', '2023-09-26 18:16:10'),
(105, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-09-27 18:28:14', '2023-09-27 18:28:14'),
(106, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-09-27 18:31:02', '2023-09-27 18:31:02'),
(107, 1, 'The seller rejected your order. You can contact the seller for more info. Thank you!', '2023-09-29 02:26:29', '2023-09-29 02:26:29'),
(108, 1, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-09-29 02:26:33', '2023-09-29 02:26:33'),
(109, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-11 23:34:35', '2023-11-11 23:34:35'),
(110, 41, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-11 23:34:35', '2023-11-11 23:34:35'),
(111, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-11 23:41:46', '2023-11-11 23:41:46'),
(112, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-11 23:42:52', '2023-11-11 23:42:52'),
(113, 41, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-11-12 00:12:16', '2023-11-12 00:12:16'),
(114, 41, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-11-12 00:53:03', '2023-11-12 00:53:03'),
(115, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 00:53:30', '2023-11-12 00:53:30'),
(116, 41, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-11-12 00:53:48', '2023-11-12 00:53:48'),
(117, 1, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 01:00:17', '2023-11-12 01:00:17'),
(118, 7, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 01:16:02', '2023-11-12 01:16:02'),
(119, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 01:16:02', '2023-11-12 01:16:02'),
(120, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 01:20:05', '2023-11-12 01:20:05'),
(121, 7, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 01:20:05', '2023-11-12 01:20:05'),
(122, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 01:49:51', '2023-11-12 01:49:51'),
(123, 7, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 01:49:51', '2023-11-12 01:49:51'),
(124, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 16:36:43', '2023-11-12 16:36:43'),
(125, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-12 16:37:59', '2023-11-12 16:37:59'),
(126, 8, 'Your badge application has been rejected. Resubmit ID.', '2023-11-13 10:23:38', '2023-11-13 10:23:38'),
(127, 8, 'Your badge application has been rejected. Resubmit ID.', '2023-11-13 10:25:45', '2023-11-13 10:25:45'),
(128, 8, 'Your badge application has been rejected. Resubmit ID.', '2023-11-13 10:25:56', '2023-11-13 10:25:56'),
(129, 8, 'Your badge application has been rejected. Resubmit ID.', '2023-11-13 10:27:06', '2023-11-13 10:27:06'),
(130, 8, 'Your badge application has been approved.', '2023-11-13 10:27:19', '2023-11-13 10:27:19'),
(131, 41, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-11-13 12:52:51', '2023-11-13 12:52:51'),
(132, 41, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-11-13 12:52:53', '2023-11-13 12:52:53'),
(133, 41, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-11-13 12:52:55', '2023-11-13 12:52:55'),
(134, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-13 20:09:20', '2023-11-13 20:09:20'),
(135, 42, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-13 20:09:20', '2023-11-13 20:09:20'),
(136, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-13 20:26:45', '2023-11-13 20:26:45'),
(137, 43, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-13 20:26:45', '2023-11-13 20:26:45'),
(138, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-14 22:57:39', '2023-11-14 22:57:39'),
(139, 39, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-14 23:05:09', '2023-11-14 23:05:09'),
(140, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-14 23:05:09', '2023-11-14 23:05:09'),
(141, 7, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-15 20:33:19', '2023-11-15 20:33:19'),
(142, 8, 'Your badge application has been approved.', '2023-11-15 20:38:40', '2023-11-15 20:38:40'),
(143, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-15 21:26:32', '2023-11-15 21:26:32'),
(144, 44, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-15 21:26:32', '2023-11-15 21:26:32'),
(145, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-15 21:50:12', '2023-11-15 21:50:12'),
(146, 45, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-15 21:50:12', '2023-11-15 21:50:12'),
(147, 7, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-15 22:24:55', '2023-11-15 22:24:55'),
(148, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-15 22:26:46', '2023-11-15 22:26:46'),
(149, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-17 03:42:39', '2023-11-17 03:42:39'),
(150, 46, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-17 03:42:39', '2023-11-17 03:42:39'),
(151, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-17 03:47:11', '2023-11-17 03:47:11'),
(152, 47, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-17 03:47:11', '2023-11-17 03:47:11'),
(153, 1, 'A new user registered to NetGosyo. Congratulations!', '2023-11-17 03:57:53', '2023-11-17 03:57:53'),
(154, 48, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-11-17 03:57:53', '2023-11-17 03:57:53'),
(155, 45, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-11-17 16:29:37', '2023-11-17 16:29:37'),
(156, 7, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-17 23:36:22', '2023-11-17 23:36:22'),
(157, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-18 22:49:59', '2023-11-18 22:49:59'),
(158, 48, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-18 22:49:59', '2023-11-18 22:49:59'),
(159, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-18 23:18:47', '2023-11-18 23:18:47'),
(160, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-18 23:39:09', '2023-11-18 23:39:09'),
(161, 8, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-18 23:43:57', '2023-11-18 23:43:57'),
(162, 48, 'A buyer placed an order. Go to the orders page for more information.', '2023-11-18 23:43:57', '2023-11-18 23:43:57');

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
  `order_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `seller_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_number`, `name`, `contact`, `address`, `city`, `state`, `zip`, `pmode`, `status`, `order_added`, `order_updated`, `seller_id`) VALUES
(60, 45, 'JRA17003222378', 'John Rey Amith', '09154715779', 'San Jose Tacloban City', 'Tacloban City', 'Leyte', '6500', 'Cash on Delivery', 'Pending', '2023-11-18 23:43:57', NULL, 8),
(61, 45, 'JRA170032223748', 'John Rey Amith', '09154715779', 'San Jose Tacloban City', 'Tacloban City', 'Leyte', '6500', 'Cash on Delivery', 'Pending', '2023-11-18 23:43:57', NULL, 48);

-- --------------------------------------------------------

--
-- Table structure for table `pmethod`
--

CREATE TABLE `pmethod` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `provider` varchar(250) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmethod`
--

INSERT INTO `pmethod` (`id`, `name`, `provider`, `dateadded`) VALUES
(1, 'Cash on Delivery', 'NetGosyo-Sellers', '2023-09-27 10:18:29');

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
  `description` varchar(5000) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `price`, `image`, `item_brand`, `quantity`, `description`, `date_added`) VALUES
(1, 8, 'Banig Bag - Rounded', '200', '1.png', 'Women-Bag', 7, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-18 15:39:09'),
(2, 8, 'Banig Bag - Rectangular', '300', '2.png', 'Women-Bag', 90, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-18 15:43:57'),
(3, 7, 'Banig Bag - ZigZag', '500', '3.png', 'Women-Bag', 18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-16 18:07:45'),
(4, 7, 'I Love Tacloban Shirt', '250', '4.png', 'Men-Apparel', 29, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-16 18:07:51'),
(5, 39, 'Baybayin Jacket', '200', '5.png', 'Men-Apparel', 58, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-16 18:07:59'),
(6, 39, 'Baybayin Tanktop', '134', '6.png', 'Men-Apparel', 60, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-16 18:08:05'),
(7, 7, 'Leyte`s Special Binagol', '150', '7.png', 'Foods', 198, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-17 15:36:22'),
(8, 7, 'Leyte`s Chocolate Moron', '45', '8.png', 'Foods', 211, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-16 18:08:19'),
(9, 7, 'Samsung Galaxy S7', '500', '1690791628-12.png', 'Gadget', 20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem. Facilis veniam rerum ipsam totam sequi at autem omnis reprehenderit voluptatibus.', '2023-11-16 18:08:26'),
(20, 48, 'Iphone 4s', '5000', '1700318605-Iphone4.png', 'Gadget', 20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, eaque. Atque, ad soluta corporis temporibus assumenda saepe laudantium quidem.          ', '2023-11-18 14:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `product_id`, `user_name`, `user_rating`, `user_review`) VALUES
(1, 1, 'Earl Cartney', 4, 'Good Product'),
(2, 1, 'James ', 5, 'Bad Product'),
(3, 2, 'Asoy', 3, 'Meh'),
(4, 3, 'Andrew', 1, 'Scam'),
(5, 4, 'Kennan', 1, 'ew'),
(6, 5, 'Joey', 5, 'Great Product'),
(7, 6, 'Theresa', 3, 'Okay'),
(8, 7, 'Earl Cartney', 3, 'asdadads'),
(9, 8, 'Coline', 4, 'Nice Product '),
(10, 9, 'Earl Cartney Centino', 4, 'Sample Review Readonly'),
(11, 10, 'Rakunnichi', 2, 'Hey Hey Hey'),
(12, 5, 'Rakunnichi', 2, 'Not true to size'),
(13, 12, 'Rakunnichi', 3, 'Good Read'),
(14, 1, 'Julius', 0, 'asdasd'),
(15, 1, 'Julius', 0, 'asdasdasdasda'),
(16, 1, 'Julius', 4, 'asdasda'),
(17, 1, 'Julius', 4, 'asdasdaaaa'),
(18, 1, 'Julius', 4, 'asdsa'),
(19, 6, 'Mark Angelo Asoy', 4, 'Recommended!'),
(20, 5, 'Mark Angelo Asoy', 4, 'Recommended!'),
(21, 3, 'Mark Angelo Asoy', 2, 'Not A Good Product'),
(22, 2, 'Mark Angelo Asoy', 3, 'Good'),
(23, 8, 'John Rey Amith', 5, 'Favorite Foood!'),
(24, 7, 'John Rey Amith', 4, 'Approve by Me!'),
(25, 1, 'John Rey Amith', 5, 'Nice Product!'),
(26, 9, 'John Rey Amith', 1, 'Bad'),
(27, 7, 'John Rey Amith', 5, 'Great!');

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
  `checkout_pass` varchar(250) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `shopname` varchar(250) NOT NULL DEFAULT 'user',
  `shopdesc` varchar(5000) NOT NULL,
  `vkey` varchar(50) NOT NULL,
  `verify_token` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_pic` varchar(255) DEFAULT NULL,
  `has_verified_badge` tinyint(1) DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT 0,
  `number_verified` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `fullname`, `email`, `username`, `password`, `checkout_pass`, `phonenumber`, `address`, `dateofbirth`, `gender`, `image`, `shopname`, `shopdesc`, `vkey`, `verify_token`, `verified`, `register_date`, `id_pic`, `has_verified_badge`, `is_banned`, `number_verified`) VALUES
(1, 'Andrew Afable Agda', 'izukumidoriya032@gmail.com', 'Rakunnichi', '202cb962ac59075b964b07152d234b70', '0', '09154715779', 'Rainbow Village', '2000-07-02', 'Male', 'profile_902284549.jpg', 'user', '', '', '', 1, '2023-11-16 16:59:02', '', 0, 1, 0),
(2, 'Joey Raymund Macasusi', 'centinoearl@gmail.com', 'Joey', '81dc9bdb52d04dc20036dbd8313ed055', '0', '09154715772', 'Tacloban City', '2023-09-12', 'Male', '', 'user', '', '', '', 0, '2023-09-30 18:57:49', '', 0, 0, 0),
(3, 'NetGosyo', 'netgosyo398@gmail.com', 'Netgosyo', '81dc9bdb52d04dc20036dbd8313ed055', '0', '09143567784', 'Tacloban City', '2023-09-12', 'Male', '', 'user', '', '', '', 0, '2023-11-17 15:29:24', '', 0, 0, 0),
(5, 'Test Admin', 'test@test.com', 'test', '098f6bcd4621d373cade4e832627b4f6', '0', '09150125941', 'Tacloban City', '1994-07-30', 'Female', '', 'user', '', '', '', 0, '2023-10-01 15:43:38', '', 0, 0, 0),
(7, 'Earl Cartney N. Centino', 'seller@gmail.com', 'Seller102', '7815696ecbf1c96e6894b779456d330e', '0', '09154715779', 'Rainbow Village Tacloban City', '2000-07-02', 'Male', 'profile_1030987840.jpg', 'Anyeong Ukay', 'Discover the thrill of thrift with Ukay Ukay—the hottest new online thrift store for incredible deals on unique vintage clothing.\r\n\r\nBrowse thousands of one-of-a-kind pieces, from stylish dresses to cool jackets and more\r\nScore major discounts on pre-loved designer brands like Gucci, Prada, and Louis Vuitton\r\nNew arrivals daily to satisfy your treasure hunt cravings\r\nUkay Ukay is a thrifting paradise for vintage fashion lovers. Find your new favorite statement piece for a fraction of retail price. With an ever-changing selection of chic, retro, and modern styles, you\'ll get compliments every time you wear these secondhand scores.\r\n\r\nUkay Ukay takes the hassle out of thrifting. Now you can shop for pre-owned fashion from the comfort of home. No more spending hours digging through racks at crowded thrift stores. Simply browse our well-organized online shop to instantly uncover amazing deals. Join the thousands of savvy shoppers who have discovered the thrill of scoring coveted vintage finds at Ukay Ukay.\r\n\r\nVersion 2:\r\n\r\nScore big on pre-loved fashion treasures at Ukay Ukay—the hottest online thrift store for jaw-dropping deals on unique vintage clothing.\r\n\r\nAccess an ever-changing selection of one-of-a-kind vintage pieces\r\nFind major discounts on coveted designer brands like Chanel, Louis Vuitton, and more\r\nNew vintage arrivals added daily to satisfy your thrift cravings\r\nUkay Ukay is a vintage fashion lover\'s paradise. Discover chic retro dresses, cool vintage tees, stylish jackets, and other statement pieces for a fraction of the retail price. With steep discounts on pre-owned designer brands, you\'ll get compliments every time you wear these secondhand scores.\r\n\r\nSay goodbye to picked-over thrift stores and join the savvy shoppers scoring big on vintage fashion online. Ukay Ukay makes thrifting easy with their well-organized online shop full of amazing deals just waiting to be uncovered. Satisfy your craving for unique vintage finds without the hassle. Shop Ukay Ukay today and refresh your wardrobe with pre-loved fashion treasures!', '', '', 1, '2023-11-16 05:49:52', '', 1, 0, 0),
(8, 'Seller2', 'seller2@gmail.com', 'Dariel', '202cb962ac59075b964b07152d234b70', '0', '09154715772', 'Caibaan, Tacloban City', '2015-02-10', 'Male', 'profile_1123099532.jpg', 'Master Store', 'Discover the clothes, gadgets, and accessories that will make you stand out from the crowd! Our selection of the latest fashion, technology, and gear has something for everyone.\r\n\r\nHuge selection of stylish clothes for men, women, and kids - from casual wear to formal attire\r\nCutting-edge phones and gadgets with all the latest features and capabilities\r\nQuality bags, backpacks, and accessories to carry your essentials in style\r\nStay on top of all the hottest trends and get compliments wherever you go. Our affordable prices make it easy to refresh your look as often as you like.\r\n\r\nMake a statement and express your personal style with confidence. Our products make looking and feeling your best effortless!', '', '', 1, '2023-11-17 08:40:24', 'id_pic_1387739491.jpeg', 1, 0, 0),
(39, 'Dariel Rarugal', 'centino.earlcartney.n@gmail.com', 'Seler101', '81dc9bdb52d04dc20036dbd8313ed055', '0', '09154715772', 'Japan, Tokyo', '2023-09-12', 'Female', 'profile_1223238167.JPG', 'Earl`s Ukay', 'Stand out from the crowd with these one-of-a-kind vintage apparels! This stylish clothing takes you back to iconic eras with authentic retro designs.\r\n\r\nGenuine vintage pieces from the 50s, 60s, 70s, and beyond\r\nUnique fabrics and patterns you won\'t find anywhere else\r\nCarefully curated collection of dresses, tops, bottoms, and accessories\r\nWith these vintage apparels, you\'ll showcase your bold personality and love of retro style. The flattering fits and high-quality construction ensure you look as good as you feel in these conversation-starting classics.\r\n\r\nFor trendsetters and vintage devotees who want effortless chic style, these vintage apparels are your ticket to timeless cool. Wear them to stand out in any crowd while paying homage to iconic fashion history.\r\n\r\nVersion 2:\r\n\r\nTake your wardrobe back in time with these one-of-a-kind vintage apparels! Lovingly curated from iconic eras, these retro gems are your new secret weapons for showstopping style.\r\n\r\nAuthentic designs from the most stylish decades\r\nFabrics and patterns with true vintage charm\r\nDresses, tops, bottoms and accessories for head-to-toe retro looks\r\nImagine the compliments you\'ll get when you walk into the room looking like a glamorous star from the past. With impeccable fits tailored to flatter, these vintage apparels make you look as gorgeous as you feel.\r\n\r\nFor fashionistas and vintage devotees, these apparels are your ticket to era-hopping chic. Express your bold personality while paying homage to the past with the ultimate vintage classics.', 'bf5e7bece61ea61e580983f2ce115bfd', '', 1, '2023-11-16 05:53:25', '', 0, 1, 0),
(40, 'Mark Angelo Asoy', 'centinoearlcartney@gmail.com', 'Elo_Asoy', '81dc9bdb52d04dc20036dbd8313ed055', '0', '09682601128', 'Paraiso Tacloban City', '1994-07-30', 'Male', 'profile_1743292212.jpg', 'user', '', 'a9fb5181f187c6e291d595e22f49cf50', '', 1, '2023-11-15 12:34:41', '', 0, 0, 0),
(41, 'Julius', 'juliusacidre@gmail.com', 'Julius', '6537e99af2c2223642df9f70a0b5afca', '0', '09455218507', '', '', '', 'profile_839574480.jpeg', 'user', '', '496cb6dd36e33de06c92dfb3fc4f70da', '', 1, '2023-11-13 08:56:39', '', 0, 0, 0),
(43, 'Andrew Agda', 'drewagda@gmail.com', 'Andrew1020', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', '', '', '', '', 'user', '', '3f3661e48531685894312f6532400bd5', '', 0, '2023-11-13 12:28:42', NULL, NULL, 1, 0),
(45, 'John Rey Amith', 'rakunn777@gmail.com', 'Ran1020', '81dc9bdb52d04dc20036dbd8313ed055', '0ae84817365fa50ae008311381d052a0', '09154715779', 'San Jose Tacloban City', '2023-11-13', 'Male', 'profile_1461252982.jpg', 'user', '', 'e92f29283cf4e4c42e7a14286efdb22e', '7dea3ba66d3dfe004c6aba00a4415f83NetGosyo', 1, '2023-11-18 12:30:36', NULL, NULL, 0, 0),
(48, 'Arvin Felicen', 'rakunn719@gmail.com', 'Arvin2020', '81dc9bdb52d04dc20036dbd8313ed055', '', '09682601128', 'Japan, Tokyo', '', '', '1700164673-qwer.jpg', 'Arvin`s Gadgets', 'Whether you need to send emails on the go, stream movies, or video chat with friends, Gadgets\' laptops and phones have the specs to handle it all. From lightweight notebooks to tablets to smartphones, your new device is ready to tackle work and play with ease.\r\n\r\nSay goodbye to low storage, slow processing speeds, and short battery life. Gadgets offers stylish, innovative devices built for today\'s nonstop lifestyles. And with a range of prices, there\'s something for every budget.\r\n\r\nJoin the Gadgets revolution and upgrade your tech - and your life. Find the gadget that fits you best today.', 'c335cd45e5b7fcd2083203aab2879dca', '', 1, '2023-11-16 19:58:56', NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pmethod`
--
ALTER TABLE `pmethod`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pmethod`
--
ALTER TABLE `pmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
