-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2020 at 03:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`) VALUES
(1, 5),
(2, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `grade_student`
--

DROP TABLE IF EXISTS `grade_student`;
CREATE TABLE IF NOT EXISTS `grade_student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` int(255) NOT NULL,
  `grade_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade_student`
--

INSERT INTO `grade_student` (`id`, `student_id`, `grade_id`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 2, 5),
(7, 2, 5),
(8, 3, 1),
(9, 3, 1),
(10, 4, 6),
(11, 4, 6),
(12, 4, 1),
(13, 4, 2),
(14, 5, 3),
(15, 6, 4),
(16, 6, 3),
(17, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `school_board`
--

DROP TABLE IF EXISTS `school_board`;
CREATE TABLE IF NOT EXISTS `school_board` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `board_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school_board`
--

INSERT INTO `school_board` (`id`, `board_name`) VALUES
(1, 'CSM'),
(2, 'CSMB');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `board_id` int(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `last_name`, `board_id`, `updated_at`, `created_at`) VALUES
(1, 'Petar', 'Petrovic', 1, '2020-10-05 13:46:15', '0000-00-00 00:00:00'),
(2, 'Mitar', 'Mitrovic', 2, '2020-10-05 13:46:15', '0000-00-00 00:00:00'),
(3, 'Jovan', 'Jovic', 2, '2020-10-05 13:46:15', '0000-00-00 00:00:00'),
(4, 'Ivan', 'Petrovic', 1, '2020-10-05 13:46:15', '0000-00-00 00:00:00'),
(5, 'Petar', 'Petrovic', 1, '2020-10-05 11:46:19', '2020-10-05 11:46:19'),
(6, 'tset', 'tset', 2, '2020-10-05 13:28:13', '2020-10-05 13:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(1, 'pera', '3a772c82dc28af481ff4099526353598f8ada4d243ddd0ae182a3ac631b7a6432afe0d215108e28a4fcd2ad61a70c8d45e97d87ba36665f8c55c18dc524105ea', 'pera@pera.com'),
(2, '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', ''),
(3, 'mika', 'a7fce35f48a350ae1125a3ca4e0af6e37316a9ed4555b146b9f663d52c33eda09a49aa813c9d36c1a617c2453156bb273c93eb68ece01ca7c38e5f247794104c', 'mika@mika');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
