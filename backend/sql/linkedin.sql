-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 11:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkedin`
--

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`, `user_id`) VALUES
(1, 'abb727e32f41d48387e78b31e3a3c1dd9032cefe', 1),
(2, '33df8320189964142eabecec4604b16d5a0eb2d6', 2),
(3, '66f2a1cf779f7851a585cb5189185c41ed68c707', 3),
(4, 'ec441636c18bcfb537dc06801aceedbae212d88c', 4),
(5, 'c2c5764b824dceb293f1dc713f86f9501d4efba7', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(140) NOT NULL,
  `lastName` varchar(140) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profilePic` varchar(250) NOT NULL,
  `profileEdited` tinyint(4) NOT NULL,
  `profileCover` varchar(250) NOT NULL,
  `following` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `signUpDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `password`, `profilePic`, `profileEdited`, `profileCover`, `following`, `followers`, `username`, `signUpDate`) VALUES
(1, 'Christopher', 'Glikpo', 'chrisqwesi@gmail.com', '$2y$10$kQNuHJ8zdkAQc2q1lJsAgebdQP8EmuADiQANkZ0WT1wgkI0eyEZLu', 'frontend/assets/images/default.svg', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'christopherglikpo', '2020-12-30'),
(2, 'Daniel', 'Laryea', 'daniellaryea@gmail.com', '$2y$10$5cAzaf/alad/FvdLJXE5jOiU64hSRz/2RUuXKmGRlo8kOPejuer2G', 'frontend/assets/images/default.jpg', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'daniellaryea', '2020-12-30'),
(3, 'Felix', 'Glikpo', 'felixglikpo@gmail.com', '$2y$10$g5d3mjRwQvkoFYk.9AT6MOIEGYFivfZfB1Ac.wFZqe9mrRpOeRxPi', 'frontend/assets/images/default.jpg', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'felixglikpo', '2020-12-30'),
(4, 'Abigail', 'Tetteh', 'abigail@gmail.com', '$2y$10$Zcn9nPSlmPSyGdIQ3jtDceag4nSd4ejjMuQWpnnDh2mo618JfkkfS', 'frontend/assets/images/defaultPic.png', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'abigailtetteh', '2020-12-30'),
(5, 'Belinda', 'Tetteh', 'belinda@gmail.com', '$2y$10$L1LPJ9G3zPCDiJkCrFuhV.3TBeP4Lx6Olrh8WtW1hMlYpLG3O9g8.', 'frontend/assets/images/default.jpg', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'belindatetteh', '2020-12-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
