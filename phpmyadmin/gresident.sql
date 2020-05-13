-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 04:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gresident`
--

-- --------------------------------------------------------

--
-- Table structure for table `battles`
--

CREATE TABLE `battles` (
  `id` int(11) NOT NULL,
  `participator_one` int(11) NOT NULL,
  `participator_two` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_started` tinyint(1) NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `battles`
--

INSERT INTO `battles` (`id`, `participator_one`, `participator_two`, `challenge_id`, `timestamp`, `is_started`, `is_completed`, `active`) VALUES
(1, 1, 2, 1, '2020-05-05 14:44:48', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `goals` varchar(300) NOT NULL,
  `extra_info` varchar(300) NOT NULL,
  `rewards` varchar(300) NOT NULL,
  `green_points` int(11) NOT NULL,
  `thema_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `is_battle` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `title`, `description`, `goals`, `extra_info`, `rewards`, `green_points`, `thema_id`, `created_at`, `created_by`, `is_battle`) VALUES
(1, 'Energieverbruik verminderen', 'Het enorme verbruik van fossiele brandstoffen sinds de industriele revolutie ligt aan de basis van\r\nde opwarming van onze aarde. \r\nDeze opwarming wordt veroorzaakt door het broeikaseffect.', '1;2', 'links', '1;2', 300, 1, '2020-05-05 12:55:31', 2, 1),
(2, 'Energieverbruik met 5% verminderen', 'Test description', '1;2', 'links', '1;2', 200, 1, '2020-05-05 12:57:31', 2, 0),
(3, 'Test', 'fuiguguih', '1;2', 'Links', '1;2', 100, 1, '2020-05-06 20:42:36', 2, 0),
(4, 'gfgnkdfl', 'gfgiodj', '1;2', 'dfdsfsd', '1;2', 233, 1, '2020-05-07 09:05:10', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `challenge_completed`
--

CREATE TABLE `challenge_completed` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `isWinner` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `challenge_queue`
--

CREATE TABLE `challenge_queue` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenge_queue`
--

INSERT INTO `challenge_queue` (`id`, `user_id`, `challenge_id`, `timestamp`, `active`) VALUES
(15, 1, 4, '2020-05-13 06:08:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `challenge_singles`
--

CREATE TABLE `challenge_singles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenge_singles`
--

INSERT INTO `challenge_singles` (`id`, `user_id`, `challenge_id`, `timestamp`, `is_completed`, `active`) VALUES
(12, 1, 2, '2020-05-13 04:53:07', 0, 1),
(16, 1, 3, '2020-05-13 06:58:24', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `zip` varchar(4) NOT NULL,
  `city` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `population` int(11) NOT NULL,
  `green_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `description`, `active`) VALUES
(1, 'Energie', NULL, 1),
(2, 'Afval', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `avatar` varchar(300) DEFAULT 'default.jpg',
  `green_points` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`, `green_points`, `role_id`, `created_at`, `verified`) VALUES
(1, 'John', 'Doe', 'jdoe@test.com', '12345', 'default.jpg', 20, 1, '2020-05-05 12:25:59', 1),
(2, 'Jana', 'Doe', '', '', 'default.jpg', 0, 0, '2020-05-05 12:40:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(300) NOT NULL,
  `house_number` varchar(4) NOT NULL,
  `zip` varchar(4) NOT NULL,
  `phone_number` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `verification_code`
--

CREATE TABLE `verification_code` (
  `id` int(11) NOT NULL,
  `verify_code` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `battles`
--
ALTER TABLE `battles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_completed`
--
ALTER TABLE `challenge_completed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_queue`
--
ALTER TABLE `challenge_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_singles`
--
ALTER TABLE `challenge_singles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_code`
--
ALTER TABLE `verification_code`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `battles`
--
ALTER TABLE `battles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `challenge_completed`
--
ALTER TABLE `challenge_completed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenge_queue`
--
ALTER TABLE `challenge_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `challenge_singles`
--
ALTER TABLE `challenge_singles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verification_code`
--
ALTER TABLE `verification_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
