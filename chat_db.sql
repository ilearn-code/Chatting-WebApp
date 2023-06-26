-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 06:59 PM
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

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(383, 20, 5194, 'hi', '2023-06-22 20:49:07'),
(384, 20, 947519, 'hi', '2023-06-22 20:50:09'),
(385, 20, 947519, 'how are u', '2023-06-22 20:50:23'),
(386, 947519, 20, 'what are u doing', '2023-06-22 20:50:29'),
(387, 20, 947519, 'nothig', '2023-06-22 20:50:36'),
(388, 947519, 20, 'yeally!', '2023-06-22 20:50:44'),
(389, 20, 947519, 'yea', '2023-06-22 20:50:57'),
(390, 20, 947519, 'ok', '2023-06-22 20:51:01'),
(391, 1, 20, 'hi', '2023-06-22 21:06:28'),
(392, 1714, 947519, 'yo', '2023-06-23 04:05:38'),
(393, 2368, 4, 'hi', '2023-06-23 10:17:21'),
(394, 3906, 2368, 'hi', '2023-06-23 10:18:07'),
(395, 3906, 2368, 'hvhhv', '2023-06-23 10:18:20'),
(396, 2368, 3906, 'bro', '2023-06-23 10:19:05'),
(397, 3906, 86, 'hii', '2023-06-23 10:21:32'),
(398, 1714, 9, 'hi', '2023-06-24 08:41:30'),
(399, 1714, 247, 'what are u doingh', '2023-06-24 08:41:42'),
(400, 1714, 20, 'nothing bro', '2023-06-24 08:41:52'),
(401, 1714, 178323, 'hi ', '2023-06-24 08:43:40'),
(402, 1714, 178323, 'how are you', '2023-06-24 08:43:47'),
(403, 2368, 178323, 'hi', '2023-06-24 12:33:39'),
(404, 2368, 178323, 'how are u', '2023-06-24 12:33:43'),
(405, 2368, 178323, 'good', '2023-06-24 12:33:45'),
(406, 2368, 3, 'hi', '2023-06-24 13:13:25'),
(408, 731, 72, 'heelo', '2023-06-24 14:00:26'),
(409, 2368, 1, 'hi', '2023-06-24 14:26:43'),
(410, 2368, 3, 'hi', '2023-06-24 14:26:46'),
(411, 2368, 4, 'hi', '2023-06-24 14:26:51'),
(412, 2368, 63, 'hi', '2023-06-24 14:26:55'),
(413, 2368, 85, 'hi', '2023-06-24 14:26:58'),
(414, 2368, 86, ' hi', '2023-06-24 14:27:02'),
(415, 2368, 20, 'hi', '2023-06-24 14:47:50'),
(416, 2368, 72, 'how are u', '2023-06-24 14:47:56'),
(417, 2368, 85, 'im good ', '2023-06-24 14:48:02'),
(418, 2368, 947519, 'hi', '2023-06-24 18:52:39'),
(419, 2368, 947519, 'how are u', '2023-06-24 18:52:43'),
(420, 247, 1, 'hi', '2023-06-24 19:41:17'),
(421, 1714, 72, 'hi', '2023-06-26 05:51:05'),
(422, 1714, 85, 'hi', '2023-06-26 05:52:07'),
(423, 1714, 85, 'howare u ', '2023-06-26 05:52:11'),
(424, 1714, 85, 'im good u', '2023-06-26 05:52:19'),
(425, 1714, 5194, 'hi', '2023-06-26 18:45:48'),
(426, 1714, 3000000, 'what are u doing', '2023-06-26 18:45:58'),
(427, 731, 1, 'hi', '2023-06-26 18:53:55'),
(428, 731, 3, 'hi', '2023-06-26 18:54:00'),
(429, 731, 9, 'hi', '2023-06-26 18:54:04'),
(430, 731, 63, 'hi', '2023-06-26 18:54:08'),
(431, 731, 86, 'hi', '2023-06-26 18:54:11'),
(432, 731, 86, 'hi', '2023-06-26 18:54:15'),
(433, 731, 838, 'hi', '2023-06-26 18:54:18'),
(434, 731, 6138, 'hi', '2023-06-26 18:54:22'),
(435, 731, 76994, 'hi', '2023-06-26 18:54:27'),
(436, 731, 178323, 'hoi', '2023-06-26 18:54:31'),
(437, 731, 71000, 'hi', '2023-06-26 18:54:35'),
(438, 731, 947519, ' hi', '2023-06-26 18:54:40'),
(439, 1, 9, 'hi', '2023-06-26 18:55:38'),
(440, 1, 3, 'hi', '2023-06-26 18:55:45'),
(441, 1, 85, 'hi', '2023-06-26 18:55:48'),
(442, 1, 86, 'hi', '2023-06-26 18:55:52'),
(443, 1, 731, 'hi', '2023-06-26 18:55:56'),
(444, 1, 838, 'hi', '2023-06-26 18:55:59'),
(445, 1, 5194, 'hi', '2023-06-26 18:56:04'),
(446, 1, 6138, 'hi', '2023-06-26 18:56:07'),
(447, 1, 178323, 'hi', '2023-06-26 18:56:13'),
(448, 1, 947519, 'hi', '2023-06-26 18:56:18'),
(449, 1, 63, 'hi', '2023-06-26 18:56:40'),
(450, 1, 76994, 'hi', '2023-06-26 18:56:53'),
(451, 9, 0, 'hi', '2023-06-26 18:57:16'),
(452, 9, 20, 'hi', '2023-06-26 18:57:21'),
(453, 9, 838, 'hi', '2023-06-26 18:57:57'),
(454, 9, 5194, 'hi', '2023-06-26 18:58:01'),
(455, 9, 6138, 'hi', '2023-06-26 18:58:05'),
(456, 9, 76994, 'hi', '2023-06-26 18:58:09'),
(457, 9, 178323, 'hi', '2023-06-26 18:58:13'),
(458, 9, 178323, 'hi', '2023-06-26 18:58:17'),
(459, 9, 947519, 'hi', '2023-06-26 18:58:20');

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
(3, 'nn', '$2y$10$sH4hHn.sYtIFObPR/XJ44eoXhWgpaTA9Ked1.vwSnt/ybjUYHiDZi', 'nn@gmail.com', 'photo/64949c46342c6.jpg'),
(9, 'Jacob', '$2y$10$avEl.bHL/2vNnIWbgkovuuIYUNBzYADFTxpXPXUf.gViP6Ni65xL2', 'Jacob@gmail.com', 'photo/15.jpg'),
(20, 'liam', '$2y$10$WkNJS4qYCHiUbXNqRoB4W.8YXpHl3hQ84A8fDfdtEkHMbF5e41qkq', 'laim@gmail.com', 'photo/19.jpg'),
(63, 'James', '$2y$10$H7Lx2ahI816TS444xIr3v.Pu56HRMPSM66pNk05z0Rte7Ydnx5s0i', 'James@gmail.com', 'photo/2.jpg'),
(72, 'aman', '$2y$10$PXV8wiDe8fP7w1zhHLILPeMk.BFgpMxNHd30qm7MPh0Y8Tq9.NlSu', 'aman@gmail.com', 'photo/6496da6b6c962.jpg'),
(85, 'William', '$2y$10$0Q4RFqO2DpVg36rjrIxVH.R3Jbl7aTH5tO/K/U5nokY6IMpx.GDOu', 'William@gmail.com', 'photo/5.jpg'),
(86, 'qqq', '$2y$10$BxzmAHrrrNyn12OFsho05eUQEUD72Z2g7lmO426zzykB4TGwqcEFu', 'qq@gmail.com', 'photo/6494f5b06c866.jpg'),
(731, 'bbbsss', '$2y$10$avZknvPK4qmwy1OFELGf4eYKu.oAx2Ws4QVJ5eBfBUEZZoa4lzU.q', 'bbbsss@gmail.com', 'photo/6496d6509277f.jpg'),
(838, 'Lucas', '$2y$10$bMBRxYM66TiR2xq2iECobOu5KpAvn.VNIctlK9j1OYmNRAaVvThEm', 'Lucas@gmail.com', 'photo/8.jpg'),
(2368, 'bbb', '$2y$10$NGLcyv7Ol983iwU/GWp8MOfbtjWBTqxzWlgLEefqS471yvzfqLrGm', 'bbb@gmail.com', 'photo/6494f509c16a0.jpg'),
(5194, 'Ava', '$2y$10$R5w97mOcd/400HzVHd5NteLuNpW4dUlubU/rEc2/qmoCGfLRFotxS', 'ava@gmail.com', 'photo/10.jpg'),
(6138, 'aa', '$2y$10$u4C0I.8vK7pzi0/jI06Q3eMa/4CytRivcfpImWGZJdszr37B3yUva', 'aa@gmail.com', 'photo/pexels-carol-wd-3454298.jpg'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
