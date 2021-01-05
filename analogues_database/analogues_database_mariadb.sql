-- MySQL dump 10.16  Distrib 10.1.41-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: analogues_db
-- ------------------------------------------------------
-- Server version	10.1.41-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `analogues_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `analogues_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `analogues_db`;

--
-- Table structure for table `analogues_commentmeta`
--

DROP TABLE IF EXISTS `analogues_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_comments`
--

DROP TABLE IF EXISTS `analogues_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_gglcptch_whitelist`
--

DROP TABLE IF EXISTS `analogues_gglcptch_whitelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_gglcptch_whitelist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` char(31) NOT NULL,
  `ip_from_int` bigint(20) DEFAULT NULL,
  `ip_to_int` bigint(20) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_links`
--

DROP TABLE IF EXISTS `analogues_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_options`
--

DROP TABLE IF EXISTS `analogues_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`),
  KEY `autoload` (`autoload`)
) ENGINE=InnoDB AUTO_INCREMENT=80038 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_postmeta`
--

DROP TABLE IF EXISTS `analogues_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=893 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_posts`
--

DROP TABLE IF EXISTS `analogues_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_term_relationships`
--

DROP TABLE IF EXISTS `analogues_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_term_taxonomy`
--

DROP TABLE IF EXISTS `analogues_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_termmeta`
--

DROP TABLE IF EXISTS `analogues_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_terms`
--

DROP TABLE IF EXISTS `analogues_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_usermeta`
--

DROP TABLE IF EXISTS `analogues_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analogues_users`
--

DROP TABLE IF EXISTS `analogues_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analogues_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Current Database: `analogues_downloads`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `analogues_downloads` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `analogues_downloads`;

--
-- Table structure for table `datasets_country`
--

DROP TABLE IF EXISTS `datasets_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `iso` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=895 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_dataavailability`
--

DROP TABLE IF EXISTS `datasets_dataavailability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_dataavailability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_download`
--

DROP TABLE IF EXISTS `datasets_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `institute` longtext NOT NULL,
  `intended_use` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_datasets_download_user_id` (`user_id`),
  CONSTRAINT `FK_datasets_download_user_id` FOREIGN KEY (`user_id`) REFERENCES `datasets_person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_downloadedfile`
--

DROP TABLE IF EXISTS `datasets_downloadedfile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_downloadedfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `download_id` int(11) NOT NULL DEFAULT '0',
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `datasets_downloadedfile_30b991ec` (`download_id`),
  KEY `datasets_downloadedfile_2243e3be` (`file_id`),
  CONSTRAINT `FK_datasets_downloadedfile_download_id` FOREIGN KEY (`download_id`) REFERENCES `datasets_download` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_datasets_downloadedfile_file_id` FOREIGN KEY (`file_id`) REFERENCES `datasets_file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_downloadedresource`
--

DROP TABLE IF EXISTS `datasets_downloadedresource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_downloadedresource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `download_id` int(11) NOT NULL DEFAULT '0',
  `file_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `datasets_downloadedresource_30b991ec` (`download_id`),
  KEY `datasets_downloadedresource_2243e3be` (`file_id`),
  CONSTRAINT `FK_datasets_downloadedresource_download_id` FOREIGN KEY (`download_id`) REFERENCES `datasets_download` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_datasets_downloadedresource_resource_id` FOREIGN KEY (`file_id`) REFERENCES `datasets_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_downloadinstitutelocation`
--

DROP TABLE IF EXISTS `datasets_downloadinstitutelocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_downloadinstitutelocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `download_id` int(11) NOT NULL DEFAULT '0',
  `africa` tinyint(1) NOT NULL DEFAULT '0',
  `asia` tinyint(1) NOT NULL DEFAULT '0',
  `oceania` tinyint(1) NOT NULL DEFAULT '0',
  `central_america_caribbean` tinyint(1) NOT NULL DEFAULT '0',
  `europe` tinyint(1) NOT NULL DEFAULT '0',
  `middle_east_north_africa` tinyint(1) NOT NULL DEFAULT '0',
  `north_america` tinyint(1) NOT NULL DEFAULT '0',
  `south_america` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `datasets_downloadinstitutelocation_30b991ec` (`download_id`),
  CONSTRAINT `FK_datasets_downloadinstitutelocation_download_id` FOREIGN KEY (`download_id`) REFERENCES `datasets_download` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_downloadresearchlocation`
--

DROP TABLE IF EXISTS `datasets_downloadresearchlocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_downloadresearchlocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `download_id` int(11) NOT NULL DEFAULT '0',
  `africa` tinyint(1) NOT NULL DEFAULT '0',
  `asia` tinyint(1) NOT NULL DEFAULT '0',
  `oceania` tinyint(1) NOT NULL DEFAULT '0',
  `central_america_caribbean` tinyint(1) NOT NULL DEFAULT '0',
  `europe` tinyint(1) NOT NULL DEFAULT '0',
  `middle_east_north_africa` tinyint(1) NOT NULL DEFAULT '0',
  `north_america` tinyint(1) NOT NULL DEFAULT '0',
  `south_america` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `datasets_downloadresearchlocation_30b991ec` (`download_id`),
  CONSTRAINT `FK_datasets_downloadresearchlocation_download_id` FOREIGN KEY (`download_id`) REFERENCES `datasets_download` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_downscalingtecnique`
--

DROP TABLE IF EXISTS `datasets_downscalingtecnique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_downscalingtecnique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `references` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_extent`
--

DROP TABLE IF EXISTS `datasets_extent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_extent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_file`
--

DROP TABLE IF EXISTS `datasets_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `method_id` int(11) NOT NULL DEFAULT '0',
  `scenario_id` int(11) NOT NULL DEFAULT '0',
  `period_id` int(11) NOT NULL DEFAULT '0',
  `model_id` int(11) NOT NULL DEFAULT '0',
  `variable_id` int(11) NOT NULL DEFAULT '0',
  `resolution_id` int(11) NOT NULL DEFAULT '0',
  `format_id` int(11) NOT NULL DEFAULT '0',
  `file_set_id` int(11) NOT NULL DEFAULT '0',
  `extent_id` int(11) NOT NULL DEFAULT '0',
  `tile_id` int(11) NOT NULL,
  `local_url` longtext NOT NULL,
  `availability_status_id` int(11) NOT NULL DEFAULT '0',
  `size_bytes` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_datasets_file_availability_status_id` (`availability_status_id`),
  KEY `FK_datasets_file_file_set_id` (`file_set_id`),
  KEY `FK_datasets_file_format_id` (`format_id`),
  KEY `FK_datasets_file_method_id` (`method_id`),
  KEY `FK_datasets_file_model_id` (`model_id`),
  KEY `FK_datasets_file_period_id` (`period_id`),
  KEY `FK_datasets_file_region_id` (`extent_id`),
  KEY `FK_datasets_file_resolution_id` (`resolution_id`),
  KEY `FK_datasets_file_scenario_id` (`scenario_id`),
  KEY `FK_datasets_file_variable_id` (`variable_id`),
  KEY `FK_datasets_file_tile_id` (`tile_id`),
  CONSTRAINT `FK_datasets_file_availability_status_id` FOREIGN KEY (`availability_status_id`) REFERENCES `datasets_dataavailability` (`id`),
  CONSTRAINT `FK_datasets_file_extent_id` FOREIGN KEY (`extent_id`) REFERENCES `datasets_extent` (`id`),
  CONSTRAINT `FK_datasets_file_file_set_id` FOREIGN KEY (`file_set_id`) REFERENCES `datasets_fileset` (`id`),
  CONSTRAINT `FK_datasets_file_format_id` FOREIGN KEY (`format_id`) REFERENCES `datasets_format` (`id`),
  CONSTRAINT `FK_datasets_file_method_id` FOREIGN KEY (`method_id`) REFERENCES `datasets_method` (`id`),
  CONSTRAINT `FK_datasets_file_model_id` FOREIGN KEY (`model_id`) REFERENCES `datasets_model` (`id`),
  CONSTRAINT `FK_datasets_file_period_id` FOREIGN KEY (`period_id`) REFERENCES `datasets_period` (`id`),
  CONSTRAINT `FK_datasets_file_resolution_id` FOREIGN KEY (`resolution_id`) REFERENCES `datasets_resolution` (`id`),
  CONSTRAINT `FK_datasets_file_scenario_id` FOREIGN KEY (`scenario_id`) REFERENCES `datasets_scenario` (`id`),
  CONSTRAINT `FK_datasets_file_tile_id` FOREIGN KEY (`tile_id`) REFERENCES `datasets_tile` (`id`),
  CONSTRAINT `FK_datasets_file_variable_id` FOREIGN KEY (`variable_id`) REFERENCES `datasets_variable` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_fileset`
--

DROP TABLE IF EXISTS `datasets_fileset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_fileset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fileset_fileset_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_fileset_category`
--

DROP TABLE IF EXISTS `datasets_fileset_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_fileset_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_format`
--

DROP TABLE IF EXISTS `datasets_format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_gender`
--

DROP TABLE IF EXISTS `datasets_gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_institute`
--

DROP TABLE IF EXISTS `datasets_institute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_institute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `datasets_institute_534dd89` (`country_id`),
  CONSTRAINT `FK_datasets_institute_country_id` FOREIGN KEY (`country_id`) REFERENCES `datasets_country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_measurementunit`
--

DROP TABLE IF EXISTS `datasets_measurementunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_measurementunit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_metadata`
--

DROP TABLE IF EXISTS `datasets_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_data_id` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `institute_id` int(11) NOT NULL DEFAULT '0',
  `contact_person_id` int(11) NOT NULL DEFAULT '0',
  `mean` decimal(22,7) NOT NULL,
  `standar_deviation` decimal(22,7) NOT NULL,
  `minimum` decimal(22,7) NOT NULL,
  `maximum` decimal(22,7) NOT NULL,
  `number_rows` int(11) NOT NULL,
  `number_columns` int(11) NOT NULL,
  `x_min` decimal(19,7) NOT NULL,
  `y_min` decimal(22,7) NOT NULL,
  `x_max` decimal(22,7) NOT NULL,
  `y_max` decimal(22,7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `datasets_metadata_52627210` (`file_data_id`),
  KEY `datasets_metadata_da5f2290` (`institute_id`),
  KEY `datasets_metadata_a2fce082` (`contact_person_id`),
  CONSTRAINT `FK_datasets_metadata_contact_person_id` FOREIGN KEY (`contact_person_id`) REFERENCES `datasets_person` (`id`),
  CONSTRAINT `FK_datasets_metadata_institute_id` FOREIGN KEY (`institute_id`) REFERENCES `datasets_institute` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_method`
--

DROP TABLE IF EXISTS `datasets_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `references` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_model`
--

DROP TABLE IF EXISTS `datasets_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `institute_id` int(11) NOT NULL,
  `version` varchar(20) NOT NULL,
  `references` longtext NOT NULL,
  `atmosphere_resolution` varchar(20) NOT NULL,
  `ocean_resolution` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `datasets_model_da5f2290` (`institute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_period`
--

DROP TABLE IF EXISTS `datasets_period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `initial_year` varchar(4) NOT NULL,
  `final_year` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_person`
--

DROP TABLE IF EXISTS `datasets_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `registered` date NOT NULL,
  `email` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3525 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_resolution`
--

DROP TABLE IF EXISTS `datasets_resolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_resolution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `value` decimal(22,1) NOT NULL,
  `measurement_unit_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `datasets_resolution_1a7a2bb` (`measurement_unit_id`),
  CONSTRAINT `FK_datasets_resolution_measurement_unit_id` FOREIGN KEY (`measurement_unit_id`) REFERENCES `datasets_measurementunit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_resource`
--

DROP TABLE IF EXISTS `datasets_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `references` longtext NOT NULL,
  `version` varchar(20) NOT NULL,
  `size` varchar(100) NOT NULL,
  `local_url` longtext NOT NULL,
  `availability_status_id` int(11) NOT NULL DEFAULT '0',
  `size_bytes` bigint(20) DEFAULT NULL,
  `group_title` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datasets_resource_93b6237` (`availability_status_id`),
  CONSTRAINT `FK_datasets_resource_availability_status_id` FOREIGN KEY (`availability_status_id`) REFERENCES `datasets_dataavailability` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_scenario`
--

DROP TABLE IF EXISTS `datasets_scenario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_scenario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_tile`
--

DROP TABLE IF EXISTS `datasets_tile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_tile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `x_min` int(11) NOT NULL,
  `y_min` int(11) NOT NULL,
  `x_max` int(11) NOT NULL,
  `y_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datasets_variable`
--

DROP TABLE IF EXISTS `datasets_variable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasets_variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Current Database: `bioversity_stations`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bioversity_stations` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bioversity_stations`;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event` varchar(255) NOT NULL,
  `type_event` varchar(255) NOT NULL,
  `type_period` varchar(255) NOT NULL,
  `start_period` varchar(255) NOT NULL,
  `end_period` varchar(255) NOT NULL,
  `desc1` varchar(255) NOT NULL,
  `var1` varchar(255) NOT NULL,
  `desc2` varchar(255) NOT NULL,
  `var2` varchar(255) NOT NULL,
  `desc3` varchar(255) NOT NULL,
  `var3` varchar(255) NOT NULL,
  `desc4` varchar(255) NOT NULL,
  `var4` varchar(255) NOT NULL,
  `desc5` varchar(255) NOT NULL,
  `var5` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `infostations`
--

DROP TABLE IF EXISTS `infostations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infostations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `date` date NOT NULL,
  `week` int(11) NOT NULL,
  `julianDay` int(11) NOT NULL,
  `tmax` varchar(255) NOT NULL,
  `tmin` varchar(255) NOT NULL,
  `tmean` varchar(255) NOT NULL,
  `precipitation` varchar(255) NOT NULL,
  `humidRelativity` varchar(255) NOT NULL,
  `radiation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93063 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-04 22:05:21
