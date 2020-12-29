-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 07:48 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
(4, '4acb36601304880626eaaae9bee34f6e260109da', 1),
(5, '1c33dbc00dce2a10662c4a94b045d66c3b9efec9', 4),
(6, 'e288375fe4175d8f259f255d5b631de8d9e35d0f', 5);

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
  `profileCover` varchar(250) NOT NULL,
  `following` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `signUpDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `password`, `profilePic`, `profileCover`, `following`, `followers`, `username`, `signUpDate`) VALUES
(1, 'Christopher', 'Glikpo', 'chrisqwesi@gmail.com', '$2y$10$Qnr5fpcL02DRVRXDcUfjk.kG89r57L0iqVtQa/xERIhIlLmil/KVy', 'frontend/assets/images/defaultPic.png', '', 0, 0, 'christopherglikpo', '2020-12-27'),
(4, 'Felix', 'Glikpo', 'felixglikpo@gmail.com', '$2y$10$LlIXIEo3kFJ3bCYsx4jRh.ZvANDx/vlDdqZNfiO.poFulF7UF8rR.', 'frontend/assets/images/defaultPic.png', '', 0, 0, 'felixglikpo', '2020-12-28'),
(5, 'Cornelia', 'Glikpo', 'corneliaglikpo@gmail.com', '$2y$10$iJAnJ/0JH6cb10n9y74Qu.crnf8kCpkfc7eks2AX4dw4yaehTWIYi', 'frontend/assets/images/defaultPic.png', '', 0, 0, 'corneliaglikpo', '2020-12-28');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
