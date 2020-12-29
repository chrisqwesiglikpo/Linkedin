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
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `isGroupChat` tinyint(1) NOT NULL,
  `chatFrom` int(11) NOT NULL,
  `chatTo` varchar(255) NOT NULL,
  `chatTitle` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `isGroupChat`, `chatFrom`, `chatTo`, `chatTitle`, `createdAt`) VALUES
(14, 1, 3, '[\"2\"]', 'Love Message', '2020-12-22 11:43:48'),
(15, 1, 3, '[\"15\",\"16\"]', 'Secret Message', '2020-12-22 11:49:34'),
(16, 1, 3, '[\"17\",\"13\",\"6\"]', 'Private Message', '2020-12-22 11:51:19'),
(17, 1, 3, '[\"18\"]', 'Personal Message', '2020-12-22 12:04:06'),
(18, 1, 4, '[\"3\"]', 'Business Message', '2020-12-22 23:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `commentBy` int(11) NOT NULL,
  `commentOn` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commentAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `followID` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `followStatus` int(11) NOT NULL,
  `followOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `likeBy` int(11) NOT NULL,
  `likeOn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 NOT NULL,
  `chatID` int(11) NOT NULL,
  `messageTo` int(11) NOT NULL,
  `messageFrom` int(11) NOT NULL,
  `messageOn` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `message`, `chatID`, `messageTo`, `messageFrom`, `messageOn`, `status`) VALUES
(39, '<img alt=\"ðŸ˜\" class=\"emojioneemoji\" src=\"https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f60d.png\"><img alt=\"ðŸ˜\" class=\"emojioneemoji\" src=\"https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f60d.png\"><img alt=\"ðŸ˜\" class=\"emojioneemoji\" src=\"https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f60d.png\">', 14, 2, 3, '2020-12-25 06:11:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `ID` int(11) NOT NULL,
  `notificationFor` int(11) NOT NULL,
  `notificationFrom` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `type` enum('like','comment','retweet','follow','message') NOT NULL,
  `notificationOn` datetime NOT NULL DEFAULT current_timestamp(),
  `notificationCount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `notificationFor`, `notificationFrom`, `postId`, `type`, `notificationOn`, `notificationCount`, `status`) VALUES
(50, 3, 3, 203, 'like', '2020-12-24 11:16:40', 1, 0),
(51, 3, 3, 203, 'like', '2020-12-24 11:16:42', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `post` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `postBy` int(11) DEFAULT NULL,
  `postImage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `imageId` text DEFAULT NULL,
  `likesCount` int(11) NOT NULL,
  `shareCount` int(11) DEFAULT NULL,
  `postedOn` datetime DEFAULT NULL,
  `shareText` text DEFAULT NULL,
  `profilePhoto` text DEFAULT NULL,
  `coverPhoto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `userId`, `post`, `postBy`, `postImage`, `imageId`, `likesCount`, `shareCount`, `postedOn`, `shareText`, `profilePhoto`, `coverPhoto`) VALUES
(198, 3, '#php is very great', 3, NULL, NULL, 0, NULL, '2020-12-21 16:02:38', NULL, NULL, NULL),
(199, 3, '#mysql is very amazing', 3, NULL, NULL, 0, NULL, '2020-12-21 16:31:26', NULL, NULL, NULL),
(200, 3, 'I am learning #php with #javascript', 3, NULL, NULL, 0, NULL, '2020-12-21 17:02:27', NULL, NULL, NULL),
(201, 3, '#jquery is awesome', 3, NULL, NULL, 0, NULL, '2020-12-21 17:12:01', NULL, NULL, NULL),
(202, 3, 'Hi', 3, NULL, NULL, 0, NULL, '2020-12-21 17:19:11', NULL, NULL, NULL),
(203, 3, 'Hello are you doing?', 3, NULL, NULL, 0, NULL, '2020-12-21 17:20:39', NULL, NULL, NULL),
(204, 18, 'I really love you.#love at first sight', 18, NULL, NULL, 0, NULL, '2020-12-21 19:58:56', NULL, NULL, NULL),
(205, 18, 'How do you tell somebody that you #love her.', 18, NULL, NULL, 0, NULL, '2020-12-21 19:59:59', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retweet`
--

CREATE TABLE `retweet` (
  `retweetId` int(11) NOT NULL,
  `retweetBy` int(11) NOT NULL,
  `retweetFrom` int(11) NOT NULL,
  `status` text NOT NULL,
  `tweetedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `token_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`token_id`, `token`, `user_id`) VALUES
(10, 'eca86af4cceae346ca4148b6d95d6a51aca3e630', 10),
(11, 'e250111c4dcfbb601821bf22163f5909b0b5218d', 10),
(17, '2d84c4718de51b33252052d0b095b06b826371aa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `trends`
--

CREATE TABLE `trends` (
  `trendID` int(11) NOT NULL,
  `hashtag` varchar(140) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trends`
--

INSERT INTO `trends` (`trendID`, `hashtag`, `postId`, `userId`, `createdOn`) VALUES
(57, 'php', 198, 3, '2020-12-21 11:02:38'),
(58, 'mysql', 199, 3, '2020-12-21 11:31:26'),
(59, 'php', 200, 3, '2020-12-21 12:02:27'),
(60, 'javascript', 200, 3, '2020-12-21 12:02:27'),
(61, 'jquery', 201, 3, '2020-12-21 12:12:01'),
(62, 'love', 204, 18, '2020-12-21 14:58:56'),
(63, 'love', 205, 18, '2020-12-21 14:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `profileCover` varchar(255) NOT NULL,
  `following` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `screenName` varchar(40) NOT NULL,
  `signUpDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `password`, `profilePic`, `profileCover`, `following`, `followers`, `username`, `screenName`, `signUpDate`) VALUES
(1, 'Michael', 'Otu', 'michaelotu@gmail.com', '$2y$10$UtPDKB1UYn7rEe1jyTG6TugY7s6IeMjlGbE03cTXd63kd.Oz3iR8m', 'frontend/assets/images/profilePic.jpeg', '', 0, 0, 'michaelotu', 'michaelotu', '2020-11-29 04:07:48'),
(2, 'Christiana', 'Larbi', 'christiana@gmail.com', '$2y$10$MTedXZdOE65vxAzq1y8kQe5wrimCTSLH94dDUTDKErWTkYpdFLD0e', 'frontend/assets/images/defaultProfilePic.png', '', 0, 0, 'christianalarbi', 'christianalarbi', '2020-11-29 04:08:37'),
(3, 'Christopher', 'Glikpo', 'chrisqwesi@gmail.com', '$2y$10$5g8Y8aJYccdUP4d/rs74K.w90QI8aUOjmuQcKnncvVh8JZhB77/BS', 'frontend/profileImage/3/590548b34bef0abe4d7e3904b.png', 'frontend/profileCover/3/bf756b4fecea13d253b78f18b.png', 0, 0, 'christopherglikpo', 'christopherglikpo', '2020-11-29 04:12:17'),
(4, 'Cornelia', 'Glikpo', 'cornelia@gmail.com', '$2y$10$YwN9Ky0t6Tk.j9liYVlBae69iebR2prwF1qZ8wVRYBw4yd07FX.oe', 'frontend/assets/images/defaultProfilePic.png', '', 0, 0, 'corneliaglikpo', 'corneliaglikpo', '2020-11-29 04:15:03'),
(5, 'Rebecca', 'Darko', 'chrisbecky@gmail.com', '$2y$10$MyD0e.ebz5MobfafoRXSS.i3VaIWiKig02mTPUzdcIh4FeMDZ9JCq', 'frontend/assets/images/profilePic.jpeg', '', 0, 0, 'rebeccadarko', 'rebeccadarko', '2020-11-29 04:22:23'),
(6, 'Felix', 'Tetteh', 'felixtetteh@gmail.com', '$2y$10$rZMotDKDFMYlxhEDO/oB9.0zkZuFbtkHYqp6PnJUKKLp1R6DcOL3K', 'frontend/assets/images/defaultProfilePic.png', '', 0, 0, 'felixtetteh', 'felixtetteh', '2020-11-29 12:03:46'),
(10, 'Matthew', 'Saavedra', 'ts4pznuzzw@temporary-mail.net', '$2y$10$yJpnwzHnMjp9YNe3LwIkNucWIwFXHuYNcxPnvvOWge7dJnQ8a1Lv2', 'frontend/assets/images/defaultProfilePic.png', '', 0, 0, 'matthewsaavedra', 'matthewsaavedra', '2020-12-07 07:51:26'),
(11, 'Michael', 'Otu', 'michael@gmail.com', '$2y$10$BZUIWplkFDnICbHueKSVwui.P1Lh984hr0PRZZDwp8V1f3a/UxOsi', 'frontend/assets/images/profilePic.jpeg', '', 0, 0, 'jackbee', 'jackbee', '2020-12-08 15:51:04'),
(12, 'James', 'Edwards', '7q7r8g97ehs@temporary-mail.net', '$2y$10$SxqGPtv/CFQ5pgbrxOtqWuL4aYTX7WMqNo6Mq6VMUfvVE8o8.Zt5O', 'frontend/assets/images/profilePic.jpeg', '', 0, 0, 'jamesedwards', 'jamesedwards', '2020-12-08 23:44:45'),
(13, 'Nina', 'Saavedra', 'nina@gmail.com', '$2y$10$vxeCAO2E.z00Yk1GEZxX7uAQBps1320auMGd2M6LL2ClnY.juuBxi', 'frontend/assets/images/profilePic.jpeg', '', 0, 0, 'ninasaavedra', 'ninasaavedra', '2020-12-09 00:18:11'),
(14, 'Gregory', 'Sherrod', '63xjslcx2sc@temporary-mail.net', '$2y$10$S/Q6MPK.5Fxl27st68W1f.8mRliVjTWS/UqPNA3WDwZs1KMBufwle', 'frontend/assets/images/profilePic.jpeg', '', 0, 0, 'gregorysherrod', 'gregorysherrod', '2020-12-09 06:29:23'),
(15, 'Abigail', 'Tetteh', 'abigailtetteh@gmail.com', '$2y$10$LLilE1XUxYWds6MCcRSADunzPB941Igrlg24TPWT8y0YuF39MhCFm', 'frontend/assets/images/defaultProfilePic.png', '', 0, 0, 'abigailtetteh', 'abigailtetteh', '2020-12-09 09:01:04'),
(16, 'Benjamin', 'Dadzie', 'ben@gmail.com', '$2y$10$yomXp.IeV3pKuqMR2N.MLe8AL0yxUJDheX6mlVfQ3D7WmSVax3mMa', 'frontend/profileImage/16/bdd4552c5c905d7f2dd60159b.png', 'frontend/profileCover/16/743d62b22cb2b9ce38fda78b9.png', 0, 0, 'benjamindadzie', 'benjamindadzie', '2020-12-11 07:20:51'),
(17, 'Ama', 'Osei', 'amaosei@gmail.com', '$2y$10$KAofeJFUGehbkMTykS/iqevwquIpH6W/JupzZ/gzYE8iNrL.z5CTq', 'frontend/assets/images/defaultProfilePic.png', '', 0, 0, 'amaosei', 'amaosei', '2020-12-21 14:57:30'),
(18, 'Ama', 'Osei', 'ama@gmail.com', '$2y$10$vRb/wEDJvqlHNjvuIANiHuY1G5.aueJK2BmPHjO1NSRxQ7bil19sO', 'frontend/assets/images/profilePic.jpeg', '', 0, 0, 'amaosei1714470567', 'amaosei1714470567', '2020-12-21 14:58:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`followID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `fk_foreign_key_name` (`chatID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `postForeign` (`userId`);

--
-- Indexes for table `retweet`
--
ALTER TABLE `retweet`
  ADD PRIMARY KEY (`retweetId`),
  ADD KEY `retweetFrom` (`retweetFrom`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `trends`
--
ALTER TABLE `trends`
  ADD PRIMARY KEY (`trendID`),
  ADD KEY `hashtag` (`hashtag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `followID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `retweet`
--
ALTER TABLE `retweet`
  MODIFY `retweetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trends`
--
ALTER TABLE `trends`
  MODIFY `trendID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`chatID`) REFERENCES `chats` (`chat_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `postForeign` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `retweet`
--
ALTER TABLE `retweet`
  ADD CONSTRAINT `retweet_ibfk_1` FOREIGN KEY (`retweetFrom`) REFERENCES `post` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
