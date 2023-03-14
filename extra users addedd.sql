-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 08:10 AM
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
(5, 'justin', '$2y$10$stbDdlekd5quHTs4HDzEi.NF0gd2O.zBj71OlRXo/T5B0vRyd5K9W', 'justin@gmail.com', 'photo/avatar-3637561__340.webp'),
(28, 'mary', '$2y$10$qdMkxFfavXtjTD/6Dq1nSezwoA3o2KFPPUHDvo.DsYQlm/5VdlRX2', 'mary@gmail.com', 'photo/pexels-photo-3779770.jpeg'),
(4191, 'rohan', '$2y$10$219Z5Bo6FI2BSx/FlD4bt.PENN3qBCLVS1TYBre68XAaESVjdQNGa', 'rohal22@gmail.com', 'photo/artificial-intelligence-7342613__340.webp'),
(52820522, 'rygel', '$2y$10$2YyVRfNdm8HTWasabbtWA.FPoO2huU2T1dyTBAcN1qg5X3DUseJkm', 'rygetl@gmail.com', 'photo/girl-4663125__340.jpg'),
(81761352, 'john', '$2y$10$Ha2C/ssEPXRlVXplWYrkl.v4vykA1J./7cE6X3CvSVvUHxUhaviSq', 'john2432@gmail.com', 'photo/pexels-andrea-piacquadio-3778603.jpg'),
(81761353, 'cristi', '$2y$10$wRc0QqHfwUUz/e7022MJe.OxMk8v8lFBvyPbL1TLx3SLVSsMIl36a', 'cristii22@gmail.com', 'photo/pexels-andrea-piacquadio-943084.jpg'),
(81761354, 'roja', '$2y$10$Kgsr8CS/dON/ON9ZQLBy4.2nDK3PxHCG2yhxR9sjvDBI3ViPOQ28W', 'roja@gmail.com', 'photo/ai-generated-7751808__340.jpg'),
(81761355, 'brock', '$2y$10$lch1wBKo1/kVNQkt8tbF5OvIqedSEVneudYDkiix6rBvPguqvzBN.', 'brockyy@gmail.com', 'photo/pexels-bestbe-models-2080383.jpg'),
(81761356, 'cristina', '$2y$10$R/iJRBirsd53f78YzSJsue7JR/r.JLGMoJPrH0zbylPlHfxdZ7s.G', 'cristina@gmail.com', 'photo/pexels-photo-2726111.webp');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81761357;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
