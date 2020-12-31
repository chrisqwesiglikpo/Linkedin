-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 08:04 PM
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
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `category`) VALUES
(1, 'Accounting'),
(2, 'Airlines/Aviation'),
(3, 'Alternative Dispute Resolution'),
(4, 'Alternative Medicine'),
(5, 'Animation'),
(6, 'Apparel & Fashion'),
(7, 'Architecture & Planning'),
(8, 'Arts & Crafts'),
(9, 'Automotive'),
(10, 'Aviation & Aerospace'),
(11, 'Banking'),
(12, 'Biotechnology'),
(13, 'Broadcast Media'),
(14, 'Building Materials'),
(15, 'Business Supplies & Equipment'),
(16, 'Capital Markets'),
(17, 'Chemicals'),
(18, 'Civic & Social Organization'),
(19, 'Civil Engineering'),
(20, 'Commercial Real Estate'),
(21, 'Computer & Network Security'),
(22, 'Computer Games'),
(23, 'Computer Hardware'),
(24, 'Computer Networking'),
(25, 'Computer Software'),
(26, 'Construction'),
(27, 'Consumer Electronics'),
(28, 'Consumer Goods'),
(29, 'Consumer Services'),
(30, 'Cosmetics'),
(31, 'Dairy'),
(32, 'Defense & Space'),
(33, 'Design'),
(34, 'E-learning'),
(35, 'Education Management'),
(36, 'Electrical & Electronic Manufacturing'),
(37, 'Entertainment'),
(38, 'Environmental Services'),
(39, 'Events Services'),
(40, 'Executive Office'),
(41, 'Facilities Services'),
(42, 'Farming'),
(43, 'Financial Services'),
(44, 'Fine Art'),
(45, 'Fishery'),
(46, 'Food & Beverages'),
(47, 'Food Production'),
(48, 'Fundraising'),
(49, 'Furniture'),
(50, 'Gambling & Casinos'),
(51, 'Glass, Ceramics & Concrete'),
(52, 'Government Administration'),
(53, 'Government Relations'),
(54, 'Graphic Design'),
(55, 'Health, Wellness & Fitness'),
(56, 'Higher Education'),
(57, 'Hospital & Health Care'),
(58, 'Hospitality'),
(59, 'Human Resources'),
(60, 'Import & Export'),
(61, 'Individual & Family Services'),
(62, 'Industrial Automation'),
(63, 'Information Services'),
(64, 'Information Technology & Services'),
(65, 'Insurance'),
(66, 'International Affairs'),
(67, 'International Trade & Development'),
(68, 'Internet'),
(69, 'Investment Banking'),
(70, 'Investment Management'),
(71, 'Judiciary'),
(72, 'Law Enforcement'),
(73, 'Law Practice'),
(74, 'Legal Services'),
(75, 'Legislative Office'),
(76, 'Leisure, Travel & Tourism'),
(77, 'Libraries'),
(78, 'Logistics & Supply Chain'),
(79, 'Luxury Goods & Jewelry'),
(80, 'Machinery'),
(81, 'Management Consulting'),
(82, 'Maritime'),
(83, 'Market Research'),
(84, 'Marketing & Advertising'),
(85, 'Mechanical Or Industrial Engineering'),
(86, 'Media Production'),
(87, 'Medical Device'),
(88, 'Medical Practice'),
(89, 'Mental Health Care'),
(90, 'Military'),
(91, 'Mining & Metals'),
(92, 'Mobile Games'),
(93, 'Motion Pictures & Film'),
(94, 'Museums & Institutions'),
(95, 'Music'),
(96, 'Nanotechnology'),
(97, 'Newspapers'),
(98, 'Non-profit Organization Management'),
(99, 'Oil & Energy'),
(100, 'Online Media'),
(101, 'Outsourcing/Offshoring'),
(102, 'Package/Freight Delivery'),
(103, 'Packaging & Containers'),
(104, 'Paper & Forest Products'),
(105, 'Performing Arts'),
(106, 'Pharmaceuticals'),
(107, 'Philanthropy'),
(108, 'Photography'),
(109, 'Plastics'),
(110, 'Political Organization'),
(111, 'Primary/Secondary Education'),
(112, 'Printing'),
(113, 'Professional Training & Coaching'),
(114, 'Program Development'),
(115, 'Public Policy'),
(116, 'Public Relations & Communications'),
(117, 'Public Safety'),
(118, 'Publishing'),
(119, 'Railroad Manufacture'),
(120, 'Ranching'),
(121, 'Real Estate'),
(122, 'Recreational Facilities & Services'),
(123, 'Recreational Facilities & Services'),
(124, 'Religious Institutions'),
(125, 'Renewables & Environment'),
(126, 'Research'),
(127, 'Restaurants'),
(128, 'Retail'),
(129, 'Security & Investigations'),
(130, 'Semiconductors'),
(131, 'Shipbuilding'),
(132, 'Sporting Goods'),
(133, 'Sports'),
(134, 'Staffing & Recruiting'),
(135, 'Supermarkets'),
(136, 'Telecommunications'),
(137, 'Textiles'),
(138, 'Think Tanks'),
(139, 'Tobacco'),
(140, 'Translation & Localization'),
(141, 'Transportation/Trucking/Railroad'),
(142, 'Utilities'),
(143, 'Venture Capital & Private Equity'),
(144, 'Veterinary'),
(145, 'Warehousing'),
(146, 'Wholesale'),
(147, 'Wine & Spirits'),
(148, 'Wireless'),
(149, 'Writing & Editing');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `career_cat_id` int(11) NOT NULL,
  `currentCity` varchar(255) DEFAULT NULL,
  `shortBio` text DEFAULT NULL,
  `aboutYou` text DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `politicalViews` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `highSchool` text DEFAULT NULL,
  `college` text DEFAULT NULL,
  `university` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `websiteType` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phoneType` varchar(255) NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `workplace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `professional` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `otherPlace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `socialLink` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `relationship` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `quotes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `otherName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `lifeEvent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `userId`, `career_cat_id`, `currentCity`, `shortBio`, `aboutYou`, `birthday`, `politicalViews`, `religion`, `highSchool`, `college`, `university`, `country`, `website`, `websiteType`, `phone`, `phoneType`, `language`, `hometown`, `gender`, `workplace`, `professional`, `otherPlace`, `address`, `socialLink`, `relationship`, `quotes`, `otherName`, `lifeEvent`) VALUES
(3, 1, 12, NULL, 'Data Science', NULL, '17-9-2005', NULL, NULL, NULL, 'University of Canada', 'University of Canada', 'Germany', 'http://www.columbus.com', 'PERSONAL', '0242358811', 'HOME', NULL, NULL, NULL, '', '', '', 'Accra,Ghana', '', '', '', '', ''),
(4, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(5, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(6, 4, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(7, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(8, 7, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(9, 8, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '');

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
(5, 'c2c5764b824dceb293f1dc713f86f9501d4efba7', 5),
(6, '0641ff43a0e4dbbaab5e1e8a83bcb87072fa2525', 6),
(7, '8b5ef3c9985401ab7f4f07ed894fe52a95bf8f6c', 7),
(8, 'd7214abb94b9d87901ff4bd22ec6a10e9d3bef5e', 8);

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
(1, 'Columbus', 'Glikpo', 'chrisqwesi@gmail.com', '$2y$10$kQNuHJ8zdkAQc2q1lJsAgebdQP8EmuADiQANkZ0WT1wgkI0eyEZLu', 'frontend/assets/images/profileDefaultPic.svg', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'christopherglikpo', '2020-12-30'),
(2, 'Daniel', 'Laryea', 'daniellaryea@gmail.com', '$2y$10$5cAzaf/alad/FvdLJXE5jOiU64hSRz/2RUuXKmGRlo8kOPejuer2G', 'frontend/assets/images/defaultPic.png', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'daniellaryea', '2020-12-30'),
(3, 'Felix', 'Glikpo', 'felixglikpo@gmail.com', '$2y$10$g5d3mjRwQvkoFYk.9AT6MOIEGYFivfZfB1Ac.wFZqe9mrRpOeRxPi', 'frontend/assets/images/defaultPic.png', 0, 'frontend/assets/images/coverPic.svg', 0, 0, 'felixglikpo', '2020-12-30'),
(4, 'Abigail', 'Tetteh', 'abigail@gmail.com', '$2y$10$Zcn9nPSlmPSyGdIQ3jtDceag4nSd4ejjMuQWpnnDh2mo618JfkkfS', 'frontend/assets/images/defaultPic.png', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'abigailtetteh', '2020-12-30'),
(5, 'Belinda', 'Tetteh', 'belinda@gmail.com', '$2y$10$L1LPJ9G3zPCDiJkCrFuhV.3TBeP4Lx6Olrh8WtW1hMlYpLG3O9g8.', 'frontend/profileImage/5/f78ab98b909789bae8a54d6bf.png', 1, 'frontend/profileCover/5/c5ffaca1460bc5cab81cc6b6b.png', 0, 0, 'belindatetteh', '2020-12-30'),
(6, 'Cornelia', 'Glikpo', 'corneliaglikpo@gmail.com', '$2y$10$tqbUGjKrHgr.j7CVVAEPte9oFMEWnGeN35ewZyao8UEwoUksA.VWy', 'frontend/assets/images/profileDefaultPic.svg', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'corneliaglikpo', '2020-12-30'),
(7, 'Adams', 'Karaba', 'adams@gmail.com', '$2y$10$Fx.EVhjh5iMo4pEUPfEOlOsRZcQvdKXHIzmMtWnMd1iKHKMaWD1f2', 'frontend/assets/images/default.svg', 0, 'frontend/assets/images/backgroundImage.svg', 0, 0, 'adamskaraba', '2020-12-31'),
(8, 'Aizaz', 'Ibramhim', 'aizaz@gmail.com', '$2y$10$Ll.CXzrm4DP.vAoixsOMNenzZSdRLa4OcgFiiUP07tVGU84lxwI5C', 'frontend/assets/images/profileDefaultPic.svg', 0, 'frontend/assets/images/coverPic.svg', 0, 0, 'aizazibramhim', '2020-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profileForein` (`userId`);

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
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profileForein` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
