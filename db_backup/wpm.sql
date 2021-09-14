-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 14, 2021 at 12:55 PM
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
-- Table structure for table `bin_master`
--

DROP TABLE IF EXISTS `bin_master`;
CREATE TABLE IF NOT EXISTS `bin_master` (
  `bin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `plant_id` int(10) UNSIGNED NOT NULL,
  `bin_weight` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`bin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bin_master`
--

INSERT INTO `bin_master` (`bin_id`, `name`, `plant_id`, `bin_weight`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'bin demo', 2, 5, 1, NULL, '2021-09-14 02:27:58', '2021-09-14 05:57:04', NULL),
(3, 'bin demo 1', 3, 2, 1, NULL, '2021-09-14 02:29:54', '2021-09-14 02:30:51', NULL),
(4, 'bin demo2', 4, 3, 1, NULL, '2021-09-14 02:30:06', '2021-09-14 02:30:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

DROP TABLE IF EXISTS `category_master`;
CREATE TABLE IF NOT EXISTS `category_master` (
  `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `p_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `name`, `p_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'dog', 0, 1, 1, '2021-09-10 10:17:42', '2021-09-14 01:20:58', 1),
(2, 'cat', 0, 1, 1, '2021-09-10 10:17:42', '2021-09-14 05:27:54', 1),
(3, 'small dog', 1, 1, NULL, '2021-09-14 01:49:55', '2021-09-14 04:18:22', NULL),
(4, 'small cat', 2, 1, NULL, '2021-09-14 05:01:16', '2021-09-14 05:31:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

DROP TABLE IF EXISTS `item_master`;
CREATE TABLE IF NOT EXISTS `item_master` (
  `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_no` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `item_avg_weight` int(5) UNSIGNED NOT NULL,
  `batch_no` int(10) UNSIGNED NOT NULL,
  `plant_id` int(10) UNSIGNED NOT NULL,
  `manfactring_date` date NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`item_id`, `item_no`, `item_name`, `cat_id`, `item_avg_weight`, `batch_no`, `plant_id`, `manfactring_date`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 12345, 'new product', 1, 20, 3214, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plant_master`
--

DROP TABLE IF EXISTS `plant_master`;
CREATE TABLE IF NOT EXISTS `plant_master` (
  `plant_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `plant_address` varchar(200) NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`plant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plant_master`
--

INSERT INTO `plant_master` (`plant_id`, `name`, `plant_address`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'plant', 'dhan trident 202', 1, NULL, '2021-09-14 01:39:26', '2021-09-14 06:06:58', NULL),
(3, 'plant1', 'dhan trident', 1, NULL, '2021-09-14 01:41:54', '2021-09-14 02:23:04', NULL),
(4, 'plant2', 'dhan trident', 1, NULL, '2021-09-14 01:42:17', '2021-09-14 02:23:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

DROP TABLE IF EXISTS `stock_master`;
CREATE TABLE IF NOT EXISTS `stock_master` (
  `stock_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_id` int(10) UNSIGNED NOT NULL,
  `bin_id` int(10) UNSIGNED NOT NULL,
  `plant_id` int(10) UNSIGNED NOT NULL,
  `assigned_user_id` int(10) UNSIGNED NOT NULL,
  `assigned_weight_scale_id` int(10) UNSIGNED NOT NULL,
  `assign_date` date NOT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL,
  `total_weight` int(10) UNSIGNED NOT NULL,
  `net_weight` int(10) UNSIGNED NOT NULL,
  `bin_weight` int(10) UNSIGNED NOT NULL,
  `counted_quantity` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`stock_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `role`, `name`, `email`, `password`, `mobile`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, '1', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8827667265', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weight_scale_master`
--

DROP TABLE IF EXISTS `weight_scale_master`;
CREATE TABLE IF NOT EXISTS `weight_scale_master` (
  `weight_scale_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `plant_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`weight_scale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
