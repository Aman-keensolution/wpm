-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 28, 2021 at 04:52 PM
-- Server version: 10.5.4-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

DROP TABLE IF EXISTS `category_master`;
CREATE TABLE IF NOT EXISTS `category_master` (
  `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `p_id` int(10) UNSIGNED DEFAULT 0,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_id` (`cat_id`),
  KEY `p_id` (`p_id`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `name`, `p_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Metal Products', 0, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(2, 'Aluminium', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(3, 'Cast Iron', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(4, 'Copper', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(5, 'Mild Steel', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(6, 'Plastic', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(7, 'Stainless Steel', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(8, 'Zinc', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(9, 'Other', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
