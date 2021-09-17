-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 17, 2021 at 06:19 AM
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
  `unit_id` int(5) UNSIGNED NOT NULL,
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

INSERT INTO `bin_master` (`bin_id`, `name`, `plant_id`, `bin_weight`, `unit_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'bin demo', 3, 5, 0, 1, NULL, '2021-09-14 02:27:58', '2021-09-14 08:26:36', NULL),
(3, 'bin demo 1', 3, 2, 0, 1, NULL, '2021-09-14 02:29:54', '2021-09-14 02:30:51', NULL),
(4, 'bin demo2', 4, 3, 0, 1, NULL, '2021-09-14 02:30:06', '2021-09-14 02:30:53', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `name`, `p_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Metal Products', 0, 1, 1, '2021-09-10 10:17:42', '2021-09-16 01:00:39', 1),
(2, 'Electrical Wiring and Accessories', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-14 09:26:35', 1),
(3, 'Plumbing', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-14 09:26:35', 1),
(4, 'Industrial', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-14 09:26:35', 1),
(5, 'Oil & Gas', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-14 09:26:35', 1),
(6, 'Safety & Security', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-14 09:26:35', 1),
(7, 'Construction', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-14 09:26:35', 1),
(8, 'PowerGen', 1, 1, 1, '2021-09-10 10:17:42', '2021-09-14 09:26:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

DROP TABLE IF EXISTS `item_master`;
CREATE TABLE IF NOT EXISTS `item_master` (
  `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_no` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `item_avg_weight` int(5) UNSIGNED NOT NULL,
  `unit_id` int(5) UNSIGNED NOT NULL,
  `batch_no` int(10) UNSIGNED NOT NULL,
  `plant_id` int(10) UNSIGNED NOT NULL,
  `manfactring_date` date NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`item_id`, `item_no`, `price`, `name`, `cat_id`, `item_avg_weight`, `unit_id`, `batch_no`, `plant_id`, `manfactring_date`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 1, 0, 'Hv Terminals (Tranformers)', 2, 20, 0, 1, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(2, 2, 0, 'Chappe', 2, 20, 0, 2, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(3, 3, 0, 'Cu Lugge/ Connectors', 2, 20, 0, 3, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(4, 4, 0, 'Conduit bodies', 2, 20, 0, 4, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(5, 5, 0, 'Service Entrance Heads', 2, 20, 0, 5, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(6, 6, 0, 'UL/CSA certified', 2, 20, 0, 6, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(7, 7, 0, '100`s of parts & assemblies', 2, 20, 0, 7, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(8, 8, 0, 'Vast array of available tool design', 2, 20, 0, 8, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(9, 9, 0, 'Flow Valves', 3, 20, 0, 9, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(10, 10, 0, 'Fittings For Fluid Circuits', 3, 20, 0, 10, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(11, 11, 0, 'Air Vents', 3, 20, 0, 11, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(12, 12, 0, 'Fixed Diaphragm Valves;', 3, 20, 0, 12, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(13, 13, 0, 'Plugs;', 3, 20, 0, 13, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(14, 14, 0, 'Drain Fittings;', 3, 20, 0, 14, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(15, 15, 0, 'Primer Trap Assembly;', 3, 20, 0, 15, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(16, 16, 0, 'ASME Valves;', 3, 20, 0, 16, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(17, 17, 0, 'Diversified Alloys;', 3, 20, 0, 17, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(18, 18, 0, 'Full range of fitting sizes;', 3, 20, 0, 18, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(19, 19, 0, 'Custom engineered products;', 3, 20, 0, 19, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(20, 20, 0, 'Pressure Reducing Valve;', 4, 20, 0, 20, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(21, 21, 0, 'Seismic Data Storage Housing;', 4, 20, 0, 21, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(22, 22, 0, 'Lamp Holders;', 4, 20, 0, 22, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(23, 23, 0, 'Weighing Scale Housings;', 4, 20, 0, 23, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(24, 24, 0, 'electronic product life and reliability;', 4, 20, 0, 24, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(25, 25, 0, 'Tight tolerances;', 4, 20, 0, 25, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL),
(26, 26, 0, 'Quick conversion from prototype to production', 4, 20, 0, 26, 2, '2021-09-14', 1, NULL, '2021-09-14 06:40:09', '2021-09-14 06:40:09', NULL);

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
  `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_id` int(10) UNSIGNED NOT NULL,
  `bin_id` int(10) UNSIGNED NOT NULL,
  `plant_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `weight_scale_id` int(10) UNSIGNED NOT NULL,
  `assign_date` date NOT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(5) UNSIGNED NOT NULL,
  `gross_weight` int(10) UNSIGNED NOT NULL,
  `bin_weight` int(10) UNSIGNED NOT NULL,
  `net_weight` int(10) UNSIGNED NOT NULL,
  `counted_quantity` int(10) UNSIGNED NOT NULL,
  `remark` text NOT NULL,
  `provision1` varchar(30) NOT NULL,
  `provision2` varchar(30) NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_master`
--

INSERT INTO `stock_master` (`stock_id`, `item_id`, `bin_id`, `plant_id`, `user_id`, `weight_scale_id`, `assign_date`, `batch_id`, `unit_id`, `gross_weight`, `bin_weight`, `net_weight`, `counted_quantity`, `remark`, `provision1`, `provision2`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 1, 2, 2, 1, 2, '2021-09-16', 1234567, 1, 152, 50, 100, 132, '1', '1', '1', 1, NULL, '2021-09-16 05:21:25', NULL, '2021-09-16 06:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

DROP TABLE IF EXISTS `unit_master`;
CREATE TABLE IF NOT EXISTS `unit_master` (
  `unit_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code_name` varchar(50) NOT NULL,
  `in_gram` int(11) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`unit_id`, `name`, `code_name`, `in_gram`) VALUES
(1, 'Gram', 'Gm.', 1),
(2, 'Kilo Gram', 'Kg.', 1000),
(3, 'Ton', 'T.', 1000000);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `role`, `name`, `email`, `password`, `mobile`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, '1', 'admin', 'admin@gmail.com', '3e7bf1383bcdd338f3d837f3dc948f80', '8827667265', 1, NULL, NULL, '2021-09-15 02:15:28', NULL),
(2, '2', 'user', 'user@gmail.com', 'a18cd028b52741c748c0129b201ae159', '8827667265', 1, NULL, NULL, '2021-09-15 02:15:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weight_scale_master`
--

DROP TABLE IF EXISTS `weight_scale_master`;
CREATE TABLE IF NOT EXISTS `weight_scale_master` (
  `weight_scale_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `weight_scale_no` varchar(100) NOT NULL,
  `plant_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`weight_scale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight_scale_master`
--

INSERT INTO `weight_scale_master` (`weight_scale_id`, `name`, `weight_scale_no`, `plant_id`, `user_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'new weighing', '123456', 2, 2, 1, NULL, '2021-09-16 05:18:00', '2021-09-16 05:18:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
