-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 12:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tele_cards`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `is_recycle` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `id_user`, `name`, `telephone`, `company`, `is_recycle`, `created_at`, `updated_at`) VALUES
(4, 1, 'Contact 1', '1234567891', 'Company 1', 1, '2024-01-16 00:00:00', '2024-02-20 13:20:20'),
(5, 1, 'Contact 2', '1234567892', 'Company 2', 1, '2024-01-16 00:00:00', '2024-02-20 13:20:20'),
(20, 19, 'SaiGon bạc', '123123', 'asfasfa', 0, '2024-02-21 13:48:16', '2024-02-21 13:48:16'),
(21, 4, '&#60;script&#62;&#60;/script&#62;', '123123', '123123', 0, '2024-02-21 15:10:25', '2024-02-21 15:10:25');

--
-- Triggers `contacts`
--
DELIMITER $$
CREATE TRIGGER `contacts_date_updated_trigger` BEFORE UPDATE ON `contacts` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_group`
--

CREATE TABLE `contact_group` (
  `contact_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `id_user`, `name`, `created_at`, `updated_at`) VALUES
(26, 4, '&#60;script&#62;&#60;/script&#62;', '2024-02-21 15:00:33', '2024-02-21 15:00:33');

--
-- Triggers `groups`
--
DELIMITER $$
CREATE TRIGGER `groups_date_updated_trigger` BEFORE UPDATE ON `groups` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `notes`
--
DELIMITER $$
CREATE TRIGGER `notes_date_updated_trigger` BEFORE UPDATE ON `notes` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT '/assets/image/avatar.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'john.doe@example.com', 'hashed_password', 'John', 'Doe', '/assets/image/avatar.jpg', '2024-01-16 00:00:00', '2024-01-16 00:00:00'),
(4, 'thanh@gmail.com', '$2y$10$CnXOAwVmA3KligLO9elmpODIUuDBUNs98RFXWt21l4OVRWKVUdhuK', 'thanh', 'ly', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'test1@gmail.com', '$2y$10$y2wG7W0NjJIG5yLCT0VW8uL0K/sw6ixrgVd3HlCcuLFVfwikZOQOK', NULL, NULL, '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'than2h@gmail.com', '$2y$10$DFjw4TTu8OrOIBChtwbv9e6qs3PB2ijcv5FY4FuV8lc6sYkLWauQS', 'Thành', 'Lý', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'dulichongde@gmail.com', '$2y$10$X96Xg1J9a6i5M52c6BdqLee6BsSiEw/ATLbiXqF79kTp3UsvnveZK', 'Thành', 'Lý', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '123aas@gmail.com', '$2y$10$JugSRa48hD3QciPxEiYz3.Cinr02a9NUw49v7Z7a5qNFoCWSF8LV6', 'Thành', 'Lý', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '123123aas@gmail.com', '$2y$10$C5cVHr/sWkRn8RjuZWEtLOuToA2XqHXwOMLMIh7o3T5g5rn/hVqKK', 'Thành', 'Lý', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '123112323aas@gmail.com', '$2y$10$XBgJURB0cn5qzLpJfKXHxu4/bo/QjyqUFY1L6GZSAaCcFZFPCH1y6', 'Thành', 'Lý', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'congthanh@gmail.com', '$2y$10$DN.Bq4JDmTvWWBhGRxdUzucX8z39Qv3QQnXV.jFMfluBR2Oj0faWS', 'Thành', 'Lý', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '123a123122s@gmail.com', '$2y$10$EuCjgYP2wFJqrJzjA6dM9O/jFVckSZAMK6wDc9hAIq9LbiszGiDJ2', '123123', '123123', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'dinh@gmail.com', '$2y$10$lDp4BQUbMPkdlPN0btKVHO.tBi/cxO3Dw7YLmn5NfL9zTHxttFdv2', 'DInh ', 'hihi', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '123@gmail.com', '$2y$10$z7FEEffQem1aXq3kfQJRP.BskCj5LBWF7f0Mk7/jGUdCHx7Ew2ZGq', 'Thành', 'Thành', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'asdb1230@gmail.com', 'asdasdad', '123', 'asdasd', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'test12323@gmail.com', '$2y$10$PBFyOKoYWCC9Onp8YEGiDunURTY9NfPTCvROA3nD1yHZxOVzzYwqy', '123123', '123123', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'thanh123123@gmail.com', '$2y$10$DjqMALdWkyZB5p5OvNW1q.4D4vQ5EXCsd68zfeat.3NIXeNaBvzwq', '123123', '123123', '/assets/image/avatar.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'test1sdsd@gmail.com', '$2y$10$Nou9g.kQtpl5TpU1zOojm.d2Obr4VcRZHQlCwnFOowe5U4jkCXOWS', 'Thành', '123', '/assets/image/avatar.jpg', '2024-02-21 13:40:00', '2024-02-21 13:40:00'),
(19, 'myaccount@gmail.com', '$2y$10$jLYGNzySmHVLJ4dlCNtCjO7ms7T4GNMMmQ46c70CIrOiI2u5/4o2y', 'asd', 'asd', '/assets/image/avatar.jpg', '2024-02-21 13:40:18', '2024-02-21 13:40:18');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `users_date_updated_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `contact_group`
--
ALTER TABLE `contact_group`
  ADD PRIMARY KEY (`contact_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_group`
--
ALTER TABLE `contact_group`
  ADD CONSTRAINT `contact_group_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contact_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
