# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.24-0ubuntu0.18.04.1)
# Database: seeds
# Generation Time: 2019-02-10 15:34:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table permissions
# ------------------------------------------------------------

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'create-breeder','web','2019-02-10 15:33:29','2019-02-10 15:33:29'),
	(2,'edit-breeder','web','2019-02-10 15:33:31','2019-02-10 15:33:31'),
	(3,'delete-breeder','web','2019-02-10 15:33:32','2019-02-10 15:33:32'),
	(4,'create-image','web','2019-02-10 15:33:34','2019-02-10 15:33:34'),
	(5,'edit-image','web','2019-02-10 15:33:35','2019-02-10 15:33:35'),
	(6,'delete-image','web','2019-02-10 15:33:37','2019-02-10 15:33:37'),
	(7,'create-seed-type','web','2019-02-10 15:33:38','2019-02-10 15:33:38'),
	(8,'edit-seed-type','web','2019-02-10 15:33:40','2019-02-10 15:33:40'),
	(9,'delete-seed-type','web','2019-02-10 15:33:41','2019-02-10 15:33:41'),
	(10,'create-shipping-address','web','2019-02-10 15:33:43','2019-02-10 15:33:43'),
	(11,'edit-shipping-address','web','2019-02-10 15:33:44','2019-02-10 15:33:44'),
	(12,'delete-shipping-address','web','2019-02-10 15:33:46','2019-02-10 15:33:46'),
	(13,'create-strain','web','2019-02-10 15:33:47','2019-02-10 15:33:47'),
	(14,'edit-strain','web','2019-02-10 15:33:49','2019-02-10 15:33:49'),
	(15,'delete-strain','web','2019-02-10 15:33:50','2019-02-10 15:33:50'),
	(16,'edit-tester','web','2019-02-10 15:33:51','2019-02-10 15:33:51'),
	(17,'create-tester','web','2019-02-10 15:33:53','2019-02-10 15:33:53'),
	(18,'delete-tester','web','2019-02-10 15:33:54','2019-02-10 15:33:54'),
	(19,'create-user','web','2019-02-10 15:33:56','2019-02-10 15:33:56'),
	(20,'edit-user','web','2019-02-10 15:33:57','2019-02-10 15:33:57'),
	(21,'delete-user','web','2019-02-10 15:33:59','2019-02-10 15:33:59'),
    (22,'admin','web','2019-02-10 15:33:20','2019-02-10 15:33:20');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

