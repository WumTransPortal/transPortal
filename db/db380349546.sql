/*
 Navicat Premium Data Transfer

 Source Server         : dk1 - dxlab
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost
 Source Database       : db380349546

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : utf-8

 Date: 11/06/2013 12:50:21 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`) COMMENT '(null)'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'admin', '{\"is_admin\":1}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', 'standard', '{\"is_admin\":0}', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `files` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `projects`
-- ----------------------------
BEGIN;
INSERT INTO `projects` VALUES ('3', '6', 'Mein Schiff', '<p>\r\n	 Here you can seen a photo of the vessel called \"Mein Schiff 2\".\r\n</p>', '/uploads/projects/3/images/137070166751b33f637a79f.png', '2013-06-08 14:27:47', '2013-06-13 08:27:03'), ('4', '10', 'Franziskaner', '<p>\r\n	 Gallia est <strong>omnis</strong> devisa in partes tres...\r\n</p>', '/uploads/projects/4/images/1375810756520134c45f317.jpg', '2013-08-06 17:39:16', '2013-08-26 11:33:55');
COMMIT;

-- ----------------------------
--  Table structure for `throttle`
-- ----------------------------
DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(4) NOT NULL DEFAULT '0',
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `throttle`
-- ----------------------------
BEGIN;
INSERT INTO `throttle` VALUES ('1', '6', '87.151.152.6', '0', '0', '0', null, null, null), ('2', '7', '87.151.152.6', '0', '0', '0', null, null, null), ('3', '6', '134.102.118.93', '0', '0', '0', null, null, null), ('4', '6', '134.102.114.218', '0', '0', '0', null, null, null), ('5', '6', '134.102.117.235', '0', '0', '0', null, null, null), ('6', '6', '87.151.150.239', '0', '0', '0', null, null, null), ('7', '8', '134.102.113.187', '0', '0', '0', null, null, null), ('8', '9', '77.22.222.57', '0', '0', '0', null, null, null), ('9', '6', '87.145.113.50', '0', '0', '0', null, null, null), ('10', '6', '134.102.118.83', '0', '0', '0', null, null, null), ('11', '9', '77.20.31.150', '0', '0', '0', null, null, null), ('12', '6', '87.151.153.192', '0', '0', '0', null, null, null), ('13', '9', '77.20.30.10', '0', '0', '0', null, null, null), ('14', '6', '87.151.145.203', '0', '0', '0', null, null, null), ('15', '6', '87.151.153.189', '0', '0', '0', null, null, null), ('16', '9', '134.102.118.61', '0', '0', '0', null, null, null), ('17', '6', '87.151.155.85', '0', '0', '0', null, null, null), ('18', '6', '134.102.117.45', '0', '0', '0', null, null, null), ('19', '6', '134.102.116.65', '0', '0', '0', null, null, null), ('20', '6', '87.145.116.84', '0', '0', '0', null, null, null), ('21', '6', '134.102.202.249', '0', '0', '0', null, null, null), ('22', '6', '87.145.116.30', '0', '0', '0', null, null, null), ('23', '6', '134.102.118.196', '0', '0', '0', null, null, null), ('24', '6', '134.102.112.207', '0', '0', '0', null, null, null), ('25', '9', '24.134.186.192', '0', '0', '0', null, null, null), ('26', '12', '80.228.246.172', '0', '0', '0', null, null, null), ('27', '10', '80.187.100.69', '0', '0', '0', null, null, null), ('28', '6', '79.201.55.181', '0', '0', '0', null, null, null), ('29', '6', '87.151.148.55', '0', '0', '0', null, null, null), ('30', '10', '87.151.148.55', '3', '0', '0', '2013-08-17 21:24:26', null, null), ('31', '6', '87.151.144.221', '0', '0', '0', null, null, null), ('32', '6', '134.102.112.253', '0', '0', '0', null, null, null), ('33', '6', '134.102.114.104', '0', '0', '0', null, null, null), ('34', '14', '134.102.202.250', '0', '0', '0', null, null, null), ('35', '6', '134.102.114.57', '0', '0', '0', null, null, null), ('36', '12', '77.183.119.130', '0', '0', '0', null, null, null), ('37', '15', '134.102.117.164', '0', '0', '0', null, null, null), ('38', '9', '24.134.186.150', '1', '0', '0', '2013-09-20 21:18:43', null, null), ('39', '16', '217.239.6.13', '0', '0', '0', null, null, null), ('40', '6', '134.102.116.129', '0', '0', '0', null, null, null), ('41', '8', '95.33.103.39', '2', '0', '0', '2013-10-29 22:32:40', null, null), ('42', '15', '134.102.119.41', '0', '0', '0', null, null, null), ('43', '6', '134.102.115.244', '0', '0', '0', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `tutorials`
-- ----------------------------
DROP TABLE IF EXISTS `tutorials`;
CREATE TABLE `tutorials` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `tutorials`
-- ----------------------------
BEGIN;
INSERT INTO `tutorials` VALUES ('39', '6', 'How to use the Epilog Laser-cutter', 'In this tutorial you will learn how to turn the laser cutter on and off as well as to focus the laser. This tutorial is the first part of an ongoing series.', '<h2>Safety Instructions</h2>\r\n<p>\r\n	 <strong>Please read these instructions carefully</strong> and follow them as explained. This will guarantee that your products look and feel great and also prevent the machines from damage.\r\n</p>\r\n<p>\r\n	               If you encounter a problem with the machines, <strong>do not try to fix it yourself</strong>, please get in contact with one of our lab managers.\r\n</p>\r\n<p>\r\n	 <strong>Do not leave the laser-cutter unattended! </strong>\r\n</p>\r\n<p>\r\n	    Open the lid immediately, if the laser-cutter does not do what it should.\r\n</p>\r\n<h2> How to power on the laser-cutter? </h2>\r\n<h3>1. Turn the power switch on</h3>\r\n<ul>\r\n	<li>Turn the power switch on</li>\r\n</ul>\r\n<p>\r\n	<img src=\"/uploads/tutorials/39/images/137104861151b88aa3850ef.png\">\r\n</p>\r\n<h3>2. Activate the filter system by using the remote control</h3>\r\n<ul>\r\n	<li>Press the key labelled \"On\".</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104872151b88b118b3b7.png\">\r\n</p>\r\n<h3>3. Activate the compressor by using the remote control</h3>\r\n<ul>\r\n	<li>Navigate with the arrow-keys (up/down) to section ”switch module“.</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104877151b88b434156d.png\">\r\n</p>\r\n<ul>\r\n	<li>Press the plus key (+) to set the value to ”yes“.</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104880051b88b6055003.png\">\r\n</p>\r\n<ul>\r\n	<li>Confirm by pressing the return key.</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104880951b88b6927015.png\">\r\n</p>\r\n<h2>How to power off the laser-cutter?</h2>\r\n<h3>1. Deactivate the compressor by using the remote control</h3>\r\n<ul>\r\n	<li>Navigate with the arrow-keys (up/down) to section ”switch module“.</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104885851b88b9a43942.png\">\r\n</p>\r\n<ul>\r\n	<li>Press the plus key (-) to set the value to ”no“.</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104887051b88ba60760d.png\">\r\n</p>\r\n<ul>\r\n	<li>Confirm by pressing the return key.</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104889151b88bbb06e97.png\">\r\n</p>\r\n<h3>2. Deactivate the filter system by using the remote control</h3>\r\n<ul>\r\n	<li>Press the key labelled \"Off\".</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104893151b88be352552.png\">\r\n</p>\r\n<h3>3. Turn the power switch off</h3>\r\n<ul>\r\n	<li>Turn the power switch off</li>\r\n</ul>\r\n<p>\r\n	 <img src=\"/uploads/tutorials/39/images/137104896451b88c04d1446.png\">\r\n</p>\r\n<ul>\r\n	<li><strong>Put the remote control back into its holder!</strong></li>\r\n</ul>', '2013-06-05 11:25:44', '2013-06-12 23:15:21'), ('41', '6', 'dfd,fjhdfkjdhfjkd', 'dkjhfkjfhdkjfhdkj fdkjfd kjfdhkjfhd kfjhdjkfdhj kfdhfjk df jkd hf kjdhjk dfhjkdfd kjfh jk', '<h2>De bello gallico</h2>\r\n<p>\r\n	Gallia est omnis devisa in partes tres..\r\n</p>\r\n<p>\r\n	sdsds.\r\n</p>', '2013-10-29 10:23:25', '2013-10-29 10:23:25');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) COMMENT '(null)'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('6', 'dennis', 'dennis@krannich.de', '$2y$10$bypT0omBnHP5HN9eXnjTTua25CdAYgxLljnFtCUcFk.Mn2BiD61gG', null, '1', null, '2013-06-04 19:55:21', '2013-11-06 11:15:23', '$2y$10$pUUf1Wx1KDTGm.1dkUu9Oe93nFTc3j5VrbdQDc7D02yQmna7gUVqi', null, 'Dr.-Ing.', 'Dennis', 'Krannich', '', null, null, null, '2013-06-04 19:50:40', '2013-11-06 11:15:23'), ('7', 'user', 'dkrannich@me.com', '$2y$10$QOP9.1NwybXwVqLarlbSGOXWwRJJPAxmwL3jdcVjvA4ypOOAYIU8K', null, '1', null, '2013-06-04 21:58:10', '2013-06-04 21:58:24', '$2y$10$es332qif8PLIoJtO5u23bO9ImhvcqoPiPs1PxKAbGG0e.IW/hIN3y', null, null, 'Demo', 'User', '', null, null, null, '2013-06-04 21:57:57', '2013-06-04 21:58:24'), ('8', 'saiman', 'simonengelbertz@gmail.com', '$2y$10$eLXl561cfCUs2OjaT9.suOp8j5XWYq9tD6hbV/173cVr0F/3NcfFm', null, '1', null, '2013-06-06 12:39:55', '2013-06-06 12:40:40', '$2y$10$OtV6GtAdfXb4vQw1MKZVNuqjYH312x56He/oV9rDCrAKEiHAyyjzO', 'BQQBUWitmUPqgsnc3WNtYYPuCZhe46GZxp1GDhW6hW', null, 'Simon', 'Engelbertz', '', null, null, null, '2013-06-06 12:39:40', '2013-10-29 22:31:50'), ('9', 'Jenni', 'boldti@tzi.de', '$2y$10$5FysHknnEGjZ1RZ2jhY47..wGkGIpqDU6GQmxf.bjP8MG.Xh7MSGu', null, '1', null, '2013-06-06 12:41:58', '2013-06-13 21:45:27', '$2y$10$zMJVJYZWSzBH696rNwR7f.BPwsOq91oEgTXCRaa1Z81ZOKfrqtFt.', null, null, 'Jennifer', 'Boldt', '', null, null, null, '2013-06-06 12:41:30', '2013-06-13 21:45:27'), ('10', 'krannich', 'krannich@tzi.de', '$2y$10$ggNnumVzTYBijR8dIM55PeN871K07yjAzqaneDpzwcROcBbsqrqx.', null, '1', null, '2013-06-08 12:59:06', '2013-08-06 17:37:02', '$2y$10$jAec1/ypCGaRAwSgdcs.5eazizzwnsrC8tSbjYCy/Iawb/IMQ1Qoi', null, 'Dr.', 'Dennis', 'Krannich', '', '', '', '', '2013-06-08 12:52:17', '2013-08-06 17:37:02'), ('11', 'krannich2', 'simpletunes@me.com', '$2y$10$xGKHh.P7ioWuH/LZ5qPC7OxVwmuk4pnGcojEiPvpQ4gv5mkfcAJpW', null, '1', null, '2013-06-08 13:02:55', null, null, null, 'Dr.', 'Dennis', 'Krannich', '', '', '', '', '2013-06-08 12:55:35', '2013-06-08 13:02:55'), ('12', 'carel', 'carel@tzi.de', '$2y$10$0i6h1ju4J/STvi62osm9K.beie57CKM3xvHTfV30sw/2cm5A0JPSe', null, '1', null, '2013-08-01 11:50:16', '2013-09-10 17:00:36', '$2y$10$6P/GAy5duuV0kOyuUA4PXOMsZvHNq3rMA04JDcbJzpTxQQvLtWmku', null, '', 'Carel', 'Nantcho', '', '', '', '', '2013-08-01 08:34:32', '2013-09-10 17:00:36'), ('13', 'horst', 'dennisk@uni-bremen.de', '$2y$10$SVbzVz6xTekb1UbzgqyG/.7PT9omDGcYiJKKs9c.cAnoJhSh0kdDa', null, '0', 'DNpYXT8XCEP33SofRDAWYqIAZ7W5gv2r4QQjGm9CYS', null, null, null, null, '', 'hdhshsdh', 'hshdshhd', '', '', '', '', '2013-08-17 21:33:15', '2013-08-17 21:33:15'), ('14', 'Schnippschnapp', 'wilske@tzi.de', '$2y$10$pSEcSNyrY9C31WSX5JCzhu05WLD3xGQG6Kw3NJgsNM/llVC5LMaV2', null, '1', null, '2013-08-30 11:37:59', '2013-08-30 11:38:20', '$2y$10$6ZW75m1MJSvuK7taEQjWKu5DAZsYBYmVZpcmkiaetrCEQ9QoJtRaO', null, '', 'Sabrina', 'Wilske', 'Uni Bremen', '', '', '', '2013-08-30 11:36:15', '2013-08-30 11:38:20'), ('15', 'Evak', 'evak@tzi.de', '$2y$10$Z6qxMfRHNfk7dejwr9NsdOShC8P5/UmEba9qx6h/uakIEC7/vD4ZW', null, '1', null, '2013-09-20 10:20:04', '2013-11-05 13:32:11', '$2y$10$F6wfBml391qcR3q1udCyv.c7Jb2Rghb5tXIRhYvK5hQJLqKncwbPK', null, '', 'Eva', 'Katterfeldt', '', '', '', '', '2013-09-20 10:18:29', '2013-11-05 13:32:11'), ('16', 'Fluetke ', 'Fluetke@tzi.de', '$2y$10$2R94ZDRLp1E5iyn43uyF7OSzK99IqFiKUQl5KM8D5z4UdtEE8/wO6', null, '1', null, '2013-09-27 19:24:28', '2013-09-28 11:27:59', '$2y$10$.PNI539hRR02Ss6K5HEDeeWieQMA7gu/gP12kdLu40wjarDz2VcDe', null, '', 'Florian', 'Lütkebohmert', '', '', '', '', '2013-09-27 08:20:06', '2013-09-28 11:27:59');
COMMIT;

-- ----------------------------
--  Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `users_groups`
-- ----------------------------
BEGIN;
INSERT INTO `users_groups` VALUES ('1', '6', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
