-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 01:27 PM
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
(360, 9, 4, 'hi', '2023-06-05 19:47:06'),
(361, 81761352, 4, 'jbjb', '2023-06-05 19:47:31'),
(362, 81761352, 9, 'gvgcv', '2023-06-05 19:47:39'),
(363, 81761352, 9, 'hi', '2023-06-05 19:55:58'),
(364, 81761352, 52820522, 'hi', '2023-06-05 19:58:00'),
(365, 81761352, 81761354, 'what are u doin', '2023-06-05 19:58:06'),
(366, 81761352, 81761354, 'nopie', '2023-06-05 20:00:04'),
(367, 81761352, 81761354, 'yoo', '2023-06-05 20:08:48'),
(368, 81761352, 81761354, 'hjh', '2023-06-05 20:23:21'),
(369, 81761352, 81761354, 'njnj', '2023-06-05 20:23:50'),
(370, 81761352, 81761354, 'bbhbh', '2023-06-05 20:23:52'),
(371, 81761352, 81761354, 'bghbh', '2023-06-05 20:23:53'),
(372, 81761352, 81761354, 'gvgvg', '2023-06-05 20:23:55'),
(373, 81761352, 81761354, 'bvhvh', '2023-06-05 20:23:56'),
(374, 81761352, 81761354, 'hvh', '2023-06-05 20:23:57'),
(375, 81761352, 81761354, 'bbhj', '2023-06-05 20:23:58'),
(376, 81761352, 81761354, 'hv', '2023-06-05 20:23:59'),
(377, 81761352, 81761354, '  bn', '2023-06-05 20:24:01'),
(378, 81761352, 81761354, 'b vh', '2023-06-05 20:24:05');

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
(4, 'justinn', '$2y$10$8AY0jIa031We0hBZ1zk10OYm5qs3t8zLICG2jaHIF07E3DDiogV5W', 'dsd@gmail.com', 'photo/asparagus-4681835__340.jpg'),
(9, 'drag', '$2y$10$AkSkXVmd5ltLEXLNhcF5I.AEuRMSXV.9pOeM5xTmTIHduIBkymINu', 'drag@gmail.com', 'photo/saSKEEQKE.jpeg'),
(4191, 'rohan', '$2y$10$219Z5Bo6FI2BSx/FlD4bt.PENN3qBCLVS1TYBre68XAaESVjdQNGa', 'rohal22@gmail.com', 'photo/artificial-intelligence-7342613__340.webp'),
(52820522, 'rygel', '$2y$10$2YyVRfNdm8HTWasabbtWA.FPoO2huU2T1dyTBAcN1qg5X3DUseJkm', 'rygetl@gmail.com', 'photo/girl-4663125__340.jpg'),
(81761352, 'john', '$2y$10$Ha2C/ssEPXRlVXplWYrkl.v4vykA1J./7cE6X3CvSVvUHxUhaviSq', 'john2432@gmail.com', 'photo/pexels-andrea-piacquadio-3778603.jpg'),
(81761353, 'cristi', '$2y$10$wRc0QqHfwUUz/e7022MJe.OxMk8v8lFBvyPbL1TLx3SLVSsMIl36a', 'cristii22@gmail.com', 'photo/pexels-andrea-piacquadio-943084.jpg'),
(81761354, 'roja', '$2y$10$Kgsr8CS/dON/ON9ZQLBy4.2nDK3PxHCG2yhxR9sjvDBI3ViPOQ28W', 'roja@gmail.com', 'photo/ai-generated-7751808__340.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81761355;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
