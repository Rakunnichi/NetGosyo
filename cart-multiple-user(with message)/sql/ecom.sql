-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 02:50 PM
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
(79, 2, 4, 7, 'I Love Tacloban Shirt', '250', '4.png', 1);

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
(36, 11, 'Thank you for registering to NetGosyo. Have a happy shopping!', '2023-07-20 19:54:06', '2023-07-20 19:54:06');

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
(8, 7, 'Leyte`s Chocolate Moron', '45', '8.png', 'Foods', 211, '2023-07-09 17:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `username`, `password`, `fullname`, `phonenumber`, `address`, `dateofbirth`, `gender`, `image`) VALUES
(1, 'Earl Cartney Centino', 'izukumidoriya032@gmail.com', 'Rakunnichi', '81dc9bdb52d04dc20036dbd8313ed055', '', '09154715779', 'Rainbow Village', '2000-07-02', 'Male', 'profile_1879505811.jpg'),
(2, 'Kuya Ey', 'centinoearlcartney@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 'Tacloban City', '', '', ''),
(3, 'dummy', 'dummy@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', ''),
(4, 'Franz', 'franz@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', ''),
(5, 'Test Admin', 'test@test.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 'Test', '09150125941', 'Tacloban City', '1994-07-30', 'test', ''),
(6, 'try', 'try@try.com', '', '080f651e3fcca17df3a47c2cecfcb880', '', '', '', '', '', ''),
(7, 'Earl Cartney Centino', 'seller@gmail.com', 'Seller101', '81dc9bdb52d04dc20036dbd8313ed055', 'Earl Cartney Norombaba Centino', '09154715779', 'Rainbow Village Tacloban City', '2000-07-02', 'Male', 'profile_1879505811.jpg'),
(8, 'Seller2', 'seller2@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', ''),
(11, 'Andrew Afable Agda', 'anrew@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', '', '');

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
