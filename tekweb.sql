-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 06:21 AM
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
-- Database: `tekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `user_id1`, `user_id2`) VALUES
(1, 1, 2),
(2, 2, 4),
(3, 2, 3),
(4, 2, 5),
(5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `msg`, `sender_id`, `chat_id`, `timestamp`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 4, 2, '2022-12-03 12:01:58'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 2, 2, '2022-12-03 12:01:58'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 5, 4, '2022-12-03 12:02:36'),
(4, 'hai', 2, 2, '2022-12-03 12:09:52'),
(5, 'haiii aku sdklfjasdf', 2, 2, '2022-12-03 12:27:55'),
(6, 'asdas', 2, 2, '2022-12-03 12:32:50'),
(7, 'louhhh', 2, 2, '2022-12-03 13:02:10'),
(8, 'haiiii', 2, 2, '2022-12-03 13:03:15'),
(9, 'hahahhaha', 2, 2, '2022-12-03 13:11:33'),
(10, 'leonnn', 2, 2, '2022-12-03 13:12:08'),
(11, 'nyahahhaa', 2, 2, '2022-12-03 13:12:46'),
(12, 'kurangg', 2, 2, '2022-12-03 13:13:12'),
(13, '2', 2, 2, '2022-12-03 13:14:58'),
(14, '3', 2, 2, '2022-12-03 13:16:02'),
(15, '34534', 2, 2, '2022-12-03 13:16:36'),
(16, 'sdf', 2, 2, '2022-12-03 13:16:42'),
(17, 'safd', 2, 2, '2022-12-03 13:17:00'),
(18, 'hahahha', 2, 2, '2022-12-03 13:19:00'),
(19, 'lallalaa', 2, 2, '2022-12-03 13:19:22'),
(20, 'yeyyeye', 2, 2, '2022-12-03 13:21:01'),
(21, 'lellee', 2, 2, '2022-12-03 13:21:06'),
(22, 'tesss', 2, 2, '2022-12-03 13:21:15'),
(23, 'apa sihh', 4, 2, '2022-12-03 13:22:35'),
(24, 'gak apa', 2, 2, '2022-12-03 13:23:54'),
(25, 'yaa terus ', 4, 2, '2022-12-03 13:24:05'),
(26, 'haii\n', 4, 2, '2022-12-03 13:27:24'),
(27, 'kenapaa', 2, 2, '2022-12-03 13:27:55'),
(28, 'gak apaa', 4, 2, '2022-12-03 13:28:35'),
(29, 'loohh ', 2, 2, '2022-12-03 13:28:45'),
(30, 'lahh', 4, 2, '2022-12-03 13:28:51'),
(31, 'he\n', 2, 2, '2022-12-03 15:44:51'),
(32, 'hai', 2, 2, '2022-12-03 15:54:24'),
(33, 'hahhaha', 2, 2, '2022-12-03 15:54:36'),
(34, 'nayyaya', 2, 2, '2022-12-03 15:54:54'),
(35, 'jkj', 2, 2, '2022-12-03 15:55:43'),
(36, 'hhhehehe', 2, 4, '2022-12-03 15:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `user_id`, `product_img`) VALUES
(1, 'baju tidur', 25000, 1, 'resource/img/product/pajamas.jpg'),
(2, 'topi', 20000, 1, 'resource/img/product/cap.jpg'),
(3, 'casing', 50000, 1, 'resource/img/product/shoes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `fullname` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `fullname`) VALUES
(1, 'jerteti', 'jeremy andrea'),
(2, 'floaudrina', 'floren audrina'),
(3, 'felithepooh', 'felina evangelica'),
(4, 'angel', 'jeanne angeline siemon'),
(5, 'ella', 'Ella Arminta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_fk_product` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `user_fk_product` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
