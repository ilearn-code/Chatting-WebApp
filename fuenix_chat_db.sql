-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 08:09 AM
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
-- Table structure for table `gp_chat_db`
--

CREATE TABLE `gp_chat_db` (
  `uname` varchar(100) NOT NULL,
  `msg` varchar(5000) NOT NULL,
  `dt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gp_chat_db`
--

INSERT INTO `gp_chat_db` (`uname`, `msg`, `dt`) VALUES
('user1', 'hi', '23-02-10 11:28am'),
('user2', 'hi', '23-02-10 11:28am'),
('user2', 'no', '23-02-10 11:30am'),
('user1', 'what', '23-02-10 11:30am'),
('user1', 'hi', '23-02-10 11:33am');

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
(27, 'user4', '$2y$10$uP0ABAR5x5qTsBDyu506PuaryoSKieZWpkLhnpwpA2o3RtmQC2Mb.', 'user4@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
