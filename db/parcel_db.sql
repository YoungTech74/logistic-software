-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 08:33 PM
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
-- Database: `logistic_parcel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `id` int(255) NOT NULL,
  `incoming_messages` int(255) NOT NULL,
  `new_messages` int(255) NOT NULL,
  `read_messages` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `incoming_messages`, `new_messages`, `read_messages`) VALUES
(1, 19, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` text NOT NULL,
  `inbox_count` int(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `username`, `message`, `reply`, `inbox_count`, `date_created`) VALUES
(1, 'Lady', 'haven\'t gotten my packages', '', 0, '2023-04-15 13:56:29'),
(2, 'Lady', 'testing sample', '', 0, '2023-04-15 14:00:36'),
(3, 'Lady', 'sample sample', '', 0, '2023-04-15 14:03:12'),
(4, 'Beni', 'sample testing', 'testing description', 0, '2023-04-16 13:14:26'),
(6, 'John Doe', 'delayed delivery', '0', 0, '2023-04-17 09:18:22'),
(7, 'Mary', 'Thanks for gifted card but didn\'t got mine', 'we are sorry about that Mary. i will see to it okay', 0, '2023-04-25 05:45:28'),
(8, 'Mary', 'sample complaint', 'be my guest!', 0, '2023-04-25 07:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_phone` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_phone` varchar(255) NOT NULL,
  `courier_name` varchar(255) NOT NULL,
  `courier_email` varchar(255) NOT NULL,
  `courier_phone` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `seen` int(10) NOT NULL,
  `accept` int(5) NOT NULL,
  `status` text NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `company_name`, `sender_name`, `sender_email`, `sender_phone`, `receiver_name`, `receiver_email`, `receiver_phone`, `courier_name`, `courier_email`, `courier_phone`, `product_image`, `seen`, `accept`, `status`, `date_uploaded`) VALUES
(1, 'Mama Pride', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Sample receiver', 'sample email', '895998403259852', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/drwhite.png', 1, 1, '<p style=\"background: green; padding: 5px; border-radius: 8px; text-align: center; color: white\">Accepted</p>', '2023-04-14 13:40:42'),
(3, 'Phones', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Any one', 'any@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/Isaac cmp201 ouput1.PNG', 1, 1, '<p style=\"background: green; padding: 5px; border-radius: 8px; text-align: center; color: white\">Accepted</p>', '2023-04-15 04:08:36'),
(5, 'Young company', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Any one', 'sample@gmail.com', '895998403259852', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/john-logo.png', 1, 0, '<p style=\"background: red; padding: 5px; border-radius: 8px; text-align: center; color: white\">Declined</p>', '2023-04-15 04:15:52'),
(6, 'Phones', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Sample receiver', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/drwhite_1 (2).png', 1, 1, '<p style=\"padding: 5px; border-radius: 8px; text-align: center; color: white\" class=\"bg-success\">Delivered</p>', '2023-04-15 12:23:27'),
(8, 'Phones', 'Lady', 'beni@gmail.com', '12345678909', 'Any one', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/FB_IMG_16594815455054147.jpg', 1, 1, '<p class=\"bg-warning\" style=\"padding: 5px; border-radius: 8px; text-align: center; color: white\">In Progress <i class=\"fa fa-cog fa-spin\"  aria-hidden=\"true\" ></i></p>', '2023-04-15 12:46:27'),
(9, 'Young company', 'Lady', 'beni@gmail.com', '12345678909', 'Sample receiver', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/FB_IMG_16594815923216699.jpg', 1, 1, '<p class=\"bg-warning text-white\" style=\"padding: 5px; border-radius: 8px; text-align: center; color: white;\">In Progress <i class=\"fa fa-cog fa-spin\"  aria-hidden=\"true\" ></i></p>', '2023-04-15 12:50:38'),
(11, 'Mama Pride', 'Lady', 'beni@gmail.com', '12345678909', 'Sample receiver', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 0, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-15 13:02:13'),
(12, 'Young company', 'Lady', 'beni@gmail.com', '12345678909', 'Tk', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/drwhite_1.png', 0, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-15 13:06:42'),
(13, 'Young company', 'Lady', 'beni@gmail.com', '12345678909', 'Tk', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/drwhite_1.png', 1, 1, '<p style=\"padding: 5px; border-radius: 8px; text-align: center; color: white\" class=\"bg-success\">Delivered</p>', '2023-04-15 13:50:17'),
(14, 'Young company', 'Lady', 'beni@gmail.com', '12345678909', 'Tk', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/drwhite_1.png', 1, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-15 13:47:40'),
(15, 'Young company', 'Lady', 'beni@gmail.com', '12345678909', 'Tk', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/drwhite_1.png', 1, 1, '<p style=\"background: green; padding: 5px; border-radius: 8px; text-align: center; color: white\">Accepted</p>', '2023-04-15 13:47:17'),
(16, 'Mama Pride', 'Lady', 'beni@gmail.com', '12345678909', 'Any one', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/IMG_20211121_123745_0.jpg', 1, 0, '<p style=\"background: red; padding: 5px; border-radius: 8px; text-align: center; color: white\">Declined</p>', '2023-04-15 13:43:55'),
(17, 'Mama Pride', 'Lady', 'beni@gmail.com', '12345678909', 'Tk', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 0, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-16 10:48:51'),
(18, 'Mama Pride', 'Lady', 'beni@gmail.com', '12345678909', 'Tk', 'tk@gmail.com', '0385929948484', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 1, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-16 10:54:00'),
(19, 'Glorious Wakanda', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Joy', 'joy@gmail.com', '95235032', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 0, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-25 17:13:07'),
(20, 'Glorious Wakanda', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Joy', 'joy@gmail.com', '95235032', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 0, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-25 17:13:20'),
(21, 'Glorious Wakanda', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Joy', 'joy@gmail.com', '95235032', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 0, 0, '<p style=\"background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white\">Pending</p>', '2023-04-25 17:14:30'),
(22, 'Glorious Wakanda', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Joy', 'joy@gmail.com', '95235032', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 1, 0, '<p style=\"background: red; padding: 5px; border-radius: 8px; text-align: center; color: white\">Declined</p>', '2023-04-25 17:29:21'),
(23, 'Smart Smile', 'Mary Gentle', 'mary@gmail.com', '08032567532', 'Testing name', 'testing@gmail.com', '73289427141', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/drwhite_1.png', 1, 1, '<p class=\"bg-warning text-white\" style=\"padding: 5px; border-radius: 8px; text-align: center; color: white;\"><span class=\"text-white\">In Progress</span> <i class=\"fa fa-cog fa-spin text-white\"  aria-hidden=\"true\" ></i></p>', '2023-04-25 17:23:50'),
(24, 'Glorious Wakanda', 'okay', 'okay@gamil.com', '12345676789', 'Mary', 'mary@gmail.com', '3934284', 'Young Scientist', 'admin@gmail.com', '12345678901', '../images/favicon-nis.png', 1, 1, '<p style=\"background: green; padding: 5px; border-radius: 8px; text-align: center; color: white\">Accepted</p>', '2023-04-25 18:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `acct_num` varchar(50) NOT NULL,
  `card_holder` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `bank_name`, `acct_num`, `card_holder`, `amount`, `date_added`) VALUES
(1, 2, 'First bank', '4352564643', '', 'N 500', '2023-04-25 17:17:31'),
(2, 2, 'First bank', '4352564643', 'Young', 'N 1000', '2023-04-25 17:21:40'),
(3, 8, 'First bank', '4352564643', 'Young', 'N 1500', '2023-04-25 18:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(56) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `gift_card` text NOT NULL,
  `seen` int(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_type` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `phone_number`, `gift_card`, `seen`, `password`, `image`, `user_type`) VALUES
(1, 'Young Scientist', 'Admin', 'admin@gmail.com', '12345678901', '', 0, '$2y$10$iyBsqtZuuMktJrH/CdkspuOC/QC/WngYnXxIu/wBF76.dR/tmvnwq', '../images/FB_IMG_16594815455054147.jpg', 1),
(2, 'Mary Gentle', 'Mary', 'mary@gmail.com', '08032567532', 'Today is my birthday. all of you should gat out of the way', 1, '$2y$10$1uMAT7NYX.ofHrPj0VTa4.GpQiYS4ebYKHAklRazGhWcdcZefrbbq', '../images/WIN_20220904_16_16_16_Pro.jpg', 0),
(3, 'John Doe', 'John Doe', 'doe@gmail.com', '36543754765', 'Today is my birthday. all of you should gat out of the way', 0, '$2y$10$IroXuxRAnoq41hRqf40WIucHH92wUgZTyZWrHD3fJgn3U9a7k89d2', '../images/young.jpg', 0),
(4, 'Lady', 'Beni', 'beni@gmail.com', '12345678909', 'Today is my birthday. all of you should gat out of the way', 0, '$2y$10$cX5IOuNhSJlaeyEiGKUWYO8tIcRN0qiHdVrUETEC8elPvX./E.uFm', '../images/IMG_20220504_105849_6.jpg', 0),
(5, 'John Doe', 'doeSmith', 'doesmith@gamil.com', '12345678901', 'No gift card today', 0, '$2y$10$iI7a6Clsqi.oklZBhvEcKe0pkSSMZT0DxzqJMKls6bt89TInwJtG2', '../images/FB_IMG_16594815923216699.jpg', 0),
(6, 'final testing', 'Mr Final', 'final@gmail.com', '09876543212', 'No gift card today', 0, '$2y$10$53GmXi/ReIVe.1KMDAZ4M.yTdTw3XU5WhtsRYq7U.A6EYwYHED3ZG', '../images/FB_IMG_16594815455054147.jpg', 0),
(7, 'Purest Dove', 'gotten damn', 'damn@gamil.com', '12345678902', 'No gift card today', 0, '$2y$10$ZBF9RzSdaBKdibpkEj9Z9.VT9YQT3hjgDd4H1M3dXJD.GF5LDZXka', '../images/drwhite_1.png', 0),
(8, 'okay', 'sure then', 'okay@gamil.com', '12345676789', 'Today is my birthday. all of you should gat out of the way', 1, '$2y$10$z1OsDY.kn2LVSzUI2Vvf3ejZOjQ1Ty5xXdUigeUphB7e8YOh0ZdpO', '../images/FB_IMG_16594815455054147.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
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
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(56) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
