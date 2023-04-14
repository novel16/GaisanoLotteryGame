-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 07:37 AM
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
-- Database: `lottery_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `invoice` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`invoice`, `amount`, `fullname`, `email`, `phone`, `date_created`) VALUES
('10000', '2555.00', '10000', '', '', '2023-04-13 14:38:43'),
('1111111', '2000.00', '1111111', '', '', '2023-04-13 09:32:26'),
('122222', '2555.00', '12222', '', '', '2023-04-13 14:56:54'),
('12aaa', '1111.22', 'miraflor aguilar', '', '', '2023-04-12 13:54:47'),
('133333', '2000.00', '133333', '', '', '2023-04-13 16:49:49'),
('144444', '2500.23', '14444', '', '', '2023-04-14 09:09:32'),
('15555', '5000.26', '155555', '', '', '2023-04-14 09:59:33'),
('202304051001', '2600150.00', 'Novel Chavez', '', '', '2023-04-12 13:37:13'),
('22222', '1200.25', NULL, NULL, NULL, '2023-04-12 13:39:27'),
('222222', '2000.00', '222222', '', '', '2023-04-13 09:50:22'),
('3333333', '2000.00', '222222', '', '', '2023-04-13 09:52:01'),
('44444', '2000.00', '44444', '', '', '2023-04-13 09:54:32'),
('55555', '2000.00', '5555555', '', '', '2023-04-13 09:56:28'),
('666666', '2000.00', '666666', '', '', '2023-04-13 10:32:56'),
('7777', '2000.12', '77777777', '', '', '2023-04-13 10:46:12'),
('88888', '2656.23', '888888', '', '', '2023-04-13 14:06:58'),
('9999', '2250.32', '99999', '', '', '2023-04-13 14:35:48'),
('aaaaaa', '260005.00', 'apple abellano', '', '', '2023-04-12 13:45:02'),
('bbbbbbb', '2600.05', 'bbbbbbbb', '', '', '2023-04-12 13:46:29'),
('ccccc', '2600.00', 'lapay&#39;s', '', '', '2023-04-12 13:47:27'),
('dddddd', '1000.25', 'ddddddd', '', '', '2023-04-12 13:49:30'),
('eeeee', '2000.26', NULL, NULL, NULL, '2023-04-12 13:40:06'),
('eeeeeee', '2566.27', 'eeeeeeeeeeeeee', '', '', '2023-04-12 14:20:07'),
('ffffff', '2600.05', 'ffffff', '', '', '2023-04-12 14:47:30'),
('gggggg', '10000.00', 'gggggggg', '', '', '2023-04-12 14:50:55'),
('hhhhh', '10000.00', 'hhhhhhh', '', '', '2023-04-12 15:20:57'),
('iiiiii', '1000.00', 'iiiiii', '', '', '2023-04-12 15:24:23'),
('jjjj', '1000.00', 'jjjj', '', '', '2023-04-12 15:26:23'),
('kkkkk', '1000.00', 'kkkkk', '', '', '2023-04-12 15:27:41'),
('lllll', '2000.00', 'llllll', '', '', '2023-04-12 15:31:49'),
('mmmm', '1000.00', 'mmmmmm', '', '', '2023-04-12 15:35:09'),
('nnnnn', '1000.00', 'nnnn', '', '', '2023-04-12 15:40:45'),
('oooo', '1000.00', 'oooo', '', '', '2023-04-12 15:42:23'),
('pppp', '1000.00', 'pppp', '', '', '2023-04-12 15:43:33'),
('qqqq', '1000.00', 'qqqqq', '', '', '2023-04-12 15:48:12'),
('rrrrr', '2000.00', 'rrrrrrrrrrr', '', '', '2023-04-13 08:51:06'),
('sssss', '2000.00', 'ssssss', '', '', '2023-04-13 08:54:51'),
('ttttt', '2600.05', 'tttttttttttt', '', '', '2023-04-13 08:55:37'),
('uuuuuu', '2000.00', 'uuuuuu', '', '', '2023-04-13 08:57:25'),
('vvvvvv', '2000.00', 'vvvvvvv', '', '', '2023-04-13 08:58:14'),
('wwwww', '1000.00', 'wwwww', '', '', '2023-04-13 09:09:24'),
('xxxxx', '2600.05', 'xxxxxx', '', '', '2023-04-13 09:14:43'),
('yyyyy', '2600.50', 'yyyyyyyyy', '', '', '2023-04-13 09:20:13'),
('zzzzzz', '1000.00', 'zzzzzz', '', '', '2023-04-13 09:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer_entries`
--

CREATE TABLE `customer_entries` (
  `id` int(11) NOT NULL,
  `customer_invoice` varchar(50) NOT NULL,
  `num_of_entries` int(11) NOT NULL,
  `total_entries` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_entries`
--

INSERT INTO `customer_entries` (`id`, `customer_invoice`, `num_of_entries`, `total_entries`) VALUES
(1, '202304051001', 2600, 2600),
(2, 'aaaaaa', 260, 260),
(3, 'bbbbbbb', 2, 2),
(4, 'ccccc', 2, 2),
(5, 'dddddd', 1, 1),
(6, '12aaa', 1, 0),
(7, 'eeeeeee', 2, 0),
(8, 'ffffff', 2, 0),
(9, 'gggggg', 10, 0),
(10, 'hhhhh', 10, 0),
(11, 'iiiiii', 1, 0),
(12, 'jjjj', 1, 0),
(13, 'kkkkk', 1, 0),
(14, 'lllll', 2, 0),
(15, 'mmmm', 1, 0),
(16, 'nnnnn', 1, 0),
(17, 'oooo', 1, 0),
(18, 'pppp', 1, 0),
(19, 'qqqq', 1, 0),
(20, 'rrrrr', 2, 0),
(21, 'sssss', 2, 0),
(22, 'ttttt', 2, 0),
(23, 'uuuuuu', 2, 0),
(24, 'vvvvvv', 2, 0),
(25, 'wwwww', 1, 0),
(26, 'xxxxx', 2, 0),
(27, 'yyyyy', 2, 0),
(28, 'zzzzzz', 1, 0),
(29, '1111111', 2, 0),
(30, '222222', 2, 0),
(31, '3333333', 2, 0),
(32, '44444', 2, 0),
(33, '55555', 2, 0),
(34, '666666', 2, 0),
(35, '7777', 2, 0),
(36, '88888', 2, 0),
(37, '9999', 2, 0),
(38, '10000', 2, 0),
(39, '122222', 2, 0),
(40, '133333', 2, 0),
(41, '144444', 2, 0),
(42, '15555', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lottery`
--

CREATE TABLE `lottery` (
  `id` int(11) NOT NULL,
  `c_invoice` varchar(50) NOT NULL,
  `lottery_a` varchar(4) DEFAULT NULL,
  `lottery_b` varchar(4) DEFAULT NULL,
  `lottery_c` varchar(4) DEFAULT NULL,
  `result_a` varchar(4) DEFAULT NULL,
  `result_b` varchar(4) DEFAULT NULL,
  `result_c` varchar(4) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `prize` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lottery`
--

INSERT INTO `lottery` (`id`, `c_invoice`, `lottery_a`, `lottery_b`, `lottery_c`, `result_a`, `result_b`, `result_c`, `date`, `status`, `prize`) VALUES
(1, '12aaa', '1', '2', '3', '9', '7', '0', '2023-04-12 14:12:44', 'Lose', 'N/A'),
(2, 'eeeeeee', '1', '2', '3', '6', '7', '1', '2023-04-12 14:44:17', 'Lose', 'N/A'),
(3, 'eeeeeee', '1', '2', '3', '2', '5', '7', '2023-04-12 14:46:17', 'Lose', 'N/A'),
(4, 'ffffff', '1', '2', '3', '1', '8', '7', '2023-04-12 14:47:41', 'Win', 'Consolation-1'),
(5, 'ffffff', '1', '2', '3', '5', '2', '0', '2023-04-12 14:49:37', 'Win', 'Consolation-1'),
(6, 'gggggg', '1', '2', '3', '4', '0', '9', '2023-04-12 14:51:04', 'Lose', 'N/A'),
(7, 'gggggg', '1', '2', '3', '8', '3', '1', '2023-04-12 14:51:26', 'Lose', 'N/A'),
(8, 'gggggg', '1', '2', '3', '5', '3', '1', '2023-04-12 14:53:04', 'Lose', 'N/A'),
(9, 'gggggg', '1', '2', '3', '5', '4', '9', '2023-04-12 14:53:51', 'Lose', 'N/A'),
(10, 'gggggg', '1', '2', '3', '6', '9', '8', '2023-04-12 14:54:09', 'Lose', 'N/A'),
(11, 'gggggg', '1', '2', '3', '1', '4', '2', '2023-04-12 14:54:25', 'Win', 'Consolation-1'),
(12, 'gggggg', '1', '2', '3', '3', '3', '0', '2023-04-12 14:54:47', 'Lose', 'N/A'),
(13, 'gggggg', '1', '2', '3', '1', '8', '6', '2023-04-12 14:55:50', 'Win', 'Consolation-1'),
(14, 'gggggg', '1', '2', '3', '6', '7', '5', '2023-04-12 14:56:35', 'Lose', 'N/A'),
(15, 'gggggg', '1', '2', '3', '9', '3', '3', '2023-04-12 15:15:19', 'Win', 'Consolation-1'),
(16, 'hhhhh', '1', '2', '3', '4', '3', '1', '2023-04-12 15:21:41', 'Lose', 'N/A'),
(17, 'hhhhh', '1', '2', '3', '3', '4', '4', '2023-04-12 15:21:45', 'Lose', 'N/A'),
(18, 'hhhhh', '1', '2', '3', '0', '1', '2', '2023-04-12 15:21:49', 'Lose', 'N/A'),
(19, 'hhhhh', '1', '2', '3', '5', '4', '3', '2023-04-12 15:21:52', 'Win', 'Consolation-1'),
(20, 'hhhhh', '1', '2', '3', '1', '7', '5', '2023-04-12 15:22:02', 'Win', 'Consolation-1'),
(21, 'hhhhh', '1', '2', '3', '9', '5', '6', '2023-04-12 15:22:14', 'Lose', 'N/A'),
(22, 'hhhhh', '1', '2', '3', '2', '1', '5', '2023-04-12 15:22:22', 'Lose', 'N/A'),
(23, 'hhhhh', '1', '2', '3', '7', '3', '0', '2023-04-12 15:22:26', 'Lose', 'N/A'),
(24, 'hhhhh', '1', '2', '3', '4', '0', '7', '2023-04-12 15:22:31', 'Lose', 'N/A'),
(25, 'hhhhh', '1', '2', '3', '8', '8', '3', '2023-04-12 15:22:47', 'Win', 'Consolation-1'),
(26, 'iiiiii', '1', '2', '3', '6', '1', '5', '2023-04-12 15:24:32', 'Lose', 'N/A'),
(27, 'jjjj', '1', '2', '3', '6', '9', '7', '2023-04-12 15:26:32', 'Lose', 'N/A'),
(28, 'kkkkk', '1', '2', '3', '0', '6', '6', '2023-04-12 15:29:38', 'Lose', 'N/A'),
(29, 'lllll', '1', '2', '3', '4', '3', '0', '2023-04-12 15:32:43', 'Lose', 'N/A'),
(30, 'lllll', '1', '2', '3', '7', '2', '6', '2023-04-12 15:32:47', 'Win', 'Consolation-1'),
(31, 'mmmm', '1', '2', '3', '5', '4', '9', '2023-04-12 15:35:17', 'Lose', 'N/A'),
(32, 'nnnnn', '1', '2', '3', '4', '0', '0', '2023-04-12 15:40:57', 'Lose', 'N/A'),
(33, 'oooo', '1', '2', '3', '4', '9', '1', '2023-04-12 15:42:35', 'Lose', 'N/A'),
(34, 'pppp', '1', '2', '3', '9', '5', '5', '2023-04-12 15:46:33', 'Lose', 'N/A'),
(35, 'qqqq', '1', '2', '3', '9', '4', '3', '2023-04-12 15:48:20', 'Win', 'Consolation-1'),
(36, 'rrrrr', '1', '2', '3', '6', '1', '4', '2023-04-13 08:51:18', 'Lose', 'N/A'),
(37, 'rrrrr', '1', '2', '3', '3', '4', '4', '2023-04-13 08:51:23', 'Lose', 'N/A'),
(38, 'sssss', '1', '2', '3', '5', '7', '0', '2023-04-13 08:54:59', 'Lose', 'N/A'),
(39, 'sssss', '1', '2', '3', '7', '7', '2', '2023-04-13 08:55:04', 'Lose', 'N/A'),
(40, 'ttttt', '1', '2', '3', '9', '1', '5', '2023-04-13 08:55:46', 'Lose', 'N/A'),
(41, 'ttttt', '1', '2', '3', '9', '8', '4', '2023-04-13 08:55:52', 'Lose', 'N/A'),
(42, 'uuuuuu', '1', '2', '3', '8', '7', '2', '2023-04-13 08:57:32', 'Lose', 'N/A'),
(43, 'uuuuuu', '1', '2', '3', '7', '0', '6', '2023-04-13 08:57:35', 'Lose', 'N/A'),
(44, 'vvvvvv', '1', '2', '3', '9', '4', '2', '2023-04-13 08:58:22', 'Lose', 'N/A'),
(45, 'vvvvvv', '1', '2', '3', '8', '6', '4', '2023-04-13 08:58:26', 'Lose', 'N/A'),
(46, 'wwwww', '1', '2', '3', '4', '2', '6', '2023-04-13 09:09:34', 'Win', 'Consolation-1'),
(47, 'xxxxx', '1', '2', '3', '6', '6', '7', '2023-04-13 09:14:52', 'Lose', 'N/A'),
(48, 'xxxxx', '1', '2', '3', '9', '8', '2', '2023-04-13 09:15:30', 'Lose', 'N/A'),
(49, 'yyyyy', '1', '2', '3', '4', '3', '7', '2023-04-13 09:20:30', 'Lose', 'N/A'),
(50, 'yyyyy', '1', '2', '3', '8', '4', '2', '2023-04-13 09:20:35', 'Lose', 'N/A'),
(51, 'zzzzzz', '1', '2', '3', '9', '2', '4', '2023-04-13 09:26:10', 'Win', 'Consolation-1'),
(52, '1111111', '1', '2', '3', '2', '6', '5', '2023-04-13 09:46:20', 'Lose', 'N/A'),
(53, '1111111', '1', '2', '3', '2', '8', '1', '2023-04-13 09:46:26', 'Lose', 'N/A'),
(54, '222222', '1', '2', '3', '6', '2', '3', '2023-04-13 09:50:29', 'Win', 'Consolation-2'),
(55, '222222', '1', '2', '3', '5', '8', '0', '2023-04-13 09:50:41', 'Lose', 'N/A'),
(56, '3333333', '1', '2', '3', '6', '0', '5', '2023-04-13 09:52:09', 'Lose', 'N/A'),
(57, '3333333', '1', '2', '3', '7', '8', '9', '2023-04-13 09:52:18', 'Lose', 'N/A'),
(58, '44444', '1', '2', '3', '7', '8', '9', '2023-04-13 09:54:39', 'Lose', 'N/A'),
(59, '44444', '1', '2', '3', '3', '5', '1', '2023-04-13 09:54:43', 'Lose', 'N/A'),
(60, '55555', '1', '2', '3', '0', '0', '2', '2023-04-13 09:56:36', 'Lose', 'N/A'),
(61, '55555', '1', '2', '3', '9', '2', '0', '2023-04-13 09:56:40', 'Win', 'Consolation-1'),
(62, '666666', '1', '2', '3', '8', '8', '4', '2023-04-13 10:35:56', 'Lose', 'N/A'),
(63, '666666', '1', '2', '3', '3', '7', '7', '2023-04-13 10:42:49', 'Lose', 'N/A'),
(64, '7777', '1', '2', '3', '9', '1', '8', '2023-04-13 10:46:22', 'Lose', 'N/A'),
(65, '7777', '1', '2', '3', '7', '4', '6', '2023-04-13 10:46:27', 'Lose', 'N/A'),
(66, '88888', '1', '2', '3', '1', '2', '9', '2023-04-13 14:07:21', 'Win', 'Consolation-2'),
(67, '88888', '1', '2', '3', '3', '2', '4', '2023-04-13 14:09:45', 'Win', 'Consolation-1'),
(68, '9999', '1', '2', '3', '9', '9', '8', '2023-04-13 14:35:56', 'Lose', 'N/A'),
(69, '9999', '1', '2', '3', '0', '2', '5', '2023-04-13 14:36:02', 'Win', 'Consolation-1'),
(70, '10000', '1', '2', '3', '7', '9', '6', '2023-04-13 14:38:56', 'Lose', 'N/A'),
(71, '10000', '1', '2', '3', '0', '1', '8', '2023-04-13 14:39:05', 'Lose', 'N/A'),
(72, '122222', '1', '2', '3', '9', '5', '8', '2023-04-13 15:15:35', 'Lose', 'N/A'),
(73, '122222', '1', '2', '3', '7', '2', '5', '2023-04-13 15:15:41', 'Win', 'Consolation-1'),
(74, '133333', '1', '2', '3', '8', '2', '0', '2023-04-13 16:49:58', 'Win', 'Consolation-1'),
(75, '133333', '1', '2', '3', '8', '2', '8', '2023-04-13 16:50:26', 'Win', 'Consolation-1'),
(76, '144444', '1', '2', '3', '3', '4', '1', '2023-04-14 09:40:03', 'Lose', 'N/A'),
(77, '144444', '1', '2', '3', '1', '9', '0', '2023-04-14 09:40:16', 'Win', 'Consolation-1'),
(78, '15555', '1', '2', '3', '6', '5', '6', '2023-04-14 09:59:43', 'Lose', 'N/A'),
(79, '15555', '1', '2', '3', '2', '7', '6', '2023-04-14 09:59:47', 'Lose', 'N/A'),
(80, '15555', '1', '2', '3', '7', '9', '3', '2023-04-14 09:59:54', 'Win', 'Consolation-1'),
(81, '15555', '1', '2', '3', '3', '8', '7', '2023-04-14 10:00:05', 'Lose', 'N/A'),
(82, '15555', '1', '2', '3', '3', '7', '9', '2023-04-14 10:00:15', 'Lose', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `branch`, `contact`, `address`) VALUES
(1, 'Gaisano Capital Corp.', '09233261347', 'General Maxilom Avenue, North Reclamation Area, Cebu City, Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fullname`, `password`, `role`, `date_created`) VALUES
('administrator', 'Gaisano Capital Corp', '$2y$10$ks3BlWcAeO2NTUuOmTi7IuVvuK7hwGRZnbkVRIKfAM9oR9cc103cy', 'Admin', '2023-03-25 02:31:41'),
('gcap', 'Gaisano Corp.', '$2y$10$tQNJRhGjrFLmVBAHCXCB1uXROTUYTruiq6hwu/nA2v0DRxf9j.9IK', 'User', '2023-02-23 05:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`invoice`);

--
-- Indexes for table `customer_entries`
--
ALTER TABLE `customer_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_entries`
--
ALTER TABLE `customer_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `lottery`
--
ALTER TABLE `lottery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
