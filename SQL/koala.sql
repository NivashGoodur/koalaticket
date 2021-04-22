-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 09:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koala`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_set` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210220200747', '2021-02-20 21:07:54', 5586),
('DoctrineMigrations\\Version20210221134017', '2021-02-21 14:40:36', 892);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `ticket_target_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `ticket_target_id`, `author_id`, `date`, `content`) VALUES
(1, 2, 2, '2021-02-21 13:27:03', 'trshrtsrh'),
(2, 4, 1, '2021-02-21 13:28:16', 'strhsrhrs'),
(3, 4, 1, '2021-02-21 13:28:20', 'shrsg'),
(4, 5, 2, '2021-02-22 09:30:25', 'yjkyggtyjtgy'),
(5, 5, 2, '2021-02-22 09:32:25', 'nnnnnnnnnnnnnnnnnnn'),
(6, 6, 2, '2021-02-22 09:38:07', 'ghnhgfcnjchgn'),
(7, 6, 2, '2021-02-22 09:38:58', 'gfngfnfnf'),
(8, 5, 2, '2021-02-22 09:39:08', 'fgbfgbgfbf'),
(9, 6, 2, '2021-02-22 09:40:25', 'fgnfnfg'),
(10, 7, 2, '2021-02-22 15:13:07', 'dddgdg'),
(11, 7, 2, '2021-02-22 15:13:09', 'rdgdrgdg'),
(12, 9, 1, '2021-02-22 15:34:46', 'fffff'),
(13, 11, 1, '2021-02-22 15:34:52', 'ddddddd'),
(14, 13, 1, '2021-02-22 17:04:15', 'tbrtbbbbbbbb'),
(15, 14, 1, '2021-04-21 16:17:15', 'llllll');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `statement` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `owner_id`, `title`, `content`, `slug`, `creation_date`, `update_time`, `statement`, `level`, `department`) VALUES
(1, 2, 'dtghstg', 'thrsthrt', 'dtghstg', '2021-02-21 13:26:51', '2021-02-21 13:26:51', 'fermé', '1', 'commercial'),
(2, 2, 'trshrtshs', 'trhsrthsr', 'trshrtshs', '2021-02-21 13:26:59', '2021-02-21 13:27:03', 'fermé', '1', 'commercial'),
(3, 2, 'trshtr', 'tshstr', 'trshtr', '2021-02-21 13:27:35', '2021-02-21 13:27:35', 'fermé', '5', 'commercial'),
(4, 2, 'strhtrh', 'strrshr', 'strhtrh', '2021-02-21 13:27:59', '2021-02-21 13:28:20', 'fermé', '5', 'commercial'),
(5, 2, 'zzzzz', 'fbgdfb', 'zzzzz', '2021-02-21 13:30:11', '2021-02-22 09:39:08', 'fermé', '2', 'technique'),
(6, 2, 'dfghdhd', 'hdghdghd', 'dfghdhd', '2021-02-22 09:37:56', '2021-02-22 09:40:25', 'fermé', '1', 'commercial'),
(7, 2, 'fnhfgn', 'ffhfh', 'fnhfgn', '2021-02-22 15:13:03', '2021-02-22 15:13:09', 'fermé', '1', 'commercial'),
(8, 2, 'sfsfs', 'fsfrszf', 'sfsfs', '2021-02-22 15:14:51', '2021-02-22 15:14:51', 'fermé', '1', 'commercial'),
(9, 2, 'zzzzz', 'zzzzzzz', 'zzzzz-1', '2021-02-22 15:25:20', '2021-02-22 15:34:46', 'fermé', '1', 'commercial'),
(10, 2, 'zzzz', 'zzzzz', 'zzzz', '2021-02-22 15:25:28', '2021-02-22 15:25:28', 'fermé', '1', 'commercial'),
(11, 2, 'gersert', 'ertgersg', 'gersert', '2021-02-22 15:29:59', '2021-02-22 15:34:52', 'répondu', '1', 'commercial'),
(12, 2, 'ertttt', 'gsergggggg', 'ertttt', '2021-02-22 15:30:06', '2021-02-22 15:30:06', 'fermé', '1', 'commercial'),
(13, 2, 'gggggg', 'tttttt', 'gggggg', '2021-02-22 15:30:12', '2021-02-22 17:04:15', 'répondu', '1', 'commercial'),
(14, 2, 'gggg', 'ttt', 'gggg', '2021-02-22 15:30:18', '2021-04-21 16:17:15', 'répondu', '1', 'commercial');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_connexion` datetime NOT NULL,
  `suspended` tinyint(1) NOT NULL,
  `picture` longtext COLLATE utf8mb4_unicode_ci,
  `nightmode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `last_connexion`, `suspended`, `picture`, `nightmode`, `address`) VALUES
(1, 'a@a.a', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$M2ptbGNJdlRtS2d4QWlsSA$O6AXsRHb2whZa84gj19JPQPF+4u0hFGa1dDQKS0GfIc', 'Alice', 'Zuberg', '2021-02-20 21:09:21', 0, 'images/uploads/165a80414474708b2198bcba209e428f.png', '{{asset(\"css/nightmode.css\")}}', NULL),
(2, 'b@b.b', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Nkd6dFRjQ2tSZVNsS0c3NA$VSz//afJpfRWEw/v369eAO+lA97cw9DLSizscRO9QEI', 'Eugeo', 'Yujio', '2021-02-20 21:10:15', 0, 'images/uploads/3fe8e0bf9cc06c3571dd88c3136a0a04.png', '{{asset(\"css/nightmode.css\")}}', NULL),
(3, 'nivash_goodur@live.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WkJsV2Vmak9xcFl3TVZ3Tw$lDJusCHFeQlWIOnOY46Jmsl23gPDcOl3NgsdyqnlgzA', 'Nivash', 'Goodur', '2021-02-22 09:25:14', 0, NULL, NULL, 'Drancy'),
(4, 'nivash_goodur@a.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$QjIwckxrSzQ0d2luV1gxbA$utl7U4A2cb062/wgD0TEybLWj8ppHTYbiUgeKLzVucw', 'Nivash', 'Goodur', '2021-02-22 18:27:07', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8A8E26E9700047D2` (`ticket_id`),
  ADD KEY `IDX_8A8E26E9D4D57CD` (`staff_id`),
  ADD KEY `IDX_8A8E26E97E3C61F9` (`owner_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6BD307F8FB4D12C` (`ticket_target_id`),
  ADD KEY `IDX_B6BD307FF675F31B` (`author_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_97A0ADA3989D9B62` (`slug`),
  ADD KEY `IDX_97A0ADA37E3C61F9` (`owner_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `FK_8A8E26E9700047D2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `FK_8A8E26E97E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_8A8E26E9D4D57CD` FOREIGN KEY (`staff_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307F8FB4D12C` FOREIGN KEY (`ticket_target_id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `FK_B6BD307FF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_97A0ADA37E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
