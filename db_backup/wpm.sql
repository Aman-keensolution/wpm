-- Adminer 4.8.1 MySQL 5.5.5-10.4.13-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `wpm`;
CREATE DATABASE `wpm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wpm`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bin_master`;
CREATE TABLE `bin_master` (
  `bin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `bin_weight` int(10) unsigned NOT NULL,
  `unit` int(5) unsigned NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`bin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `bin_master` (`bin_id`, `name`, `plant_id`, `bin_weight`, `unit`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2,	'bin demo',	3,	5,	0,	1,	NULL,	'2021-09-14 02:27:58',	'2021-09-14 08:26:36',	NULL),
(3,	'bin demo 1',	3,	2,	0,	1,	NULL,	'2021-09-14 02:29:54',	'2021-09-14 02:30:51',	NULL),
(4,	'bin demo2',	4,	3,	0,	1,	NULL,	'2021-09-14 02:30:06',	'2021-09-14 02:30:53',	NULL);

DROP TABLE IF EXISTS `category_master`;
CREATE TABLE `category_master` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `p_id` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `category_master` (`cat_id`, `name`, `p_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1,	'Main',	0,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1),
(2,	'Electrical Wiring and Accessories',	1,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1),
(3,	'Plumbing',	1,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1),
(4,	'Industrial',	1,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1),
(5,	'Oil & Gas',	1,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1),
(6,	'Safety & Security',	1,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1),
(7,	'Construction',	1,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1),
(8,	'PowerGen',	1,	1,	1,	'2021-09-10 10:17:42',	'2021-09-14 09:26:35',	1);

DROP TABLE IF EXISTS `item_master`;
CREATE TABLE `item_master` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_no` int(10) unsigned NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `item_avg_weight` int(5) unsigned NOT NULL,
  `unit` int(5) unsigned NOT NULL,
  `batch_no` int(10) unsigned NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `manfactring_date` date NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `item_master` (`item_id`, `item_no`, `item_name`, `cat_id`, `item_avg_weight`, `unit`, `batch_no`, `plant_id`, `manfactring_date`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1,	1,	'Hv Terminals (Tranformers)',	2,	20,	0,	1,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(2,	2,	'Chappe',	2,	20,	0,	2,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(3,	3,	'Cu Lugge/ Connectors',	2,	20,	0,	3,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(4,	4,	'Conduit bodies',	2,	20,	0,	4,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(5,	5,	'Service Entrance Heads',	2,	20,	0,	5,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(6,	6,	'UL/CSA certified',	2,	20,	0,	6,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(7,	7,	'100`s of parts & assemblies',	2,	20,	0,	7,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(8,	8,	'Vast array of available tool design',	2,	20,	0,	8,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(9,	9,	'Flow Valves',	3,	20,	0,	9,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(10,	10,	'Fittings For Fluid Circuits',	3,	20,	0,	10,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(11,	11,	'Air Vents',	3,	20,	0,	11,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(12,	12,	'Fixed Diaphragm Valves;',	3,	20,	0,	12,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(13,	13,	'Plugs;',	3,	20,	0,	13,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(14,	14,	'Drain Fittings;',	3,	20,	0,	14,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(15,	15,	'Primer Trap Assembly;',	3,	20,	0,	15,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(16,	16,	'ASME Valves;',	3,	20,	0,	16,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(17,	17,	'Diversified Alloys;',	3,	20,	0,	17,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(18,	18,	'Full range of fitting sizes;',	3,	20,	0,	18,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(19,	19,	'Custom engineered products;',	3,	20,	0,	19,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(20,	20,	'Pressure Reducing Valve;',	4,	20,	0,	20,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(21,	21,	'Seismic Data Storage Housing;',	4,	20,	0,	21,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(22,	22,	'Lamp Holders;',	4,	20,	0,	22,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(23,	23,	'Weighing Scale Housings;',	4,	20,	0,	23,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(24,	24,	'electronic product life and reliability;',	4,	20,	0,	24,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(25,	25,	'Tight tolerances;',	4,	20,	0,	25,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(26,	26,	'Quick conversion from prototype to production',	4,	20,	0,	26,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL);

DROP TABLE IF EXISTS `plant_master`;
CREATE TABLE `plant_master` (
  `plant_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `plant_address` varchar(200) NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`plant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `plant_master` (`plant_id`, `name`, `plant_address`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2,	'plant',	'dhan trident 202',	1,	NULL,	'2021-09-14 01:39:26',	'2021-09-14 06:06:58',	NULL),
(3,	'plant1',	'dhan trident',	1,	NULL,	'2021-09-14 01:41:54',	'2021-09-14 02:23:04',	NULL),
(4,	'plant2',	'dhan trident',	1,	NULL,	'2021-09-14 01:42:17',	'2021-09-14 02:23:17',	NULL);

DROP TABLE IF EXISTS `stock_master`;
CREATE TABLE `stock_master` (
  `stock_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned NOT NULL,
  `bin_id` int(10) unsigned NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `assigned_user_id` int(10) unsigned NOT NULL,
  `assigned_weight_scale_id` int(10) unsigned NOT NULL,
  `assign_date` date NOT NULL,
  `batch_id` int(10) unsigned NOT NULL,
  `unit` int(5) unsigned NOT NULL,
  `gross_weight` int(10) unsigned NOT NULL,
  `bin_weight` int(10) unsigned NOT NULL,
  `net_weight` int(10) unsigned NOT NULL,
  `counted_quantity` int(10) unsigned NOT NULL,
  `remark` text NOT NULL,
  `provision1` varchar(30) NOT NULL,
  `provision2` varchar(30) NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stock_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `unit_master`;
CREATE TABLE `unit_master` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code_name` varchar(50) NOT NULL,
  `in_gram` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `unit_master` (`id`, `name`, `code_name`, `in_gram`) VALUES
(1,	'gram',	'Grm.',	1),
(2,	'Kilo Gram',	'Kg.',	1000),
(3,	'Ton',	'T.',	1000000);

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE `user_master` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_master` (`user_id`, `role`, `name`, `email`, `password`, `mobile`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1,	'1',	'admin',	'admin@gmail.com',	'3e7bf1383bcdd338f3d837f3dc948f80',	'8827667265',	1,	NULL,	NULL,	'2021-09-15 02:15:28',	NULL);

DROP TABLE IF EXISTS `weight_scale_master`;
CREATE TABLE `weight_scale_master` (
  `weight_scale_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`weight_scale_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


-- 2021-09-15 13:34:22
