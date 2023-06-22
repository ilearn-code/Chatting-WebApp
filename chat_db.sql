-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 08:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_db`
--

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
(1, 'ophia', '$2y$10$KVXnq/yCxOYOmvqnYbI0UeUsg0ZeLaH7e5nxx8Z0Rr7EBvL83SIYG', 'ophia@gmail.com', 'photo/11.jpg'),
(9, 'Jacob', '$2y$10$avEl.bHL/2vNnIWbgkovuuIYUNBzYADFTxpXPXUf.gViP6Ni65xL2', 'Jacob@gmail.com', 'photo/15.jpg'),
(20, 'liam', '$2y$10$WkNJS4qYCHiUbXNqRoB4W.8YXpHl3hQ84A8fDfdtEkHMbF5e41qkq', 'laim@gmail.com', 'photo/19.jpg'),
(63, 'James', '$2y$10$H7Lx2ahI816TS444xIr3v.Pu56HRMPSM66pNk05z0Rte7Ydnx5s0i', 'James@gmail.com', 'photo/2.jpg'),
(85, 'William', '$2y$10$0Q4RFqO2DpVg36rjrIxVH.R3Jbl7aTH5tO/K/U5nokY6IMpx.GDOu', 'William@gmail.com', 'photo/5.jpg'),
(838, 'Lucas', '$2y$10$bMBRxYM66TiR2xq2iECobOu5KpAvn.VNIctlK9j1OYmNRAaVvThEm', 'Lucas@gmail.com', 'photo/8.jpg'),
(5194, 'Ava', '$2y$10$R5w97mOcd/400HzVHd5NteLuNpW4dUlubU/rEc2/qmoCGfLRFotxS', 'ava@gmail.com', 'photo/10.jpg'),
(71000, 'Sophia', '$2y$10$hFAMNRE9mvBunsBrEHoJtOw6s874fTeFly1bgYXzf2FdRFpgZVH7q', 'Sophia@gmail.com', 'photo/4.jpg'),
(76994, 'Michael', '$2y$10$2RmRbzQBsFuMqU0C0/qq.uuctnI.o9NCrstqQSJKC3Cx1Vn2FBm9u', 'Michael@gmail.com', 'photo/3..jpg'),
(178323, 'Loc', '$2y$10$Q/waqe5yLwreh/JJHPgrvuLXQ1UpYSoPsRnN0RT5JSuzLFrTmWB9G', 'Loc@gmail.com', 'photo/9.jpg'),
(947519, 'David', '$2y$10$U0d.rzDVwxGA9VSMQ83yZ.n2UaB/niEUl51I4eFd3o5NMIXe/cE3.', 'David@gmail.com', 'photo/7.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
