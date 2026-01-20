# ************************************************************
# Sequel Ace SQL dump
# 版本号： 20095
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# 主机: ubuntu.orb.local (MySQL 8.0.43-0ubuntu0.24.04.2)
# 数据库: yideli
# 生成时间: 2026-01-20 14:10:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# 转储表 cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;

INSERT INTO `cache` (`key`, `value`, `expiration`)
VALUES
	('-cache-356a192b7913b04c54574d18c28d46e6395428ab','i:2;',1768727953),
	('-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1768727953;',1768727953),
	('-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6','i:1;',1766406989),
	('-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer','i:1766406989;',1766406989),
	('-cache-livewire-rate-limiter:2f5c4cb5b6490efe9589472ef79a07c7bc250714','i:1;',1766421731),
	('-cache-livewire-rate-limiter:2f5c4cb5b6490efe9589472ef79a07c7bc250714:timer','i:1766421731;',1766421731),
	('-cache-livewire-rate-limiter:509f1ebae4332f7a69441b59311437eced0f7b46','i:1;',1766542657),
	('-cache-livewire-rate-limiter:509f1ebae4332f7a69441b59311437eced0f7b46:timer','i:1766542657;',1766542657),
	('-cache-livewire-rate-limiter:e222fb838d8819a52594f28b1e66e1389e884cee','i:1;',1766420190),
	('-cache-livewire-rate-limiter:e222fb838d8819a52594f28b1e66e1389e884cee:timer','i:1766420190;',1766420190),
	('-cache-spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:90:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:16:\"ViewAny:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"View:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"Create:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"Update:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:15:\"Delete:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"Restore:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:20:\"ForceDelete:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:23:\"ForceDeleteAny:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:19:\"RestoreAny:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:18:\"Replicate:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:16:\"Reorder:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"ViewAny:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"View:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:14:\"Create:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"Update:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:14:\"Delete:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:15:\"Restore:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:19:\"ForceDelete:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:22:\"ForceDeleteAny:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:18:\"RestoreAny:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:17:\"Replicate:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:15:\"Reorder:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:12:\"ViewAny:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:9:\"View:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:11:\"Create:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:11:\"Update:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:11:\"Delete:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:12:\"Restore:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:16:\"ForceDelete:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:19:\"ForceDeleteAny:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:15:\"RestoreAny:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"Replicate:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:12:\"Reorder:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"ViewAny:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:9:\"View:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:11:\"Create:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:11:\"Update:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:11:\"Delete:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"Restore:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:16:\"ForceDelete:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:19:\"ForceDeleteAny:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:15:\"RestoreAny:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:14:\"Replicate:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:12:\"Reorder:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:25:\"ViewAny:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:22:\"View:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:24:\"Create:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:24:\"Update:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:24:\"Delete:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:25:\"Restore:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:29:\"ForceDelete:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:32:\"ForceDeleteAny:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:28:\"RestoreAny:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:27:\"Replicate:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:25:\"Reorder:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:15:\"ViewAny:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:12:\"View:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:14:\"Create:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:14:\"Update:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:14:\"Delete:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:15:\"Restore:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:19:\"ForceDelete:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:22:\"ForceDeleteAny:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:18:\"RestoreAny:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:17:\"Replicate:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:15:\"Reorder:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:12:\"ViewAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:9:\"View:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"Create:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:11:\"Update:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:11:\"Delete:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:12:\"Restore:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:16:\"ForceDelete:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:19:\"ForceDeleteAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:15:\"RestoreAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:14:\"Replicate:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:12:\"Reorder:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:12:\"ViewAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:9:\"View:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:11:\"Create:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:11:\"Update:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:11:\"Delete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:12:\"Restore:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:16:\"ForceDelete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:19:\"ForceDeleteAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:15:\"RestoreAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:14:\"Replicate:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:12:\"Reorder:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:14:\"View:Dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:12:\"View:Setting\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:15:\"超级管理员\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"管理员\";s:1:\"c\";s:3:\"web\";}}}',1768915090),
	('yideli-cache-boost.roster.scan','a:2:{s:6:\"roster\";O:21:\"Laravel\\Roster\\Roster\":3:{s:13:\"\0*\0approaches\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:11:\"\0*\0packages\";O:32:\"Laravel\\Roster\\PackageCollection\":2:{s:8:\"\0*\0items\";a:9:{i:0;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^4.0\";s:10:\"\0*\0package\";E:38:\"Laravel\\Roster\\Enums\\Packages:FILAMENT\";s:14:\"\0*\0packageName\";s:17:\"filament/filament\";s:10:\"\0*\0version\";s:5:\"4.2.3\";s:6:\"\0*\0dev\";b:0;}i:1;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^12.0\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:LARAVEL\";s:14:\"\0*\0packageName\";s:17:\"laravel/framework\";s:10:\"\0*\0version\";s:7:\"12.40.1\";s:6:\"\0*\0dev\";b:0;}i:2;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.8\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PROMPTS\";s:14:\"\0*\0packageName\";s:15:\"laravel/prompts\";s:10:\"\0*\0version\";s:5:\"0.3.8\";s:6:\"\0*\0dev\";b:0;}i:3;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v3.7.0\";s:10:\"\0*\0package\";E:38:\"Laravel\\Roster\\Enums\\Packages:LIVEWIRE\";s:14:\"\0*\0packageName\";s:17:\"livewire/livewire\";s:10:\"\0*\0version\";s:5:\"3.7.0\";s:6:\"\0*\0dev\";b:0;}i:4;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.4\";s:10:\"\0*\0package\";E:33:\"Laravel\\Roster\\Enums\\Packages:MCP\";s:14:\"\0*\0packageName\";s:11:\"laravel/mcp\";s:10:\"\0*\0version\";s:5:\"0.3.4\";s:6:\"\0*\0dev\";b:1;}i:5;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.24\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PINT\";s:14:\"\0*\0packageName\";s:12:\"laravel/pint\";s:10:\"\0*\0version\";s:6:\"1.26.0\";s:6:\"\0*\0dev\";b:1;}i:6;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.41\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:SAIL\";s:14:\"\0*\0packageName\";s:12:\"laravel/sail\";s:10:\"\0*\0version\";s:6:\"1.48.1\";s:6:\"\0*\0dev\";b:1;}i:7;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^4.1\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PEST\";s:14:\"\0*\0packageName\";s:12:\"pestphp/pest\";s:10:\"\0*\0version\";s:5:\"4.1.5\";s:6:\"\0*\0dev\";b:1;}i:8;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"12.4.4\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PHPUNIT\";s:14:\"\0*\0packageName\";s:15:\"phpunit/phpunit\";s:10:\"\0*\0version\";s:6:\"12.4.4\";s:6:\"\0*\0dev\";b:1;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:21:\"\0*\0nodePackageManager\";E:43:\"Laravel\\Roster\\Enums\\NodePackageManager:NPM\";}s:9:\"timestamp\";i:1766397123;}',1766483523),
	('yideli-cache-spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:90:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:16:\"ViewAny:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"View:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"Create:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"Update:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:15:\"Delete:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"Restore:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:20:\"ForceDelete:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:23:\"ForceDeleteAny:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:19:\"RestoreAny:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:18:\"Replicate:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:16:\"Reorder:Category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"ViewAny:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"View:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:14:\"Create:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"Update:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:14:\"Delete:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:15:\"Restore:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:19:\"ForceDelete:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:22:\"ForceDeleteAny:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:18:\"RestoreAny:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:17:\"Replicate:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:15:\"Reorder:Enquiry\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:12:\"ViewAny:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:9:\"View:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:11:\"Create:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:11:\"Update:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:11:\"Delete:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:12:\"Restore:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:16:\"ForceDelete:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:19:\"ForceDeleteAny:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:15:\"RestoreAny:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"Replicate:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:12:\"Reorder:News\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"ViewAny:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:9:\"View:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:11:\"Create:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:11:\"Update:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:11:\"Delete:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"Restore:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:16:\"ForceDelete:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:19:\"ForceDeleteAny:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:15:\"RestoreAny:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:14:\"Replicate:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:12:\"Reorder:Page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:25:\"ViewAny:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:22:\"View:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:24:\"Create:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:24:\"Update:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:24:\"Delete:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:25:\"Restore:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:29:\"ForceDelete:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:32:\"ForceDeleteAny:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:28:\"RestoreAny:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:27:\"Replicate:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:25:\"Reorder:ProductAccessCode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:15:\"ViewAny:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:12:\"View:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:14:\"Create:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:14:\"Update:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:14:\"Delete:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:15:\"Restore:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:19:\"ForceDelete:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:22:\"ForceDeleteAny:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:18:\"RestoreAny:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:17:\"Replicate:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:15:\"Reorder:Product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:12:\"ViewAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:9:\"View:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"Create:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:11:\"Update:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:11:\"Delete:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:12:\"Restore:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:16:\"ForceDelete:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:19:\"ForceDeleteAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:15:\"RestoreAny:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:14:\"Replicate:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:12:\"Reorder:User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:12:\"ViewAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:9:\"View:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:11:\"Create:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:11:\"Update:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:11:\"Delete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:12:\"Restore:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:16:\"ForceDelete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:19:\"ForceDeleteAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:15:\"RestoreAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:14:\"Replicate:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:12:\"Reorder:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:14:\"View:Dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:12:\"View:Setting\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}}}',1766475103);

/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 cache_locks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint unsigned DEFAULT NULL COMMENT '父级分类ID，NULL代表顶级分类',
  `name` json NOT NULL COMMENT '{"en": "Pens", "zh": "笔类"}',
  `slug` json NOT NULL COMMENT '{"en": "pens", "zh": "bi-lei"}',
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '封面图',
  `description` json DEFAULT NULL COMMENT '分类描述，用于SEO或页面头部',
  `sort_order` int unsigned NOT NULL DEFAULT '0' COMMENT '排序权重，数字越小越靠前',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `translation_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `cover_image`, `description`, `sort_order`, `is_visible`, `translation_status`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,NULL,'{\"ar\": \"دفتر اليومية/دفتر اليومية\", \"en\": \"Schedule book/diary\", \"es\": \"Agenda/diario\", \"fr\": \"Agenda carnet/journal\", \"ru\": \"Расписание/дневник\", \"zh\": \"日程本 / 日记本\"}','{\"ar\": \"dftr-alyomydftr-alyomy\", \"en\": \"schedule-bookdiary\", \"es\": \"agendadiario\", \"fr\": \"agenda-carnetjournal\", \"ru\": \"raspisaniednevnik\", \"zh\": \"ri-cheng-ben-ri-ji-ben\"}','category-images/01KE24CDR2BE57XGSV9X4FJ1BA.jpg','{\"ar\": \"هذا وصف بسيط!\", \"en\": \"Here is a simple description!\", \"es\": \"Aquí hay una breve descripción!\", \"fr\": \"Voici une brève description!\", \"ru\": \"Вот простое описание!\", \"zh\": \"这里是一段简单的描述!\", \"zh_CN\": \"desc\"}',0,1,'completed','2025-12-22 10:17:04','2026-01-18 02:29:39',NULL),
	(2,NULL,'{\"ar\": \"ملف\", \"en\": \"Coil Book\", \"es\": \"Libro de bobinas\", \"fr\": \"Bobine et livre\", \"ru\": \"Катушка.\", \"zh\": \"线圈本\"}','{\"ar\": \"mlf\", \"en\": \"spiral-notebook\", \"es\": \"libro-de-bobinas\", \"fr\": \"bobine-et-livre\", \"ru\": \"katushka\", \"zh\": \"spiral-notebook\"}','category-images/01KE24GBJBH4NXM0TEZFBCMM80.jpg','{\"ar\": null}',0,1,'completed','2025-12-22 13:00:19','2026-01-18 07:55:30',NULL),
	(3,NULL,'{\"ar\": null, \"en\": \"Notebook\", \"zh\": \"笔记本\"}','{\"ar\": null, \"en\": \"notebook\", \"zh\": \"notebook\"}','category-images/01KE24HC595WNKJ34M6TTV429S.jpg','{\"ar_SA\": null}',0,1,NULL,'2026-01-03 14:25:16','2026-01-03 14:35:14',NULL),
	(4,NULL,'{\"ar\": null, \"en\": \"Elastic band notebook\", \"zh\": \"绑带本\"}','{\"ar\": null, \"en\": \"elastic-band-notebook\", \"zh\": \"elastic-band-notebook\"}','category-images/01KE24HSFWY9N9AXPF57W8KXYT.jpg','{\"ar_SA\": null}',0,1,NULL,'2026-01-03 14:25:56','2026-01-03 14:35:28',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 enquiries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `enquiries`;

CREATE TABLE `enquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_data` json DEFAULT NULL COMMENT '存储来源页面等额外信息',
  `is_read` tinyint(1) NOT NULL DEFAULT '0' COMMENT '管理员是否已读',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `enquiries` WRITE;
/*!40000 ALTER TABLE `enquiries` DISABLE KEYS */;

INSERT INTO `enquiries` (`id`, `name`, `email`, `subject`, `message`, `ip_address`, `meta_data`, `is_read`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'John Doe','john.doe@example.com','Product Inquiry: Bulk Order','Hi, I am interested in buying 500 units of your Pen product. Can you send me a price list?','192.168.1.10','{\"source\": \"Google Ad\", \"campaign\": \"Summer Sale\", \"landing_page\": \"/products/pen\"}',0,'2025-12-22 22:38:06','2025-12-22 14:43:20',NULL),
	(2,'Alice Smith','alice.s@test.com','Shipping Question','Do you ship to Canada? I tried to checkout but got an error.','10.0.0.5','{\"browser\": \"Chrome\", \"platform\": \"MacOS\"}',0,'2025-12-20 22:38:06','2025-12-29 00:40:10',NULL),
	(3,'Spam Bot','no-reply@spam.net',NULL,'Click this link to win a free iPhone!','45.22.11.99',NULL,0,'2025-12-15 22:38:06','2025-12-22 14:40:30',NULL);

/*!40000 ALTER TABLE `enquiries` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`)
VALUES
	(1,'8f80e504-d4ea-4775-bf90-67c8441dbcd9','database','default','{\"uuid\":\"8f80e504-d4ea-4775-bf90-67c8441dbcd9\",\"displayName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"command\":\"O:25:\\\"App\\\\Jobs\\\\AutoTranslateJob\\\":1:{s:5:\\\"model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1768226048,\"delay\":null}','PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'translation_status\' in \'field list\' in /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php:591\nStack trace:\n#0 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(591): PDO->prepare(\'update `product...\')\n#1 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(813): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'update `product...\', Array)\n#2 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(780): Illuminate\\Database\\Connection->runQueryCallback(\'update `product...\', Array, Object(Closure))\n#3 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(583): Illuminate\\Database\\Connection->run(\'update `product...\', Array, Object(Closure))\n#4 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(535): Illuminate\\Database\\Connection->affectingStatement(\'update `product...\', Array)\n#5 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3917): Illuminate\\Database\\Connection->update(\'update `product...\', Array)\n#6 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(1266): Illuminate\\Database\\Query\\Builder->update(Object(Illuminate\\Support\\Collection))\n#7 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1316): Illuminate\\Database\\Eloquent\\Builder->update(Array)\n#8 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1233): Illuminate\\Database\\Eloquent\\Model->performUpdate(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1090): Illuminate\\Database\\Eloquent\\Model->save(Array)\n#10 /Users/theo/Herd/xhs/yideli/src/app/Jobs/AutoTranslateJob.php(46): Illuminate\\Database\\Eloquent\\Model->update(Array)\n#11 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\AutoTranslateJob->handle(Object(App\\Services\\YoudaoTranslateService))\n#12 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Container\\Container->call(Array)\n#17 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#18 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#19 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(133): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#20 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\AutoTranslateJob), false)\n#21 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#22 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#23 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\AutoTranslateJob))\n#25 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#26 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(487): Illuminate\\Queue\\Jobs\\Job->fire()\n#27 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(437): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#28 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(201): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#29 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#30 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#31 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#32 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#33 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#34 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#35 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#36 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call(Array)\n#37 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#38 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#39 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(1102): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 /Users/theo/Herd/xhs/yideli/src/artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#45 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'translation_status\' in \'field list\' (Connection: mysql, SQL: update `products` set `translation_status` = translating, `products`.`updated_at` = 2026-01-12 13:54:09 where `id` = 1) in /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php:826\nStack trace:\n#0 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(780): Illuminate\\Database\\Connection->runQueryCallback(\'update `product...\', Array, Object(Closure))\n#1 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(583): Illuminate\\Database\\Connection->run(\'update `product...\', Array, Object(Closure))\n#2 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Connection.php(535): Illuminate\\Database\\Connection->affectingStatement(\'update `product...\', Array)\n#3 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3917): Illuminate\\Database\\Connection->update(\'update `product...\', Array)\n#4 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(1266): Illuminate\\Database\\Query\\Builder->update(Object(Illuminate\\Support\\Collection))\n#5 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1316): Illuminate\\Database\\Eloquent\\Builder->update(Array)\n#6 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1233): Illuminate\\Database\\Eloquent\\Model->performUpdate(Object(Illuminate\\Database\\Eloquent\\Builder))\n#7 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1090): Illuminate\\Database\\Eloquent\\Model->save(Array)\n#8 /Users/theo/Herd/xhs/yideli/src/app/Jobs/AutoTranslateJob.php(46): Illuminate\\Database\\Eloquent\\Model->update(Array)\n#9 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\AutoTranslateJob->handle(Object(App\\Services\\YoudaoTranslateService))\n#10 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Container\\Container->call(Array)\n#15 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#16 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#17 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(133): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\AutoTranslateJob), false)\n#19 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#20 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#21 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\AutoTranslateJob))\n#23 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(487): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(437): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(201): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call(Array)\n#35 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(1102): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 /Users/theo/Herd/xhs/yideli/src/artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#43 {main}','2026-01-12 13:54:09'),
	(2,'991e377a-199b-4f09-b168-5303c70e5ff7','database','default','{\"uuid\":\"991e377a-199b-4f09-b168-5303c70e5ff7\",\"displayName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"command\":\"O:25:\\\"App\\\\Jobs\\\\AutoTranslateJob\\\":1:{s:5:\\\"model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1768727779,\"delay\":null}','TypeError: mb_strlen(): Argument #1 ($string) must be of type string, array given in /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php:102\nStack trace:\n#0 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(102): mb_strlen(Array, \'utf-8\')\n#1 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(93): App\\Services\\get_input(Array)\n#2 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(71): App\\Services\\calculate_sign(\'3f7b1c47a20ae1b...\', \'Lp81DavdSCa44tW...\', Array, \'dcff2aee-72aa-0...\', 1768727784)\n#3 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(25): App\\Services\\add_auth_params(Array, \'3f7b1c47a20ae1b...\', \'Lp81DavdSCa44tW...\')\n#4 /Users/theo/Herd/xhs/yideli/src/app/Jobs/AutoTranslateJob.php(61): App\\Services\\YoudaoTranslateService->translate(Array, \'zh-CHS\', \'en\')\n#5 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\AutoTranslateJob->handle(Object(App\\Services\\YoudaoTranslateService))\n#6 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#7 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#8 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#9 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#10 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Container\\Container->call(Array)\n#11 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#12 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#13 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(133): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\AutoTranslateJob), false)\n#15 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#16 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#17 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\AutoTranslateJob))\n#19 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#20 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(487): Illuminate\\Queue\\Jobs\\Job->fire()\n#21 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(437): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#22 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(201): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#23 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#24 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#25 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#26 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#27 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#28 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#29 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#30 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call(Array)\n#31 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#32 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#33 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(1102): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 /Users/theo/Herd/xhs/yideli/src/artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#39 {main}','2026-01-18 09:16:24'),
	(3,'35b2b1ed-7ae2-4195-a883-565e54450eee','database','default','{\"uuid\":\"35b2b1ed-7ae2-4195-a883-565e54450eee\",\"displayName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"command\":\"O:25:\\\"App\\\\Jobs\\\\AutoTranslateJob\\\":1:{s:5:\\\"model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1768727915,\"delay\":null}','TypeError: mb_strlen(): Argument #1 ($string) must be of type string, array given in /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php:102\nStack trace:\n#0 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(102): mb_strlen(Array, \'utf-8\')\n#1 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(93): App\\Services\\get_input(Array)\n#2 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(71): App\\Services\\calculate_sign(\'3f7b1c47a20ae1b...\', \'Lp81DavdSCa44tW...\', Array, \'4331e96a-b50a-2...\', 1768727920)\n#3 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(25): App\\Services\\add_auth_params(Array, \'3f7b1c47a20ae1b...\', \'Lp81DavdSCa44tW...\')\n#4 /Users/theo/Herd/xhs/yideli/src/app/Jobs/AutoTranslateJob.php(61): App\\Services\\YoudaoTranslateService->translate(Array, \'zh-CHS\', \'en\')\n#5 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\AutoTranslateJob->handle(Object(App\\Services\\YoudaoTranslateService))\n#6 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#7 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#8 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#9 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#10 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Container\\Container->call(Array)\n#11 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#12 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#13 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(133): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\AutoTranslateJob), false)\n#15 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#16 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#17 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\AutoTranslateJob))\n#19 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#20 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(487): Illuminate\\Queue\\Jobs\\Job->fire()\n#21 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(437): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#22 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(201): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#23 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#24 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#25 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#26 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#27 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#28 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#29 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#30 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call(Array)\n#31 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#32 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#33 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(1102): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 /Users/theo/Herd/xhs/yideli/src/artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#39 {main}','2026-01-18 09:18:40'),
	(4,'caa68a98-f61d-4211-a186-86f5aa5208da','database','default','{\"uuid\":\"caa68a98-f61d-4211-a186-86f5aa5208da\",\"displayName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"command\":\"O:25:\\\"App\\\\Jobs\\\\AutoTranslateJob\\\":1:{s:5:\\\"model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"createdAt\":1768727925,\"delay\":null}','TypeError: mb_strlen(): Argument #1 ($string) must be of type string, array given in /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php:102\nStack trace:\n#0 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(102): mb_strlen(Array, \'utf-8\')\n#1 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(93): App\\Services\\get_input(Array)\n#2 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(71): App\\Services\\calculate_sign(\'3f7b1c47a20ae1b...\', \'Lp81DavdSCa44tW...\', Array, \'e2470d6b-6a8b-f...\', 1768727930)\n#3 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslateService.php(25): App\\Services\\add_auth_params(Array, \'3f7b1c47a20ae1b...\', \'Lp81DavdSCa44tW...\')\n#4 /Users/theo/Herd/xhs/yideli/src/app/Jobs/AutoTranslateJob.php(61): App\\Services\\YoudaoTranslateService->translate(Array, \'zh-CHS\', \'en\')\n#5 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\AutoTranslateJob->handle(Object(App\\Services\\YoudaoTranslateService))\n#6 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#7 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#8 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#9 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#10 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Container\\Container->call(Array)\n#11 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#12 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#13 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(133): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\AutoTranslateJob), false)\n#15 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#16 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#17 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\AutoTranslateJob))\n#19 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#20 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(487): Illuminate\\Queue\\Jobs\\Job->fire()\n#21 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(437): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#22 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(201): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#23 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#24 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#25 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#26 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#27 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#28 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#29 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#30 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call(Array)\n#31 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#32 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#33 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(1102): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 /Users/theo/Herd/xhs/yideli/src/artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#39 {main}','2026-01-18 09:18:50'),
	(5,'29a99413-305c-4262-bca0-a2eb567d7872','database','default','{\"uuid\":\"29a99413-305c-4262-bca0-a2eb567d7872\",\"displayName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AutoTranslateJob\",\"command\":\"O:25:\\\"App\\\\Jobs\\\\AutoTranslateJob\\\":3:{s:5:\\\"model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"chained\\\";a:1:{i:0;s:230:\\\"O:21:\\\"App\\\\Jobs\\\\AutoFillSlug\\\":1:{s:5:\\\"model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"},\"createdAt\":1768746673,\"delay\":null}','TypeError: Cannot access offset of type string on string in /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslate/Html.php:35\nStack trace:\n#0 /Users/theo/Herd/xhs/yideli/src/app/Services/YoudaoTranslate.php(18): App\\Services\\YoudaoTranslate\\Html->translate(\'<h2>fds<strong>...\', \'zh-CHS\', \'en\')\n#1 /Users/theo/Herd/xhs/yideli/src/app/Jobs/AutoTranslateJob.php(79): App\\Services\\YoudaoTranslate->translate(\'<h2>fds<strong>...\', \'zh-CHS\', \'en\')\n#2 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\AutoTranslateJob->handle(Object(App\\Services\\YoudaoTranslate))\n#3 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Container\\Container->call(Array)\n#8 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#9 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#10 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(133): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\AutoTranslateJob), false)\n#12 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#13 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\AutoTranslateJob))\n#14 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\AutoTranslateJob))\n#16 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(487): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(437): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(201): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(1102): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 /Users/theo/Herd/xhs/yideli/src/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /Users/theo/Herd/xhs/yideli/src/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /Users/theo/Herd/xhs/yideli/src/artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}','2026-01-18 14:31:17');

/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 job_batches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'0001_01_01_000000_create_users_table',1),
	(2,'0001_01_01_000001_create_cache_table',1),
	(3,'0001_01_01_000002_create_jobs_table',1),
	(4,'2025_12_22_063133_create_permission_tables',2),
	(5,'2022_12_14_083707_create_settings_table',3),
	(6,'2025_12_22_145325_create_general_settings',4);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES
	(1,'App\\Models\\User',1),
	(3,'App\\Models\\User',2);

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL COMMENT '分类ID',
  `title` json NOT NULL,
  `slug` json NOT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '封面图',
  `content` json NOT NULL,
  `is_featured` tinyint unsigned DEFAULT '0' COMMENT '是否精选',
  `published_at` timestamp NULL DEFAULT NULL COMMENT '发布时间，空则为草稿',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `cover_image`, `content`, `is_featured`, `published_at`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,2,'{\"ar\": null, \"en\": \"A large wave of panda cubs is approaching ahead!\", \"zh\": \"前方有一大波熊猫幼崽袭来！\"}','{\"ar\": null, \"en\": \"a-large-wave-of-panda-cubs-is-approaching-ahead\", \"zh\": \"a-large-wave-of-panda-cubs-is-approaching-ahead\"}','products/01KE4PWTBNQ1VRHHGYZZMV0QRK.webp','{\"ar\": \"<p></p>\", \"en\": \"<p></p>\", \"es\": \"<p></p>\", \"fr\": \"<p></p>\", \"ru\": \"<p></p>\", \"zh\": \"<p></p>\"}',0,'2026-01-04 14:32:00','2026-01-04 14:32:36','2026-01-04 14:34:33',NULL),
	(2,4,'{\"ar\": null, \"en\": \"Liaoning Cities Team Up for a \\\"Snow Fun\\\" Event\", \"zh\": \"辽宁都市联手“玩雪”\"}','{\"ar\": null, \"en\": \"liaoning-cities-team-up-for-a-snow-fun-event\", \"zh\": \"liaoning-cities-team-up-for-a-snow-fun-event\"}','products/01KE4Q4KN0W66WQ5CMNX3HNJZ2.webp','{\"ar\": \"<p></p>\", \"en\": \"<p></p>\", \"es\": \"<p></p>\", \"fr\": \"<p></p>\", \"ru\": \"<p></p>\", \"zh\": \"<p></p>\"}',1,'2026-01-04 14:37:00','2026-01-04 14:38:48','2026-01-04 14:39:11',NULL);

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 news_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news_categories`;

CREATE TABLE `news_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint unsigned DEFAULT NULL COMMENT '父级分类ID，NULL代表顶级分类',
  `name` json NOT NULL COMMENT '{"en": "Pens", "zh": "笔类"}',
  `slug` json NOT NULL COMMENT '{"en": "pens", "zh": "bi-lei"}',
  `description` json DEFAULT NULL COMMENT '分类描述，用于SEO或页面头部',
  `sort_order` int unsigned NOT NULL DEFAULT '0' COMMENT '排序权重，数字越小越靠前',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `news_categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories` DISABLE KEYS */;

INSERT INTO `news_categories` (`id`, `parent_id`, `name`, `slug`, `description`, `sort_order`, `is_visible`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,NULL,'{\"ar\": null, \"en\": \"Company News\", \"zh\": \"公司新闻\"}','{\"ar\": null, \"en\": \"company-news\", \"zh\": \"company-news\"}','{\"ar\": null}',0,1,'2026-01-04 12:39:25','2026-01-04 13:47:41',NULL),
	(2,NULL,'{\"ar\": null, \"en\": \"Industry Insights\", \"zh\": \"行业洞察\"}','{\"ar\": null, \"en\": \"industry-insights\", \"zh\": \"industry-insights\"}','{\"ar\": null}',0,1,'2026-01-04 13:51:27','2026-01-04 13:51:27',NULL),
	(3,NULL,'{\"ar\": null, \"en\": \"Exhibitions\", \"zh\": \"展会\"}','{\"ar\": null, \"en\": \"exhibitions\", \"zh\": \"exhibitions\"}','{\"ar\": null}',0,1,'2026-01-04 13:52:02','2026-01-04 13:52:02',NULL),
	(4,NULL,'{\"ar\": null, \"en\": \"New Products\", \"zh\": \"新品发布\"}','{\"ar\": null, \"en\": \"new-products\", \"zh\": \"new-products\"}','{\"ar\": null}',0,1,'2026-01-04 13:52:35','2026-01-04 13:52:35',NULL);

/*!40000 ALTER TABLE `news_categories` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '唯一标识符，如 about_us',
  `title` json NOT NULL,
  `content` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_key_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 password_reset_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'ViewAny:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(2,'View:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(3,'Create:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(4,'Update:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(5,'Delete:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(6,'Restore:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(7,'ForceDelete:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(8,'ForceDeleteAny:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(9,'RestoreAny:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(10,'Replicate:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(11,'Reorder:Category','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(12,'ViewAny:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(13,'View:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(14,'Create:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(15,'Update:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(16,'Delete:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(17,'Restore:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(18,'ForceDelete:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(19,'ForceDeleteAny:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(20,'RestoreAny:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(21,'Replicate:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(22,'Reorder:Enquiry','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(23,'ViewAny:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(24,'View:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(25,'Create:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(26,'Update:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(27,'Delete:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(28,'Restore:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(29,'ForceDelete:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(30,'ForceDeleteAny:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(31,'RestoreAny:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(32,'Replicate:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(33,'Reorder:News','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(34,'ViewAny:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(35,'View:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(36,'Create:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(37,'Update:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(38,'Delete:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(39,'Restore:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(40,'ForceDelete:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(41,'ForceDeleteAny:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(42,'RestoreAny:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(43,'Replicate:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(44,'Reorder:Page','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(45,'ViewAny:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(46,'View:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(47,'Create:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(48,'Update:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(49,'Delete:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(50,'Restore:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(51,'ForceDelete:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(52,'ForceDeleteAny:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(53,'RestoreAny:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(54,'Replicate:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(55,'Reorder:ProductAccessCode','web','2025-12-22 07:06:14','2025-12-22 07:06:14'),
	(56,'ViewAny:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(57,'View:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(58,'Create:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(59,'Update:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(60,'Delete:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(61,'Restore:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(62,'ForceDelete:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(63,'ForceDeleteAny:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(64,'RestoreAny:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(65,'Replicate:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(66,'Reorder:Product','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(67,'ViewAny:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(68,'View:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(69,'Create:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(70,'Update:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(71,'Delete:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(72,'Restore:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(73,'ForceDelete:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(74,'ForceDeleteAny:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(75,'RestoreAny:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(76,'Replicate:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(77,'Reorder:User','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(78,'ViewAny:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(79,'View:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(80,'Create:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(81,'Update:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(82,'Delete:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(83,'Restore:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(84,'ForceDelete:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(85,'ForceDeleteAny:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(86,'RestoreAny:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(87,'Replicate:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(88,'Reorder:Role','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(89,'View:Dashboard','web','2025-12-22 07:06:15','2025-12-22 07:06:15'),
	(90,'View:Setting','web','2025-12-22 07:06:15','2025-12-22 07:06:15');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 product_access_code_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_access_code_product`;

CREATE TABLE `product_access_code_product` (
  `product_access_code_id` bigint unsigned NOT NULL COMMENT '访问码ID',
  `product_id` bigint unsigned NOT NULL COMMENT '产品ID',
  PRIMARY KEY (`product_access_code_id`,`product_id`),
  KEY `product_access_code_product_product_id_foreign` (`product_id`),
  CONSTRAINT `product_access_code_product_code_id_foreign` FOREIGN KEY (`product_access_code_id`) REFERENCES `product_access_codes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_access_code_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# 转储表 product_access_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_access_codes`;

CREATE TABLE `product_access_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '生成的随机码',
  `expires_at` timestamp NOT NULL COMMENT '过期时间',
  `usage_limit` int unsigned DEFAULT NULL COMMENT '最大使用次数，NULL为无限',
  `used_count` int unsigned NOT NULL DEFAULT '0' COMMENT '已使用次数',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '备注：发给了哪个客户',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_access_codes_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_access_codes` WRITE;
/*!40000 ALTER TABLE `product_access_codes` DISABLE KEYS */;

INSERT INTO `product_access_codes` (`id`, `code`, `expires_at`, `usage_limit`, `used_count`, `note`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'PTDFHDP7','2025-12-29 14:15:53',1,0,'xcccc','2025-12-22 14:16:02','2025-12-22 14:24:21',NULL);

/*!40000 ALTER TABLE `product_access_codes` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 product_related
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_related`;

CREATE TABLE `product_related` (
  `product_id` bigint unsigned NOT NULL,
  `related_product_id` bigint unsigned NOT NULL,
  KEY `product_id` (`product_id`,`related_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `product_related` WRITE;
/*!40000 ALTER TABLE `product_related` DISABLE KEYS */;

INSERT INTO `product_related` (`product_id`, `related_product_id`)
VALUES
	(1,2);

/*!40000 ALTER TABLE `product_related` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL COMMENT '分类ID',
  `name` json NOT NULL COMMENT '{"en": "Pen", "zh": "钢笔"}',
  `slug` json NOT NULL COMMENT '用于多语言路由',
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '封面图',
  `images` json DEFAULT NULL COMMENT '图片',
  `description` json DEFAULT NULL COMMENT '产品描述',
  `content` json DEFAULT NULL COMMENT '富文本详情',
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '编码',
  `material` json DEFAULT NULL COMMENT '材质',
  `tags` json DEFAULT NULL COMMENT '标签',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT '全局显示开关',
  `translation_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `cover_image`, `images`, `description`, `content`, `code`, `material`, `tags`, `is_visible`, `translation_status`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,2,'{\"ar\": \"خطة مع مذكرات\", \"en\": \"Plan book and diary\", \"es\": \"Libro de planes y diario\", \"fr\": \"Carnet de plans et journal\", \"ru\": \"План и дневник\", \"zh\": \"计划本与日记\"}','{\"ar\": \"kht-maa-mthkrat\", \"en\": \"plan-book-and-diary\", \"es\": \"libro-de-planes-y-diario\", \"fr\": \"carnet-de-plans-et-journal\", \"ru\": \"plan-i-dnevnik\", \"zh\": \"ji-hua-ben-yu-ri-ji\"}',NULL,'[\"products/01KF86CAZ8NQVQR14QSXP5GRQZ.jpg\", \"products/01KF86CAZ9R42TH6QWAP05S2P3.jpg\"]','{\"ar\": \"هذا هو وصف المنتج\", \"en\": \"This is a description of a product\", \"es\": \"Esta es la descripción de un artículo\", \"fr\": \"Ceci est la description d’un article\", \"ru\": \"Это описание сегмента продукта\", \"zh\": \"这是一段产品的描述\"}','{\"ar\": \"<p></p>\", \"en\": \"<p></p>\", \"es\": \"<p></p>\", \"fr\": \"<p></p>\", \"ru\": \"<p></p>\", \"zh\": \"<h3><strong>示例<a target=\\\"_blank\\\" rel=\\\"noopener noreferrer nofollow\\\" href=\\\"https://www.php.net/manual/zh/function.sleep.php#refsect1-function.sleep-examples\\\" class=\\\"genanchor\\\"> ¶</a></strong></h3><p><strong>示例 #1 sleep() 示例</strong></p><p><code>&lt;?php<br><br>// 当前时间<br>echo date(&#039;h:i:s&#039;) . &quot;\\\\n&quot;;<br><br>// 睡眠 10 秒<br>sleep(10);<br><br>// 醒来！<br>echo date(&#039;h:i:s&#039;) . &quot;\\\\n&quot;;<br><br>?&gt;</code></p><p>该例子会在休眠10秒后输出。</p><pre><code>05:31:23\\n05:31:33</code></pre>\"}','YDL-0271','{\"ar\": \"جلد بو\", \"en\": \"PU leather\", \"es\": \"Cuero PU\", \"fr\": \"PU en cuir\", \"ru\": \"Кожа.\", \"zh\": \"PU皮革\"}','{\"ar\": [\"المكتبية\", \"عملية\", \"رخيصة\", \"قوية\"], \"en\": [\"Office\", \"Practical\", \"Cheap\", \"\\\"Firm\\\"\"], \"es\": [\"oficinas\", \"práctico\", \"barato\", \"fuerte\"], \"fr\": [\"bureaux\", \"pratiques\", \"cher\", \"solide\"], \"ru\": [\"офисн\", \"практичн\", \"дешевл\", \"крепк\"], \"zh\": [\"办公\", \"实用\", \"便宜\", \"结实\"]}',1,'completed','2025-12-22 13:10:03','2026-01-18 14:03:14',NULL),
	(2,1,'{\"ar\": \"ثلاثة أشكال\", \"en\": \"Annual calendar\", \"es\": \"náutico\", \"fr\": \"Le calendrier\", \"ru\": \"календар\", \"zh\": \"年历\"}','{\"ar\": \"thlath-ashkal\", \"en\": \"annual-calendar\", \"es\": \"nautico\", \"fr\": \"le-calendrier\", \"ru\": \"kalendar\", \"zh\": \"nian-li-1\"}',NULL,'[]','{\"ar\": null}','{\"ar\": \"<h2>fds<strong>-بنـز<sup>asd</sup></strong> fas  </h2>\", \"en\": \"<h2><strong><sup>fdsafasdfas</sup></strong>  </h2>\", \"es\": \"<h2>fds <strong>af <sup>asd</sup></strong> fas  </h2>\", \"fr\": \"<h2>fds <strong>af <sup>asd</sup></strong> fas  </h2>\", \"ru\": \"<h2>FDS<strong>аф<sup>asd</sup></strong> fas  </h2>\", \"zh\": \"<h2>fds<strong>af<sup>asd</sup></strong>fas</h2>\"}',NULL,'{\"ar\": \"الجلود\", \"en\": \"Leather\", \"es\": \"Artículos de cuero\", \"fr\": \"Articles en cuir\", \"ru\": \"кож\", \"zh\": \"皮革\"}','{\"ar\": [], \"en\": [], \"es\": [], \"fr\": [], \"ru\": [], \"zh\": []}',1,'completed','2025-12-24 02:27:53','2026-01-18 14:34:39',NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(20,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(26,1),
	(27,1),
	(28,1),
	(29,1),
	(30,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1),
	(35,1),
	(36,1),
	(37,1),
	(38,1),
	(39,1),
	(40,1),
	(41,1),
	(42,1),
	(43,1),
	(44,1),
	(45,1),
	(46,1),
	(47,1),
	(48,1),
	(49,1),
	(50,1),
	(51,1),
	(52,1),
	(53,1),
	(54,1),
	(55,1),
	(56,1),
	(57,1),
	(58,1),
	(59,1),
	(60,1),
	(61,1),
	(62,1),
	(63,1),
	(64,1),
	(65,1),
	(66,1),
	(67,1),
	(68,1),
	(69,1),
	(70,1),
	(71,1),
	(72,1),
	(73,1),
	(74,1),
	(75,1),
	(76,1),
	(77,1),
	(78,1),
	(79,1),
	(80,1),
	(81,1),
	(82,1),
	(83,1),
	(84,1),
	(85,1),
	(86,1),
	(87,1),
	(88,1),
	(89,1),
	(90,1),
	(89,2);

/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'超级管理员','web','2025-12-22 07:06:14','2025-12-22 16:17:26'),
	(2,'管理员','web','2025-12-22 13:24:58','2025-12-22 13:24:58'),
	(3,'会员','web','2025-12-22 13:25:18','2025-12-22 13:25:18');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('lzmcGt28lNFhLsoQLJAMPa7NYtAdprNu0qriAVMC',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiaXVLQlJ3ajFrS0tRZEZVSnZwSExYQmZtME9LSkVaaW5iTWtQZlZIUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Nzc6Imh0dHBzOi8veWlkZWxpLnRlc3QvZW4vbmV3cy9zaG93L2xpYW9uaW5nLWNpdGllcy10ZWFtLXVwLWZvci1hLXNub3ctZnVuLWV2ZW50IjtzOjU6InJvdXRlIjtzOjk6Im5ld3Muc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiQvNU5YLjkucHQvUVEvd3Jwb0JOQzZPWDY4ZllPc0lEY2lEU2NPazFQb0llb2pkUVlzRGpJMiI7czo2OiJ0YWJsZXMiO2E6NDp7czo0MDoiOGZhYzZlYjFjZWMyNjgwM2IzZjdmYjQ0MGEyNzExMWJfY29sdW1ucyI7YTo3OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MjoiaWQiO3M6NToibGFiZWwiO3M6MjoiSUQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjQ6Im5hbWUiO3M6NToibGFiZWwiO3M6MTI6IuWVhuWTgeWQjeensCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTM6ImNhdGVnb3J5Lm5hbWUiO3M6NToibGFiZWwiO3M6Njoi5YiG57G7IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMToiY292ZXJfaW1hZ2UiO3M6NToibGFiZWwiO3M6OToi5bCB6Z2i5Zu+IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiaXNfdmlzaWJsZSI7czo1OiJsYWJlbCI7czoxMjoi5piv5ZCm5Y+v6KeBIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMjoi5Yib5bu65pe26Ze0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEyOiLmm7TmlrDml7bpl7QiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319czo0MDoiMjI1YTAyOWIzZDgxYTQ3MjUyMzhhNjZkMDMxOTRmOGJfY29sdW1ucyI7YToyOntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTE6ImNvdmVyX2ltYWdlIjtzOjU6ImxhYmVsIjtzOjY6IuWbvueJhyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NToidGl0bGUiO3M6NToibGFiZWwiO3M6MTI6IuWVhuWTgeWQjeensCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO319czo0MDoiMzg1MDlhMjU3ZTU5YmExNWY1MWVlY2QwOGJlMWYwMzhfY29sdW1ucyI7YToyOntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoibmFtZSI7czo1OiJsYWJlbCI7czo2OiLlkI3np7AiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJpc192aXNpYmxlIjtzOjU6ImxhYmVsIjtzOjEyOiLmmK/lkKblj6/op4EiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9fXM6NDA6ImRlMjQwMjNhNjI0NGQ3Yzg4ZGU0ZjQ5YzZjZjcyNmFkX2NvbHVtbnMiO2E6Nzp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjI6ImlkIjtzOjU6ImxhYmVsIjtzOjI6IklEIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJ0aXRsZSI7czo1OiJsYWJlbCI7czo2OiLmoIfpopgiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJjYXRlZ29yeS5uYW1lIjtzOjU6ImxhYmVsIjtzOjY6IuWIhuexuyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTE6ImNvdmVyX2ltYWdlIjtzOjU6ImxhYmVsIjtzOjk6IuWwgemdouWbviI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Njoic3RhdHVzIjtzOjU6ImxhYmVsIjtzOjY6IueKtuaAgSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6InB1Ymxpc2hlZF9hdCI7czo1OiJsYWJlbCI7czoxMjoi5Y+R5biD5pe26Ze0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMjoi5pu05paw5pe26Ze0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fX1zOjg6ImZpbGFtZW50IjthOjA6e319',1768834935);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_group_name_unique` (`group`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `group`, `name`, `locked`, `payload`, `created_at`, `updated_at`)
VALUES
	(1,'general','site_name',0,'\"YIDELI\"','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(2,'general','is_active',0,'true','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(3,'general','site_logo',0,'null','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(4,'general','site_favicon',0,'null','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(5,'general','site_description',0,'null','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(6,'general','site_keywords',0,'null','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(7,'general','contact_email',0,'\"sales@yideli.test\"','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(8,'general','home_carousel',0,'[{\"type\": \"url\", \"image\": \"carousel/01KE75AG9EGD4NYHBVZFG9JDHY.jpg\", \"title\": \"年终经济盘点：乘着邮轮，去远行\", \"custom_url\": \"https://www.baidu.com\", \"in_new_windows\": 0}, {\"image\": \"carousel/01KE1TK1BXG0GF271PP3X74M1K.jpg\", \"title\": \"罗甸：以“阳光密码”解锁贵州旅居新图景\", \"custom_url\": \"https://yideli.test\", \"in_new_windows\": 0}, {\"image\": \"carousel/01KE4GVT9QMBC2HV3J1T4QJ6DG.jpg\", \"title\": null, \"custom_url\": \"#\", \"in_new_windows\": 0}]','2025-12-22 14:54:11','2026-01-12 14:55:49'),
	(9,'general','contact_address',0,'\"No. 799 Yinghua Road, Luqiao District, Taizhou, Zhejiang, China\"','2026-01-04 17:22:40','2026-01-12 14:55:49'),
	(10,'general','contact_phone',0,'\"(+86) 13388886666\"','2026-01-04 17:22:54','2026-01-12 14:55:49'),
	(11,'general','contact_tel',0,'\"(+86) 88886666\"','2026-01-05 20:37:50','2026-01-12 14:55:49'),
	(21,'general','contact_linkedin',0,'\"yideli\"','2026-01-04 23:11:38','2026-01-12 14:55:49'),
	(22,'general','contact_whatsapp',0,'\"yideli\"','2026-01-04 23:11:52','2026-01-12 14:55:49'),
	(85,'general','faqs',0,'[]','2026-01-12 22:51:12','2026-01-12 14:55:49');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin@yideli.test',NULL,'$2y$12$/5NX.9.pt/QQ/wrpoBNC6OX68fYOsIDciDScOk1PoIeojdQYsDjI2','2x4fAM5mzG88YdHPf9PsuvZWGzwBx9SwDxt4Kiv6exQI7LDR65TSUT8WcRmv','2025-12-22 06:39:08','2025-12-22 06:39:08'),
	(2,'test','test@yideli.test',NULL,'$2y$12$K/xyW7qKxFcdctvGJK0pAOZDSMEK.kq.xlQ.i1Lhp00zvSy8dpYP2',NULL,'2025-12-22 13:37:59','2025-12-22 13:37:59');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
