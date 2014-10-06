-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2014 at 02:19 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leaves`
--
CREATE DATABASE IF NOT EXISTS `leaves` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `leaves`;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`),
  KEY `idx_acos_model_foreign_key` (`model`,`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
  (1, NULL, '', NULL, 'controllers', 1, 114),
  (2, 1, NULL, NULL, 'Groups', 2, 13),
  (3, 2, NULL, NULL, 'index', 3, 4),
  (4, 2, NULL, NULL, 'view', 5, 6),
  (5, 2, NULL, NULL, 'add', 7, 8),
  (6, 2, NULL, NULL, 'edit', 9, 10),
  (7, 2, NULL, NULL, 'delete', 11, 12),
  (8, 1, NULL, NULL, 'Holidays', 14, 25),
  (9, 8, NULL, NULL, 'index', 15, 16),
  (10, 8, NULL, NULL, 'view', 17, 18),
  (11, 8, NULL, NULL, 'add', 19, 20),
  (12, 8, NULL, NULL, 'edit', 21, 22),
  (13, 8, NULL, NULL, 'delete', 23, 24),
  (14, 1, NULL, NULL, 'LeaveRules', 26, 37),
  (15, 14, NULL, NULL, 'index', 27, 28),
  (16, 14, NULL, NULL, 'view', 29, 30),
  (17, 14, NULL, NULL, 'add', 31, 32),
  (18, 14, NULL, NULL, 'edit', 33, 34),
  (19, 14, NULL, NULL, 'delete', 35, 36),
  (20, 1, NULL, NULL, 'LeaveTypes', 38, 49),
  (21, 20, NULL, NULL, 'index', 39, 40),
  (22, 20, NULL, NULL, 'view', 41, 42),
  (23, 20, NULL, NULL, 'add', 43, 44),
  (24, 20, NULL, NULL, 'edit', 45, 46),
  (25, 20, NULL, NULL, 'delete', 47, 48),
  (26, 1, NULL, NULL, 'Leaves', 50, 63),
  (27, 26, NULL, NULL, 'index', 51, 52),
  (28, 26, NULL, NULL, 'view', 53, 54),
  (29, 26, NULL, NULL, 'add', 55, 56),
  (30, 26, NULL, NULL, 'edit', 57, 58),
  (31, 26, NULL, NULL, 'delete', 59, 60),
  (32, 1, NULL, NULL, 'Pages', 64, 67),
  (33, 32, NULL, NULL, 'display', 65, 66),
  (34, 1, NULL, NULL, 'Rules', 68, 79),
  (35, 34, NULL, NULL, 'index', 69, 70),
  (36, 34, NULL, NULL, 'view', 71, 72),
  (40, 1, NULL, NULL, 'Users', 80, 95),
  (41, 40, NULL, NULL, 'login', 81, 82),
  (42, 40, NULL, NULL, 'logout', 83, 84),
  (43, 40, NULL, NULL, 'index', 85, 86),
  (44, 40, NULL, NULL, 'view', 87, 88),
  (45, 40, NULL, NULL, 'add', 89, 90),
  (46, 40, NULL, NULL, 'edit', 91, 92),
  (47, 40, NULL, NULL, 'delete', 93, 94),
  (49, 1, NULL, NULL, 'AclManager', 98, 113),
  (50, 49, NULL, NULL, 'Acl', 99, 112),
  (51, 50, NULL, NULL, 'drop', 100, 101),
  (52, 50, NULL, NULL, 'drop_perms', 102, 103),
  (53, 50, NULL, NULL, 'index', 104, 105),
  (54, 50, NULL, NULL, 'permissions', 106, 107),
  (55, 50, NULL, NULL, 'update_acos', 108, 109),
  (56, 50, NULL, NULL, 'update_aros', 110, 111),
  (57, NULL, '', NULL, 'controllers', 115, 122),
  (58, 57, NULL, NULL, 'TwitterBootstrap', 116, 121),
  (59, 58, NULL, NULL, 'TwitterBootstrap', 117, 120),
  (60, 59, NULL, NULL, 'index', 118, 119),
  (61, 26, '', NULL, 'check_leave', 61, 62);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`),
  KEY `idx_aros_model_foreign_key` (`model`,`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
  (1, NULL, 'Group', 1, '', 1, 4),
  (2, NULL, 'Group', 2, '', 5, 30),
  (3, 1, 'User', 1, '', 2, 3),
  (4, 2, 'User', 2, '', 6, 7),
  (5, 2, 'User', 3, '', 8, 9),
  (6, 2, 'User', 4, '', 10, 11),
  (7, 2, 'User', 5, '', 12, 13),
  (8, 2, 'User', 6, '', 14, 15),
  (9, 2, 'User', 7, '', 16, 17),
  (10, 2, 'User', 8, '', 18, 19),
  (11, 2, 'User', 9, '', 20, 21),
  (12, 2, 'User', 10, '', 22, 23),
  (13, 2, 'User', 11, '', 24, 25),
  (14, 2, 'User', 12, '', 26, 27),
  (15, 2, 'User', 13, '', 28, 29);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_read` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_update` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_delete` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_aros_acos_aro_id_aco_id` (`aro_id`,`aco_id`),
  KEY `aco_id` (`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=121 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
  (1, 1, 57, '1', '1', '1', '1'),
  (2, 2, 57, '1', '1', '1', '1'),
  (3, 1, 2, '1', '1', '1', '1'),
  (4, 2, 2, '-1', '-1', '-1', '-1'),
  (5, 1, 3, '1', '1', '1', '1'),
  (6, 2, 3, '-1', '-1', '-1', '-1'),
  (7, 1, 4, '1', '1', '1', '1'),
  (8, 2, 4, '-1', '-1', '-1', '-1'),
  (9, 1, 5, '1', '1', '1', '1'),
  (10, 2, 5, '-1', '-1', '-1', '-1'),
  (11, 1, 6, '1', '1', '1', '1'),
  (12, 2, 6, '-1', '-1', '-1', '-1'),
  (13, 1, 7, '1', '1', '1', '1'),
  (14, 2, 7, '-1', '-1', '-1', '-1'),
  (15, 1, 8, '1', '1', '1', '1'),
  (16, 2, 8, '1', '1', '1', '1'),
  (17, 1, 9, '0', '0', '0', '0'),
  (18, 2, 9, '0', '0', '0', '0'),
  (19, 1, 10, '0', '0', '0', '0'),
  (20, 2, 10, '0', '0', '0', '0'),
  (21, 1, 11, '0', '0', '0', '0'),
  (22, 2, 11, '-1', '-1', '-1', '-1'),
  (23, 1, 12, '0', '0', '0', '0'),
  (24, 2, 12, '-1', '-1', '-1', '-1'),
  (25, 1, 13, '0', '0', '0', '0'),
  (26, 2, 13, '-1', '-1', '-1', '-1'),
  (27, 1, 14, '1', '1', '1', '1'),
  (28, 2, 14, '-1', '-1', '-1', '-1'),
  (29, 1, 15, '0', '0', '0', '0'),
  (30, 2, 15, '-1', '-1', '-1', '-1'),
  (31, 1, 16, '0', '0', '0', '0'),
  (32, 2, 16, '-1', '-1', '-1', '-1'),
  (33, 1, 17, '0', '0', '0', '0'),
  (34, 2, 17, '-1', '-1', '-1', '-1'),
  (35, 1, 18, '0', '0', '0', '0'),
  (36, 2, 18, '-1', '-1', '-1', '-1'),
  (37, 1, 19, '0', '0', '0', '0'),
  (38, 2, 19, '-1', '-1', '-1', '-1'),
  (39, 1, 20, '1', '1', '1', '1'),
  (40, 2, 20, '1', '1', '1', '1'),
  (41, 1, 21, '0', '0', '0', '0'),
  (42, 2, 21, '0', '0', '0', '0'),
  (43, 1, 22, '0', '0', '0', '0'),
  (44, 2, 22, '0', '0', '0', '0'),
  (45, 1, 23, '0', '0', '0', '0'),
  (46, 2, 23, '-1', '-1', '-1', '-1'),
  (47, 1, 24, '0', '0', '0', '0'),
  (48, 2, 24, '-1', '-1', '-1', '-1'),
  (49, 1, 25, '0', '0', '0', '0'),
  (50, 2, 25, '-1', '-1', '-1', '-1'),
  (51, 1, 26, '1', '1', '1', '1'),
  (52, 2, 26, '1', '1', '1', '1'),
  (53, 1, 27, '0', '0', '0', '0'),
  (54, 2, 27, '0', '0', '0', '0'),
  (55, 1, 28, '0', '0', '0', '0'),
  (56, 2, 28, '0', '0', '0', '0'),
  (57, 1, 29, '0', '0', '0', '0'),
  (58, 2, 29, '0', '0', '0', '0'),
  (59, 1, 30, '0', '0', '0', '0'),
  (60, 2, 30, '0', '0', '0', '0'),
  (61, 1, 31, '0', '0', '0', '0'),
  (62, 2, 31, '-1', '-1', '-1', '-1'),
  (63, 1, 32, '1', '1', '1', '1'),
  (64, 2, 32, '-1', '-1', '-1', '-1'),
  (65, 1, 33, '0', '0', '0', '0'),
  (66, 2, 33, '-1', '-1', '-1', '-1'),
  (67, 1, 34, '1', '1', '1', '1'),
  (68, 2, 34, '-1', '-1', '-1', '-1'),
  (69, 1, 35, '0', '0', '0', '0'),
  (70, 2, 35, '-1', '-1', '-1', '-1'),
  (71, 1, 36, '0', '0', '0', '0'),
  (72, 2, 36, '-1', '-1', '-1', '-1'),
  (79, 1, 40, '1', '1', '1', '1'),
  (80, 2, 40, '1', '1', '1', '1'),
  (81, 1, 41, '0', '0', '0', '0'),
  (82, 2, 41, '0', '0', '0', '0'),
  (83, 1, 42, '0', '0', '0', '0'),
  (84, 2, 42, '0', '0', '0', '0'),
  (85, 1, 43, '0', '0', '0', '0'),
  (86, 2, 43, '0', '0', '0', '0'),
  (87, 1, 44, '0', '0', '0', '0'),
  (88, 2, 44, '0', '0', '0', '0'),
  (89, 1, 45, '0', '0', '0', '0'),
  (90, 2, 45, '-1', '-1', '-1', '-1'),
  (91, 1, 46, '0', '0', '0', '0'),
  (92, 2, 46, '1', '1', '1', '1'),
  (93, 1, 47, '0', '0', '0', '0'),
  (94, 2, 47, '-1', '-1', '-1', '-1'),
  (97, 1, 49, '1', '1', '1', '1'),
  (98, 2, 49, '-1', '-1', '-1', '-1'),
  (99, 1, 50, '0', '0', '0', '0'),
  (100, 2, 50, '0', '0', '0', '0'),
  (101, 1, 51, '0', '0', '0', '0'),
  (102, 2, 51, '0', '0', '0', '0'),
  (103, 1, 52, '0', '0', '0', '0'),
  (104, 2, 52, '0', '0', '0', '0'),
  (105, 1, 53, '0', '0', '0', '0'),
  (106, 2, 53, '0', '0', '0', '0'),
  (107, 1, 54, '0', '0', '0', '0'),
  (108, 2, 54, '0', '0', '0', '0'),
  (109, 1, 55, '0', '0', '0', '0'),
  (110, 2, 55, '0', '0', '0', '0'),
  (111, 1, 56, '0', '0', '0', '0'),
  (112, 2, 56, '0', '0', '0', '0'),
  (113, 1, 58, '1', '1', '1', '1'),
  (114, 2, 58, '1', '1', '1', '1'),
  (115, 1, 59, '0', '0', '0', '0'),
  (116, 2, 59, '0', '0', '0', '0'),
  (117, 1, 60, '0', '0', '0', '0'),
  (118, 2, 60, '0', '0', '0', '0'),
  (119, 1, 61, '0', '0', '0', '0'),
  (120, 2, 61, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
  (1, 'Admin', NOW(), NOW()),
  (2, 'User', NOW(), NOW());

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `leave_type_id` int(10) unsigned NOT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `pending` tinyint(4) DEFAULT '1',
  `approved` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leaves_users_idx` (`user_id`),
  KEY `leaves_leave_types_idx` (`leave_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_rules`
--

CREATE TABLE IF NOT EXISTS `leave_rules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leave_type_id` int(10) unsigned NOT NULL,
  `rule_id` int(10) unsigned NOT NULL,
  `yn_condition` tinyint(4) NOT NULL,
  `num_condition` int(10) DEFAULT NULL,
  `my_condition` enum('Month','Year') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leave_rules_leave_types_idx` (`leave_type_id`),
  KEY `leave_rules_rules_idx` (`rule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `name`, `note`, `created`, `modified`) VALUES
  (1, 'Require end (Y/N)', 'Is end date field required?', NOW(), NOW()),
  (2, 'Auto approve (Y/N)', 'If Y, Leave request is automatically approved upon creation.', NOW(), NOW()),
  (3, 'Paid (Y/N)', 'Is Leave paid?', NOW(), NOW()),
  (4, 'Days allowed in month/year per user (number of days, month/year)', 'Has two options: 1. number of days, 2. period of time which can be month or year.', NOW(), NOW()),
  (5, 'Exclude holidays (Y/N)', 'If Y, days of holiday should be subtracted from number of days.', NOW(), NOW()),
  (6, 'Must be booked in advance (number of days)', 'User will not be able to request Leave less than specified number of days before it starts.', NOW(), NOW()),
  (7, 'Maximum users allowed at the same time (number of users)', 'How many users can take Leave at the same time?', NOW(), NOW());

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_groups_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `created`, `modified`) VALUES
  (1, 1, 'aleksandardjordjevic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (2, 2, 'milosteodosic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (3, 2, 'markosimonovic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (4, 2, 'stefanjovic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (5, 2, 'bogdanbogdanovic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (6, 2, 'nemanjabjelica', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (7, 2, 'stefanmarkovic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (8, 2, 'nikolakalinic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (9, 2, 'stefanbircevic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (10, 2, 'nenadkrstic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (11, 2, 'miroslavraduljica', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (12, 2, 'raskokatic', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW()),
  (13, 2, 'vladimirstimac', 'bb21cefa46121ac1e7f53e40300f310c536a9666', NOW(), NOW());

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aros_acos`
--
ALTER TABLE `aros_acos`
ADD CONSTRAINT `aros_acos_ibfk_1` FOREIGN KEY (`aro_id`) REFERENCES `aros` (`id`),
ADD CONSTRAINT `aros_acos_ibfk_2` FOREIGN KEY (`aco_id`) REFERENCES `acos` (`id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
ADD CONSTRAINT `leaves_leave_types` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `leaves_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `leave_rules`
--
ALTER TABLE `leave_rules`
ADD CONSTRAINT `leave_rules_leave_types` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `leave_rules_rules` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;