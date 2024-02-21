-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 11:46 AM
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
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `id_user`, `name`, `telephone`, `company`, `is_recycle`, `created_at`, `updated_at`) VALUES
(4, 1, 'Contact 1', '1234567891', 'Company 1', 0, '2024-01-16', '2024-01-16'),
(5, 1, 'Contact 2', '1234567892', 'Company 2', 0, '2024-01-16', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `contact_group`
--

CREATE TABLE `contact_group` (
  `contact_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_group`
--

INSERT INTO `contact_group` (`contact_id`, `group_id`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cong viec', '2024-01-16', '2024-01-16'),
(2, 'Gia dinh', '2024-01-16', '2024-01-16'),
(3, 'Ban be', '2024-01-16', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'john.doe@example.com', 'hashed_password', 'John', 'Doe', '/assets/image/avatar.jpg', '2024-01-16', '2024-01-16'),
(4, 'thanh@gmail.com', '$2y$10$CnXOAwVmA3KligLO9elmpODIUuDBUNs98RFXWt21l4OVRWKVUdhuK', 'thanh', 'ly', '/assets/image/avatar.jpg', NULL, NULL),
(5, 'test1@gmail.com', '$2y$10$y2wG7W0NjJIG5yLCT0VW8uL0K/sw6ixrgVd3HlCcuLFVfwikZOQOK', NULL, NULL, '/assets/image/avatar.jpg', NULL, NULL),
(6, 'than2h@gmail.com', '$2y$10$DFjw4TTu8OrOIBChtwbv9e6qs3PB2ijcv5FY4FuV8lc6sYkLWauQS', 'Thành', 'Lý', '/assets/image/avatar.jpg', NULL, NULL),
(7, 'dulichongde@gmail.com', '$2y$10$X96Xg1J9a6i5M52c6BdqLee6BsSiEw/ATLbiXqF79kTp3UsvnveZK', 'Thành', 'Lý', '/assets/image/avatar.jpg', NULL, NULL),
(8, '123aas@gmail.com', '$2y$10$JugSRa48hD3QciPxEiYz3.Cinr02a9NUw49v7Z7a5qNFoCWSF8LV6', 'Thành', 'Lý', '/assets/image/avatar.jpg', NULL, NULL),
(9, '123123aas@gmail.com', '$2y$10$C5cVHr/sWkRn8RjuZWEtLOuToA2XqHXwOMLMIh7o3T5g5rn/hVqKK', 'Thành', 'Lý', '/assets/image/avatar.jpg', NULL, NULL),
(10, '123112323aas@gmail.com', '$2y$10$XBgJURB0cn5qzLpJfKXHxu4/bo/QjyqUFY1L6GZSAaCcFZFPCH1y6', 'Thành', 'Lý', '/assets/image/avatar.jpg', NULL, NULL),
(11, 'congthanh@gmail.com', '$2y$10$DN.Bq4JDmTvWWBhGRxdUzucX8z39Qv3QQnXV.jFMfluBR2Oj0faWS', 'Thành', 'Lý', '/assets/image/avatar.jpg', NULL, NULL),
(12, '123a123122s@gmail.com', '$2y$10$EuCjgYP2wFJqrJzjA6dM9O/jFVckSZAMK6wDc9hAIq9LbiszGiDJ2', '123123', '123123', '/assets/image/avatar.jpg', NULL, NULL),
(13, 'dinh@gmail.com', '$2y$10$lDp4BQUbMPkdlPN0btKVHO.tBi/cxO3Dw7YLmn5NfL9zTHxttFdv2', 'DInh ', 'hihi', '/assets/image/avatar.jpg', NULL, NULL),
(14, '123@gmail.com', '$2y$10$z7FEEffQem1aXq3kfQJRP.BskCj5LBWF7f0Mk7/jGUdCHx7Ew2ZGq', 'Thành', 'Thành', '/assets/image/avatar.jpg', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
