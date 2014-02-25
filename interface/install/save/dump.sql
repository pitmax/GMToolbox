-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gmtoolbox
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `gmtoolbox`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gmtoolbox` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gmtoolbox`;

--
-- Table structure for table `clementine_installer_modules`
--

DROP TABLE IF EXISTS `clementine_installer_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_installer_modules` (
  `module` varchar(255) NOT NULL,
  `version` varchar(32) NOT NULL,
  `type` varchar(16) NOT NULL DEFAULT 'share',
  PRIMARY KEY (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_installer_modules`
--

LOCK TABLES `clementine_installer_modules` WRITE;
/*!40000 ALTER TABLE `clementine_installer_modules` DISABLE KEYS */;
INSERT INTO `clementine_installer_modules` VALUES ('core','3.24','share'),('crud','4.17','share'),('cssjs','2.1','share'),('db','1.15','share'),('errors','2.0','share'),('fonctions','2.7','share'),('jstools','2.6','share'),('mail','1.5','share'),('skinbo','2.1','share'),('users','4.14','share');
/*!40000 ALTER TABLE `clementine_installer_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clementine_users`
--

DROP TABLE IF EXISTS `clementine_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_alias_of` int(10) unsigned DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `salt` varchar(64) DEFAULT NULL,
  `code_confirmation` varchar(64) DEFAULT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_creation` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_clementine_users_is_alias_of1` (`is_alias_of`),
  CONSTRAINT `fk_clementine_users_is_alias_of1` FOREIGN KEY (`is_alias_of`) REFERENCES `clementine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_users`
--

LOCK TABLES `clementine_users` WRITE;
/*!40000 ALTER TABLE `clementine_users` DISABLE KEYS */;
INSERT INTO `clementine_users` VALUES (1,NULL,'pa@solminihac.fr','bb3e43911b63a87f2db3cb881107381d03cfb7115a6dbe8a9f71ec71cb916ac9','92dffe2369a795874ac1a0176f492b7f79ec6025aac589bc8d19f70cb7547cb8','aa9e38afb08ddbb23d313966b50e7af917dd1c403d88717f3b7b0d471461a4d9','2014-02-25 19:51:43','2010-05-12 13:54:39',1),(2,NULL,'maxime.pittavino@gmail.com','7cb99f5c7cb1ec26d6d59cfdc558523c47fba24e8b02929011920033a8757c87','4b6a296bd675945cc11a01f534d057027b4f55306f5f3ba367baf8561b2b7d76','f3b485950d86291beb2ed2712d9c560fc4bf1a80ddd863d429345be57f725b59','2014-02-25 19:52:16','2014-02-25 19:52:16',1);
/*!40000 ALTER TABLE `clementine_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clementine_users_groups`
--

DROP TABLE IF EXISTS `clementine_users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_users_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_users_groups`
--

LOCK TABLES `clementine_users_groups` WRITE;
/*!40000 ALTER TABLE `clementine_users_groups` DISABLE KEYS */;
INSERT INTO `clementine_users_groups` VALUES (1,'administrateurs'),(2,'clients');
/*!40000 ALTER TABLE `clementine_users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clementine_users_groups_has_privileges`
--

DROP TABLE IF EXISTS `clementine_users_groups_has_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_users_groups_has_privileges` (
  `group_id` int(10) unsigned NOT NULL,
  `privilege_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`privilege_id`),
  KEY `clementine_users_groups_has_privileges_fk1` (`group_id`),
  KEY `clementine_users_groups_has_privileges_fk2` (`privilege_id`),
  CONSTRAINT `clementine_users_groups_has_privileges_fk2` FOREIGN KEY (`privilege_id`) REFERENCES `clementine_users_privileges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clementine_users_groups_has_privileges_fk1` FOREIGN KEY (`group_id`) REFERENCES `clementine_users_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_users_groups_has_privileges`
--

LOCK TABLES `clementine_users_groups_has_privileges` WRITE;
/*!40000 ALTER TABLE `clementine_users_groups_has_privileges` DISABLE KEYS */;
INSERT INTO `clementine_users_groups_has_privileges` VALUES (1,1),(1,2),(1,3),(1,4),(1,5);
/*!40000 ALTER TABLE `clementine_users_groups_has_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clementine_users_groups_treepaths`
--

DROP TABLE IF EXISTS `clementine_users_groups_treepaths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_users_groups_treepaths` (
  `ancestor` int(10) unsigned NOT NULL,
  `descendant` int(10) unsigned NOT NULL,
  `depth` smallint(6) NOT NULL,
  PRIMARY KEY (`ancestor`,`descendant`),
  KEY `clementine_users_groups_treepaths_fk2` (`descendant`),
  CONSTRAINT `clementine_users_groups_treepaths_fk1` FOREIGN KEY (`ancestor`) REFERENCES `clementine_users_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clementine_users_groups_treepaths_fk2` FOREIGN KEY (`descendant`) REFERENCES `clementine_users_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_users_groups_treepaths`
--

LOCK TABLES `clementine_users_groups_treepaths` WRITE;
/*!40000 ALTER TABLE `clementine_users_groups_treepaths` DISABLE KEYS */;
INSERT INTO `clementine_users_groups_treepaths` VALUES (1,1,0),(2,2,0);
/*!40000 ALTER TABLE `clementine_users_groups_treepaths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clementine_users_has_groups`
--

DROP TABLE IF EXISTS `clementine_users_has_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_users_has_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `fk_clementine_users_groups_clementine_users` (`user_id`),
  KEY `fk_clementine_users_groups_clementine_users_groups1` (`group_id`),
  CONSTRAINT `clementine_users_has_groups_fk2` FOREIGN KEY (`group_id`) REFERENCES `clementine_users_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clementine_users_has_groups_fk1` FOREIGN KEY (`user_id`) REFERENCES `clementine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_users_has_groups`
--

LOCK TABLES `clementine_users_has_groups` WRITE;
/*!40000 ALTER TABLE `clementine_users_has_groups` DISABLE KEYS */;
INSERT INTO `clementine_users_has_groups` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `clementine_users_has_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clementine_users_privileges`
--

DROP TABLE IF EXISTS `clementine_users_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_users_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `privilege` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_users_privileges`
--

LOCK TABLES `clementine_users_privileges` WRITE;
/*!40000 ALTER TABLE `clementine_users_privileges` DISABLE KEYS */;
INSERT INTO `clementine_users_privileges` VALUES (1,'manage_users'),(2,'manage_contents'),(3,'manage_pages'),(4,'manage_commands'),(5,'list_users');
/*!40000 ALTER TABLE `clementine_users_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clementine_users_treepaths`
--

DROP TABLE IF EXISTS `clementine_users_treepaths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clementine_users_treepaths` (
  `ancestor` int(10) unsigned NOT NULL,
  `descendant` int(10) unsigned NOT NULL,
  `depth` smallint(6) NOT NULL,
  PRIMARY KEY (`ancestor`,`descendant`),
  KEY `clementine_users_treepaths_fk2` (`descendant`),
  CONSTRAINT `clementine_users_treepaths_fk1` FOREIGN KEY (`ancestor`) REFERENCES `clementine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clementine_users_treepaths_fk2` FOREIGN KEY (`descendant`) REFERENCES `clementine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clementine_users_treepaths`
--

LOCK TABLES `clementine_users_treepaths` WRITE;
/*!40000 ALTER TABLE `clementine_users_treepaths` DISABLE KEYS */;
INSERT INTO `clementine_users_treepaths` VALUES (1,1,0),(1,2,1),(2,2,0);
/*!40000 ALTER TABLE `clementine_users_treepaths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gmtoolbox_ambiances`
--

DROP TABLE IF EXISTS `gmtoolbox_ambiances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gmtoolbox_ambiances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `son` varchar(255) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gmtoolbox_ambiances`
--

LOCK TABLES `gmtoolbox_ambiances` WRITE;
/*!40000 ALTER TABLE `gmtoolbox_ambiances` DISABLE KEYS */;
/*!40000 ALTER TABLE `gmtoolbox_ambiances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gmtoolbox_lieux`
--

DROP TABLE IF EXISTS `gmtoolbox_lieux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gmtoolbox_lieux` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `jour_calme_musique` varchar(255) DEFAULT NULL,
  `jour_calme_son` varchar(255) DEFAULT NULL,
  `nuit_calme_musique` varchar(255) DEFAULT NULL,
  `nuit_calme_son` varchar(255) DEFAULT NULL,
  `jour_angoissant_musique` varchar(255) DEFAULT NULL,
  `jour_angoissant_son` varchar(255) DEFAULT NULL,
  `nuit_angoissant_musique` varchar(255) DEFAULT NULL,
  `nuit_angoissant_son` varchar(255) DEFAULT NULL,
  `combat_musique` varchar(255) DEFAULT NULL,
  `combat_son` varchar(255) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gmtoolbox_lieux`
--

LOCK TABLES `gmtoolbox_lieux` WRITE;
/*!40000 ALTER TABLE `gmtoolbox_lieux` DISABLE KEYS */;
INSERT INTO `gmtoolbox_lieux` VALUES (1,'Ville','','','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `gmtoolbox_lieux` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-25 21:44:01
