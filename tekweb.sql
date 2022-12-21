-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 05:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
(5, 2, 0),
(6, 5, 1),
(7, 5, 12),
(8, 0, 1),
(9, 14, 12),
(10, 14, 1),
(11, 5, 5),
(12, 17, 17),
(13, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id_fav` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `golike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id_fav`, `user_id`, `product_id`, `golike`) VALUES
(1, 5, 3, 0),
(2, 5, 1, 0),
(4, 5, 4, 1),
(6, 5, 8, 1),
(7, 5, 13, 1),
(9, 5, 2, 1),
(10, 5, 9, 1);

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
(36, 'hhhehehe', 2, 4, '2022-12-03 15:55:56'),
(37, 'haii jerrr', 5, 6, '2022-12-21 13:06:57'),
(38, 'hai jer\n', 14, 10, '2022-12-21 15:50:54'),
(39, 'beli bJU TIDUR', 5, 6, '2022-12-21 16:07:04'),
(40, 'jsadhf', 5, 4, '2022-12-21 16:13:43'),
(41, 'asdf', 17, 12, '2022-12-21 16:36:17'),
(42, 'haii', 5, 4, '2022-12-21 16:39:54'),
(43, 'te', 5, 4, '2022-12-21 16:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_weight` int(100) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_weight`, `product_size`, `product_desc`, `product_category`, `user_id`, `product_img`) VALUES
(1, 'baju tidur', 25000, 300, 'M', 'baju baru belum pernah dipakai', 'pakaian', 1, 'resource/img/product/pajamas.jpg'),
(2, 'topi', 20000, 100, 'all size', 'topi pernah dipakai', 'topi', 1, 'resource/img/product/cap.jpg'),
(3, 'sepatu', 50000, 1000, '37', 'sepatu cuma pernah dicoba, belum pernah pakai', 'sepatu', 1, 'resource/img/product/shoes.jpg'),
(4, 'tas', 40000, 1200, 'medium', 'pamakaian 1 bulan', 'tas', 1, 'resource/img/product/shoes.jpg'),
(5, 'aefhse', 1011, 1, 'M', 'enak', 'baju', 9, 'resource/img/product/cap.jpg'),
(6, 'Nasi Goreng', 11111, 1, '10meter', 'sdwdwdwd', 'kantor', 9, 'resource/img/product/cap.jpg'),
(7, 'Nasi Goreng', 23320, 1000, '10meter', 'dnadnaldnaf', 'kantor', 12, 'resource/img/product/shoes.jpg'),
(8, 'nasa', 12, 2, 'm', 'nasa', 'sekolah', 5, 'resource/img/product/cap.jpg'),
(9, 'hp', 10000, 1, 'All size', 'samsung', 'sekolah', 5, 'resource/img/product/cap.jpg'),
(13, 'baju', 12, 2, 'sadf', 'sdf', 'tas', 5, 'resource/img/product/1671640013-emosi.jpg'),
(14, 'masker', 1100, 2, 'kecil', 'masker baru', 'topi', 5, 'resource/img/product/1671640221-mask.jpeg'),
(15, 'hai', 10000, 1, 'm', 'hai', 'topi', 17, 'resource/img/product/1671640551-samsung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `password` text NOT NULL,
  `profilepic` text DEFAULT 'resource/img/user/blank.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `fullname`, `password`, `profilepic`) VALUES
(1, 'jerteti', 'jeremy andrea', 'jerz', 'resource/img/user/jerteti.jpg'),
(2, 'floaudrina', 'floren audrina', 'flow', 'resource/img/user/wednesday.jpg'),
(3, 'felithepooh', 'felina evangelica', 'feli', 'resource/img/user/pooh.jpg'),
(4, 'angel', 'jeanne angeline siemon', 'angels', 'resource/img/user/blank.jpg'),
(5, 'ella', 'Ella Arminta', 'lala', 'resource/img/user/moneyheist.jpg'),
(6, 'admin1a', '', 'ajfejdalfa', 'IMG_1539.jpg'),
(7, 'sdsds', '', 'sdsdsdsds', 'PRICE-LIST-LASERCUTTING-ACRILIC-2017.jpg'),
(8, 'suci ganteng', 'michael suci', 'gantengg', 'S__21643272.jpg'),
(9, 'winner', 'michael sucis', 'winner', ''),
(10, 'ivana', 'micheele iv', 'ivana1', ''),
(11, 'ivana1', 'micheele ivww', 'ivana', ''),
(12, 'noshiko', 'nasiii', 'yesyes', ''),
(13, 'jere1', 'jere', '', ''),
(14, 'jere1', 'jere', 'jere1', 'sekretCP.png'),
(15, 'jere2', 'jere2', '12345678', 'gempa.jpeg'),
(16, 'JER54', 'JER54', '123', 'lilyn.jpg'),
(17, 'hai', 'hai', 'hai123', ''),
(18, 'admin123', 'admin', 'admin123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id_fav`);

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
