-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 01:19 PM
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
('51', 'user2', 'hsdhfsdkfj', '23-02-20 05:48pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `email`) VALUES
(24, 'user1', '$2y$10$1Z.Xza8nSrGH447pltPiDO2rtEWvCfeWGNJOCMHOraYdSCOkc/ViK', 'fuenix@gmail.com'),
(25, 'user2', '$2y$10$TJzKfxhab/Zo0SuEygyBOeQu0FHzbcnoXd9lLP2Uyt4e9KOtPxSGO', 'user2@gmail.com'),
(26, 'user3', '$2y$10$hLI4S0qKtKSdQPTducTamefoV6rw.u85/gAgpB9Ttec9pqcaqYj.K', 'user3@gmail.com'),
(27, 'user4', '$2y$10$uP0ABAR5x5qTsBDyu506PuaryoSKieZWpkLhnpwpA2o3RtmQC2Mb.', 'user4@gmail.com'),
(28, 'user5', '$2y$10$pV/iIRfaU0X5.RYyqxmiluAP.dIzsfEW7Z1zisNsB58gmNQ47gsfK', 'user5@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
