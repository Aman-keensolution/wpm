CREATE TABLE IF NOT EXISTS `item_master` (
item_id  int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
item_no int(10) UNSIGNED NOT NULL,
item_name varchar(100) NOT NULL,
cat_id int(10) UNSIGNED NOT NULL,
item_avg_weight int(5) UNSIGNED NOT NULL,
batch_no int(10) UNSIGNED NOT NULL,
Plant_id int(10) UNSIGNED NOT NULL,
manfactring_date date NOT NULL,
is_active tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
created_by int(10) UNSIGNED DEFAULT NULL,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL,
updated_by int(10) UNSIGNED DEFAULT NULL, PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `category_master` (
cat_id  int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
p_id  int(10) UNSIGNED NOT NULL,
is_active tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
created_by int(10) UNSIGNED DEFAULT NULL,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL,
updated_by int(10) UNSIGNED DEFAULT NULL, PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `plant_master` (
plant_id  int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
plant_address varchar(200) NOT NULL,
is_active tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
created_by int(10) UNSIGNED DEFAULT NULL,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL,
updated_by int(10) UNSIGNED DEFAULT NULL, PRIMARY KEY (`plant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bin_master` (
bin_id  int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
plant_id  int(10) UNSIGNED NOT NULL,
bin_weight  int(10) UNSIGNED NOT NULL,
is_active tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
created_by int(10) UNSIGNED DEFAULT NULL,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL,
updated_by int(10) UNSIGNED DEFAULT NULL, PRIMARY KEY (`bin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `weight_scale_master` (
weight_scale_id  int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
plant_id  int(10) UNSIGNED NOT NULL,
user_id  int(10) UNSIGNED NOT NULL,
is_active tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
created_by int(10) UNSIGNED DEFAULT NULL,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL,
updated_by int(10) UNSIGNED DEFAULT NULL, PRIMARY KEY (`weight_scale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `user_master` (
user_id  int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
role varchar(100) NOT NULL,
name varchar(100) NOT NULL,
email varchar(100) NOT NULL,
password varchar(100) NOT NULL,
mobile varchar(100) NOT NULL,
is_active tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
created_by int(10) UNSIGNED DEFAULT NULL,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL,
updated_by int(10) UNSIGNED DEFAULT NULL, PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `stock_master` (
stock_Id  int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
item_id  int(10) UNSIGNED NOT NULL,
bin_id  int(10) UNSIGNED NOT NULL,
plant_id  int(10) UNSIGNED NOT NULL,
assigned_user_id  int(10) UNSIGNED NOT NULL,
assigned_weight_scale_id  int(10) UNSIGNED NOT NULL,
assign_date date NOT NULL,
batch_id  int(10) UNSIGNED NOT NULL,
total_weight   int(10) UNSIGNED NOT NULL,
net_weight   int(10) UNSIGNED NOT NULL,
bin_weight   int(10) UNSIGNED NOT NULL,
counted_quantity  int(10) UNSIGNED NOT NULL,
is_active tinyint(3) UNSIGNED DEFAULT 1 COMMENT '1=active',
created_by int(10) UNSIGNED DEFAULT NULL,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL,
updated_by int(10) UNSIGNED DEFAULT NULL, PRIMARY KEY (`stock_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


INSERT INTO `user_master` (`user_id`, `role`, `name`, `email`, `password`, `mobile`, `is_active`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8827667265', NULL, NULL, NULL, NULL, NULL);
COMMIT;