-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 12:29 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailieuweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `files_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `files_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `files_overview` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `files_description` text CHARACTER SET utf8,
  `files_slug` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `files_files` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files_status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`files_id`, `user_id`, `user_email`, `user_full_name`, `category_id`, `files_name`, `files_overview`, `files_description`, `files_slug`, `files_image`, `files_files`, `files_status`, `created_at`, `updated_at`) VALUES
(1, 9999, 'admin@admin.com', 'Lê Super Admin', NULL, 'Bài 1: Giới thiệu Laravel111', 'sdfg sdfg ssdfg sdfg ssdfg sdfg s', '<p>sdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg s</p>', NULL, '/photos/9999/test/5ab1cee1a4aa4.jpeg', '["\\/files\\/9999\\/asdf\\/5ab3285de870c.pdf"]', 99, '2018-03-25 21:50:51', '2018-04-05 00:15:35'),
(2, 9999, 'admin@admin.com', 'Lê Super Admin', NULL, 'Bài 1: Giới thiệu Laravel', 'sdfg sdfg ssdfg sdfg ssdfg sdfg s', '<p>sdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg s</p>', NULL, NULL, '[]', 99, '2018-04-05 00:15:06', '2018-04-05 00:15:06'),
(3, 9999, 'admin@admin.com', 'Lê Super Admin', NULL, 'Bài 1: Giới thiệu Laravel222', 'sdfg sdfg ssdfg sdfg ssdfg sdfg s', '<p>sdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg s</p>', NULL, '/photos/9999/test/5ab1cee1a4aa4.jpeg', '["\\/files\\/9999\\/asdf\\/5ab3285de870c.pdf"]', 99, '2018-04-05 00:15:47', '2018-04-05 00:15:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`files_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
