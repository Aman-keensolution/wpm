-- Adminer 4.8.1 MySQL 5.5.5-10.4.13-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bin_master`;
CREATE TABLE `bin_master` (
  `bin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `bin_weight` int(10) unsigned NOT NULL,
  `unit_id` int(5) unsigned NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`bin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `bin_master` (`bin_id`, `name`, `plant_id`, `bin_weight`, `unit_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `category_master` (`cat_id`, `name`, `p_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1,	'Metal Products',	0,	1,	1,	'2021-09-10 10:17:42',	'2021-09-16 01:00:39',	1),
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
  `price` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `item_avg_weight` int(5) unsigned NOT NULL,
  `unit_id` int(5) unsigned NOT NULL,
  `batch_no` int(10) unsigned NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `manfactring_date` date NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO `item_master` (`item_id`, `item_no`, `price`, `name`, `cat_id`, `item_avg_weight`, `unit_id`, `batch_no`, `plant_id`, `manfactring_date`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1,	10001,	0,	'Hv Terminals (Tranformers)',	2,	1,	2,	1,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(2,	10002,	0,	'Chappe',	2,	20,	1,	2,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(3,	10003,	0,	'Cu Lugge/ Connectors',	2,	20,	1,	3,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(4,	10004,	0,	'Conduit bodies',	2,	20,	1,	4,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(5,	10005,	0,	'Service Entrance Heads',	2,	20,	1,	5,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(6,	10006,	0,	'UL/CSA certified',	2,	20,	1,	6,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(7,	10007,	0,	'100`s of parts & assemblies',	2,	20,	1,	7,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(8,	10008,	0,	'Vast array of available tool design',	2,	20,	1,	8,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(9,	10009,	0,	'Flow Valves',	3,	20,	1,	9,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(10,	10010,	0,	'Fittings For Fluid Circuits',	3,	20,	1,	10,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(11,	10011,	0,	'Air Vents',	3,	20,	1,	11,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(12,	10012,	0,	'Fixed Diaphragm Valves;',	3,	20,	1,	12,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(13,	10013,	0,	'Plugs;',	3,	20,	1,	13,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(14,	10014,	0,	'Drain Fittings;',	3,	20,	1,	14,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(15,	10015,	0,	'Primer Trap Assembly;',	3,	20,	1,	15,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(16,	10016,	0,	'ASME Valves;',	3,	20,	1,	16,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(17,	10017,	0,	'Diversified Alloys;',	3,	20,	1,	17,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(18,	10018,	0,	'Full range of fitting sizes;',	3,	20,	1,	18,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(19,	10019,	0,	'Custom engineered products;',	3,	20,	1,	19,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(20,	10020,	0,	'Pressure Reducing Valve;',	4,	20,	1,	20,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(21,	10021,	0,	'Seismic Data Storage Housing;',	4,	20,	1,	21,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(22,	10022,	0,	'Lamp Holders;',	4,	20,	1,	22,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(23,	10023,	0,	'Weighing Scale Housings;',	4,	20,	1,	23,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(24,	10024,	0,	'electronic product life and reliability;',	4,	20,	1,	24,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(25,	10025,	0,	'Tight tolerances;',	4,	20,	1,	25,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL),
(26,	10026,	0,	'Quick conversion from prototype to production',	4,	20,	1,	26,	2,	'2021-09-14',	1,	NULL,	'2021-09-14 06:40:09',	'2021-09-14 06:40:09',	NULL);

DROP TABLE IF EXISTS `plant_master`;
CREATE TABLE `plant_master` (
  `plant_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `short_code` varchar(10) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `location_short_code` varchar(5) DEFAULT NULL,
  `plant_address` varchar(200) NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`plant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `plant_master` (`plant_id`, `name`, `short_code`, `location`, `location_short_code`, `plant_address`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2,	'plant1',	'p1',	'loc1',	'l1',	'dhan trident 202',	1,	NULL,	'2021-09-14 01:39:26',	'2021-09-14 06:06:58',	NULL),
(3,	'plant2',	'p2',	'loc2',	'l2',	'dhan trident',	1,	NULL,	'2021-09-14 01:41:54',	'2021-09-14 02:23:04',	NULL),
(4,	'plant3',	'p3',	'loc3',	'l3',	'dhan trident',	1,	NULL,	'2021-09-14 01:42:17',	'2021-09-14 02:23:17',	NULL);

DROP TABLE IF EXISTS `stock_master`;
CREATE TABLE `stock_master` (
  `stock_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned NOT NULL,
  `bin_id` int(10) unsigned NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `weight_scale_id` int(10) unsigned NOT NULL,
  `assign_date` date NOT NULL,
  `batch_id` int(10) unsigned DEFAULT NULL,
  `unit_id` int(5) unsigned NOT NULL,
  `gross_weight` int(10) unsigned NOT NULL,
  `bin_weight` int(10) unsigned NOT NULL,
  `net_weight` int(10) unsigned NOT NULL,
  `counted_quantity` int(10) unsigned NOT NULL,
  `remark` text DEFAULT NULL,
  `provision1` varchar(30) DEFAULT NULL,
  `provision2` varchar(30) DEFAULT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `stock_master` (`stock_id`, `item_id`, `bin_id`, `plant_id`, `user_id`, `weight_scale_id`, `assign_date`, `batch_id`, `unit_id`, `gross_weight`, `bin_weight`, `net_weight`, `counted_quantity`, `remark`, `provision1`, `provision2`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2,	1,	2,	2,	2,	2,	'2021-09-16',	1234567,	2,	165,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-16 05:21:25',	NULL,	'2021-09-19 05:21:20'),
(4,	21,	4,	3,	2,	2,	'2021-09-18',	12232,	2,	2000,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-18 13:45:38',	NULL,	'2021-09-18 13:45:38'),
(5,	4,	2,	3,	2,	2,	'2021-09-18',	1209,	2,	1200,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-18 14:06:31',	NULL,	'2021-09-18 14:06:31'),
(6,	12,	2,	3,	2,	2,	'2021-09-18',	NULL,	2,	2005,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-18 14:09:25',	NULL,	'2021-09-18 14:09:25'),
(7,	4,	2,	3,	2,	2,	'2021-09-18',	1209,	2,	2005,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-18 14:10:16',	NULL,	'2021-09-18 14:10:16'),
(8,	4,	2,	3,	2,	2,	'2021-09-18',	1209,	2,	2005,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-18 14:10:44',	NULL,	'2021-09-18 14:10:44'),
(9,	3,	2,	3,	2,	2,	'2021-09-18',	1209,	2,	105,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-18 14:17:25',	NULL,	'2021-09-18 14:17:25'),
(10,	4,	2,	3,	2,	2,	'2021-09-18',	2001,	2,	500,	50,	100,	132,	'1',	'1',	'1',	1,	NULL,	'2021-09-18 14:17:48',	NULL,	'2021-09-18 14:17:48');

DROP TABLE IF EXISTS `unit_master`;
CREATE TABLE `unit_master` (
  `unit_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code_name` varchar(50) NOT NULL,
  `in_gram` int(11) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `unit_master` (`unit_id`, `name`, `code_name`, `in_gram`) VALUES
(1,	'Gram',	'Gm.',	1),
(2,	'Kilo Gram',	'Kg.',	1000),
(3,	'Ton',	'T.',	1000000);

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE `user_master` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_verify` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_master` (`user_id`, `role`, `name`, `email`, `password`, `email_verify`, `mobile`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1,	'1',	'admin',	'admin@gmail.com',	'3e7bf1383bcdd338f3d837f3dc948f80',	NULL,	'8827667265',	1,	NULL,	NULL,	'2021-09-15 02:15:28',	NULL),
(2,	'2',	'user',	'user@gmail.com',	'a18cd028b52741c748c0129b201ae159',	NULL,	'8827667265',	1,	NULL,	NULL,	'2021-09-18 10:19:29',	NULL);

DROP TABLE IF EXISTS `weight_scale_master`;
CREATE TABLE `weight_scale_master` (
  `weight_scale_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `short_code` varchar(10) DEFAULT NULL,
  `weight_scale_no` varchar(100) NOT NULL,
  `capicity` decimal(8,2) DEFAULT NULL,
  `unit_id` int(5) DEFAULT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_active` tinyint(3) unsigned DEFAULT 1 COMMENT '1=active',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`weight_scale_id`),
  KEY `unit_id` (`unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `weight_scale_master` (`weight_scale_id`, `name`, `short_code`, `weight_scale_no`, `capicity`, `unit_id`, `plant_id`, `user_id`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2,	'new weighing',	'ws1',	'123456',	NULL,	NULL,	2,	2,	1,	NULL,	'2021-09-16 05:18:00',	'2021-09-16 05:18:00',	NULL);

-- 2021-09-19 16:30:04
