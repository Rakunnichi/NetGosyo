-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 06:57 AM
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
(79, 2, 4, 7, 'I Love Tacloban Shirt', '250', '4.png', 1),
(80, 38, 2, 8, 'Banig Bag - Rectangular', '300', '2.png', 1),
(105, 1, 3, 0, 'Banig Bag - ZigZag', '500', '3.png', 1),
(106, 1, 5, 7, 'Baybayin Jacket', '200', '5.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `keywords`, `description`, `image`, `dateadded`) VALUES
(3, 'Pet Care', 'Pet Necessities', 'pet toys, pet accessories, pet foods, nutrients', '1696450282-cute-and-happy-dog-png.png', '2023-10-04 20:11:22');

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
(38, 32, 1, 4, 0, 1),
(39, 33, 1, 2, 0, 1),
(40, 34, 1, 3, 0, 1),
(41, 34, 1, 9, 0, 1),
(42, 35, 1, 2, 8, 1),
(43, 36, 1, 1, 8, 1);

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
(108, 1, 'The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!', '2023-09-29 02:26:33', '2023-09-29 02:26:33');

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
(32, 1, 'ECC1695721592', 'Earl Cartney Centino', '09154715779', 'Rainbow Village', 'Tacloban City', 'Leyte', '6500', 'Cash on Delivery', 'Accepted', '2023-09-26 17:46:32', '2023-09-26 17:50:24'),
(33, 1, 'ECC1695722079', 'Earl Cartney Centino', '09154715779', 'Rainbow Village', 'Tacloban City', 'Leyte', '6500', 'Cash on Delivery', 'Accepted', '2023-09-26 17:54:39', '2023-09-26 17:57:08'),
(34, 1, 'ECC1695723301', 'Earl Cartney Centino', '09154715779', 'Rainbow Village', 'Tacloban City', 'Leyte', '6500', 'Cash on Delivery', 'Rejected', '2023-09-26 18:15:01', '2023-09-26 18:16:10'),
(35, 1, 'ECC1695810494', 'Earl Cartney Centino', '09154715779', 'Rainbow Village', 'Tacloban City', 'Leyte', '6500', 'Cash on Delivery', 'Rejected', '2023-09-27 18:28:14', '2023-09-29 02:26:29'),
(36, 1, 'ECC1695810662', 'Earl Cartney Centino', '09154715779', 'Rainbow Village', 'Tacloban City', 'Leyte', '6500', 'GCash E- Wallet', 'Accepted', '2023-09-27 18:31:02', '2023-09-29 02:26:33');

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
(1, 'Cash on Delivery', 'NetGosyo-Sellers', '2023-09-27 10:18:29'),
(2, 'GCash E- Wallet', 'Globe Telecom', '2023-09-27 10:19:01');

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
(1, 8, 'Banig Bag - Rounded', '200', '1.png', 'Women-Bag', 18, '2023-09-27 10:31:02'),
(2, 8, 'Banig Bag - Rectangular', '300', '2.png', 'Women-Bag', 97, '2023-09-27 10:28:14'),
(3, 7, 'Banig Bag - ZigZag', '500', '3.png', 'Women-Bag', 19, '2023-09-26 09:13:24'),
(4, 7, 'I Love Tacloban Shirt', '250', '4.png', 'Men-Apparel', 29, '2023-09-26 09:46:32'),
(5, 7, 'Baybayin Jacket', '200', '5.png', 'Men-Apparel', 60, '2023-09-22 11:58:34'),
(6, 7, 'Baybayin Taktop', '134', '6.png', 'Men-Apparel', 60, '2023-09-21 11:58:04'),
(7, 7, 'Leyte`s Special Binagol', '150', '7.png', 'Foods', 200, '2023-07-09 17:22:44'),
(8, 7, 'Leyte`s Chocolate Moron', '45', '8.png', 'Foods', 211, '2023-07-09 17:22:57'),
(9, 7, 'Samsung Galaxy S7', '500', '1690791628-12.png', 'Gadget', 22, '2023-09-26 10:15:01');

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
(3, 2, 'Asoy', 3, 'Meh', 1693636660),
(4, 3, 'Andrew', 1, 'Scam', 1693636724),
(5, 4, 'Kennan', 1, 'ew', 1693636819),
(6, 5, 'Joey', 5, 'Great Product', 1693636919),
(7, 6, 'Theresa', 3, 'Okay', 1693638755),
(8, 7, 'Earl Cartney', 3, 'asdadads', 1693638802),
(9, 8, 'Coline', 4, 'Nice Product ', 1693653937),
(10, 9, 'Earl Cartney Centino', 4, 'Sample Review Readonly', 1693654404),
(11, 10, 'Rakunnichi', 2, 'Hey Hey Hey', 1693721304),
(12, 5, 'Rakunnichi', 2, 'Not true to size', 1693742995),
(13, 12, 'Rakunnichi', 3, 'Good Read', 1695648248);

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
(1, 'Andrew Afable Agda', 'izukumidoriya032@gmail.com', 'Rakunnichi', '202cb962ac59075b964b07152d234b70', '09154715779', 'Rainbow Village', '2000-07-02', 'Male', 'profile_924862043.JPG', 'user', '', 1, '2023-09-30 18:57:20'),
(2, 'Joey Raymund Macasusi', 'centinoearl@gmail.com', 'Joey', '81dc9bdb52d04dc20036dbd8313ed055', '09154715772', 'Tacloban City', '2023-09-12', 'Male', '', 'user', '', 0, '2023-09-30 18:57:49'),
(3, 'NetGosyo Email', 'netgosyo369@gmail.com', 'Netgosyo', '81dc9bdb52d04dc20036dbd8313ed055', '09143567784', 'Tacloban City', '2023-09-12', 'Male', '', 'user', '', 0, '2023-10-01 15:47:55'),
(5, 'Test Admin', 'test@test.com', 'test', '098f6bcd4621d373cade4e832627b4f6', '09150125941', 'Tacloban City', '1994-07-30', 'Female', '', 'user', '', 0, '2023-10-01 15:43:38'),
(7, 'Earl Cartney N. Centino', 'seller@gmail.com', 'Seller102', '81dc9bdb52d04dc20036dbd8313ed055', '09154715779', 'Rainbow Village Tacloban City', '2000-07-02', 'Male', 'profile_1030987840.jpg', 'Anyeong Ukay', '', 1, '2023-09-29 08:46:08'),
(8, 'Seller2', 'seller2@gmail.com', 'Dariel', '81dc9bdb52d04dc20036dbd8313ed055', '09154715772', 'Caibaan, Tacloban City', '2015-02-10', 'Male', 'profile_1123099532.jpg', 'Master Store', '', 0, '2023-09-21 09:20:47'),
(39, 'Dariel Rarugal', 'centino.earlcartney.n@gmail.com', 'Seler101', '81dc9bdb52d04dc20036dbd8313ed055', '09154715772', 'Japan, Tokyo', '2023-09-12', 'Female', 'profile_1223238167.JPG', 'Earl`s Ukay', 'bf5e7bece61ea61e580983f2ce115bfd', 1, '2023-09-28 19:10:31'),
(40, 'Mark Angelo Asoy', 'centinoearlcartney@gmail.com', 'Elo_Asoy', '81dc9bdb52d04dc20036dbd8313ed055', '0913226789', 'Paraiso Tacloban City', '1994-07-30', 'Male', '', 'user', 'a9fb5181f187c6e291d595e22f49cf50', 0, '2023-10-01 15:48:46');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pmethod`
--
ALTER TABLE `pmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
