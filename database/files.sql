-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2018 at 03:26 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `file_overview` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `file_description` text CHARACTER SET utf8,
  `file_slug` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `file_files` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `user_id`, `user_email`, `user_full_name`, `category_id`, `file_name`, `file_overview`, `file_description`, `file_slug`, `file_image`, `file_files`, `file_status`, `created_at`, `updated_at`) VALUES
(1, 9999, 'admin@admin.com', 'Lê Super Admin', NULL, 'Bài 1: Giới thiệu Laravel111', 'sdfg sdfg ssdfg sdfg ssdfg sdfg s', '<p>sdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg s</p>', NULL, '/photos/9999/test/5ab1cee1a4aa4.jpeg', '[\"\\/files\\/9999\\/asdf\\/5ab3285de870c.pdf\"]', NULL, '2018-03-25 21:50:51', '2018-04-05 00:15:35'),
(2, 9999, 'admin@admin.com', 'Lê Super Admin', NULL, 'Bài 1: Giới thiệu Laravel', 'sdfg sdfg ssdfg sdfg ssdfg sdfg s', '<p>sdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg s</p>', NULL, NULL, '[]', NULL, '2018-04-05 00:15:06', '2018-04-05 00:15:06'),
(3, 9999, 'admin@admin.com', 'Lê Super Admin', NULL, 'Bài 1: Giới thiệu Laravel222', 'sdfg sdfg ssdfg sdfg ssdfg sdfg s', '<p>sdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg ssdfg sdfg s</p>', NULL, '/photos/9999/test/5ab1cee1a4aa4.jpeg', '[\"\\/files\\/9999\\/asdf\\/5ab3285de870c.pdf\"]', NULL, '2018-04-05 00:15:47', '2018-04-05 00:15:47'),
(4, 1, 'admin@admin.com', ' ', NULL, 'baisssssssssssssssssssssssssssssssss', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', NULL, NULL, '[]', NULL, '2018-04-18 20:09:53', '2018-04-18 20:09:53'),
(6, 1, 'admin@admin.com', ' ', NULL, 'ewewqewqeeeqeqewqewqewqewqeqwewqee', 'dadsadsdsa', 'dsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsad', NULL, NULL, '[]', NULL, '2018-04-18 20:18:29', '2018-04-18 20:24:12'),
(7, 1, 'admin@admin.com', ' ', NULL, 'ewewqewqeeeqeqewqewqewqewqeqwewqee', 'dadsadsdsa', 'dsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsaddsadsadsadsadadsad', NULL, NULL, '[]', NULL, '2018-04-18 20:24:38', '2018-04-18 20:24:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
