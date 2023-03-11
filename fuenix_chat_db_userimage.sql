-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 12:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuenix_chat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `sender_userid`, `reciever_userid`, `message`, `timestamp`) VALUES
(51, 24, 27, '', '2023-02-16 22:40:00'),
(51, 24, 27, 'dsd', '2023-02-16 22:41:00'),
(51, 24, 27, 'gii', '2023-02-16 22:54:00'),
(53, 26, 27, 'mope', '2023-02-16 22:55:00'),
(53, 26, 27, 'gi', '2023-02-16 23:45:00'),
(24, 24, 0, 'hi', '2023-02-16 23:54:00'),
(24, 24, 0, 'fdfa', '2023-02-16 23:56:00'),
(24, 24, 0, 'hey', '2023-02-17 00:07:00'),
(24, 24, 0, 'hjvhjdva', '2023-02-17 00:08:00'),
(49, 24, 25, 'hii', '2023-02-17 00:10:00'),
(24, 24, 0, 'gcgh', '2023-02-18 03:25:00'),
(24, 24, 0, 'hi', '2023-02-20 07:15:00'),
(24, 24, 0, 'hi', '2023-02-19 19:41:00'),
(24, 24, 0, 'xzd', '2023-02-19 19:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gp_chat_db`
--

CREATE TABLE `gp_chat_db` (
  `chatroom` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `msg` varchar(5000) NOT NULL,
  `dt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gp_chat_db`
--

INSERT INTO `gp_chat_db` (`chatroom`, `uname`, `msg`, `dt`) VALUES
('48', 'user1', 'far', '23-02-20 04:10pm'),
('49', 'user2', 'hi', '23-02-20 05:08pm'),
('48', 'user1', 'hey', '23-02-20 05:14pm'),
('52', 'user5', 'hi', '23-02-20 05:29pm'),
('49', 'user2', 'fafdf', '23-02-20 05:42pm'),
('49', 'user2', 'hi', '23-02-20 05:43pm'),
('49', 'user1', 'hi', '23-02-20 05:45pm'),
('49', 'user1', 'how are you ?', '23-02-20 05:46pm'),
('51', 'user2', 'hsdhfsdkfj', '23-02-20 05:48pm'),
('52', 'user1', 'hi', '23-02-20 07:43pm'),
('52', 'user1', 'hi', '23-02-20 07:44pm'),
('52', 'user1', 'hi', '23-02-20 07:45pm'),
('51', 'user1', 'nope', '23-02-20 07:46pm'),
('49', 'user1', 'jjjj', '23-02-21 10:36am'),
('51', 'user1', 'nope', '23-02-21 10:56am'),
('49', 'user1', 'you bro', '23-02-21 11:35am'),
('49', 'user1', 'you bro', '23-02-21 11:35am'),
('49', 'user1', 'you bro', '23-02-21 11:35am'),
('49', 'user1', 'you bro', '23-02-21 11:35am'),
('49', 'user1', 'what you are doing', '23-02-21 11:36am'),
('49', 'user1', 'what you are doing', '23-02-21 11:36am'),
('49', 'user1', 'what you are doing', '23-02-21 11:36am'),
('49', 'user1', 'nothing', '23-02-21 11:36am'),
('49', 'user1', 'ok', '23-02-21 12:08pm'),
('49', 'user1', 'nope', '23-02-21 12:08pm'),
('52', 'user1', 'HI', '23-02-21 04:02pm'),
('51', 'user1', 'YO', '23-02-21 04:03pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `img_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `email`, `img_path`) VALUES
(8708, 'user1eweqq', '$2y$10$IFB4K5d.GXHvYoGV21Kd9uazB97LL8wz4MLs4qM8C8hDV6XMZnVg2', 'sat@gmail.com', 'photo/Screenshot (24).png'),
(163473, 'user1eeee', '$2y$10$ps4Ryn8ADoD8YYCM3lLoleP5uNBwTW//UqiDz6FIfBhshyyZY3hSy', 'sat@gmail.com', 'photo/Screenshot (26).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163474;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
