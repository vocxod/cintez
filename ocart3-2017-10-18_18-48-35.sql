-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: ocart3
-- ------------------------------------------------------
-- Server version	5.5.57-0+deb8u1

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
-- Table structure for table `oc_address`
--

DROP TABLE IF EXISTS `oc_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `company` varchar(40) NOT NULL,
  `address_1` varchar(128) NOT NULL,
  `address_2` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0',
  `zone_id` int(11) NOT NULL DEFAULT '0',
  `custom_field` text NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_address`
--

LOCK TABLES `oc_address` WRITE;
/*!40000 ALTER TABLE `oc_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_api`
--

DROP TABLE IF EXISTS `oc_api`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_api` (
  `api_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `key` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`api_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_api`
--

LOCK TABLES `oc_api` WRITE;
/*!40000 ALTER TABLE `oc_api` DISABLE KEYS */;
INSERT INTO `oc_api` VALUES (1,'Default','e917488de72c59bb586cda9304090f384e426253a20de2cd7f9426adfd0ab6167dfac90fac2a69ea6d41ac36eabbc71d4d1d5aa365b01331ab4c8cb4641d1a72b35a7043abe106f568e82d2b4fd13fa23b1da3ab78c62129c652d91b3608ba76e0c3c01fcdecd770269e746456fc7e4069b40920eb18957096da401b5d1a0f1b',1,'2017-09-21 08:03:15','2017-09-21 08:03:15');
/*!40000 ALTER TABLE `oc_api` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_api_ip`
--

DROP TABLE IF EXISTS `oc_api_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_api_ip` (
  `api_ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  PRIMARY KEY (`api_ip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_api_ip`
--

LOCK TABLES `oc_api_ip` WRITE;
/*!40000 ALTER TABLE `oc_api_ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_api_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_api_session`
--

DROP TABLE IF EXISTS `oc_api_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_api_session` (
  `api_session_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_id` int(11) NOT NULL,
  `session_id` varchar(32) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`api_session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_api_session`
--

LOCK TABLES `oc_api_session` WRITE;
/*!40000 ALTER TABLE `oc_api_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_api_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_attribute`
--

DROP TABLE IF EXISTS `oc_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_attribute` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_group_id` int(11) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_attribute`
--

LOCK TABLES `oc_attribute` WRITE;
/*!40000 ALTER TABLE `oc_attribute` DISABLE KEYS */;
INSERT INTO `oc_attribute` VALUES (1,6,1),(2,6,5),(3,6,3),(4,3,1),(5,3,2),(6,3,3),(7,3,4),(8,3,5),(9,3,6),(10,3,7),(11,3,8);
/*!40000 ALTER TABLE `oc_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_attribute_description`
--

DROP TABLE IF EXISTS `oc_attribute_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_attribute_description` (
  `attribute_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`attribute_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_attribute_description`
--

LOCK TABLES `oc_attribute_description` WRITE;
/*!40000 ALTER TABLE `oc_attribute_description` DISABLE KEYS */;
INSERT INTO `oc_attribute_description` VALUES (1,1,'Description'),(2,1,'No. of Cores'),(4,1,'test 1'),(5,1,'test 2'),(6,1,'test 3'),(7,1,'test 4'),(8,1,'test 5'),(9,1,'test 6'),(10,1,'test 7'),(11,1,'test 8'),(3,1,'Clockspeed'),(1,2,'Description'),(2,2,'No. of Cores'),(4,2,'test 1'),(5,2,'test 2'),(6,2,'test 3'),(7,2,'test 4'),(8,2,'test 5'),(9,2,'test 6'),(10,2,'test 7'),(11,2,'test 8'),(3,2,'Clockspeed'),(1,3,'Description'),(2,3,'No. of Cores'),(4,3,'test 1'),(5,3,'test 2'),(6,3,'test 3'),(7,3,'test 4'),(8,3,'test 5'),(9,3,'test 6'),(10,3,'test 7'),(11,3,'test 8'),(3,3,'Clockspeed'),(1,4,'Description'),(2,4,'No. of Cores'),(4,4,'test 1'),(5,4,'test 2'),(6,4,'test 3'),(7,4,'test 4'),(8,4,'test 5'),(9,4,'test 6'),(10,4,'test 7'),(11,4,'test 8'),(3,4,'Clockspeed');
/*!40000 ALTER TABLE `oc_attribute_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_attribute_group`
--

DROP TABLE IF EXISTS `oc_attribute_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_attribute_group` (
  `attribute_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`attribute_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_attribute_group`
--

LOCK TABLES `oc_attribute_group` WRITE;
/*!40000 ALTER TABLE `oc_attribute_group` DISABLE KEYS */;
INSERT INTO `oc_attribute_group` VALUES (3,2),(4,1),(5,3),(6,4);
/*!40000 ALTER TABLE `oc_attribute_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_attribute_group_description`
--

DROP TABLE IF EXISTS `oc_attribute_group_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_attribute_group_description` (
  `attribute_group_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`attribute_group_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_attribute_group_description`
--

LOCK TABLES `oc_attribute_group_description` WRITE;
/*!40000 ALTER TABLE `oc_attribute_group_description` DISABLE KEYS */;
INSERT INTO `oc_attribute_group_description` VALUES (3,1,'Memory'),(4,1,'Technical'),(5,1,'Motherboard'),(6,1,'Processor'),(3,2,'Memory'),(4,2,'Technical'),(5,2,'Motherboard'),(6,2,'Processor'),(3,3,'Memory'),(4,3,'Technical'),(5,3,'Motherboard'),(6,3,'Processor'),(3,4,'Memory'),(4,4,'Technical'),(5,4,'Motherboard'),(6,4,'Processor');
/*!40000 ALTER TABLE `oc_attribute_group_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_banner`
--

DROP TABLE IF EXISTS `oc_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_banner`
--

LOCK TABLES `oc_banner` WRITE;
/*!40000 ALTER TABLE `oc_banner` DISABLE KEYS */;
INSERT INTO `oc_banner` VALUES (6,'HP Products',1),(7,'Баннер главной страницы (картинки)',1),(8,'Manufacturers',1);
/*!40000 ALTER TABLE `oc_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_banner_image`
--

DROP TABLE IF EXISTS `oc_banner_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_banner_image` (
  `banner_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`banner_image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_banner_image`
--

LOCK TABLES `oc_banner_image` WRITE;
/*!40000 ALTER TABLE `oc_banner_image` DISABLE KEYS */;
INSERT INTO `oc_banner_image` VALUES (152,7,4,'Товарное предложение 1','index.php','catalog/slider/slider-image-4.png',0),(87,6,1,'HP Banner','index.php?route=product/manufacturer/info&amp;manufacturer_id=7','catalog/demo/compaq_presario.jpg',0),(94,8,1,'NFL','','catalog/demo/manufacturer/nfl.png',0),(95,8,1,'RedBull','','catalog/demo/manufacturer/redbull.png',0),(96,8,1,'Sony','','catalog/demo/manufacturer/sony.png',0),(91,8,1,'Coca Cola','','catalog/demo/manufacturer/cocacola.png',0),(92,8,1,'Burger King','','catalog/demo/manufacturer/burgerking.png',0),(93,8,1,'Canon','','catalog/demo/manufacturer/canon.png',0),(88,8,1,'Harley Davidson','','catalog/demo/manufacturer/harley.png',0),(89,8,1,'Dell','','catalog/demo/manufacturer/dell.png',0),(90,8,1,'Disney','','catalog/demo/manufacturer/disney.png',0),(151,7,4,'Товарное предложение 2','index.php','catalog/slider/slider-image-2.png',0),(97,8,1,'Starbucks','','catalog/demo/manufacturer/starbucks.png',0),(98,8,1,'Nintendo','','catalog/demo/manufacturer/nintendo.png',0),(150,7,4,'Товарное предложение 3','index.php','catalog/slider/slider-image-1.png',0),(100,6,2,'HP Banner','index.php?route=product/manufacturer/info&amp;manufacturer_id=7','catalog/demo/compaq_presario.jpg',0),(101,8,2,'NFL','','catalog/demo/manufacturer/nfl.png',0),(102,8,2,'RedBull','','catalog/demo/manufacturer/redbull.png',0),(103,8,2,'Sony','','catalog/demo/manufacturer/sony.png',0),(104,8,2,'Coca Cola','','catalog/demo/manufacturer/cocacola.png',0),(105,8,2,'Burger King','','catalog/demo/manufacturer/burgerking.png',0),(106,8,2,'Canon','','catalog/demo/manufacturer/canon.png',0),(107,8,2,'Harley Davidson','','catalog/demo/manufacturer/harley.png',0),(108,8,2,'Dell','','catalog/demo/manufacturer/dell.png',0),(109,8,2,'Disney','','catalog/demo/manufacturer/disney.png',0),(111,8,2,'Starbucks','','catalog/demo/manufacturer/starbucks.png',0),(112,8,2,'Nintendo','','catalog/demo/manufacturer/nintendo.png',0),(149,7,4,'Товарное предложение 4','index.php','catalog/slider/slider-image-3.png',0),(114,6,3,'HP Banner','index.php?route=product/manufacturer/info&amp;manufacturer_id=7','catalog/demo/compaq_presario.jpg',0),(115,8,3,'NFL','','catalog/demo/manufacturer/nfl.png',0),(116,8,3,'RedBull','','catalog/demo/manufacturer/redbull.png',0),(117,8,3,'Sony','','catalog/demo/manufacturer/sony.png',0),(118,8,3,'Coca Cola','','catalog/demo/manufacturer/cocacola.png',0),(119,8,3,'Burger King','','catalog/demo/manufacturer/burgerking.png',0),(120,8,3,'Canon','','catalog/demo/manufacturer/canon.png',0),(121,8,3,'Harley Davidson','','catalog/demo/manufacturer/harley.png',0),(122,8,3,'Dell','','catalog/demo/manufacturer/dell.png',0),(123,8,3,'Disney','','catalog/demo/manufacturer/disney.png',0),(125,8,3,'Starbucks','','catalog/demo/manufacturer/starbucks.png',0),(126,8,3,'Nintendo','','catalog/demo/manufacturer/nintendo.png',0),(147,7,1,'Товарное предложение 1','index.php','catalog/slider/slider-image-1.png',0),(128,6,4,'HP Banner','index.php?route=product/manufacturer/info&amp;manufacturer_id=7','catalog/demo/compaq_presario.jpg',0),(129,8,4,'NFL','','catalog/demo/manufacturer/nfl.png',0),(130,8,4,'RedBull','','catalog/demo/manufacturer/redbull.png',0),(131,8,4,'Sony','','catalog/demo/manufacturer/sony.png',0),(132,8,4,'Coca Cola','','catalog/demo/manufacturer/cocacola.png',0),(133,8,4,'Burger King','','catalog/demo/manufacturer/burgerking.png',0),(134,8,4,'Canon','','catalog/demo/manufacturer/canon.png',0),(135,8,4,'Harley Davidson','','catalog/demo/manufacturer/harley.png',0),(136,8,4,'Dell','','catalog/demo/manufacturer/dell.png',0),(137,8,4,'Disney','','catalog/demo/manufacturer/disney.png',0),(148,7,1,'iPhone 6','index.php?route=product/product&amp;path=57&amp;product_id=49','catalog/demo/banners/iPhone6.jpg',0),(139,8,4,'Starbucks','','catalog/demo/manufacturer/starbucks.png',0),(140,8,4,'Nintendo','','catalog/demo/manufacturer/nintendo.png',0);
/*!40000 ALTER TABLE `oc_banner_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_cart`
--

DROP TABLE IF EXISTS `oc_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_cart` (
  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `session_id` varchar(32) NOT NULL,
  `product_id` int(11) NOT NULL,
  `recurring_id` int(11) NOT NULL,
  `option` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`),
  KEY `cart_id` (`api_id`,`customer_id`,`session_id`,`product_id`,`recurring_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_cart`
--

LOCK TABLES `oc_cart` WRITE;
/*!40000 ALTER TABLE `oc_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_category`
--

DROP TABLE IF EXISTS `oc_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL,
  `column` int(3) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`category_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_category`
--

LOCK TABLES `oc_category` WRITE;
/*!40000 ALTER TABLE `oc_category` DISABLE KEYS */;
INSERT INTO `oc_category` VALUES (69,'catalog/min-icons-category/category-1-heat.png',0,1,1,12,1,'2017-10-17 19:28:08','2017-10-17 19:28:08'),(61,'catalog/min-icons-category/category-01-food.png',0,1,1,3,1,'2017-10-17 19:24:16','2017-10-17 19:24:16'),(68,'catalog/min-icons-category/category-1-car.png',0,1,1,10,1,'2017-10-17 19:28:47','2017-10-17 19:28:47'),(70,'',63,0,1,0,1,'2017-10-14 13:20:20','2017-10-14 13:20:20'),(62,'catalog/min-icons-category/category-1-horega.png',0,1,1,4,1,'2017-10-17 19:25:34','2017-10-17 19:25:34'),(67,'catalog/min-icons-category/category-1-farm.png',0,1,1,9,1,'2017-10-17 19:23:34','2017-10-17 19:23:34'),(66,'catalog/min-icons-category/category-1-clining.png',0,1,1,8,1,'2017-10-17 19:22:55','2017-10-17 19:22:55'),(65,'catalog/min-icons-category/category-1-scool.png',0,1,1,7,1,'2017-10-17 19:26:51','2017-10-17 19:26:51'),(64,'catalog/categories/category-1-job.png',0,1,1,16,1,'2017-10-15 15:37:59','2017-10-15 15:37:59'),(63,'catalog/min-icons-category/category-1-metall.png',0,1,1,5,1,'2017-10-17 19:26:12','2017-10-17 19:26:12'),(60,'catalog/min-icons-category/category-1-spa.png',0,1,1,2,1,'2017-10-17 19:27:29','2017-10-17 19:27:29'),(59,'catalog/min-icons-category/category-1-health.png',0,1,1,1,1,'2017-10-17 19:24:53','2017-10-17 19:24:53'),(71,'',63,0,1,2,1,'2017-10-14 13:21:42','2017-10-14 13:21:42');
/*!40000 ALTER TABLE `oc_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_category_description`
--

DROP TABLE IF EXISTS `oc_category_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_category_description` (
  `category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`,`language_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_category_description`
--

LOCK TABLES `oc_category_description` WRITE;
/*!40000 ALTER TABLE `oc_category_description` DISABLE KEYS */;
INSERT INTO `oc_category_description` VALUES (65,1,'Scool','Scool&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Scool','Scool','Scool'),(65,4,'Школы и детские сады','Школы и детские сады&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Школы и детские сады','Школы и детские сады','Школы и детские сады'),(61,4,'Пищевая промышленность','Пищевая промышленность&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Пищевая промышленность','Пищевая промышленность','Пищевая промышленность'),(62,4,'HoReCa','HoReCa&lt;p&gt;&lt;br&gt;&lt;/p&gt;','HoReCa','HoReCa','HoReCa'),(63,1,'Metall','Metall&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Metall','Metall','Metall'),(63,4,'Машиностроение и металлургия','Машиностроение и металлургия&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Машиностроение и металлургия','Машиностроение и металлургия','Машиностроение и металлургия'),(70,4,'Обезжиривание деталей','Обезжиривание деталей&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Обезжиривание деталей','Обезжиривание деталей','Обезжиривание деталей'),(70,1,'Zhir less','Zhir less&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Zhir less','Zhir less','Zhir less'),(62,1,'HoReCa','HoReCa&lt;p&gt;&lt;br&gt;&lt;/p&gt;','HoReCa','HoReCa','HoReCa'),(64,1,'Jod defence','Jod defence&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Jod defence','Jod defence','Jod defence'),(64,4,'Охрана труда','Охрана труда&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Охрана труда','Охрана труда','Охрана труда'),(71,1,'Manuf clining','Manuf clining&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Manuf clining','Manuf clining','Manuf clining'),(71,4,'Промышленный клиниг','Промышленный клиниг&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Промышленный клиниг','Промышленный клиниг','Промышленный клиниг'),(60,1,'SPA','&lt;p&gt;SPA&lt;br&gt;&lt;/p&gt;','SPA','SPA','SPA'),(60,4,'Салоны красоты и SPA','&lt;p&gt;Салоны красоты и SPA&amp;nbsp;&amp;nbsp; &lt;br&gt;&lt;/p&gt;','SPA','SPA','SPA'),(61,1,'Food','&lt;p&gt;Food&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;/p&gt;','Food','Food','Food'),(66,1,'Clining','Clining&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Clining','Clining','Clining'),(66,4,'Клининг','Клининг&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Клининг','Клининг','Клининг'),(67,1,'Farm','Farm&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Farm','Farm','Farm'),(67,4,'Сельское хозяйство','Сельское хозяйство&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Сельское хозяйство','Сельское хозяйство','Сельское хозяйство'),(68,1,'Transport','Transport&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Transport','Transport','Transport'),(68,4,'Транспорт','Транспорт&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Транспорт','Транспорт','Транспорт'),(69,1,'Teplo service','Teplo service&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Teplo service','Teplo service','Teplo service'),(69,4,'Обслуживание теплообменного оборудования','Обслуживание теплообменного оборудования&lt;p&gt;&lt;br&gt;&lt;/p&gt;','Обслуживание теплообменного оборудования','Обслуживание теплообменного оборудования','Обслуживание теплообменного оборудования'),(59,1,'Health','Health','Health','Health','Health'),(59,4,'Учреждения здравохранения','Учреждения здравохранения','Учреждения здравохранения','Учреждения здравохранения','Учреждения здравохранения');
/*!40000 ALTER TABLE `oc_category_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_category_filter`
--

DROP TABLE IF EXISTS `oc_category_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_category_filter` (
  `category_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`filter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_category_filter`
--

LOCK TABLES `oc_category_filter` WRITE;
/*!40000 ALTER TABLE `oc_category_filter` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_category_filter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_category_path`
--

DROP TABLE IF EXISTS `oc_category_path`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_category_path` (
  `category_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`path_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_category_path`
--

LOCK TABLES `oc_category_path` WRITE;
/*!40000 ALTER TABLE `oc_category_path` DISABLE KEYS */;
INSERT INTO `oc_category_path` VALUES (62,62,0),(61,61,0),(71,71,1),(71,63,0),(70,70,1),(70,63,0),(69,69,0),(68,68,0),(67,67,0),(66,66,0),(65,65,0),(64,64,0),(63,63,0),(60,60,0),(59,59,0);
/*!40000 ALTER TABLE `oc_category_path` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_category_to_layout`
--

DROP TABLE IF EXISTS `oc_category_to_layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_category_to_layout` (
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_category_to_layout`
--

LOCK TABLES `oc_category_to_layout` WRITE;
/*!40000 ALTER TABLE `oc_category_to_layout` DISABLE KEYS */;
INSERT INTO `oc_category_to_layout` VALUES (59,0,0),(60,0,0),(61,0,0),(62,0,0),(63,0,0),(64,0,0),(65,0,0),(66,0,0),(67,0,0),(68,0,0),(69,0,0),(70,0,0),(71,0,0);
/*!40000 ALTER TABLE `oc_category_to_layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_category_to_store`
--

DROP TABLE IF EXISTS `oc_category_to_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_category_to_store` (
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_category_to_store`
--

LOCK TABLES `oc_category_to_store` WRITE;
/*!40000 ALTER TABLE `oc_category_to_store` DISABLE KEYS */;
INSERT INTO `oc_category_to_store` VALUES (59,0),(60,0),(61,0),(62,0),(63,0),(64,0),(65,0),(66,0),(67,0),(68,0),(69,0),(70,0),(71,0);
/*!40000 ALTER TABLE `oc_category_to_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_country`
--

DROP TABLE IF EXISTS `oc_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `iso_code_2` varchar(2) NOT NULL,
  `iso_code_3` varchar(3) NOT NULL,
  `address_format` text NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_country`
--

LOCK TABLES `oc_country` WRITE;
/*!40000 ALTER TABLE `oc_country` DISABLE KEYS */;
INSERT INTO `oc_country` VALUES (176,'Russian Federation','RU','RUS','',0,1),(223,'United States','US','USA','{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city}, {zone} {postcode}\r\n{country}',0,0);
/*!40000 ALTER TABLE `oc_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_coupon`
--

DROP TABLE IF EXISTS `oc_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type` char(1) NOT NULL,
  `discount` decimal(15,4) NOT NULL,
  `logged` tinyint(1) NOT NULL,
  `shipping` tinyint(1) NOT NULL,
  `total` decimal(15,4) NOT NULL,
  `date_start` date NOT NULL DEFAULT '0000-00-00',
  `date_end` date NOT NULL DEFAULT '0000-00-00',
  `uses_total` int(11) NOT NULL,
  `uses_customer` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_coupon`
--

LOCK TABLES `oc_coupon` WRITE;
/*!40000 ALTER TABLE `oc_coupon` DISABLE KEYS */;
INSERT INTO `oc_coupon` VALUES (4,'-10% Discount','2222','P',10.0000,0,0,0.0000,'2014-01-01','2020-01-01',10,'10',0,'2009-01-27 10:55:03'),(5,'Free Shipping','3333','P',0.0000,0,1,100.0000,'2014-01-01','2014-02-01',10,'10',0,'2009-03-14 18:13:53'),(6,'-10.00 Discount','1111','F',10.0000,0,0,10.0000,'2014-01-01','2020-01-01',100000,'10000',0,'2009-03-14 18:15:18');
/*!40000 ALTER TABLE `oc_coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_coupon_category`
--

DROP TABLE IF EXISTS `oc_coupon_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_coupon_category` (
  `coupon_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`coupon_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_coupon_category`
--

LOCK TABLES `oc_coupon_category` WRITE;
/*!40000 ALTER TABLE `oc_coupon_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_coupon_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_coupon_history`
--

DROP TABLE IF EXISTS `oc_coupon_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_coupon_history` (
  `coupon_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`coupon_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_coupon_history`
--

LOCK TABLES `oc_coupon_history` WRITE;
/*!40000 ALTER TABLE `oc_coupon_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_coupon_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_coupon_product`
--

DROP TABLE IF EXISTS `oc_coupon_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_coupon_product` (
  `coupon_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`coupon_product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_coupon_product`
--

LOCK TABLES `oc_coupon_product` WRITE;
/*!40000 ALTER TABLE `oc_coupon_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_coupon_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_cron`
--

DROP TABLE IF EXISTS `oc_cron`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_cron` (
  `cron_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `cycle` varchar(12) NOT NULL,
  `action` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cron_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_cron`
--

LOCK TABLES `oc_cron` WRITE;
/*!40000 ALTER TABLE `oc_cron` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_cron` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_currency`
--

DROP TABLE IF EXISTS `oc_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol_left` varchar(12) NOT NULL,
  `symbol_right` varchar(12) NOT NULL,
  `decimal_place` char(1) NOT NULL,
  `value` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_currency`
--

LOCK TABLES `oc_currency` WRITE;
/*!40000 ALTER TABLE `oc_currency` DISABLE KEYS */;
INSERT INTO `oc_currency` VALUES (4,'Руб','RUR','','=','0',1.00000000,1,'2017-10-15 13:38:39'),(2,'US Dollar','USD','$','','2',1.00000000,1,'2017-09-22 17:13:48');
/*!40000 ALTER TABLE `oc_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_custom_field`
--

DROP TABLE IF EXISTS `oc_custom_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_custom_field` (
  `custom_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `value` text NOT NULL,
  `validation` varchar(255) NOT NULL,
  `location` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`custom_field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_custom_field`
--

LOCK TABLES `oc_custom_field` WRITE;
/*!40000 ALTER TABLE `oc_custom_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_custom_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_custom_field_customer_group`
--

DROP TABLE IF EXISTS `oc_custom_field_customer_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_custom_field_customer_group` (
  `custom_field_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `required` tinyint(1) NOT NULL,
  PRIMARY KEY (`custom_field_id`,`customer_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_custom_field_customer_group`
--

LOCK TABLES `oc_custom_field_customer_group` WRITE;
/*!40000 ALTER TABLE `oc_custom_field_customer_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_custom_field_customer_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_custom_field_description`
--

DROP TABLE IF EXISTS `oc_custom_field_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_custom_field_description` (
  `custom_field_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`custom_field_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_custom_field_description`
--

LOCK TABLES `oc_custom_field_description` WRITE;
/*!40000 ALTER TABLE `oc_custom_field_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_custom_field_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_custom_field_value`
--

DROP TABLE IF EXISTS `oc_custom_field_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_custom_field_value` (
  `custom_field_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_field_id` int(11) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`custom_field_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_custom_field_value`
--

LOCK TABLES `oc_custom_field_value` WRITE;
/*!40000 ALTER TABLE `oc_custom_field_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_custom_field_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_custom_field_value_description`
--

DROP TABLE IF EXISTS `oc_custom_field_value_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_custom_field_value_description` (
  `custom_field_value_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `custom_field_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`custom_field_value_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_custom_field_value_description`
--

LOCK TABLES `oc_custom_field_value_description` WRITE;
/*!40000 ALTER TABLE `oc_custom_field_value_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_custom_field_value_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer`
--

DROP TABLE IF EXISTS `oc_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_group_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `cart` text,
  `wishlist` text,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `address_id` int(11) NOT NULL DEFAULT '0',
  `custom_field` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `safe` tinyint(1) NOT NULL,
  `token` text NOT NULL,
  `code` varchar(40) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer`
--

LOCK TABLES `oc_customer` WRITE;
/*!40000 ALTER TABLE `oc_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_activity`
--

DROP TABLE IF EXISTS `oc_customer_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_activity` (
  `customer_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `data` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_activity`
--

LOCK TABLES `oc_customer_activity` WRITE;
/*!40000 ALTER TABLE `oc_customer_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_affiliate`
--

DROP TABLE IF EXISTS `oc_customer_affiliate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_affiliate` (
  `customer_id` int(11) NOT NULL,
  `company` varchar(40) NOT NULL,
  `website` varchar(255) NOT NULL,
  `tracking` varchar(64) NOT NULL,
  `commission` decimal(4,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(64) NOT NULL,
  `payment` varchar(6) NOT NULL,
  `cheque` varchar(100) NOT NULL,
  `paypal` varchar(64) NOT NULL,
  `bank_name` varchar(64) NOT NULL,
  `bank_branch_number` varchar(64) NOT NULL,
  `bank_swift_code` varchar(64) NOT NULL,
  `bank_account_name` varchar(64) NOT NULL,
  `bank_account_number` varchar(64) NOT NULL,
  `custom_field` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_affiliate`
--

LOCK TABLES `oc_customer_affiliate` WRITE;
/*!40000 ALTER TABLE `oc_customer_affiliate` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_affiliate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_approval`
--

DROP TABLE IF EXISTS `oc_customer_approval`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_approval` (
  `customer_approval_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `type` varchar(9) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_approval_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_approval`
--

LOCK TABLES `oc_customer_approval` WRITE;
/*!40000 ALTER TABLE `oc_customer_approval` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_approval` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_group`
--

DROP TABLE IF EXISTS `oc_customer_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_group` (
  `customer_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `approval` int(1) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`customer_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_group`
--

LOCK TABLES `oc_customer_group` WRITE;
/*!40000 ALTER TABLE `oc_customer_group` DISABLE KEYS */;
INSERT INTO `oc_customer_group` VALUES (1,0,1);
/*!40000 ALTER TABLE `oc_customer_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_group_description`
--

DROP TABLE IF EXISTS `oc_customer_group_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_group_description` (
  `customer_group_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`customer_group_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_group_description`
--

LOCK TABLES `oc_customer_group_description` WRITE;
/*!40000 ALTER TABLE `oc_customer_group_description` DISABLE KEYS */;
INSERT INTO `oc_customer_group_description` VALUES (1,1,'Default','test'),(1,2,'Default','test'),(1,3,'Default','test'),(1,4,'Default','test');
/*!40000 ALTER TABLE `oc_customer_group_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_history`
--

DROP TABLE IF EXISTS `oc_customer_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_history` (
  `customer_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_history`
--

LOCK TABLES `oc_customer_history` WRITE;
/*!40000 ALTER TABLE `oc_customer_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_ip`
--

DROP TABLE IF EXISTS `oc_customer_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_ip` (
  `customer_ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_ip_id`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_ip`
--

LOCK TABLES `oc_customer_ip` WRITE;
/*!40000 ALTER TABLE `oc_customer_ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_login`
--

DROP TABLE IF EXISTS `oc_customer_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_login` (
  `customer_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(96) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `total` int(4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`customer_login_id`),
  KEY `email` (`email`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_login`
--

LOCK TABLES `oc_customer_login` WRITE;
/*!40000 ALTER TABLE `oc_customer_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_online`
--

DROP TABLE IF EXISTS `oc_customer_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_online` (
  `ip` varchar(40) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `referer` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_online`
--

LOCK TABLES `oc_customer_online` WRITE;
/*!40000 ALTER TABLE `oc_customer_online` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_reward`
--

DROP TABLE IF EXISTS `oc_customer_reward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_reward` (
  `customer_reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `points` int(8) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_reward_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_reward`
--

LOCK TABLES `oc_customer_reward` WRITE;
/*!40000 ALTER TABLE `oc_customer_reward` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_reward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_search`
--

DROP TABLE IF EXISTS `oc_customer_search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_search` (
  `customer_search_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category` tinyint(1) NOT NULL,
  `description` tinyint(1) NOT NULL,
  `products` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_search_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_search`
--

LOCK TABLES `oc_customer_search` WRITE;
/*!40000 ALTER TABLE `oc_customer_search` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_transaction`
--

DROP TABLE IF EXISTS `oc_customer_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_transaction` (
  `customer_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_transaction`
--

LOCK TABLES `oc_customer_transaction` WRITE;
/*!40000 ALTER TABLE `oc_customer_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_customer_wishlist`
--

DROP TABLE IF EXISTS `oc_customer_wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_customer_wishlist` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_customer_wishlist`
--

LOCK TABLES `oc_customer_wishlist` WRITE;
/*!40000 ALTER TABLE `oc_customer_wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_customer_wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_download`
--

DROP TABLE IF EXISTS `oc_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_download` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(160) NOT NULL,
  `mask` varchar(128) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`download_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_download`
--

LOCK TABLES `oc_download` WRITE;
/*!40000 ALTER TABLE `oc_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_download_description`
--

DROP TABLE IF EXISTS `oc_download_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_download_description` (
  `download_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`download_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_download_description`
--

LOCK TABLES `oc_download_description` WRITE;
/*!40000 ALTER TABLE `oc_download_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_download_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_event`
--

DROP TABLE IF EXISTS `oc_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `trigger` text NOT NULL,
  `action` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_event`
--

LOCK TABLES `oc_event` WRITE;
/*!40000 ALTER TABLE `oc_event` DISABLE KEYS */;
INSERT INTO `oc_event` VALUES (1,'activity_customer_add','catalog/model/account/customer/addCustomer/after','event/activity/addCustomer',1,0),(2,'activity_customer_edit','catalog/model/account/customer/editCustomer/after','event/activity/editCustomer',1,0),(3,'activity_customer_password','catalog/model/account/customer/editPassword/after','event/activity/editPassword',1,0),(4,'activity_customer_forgotten','catalog/model/account/customer/editCode/after','event/activity/forgotten',1,0),(5,'activity_transaction','catalog/model/account/customer/addTransaction/after','event/activity/addTransaction',1,0),(6,'activity_customer_login','catalog/model/account/customer/deleteLoginAttempts/after','event/activity/login',1,0),(7,'activity_address_add','catalog/model/account/address/addAddress/after','event/activity/addAddress',1,0),(8,'activity_address_edit','catalog/model/account/address/editAddress/after','event/activity/editAddress',1,0),(9,'activity_address_delete','catalog/model/account/address/deleteAddress/after','event/activity/deleteAddress',1,0),(10,'activity_affiliate_add','catalog/model/account/customer/addAffiliate/after','event/activity/addAffiliate',1,0),(11,'activity_affiliate_edit','catalog/model/account/customer/editAffiliate/after','event/activity/editAffiliate',1,0),(12,'activity_order_add','catalog/model/checkout/order/addOrderHistory/before','event/activity/addOrderHistory',1,0),(13,'activity_return_add','catalog/model/account/return/addReturn/after','event/activity/addReturn',1,0),(14,'mail_transaction','catalog/model/account/customer/addTransaction/after','mail/transaction',1,0),(15,'mail_forgotten','catalog/model/account/customer/editCode/after','mail/forgotten',1,0),(16,'mail_customer_add','catalog/model/account/customer/addCustomer/after','mail/register',1,0),(17,'mail_customer_alert','catalog/model/account/customer/addCustomer/after','mail/register/alert',1,0),(18,'mail_affiliate_add','catalog/model/account/customer/addAffiliate/after','mail/affiliate',1,0),(19,'mail_affiliate_alert','catalog/model/account/customer/addAffiliate/after','mail/affiliate/alert',1,0),(20,'mail_voucher','catalog/model/checkout/order/addOrderHistory/after','extension/total/voucher/send',1,0),(21,'mail_order_add','catalog/model/checkout/order/addOrderHistory/before','mail/order',1,0),(22,'mail_order_alert','catalog/model/checkout/order/addOrderHistory/before','mail/order/alert',1,0),(23,'statistics_review_add','catalog/model/catalog/review/addReview/after','event/statistics/addReview',1,0),(24,'statistics_return_add','catalog/model/account/return/addReturn/after','event/statistics/addReturn',1,0),(25,'statistics_order_history','catalog/model/checkout/order/addOrderHistory/after','event/statistics/addOrderHistory',1,0),(26,'admin_mail_affiliate_approve','admin/model/customer/customer_approval/approveAffiliate/after','mail/affiliate/approve',1,0),(27,'admin_mail_affiliate_deny','admin/model/customer/customer_approval/denyAffiliate/after','mail/affiliate/deny',1,0),(28,'admin_mail_customer_approve','admin/model/customer/customer_approval/approveCustomer/after','mail/customer/approve',1,0),(29,'admin_mail_customer_deny','admin/model/customer/customer_approval/denyCustomer/after','mail/customer/deny',1,0),(30,'admin_mail_reward','admin/model/customer/customer/addReward/after','mail/reward',1,0),(31,'admin_mail_transaction','admin/model/customer/customer/addTransaction/after','mail/transaction',1,0),(32,'admin_mail_return','admin/model/sale/return/addReturn/after','mail/return',1,0),(33,'admin_mail_forgotten','admin/model/user/user/editCode/after','mail/forgotten',1,0);
/*!40000 ALTER TABLE `oc_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_extension`
--

DROP TABLE IF EXISTS `oc_extension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_extension` (
  `extension_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  PRIMARY KEY (`extension_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_extension`
--

LOCK TABLES `oc_extension` WRITE;
/*!40000 ALTER TABLE `oc_extension` DISABLE KEYS */;
INSERT INTO `oc_extension` VALUES (1,'payment','cod'),(2,'total','shipping'),(3,'total','sub_total'),(4,'total','tax'),(5,'total','total'),(6,'module','banner'),(7,'module','carousel'),(8,'total','credit'),(9,'shipping','flat'),(10,'total','handling'),(11,'total','low_order_fee'),(12,'total','coupon'),(13,'module','category'),(14,'module','account'),(15,'total','reward'),(16,'total','voucher'),(17,'payment','free_checkout'),(18,'module','featured'),(19,'module','slideshow'),(20,'theme','default'),(21,'dashboard','activity'),(22,'dashboard','sale'),(23,'dashboard','recent'),(24,'dashboard','order'),(25,'dashboard','online'),(26,'dashboard','map'),(27,'dashboard','customer'),(28,'dashboard','chart'),(29,'report','sale_coupon'),(31,'report','customer_search'),(32,'report','customer_transaction'),(33,'report','product_purchased'),(34,'report','product_viewed'),(35,'report','sale_return'),(36,'report','sale_order'),(37,'report','sale_shipping'),(38,'report','sale_tax'),(39,'report','customer_activity'),(40,'report','customer_order'),(41,'report','customer_reward'),(43,'module','bestseller'),(44,'module','newslatest');
/*!40000 ALTER TABLE `oc_extension` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_extension_install`
--

DROP TABLE IF EXISTS `oc_extension_install`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_extension_install` (
  `extension_install_id` int(11) NOT NULL AUTO_INCREMENT,
  `extension_id` int(11) NOT NULL,
  `extension_download_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`extension_install_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_extension_install`
--

LOCK TABLES `oc_extension_install` WRITE;
/*!40000 ALTER TABLE `oc_extension_install` DISABLE KEYS */;
INSERT INTO `oc_extension_install` VALUES (6,0,0,'russian_oc3.ocmod.zip','2017-10-16 12:15:42'),(3,0,0,'localcopy_oc3.ocmod.zip','2017-10-16 12:08:14');
/*!40000 ALTER TABLE `oc_extension_install` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_extension_path`
--

DROP TABLE IF EXISTS `oc_extension_path`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_extension_path` (
  `extension_path_id` int(11) NOT NULL AUTO_INCREMENT,
  `extension_install_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`extension_path_id`)
) ENGINE=MyISAM AUTO_INCREMENT=306 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_extension_path`
--

LOCK TABLES `oc_extension_path` WRITE;
/*!40000 ALTER TABLE `oc_extension_path` DISABLE KEYS */;
INSERT INTO `oc_extension_path` VALUES (1,6,'admin/language/ru-ru','2017-10-16 12:15:53'),(2,6,'catalog/language/ru-ru','2017-10-16 12:15:53'),(3,6,'admin/language/ru-ru/catalog','2017-10-16 12:15:53'),(4,6,'admin/language/ru-ru/common','2017-10-16 12:15:53'),(5,6,'admin/language/ru-ru/customer','2017-10-16 12:15:53'),(6,6,'admin/language/ru-ru/design','2017-10-16 12:15:53'),(7,6,'admin/language/ru-ru/error','2017-10-16 12:15:53'),(8,6,'admin/language/ru-ru/extension','2017-10-16 12:15:53'),(9,6,'admin/language/ru-ru/localisation','2017-10-16 12:15:53'),(10,6,'admin/language/ru-ru/mail','2017-10-16 12:15:53'),(11,6,'admin/language/ru-ru/marketing','2017-10-16 12:15:53'),(12,6,'admin/language/ru-ru/marketplace','2017-10-16 12:15:53'),(13,6,'admin/language/ru-ru/report','2017-10-16 12:15:53'),(14,6,'admin/language/ru-ru/ru-ru.php','2017-10-16 12:15:53'),(15,6,'admin/language/ru-ru/ru-ru.png','2017-10-16 12:15:53'),(16,6,'admin/language/ru-ru/sale','2017-10-16 12:15:53'),(17,6,'admin/language/ru-ru/setting','2017-10-16 12:15:53'),(18,6,'admin/language/ru-ru/tool','2017-10-16 12:15:53'),(19,6,'admin/language/ru-ru/user','2017-10-16 12:15:53'),(20,6,'catalog/language/ru-ru/account','2017-10-16 12:15:53'),(21,6,'catalog/language/ru-ru/affiliate','2017-10-16 12:15:53'),(22,6,'catalog/language/ru-ru/api','2017-10-16 12:15:53'),(23,6,'catalog/language/ru-ru/checkout','2017-10-16 12:15:53'),(24,6,'catalog/language/ru-ru/common','2017-10-16 12:15:53'),(25,6,'catalog/language/ru-ru/error','2017-10-16 12:15:53'),(26,6,'catalog/language/ru-ru/extension','2017-10-16 12:15:53'),(27,6,'catalog/language/ru-ru/information','2017-10-16 12:15:53'),(28,6,'catalog/language/ru-ru/mail','2017-10-16 12:15:53'),(29,6,'catalog/language/ru-ru/product','2017-10-16 12:15:53'),(30,6,'catalog/language/ru-ru/ru-ru.php','2017-10-16 12:15:53'),(31,6,'catalog/language/ru-ru/ru-ru.png','2017-10-16 12:15:53'),(32,6,'catalog/language/ru-ru/tool','2017-10-16 12:15:53'),(33,6,'admin/language/ru-ru/catalog/attribute.php','2017-10-16 12:15:53'),(34,6,'admin/language/ru-ru/catalog/attribute_group.php','2017-10-16 12:15:53'),(35,6,'admin/language/ru-ru/catalog/category.php','2017-10-16 12:15:53'),(36,6,'admin/language/ru-ru/catalog/download.php','2017-10-16 12:15:53'),(37,6,'admin/language/ru-ru/catalog/filter.php','2017-10-16 12:15:53'),(38,6,'admin/language/ru-ru/catalog/information.php','2017-10-16 12:15:53'),(39,6,'admin/language/ru-ru/catalog/manufacturer.php','2017-10-16 12:15:53'),(40,6,'admin/language/ru-ru/catalog/option.php','2017-10-16 12:15:53'),(41,6,'admin/language/ru-ru/catalog/product.php','2017-10-16 12:15:53'),(42,6,'admin/language/ru-ru/catalog/recurring.php','2017-10-16 12:15:53'),(43,6,'admin/language/ru-ru/catalog/review.php','2017-10-16 12:15:53'),(44,6,'admin/language/ru-ru/common/column_left.php','2017-10-16 12:15:53'),(45,6,'admin/language/ru-ru/common/dashboard.php','2017-10-16 12:15:53'),(46,6,'admin/language/ru-ru/common/filemanager.php','2017-10-16 12:15:53'),(47,6,'admin/language/ru-ru/common/footer.php','2017-10-16 12:15:53'),(48,6,'admin/language/ru-ru/common/forgotten.php','2017-10-16 12:15:53'),(49,6,'admin/language/ru-ru/common/header.php','2017-10-16 12:15:53'),(50,6,'admin/language/ru-ru/common/login.php','2017-10-16 12:15:53'),(51,6,'admin/language/ru-ru/common/reset.php','2017-10-16 12:15:53'),(52,6,'admin/language/ru-ru/customer/custom_field.php','2017-10-16 12:15:53'),(53,6,'admin/language/ru-ru/customer/customer.php','2017-10-16 12:15:53'),(54,6,'admin/language/ru-ru/customer/customer_approval.php','2017-10-16 12:15:53'),(55,6,'admin/language/ru-ru/customer/customer_group.php','2017-10-16 12:15:53'),(56,6,'admin/language/ru-ru/design/banner.php','2017-10-16 12:15:53'),(57,6,'admin/language/ru-ru/design/language.php','2017-10-16 12:15:53'),(58,6,'admin/language/ru-ru/design/layout.php','2017-10-16 12:15:53'),(59,6,'admin/language/ru-ru/design/menu.php','2017-10-16 12:15:53'),(60,6,'admin/language/ru-ru/design/theme.php','2017-10-16 12:15:53'),(61,6,'admin/language/ru-ru/design/translation.php','2017-10-16 12:15:53'),(62,6,'admin/language/ru-ru/error/not_found.php','2017-10-16 12:15:53'),(63,6,'admin/language/ru-ru/error/permission.php','2017-10-16 12:15:53'),(64,6,'admin/language/ru-ru/extension/analytics','2017-10-16 12:15:53'),(65,6,'admin/language/ru-ru/extension/captcha','2017-10-16 12:15:53'),(66,6,'admin/language/ru-ru/extension/dashboard','2017-10-16 12:15:53'),(67,6,'admin/language/ru-ru/extension/extension','2017-10-16 12:15:53'),(68,6,'admin/language/ru-ru/extension/feed','2017-10-16 12:15:53'),(69,6,'admin/language/ru-ru/extension/fraud','2017-10-16 12:15:53'),(70,6,'admin/language/ru-ru/extension/module','2017-10-16 12:15:53'),(71,6,'admin/language/ru-ru/extension/openbay','2017-10-16 12:15:53'),(72,6,'admin/language/ru-ru/extension/payment','2017-10-16 12:15:53'),(73,6,'admin/language/ru-ru/extension/shipping','2017-10-16 12:15:53'),(74,6,'admin/language/ru-ru/extension/store.php','2017-10-16 12:15:53'),(75,6,'admin/language/ru-ru/extension/theme','2017-10-16 12:15:53'),(76,6,'admin/language/ru-ru/extension/total','2017-10-16 12:15:53'),(77,6,'admin/language/ru-ru/localisation/country.php','2017-10-16 12:15:53'),(78,6,'admin/language/ru-ru/localisation/currency.php','2017-10-16 12:15:53'),(79,6,'admin/language/ru-ru/localisation/geo_zone.php','2017-10-16 12:15:53'),(80,6,'admin/language/ru-ru/localisation/language.php','2017-10-16 12:15:53'),(81,6,'admin/language/ru-ru/localisation/length_class.php','2017-10-16 12:15:53'),(82,6,'admin/language/ru-ru/localisation/location.php','2017-10-16 12:15:53'),(83,6,'admin/language/ru-ru/localisation/order_status.php','2017-10-16 12:15:53'),(84,6,'admin/language/ru-ru/localisation/return_action.php','2017-10-16 12:15:53'),(85,6,'admin/language/ru-ru/localisation/return_reason.php','2017-10-16 12:15:53'),(86,6,'admin/language/ru-ru/localisation/return_status.php','2017-10-16 12:15:53'),(87,6,'admin/language/ru-ru/localisation/stock_status.php','2017-10-16 12:15:53'),(88,6,'admin/language/ru-ru/localisation/tax_class.php','2017-10-16 12:15:53'),(89,6,'admin/language/ru-ru/localisation/tax_rate.php','2017-10-16 12:15:53'),(90,6,'admin/language/ru-ru/localisation/weight_class.php','2017-10-16 12:15:53'),(91,6,'admin/language/ru-ru/localisation/zone.php','2017-10-16 12:15:53'),(92,6,'admin/language/ru-ru/mail/affiliate.php','2017-10-16 12:15:53'),(93,6,'admin/language/ru-ru/mail/customer.php','2017-10-16 12:15:53'),(94,6,'admin/language/ru-ru/mail/forgotten.php','2017-10-16 12:15:53'),(95,6,'admin/language/ru-ru/mail/return.php','2017-10-16 12:15:53'),(96,6,'admin/language/ru-ru/mail/voucher.php','2017-10-16 12:15:53'),(97,6,'admin/language/ru-ru/marketing/affiliate.php','2017-10-16 12:15:53'),(98,6,'admin/language/ru-ru/marketing/contact.php','2017-10-16 12:15:53'),(99,6,'admin/language/ru-ru/marketing/coupon.php','2017-10-16 12:15:53'),(100,6,'admin/language/ru-ru/marketing/marketing.php','2017-10-16 12:15:53'),(101,6,'admin/language/ru-ru/marketplace/api.php','2017-10-16 12:15:53'),(102,6,'admin/language/ru-ru/marketplace/event.php','2017-10-16 12:15:53'),(103,6,'admin/language/ru-ru/marketplace/extension.php','2017-10-16 12:15:53'),(104,6,'admin/language/ru-ru/marketplace/install.php','2017-10-16 12:15:53'),(105,6,'admin/language/ru-ru/marketplace/installer.php','2017-10-16 12:15:53'),(106,6,'admin/language/ru-ru/marketplace/marketplace.php','2017-10-16 12:15:53'),(107,6,'admin/language/ru-ru/marketplace/modification.php','2017-10-16 12:15:53'),(108,6,'admin/language/ru-ru/marketplace/openbay.php','2017-10-16 12:15:53'),(109,6,'admin/language/ru-ru/report/online.php','2017-10-16 12:15:53'),(110,6,'admin/language/ru-ru/report/report.php','2017-10-16 12:15:53'),(111,6,'admin/language/ru-ru/report/statistics.php','2017-10-16 12:15:53'),(112,6,'admin/language/ru-ru/sale/order.php','2017-10-16 12:15:53'),(113,6,'admin/language/ru-ru/sale/recurring.php','2017-10-16 12:15:53'),(114,6,'admin/language/ru-ru/sale/return.php','2017-10-16 12:15:53'),(115,6,'admin/language/ru-ru/sale/voucher.php','2017-10-16 12:15:53'),(116,6,'admin/language/ru-ru/sale/voucher_theme.php','2017-10-16 12:15:53'),(117,6,'admin/language/ru-ru/setting/setting.php','2017-10-16 12:15:53'),(118,6,'admin/language/ru-ru/setting/store.php','2017-10-16 12:15:53'),(119,6,'admin/language/ru-ru/tool/backup.php','2017-10-16 12:15:53'),(120,6,'admin/language/ru-ru/tool/log.php','2017-10-16 12:15:53'),(121,6,'admin/language/ru-ru/tool/upload.php','2017-10-16 12:15:53'),(122,6,'admin/language/ru-ru/user/api.php','2017-10-16 12:15:53'),(123,6,'admin/language/ru-ru/user/user.php','2017-10-16 12:15:53'),(124,6,'admin/language/ru-ru/user/user_group.php','2017-10-16 12:15:53'),(125,6,'catalog/language/ru-ru/account/account.php','2017-10-16 12:15:53'),(126,6,'catalog/language/ru-ru/account/address.php','2017-10-16 12:15:53'),(127,6,'catalog/language/ru-ru/account/download.php','2017-10-16 12:15:53'),(128,6,'catalog/language/ru-ru/account/edit.php','2017-10-16 12:15:53'),(129,6,'catalog/language/ru-ru/account/forgotten.php','2017-10-16 12:15:53'),(130,6,'catalog/language/ru-ru/account/login.php','2017-10-16 12:15:53'),(131,6,'catalog/language/ru-ru/account/logout.php','2017-10-16 12:15:53'),(132,6,'catalog/language/ru-ru/account/newsletter.php','2017-10-16 12:15:53'),(133,6,'catalog/language/ru-ru/account/order.php','2017-10-16 12:15:53'),(134,6,'catalog/language/ru-ru/account/password.php','2017-10-16 12:15:53'),(135,6,'catalog/language/ru-ru/account/recurring.php','2017-10-16 12:15:53'),(136,6,'catalog/language/ru-ru/account/register.php','2017-10-16 12:15:53'),(137,6,'catalog/language/ru-ru/account/reset.php','2017-10-16 12:15:53'),(138,6,'catalog/language/ru-ru/account/return.php','2017-10-16 12:15:53'),(139,6,'catalog/language/ru-ru/account/reward.php','2017-10-16 12:15:53'),(140,6,'catalog/language/ru-ru/account/success.php','2017-10-16 12:15:53'),(141,6,'catalog/language/ru-ru/account/transaction.php','2017-10-16 12:15:53'),(142,6,'catalog/language/ru-ru/account/voucher.php','2017-10-16 12:15:53'),(143,6,'catalog/language/ru-ru/account/wishlist.php','2017-10-16 12:15:53'),(144,6,'catalog/language/ru-ru/affiliate/account.php','2017-10-16 12:15:53'),(145,6,'catalog/language/ru-ru/affiliate/edit.php','2017-10-16 12:15:53'),(146,6,'catalog/language/ru-ru/affiliate/forgotten.php','2017-10-16 12:15:53'),(147,6,'catalog/language/ru-ru/affiliate/login.php','2017-10-16 12:15:53'),(148,6,'catalog/language/ru-ru/affiliate/logout.php','2017-10-16 12:15:53'),(149,6,'catalog/language/ru-ru/affiliate/password.php','2017-10-16 12:15:53'),(150,6,'catalog/language/ru-ru/affiliate/payment.php','2017-10-16 12:15:53'),(151,6,'catalog/language/ru-ru/affiliate/register.php','2017-10-16 12:15:53'),(152,6,'catalog/language/ru-ru/affiliate/success.php','2017-10-16 12:15:53'),(153,6,'catalog/language/ru-ru/affiliate/tracking.php','2017-10-16 12:15:53'),(154,6,'catalog/language/ru-ru/affiliate/transaction.php','2017-10-16 12:15:53'),(155,6,'catalog/language/ru-ru/api/cart.php','2017-10-16 12:15:53'),(156,6,'catalog/language/ru-ru/api/coupon.php','2017-10-16 12:15:53'),(157,6,'catalog/language/ru-ru/api/customer.php','2017-10-16 12:15:53'),(158,6,'catalog/language/ru-ru/api/login.php','2017-10-16 12:15:53'),(159,6,'catalog/language/ru-ru/api/order.php','2017-10-16 12:15:53'),(160,6,'catalog/language/ru-ru/api/payment.php','2017-10-16 12:15:53'),(161,6,'catalog/language/ru-ru/api/reward.php','2017-10-16 12:15:53'),(162,6,'catalog/language/ru-ru/api/shipping.php','2017-10-16 12:15:53'),(163,6,'catalog/language/ru-ru/api/voucher.php','2017-10-16 12:15:53'),(164,6,'catalog/language/ru-ru/checkout/cart.php','2017-10-16 12:15:53'),(165,6,'catalog/language/ru-ru/checkout/checkout.php','2017-10-16 12:15:53'),(166,6,'catalog/language/ru-ru/checkout/failure.php','2017-10-16 12:15:53'),(167,6,'catalog/language/ru-ru/checkout/success.php','2017-10-16 12:15:53'),(168,6,'catalog/language/ru-ru/common/cart.php','2017-10-16 12:15:53'),(169,6,'catalog/language/ru-ru/common/currency.php','2017-10-16 12:15:53'),(170,6,'catalog/language/ru-ru/common/footer.php','2017-10-16 12:15:53'),(171,6,'catalog/language/ru-ru/common/header.php','2017-10-16 12:15:53'),(172,6,'catalog/language/ru-ru/common/language.php','2017-10-16 12:15:53'),(173,6,'catalog/language/ru-ru/common/maintenance.php','2017-10-16 12:15:53'),(174,6,'catalog/language/ru-ru/common/search.php','2017-10-16 12:15:53'),(175,6,'catalog/language/ru-ru/error/not_found.php','2017-10-16 12:15:53'),(176,6,'catalog/language/ru-ru/extension/captcha','2017-10-16 12:15:53'),(177,6,'catalog/language/ru-ru/extension/module','2017-10-16 12:15:53'),(178,6,'catalog/language/ru-ru/extension/openbay','2017-10-16 12:15:53'),(179,6,'catalog/language/ru-ru/extension/payment','2017-10-16 12:15:53'),(180,6,'catalog/language/ru-ru/extension/recurring','2017-10-16 12:15:53'),(181,6,'catalog/language/ru-ru/extension/shipping','2017-10-16 12:15:53'),(182,6,'catalog/language/ru-ru/extension/total','2017-10-16 12:15:53'),(183,6,'catalog/language/ru-ru/information/contact.php','2017-10-16 12:15:53'),(184,6,'catalog/language/ru-ru/information/information.php','2017-10-16 12:15:53'),(185,6,'catalog/language/ru-ru/information/sitemap.php','2017-10-16 12:15:53'),(186,6,'catalog/language/ru-ru/mail/affiliate.php','2017-10-16 12:15:53'),(187,6,'catalog/language/ru-ru/mail/customer.php','2017-10-16 12:15:53'),(188,6,'catalog/language/ru-ru/mail/forgotten.php','2017-10-16 12:15:53'),(189,6,'catalog/language/ru-ru/mail/order.php','2017-10-16 12:15:53'),(190,6,'catalog/language/ru-ru/mail/review.php','2017-10-16 12:15:53'),(191,6,'catalog/language/ru-ru/mail/voucher.php','2017-10-16 12:15:53'),(192,6,'catalog/language/ru-ru/product/category.php','2017-10-16 12:15:53'),(193,6,'catalog/language/ru-ru/product/compare.php','2017-10-16 12:15:53'),(194,6,'catalog/language/ru-ru/product/manufacturer.php','2017-10-16 12:15:53'),(195,6,'catalog/language/ru-ru/product/product.php','2017-10-16 12:15:53'),(196,6,'catalog/language/ru-ru/product/search.php','2017-10-16 12:15:53'),(197,6,'catalog/language/ru-ru/product/special.php','2017-10-16 12:15:53'),(198,6,'catalog/language/ru-ru/tool/upload.php','2017-10-16 12:15:53'),(199,6,'admin/language/ru-ru/extension/analytics/google_analytics.php','2017-10-16 12:15:53'),(200,6,'admin/language/ru-ru/extension/captcha/basic_captcha.php','2017-10-16 12:15:53'),(201,6,'admin/language/ru-ru/extension/captcha/google_captcha.php','2017-10-16 12:15:53'),(202,6,'admin/language/ru-ru/extension/dashboard/activity.php','2017-10-16 12:15:53'),(203,6,'admin/language/ru-ru/extension/dashboard/chart.php','2017-10-16 12:15:53'),(204,6,'admin/language/ru-ru/extension/dashboard/customer.php','2017-10-16 12:15:53'),(205,6,'admin/language/ru-ru/extension/dashboard/map.php','2017-10-16 12:15:53'),(206,6,'admin/language/ru-ru/extension/dashboard/online.php','2017-10-16 12:15:53'),(207,6,'admin/language/ru-ru/extension/dashboard/order.php','2017-10-16 12:15:53'),(208,6,'admin/language/ru-ru/extension/dashboard/recent.php','2017-10-16 12:15:53'),(209,6,'admin/language/ru-ru/extension/dashboard/sale.php','2017-10-16 12:15:53'),(210,6,'admin/language/ru-ru/extension/extension/analytics.php','2017-10-16 12:15:53'),(211,6,'admin/language/ru-ru/extension/extension/captcha.php','2017-10-16 12:15:53'),(212,6,'admin/language/ru-ru/extension/extension/dashboard.php','2017-10-16 12:15:53'),(213,6,'admin/language/ru-ru/extension/extension/feed.php','2017-10-16 12:15:53'),(214,6,'admin/language/ru-ru/extension/extension/fraud.php','2017-10-16 12:15:53'),(215,6,'admin/language/ru-ru/extension/extension/module.php','2017-10-16 12:15:53'),(216,6,'admin/language/ru-ru/extension/extension/payment.php','2017-10-16 12:15:53'),(217,6,'admin/language/ru-ru/extension/extension/shipping.php','2017-10-16 12:15:53'),(218,6,'admin/language/ru-ru/extension/extension/theme.php','2017-10-16 12:15:53'),(219,6,'admin/language/ru-ru/extension/extension/total.php','2017-10-16 12:15:53'),(220,6,'admin/language/ru-ru/extension/feed/google_base.php','2017-10-16 12:15:53'),(221,6,'admin/language/ru-ru/extension/feed/google_sitemap.php','2017-10-16 12:15:53'),(222,6,'admin/language/ru-ru/extension/fraud/ip.php','2017-10-16 12:15:53'),(223,6,'admin/language/ru-ru/extension/module/account.php','2017-10-16 12:15:53'),(224,6,'admin/language/ru-ru/extension/module/affiliate.php','2017-10-16 12:15:53'),(225,6,'admin/language/ru-ru/extension/module/banner.php','2017-10-16 12:15:53'),(226,6,'admin/language/ru-ru/extension/module/bestseller.php','2017-10-16 12:15:53'),(227,6,'admin/language/ru-ru/extension/module/carousel.php','2017-10-16 12:15:53'),(228,6,'admin/language/ru-ru/extension/module/category.php','2017-10-16 12:15:53'),(229,6,'admin/language/ru-ru/extension/module/featured.php','2017-10-16 12:15:53'),(230,6,'admin/language/ru-ru/extension/module/filter.php','2017-10-16 12:15:53'),(231,6,'admin/language/ru-ru/extension/module/google_hangouts.php','2017-10-16 12:15:53'),(232,6,'admin/language/ru-ru/extension/module/html.php','2017-10-16 12:15:53'),(233,6,'admin/language/ru-ru/extension/module/information.php','2017-10-16 12:15:53'),(234,6,'admin/language/ru-ru/extension/module/latest.php','2017-10-16 12:15:53'),(235,6,'admin/language/ru-ru/extension/module/pp_button.php','2017-10-16 12:15:53'),(236,6,'admin/language/ru-ru/extension/module/slideshow.php','2017-10-16 12:15:53'),(237,6,'admin/language/ru-ru/extension/module/special.php','2017-10-16 12:15:53'),(238,6,'admin/language/ru-ru/extension/module/store.php','2017-10-16 12:15:54'),(239,6,'admin/language/ru-ru/extension/payment/bank_transfer.php','2017-10-16 12:15:54'),(240,6,'admin/language/ru-ru/extension/payment/cheque.php','2017-10-16 12:15:54'),(241,6,'admin/language/ru-ru/extension/payment/cod.php','2017-10-16 12:15:54'),(242,6,'admin/language/ru-ru/extension/payment/free_checkout.php','2017-10-16 12:15:54'),(243,6,'admin/language/ru-ru/extension/payment/liqpay.php','2017-10-16 12:15:54'),(244,6,'admin/language/ru-ru/extension/payment/pp_express.php','2017-10-16 12:15:54'),(245,6,'admin/language/ru-ru/extension/payment/pp_express_order.php','2017-10-16 12:15:54'),(246,6,'admin/language/ru-ru/extension/payment/pp_express_refund.php','2017-10-16 12:15:54'),(247,6,'admin/language/ru-ru/extension/payment/pp_express_search.php','2017-10-16 12:15:54'),(248,6,'admin/language/ru-ru/extension/payment/pp_express_view.php','2017-10-16 12:15:54'),(249,6,'admin/language/ru-ru/extension/payment/pp_pro.php','2017-10-16 12:15:54'),(250,6,'admin/language/ru-ru/extension/payment/pp_standard.php','2017-10-16 12:15:54'),(251,6,'admin/language/ru-ru/extension/shipping/citylink.php','2017-10-16 12:15:54'),(252,6,'admin/language/ru-ru/extension/shipping/flat.php','2017-10-16 12:15:54'),(253,6,'admin/language/ru-ru/extension/shipping/free.php','2017-10-16 12:15:54'),(254,6,'admin/language/ru-ru/extension/shipping/item.php','2017-10-16 12:15:54'),(255,6,'admin/language/ru-ru/extension/shipping/pickup.php','2017-10-16 12:15:54'),(256,6,'admin/language/ru-ru/extension/shipping/weight.php','2017-10-16 12:15:54'),(257,6,'admin/language/ru-ru/extension/theme/theme_default.php','2017-10-16 12:15:54'),(258,6,'admin/language/ru-ru/extension/total/coupon.php','2017-10-16 12:15:54'),(259,6,'admin/language/ru-ru/extension/total/credit.php','2017-10-16 12:15:54'),(260,6,'admin/language/ru-ru/extension/total/handling.php','2017-10-16 12:15:54'),(261,6,'admin/language/ru-ru/extension/total/low_order_fee.php','2017-10-16 12:15:54'),(262,6,'admin/language/ru-ru/extension/total/reward.php','2017-10-16 12:15:54'),(263,6,'admin/language/ru-ru/extension/total/shipping.php','2017-10-16 12:15:54'),(264,6,'admin/language/ru-ru/extension/total/sub_total.php','2017-10-16 12:15:54'),(265,6,'admin/language/ru-ru/extension/total/tax.php','2017-10-16 12:15:54'),(266,6,'admin/language/ru-ru/extension/total/total.php','2017-10-16 12:15:54'),(267,6,'admin/language/ru-ru/extension/total/voucher.php','2017-10-16 12:15:54'),(268,6,'catalog/language/ru-ru/extension/captcha/basic_captcha.php','2017-10-16 12:15:54'),(269,6,'catalog/language/ru-ru/extension/captcha/google_captcha.php','2017-10-16 12:15:54'),(270,6,'catalog/language/ru-ru/extension/module/account.php','2017-10-16 12:15:54'),(271,6,'catalog/language/ru-ru/extension/module/affiliate.php','2017-10-16 12:15:54'),(272,6,'catalog/language/ru-ru/extension/module/bestseller.php','2017-10-16 12:15:54'),(273,6,'catalog/language/ru-ru/extension/module/category.php','2017-10-16 12:15:54'),(274,6,'catalog/language/ru-ru/extension/module/featured.php','2017-10-16 12:15:54'),(275,6,'catalog/language/ru-ru/extension/module/filter.php','2017-10-16 12:15:54'),(276,6,'catalog/language/ru-ru/extension/module/google_hangouts.php','2017-10-16 12:15:54'),(277,6,'catalog/language/ru-ru/extension/module/information.php','2017-10-16 12:15:54'),(278,6,'catalog/language/ru-ru/extension/module/latest.php','2017-10-16 12:15:54'),(279,6,'catalog/language/ru-ru/extension/module/special.php','2017-10-16 12:15:54'),(280,6,'catalog/language/ru-ru/extension/module/store.php','2017-10-16 12:15:54'),(281,6,'catalog/language/ru-ru/extension/payment/bank_transfer.php','2017-10-16 12:15:54'),(282,6,'catalog/language/ru-ru/extension/payment/cheque.php','2017-10-16 12:15:54'),(283,6,'catalog/language/ru-ru/extension/payment/cod.php','2017-10-16 12:15:54'),(284,6,'catalog/language/ru-ru/extension/payment/free_checkout.php','2017-10-16 12:15:54'),(285,6,'catalog/language/ru-ru/extension/payment/liqpay.php','2017-10-16 12:15:54'),(286,6,'catalog/language/ru-ru/extension/payment/moneybookers.php','2017-10-16 12:15:54'),(287,6,'catalog/language/ru-ru/extension/payment/pp_express.php','2017-10-16 12:15:54'),(288,6,'catalog/language/ru-ru/extension/payment/pp_pro.php','2017-10-16 12:15:54'),(289,6,'catalog/language/ru-ru/extension/payment/pp_standard.php','2017-10-16 12:15:54'),(290,6,'catalog/language/ru-ru/extension/recurring/pp_express.php','2017-10-16 12:15:54'),(291,6,'catalog/language/ru-ru/extension/shipping/citylink.php','2017-10-16 12:15:54'),(292,6,'catalog/language/ru-ru/extension/shipping/flat.php','2017-10-16 12:15:54'),(293,6,'catalog/language/ru-ru/extension/shipping/free.php','2017-10-16 12:15:54'),(294,6,'catalog/language/ru-ru/extension/shipping/item.php','2017-10-16 12:15:54'),(295,6,'catalog/language/ru-ru/extension/shipping/pickup.php','2017-10-16 12:15:54'),(296,6,'catalog/language/ru-ru/extension/shipping/weight.php','2017-10-16 12:15:54'),(297,6,'catalog/language/ru-ru/extension/total/coupon.php','2017-10-16 12:15:54'),(298,6,'catalog/language/ru-ru/extension/total/credit.php','2017-10-16 12:15:54'),(299,6,'catalog/language/ru-ru/extension/total/handling.php','2017-10-16 12:15:54'),(300,6,'catalog/language/ru-ru/extension/total/low_order_fee.php','2017-10-16 12:15:54'),(301,6,'catalog/language/ru-ru/extension/total/reward.php','2017-10-16 12:15:54'),(302,6,'catalog/language/ru-ru/extension/total/shipping.php','2017-10-16 12:15:54'),(303,6,'catalog/language/ru-ru/extension/total/sub_total.php','2017-10-16 12:15:54'),(304,6,'catalog/language/ru-ru/extension/total/total.php','2017-10-16 12:15:54'),(305,6,'catalog/language/ru-ru/extension/total/voucher.php','2017-10-16 12:15:54');
/*!40000 ALTER TABLE `oc_extension_path` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_filter`
--

DROP TABLE IF EXISTS `oc_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_filter` (
  `filter_id` int(11) NOT NULL AUTO_INCREMENT,
  `filter_group_id` int(11) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`filter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_filter`
--

LOCK TABLES `oc_filter` WRITE;
/*!40000 ALTER TABLE `oc_filter` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_filter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_filter_description`
--

DROP TABLE IF EXISTS `oc_filter_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_filter_description` (
  `filter_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `filter_group_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`filter_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_filter_description`
--

LOCK TABLES `oc_filter_description` WRITE;
/*!40000 ALTER TABLE `oc_filter_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_filter_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_filter_group`
--

DROP TABLE IF EXISTS `oc_filter_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_filter_group` (
  `filter_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`filter_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_filter_group`
--

LOCK TABLES `oc_filter_group` WRITE;
/*!40000 ALTER TABLE `oc_filter_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_filter_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_filter_group_description`
--

DROP TABLE IF EXISTS `oc_filter_group_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_filter_group_description` (
  `filter_group_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`filter_group_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_filter_group_description`
--

LOCK TABLES `oc_filter_group_description` WRITE;
/*!40000 ALTER TABLE `oc_filter_group_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_filter_group_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_geo_zone`
--

DROP TABLE IF EXISTS `oc_geo_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_geo_zone` (
  `geo_zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`geo_zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_geo_zone`
--

LOCK TABLES `oc_geo_zone` WRITE;
/*!40000 ALTER TABLE `oc_geo_zone` DISABLE KEYS */;
INSERT INTO `oc_geo_zone` VALUES (3,'UK VAT Zone','UK VAT','2009-01-06 20:26:25','2010-02-26 19:33:24'),(4,'UK Shipping','UK Shipping Zones','2009-06-22 21:14:53','2010-12-15 12:18:13');
/*!40000 ALTER TABLE `oc_geo_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_information`
--

DROP TABLE IF EXISTS `oc_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_information` (
  `information_id` int(11) NOT NULL AUTO_INCREMENT,
  `bottom` int(1) NOT NULL DEFAULT '0',
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`information_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_information`
--

LOCK TABLES `oc_information` WRITE;
/*!40000 ALTER TABLE `oc_information` DISABLE KEYS */;
INSERT INTO `oc_information` VALUES (3,0,3,1),(4,0,1,1),(5,0,4,1),(6,0,2,1),(7,0,5,1),(8,0,6,1),(9,1,1,1),(10,1,0,1),(11,0,0,1);
/*!40000 ALTER TABLE `oc_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_information_description`
--

DROP TABLE IF EXISTS `oc_information_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_information_description` (
  `information_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` mediumtext NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  PRIMARY KEY (`information_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_information_description`
--

LOCK TABLES `oc_information_description` WRITE;
/*!40000 ALTER TABLE `oc_information_description` DISABLE KEYS */;
INSERT INTO `oc_information_description` VALUES (4,4,'О компании','&lt;p&gt;О компании О компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компанииО компании&lt;/p&gt;&lt;p&gt;О компании О компанииО компанииО компанииО компанииО компанииО компанииО\r\n компанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компанииО компанииО \r\nкомпанииО компанииО компанииО компанииО компанииО компании&lt;/p&gt;','о нас','о нас','о нас'),(3,4,'Политика приватности','Политика приватности','Privacy Policy','Политика приватности','Политика приватности'),(5,4,'Terms &amp; Conditions','&lt;p&gt;\r\n	Terms &amp;amp; Conditions&lt;/p&gt;\r\n','Terms &amp; Conditions','',''),(6,4,'Delivery Information','&lt;p&gt;\r\n	Delivery Information&lt;/p&gt;\r\n','Delivery Information','',''),(4,1,'About Us','&lt;p&gt;\r\n	About Us&lt;/p&gt;\r\n','About Us','About Us','About Us'),(5,1,'Terms &amp; Conditions','&lt;p&gt;\r\n	Terms &amp;amp; Conditions&lt;/p&gt;\r\n','Terms &amp; Conditions','',''),(3,1,'Policy','Политика приватности &lt;br&gt;','Политика приватности','Политика приватности','Политика приватности'),(6,1,'Delivery Information','&lt;p&gt;\r\n	Delivery Information&lt;/p&gt;\r\n','Delivery Information','',''),(7,1,'Vacanvy','&lt;ol&gt;&lt;li&gt;vacancy 1 description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description &lt;/li&gt;&lt;li&gt;VACANCY 2 DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION &lt;/li&gt;&lt;/ol&gt;','vacancy','',''),(7,4,'Вакансии','&lt;ol&gt;&lt;li&gt;Вакансия описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание &lt;/li&gt;&lt;li&gt;ВАКАНСИЯ - ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ ОПИСАНИЕ &lt;/li&gt;&lt;/ol&gt;','Вакансии','',''),(8,1,'Contacts','&lt;p&gt;Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page &lt;/p&gt;&lt;p&gt;&lt;p&gt;Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page Contacts page &lt;/p&gt;&lt;/p&gt;','contact','',''),(8,4,'Контакты','&lt;p&gt;Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами &lt;/p&gt;&lt;p&gt;&lt;p&gt;Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами Страница с контактами &lt;/p&gt;&lt;/p&gt;','контакты','',''),(9,1,'AboutUsPrice','&lt;p&gt;AboutUsPrice&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;/p&gt;','AboutUsPrice','AboutUsPrice','AboutUsPrice'),(9,4,'О компании -&gt; Прайс-лист','&lt;div class=&quot;container&quot;&gt;\r\n  &lt;div class=&quot;row&quot;&gt;\r\n    &lt;div class=&quot;col-md-12&quot;&gt;\r\n&lt;ul&gt;\r\n  &lt;li&gt;Прайс-лист на бытовую химию для учреждений здравохранения&lt;/li&gt;\r\n  &lt;li&gt;Прайс-лист на бытовую химию для учреждений здравохранения&lt;/li&gt;\r\n  &lt;li&gt;Прайс-лист на индустриальную химию&lt;/li&gt;\r\n  &lt;li&gt;Прайс-лист на бытовую химию для клининга и дезинфекции&lt;/li&gt;\r\n  &lt;li&gt;Прайс-лист на бытовую химию для дома и всей семьи&lt;/li&gt;\r\n&lt;/ul&gt;\r\n    &lt;/div&gt;\r\n  &lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;container&quot;&gt;\r\n  &lt;div class=&quot;row&quot;&gt;\r\n    &lt;div class=&quot;col-md-8&quot;&gt; \r\n&lt;p&gt;Чистота и гигиена - основа человечесого здоровья и жизни . Наши дезинфицирующие средства и косметическая продукция обеспечат необходимое соблюдение санитарно - эпиодемического режима, сделают безопасными продукцию вашего предприятия и технологический процесс для ваших работников.&amp;nbsp; Современная уборка - это единым процесс мойки и дезинфекции. Нашу продукцию отличает высокая эффективность, низкая токсичность, экономичность, активность в небольших концентрациях и при короткой экспозиции, широкий спектр действия, совмещение средств с моющими и дезинфецирующими свойствами, безопасность для персонала и обрабатываемых объектов, стабильность при хранении и удобство транспортировки.&lt;/p&gt;\r\n&lt;p&gt;&lt;b&gt;Достоинства нашей компании&lt;/b&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n  &lt;li&gt;Профессионализм&lt;/li&gt;\r\n  &lt;li&gt;собственная лабораторная база для разработки и производства моющих средств, дезинфецирующих средств самого широкого спектра&amp;nbsp;&lt;/li&gt;\r\n  &lt;li&gt;строгий контроль сырья и готовой продукции&lt;/li&gt;\r\n  &lt;li&gt;качество и стабильность&lt;/li&gt;\r\n  &lt;li&gt;баланс соотношения высокого качества и доступной цены&lt;/li&gt;\r\n  &lt;li&gt;моющие средства оптом от производителя - удобное и выгодное решение&lt;/li&gt;\r\n  &lt;li&gt;индивидуальный подход к каждому деловому партнеру&lt;/li&gt;\r\n&lt;/ul&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-4&quot;&gt;\r\n      &lt;img style=&quot;width: 398px;&quot; src=&quot;http://ocart3.dev/image/catalog/information/toPriceList.png&quot;&gt;\r\n    &lt;/div&gt;\r\n  &lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n\r\n\r\n','price list','price list','price list'),(10,1,'ForDealers','ForDealers&lt;p&gt;&lt;br&gt;&lt;/p&gt;','ForDealers','ForDealers','ForDealers'),(10,4,'Дилерам','&lt;div class=&quot;container&quot;&gt;\r\n  &lt;div class=&quot;row&quot;&gt;\r\n&lt;p&gt;НПО &quot;СпецСинтез&quot; приглашает к сотрудничеству&lt;/p&gt;\r\n&lt;p&gt;Все клиенты компании - это корпоративный капитал. Мы ценим это и выстраиваем с нашими партнерами прочные и долговременные отношения.&lt;/p&gt;\r\n  &lt;/div&gt;\r\n  \r\n  &lt;div class=&quot;row&quot;&gt;\r\n    &lt;div class=&quot;col-md-2&quot;&gt;\r\n    	&lt;p&gt;Схема индивидуальной работы с заказчиком:&lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-2&quot;&gt;\r\n      &lt;p&gt;Сбор и анализ информации&lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-2&quot;&gt;\r\n    	&lt;p&gt;лабораторные разработки&amp;nbsp; и сисследования &lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-2&quot;&gt;\r\n    	&lt;p&gt;испытания на месте&lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-2&quot;&gt;\r\n      &lt;p&gt;внедрение&lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-2&quot;&gt;\r\n    	&lt;p&gt;авторский надзор&lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-2&quot;&gt;\r\n      &amp;nbsp;\r\n    &lt;/div&gt;\r\n  &lt;/div&gt;\r\n  \r\n    \r\n  &lt;div class=&quot;row&quot;&gt;\r\n  	&lt;div class=&quot;col-md-6&quot;&gt;\r\n    	&lt;p&gt;Начать сотрудничество &lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;col-md-6&quot;&gt;\r\n  &lt;p&gt;Ваше имя&lt;/p&gt;&lt;p&gt;Ваш телефон&lt;/p&gt;&lt;p&gt;Ваше сообщение&lt;/p&gt;&lt;p&gt;Батон-Отправить&lt;/p&gt;&lt;p&gt;Последние новости&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;\r\n    &lt;/div&gt;\r\n &lt;/div&gt;\r\n  \r\n&lt;/div&gt;\r\n\r\n&lt;p&gt;...&lt;/p&gt;\r\n','Дилерам','Дилерам','Дилерам'),(11,4,'Производитель профессиональной химии','&lt;div class=&quot;row&quot;&gt;\r\n  &lt;h3&gt;Производитель профессиональной химии&lt;/h3&gt;\r\n	&lt;div class=&quot;col-md-8&quot;&gt;\r\n	&lt;p&gt;Действуя оперативно и гибко, предвидя потребности наших клиентов, мы стараемся максимально удовлетворять их запросы и находить пути решения нестандартных задач.&lt;/p&gt;&lt;p&gt;Любая серъезная и ответственная задача - будь то дезинфекция ресторана, мойка вагонов, обезжиривание деталей, уборка бассейнов, дезинфекция и стерилизация медицинских инструментов, гигиена рук персонала - успешно выполняется с использованием нашей продукции.&lt;/p&gt;&lt;p&gt;Главная идея нашей компании - максимально полно удовлетворять потребности наших клиентов в эффективных моющих средствах, в постоянном совершенствовании, внедрении в наши разработки технологий будущего отечественной и мировой химии.&lt;/p&gt;\r\n	&lt;/div&gt;\r\n\r\n	&lt;div class=&quot;col-md-4&quot;&gt;&amp;nbsp;\r\n  	&lt;img style=&quot;width: 307px;&quot; src=&quot;http://ocart3.dev/image/catalog/to-main-page.png&quot;&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n	&lt;h5&gt;Мы разрабатываем&lt;/h5&gt;\r\n  &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptate vitae animi voluptatibus, dolores, quos modi recusandae minima eveniet ratione nam aperiam fuga deserunt minus praesentium incidunt consequuntur ea nulla. &lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n  &lt;h5&gt;Мы производим &lt;/h5&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptate vitae animi voluptatibus, dolores, quos modi recusandae minima eveniet ratione nam aperiam fuga deserunt minus praesentium incidunt consequuntur ea nulla. &lt;/p&gt;\r\n  &lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n  &lt;h5&gt;Мы внедряем&lt;/h5&gt;\r\n  &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptate vitae animi voluptatibus, dolores, quos modi recusandae minima eveniet ratione nam aperiam fuga deserunt minus praesentium incidunt consequuntur ea nulla. &lt;/p&gt;\r\n&lt;/div&gt;  \r\n  \r\n&lt;/div&gt;\r\n\r\n  &lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;','meta','',''),(11,1,'Manufacturer of chemi industry','Loram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol orLoram ipsum dolor&amp;nbsp; Loram ipsum dol or &lt;p&gt;&lt;br&gt;&lt;/p&gt;','meta','','');
/*!40000 ALTER TABLE `oc_information_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_information_to_layout`
--

DROP TABLE IF EXISTS `oc_information_to_layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_information_to_layout` (
  `information_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  PRIMARY KEY (`information_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_information_to_layout`
--

LOCK TABLES `oc_information_to_layout` WRITE;
/*!40000 ALTER TABLE `oc_information_to_layout` DISABLE KEYS */;
INSERT INTO `oc_information_to_layout` VALUES (7,0,0),(8,0,0),(9,0,0),(10,0,0),(4,0,0),(5,0,0),(3,0,0),(6,0,0),(11,0,0);
/*!40000 ALTER TABLE `oc_information_to_layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_information_to_store`
--

DROP TABLE IF EXISTS `oc_information_to_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_information_to_store` (
  `information_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`information_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_information_to_store`
--

LOCK TABLES `oc_information_to_store` WRITE;
/*!40000 ALTER TABLE `oc_information_to_store` DISABLE KEYS */;
INSERT INTO `oc_information_to_store` VALUES (3,0),(4,0),(5,0),(6,0),(7,0),(8,0),(9,0),(10,0),(11,0);
/*!40000 ALTER TABLE `oc_information_to_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_language`
--

DROP TABLE IF EXISTS `oc_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL,
  `directory` varchar(32) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`language_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_language`
--

LOCK TABLES `oc_language` WRITE;
/*!40000 ALTER TABLE `oc_language` DISABLE KEYS */;
INSERT INTO `oc_language` VALUES (1,'English','en-gb','en-gb,en','gb.png','english',1,1),(4,'Russian','ru-ru','ru_ru','ru_ru.png','ru_ru',1,1);
/*!40000 ALTER TABLE `oc_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_layout`
--

DROP TABLE IF EXISTS `oc_layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_layout` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`layout_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_layout`
--

LOCK TABLES `oc_layout` WRITE;
/*!40000 ALTER TABLE `oc_layout` DISABLE KEYS */;
INSERT INTO `oc_layout` VALUES (1,'Home'),(2,'Product'),(3,'Category'),(4,'Default'),(5,'Manufacturer'),(6,'Account'),(7,'Checkout'),(8,'Contact'),(9,'Sitemap'),(10,'Affiliate'),(11,'Information'),(12,'Compare'),(13,'Search');
/*!40000 ALTER TABLE `oc_layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_layout_module`
--

DROP TABLE IF EXISTS `oc_layout_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_layout_module` (
  `layout_module_id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_id` int(11) NOT NULL,
  `code` varchar(64) NOT NULL,
  `position` varchar(14) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`layout_module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_layout_module`
--

LOCK TABLES `oc_layout_module` WRITE;
/*!40000 ALTER TABLE `oc_layout_module` DISABLE KEYS */;
INSERT INTO `oc_layout_module` VALUES (2,4,'0','content_top',0),(3,4,'0','content_top',1),(20,5,'0','column_left',2),(69,10,'account','column_right',1),(68,6,'account','column_right',1),(88,2,'category','column_left',0),(89,2,'bestseller.32','column_left',1),(86,3,'category','column_left',0),(87,3,'bestseller.32','column_left',1),(95,1,'newslatest.33','content_bottom',1),(94,1,'bestseller.32','content_bottom',0),(93,1,'slideshow.27','content_top',1);
/*!40000 ALTER TABLE `oc_layout_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_layout_route`
--

DROP TABLE IF EXISTS `oc_layout_route`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_layout_route` (
  `layout_route_id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `route` varchar(64) NOT NULL,
  PRIMARY KEY (`layout_route_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_layout_route`
--

LOCK TABLES `oc_layout_route` WRITE;
/*!40000 ALTER TABLE `oc_layout_route` DISABLE KEYS */;
INSERT INTO `oc_layout_route` VALUES (38,6,0,'account/%'),(17,10,0,'affiliate/%'),(59,3,0,'product/category'),(62,1,0,'common/home'),(60,2,0,'product/product'),(24,11,0,'information/information'),(23,7,0,'checkout/%'),(31,8,0,'information/contact'),(32,9,0,'information/sitemap'),(34,4,0,''),(45,5,0,'product/manufacturer'),(52,12,0,'product/compare'),(53,13,0,'product/search');
/*!40000 ALTER TABLE `oc_layout_route` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_length_class`
--

DROP TABLE IF EXISTS `oc_length_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_length_class` (
  `length_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,8) NOT NULL,
  PRIMARY KEY (`length_class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_length_class`
--

LOCK TABLES `oc_length_class` WRITE;
/*!40000 ALTER TABLE `oc_length_class` DISABLE KEYS */;
INSERT INTO `oc_length_class` VALUES (1,1.00000000),(2,10.00000000),(3,0.39370000);
/*!40000 ALTER TABLE `oc_length_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_length_class_description`
--

DROP TABLE IF EXISTS `oc_length_class_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_length_class_description` (
  `length_class_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `unit` varchar(4) NOT NULL,
  PRIMARY KEY (`length_class_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_length_class_description`
--

LOCK TABLES `oc_length_class_description` WRITE;
/*!40000 ALTER TABLE `oc_length_class_description` DISABLE KEYS */;
INSERT INTO `oc_length_class_description` VALUES (1,1,'Centimeter','cm'),(2,1,'Millimeter','mm'),(3,1,'Inch','in'),(1,2,'Centimeter','cm'),(2,2,'Millimeter','mm'),(3,2,'Inch','in'),(1,3,'Centimeter','cm'),(2,3,'Millimeter','mm'),(3,3,'Inch','in'),(1,4,'Centimeter','cm'),(2,4,'Millimeter','mm'),(3,4,'Inch','in');
/*!40000 ALTER TABLE `oc_length_class_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_location`
--

DROP TABLE IF EXISTS `oc_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `geocode` varchar(32) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `open` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_location`
--

LOCK TABLES `oc_location` WRITE;
/*!40000 ALTER TABLE `oc_location` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_manufacturer`
--

DROP TABLE IF EXISTS `oc_manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_manufacturer`
--

LOCK TABLES `oc_manufacturer` WRITE;
/*!40000 ALTER TABLE `oc_manufacturer` DISABLE KEYS */;
INSERT INTO `oc_manufacturer` VALUES (5,'HTC','catalog/demo/htc_logo.jpg',0),(6,'Palm','catalog/demo/palm_logo.jpg',0),(7,'Hewlett-Packard','catalog/demo/hp_logo.jpg',0),(8,'Apple','catalog/demo/apple_logo.jpg',0),(9,'Canon','catalog/demo/canon_logo.jpg',0),(10,'Sony','catalog/demo/sony_logo.jpg',0);
/*!40000 ALTER TABLE `oc_manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_manufacturer_to_store`
--

DROP TABLE IF EXISTS `oc_manufacturer_to_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_manufacturer_to_store` (
  `manufacturer_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`manufacturer_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_manufacturer_to_store`
--

LOCK TABLES `oc_manufacturer_to_store` WRITE;
/*!40000 ALTER TABLE `oc_manufacturer_to_store` DISABLE KEYS */;
INSERT INTO `oc_manufacturer_to_store` VALUES (5,0),(6,0),(7,0),(8,0),(9,0),(10,0);
/*!40000 ALTER TABLE `oc_manufacturer_to_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_marketing`
--

DROP TABLE IF EXISTS `oc_marketing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_marketing` (
  `marketing_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `code` varchar(64) NOT NULL,
  `clicks` int(5) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`marketing_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_marketing`
--

LOCK TABLES `oc_marketing` WRITE;
/*!40000 ALTER TABLE `oc_marketing` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_marketing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_marketing_report`
--

DROP TABLE IF EXISTS `oc_marketing_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_marketing_report` (
  `marketing_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `marketing_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `country` varchar(2) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`marketing_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_marketing_report`
--

LOCK TABLES `oc_marketing_report` WRITE;
/*!40000 ALTER TABLE `oc_marketing_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_marketing_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_modification`
--

DROP TABLE IF EXISTS `oc_modification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_modification` (
  `modification_id` int(11) NOT NULL AUTO_INCREMENT,
  `extension_install_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `code` varchar(64) NOT NULL,
  `author` varchar(64) NOT NULL,
  `version` varchar(32) NOT NULL,
  `link` varchar(255) NOT NULL,
  `xml` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`modification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_modification`
--

LOCK TABLES `oc_modification` WRITE;
/*!40000 ALTER TABLE `oc_modification` DISABLE KEYS */;
INSERT INTO `oc_modification` VALUES (1,3,'Localcopy OCMOD Install Fix','localcopy-oc3','opencart3x.ru','1.0','https://opencart3x.ru','<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<modification>\n  <name>Localcopy OCMOD Install Fix</name>\n  <code>localcopy-oc3</code>\n  <version>1.0</version>\n  <author>opencart3x.ru</author>\n  <link>https://opencart3x.ru</link>\n\n  <file path=\"admin/controller/marketplace/install.php\">\n	<operation>\n      <search>\n        <![CDATA[if ($safe) {]]>\n      </search>\n      <add position=\"before\">\n        <![CDATA[		\n		    $safe = true;\n		    ]]>\n      </add>\n    </operation>\n    <operation>\n      <search>\n        <![CDATA[if (is_dir($file) && !is_dir($path)) {]]>\n      </search>\n      <add position=\"before\">\n        <![CDATA[		\n			  if ($path == \'\') {\n  				$app_root = explode(\'/\',DIR_APPLICATION);\n  				unset($app_root[count($app_root)-2]);\n  				$app_root = implode(\'/\',$app_root);\n  				$path = $app_root . $destination;\n			  }\n		    ]]>\n      </add>\n    </operation>\n  </file> \n</modification>\n',1,'2017-10-16 12:08:29');
/*!40000 ALTER TABLE `oc_modification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_module`
--

DROP TABLE IF EXISTS `oc_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `code` varchar(32) NOT NULL,
  `setting` text NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_module`
--

LOCK TABLES `oc_module` WRITE;
/*!40000 ALTER TABLE `oc_module` DISABLE KEYS */;
INSERT INTO `oc_module` VALUES (30,'Category','banner','{\"name\":\"Category\",\"banner_id\":\"6\",\"width\":\"182\",\"height\":\"182\",\"status\":\"1\"}'),(29,'Home Page','carousel','{\"name\":\"Home Page\",\"banner_id\":\"8\",\"width\":\"130\",\"height\":\"100\",\"status\":\"1\"}'),(28,'Home Page','featured','{\"name\":\"Home Page\",\"product_name\":\"\",\"product\":[\"43\",\"40\",\"42\",\"30\",\"47\",\"28\",\"36\",\"32\"],\"limit\":\"8\",\"width\":\"200\",\"height\":\"200\",\"status\":\"1\"}'),(27,'Home Page','slideshow','{\"name\":\"Home Page\",\"banner_id\":\"7\",\"width\":\"1140\",\"height\":\"380\",\"status\":\"1\"}'),(31,'Banner 1','banner','{\"name\":\"Banner 1\",\"banner_id\":\"6\",\"width\":\"182\",\"height\":\"182\",\"status\":\"1\"}'),(32,'ПопулярныеТовары(Покупаемые)','bestseller','{\"name\":\"\\u041f\\u043e\\u043f\\u0443\\u043b\\u044f\\u0440\\u043d\\u044b\\u0435\\u0422\\u043e\\u0432\\u0430\\u0440\\u044b(\\u041f\\u043e\\u043a\\u0443\\u043f\\u0430\\u0435\\u043c\\u044b\\u0435)\",\"limit\":\"5\",\"width\":\"200\",\"height\":\"200\",\"status\":\"1\"}'),(33,'НовыеНовостиКакТовары','newslatest','{\"name\":\"\\u041d\\u043e\\u0432\\u044b\\u0435\\u041d\\u043e\\u0432\\u043e\\u0441\\u0442\\u0438\\u041a\\u0430\\u043a\\u0422\\u043e\\u0432\\u0430\\u0440\\u044b\",\"limit\":\"3\",\"width\":\"200\",\"height\":\"200\",\"status\":\"1\"}');
/*!40000 ALTER TABLE `oc_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_option`
--

DROP TABLE IF EXISTS `oc_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_option`
--

LOCK TABLES `oc_option` WRITE;
/*!40000 ALTER TABLE `oc_option` DISABLE KEYS */;
INSERT INTO `oc_option` VALUES (1,'radio',1),(2,'checkbox',2),(4,'text',3),(5,'select',4),(6,'textarea',5),(7,'file',6),(8,'date',7),(9,'time',8),(10,'timestamp',9),(11,'select',10),(12,'date',11);
/*!40000 ALTER TABLE `oc_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_option_description`
--

DROP TABLE IF EXISTS `oc_option_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_option_description` (
  `option_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`option_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_option_description`
--

LOCK TABLES `oc_option_description` WRITE;
/*!40000 ALTER TABLE `oc_option_description` DISABLE KEYS */;
INSERT INTO `oc_option_description` VALUES (1,1,'Radio'),(2,1,'Checkbox'),(4,1,'Text'),(6,1,'Textarea'),(8,1,'Date'),(7,1,'File'),(5,1,'Select'),(9,1,'Time'),(10,1,'Date &amp; Time'),(12,1,'Delivery Date'),(11,1,'Size'),(1,2,'Radio'),(2,2,'Checkbox'),(4,2,'Text'),(6,2,'Textarea'),(8,2,'Date'),(7,2,'File'),(5,2,'Select'),(9,2,'Time'),(10,2,'Date &amp; Time'),(12,2,'Delivery Date'),(11,2,'Size'),(1,3,'Radio'),(2,3,'Checkbox'),(4,3,'Text'),(6,3,'Textarea'),(8,3,'Date'),(7,3,'File'),(5,3,'Select'),(9,3,'Time'),(10,3,'Date &amp; Time'),(12,3,'Delivery Date'),(11,3,'Size'),(1,4,'Radio'),(2,4,'Checkbox'),(4,4,'Text'),(6,4,'Textarea'),(8,4,'Date'),(7,4,'File'),(5,4,'Select'),(9,4,'Time'),(10,4,'Date &amp; Time'),(12,4,'Delivery Date'),(11,4,'Size');
/*!40000 ALTER TABLE `oc_option_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_option_value`
--

DROP TABLE IF EXISTS `oc_option_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_option_value` (
  `option_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`option_value_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_option_value`
--

LOCK TABLES `oc_option_value` WRITE;
/*!40000 ALTER TABLE `oc_option_value` DISABLE KEYS */;
INSERT INTO `oc_option_value` VALUES (43,1,'',3),(32,1,'',1),(45,2,'',4),(44,2,'',3),(42,5,'',4),(41,5,'',3),(39,5,'',1),(40,5,'',2),(31,1,'',2),(23,2,'',1),(24,2,'',2),(46,11,'',1),(47,11,'',2),(48,11,'',3);
/*!40000 ALTER TABLE `oc_option_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_option_value_description`
--

DROP TABLE IF EXISTS `oc_option_value_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_option_value_description` (
  `option_value_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`option_value_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_option_value_description`
--

LOCK TABLES `oc_option_value_description` WRITE;
/*!40000 ALTER TABLE `oc_option_value_description` DISABLE KEYS */;
INSERT INTO `oc_option_value_description` VALUES (43,1,1,'Large'),(32,1,1,'Small'),(45,1,2,'Checkbox 4'),(44,1,2,'Checkbox 3'),(31,1,1,'Medium'),(42,1,5,'Yellow'),(41,1,5,'Green'),(39,1,5,'Red'),(40,1,5,'Blue'),(23,1,2,'Checkbox 1'),(24,1,2,'Checkbox 2'),(48,1,11,'Large'),(47,1,11,'Medium'),(46,1,11,'Small'),(43,2,1,'Large'),(32,2,1,'Small'),(45,2,2,'Checkbox 4'),(44,2,2,'Checkbox 3'),(31,2,1,'Medium'),(42,2,5,'Yellow'),(41,2,5,'Green'),(39,2,5,'Red'),(40,2,5,'Blue'),(23,2,2,'Checkbox 1'),(24,2,2,'Checkbox 2'),(48,2,11,'Large'),(47,2,11,'Medium'),(46,2,11,'Small'),(43,3,1,'Large'),(32,3,1,'Small'),(45,3,2,'Checkbox 4'),(44,3,2,'Checkbox 3'),(31,3,1,'Medium'),(42,3,5,'Yellow'),(41,3,5,'Green'),(39,3,5,'Red'),(40,3,5,'Blue'),(23,3,2,'Checkbox 1'),(24,3,2,'Checkbox 2'),(48,3,11,'Large'),(47,3,11,'Medium'),(46,3,11,'Small'),(43,4,1,'Large'),(32,4,1,'Small'),(45,4,2,'Checkbox 4'),(44,4,2,'Checkbox 3'),(31,4,1,'Medium'),(42,4,5,'Yellow'),(41,4,5,'Green'),(39,4,5,'Red'),(40,4,5,'Blue'),(23,4,2,'Checkbox 1'),(24,4,2,'Checkbox 2'),(48,4,11,'Large'),(47,4,11,'Medium'),(46,4,11,'Small');
/*!40000 ALTER TABLE `oc_option_value_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order`
--

DROP TABLE IF EXISTS `oc_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) NOT NULL DEFAULT '0',
  `invoice_prefix` varchar(26) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT '0',
  `store_name` varchar(64) NOT NULL,
  `store_url` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `customer_group_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `custom_field` text NOT NULL,
  `payment_firstname` varchar(32) NOT NULL,
  `payment_lastname` varchar(32) NOT NULL,
  `payment_company` varchar(60) NOT NULL,
  `payment_address_1` varchar(128) NOT NULL,
  `payment_address_2` varchar(128) NOT NULL,
  `payment_city` varchar(128) NOT NULL,
  `payment_postcode` varchar(10) NOT NULL,
  `payment_country` varchar(128) NOT NULL,
  `payment_country_id` int(11) NOT NULL,
  `payment_zone` varchar(128) NOT NULL,
  `payment_zone_id` int(11) NOT NULL,
  `payment_address_format` text NOT NULL,
  `payment_custom_field` text NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `payment_code` varchar(128) NOT NULL,
  `shipping_firstname` varchar(32) NOT NULL,
  `shipping_lastname` varchar(32) NOT NULL,
  `shipping_company` varchar(40) NOT NULL,
  `shipping_address_1` varchar(128) NOT NULL,
  `shipping_address_2` varchar(128) NOT NULL,
  `shipping_city` varchar(128) NOT NULL,
  `shipping_postcode` varchar(10) NOT NULL,
  `shipping_country` varchar(128) NOT NULL,
  `shipping_country_id` int(11) NOT NULL,
  `shipping_zone` varchar(128) NOT NULL,
  `shipping_zone_id` int(11) NOT NULL,
  `shipping_address_format` text NOT NULL,
  `shipping_custom_field` text NOT NULL,
  `shipping_method` varchar(128) NOT NULL,
  `shipping_code` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `order_status_id` int(11) NOT NULL DEFAULT '0',
  `affiliate_id` int(11) NOT NULL,
  `commission` decimal(15,4) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `tracking` varchar(64) NOT NULL,
  `language_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `currency_value` decimal(15,8) NOT NULL DEFAULT '1.00000000',
  `ip` varchar(40) NOT NULL,
  `forwarded_ip` varchar(40) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `accept_language` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order`
--

LOCK TABLES `oc_order` WRITE;
/*!40000 ALTER TABLE `oc_order` DISABLE KEYS */;
INSERT INTO `oc_order` VALUES (1,0,'INV-2017-00',0,'SpecSyntez','http://ocart3.dev/',0,1,'First Name','First Name','First@example.com','123123','','[]','First Name','First Name','','First Name','','First Name','123123','Russian Federation',176,'',2785,'','[]','Cash On Delivery','cod','First Name','First Name','','First Name','','First Name','123123','Russian Federation',176,'',2785,'','[]','Flat Shipping Rate','flat.flat','',100505.0000,1,0,0.0000,0,'',4,4,'RUR',1.00000000,'127.0.0.1','','Mozilla/5.0 (X11; Linux i686; rv:57.0) Gecko/20100101 Firefox/57.0','en-US,en;q=0.5','2017-10-14 13:37:05','2017-10-14 13:37:05'),(2,0,'INV-2017-00',0,'SpecSyntez','http://ocart3.dev/',0,1,'First Name','First Name','qwe@qwe.er','123123','','[]','First Name','First Name','','First Name','','First Name','123123','Russian Federation',176,'',2785,'','[]','Cash On Delivery','cod','First Name','First Name','','First Name','','First Name','123123','Russian Federation',176,'',2785,'','[]','Flat Shipping Rate','flat.flat','',603005.0000,1,0,0.0000,0,'',4,4,'RUR',1.00000000,'127.0.0.1','','Mozilla/5.0 (X11; Linux i686; rv:57.0) Gecko/20100101 Firefox/57.0','en-US,en;q=0.5','2017-10-14 13:45:27','2017-10-14 13:45:27'),(3,0,'INV-2017-00',0,'SpecSyntez','http://ocart3.dev/',0,1,'Имя','Имя','qwe@qwe.qwe','123456','','[]','Имя','Имя','','First Name','','First Name','123123','Russian Federation',176,'',2785,'','[]','Оплата при доставке','cod','Имя','Имя','','First Name','','First Name','123123','Russian Federation',176,'',2785,'','[]','Доставка с фиксированной стоимостью доставки','flat.flat','',301505.0000,1,0,0.0000,0,'',4,4,'RUR',1.00000000,'127.0.0.1','','Mozilla/5.0 (X11; Linux i686; rv:57.0) Gecko/20100101 Firefox/57.0','en-US,en;q=0.5','2017-10-17 21:17:39','2017-10-17 21:17:39');
/*!40000 ALTER TABLE `oc_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_history`
--

DROP TABLE IF EXISTS `oc_order_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_history` (
  `order_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_history`
--

LOCK TABLES `oc_order_history` WRITE;
/*!40000 ALTER TABLE `oc_order_history` DISABLE KEYS */;
INSERT INTO `oc_order_history` VALUES (1,1,1,0,'','2017-10-14 13:37:05'),(2,2,1,0,'','2017-10-14 13:45:27'),(3,3,1,0,'','2017-10-17 21:17:39');
/*!40000 ALTER TABLE `oc_order_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_option`
--

DROP TABLE IF EXISTS `oc_order_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_option` (
  `order_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `product_option_value_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`order_option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_option`
--

LOCK TABLES `oc_order_option` WRITE;
/*!40000 ALTER TABLE `oc_order_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_order_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_product`
--

DROP TABLE IF EXISTS `oc_order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_product` (
  `order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `tax` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `reward` int(8) NOT NULL,
  PRIMARY KEY (`order_product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_product`
--

LOCK TABLES `oc_order_product` WRITE;
/*!40000 ALTER TABLE `oc_order_product` DISABLE KEYS */;
INSERT INTO `oc_order_product` VALUES (1,1,50,'Триосепт-Вет','001',1,100500.0000,100500.0000,0.0000,0),(2,2,53,'Триосепт-Вет 5','001',1,100500.0000,100500.0000,0.0000,0),(3,2,52,'Триосепт-Вет 4','001',1,100500.0000,100500.0000,0.0000,0),(4,2,51,'Триосепт-Вет 3','003',3,100500.0000,301500.0000,0.0000,0),(5,2,50,'Триосепт-Вет 2','002',1,100500.0000,100500.0000,0.0000,0),(6,3,53,'Триосепт-Вет 5','001',1,100500.0000,100500.0000,0.0000,0),(7,3,52,'Триосепт-Вет 4','001',1,100500.0000,100500.0000,0.0000,0),(8,3,51,'Триосепт-Вет 3','003',1,100500.0000,100500.0000,0.0000,0);
/*!40000 ALTER TABLE `oc_order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_recurring`
--

DROP TABLE IF EXISTS `oc_order_recurring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_recurring` (
  `order_recurring_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `recurring_id` int(11) NOT NULL,
  `recurring_name` varchar(255) NOT NULL,
  `recurring_description` varchar(255) NOT NULL,
  `recurring_frequency` varchar(25) NOT NULL,
  `recurring_cycle` smallint(6) NOT NULL,
  `recurring_duration` smallint(6) NOT NULL,
  `recurring_price` decimal(10,4) NOT NULL,
  `trial` tinyint(1) NOT NULL,
  `trial_frequency` varchar(25) NOT NULL,
  `trial_cycle` smallint(6) NOT NULL,
  `trial_duration` smallint(6) NOT NULL,
  `trial_price` decimal(10,4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_recurring_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_recurring`
--

LOCK TABLES `oc_order_recurring` WRITE;
/*!40000 ALTER TABLE `oc_order_recurring` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_order_recurring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_recurring_transaction`
--

DROP TABLE IF EXISTS `oc_order_recurring_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_recurring_transaction` (
  `order_recurring_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_recurring_id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` decimal(10,4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_recurring_transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_recurring_transaction`
--

LOCK TABLES `oc_order_recurring_transaction` WRITE;
/*!40000 ALTER TABLE `oc_order_recurring_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_order_recurring_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_shipment`
--

DROP TABLE IF EXISTS `oc_order_shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_shipment` (
  `order_shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shipping_courier_id` varchar(255) NOT NULL DEFAULT '',
  `tracking_number` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`order_shipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_shipment`
--

LOCK TABLES `oc_order_shipment` WRITE;
/*!40000 ALTER TABLE `oc_order_shipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_order_shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_status`
--

DROP TABLE IF EXISTS `oc_order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`order_status_id`,`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_status`
--

LOCK TABLES `oc_order_status` WRITE;
/*!40000 ALTER TABLE `oc_order_status` DISABLE KEYS */;
INSERT INTO `oc_order_status` VALUES (2,1,'Processing'),(3,1,'Shipped'),(7,1,'Canceled'),(5,1,'Complete'),(8,1,'Denied'),(9,1,'Canceled Reversal'),(10,1,'Failed'),(11,1,'Refunded'),(12,1,'Reversed'),(13,1,'Chargeback'),(1,1,'Pending'),(16,1,'Voided'),(15,1,'Processed'),(14,1,'Expired'),(2,2,'Processing'),(3,2,'Shipped'),(7,2,'Canceled'),(5,2,'Complete'),(8,2,'Denied'),(9,2,'Canceled Reversal'),(10,2,'Failed'),(11,2,'Refunded'),(12,2,'Reversed'),(13,2,'Chargeback'),(1,2,'Pending'),(16,2,'Voided'),(15,2,'Processed'),(14,2,'Expired'),(2,3,'Processing'),(3,3,'Shipped'),(7,3,'Canceled'),(5,3,'Complete'),(8,3,'Denied'),(9,3,'Canceled Reversal'),(10,3,'Failed'),(11,3,'Refunded'),(12,3,'Reversed'),(13,3,'Chargeback'),(1,3,'Pending'),(16,3,'Voided'),(15,3,'Processed'),(14,3,'Expired'),(2,4,'Processing'),(3,4,'Shipped'),(7,4,'Canceled'),(5,4,'Complete'),(8,4,'Denied'),(9,4,'Canceled Reversal'),(10,4,'Failed'),(11,4,'Refunded'),(12,4,'Reversed'),(13,4,'Chargeback'),(1,4,'Pending'),(16,4,'Voided'),(15,4,'Processed'),(14,4,'Expired');
/*!40000 ALTER TABLE `oc_order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_total`
--

DROP TABLE IF EXISTS `oc_order_total`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_total` (
  `order_total_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`order_total_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_total`
--

LOCK TABLES `oc_order_total` WRITE;
/*!40000 ALTER TABLE `oc_order_total` DISABLE KEYS */;
INSERT INTO `oc_order_total` VALUES (1,1,'sub_total','Sub-Total',100500.0000,1),(2,1,'shipping','Flat Shipping Rate',5.0000,3),(3,1,'total','Total',100505.0000,9),(4,2,'sub_total','Sub-Total',603000.0000,1),(5,2,'shipping','Flat Shipping Rate',5.0000,3),(6,2,'total','Total',603005.0000,9),(7,3,'sub_total','Сумма',301500.0000,1),(8,3,'shipping','Доставка с фиксированной стоимостью доставки',5.0000,3),(9,3,'total','Итого',301505.0000,9);
/*!40000 ALTER TABLE `oc_order_total` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_order_voucher`
--

DROP TABLE IF EXISTS `oc_order_voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_order_voucher` (
  `order_voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `from_name` varchar(64) NOT NULL,
  `from_email` varchar(96) NOT NULL,
  `to_name` varchar(64) NOT NULL,
  `to_email` varchar(96) NOT NULL,
  `voucher_theme_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  PRIMARY KEY (`order_voucher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_order_voucher`
--

LOCK TABLES `oc_order_voucher` WRITE;
/*!40000 ALTER TABLE `oc_order_voucher` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_order_voucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product`
--

DROP TABLE IF EXISTS `oc_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(64) NOT NULL,
  `sku` varchar(64) NOT NULL,
  `upc` varchar(12) NOT NULL,
  `ean` varchar(14) NOT NULL,
  `jan` varchar(13) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `mpn` varchar(64) NOT NULL,
  `location` varchar(128) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `stock_status_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `shipping` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `points` int(8) NOT NULL DEFAULT '0',
  `tax_class_id` int(11) NOT NULL,
  `date_available` date NOT NULL DEFAULT '0000-00-00',
  `weight` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `weight_class_id` int(11) NOT NULL DEFAULT '0',
  `length` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `width` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `height` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `length_class_id` int(11) NOT NULL DEFAULT '0',
  `subtract` tinyint(1) NOT NULL DEFAULT '1',
  `minimum` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` int(5) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status2` int(11) DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product`
--

LOCK TABLES `oc_product` WRITE;
/*!40000 ALTER TABLE `oc_product` DISABLE KEYS */;
INSERT INTO `oc_product` VALUES (54,'001','','','','','','','',100499,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,1,0,'2017-10-18 12:05:29','2017-10-18 12:05:29',1),(50,'002','','','','','','','',100498,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,1,20,'2017-10-18 11:47:42','2017-10-18 11:47:42',0),(51,'003','','','','','','','',100495,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,1,3,'2017-10-17 21:17:39','2017-10-14 13:41:22',0),(52,'001','','','','','','','',100497,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,1,7,'2017-10-17 21:17:39','2017-10-14 13:42:09',0),(53,'001','','','','','','','',100497,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,1,1,'2017-10-17 21:17:39','2017-10-17 15:19:18',0),(55,'0055','','','','','','','',100499,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,1,0,'2017-10-18 12:26:01','2017-10-18 12:26:01',1),(56,'0055','','','','','','','',100499,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,1,0,'2017-10-18 12:30:16','2017-10-18 12:30:16',1),(57,'0055','','','','','','','',100499,7,'catalog/tproducts/triosept-vet.png',0,1,100500.0000,0,0,'2017-10-14',20.00000000,1,50.00000000,50.00000000,50.00000000,1,1,1,1,0,0,'2017-10-18 14:48:31','2017-10-18 14:48:31',0);
/*!40000 ALTER TABLE `oc_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_attribute`
--

DROP TABLE IF EXISTS `oc_product_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_attribute` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`product_id`,`attribute_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_attribute`
--

LOCK TABLES `oc_product_attribute` WRITE;
/*!40000 ALTER TABLE `oc_product_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_description`
--

DROP TABLE IF EXISTS `oc_product_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_description` (
  `product_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tag` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `newslatest` text,
  `show_newslatest` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`language_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_description`
--

LOCK TABLES `oc_product_description` WRITE;
/*!40000 ALTER TABLE `oc_product_description` DISABLE KEYS */;
INSERT INTO `oc_product_description` VALUES (50,4,'Триосепт-Вет 2','Триосепт-Вет Триосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-Вет&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;','','Триосепт-Вет 2','Триосепт-Вет','Триосепт-Вет','<div></div>',0),(55,4,'Триосепт-Вет  55','Триосепт-Вет Триосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-Вет&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;','','Триосепт-Вет','Триосепт-Вет','Триосепт-Вет','<div>&lt;div&gt;новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском новость к товару 55 на русском &lt;/div&gt;</div>',1),(52,1,'Triosept-vet 4','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet ','Triosept-vet ','Triosept-vet ','рыов ыворыов рыов ырвоы воы врыов оырвоы воырво ыворыовр ыорв оывроы воыр воырворы овроаолпал плаоп лаоалвоалвоа влоалвоа лвоалв аова раопр варвоароа проап лпрол крерр клепокао  о аоплао плаопла плаоп 111111112819281928918291 281928918 281928 91 2891829 1829 182981928 19829 1829182918291829 1982918291 2819289182 19829182 19829182 918291829 128919281928 19289128 1928 19289182 1928192891829182 1982918291829182 ',1),(52,4,'Триосепт-Вет 4','Триосепт-Вет Триосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-Вет&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;','','Триосепт-Вет','Триосепт-Вет','Триосепт-Вет','рыов ыворыов рыов ырвоы воы врыов оырвоы воырво ыворыовр ыорв оывроы воыр воырворы овроаолпал плаоп лаоалвоалвоа влоалвоа лвоалв аова раопр варвоароа проап лпрол крерр клепокао  о аоплао плаопла плаоп 111111112819281928918291 281928918 281928 91 2891829 1829 182981928 19829 1829182918291829 1982918291 2819289182 19829182 19829182 918291829 128919281928 19289128 1928 19289182 1928192891829182 1982918291829182 ',1),(55,1,'Triosept-vet 55','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet ','Triosept-vet ','Triosept-vet ','<div>&lt;div&gt;&lt;div&gt;&lt;p&gt;english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 english newslatest for item 55 &lt;/p&gt;&lt;/div&gt;&lt;/div&gt;</div>',1),(53,4,'Триосепт-Вет 5','Триосепт-Вет Триосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-Вет&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;','','Триосепт-Вет','Триосепт-Вет','Триосепт-Вет',NULL,NULL),(50,1,'Triosept-vet 2','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet  2','Triosept-vet ','Triosept-vet ','<div>&lt;p&gt;123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df 123 345 df&amp;nbsp; &lt;/p&gt;&amp;nbsp;&lt;br&gt;</div>',0),(51,1,'Triosept-vet 3','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet  3','Triosept-vet ','Triosept-vet ','рыов ыворыов рыов ырвоы воы врыов оырвоы воырво ыворыовр ыорв оывроы воыр воырворы овроаолпал плаоп лаоалвоалвоа влоалвоа лвоалв аова раопр варвоароа проап лпрол крерр клепокао  о аоплао плаопла плаоп 111111112819281928918291 281928918 281928 91 2891829 1829 182981928 19829 1829182918291829 1982918291 2819289182 19829182 19829182 918291829 128919281928 19289128 1928 19289182 1928192891829182 1982918291829182 ',1),(51,4,'Триосепт-Вет 3','Триосепт-Вет Триосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-Вет&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;','','Триосепт-Вет 3','Триосепт-Вет','Триосепт-Вет','рыов ыворыов рыов ырвоы воы врыов оырвоы воырво ыворыовр ыорв оывроы воыр воырворы овроаолпал плаоп лаоалвоалвоа влоалвоа лвоалв аова раопр варвоароа проап лпрол крерр клепокао  о аоплао плаопла плаоп 111111112819281928918291 281928918 281928 91 2891829 1829 182981928 19829 1829182918291829 1982918291 2819289182 19829182 19829182 918291829 128919281928 19289128 1928 19289182 1928192891829182 1982918291829182 ',1),(53,1,'Triosept-vet 5','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet ','Triosept-vet ','Triosept-vet ',NULL,NULL),(54,1,'Triosept-vet 54','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet ','Triosept-vet ','Triosept-vet ','\n<p>Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet TTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet TTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet TTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet TTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet \r\nTriosept-vet T</p>\n',1),(56,4,'Триосепт-Вет  56','Триосепт-Вет Триосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-Вет&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;','','Триосепт-Вет','Триосепт-Вет','Триосепт-Вет','<div>56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 \r\n56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) 56 56 56 оренбург ))) 56 56 56 оренбург ))) 56 56 56 \r\nоренбург ))) &lt;div&gt;&lt;/div&gt;</div>',1),(56,1,'Triosept-vet 56','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet ','Triosept-vet ','Triosept-vet ','<div>OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural OrenBurg town on south ural </div>',1),(57,1,'Triosept-vet 56','Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet Triosept-vet ','','Triosept-vet ','Triosept-vet ','Triosept-vet ','<div></div>',1),(57,4,'Триосепт-Вет  56','Триосепт-Вет Триосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-ВетТриосепт-Вет&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;','','Триосепт-Вет','Триосепт-Вет','Триосепт-Вет','<div></div>',1);
/*!40000 ALTER TABLE `oc_product_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_discount`
--

DROP TABLE IF EXISTS `oc_product_discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_discount` (
  `product_discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `priority` int(5) NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `date_start` date NOT NULL DEFAULT '0000-00-00',
  `date_end` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`product_discount_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=441 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_discount`
--

LOCK TABLES `oc_product_discount` WRITE;
/*!40000 ALTER TABLE `oc_product_discount` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_filter`
--

DROP TABLE IF EXISTS `oc_product_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_filter` (
  `product_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`filter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_filter`
--

LOCK TABLES `oc_product_filter` WRITE;
/*!40000 ALTER TABLE `oc_product_filter` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_filter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_image`
--

DROP TABLE IF EXISTS `oc_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_image` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2353 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_image`
--

LOCK TABLES `oc_product_image` WRITE;
/*!40000 ALTER TABLE `oc_product_image` DISABLE KEYS */;
INSERT INTO `oc_product_image` VALUES (2352,53,'catalog/logo-325x325.png',0);
/*!40000 ALTER TABLE `oc_product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_option`
--

DROP TABLE IF EXISTS `oc_product_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_option` (
  `product_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `required` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_option`
--

LOCK TABLES `oc_product_option` WRITE;
/*!40000 ALTER TABLE `oc_product_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_option_value`
--

DROP TABLE IF EXISTS `oc_product_option_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_option_value` (
  `product_option_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_option_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `quantity` int(3) NOT NULL,
  `subtract` tinyint(1) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `price_prefix` varchar(1) NOT NULL,
  `points` int(8) NOT NULL,
  `points_prefix` varchar(1) NOT NULL,
  `weight` decimal(15,8) NOT NULL,
  `weight_prefix` varchar(1) NOT NULL,
  PRIMARY KEY (`product_option_value_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_option_value`
--

LOCK TABLES `oc_product_option_value` WRITE;
/*!40000 ALTER TABLE `oc_product_option_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_option_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_recurring`
--

DROP TABLE IF EXISTS `oc_product_recurring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_recurring` (
  `product_id` int(11) NOT NULL,
  `recurring_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`recurring_id`,`customer_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_recurring`
--

LOCK TABLES `oc_product_recurring` WRITE;
/*!40000 ALTER TABLE `oc_product_recurring` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_recurring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_related`
--

DROP TABLE IF EXISTS `oc_product_related`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_related` (
  `product_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`related_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_related`
--

LOCK TABLES `oc_product_related` WRITE;
/*!40000 ALTER TABLE `oc_product_related` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_related` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_reward`
--

DROP TABLE IF EXISTS `oc_product_reward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_reward` (
  `product_reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `customer_group_id` int(11) NOT NULL DEFAULT '0',
  `points` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_reward_id`)
) ENGINE=MyISAM AUTO_INCREMENT=546 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_reward`
--

LOCK TABLES `oc_product_reward` WRITE;
/*!40000 ALTER TABLE `oc_product_reward` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_reward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_special`
--

DROP TABLE IF EXISTS `oc_product_special`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_special` (
  `product_special_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `priority` int(5) NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `date_start` date NOT NULL DEFAULT '0000-00-00',
  `date_end` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`product_special_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=440 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_special`
--

LOCK TABLES `oc_product_special` WRITE;
/*!40000 ALTER TABLE `oc_product_special` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_special` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_to_category`
--

DROP TABLE IF EXISTS `oc_product_to_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_to_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_to_category`
--

LOCK TABLES `oc_product_to_category` WRITE;
/*!40000 ALTER TABLE `oc_product_to_category` DISABLE KEYS */;
INSERT INTO `oc_product_to_category` VALUES (50,63),(50,71),(51,61),(51,66),(51,67),(52,60),(53,62),(54,63),(54,71),(55,63),(55,71),(56,63),(56,71),(57,63),(57,71);
/*!40000 ALTER TABLE `oc_product_to_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_to_download`
--

DROP TABLE IF EXISTS `oc_product_to_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_to_download` (
  `product_id` int(11) NOT NULL,
  `download_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`download_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_to_download`
--

LOCK TABLES `oc_product_to_download` WRITE;
/*!40000 ALTER TABLE `oc_product_to_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_product_to_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_to_layout`
--

DROP TABLE IF EXISTS `oc_product_to_layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_to_layout` (
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_to_layout`
--

LOCK TABLES `oc_product_to_layout` WRITE;
/*!40000 ALTER TABLE `oc_product_to_layout` DISABLE KEYS */;
INSERT INTO `oc_product_to_layout` VALUES (50,0,0),(51,0,0),(52,0,0),(53,0,0),(54,0,0),(55,0,0),(56,0,0),(57,0,0);
/*!40000 ALTER TABLE `oc_product_to_layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_product_to_store`
--

DROP TABLE IF EXISTS `oc_product_to_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_product_to_store` (
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_product_to_store`
--

LOCK TABLES `oc_product_to_store` WRITE;
/*!40000 ALTER TABLE `oc_product_to_store` DISABLE KEYS */;
INSERT INTO `oc_product_to_store` VALUES (50,0),(51,0),(52,0),(53,0),(54,0),(55,0),(56,0),(57,0);
/*!40000 ALTER TABLE `oc_product_to_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_recurring`
--

DROP TABLE IF EXISTS `oc_recurring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_recurring` (
  `recurring_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,4) NOT NULL,
  `frequency` enum('day','week','semi_month','month','year') NOT NULL,
  `duration` int(10) unsigned NOT NULL,
  `cycle` int(10) unsigned NOT NULL,
  `trial_status` tinyint(4) NOT NULL,
  `trial_price` decimal(10,4) NOT NULL,
  `trial_frequency` enum('day','week','semi_month','month','year') NOT NULL,
  `trial_duration` int(10) unsigned NOT NULL,
  `trial_cycle` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`recurring_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_recurring`
--

LOCK TABLES `oc_recurring` WRITE;
/*!40000 ALTER TABLE `oc_recurring` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_recurring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_recurring_description`
--

DROP TABLE IF EXISTS `oc_recurring_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_recurring_description` (
  `recurring_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`recurring_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_recurring_description`
--

LOCK TABLES `oc_recurring_description` WRITE;
/*!40000 ALTER TABLE `oc_recurring_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_recurring_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_return`
--

DROP TABLE IF EXISTS `oc_return`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_return` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `product` varchar(255) NOT NULL,
  `model` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL,
  `opened` tinyint(1) NOT NULL,
  `return_reason_id` int(11) NOT NULL,
  `return_action_id` int(11) NOT NULL,
  `return_status_id` int(11) NOT NULL,
  `comment` text,
  `date_ordered` date NOT NULL DEFAULT '0000-00-00',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_return`
--

LOCK TABLES `oc_return` WRITE;
/*!40000 ALTER TABLE `oc_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_return` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_return_action`
--

DROP TABLE IF EXISTS `oc_return_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_return_action` (
  `return_action_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`return_action_id`,`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_return_action`
--

LOCK TABLES `oc_return_action` WRITE;
/*!40000 ALTER TABLE `oc_return_action` DISABLE KEYS */;
INSERT INTO `oc_return_action` VALUES (1,1,'Refunded'),(2,1,'Credit Issued'),(3,1,'Replacement Sent'),(1,2,'Refunded'),(2,2,'Credit Issued'),(3,2,'Replacement Sent'),(1,3,'Refunded'),(2,3,'Credit Issued'),(3,3,'Replacement Sent'),(1,4,'Refunded'),(2,4,'Credit Issued'),(3,4,'Replacement Sent');
/*!40000 ALTER TABLE `oc_return_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_return_history`
--

DROP TABLE IF EXISTS `oc_return_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_return_history` (
  `return_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `return_id` int(11) NOT NULL,
  `return_status_id` int(11) NOT NULL,
  `notify` tinyint(1) NOT NULL,
  `comment` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`return_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_return_history`
--

LOCK TABLES `oc_return_history` WRITE;
/*!40000 ALTER TABLE `oc_return_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_return_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_return_reason`
--

DROP TABLE IF EXISTS `oc_return_reason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_return_reason` (
  `return_reason_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`return_reason_id`,`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_return_reason`
--

LOCK TABLES `oc_return_reason` WRITE;
/*!40000 ALTER TABLE `oc_return_reason` DISABLE KEYS */;
INSERT INTO `oc_return_reason` VALUES (1,1,'Dead On Arrival'),(2,1,'Received Wrong Item'),(3,1,'Order Error'),(4,1,'Faulty, please supply details'),(5,1,'Other, please supply details'),(1,2,'Dead On Arrival'),(2,2,'Received Wrong Item'),(3,2,'Order Error'),(4,2,'Faulty, please supply details'),(5,2,'Other, please supply details'),(1,3,'Dead On Arrival'),(2,3,'Received Wrong Item'),(3,3,'Order Error'),(4,3,'Faulty, please supply details'),(5,3,'Other, please supply details'),(1,4,'Dead On Arrival'),(2,4,'Received Wrong Item'),(3,4,'Order Error'),(4,4,'Faulty, please supply details'),(5,4,'Other, please supply details');
/*!40000 ALTER TABLE `oc_return_reason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_return_status`
--

DROP TABLE IF EXISTS `oc_return_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_return_status` (
  `return_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`return_status_id`,`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_return_status`
--

LOCK TABLES `oc_return_status` WRITE;
/*!40000 ALTER TABLE `oc_return_status` DISABLE KEYS */;
INSERT INTO `oc_return_status` VALUES (1,1,'Pending'),(3,1,'Complete'),(2,1,'Awaiting Products'),(1,2,'Pending'),(3,2,'Complete'),(2,2,'Awaiting Products'),(1,3,'Pending'),(3,3,'Complete'),(2,3,'Awaiting Products'),(1,4,'Pending'),(3,4,'Complete'),(2,4,'Awaiting Products');
/*!40000 ALTER TABLE `oc_return_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_review`
--

DROP TABLE IF EXISTS `oc_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `rating` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`review_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_review`
--

LOCK TABLES `oc_review` WRITE;
/*!40000 ALTER TABLE `oc_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_seo_url`
--

DROP TABLE IF EXISTS `oc_seo_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_seo_url` (
  `seo_url_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `query` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  PRIMARY KEY (`seo_url_id`),
  KEY `query` (`query`),
  KEY `keyword` (`keyword`)
) ENGINE=MyISAM AUTO_INCREMENT=850 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_seo_url`
--

LOCK TABLES `oc_seo_url` WRITE;
/*!40000 ALTER TABLE `oc_seo_url` DISABLE KEYS */;
INSERT INTO `oc_seo_url` VALUES (730,0,1,'manufacturer_id=8','apple'),(844,0,1,'information_id=4','about_us'),(847,0,4,'information_id=3','privacy3'),(849,0,4,'information_id=6','отгрузка'),(828,0,1,'manufacturer_id=9','canon'),(829,0,1,'manufacturer_id=5','htc'),(830,0,1,'manufacturer_id=7','hewlett-packard'),(831,0,1,'manufacturer_id=6','palm'),(832,0,1,'manufacturer_id=10','sony'),(848,0,1,'information_id=6','delivery'),(846,0,1,'information_id=3','privacy2'),(845,0,1,'information_id=5','terms');
/*!40000 ALTER TABLE `oc_seo_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_session`
--

DROP TABLE IF EXISTS `oc_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_session` (
  `session_id` varchar(32) NOT NULL,
  `data` text NOT NULL,
  `expire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_session`
--

LOCK TABLES `oc_session` WRITE;
/*!40000 ALTER TABLE `oc_session` DISABLE KEYS */;
INSERT INTO `oc_session` VALUES ('19ba4ed6bd453cc14da356767e','{\"language\":\"en-gb\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-10-09 17:40:15'),('200a00a448aa94b9f9df38cdf0','{\"language\":\"en-gb\",\"currency\":\"USD\",\"current_zone\":{\"zone_id\":\"2761\",\"country_id\":\"176\",\"name\":\"Moscow\",\"code\":\"MO\",\"status\":\"1\",\"sort_order\":\"0\"},\"user_id\":\"1\",\"user_token\":\"0b633f6bdfede7c70e14b5465ca07cb3\"}','2017-09-23 15:26:50'),('2edbcbc8008fd7c10594a6e467','{\"language\":\"en-gb\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-09-27 05:43:51'),('30b4fa178e2347064f0c5d9efd','{\"language\":\"ru_ru\",\"currency\":\"RUR\",\"current_zone\":{\"zone_id\":\"2761\",\"country_id\":\"176\",\"name\":\"Moscow\",\"code\":\"MO\",\"status\":\"1\",\"sort_order\":\"0\"},\"user_id\":\"1\",\"user_token\":\"4dc5c17da301831f7e6d53f64f380bc9\"}','2017-10-10 07:09:47'),('3991905da0a4d0c9d5c6c1384e','{\"user_id\":\"1\",\"user_token\":\"4efd82aef1983f91a58bc5ecab5e04b6\"}','2017-09-21 05:40:46'),('40523c0f9c0ee3e12b9e5d9188','{\"language\":\"ru-ru\",\"currency\":\"RUR\"}','2017-10-17 09:58:15'),('4ac7d3c5ced206f1819c041b6d','{\"language\":\"ru_ru\",\"currency\":\"RUR\"}','2017-10-17 10:02:34'),('5497672d7f6ac2c351858e7d8d','{\"language\":\"en-gb\",\"currency\":\"USD\",\"current_zone\":[]}','2017-10-06 23:51:25'),('559492a558937d365f92917d11','{\"language\":\"ru-ru\",\"currency\":\"RUR\"}','2017-10-17 09:59:20'),('5a73cf6b7b35a7c00cc9b5484b','{\"language\":\"ru-ru\",\"currency\":\"RUR\"}','2017-10-17 09:59:11'),('69fc385437f17bd9be01b81fcd','{\"language\":\"en-gb\",\"currency\":\"USD\",\"current_zone\":{\"zone_id\":\"2785\",\"country_id\":\"176\",\"name\":\"St. Petersburg\",\"code\":\"SP\",\"status\":\"1\",\"sort_order\":\"0\"}}','2017-10-17 09:20:13'),('71fea8d0df64bf3be1d91e0c13','{\"language\":\"ru-ru\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-10-17 09:57:23'),('8ded4554766ba9b3a2df111426','{\"language\":\"ru-ru\",\"currency\":\"RUR\"}','2017-10-17 10:05:27'),('943812de061ff1a68dfa9e7282','{\"language\":\"ru-ru\",\"currency\":\"USD\",\"current_zone\":{\"zone_id\":\"2785\",\"country_id\":\"176\",\"name\":\"St. Petersburg\",\"code\":\"SP\",\"status\":\"1\",\"sort_order\":\"0\"}}','2017-10-17 10:09:12'),('99d71d375515f86ec32120f08c','false','2017-10-17 10:09:44'),('ad3c16772c231f70621b60ba8e','{\"language\":\"ru_ru\",\"currency\":\"RUR\"}','2017-10-17 10:05:17'),('afd3896124f4973da4a0e0f897','{\"language\":\"en-gb\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-10-09 17:27:23'),('b6e7db2d5e10e35a198cf2743e','{\"language\":\"en-gb\",\"currency\":\"USD\",\"current_zone\":[],\"user_id\":\"1\",\"user_token\":\"ae79cef043df70c8be21872d092695ff\"}','2017-09-26 16:45:30'),('c27486809ea7dc1b25d969ac32','{\"language\":\"ru-ru\",\"currency\":\"RUR\",\"current_zone\":{\"zone_id\":\"2761\",\"country_id\":\"176\",\"name\":\"Moscow\",\"code\":\"MO\",\"status\":\"1\",\"sort_order\":\"0\"},\"user_id\":\"1\",\"user_token\":\"a7b6b53e0d9bc6789b66efbff56782e7\",\"account\":\"guest\",\"payment_address\":{\"firstname\":\"\\u0418\\u043c\\u044f\",\"lastname\":\"\\u0418\\u043c\\u044f\",\"company\":\"\",\"address_1\":\"First Name\",\"address_2\":\"\",\"postcode\":\"123123\",\"city\":\"First Name\",\"country_id\":\"176\",\"zone_id\":\"2785\",\"country\":\"Russian Federation\",\"iso_code_2\":\"RU\",\"iso_code_3\":\"RUS\",\"address_format\":\"\",\"custom_field\":[],\"zone\":\"\",\"zone_code\":\"\"},\"shipping_address\":{\"firstname\":\"\\u0418\\u043c\\u044f\",\"lastname\":\"\\u0418\\u043c\\u044f\",\"company\":\"\",\"address_1\":\"First Name\",\"address_2\":\"\",\"postcode\":\"123123\",\"city\":\"First Name\",\"country_id\":\"176\",\"zone_id\":\"2785\",\"country\":\"Russian Federation\",\"iso_code_2\":\"RU\",\"iso_code_3\":\"RUS\",\"address_format\":\"\",\"zone\":\"\",\"zone_code\":\"\",\"custom_field\":[]},\"install\":\"f7c4410ab4\",\"wishlist\":[\"50\"]}','2017-10-18 13:11:13'),('cd87cddde0a66b34060df6f3e4','{\"language\":\"en-gb\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-10-17 11:18:04'),('dda2e4ecf8eff59489428c9712','{\"language\":\"en-gb\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-10-09 17:40:32'),('df3c0c069cc3a2de7df1091859','{\"language\":\"en-gb\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-10-09 17:40:07'),('eca9b61e1ab7ed366d028e2ccd','{\"language\":\"ru-ru\",\"currency\":\"RUR\"}','2017-10-17 09:58:37'),('f5de1290082b0f36449645f4b2','{\"language\":\"en-gb\",\"currency\":\"RUR\",\"current_zone\":[]}','2017-10-09 14:18:32');
/*!40000 ALTER TABLE `oc_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_setting`
--

DROP TABLE IF EXISTS `oc_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(128) NOT NULL,
  `key` varchar(128) NOT NULL,
  `value` text NOT NULL,
  `serialized` tinyint(1) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1347 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_setting`
--

LOCK TABLES `oc_setting` WRITE;
/*!40000 ALTER TABLE `oc_setting` DISABLE KEYS */;
INSERT INTO `oc_setting` VALUES (1320,0,'config','config_error_display','1',0),(1321,0,'config','config_error_log','1',0),(1309,0,'config','config_maintenance','0',0),(1310,0,'config','config_seo_url','0',0),(1311,0,'config','config_robots','abot\r\ndbot\r\nebot\r\nhbot\r\nkbot\r\nlbot\r\nmbot\r\nnbot\r\nobot\r\npbot\r\nrbot\r\nsbot\r\ntbot\r\nvbot\r\nybot\r\nzbot\r\nbot.\r\nbot/\r\n_bot\r\n.bot\r\n/bot\r\n-bot\r\n:bot\r\n(bot\r\ncrawl\r\nslurp\r\nspider\r\nseek\r\naccoona\r\nacoon\r\nadressendeutschland\r\nah-ha.com\r\nahoy\r\naltavista\r\nananzi\r\nanthill\r\nappie\r\narachnophilia\r\narale\r\naraneo\r\naranha\r\narchitext\r\naretha\r\narks\r\nasterias\r\natlocal\r\natn\r\natomz\r\naugurfind\r\nbackrub\r\nbannana_bot\r\nbaypup\r\nbdfetch\r\nbig brother\r\nbiglotron\r\nbjaaland\r\nblackwidow\r\nblaiz\r\nblog\r\nblo.\r\nbloodhound\r\nboitho\r\nbooch\r\nbradley\r\nbutterfly\r\ncalif\r\ncassandra\r\nccubee\r\ncfetch\r\ncharlotte\r\nchurl\r\ncienciaficcion\r\ncmc\r\ncollective\r\ncomagent\r\ncombine\r\ncomputingsite\r\ncsci\r\ncurl\r\ncusco\r\ndaumoa\r\ndeepindex\r\ndelorie\r\ndepspid\r\ndeweb\r\ndie blinde kuh\r\ndigger\r\nditto\r\ndmoz\r\ndocomo\r\ndownload express\r\ndtaagent\r\ndwcp\r\nebiness\r\nebingbong\r\ne-collector\r\nejupiter\r\nemacs-w3 search engine\r\nesther\r\nevliya celebi\r\nezresult\r\nfalcon\r\nfelix ide\r\nferret\r\nfetchrover\r\nfido\r\nfindlinks\r\nfireball\r\nfish search\r\nfouineur\r\nfunnelweb\r\ngazz\r\ngcreep\r\ngenieknows\r\ngetterroboplus\r\ngeturl\r\nglx\r\ngoforit\r\ngolem\r\ngrabber\r\ngrapnel\r\ngralon\r\ngriffon\r\ngromit\r\ngrub\r\ngulliver\r\nhamahakki\r\nharvest\r\nhavindex\r\nhelix\r\nheritrix\r\nhku www octopus\r\nhomerweb\r\nhtdig\r\nhtml index\r\nhtml_analyzer\r\nhtmlgobble\r\nhubater\r\nhyper-decontextualizer\r\nia_archiver\r\nibm_planetwide\r\nichiro\r\niconsurf\r\niltrovatore\r\nimage.kapsi.net\r\nimagelock\r\nincywincy\r\nindexer\r\ninfobee\r\ninformant\r\ningrid\r\ninktomisearch.com\r\ninspector web\r\nintelliagent\r\ninternet shinchakubin\r\nip3000\r\niron33\r\nisraeli-search\r\nivia\r\njack\r\njakarta\r\njavabee\r\njetbot\r\njumpstation\r\nkatipo\r\nkdd-explorer\r\nkilroy\r\nknowledge\r\nkototoi\r\nkretrieve\r\nlabelgrabber\r\nlachesis\r\nlarbin\r\nlegs\r\nlibwww\r\nlinkalarm\r\nlink validator\r\nlinkscan\r\nlockon\r\nlwp\r\nlycos\r\nmagpie\r\nmantraagent\r\nmapoftheinternet\r\nmarvin/\r\nmattie\r\nmediafox\r\nmediapartners\r\nmercator\r\nmerzscope\r\nmicrosoft url control\r\nminirank\r\nmiva\r\nmj12\r\nmnogosearch\r\nmoget\r\nmonster\r\nmoose\r\nmotor\r\nmultitext\r\nmuncher\r\nmuscatferret\r\nmwd.search\r\nmyweb\r\nnajdi\r\nnameprotect\r\nnationaldirectory\r\nnazilla\r\nncsa beta\r\nnec-meshexplorer\r\nnederland.zoek\r\nnetcarta webmap engine\r\nnetmechanic\r\nnetresearchserver\r\nnetscoop\r\nnewscan-online\r\nnhse\r\nnokia6682/\r\nnomad\r\nnoyona\r\nnutch\r\nnzexplorer\r\nobjectssearch\r\noccam\r\nomni\r\nopen text\r\nopenfind\r\nopenintelligencedata\r\norb search\r\nosis-project\r\npack rat\r\npageboy\r\npagebull\r\npage_verifier\r\npanscient\r\nparasite\r\npartnersite\r\npatric\r\npear.\r\npegasus\r\nperegrinator\r\npgp key agent\r\nphantom\r\nphpdig\r\npicosearch\r\npiltdownman\r\npimptrain\r\npinpoint\r\npioneer\r\npiranha\r\nplumtreewebaccessor\r\npogodak\r\npoirot\r\npompos\r\npoppelsdorf\r\npoppi\r\npopular iconoclast\r\npsycheclone\r\npublisher\r\npython\r\nrambler\r\nraven search\r\nroach\r\nroad runner\r\nroadhouse\r\nrobbie\r\nrobofox\r\nrobozilla\r\nrules\r\nsalty\r\nsbider\r\nscooter\r\nscoutjet\r\nscrubby\r\nsearch.\r\nsearchprocess\r\nsemanticdiscovery\r\nsenrigan\r\nsg-scout\r\nshai\'hulud\r\nshark\r\nshopwiki\r\nsidewinder\r\nsift\r\nsilk\r\nsimmany\r\nsite searcher\r\nsite valet\r\nsitetech-rover\r\nskymob.com\r\nsleek\r\nsmartwit\r\nsna-\r\nsnappy\r\nsnooper\r\nsohu\r\nspeedfind\r\nsphere\r\nsphider\r\nspinner\r\nspyder\r\nsteeler/\r\nsuke\r\nsuntek\r\nsupersnooper\r\nsurfnomore\r\nsven\r\nsygol\r\nszukacz\r\ntach black widow\r\ntarantula\r\ntempleton\r\n/teoma\r\nt-h-u-n-d-e-r-s-t-o-n-e\r\ntheophrastus\r\ntitan\r\ntitin\r\ntkwww\r\ntoutatis\r\nt-rex\r\ntutorgig\r\ntwiceler\r\ntwisted\r\nucsd\r\nudmsearch\r\nurl check\r\nupdated\r\nvagabondo\r\nvalkyrie\r\nverticrawl\r\nvictoria\r\nvision-search\r\nvolcano\r\nvoyager/\r\nvoyager-hc\r\nw3c_validator\r\nw3m2\r\nw3mir\r\nwalker\r\nwallpaper\r\nwanderer\r\nwauuu\r\nwavefire\r\nweb core\r\nweb hopper\r\nweb wombat\r\nwebbandit\r\nwebcatcher\r\nwebcopy\r\nwebfoot\r\nweblayers\r\nweblinker\r\nweblog monitor\r\nwebmirror\r\nwebmonkey\r\nwebquest\r\nwebreaper\r\nwebsitepulse\r\nwebsnarf\r\nwebstolperer\r\nwebvac\r\nwebwalk\r\nwebwatch\r\nwebwombat\r\nwebzinger\r\nwhizbang\r\nwhowhere\r\nwild ferret\r\nworldlight\r\nwwwc\r\nwwwster\r\nxenu\r\nxget\r\nxift\r\nxirq\r\nyandex\r\nyanga\r\nyeti\r\nyodao\r\nzao\r\nzippp\r\nzyborg',0),(4,0,'voucher','total_voucher_sort_order','8',0),(5,0,'voucher','total_voucher_status','1',0),(1319,0,'config','config_file_mime_allowed','text/plain\r\nimage/png\r\nimage/jpeg\r\nimage/gif\r\nimage/bmp\r\nimage/tiff\r\nimage/svg+xml\r\napplication/zip\r\n&quot;application/zip&quot;\r\napplication/x-zip\r\n&quot;application/x-zip&quot;\r\napplication/x-zip-compressed\r\n&quot;application/x-zip-compressed&quot;\r\napplication/rar\r\n&quot;application/rar&quot;\r\napplication/x-rar\r\n&quot;application/x-rar&quot;\r\napplication/x-rar-compressed\r\n&quot;application/x-rar-compressed&quot;\r\napplication/octet-stream\r\n&quot;application/octet-stream&quot;\r\naudio/mpeg\r\nvideo/quicktime\r\napplication/pdf',0),(1317,0,'config','config_file_max_size','300000',0),(1318,0,'config','config_file_ext_allowed','zip\r\ntxt\r\npng\r\njpe\r\njpeg\r\njpg\r\ngif\r\nbmp\r\nico\r\ntiff\r\ntif\r\nsvg\r\nsvgz\r\nzip\r\nrar\r\nmsi\r\ncab\r\nmp3\r\nqt\r\nmov\r\npdf\r\npsd\r\nai\r\neps\r\nps\r\ndoc',0),(1316,0,'config','config_encryption','eb66cea4383b0b22ba6f21ddfbd9c7494728f3a2e9c182909b5a71f5c92656b42f5b922db42690fe1bd7bda5c23bf4feaf72546b5ef7b97f0780bdd4709f1f776b75f57b52844999de7a1b98862a18239278f79cfb0a12af1fffa27fee1964e38dbfbaee694446a3bfe4a2fb24f025e6868cfd5bf9268640d2fdf1956da1427c76fdd21af87d2329d4e6260599865c4d055ba3c78d54d91d1664e5896a723fd3fc04bb3d01f6dfc405f1a96ffb4b669c926f0d757524ecdba96f098fc300e079c4cbd76760607e4a66aebc71ed2a19fa79c613d37dc991c6fe7d71a4311cbb4d5959875f77eeb01e4ce43454e06a12bfa6e1a1bd37f8fdc04ec423d816349e0b91a54fc45282ddca94a673c52d6109a1390ff1b5f7fe96585a2cb852a071fb63e00644a5925fd2df21d2788981a30080ad4b333596f9aab3e1b6b76cdd7939da39a3ba0afd60c21d82d04ff6d0d2ce4d940315cd65f77778bf62047c723690ff1667d0b3ae288b3e424999e81b0a4dc9d824f84a3817909545c71033229bbd7f1db259a72fd0afcf62285e77c53a81a32decc3c155c17dd1f6ecaa90dd1ab4f72975dfc857f4403d393589575844b86d7ba4fc55a63765d5ef5ff390835408be6bdc2182916b0beea73d30b4e2981acf47156373281a7467bea7fa5e514e3f471b9702739cb35a4e5ced9910961e569ce3e2f698fbae8c4638eb57dccfda3cfd',0),(1315,0,'config','config_shared','0',0),(1312,0,'config','config_compression','0',0),(1313,0,'config','config_secure','0',0),(1314,0,'config','config_password','1',0),(1308,0,'config','config_mail_alert_email','',0),(1307,0,'config','config_mail_alert','[\"order\"]',1),(1306,0,'config','config_mail_smtp_timeout','5',0),(1305,0,'config','config_mail_smtp_port','25',0),(1304,0,'config','config_mail_smtp_password','',0),(1303,0,'config','config_mail_smtp_username','',0),(1302,0,'config','config_mail_smtp_hostname','',0),(1300,0,'config','config_mail_engine','mail',0),(1301,0,'config','config_mail_parameter','',0),(1299,0,'config','config_icon','catalog/cart.png',0),(1298,0,'config','config_logo','catalog/logo.png',0),(1295,0,'config','config_return_status_id','2',0),(1296,0,'config','config_captcha','',0),(95,0,'payment_free_checkout','payment_free_checkout_status','1',0),(96,0,'payment_free_checkout','payment_free_checkout_order_status_id','1',0),(97,0,'payment_free_checkout','payment_free_checkout_sort_order','1',0),(98,0,'payment_cod','payment_cod_sort_order','5',0),(99,0,'payment_cod','payment_cod_total','0.01',0),(100,0,'payment_cod','payment_cod_order_status_id','1',0),(101,0,'payment_cod','payment_cod_geo_zone_id','0',0),(102,0,'payment_cod','payment_cod_status','1',0),(103,0,'shipping_flat','shipping_flat_sort_order','1',0),(104,0,'shipping_flat','shipping_flat_status','1',0),(105,0,'shipping_flat','shipping_flat_geo_zone_id','0',0),(106,0,'shipping_flat','shipping_flat_tax_class_id','9',0),(107,0,'shipping_flat','shipping_flat_cost','5.00',0),(108,0,'total_shipping','total_shipping_sort_order','3',0),(109,0,'total_sub_total','total_sub_total_sort_order','1',0),(110,0,'total_sub_total','total_sub_total_status','1',0),(111,0,'total_tax','total_tax_status','1',0),(112,0,'total_total','total_total_sort_order','9',0),(113,0,'total_total','total_total_status','1',0),(114,0,'total_tax','total_tax_sort_order','5',0),(115,0,'total_credit','total_credit_sort_order','7',0),(116,0,'total_credit','total_credit_status','1',0),(117,0,'total_reward','total_reward_sort_order','2',0),(118,0,'total_reward','total_reward_status','1',0),(119,0,'total_shipping','total_shipping_status','1',0),(120,0,'total_shipping','total_shipping_estimator','1',0),(121,0,'total_coupon','total_coupon_sort_order','4',0),(122,0,'total_coupon','total_coupon_status','1',0),(123,0,'module_category','module_category_status','1',0),(124,0,'module_account','module_account_status','1',0),(1346,0,'theme_default','theme_default_image_location_height','50',0),(1345,0,'theme_default','theme_default_image_location_width','268',0),(1343,0,'theme_default','theme_default_image_cart_width','47',0),(1344,0,'theme_default','theme_default_image_cart_height','47',0),(1342,0,'theme_default','theme_default_image_wishlist_height','47',0),(1341,0,'theme_default','theme_default_image_wishlist_width','47',0),(1340,0,'theme_default','theme_default_image_compare_height','90',0),(1339,0,'theme_default','theme_default_image_compare_width','90',0),(1338,0,'theme_default','theme_default_image_related_height','200',0),(1337,0,'theme_default','theme_default_image_related_width','200',0),(1336,0,'theme_default','theme_default_image_additional_height','74',0),(1335,0,'theme_default','theme_default_image_additional_width','74',0),(1332,0,'theme_default','theme_default_image_popup_height','500',0),(1334,0,'theme_default','theme_default_image_product_height','228',0),(1333,0,'theme_default','theme_default_image_product_width','228',0),(1331,0,'theme_default','theme_default_image_popup_width','500',0),(149,0,'dashboard_activity','dashboard_activity_status','1',0),(150,0,'dashboard_activity','dashboard_activity_sort_order','7',0),(151,0,'dashboard_sale','dashboard_sale_status','1',0),(152,0,'dashboard_sale','dashboard_sale_width','3',0),(153,0,'dashboard_chart','dashboard_chart_status','1',0),(154,0,'dashboard_chart','dashboard_chart_width','6',0),(155,0,'dashboard_customer','dashboard_customer_status','1',0),(156,0,'dashboard_customer','dashboard_customer_width','3',0),(157,0,'dashboard_map','dashboard_map_status','1',0),(158,0,'dashboard_map','dashboard_map_width','6',0),(159,0,'dashboard_online','dashboard_online_status','1',0),(160,0,'dashboard_online','dashboard_online_width','3',0),(161,0,'dashboard_order','dashboard_order_sort_order','1',0),(162,0,'dashboard_order','dashboard_order_status','1',0),(163,0,'dashboard_order','dashboard_order_width','3',0),(164,0,'dashboard_sale','dashboard_sale_sort_order','2',0),(165,0,'dashboard_customer','dashboard_customer_sort_order','3',0),(166,0,'dashboard_online','dashboard_online_sort_order','4',0),(167,0,'dashboard_map','dashboard_map_sort_order','5',0),(168,0,'dashboard_chart','dashboard_chart_sort_order','6',0),(169,0,'dashboard_recent','dashboard_recent_status','1',0),(170,0,'dashboard_recent','dashboard_recent_sort_order','8',0),(171,0,'dashboard_activity','dashboard_activity_width','4',0),(172,0,'dashboard_recent','dashboard_recent_width','8',0),(173,0,'report_customer_activity','report_customer_activity_status','1',0),(174,0,'report_customer_activity','report_customer_activity_sort_order','1',0),(175,0,'report_customer_order','report_customer_order_status','1',0),(176,0,'report_customer_order','report_customer_order_sort_order','2',0),(177,0,'report_customer_reward','report_customer_reward_status','1',0),(178,0,'report_customer_reward','report_customer_reward_sort_order','3',0),(179,0,'report_customer_search','report_customer_search_sort_order','3',0),(180,0,'report_customer_search','report_customer_search_status','1',0),(181,0,'report_customer_transaction','report_customer_transaction_status','1',0),(182,0,'report_customer_transaction','report_customer_transaction_status_sort_order','4',0),(183,0,'report_sale_tax','report_sale_tax_status','1',0),(184,0,'report_sale_tax','report_sale_tax_sort_order','5',0),(185,0,'report_sale_shipping','report_sale_shipping_status','1',0),(186,0,'report_sale_shipping','report_sale_shipping_sort_order','6',0),(187,0,'report_sale_return','report_sale_return_status','1',0),(188,0,'report_sale_return','report_sale_return_sort_order','7',0),(189,0,'report_sale_order','report_sale_order_status','1',0),(190,0,'report_sale_order','report_sale_order_sort_order','8',0),(191,0,'report_sale_coupon','report_sale_coupon_status','1',0),(192,0,'report_sale_coupon','report_sale_coupon_sort_order','9',0),(193,0,'report_product_viewed','report_product_viewed_status','1',0),(194,0,'report_product_viewed','report_product_viewed_sort_order','10',0),(195,0,'report_product_purchased','report_product_purchased_status','1',0),(196,0,'report_product_purchased','report_product_purchased_sort_order','11',0),(197,0,'report_marketing','report_marketing_status','1',0),(198,0,'report_marketing','report_marketing_sort_order','12',0),(649,0,'developer','developer_sass','0',0),(1297,0,'config','config_captcha_page','[\"review\",\"return\",\"contact\"]',1),(1294,0,'config','config_return_id','0',0),(1293,0,'config','config_affiliate_id','4',0),(1292,0,'config','config_affiliate_commission','5',0),(1291,0,'config','config_affiliate_auto','0',0),(1290,0,'config','config_affiliate_approval','0',0),(1289,0,'config','config_affiliate_group_id','1',0),(1288,0,'config','config_stock_checkout','0',0),(1287,0,'config','config_stock_warning','0',0),(1285,0,'config','config_api_id','1',0),(1286,0,'config','config_stock_display','0',0),(1284,0,'config','config_fraud_status_id','7',0),(1283,0,'config','config_complete_status','[\"5\",\"3\"]',1),(1282,0,'config','config_processing_status','[\"5\",\"1\",\"2\",\"12\",\"3\"]',1),(1281,0,'config','config_order_status_id','1',0),(1280,0,'config','config_checkout_id','5',0),(1279,0,'config','config_checkout_guest','1',0),(1278,0,'config','config_cart_weight','1',0),(648,0,'developer','developer_theme','0',0),(1330,0,'theme_default','theme_default_image_thumb_height','228',0),(1328,0,'theme_default','theme_default_image_category_height','80',0),(1329,0,'theme_default','theme_default_image_thumb_width','228',0),(1277,0,'config','config_invoice_prefix','INV-2017-00',0),(1275,0,'config','config_login_attempts','5',0),(1276,0,'config','config_account_id','3',0),(1274,0,'config','config_customer_price','0',0),(1273,0,'config','config_customer_group_display','[\"1\"]',1),(1272,0,'config','config_customer_group_id','1',0),(1271,0,'config','config_customer_search','0',0),(1270,0,'config','config_customer_activity','0',0),(1269,0,'config','config_customer_online','0',0),(1268,0,'config','config_tax_customer','shipping',0),(1262,0,'config','config_review_status','1',0),(1263,0,'config','config_review_guest','1',0),(1264,0,'config','config_voucher_min','1',0),(1265,0,'config','config_voucher_max','1000',0),(1266,0,'config','config_tax','1',0),(1267,0,'config','config_tax_default','shipping',0),(1261,0,'config','config_limit_admin','200',0),(1260,0,'config','config_product_count','0',0),(1259,0,'config','config_weight_class_id','1',0),(1258,0,'config','config_length_class_id','1',0),(1257,0,'config','config_currency_auto','1',0),(1256,0,'config','config_currency','RUR',0),(1327,0,'theme_default','theme_default_image_category_width','80',0),(1326,0,'theme_default','theme_default_product_description_length','100',0),(1325,0,'theme_default','theme_default_product_limit','15',0),(1324,0,'theme_default','theme_default_status','1',0),(1323,0,'theme_default','theme_default_directory','default',0),(1255,0,'config','config_admin_language','en-gb',0),(1254,0,'config','config_language','ru-ru',0),(1253,0,'config','config_zone_id','2785',0),(1252,0,'config','config_country_id','176',0),(1251,0,'config','config_comment','',0),(1250,0,'config','config_open','',0),(1249,0,'config','config_image','catalog/logo.png',0),(1248,0,'config','config_fax','',0),(1246,0,'config','config_email','scanner85@gmail.com',0),(1247,0,'config','config_telephone','123456789',0),(1245,0,'config','config_geocode','',0),(1244,0,'config','config_address','195279, Санкт-Петербург, Индустриальный пр-т 43 лит &quot;К&quot;',0),(1243,0,'config','config_owner','SpecSyntez',0),(1239,0,'config','config_meta_keyword','Spec Syntex site',0),(1240,0,'config','config_theme','default',0),(1241,0,'config','config_layout_id','4',0),(1242,0,'config','config_name','SpecSyntez',0),(1238,0,'config','config_meta_description','SpecSyntez site',0),(1237,0,'config','config_meta_title','SpecSyntez',0),(1322,0,'config','config_error_filename','error.log',0);
/*!40000 ALTER TABLE `oc_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_shipping_courier`
--

DROP TABLE IF EXISTS `oc_shipping_courier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_shipping_courier` (
  `shipping_courier_id` int(11) NOT NULL,
  `shipping_courier_code` varchar(255) NOT NULL DEFAULT '',
  `shipping_courier_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`shipping_courier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_shipping_courier`
--

LOCK TABLES `oc_shipping_courier` WRITE;
/*!40000 ALTER TABLE `oc_shipping_courier` DISABLE KEYS */;
INSERT INTO `oc_shipping_courier` VALUES (1,'dhl','DHL'),(2,'fedex','Fedex'),(3,'ups','UPS'),(4,'royal-mail','Royal Mail'),(5,'usps','United States Postal Service'),(6,'auspost','Australia Post'),(7,'citylink','Citylink');
/*!40000 ALTER TABLE `oc_shipping_courier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_statistics`
--

DROP TABLE IF EXISTS `oc_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_statistics` (
  `statistics_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `value` decimal(15,4) NOT NULL,
  PRIMARY KEY (`statistics_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_statistics`
--

LOCK TABLES `oc_statistics` WRITE;
/*!40000 ALTER TABLE `oc_statistics` DISABLE KEYS */;
INSERT INTO `oc_statistics` VALUES (1,'order_sale',1005015.0000),(2,'order_processing',0.0000),(3,'order_complete',0.0000),(4,'order_other',0.0000),(5,'returns',0.0000),(6,'product',0.0000),(7,'review',0.0000);
/*!40000 ALTER TABLE `oc_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_stock_status`
--

DROP TABLE IF EXISTS `oc_stock_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_stock_status` (
  `stock_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`stock_status_id`,`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_stock_status`
--

LOCK TABLES `oc_stock_status` WRITE;
/*!40000 ALTER TABLE `oc_stock_status` DISABLE KEYS */;
INSERT INTO `oc_stock_status` VALUES (7,1,'In Stock'),(8,1,'Pre-Order'),(5,1,'Out Of Stock'),(6,1,'2-3 Days'),(7,2,'In Stock'),(8,2,'Pre-Order'),(5,2,'Out Of Stock'),(6,2,'2-3 Days'),(7,3,'In Stock'),(8,3,'Pre-Order'),(5,3,'Out Of Stock'),(6,3,'2-3 Days'),(7,4,'In Stock'),(8,4,'Pre-Order'),(5,4,'Out Of Stock'),(6,4,'2-3 Days');
/*!40000 ALTER TABLE `oc_stock_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_store`
--

DROP TABLE IF EXISTS `oc_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ssl` varchar(255) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_store`
--

LOCK TABLES `oc_store` WRITE;
/*!40000 ALTER TABLE `oc_store` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_tax_class`
--

DROP TABLE IF EXISTS `oc_tax_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_tax_class` (
  `tax_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tax_class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_tax_class`
--

LOCK TABLES `oc_tax_class` WRITE;
/*!40000 ALTER TABLE `oc_tax_class` DISABLE KEYS */;
INSERT INTO `oc_tax_class` VALUES (9,'Taxable Goods','Taxed goods','2009-01-06 20:21:53','2011-09-23 10:07:50'),(10,'Downloadable Products','Downloadable','2011-09-21 18:19:39','2011-09-22 06:27:36');
/*!40000 ALTER TABLE `oc_tax_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_tax_rate`
--

DROP TABLE IF EXISTS `oc_tax_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_tax_rate` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `geo_zone_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL,
  `rate` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `type` char(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tax_rate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_tax_rate`
--

LOCK TABLES `oc_tax_rate` WRITE;
/*!40000 ALTER TABLE `oc_tax_rate` DISABLE KEYS */;
INSERT INTO `oc_tax_rate` VALUES (86,3,'VAT (20%)',20.0000,'P','2011-03-09 18:17:10','2011-09-22 18:24:29'),(87,3,'Eco Tax (-2.00)',2.0000,'F','2011-09-21 17:49:23','2011-09-22 20:40:19');
/*!40000 ALTER TABLE `oc_tax_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_tax_rate_to_customer_group`
--

DROP TABLE IF EXISTS `oc_tax_rate_to_customer_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_tax_rate_to_customer_group` (
  `tax_rate_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  PRIMARY KEY (`tax_rate_id`,`customer_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_tax_rate_to_customer_group`
--

LOCK TABLES `oc_tax_rate_to_customer_group` WRITE;
/*!40000 ALTER TABLE `oc_tax_rate_to_customer_group` DISABLE KEYS */;
INSERT INTO `oc_tax_rate_to_customer_group` VALUES (86,1),(87,1);
/*!40000 ALTER TABLE `oc_tax_rate_to_customer_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_tax_rule`
--

DROP TABLE IF EXISTS `oc_tax_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_tax_rule` (
  `tax_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_class_id` int(11) NOT NULL,
  `tax_rate_id` int(11) NOT NULL,
  `based` varchar(10) NOT NULL,
  `priority` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tax_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_tax_rule`
--

LOCK TABLES `oc_tax_rule` WRITE;
/*!40000 ALTER TABLE `oc_tax_rule` DISABLE KEYS */;
INSERT INTO `oc_tax_rule` VALUES (121,10,86,'payment',1),(120,10,87,'store',0),(128,9,86,'shipping',1),(127,9,87,'shipping',2);
/*!40000 ALTER TABLE `oc_tax_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_theme`
--

DROP TABLE IF EXISTS `oc_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_theme` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `theme` varchar(64) NOT NULL,
  `route` varchar(64) NOT NULL,
  `code` mediumtext NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`theme_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_theme`
--

LOCK TABLES `oc_theme` WRITE;
/*!40000 ALTER TABLE `oc_theme` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_translation`
--

DROP TABLE IF EXISTS `oc_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_translation` (
  `translation_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `route` varchar(64) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`translation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_translation`
--

LOCK TABLES `oc_translation` WRITE;
/*!40000 ALTER TABLE `oc_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_upload`
--

DROP TABLE IF EXISTS `oc_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_upload`
--

LOCK TABLES `oc_upload` WRITE;
/*!40000 ALTER TABLE `oc_upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_user`
--

DROP TABLE IF EXISTS `oc_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(40) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_user`
--

LOCK TABLES `oc_user` WRITE;
/*!40000 ALTER TABLE `oc_user` DISABLE KEYS */;
INSERT INTO `oc_user` VALUES (1,1,'scanner85','$2y$10$.NynjjTek2W/kuPX18YYy.1UDhcsH9u1nI0PvTG0OOmlzR2j1VRn.','','Serg','Ryabinin','scanner85@gmail.com','catalog/demo/gift-voucher-birthday.jpg','','127.0.0.1',1,'2017-09-22 19:47:19');
/*!40000 ALTER TABLE `oc_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_user_group`
--

DROP TABLE IF EXISTS `oc_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_user_group` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_user_group`
--

LOCK TABLES `oc_user_group` WRITE;
/*!40000 ALTER TABLE `oc_user_group` DISABLE KEYS */;
INSERT INTO `oc_user_group` VALUES (1,'Administrator','{\"access\":[\"catalog\\/attribute\",\"catalog\\/attribute_group\",\"catalog\\/category\",\"catalog\\/download\",\"catalog\\/filter\",\"catalog\\/information\",\"catalog\\/manufacturer\",\"catalog\\/option\",\"catalog\\/product\",\"catalog\\/recurring\",\"catalog\\/review\",\"common\\/column_left\",\"common\\/developer\",\"common\\/filemanager\",\"common\\/profile\",\"common\\/security\",\"customer\\/custom_field\",\"customer\\/customer\",\"customer\\/customer_approval\",\"customer\\/customer_group\",\"design\\/banner\",\"design\\/layout\",\"design\\/theme\",\"design\\/translation\",\"design\\/seo_url\",\"event\\/statistics\",\"event\\/theme\",\"extension\\/analytics\\/google\",\"extension\\/captcha\\/basic\",\"extension\\/captcha\\/google\",\"extension\\/dashboard\\/activity\",\"extension\\/dashboard\\/chart\",\"extension\\/dashboard\\/customer\",\"extension\\/dashboard\\/map\",\"extension\\/dashboard\\/online\",\"extension\\/dashboard\\/order\",\"extension\\/dashboard\\/recent\",\"extension\\/dashboard\\/sale\",\"extension\\/extension\\/analytics\",\"extension\\/extension\\/captcha\",\"extension\\/extension\\/dashboard\",\"extension\\/extension\\/feed\",\"extension\\/extension\\/fraud\",\"extension\\/extension\\/menu\",\"extension\\/extension\\/module\",\"extension\\/extension\\/payment\",\"extension\\/extension\\/report\",\"extension\\/extension\\/shipping\",\"extension\\/extension\\/theme\",\"extension\\/extension\\/total\",\"extension\\/feed\\/google_base\",\"extension\\/feed\\/google_sitemap\",\"extension\\/feed\\/openbaypro\",\"extension\\/fraud\\/fraudlabspro\",\"extension\\/fraud\\/ip\",\"extension\\/fraud\\/maxmind\",\"extension\\/marketing\\/remarketing\",\"extension\\/module\\/account\",\"extension\\/module\\/amazon_login\",\"extension\\/module\\/amazon_pay\",\"extension\\/module\\/banner\",\"extension\\/module\\/bestseller\",\"extension\\/module\\/carousel\",\"extension\\/module\\/category\",\"extension\\/module\\/divido_calculator\",\"extension\\/module\\/ebay_listing\",\"extension\\/module\\/featured\",\"extension\\/module\\/filter\",\"extension\\/module\\/google_hangouts\",\"extension\\/module\\/html\",\"extension\\/module\\/information\",\"extension\\/module\\/klarna_checkout_module\",\"extension\\/module\\/latest\",\"extension\\/module\\/laybuy_layout\",\"extension\\/module\\/pilibaba_button\",\"extension\\/module\\/pp_button\",\"extension\\/module\\/pp_login\",\"extension\\/module\\/sagepay_direct_cards\",\"extension\\/module\\/sagepay_server_cards\",\"extension\\/module\\/slideshow\",\"extension\\/module\\/special\",\"extension\\/module\\/store\",\"extension\\/openbay\\/amazon\",\"extension\\/openbay\\/amazon_listing\",\"extension\\/openbay\\/amazon_product\",\"extension\\/openbay\\/amazonus\",\"extension\\/openbay\\/amazonus_listing\",\"extension\\/openbay\\/amazonus_product\",\"extension\\/openbay\\/ebay\",\"extension\\/openbay\\/ebay_profile\",\"extension\\/openbay\\/ebay_template\",\"extension\\/openbay\\/etsy\",\"extension\\/openbay\\/etsy_product\",\"extension\\/openbay\\/etsy_shipping\",\"extension\\/openbay\\/etsy_shop\",\"extension\\/openbay\\/fba\",\"extension\\/payment\\/amazon_login_pay\",\"extension\\/payment\\/authorizenet_aim\",\"extension\\/payment\\/authorizenet_sim\",\"extension\\/payment\\/bank_transfer\",\"extension\\/payment\\/bluepay_hosted\",\"extension\\/payment\\/bluepay_redirect\",\"extension\\/payment\\/cardconnect\",\"extension\\/payment\\/cardinity\",\"extension\\/payment\\/cheque\",\"extension\\/payment\\/cod\",\"extension\\/payment\\/divido\",\"extension\\/payment\\/eway\",\"extension\\/payment\\/firstdata\",\"extension\\/payment\\/firstdata_remote\",\"extension\\/payment\\/free_checkout\",\"extension\\/payment\\/g2apay\",\"extension\\/payment\\/globalpay\",\"extension\\/payment\\/globalpay_remote\",\"extension\\/payment\\/klarna_account\",\"extension\\/payment\\/klarna_checkout\",\"extension\\/payment\\/klarna_invoice\",\"extension\\/payment\\/laybuy\",\"extension\\/payment\\/liqpay\",\"extension\\/payment\\/nochex\",\"extension\\/payment\\/paymate\",\"extension\\/payment\\/paypoint\",\"extension\\/payment\\/payza\",\"extension\\/payment\\/perpetual_payments\",\"extension\\/payment\\/pilibaba\",\"extension\\/payment\\/pp_express\",\"extension\\/payment\\/pp_payflow\",\"extension\\/payment\\/pp_payflow_iframe\",\"extension\\/payment\\/pp_pro\",\"extension\\/payment\\/pp_pro_iframe\",\"extension\\/payment\\/pp_standard\",\"extension\\/payment\\/realex\",\"extension\\/payment\\/realex_remote\",\"extension\\/payment\\/sagepay_direct\",\"extension\\/payment\\/sagepay_server\",\"extension\\/payment\\/sagepay_us\",\"extension\\/payment\\/securetrading_pp\",\"extension\\/payment\\/securetrading_ws\",\"extension\\/payment\\/skrill\",\"extension\\/payment\\/twocheckout\",\"extension\\/payment\\/web_payment_software\",\"extension\\/payment\\/worldpay\",\"extension\\/module\\/pp_braintree_button\",\"extension\\/payment\\/pp_braintree\",\"extension\\/report\\/customer_activity\",\"extension\\/report\\/customer_order\",\"extension\\/report\\/customer_reward\",\"extension\\/report\\/customer_search\",\"extension\\/report\\/customer_transaction\",\"extension\\/report\\/marketing\",\"extension\\/report\\/product_purchased\",\"extension\\/report\\/product_viewed\",\"extension\\/report\\/sale_coupon\",\"extension\\/report\\/sale_order\",\"extension\\/report\\/sale_return\",\"extension\\/report\\/sale_shipping\",\"extension\\/report\\/sale_tax\",\"extension\\/shipping\\/auspost\",\"extension\\/shipping\\/citylink\",\"extension\\/shipping\\/ec_ship\",\"extension\\/shipping\\/fedex\",\"extension\\/shipping\\/flat\",\"extension\\/shipping\\/free\",\"extension\\/shipping\\/item\",\"extension\\/shipping\\/parcelforce_48\",\"extension\\/shipping\\/pickup\",\"extension\\/shipping\\/royal_mail\",\"extension\\/shipping\\/ups\",\"extension\\/shipping\\/usps\",\"extension\\/shipping\\/weight\",\"extension\\/theme\\/default\",\"extension\\/total\\/coupon\",\"extension\\/total\\/credit\",\"extension\\/total\\/handling\",\"extension\\/total\\/klarna_fee\",\"extension\\/total\\/low_order_fee\",\"extension\\/total\\/reward\",\"extension\\/total\\/shipping\",\"extension\\/total\\/sub_total\",\"extension\\/total\\/tax\",\"extension\\/total\\/total\",\"extension\\/total\\/voucher\",\"localisation\\/country\",\"localisation\\/currency\",\"localisation\\/geo_zone\",\"localisation\\/language\",\"localisation\\/length_class\",\"localisation\\/location\",\"localisation\\/order_status\",\"localisation\\/return_action\",\"localisation\\/return_reason\",\"localisation\\/return_status\",\"localisation\\/stock_status\",\"localisation\\/tax_class\",\"localisation\\/tax_rate\",\"localisation\\/weight_class\",\"localisation\\/zone\",\"mail\\/affiliate\",\"mail\\/customer\",\"mail\\/forgotten\",\"mail\\/return\",\"mail\\/reward\",\"mail\\/transaction\",\"marketing\\/contact\",\"marketing\\/coupon\",\"marketing\\/marketing\",\"marketplace\\/api\",\"marketplace\\/event\",\"marketplace\\/cron\",\"marketplace\\/extension\",\"marketplace\\/install\",\"marketplace\\/installer\",\"marketplace\\/marketplace\",\"marketplace\\/modification\",\"marketplace\\/openbay\",\"report\\/online\",\"report\\/report\",\"report\\/statistics\",\"sale\\/order\",\"sale\\/recurring\",\"sale\\/return\",\"sale\\/voucher\",\"sale\\/voucher_theme\",\"setting\\/setting\",\"setting\\/store\",\"startup\\/error\",\"startup\\/event\",\"startup\\/login\",\"startup\\/permission\",\"startup\\/router\",\"startup\\/sass\",\"startup\\/startup\",\"tool\\/backup\",\"tool\\/log\",\"tool\\/upload\",\"user\\/api\",\"user\\/user\",\"user\\/user_permission\",\"extension\\/theme\\/theme2\",\"extension\\/module\\/bestseller\",\"extension\\/module\\/newslatest\"],\"modify\":[\"catalog\\/attribute\",\"catalog\\/attribute_group\",\"catalog\\/category\",\"catalog\\/download\",\"catalog\\/filter\",\"catalog\\/information\",\"catalog\\/manufacturer\",\"catalog\\/option\",\"catalog\\/product\",\"catalog\\/recurring\",\"catalog\\/review\",\"common\\/column_left\",\"common\\/developer\",\"common\\/filemanager\",\"common\\/profile\",\"common\\/security\",\"customer\\/custom_field\",\"customer\\/customer\",\"customer\\/customer_approval\",\"customer\\/customer_group\",\"design\\/banner\",\"design\\/layout\",\"design\\/theme\",\"design\\/translation\",\"design\\/seo_url\",\"event\\/statistics\",\"event\\/theme\",\"extension\\/analytics\\/google\",\"extension\\/captcha\\/basic\",\"extension\\/captcha\\/google\",\"extension\\/dashboard\\/activity\",\"extension\\/dashboard\\/chart\",\"extension\\/dashboard\\/customer\",\"extension\\/dashboard\\/map\",\"extension\\/dashboard\\/online\",\"extension\\/dashboard\\/order\",\"extension\\/dashboard\\/recent\",\"extension\\/dashboard\\/sale\",\"extension\\/extension\\/analytics\",\"extension\\/extension\\/captcha\",\"extension\\/extension\\/dashboard\",\"extension\\/extension\\/feed\",\"extension\\/extension\\/fraud\",\"extension\\/extension\\/menu\",\"extension\\/extension\\/module\",\"extension\\/extension\\/payment\",\"extension\\/extension\\/report\",\"extension\\/extension\\/shipping\",\"extension\\/extension\\/theme\",\"extension\\/extension\\/total\",\"extension\\/feed\\/google_base\",\"extension\\/feed\\/google_sitemap\",\"extension\\/feed\\/openbaypro\",\"extension\\/fraud\\/fraudlabspro\",\"extension\\/fraud\\/ip\",\"extension\\/fraud\\/maxmind\",\"extension\\/marketing\\/remarketing\",\"extension\\/module\\/account\",\"extension\\/module\\/amazon_login\",\"extension\\/module\\/amazon_pay\",\"extension\\/module\\/banner\",\"extension\\/module\\/bestseller\",\"extension\\/module\\/carousel\",\"extension\\/module\\/category\",\"extension\\/module\\/divido_calculator\",\"extension\\/module\\/ebay_listing\",\"extension\\/module\\/featured\",\"extension\\/module\\/filter\",\"extension\\/module\\/google_hangouts\",\"extension\\/module\\/html\",\"extension\\/module\\/information\",\"extension\\/module\\/klarna_checkout_module\",\"extension\\/module\\/latest\",\"extension\\/module\\/laybuy_layout\",\"extension\\/module\\/pilibaba_button\",\"extension\\/module\\/pp_button\",\"extension\\/module\\/pp_login\",\"extension\\/module\\/sagepay_direct_cards\",\"extension\\/module\\/sagepay_server_cards\",\"extension\\/module\\/slideshow\",\"extension\\/module\\/special\",\"extension\\/module\\/store\",\"extension\\/openbay\\/amazon\",\"extension\\/openbay\\/amazon_listing\",\"extension\\/openbay\\/amazon_product\",\"extension\\/openbay\\/amazonus\",\"extension\\/openbay\\/amazonus_listing\",\"extension\\/openbay\\/amazonus_product\",\"extension\\/openbay\\/ebay\",\"extension\\/openbay\\/ebay_profile\",\"extension\\/openbay\\/ebay_template\",\"extension\\/openbay\\/etsy\",\"extension\\/openbay\\/etsy_product\",\"extension\\/openbay\\/etsy_shipping\",\"extension\\/openbay\\/etsy_shop\",\"extension\\/openbay\\/fba\",\"extension\\/payment\\/amazon_login_pay\",\"extension\\/payment\\/authorizenet_aim\",\"extension\\/payment\\/authorizenet_sim\",\"extension\\/payment\\/bank_transfer\",\"extension\\/payment\\/bluepay_hosted\",\"extension\\/payment\\/bluepay_redirect\",\"extension\\/payment\\/cardconnect\",\"extension\\/payment\\/cardinity\",\"extension\\/payment\\/cheque\",\"extension\\/payment\\/cod\",\"extension\\/payment\\/divido\",\"extension\\/payment\\/eway\",\"extension\\/payment\\/firstdata\",\"extension\\/payment\\/firstdata_remote\",\"extension\\/payment\\/free_checkout\",\"extension\\/payment\\/g2apay\",\"extension\\/payment\\/globalpay\",\"extension\\/payment\\/globalpay_remote\",\"extension\\/payment\\/klarna_account\",\"extension\\/payment\\/klarna_checkout\",\"extension\\/payment\\/klarna_invoice\",\"extension\\/payment\\/laybuy\",\"extension\\/payment\\/liqpay\",\"extension\\/payment\\/nochex\",\"extension\\/payment\\/paymate\",\"extension\\/payment\\/paypoint\",\"extension\\/payment\\/payza\",\"extension\\/payment\\/perpetual_payments\",\"extension\\/payment\\/pilibaba\",\"extension\\/payment\\/pp_express\",\"extension\\/payment\\/pp_payflow\",\"extension\\/payment\\/pp_payflow_iframe\",\"extension\\/payment\\/pp_pro\",\"extension\\/payment\\/pp_pro_iframe\",\"extension\\/payment\\/pp_standard\",\"extension\\/payment\\/realex\",\"extension\\/payment\\/realex_remote\",\"extension\\/payment\\/sagepay_direct\",\"extension\\/payment\\/sagepay_server\",\"extension\\/payment\\/sagepay_us\",\"extension\\/payment\\/securetrading_pp\",\"extension\\/payment\\/securetrading_ws\",\"extension\\/payment\\/skrill\",\"extension\\/payment\\/twocheckout\",\"extension\\/payment\\/web_payment_software\",\"extension\\/payment\\/worldpay\",\"extension\\/module\\/pp_braintree_button\",\"extension\\/payment\\/pp_braintree\",\"extension\\/report\\/customer_activity\",\"extension\\/report\\/customer_order\",\"extension\\/report\\/customer_reward\",\"extension\\/report\\/customer_search\",\"extension\\/report\\/customer_transaction\",\"extension\\/report\\/marketing\",\"extension\\/report\\/product_purchased\",\"extension\\/report\\/product_viewed\",\"extension\\/report\\/sale_coupon\",\"extension\\/report\\/sale_order\",\"extension\\/report\\/sale_return\",\"extension\\/report\\/sale_shipping\",\"extension\\/report\\/sale_tax\",\"extension\\/shipping\\/auspost\",\"extension\\/shipping\\/citylink\",\"extension\\/shipping\\/ec_ship\",\"extension\\/shipping\\/fedex\",\"extension\\/shipping\\/flat\",\"extension\\/shipping\\/free\",\"extension\\/shipping\\/item\",\"extension\\/shipping\\/parcelforce_48\",\"extension\\/shipping\\/pickup\",\"extension\\/shipping\\/royal_mail\",\"extension\\/shipping\\/ups\",\"extension\\/shipping\\/usps\",\"extension\\/shipping\\/weight\",\"extension\\/theme\\/default\",\"extension\\/total\\/coupon\",\"extension\\/total\\/credit\",\"extension\\/total\\/handling\",\"extension\\/total\\/klarna_fee\",\"extension\\/total\\/low_order_fee\",\"extension\\/total\\/reward\",\"extension\\/total\\/shipping\",\"extension\\/total\\/sub_total\",\"extension\\/total\\/tax\",\"extension\\/total\\/total\",\"extension\\/total\\/voucher\",\"localisation\\/country\",\"localisation\\/currency\",\"localisation\\/geo_zone\",\"localisation\\/language\",\"localisation\\/length_class\",\"localisation\\/location\",\"localisation\\/order_status\",\"localisation\\/return_action\",\"localisation\\/return_reason\",\"localisation\\/return_status\",\"localisation\\/stock_status\",\"localisation\\/tax_class\",\"localisation\\/tax_rate\",\"localisation\\/weight_class\",\"localisation\\/zone\",\"mail\\/affiliate\",\"mail\\/customer\",\"mail\\/forgotten\",\"mail\\/return\",\"mail\\/reward\",\"mail\\/transaction\",\"marketing\\/contact\",\"marketing\\/coupon\",\"marketing\\/marketing\",\"marketplace\\/event\",\"marketplace\\/cron\",\"marketplace\\/api\",\"marketplace\\/extension\",\"marketplace\\/install\",\"marketplace\\/installer\",\"marketplace\\/marketplace\",\"marketplace\\/modification\",\"marketplace\\/openbay\",\"report\\/online\",\"report\\/report\",\"report\\/statistics\",\"sale\\/order\",\"sale\\/recurring\",\"sale\\/return\",\"sale\\/voucher\",\"sale\\/voucher_theme\",\"setting\\/setting\",\"setting\\/store\",\"startup\\/error\",\"startup\\/event\",\"startup\\/login\",\"startup\\/permission\",\"startup\\/router\",\"startup\\/sass\",\"startup\\/startup\",\"tool\\/backup\",\"tool\\/log\",\"tool\\/upload\",\"user\\/api\",\"user\\/user\",\"user\\/user_permission\",\"extension\\/theme\\/theme2\",\"extension\\/module\\/bestseller\",\"extension\\/module\\/newslatest\"]}'),(10,'Demonstration','');
/*!40000 ALTER TABLE `oc_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_voucher`
--

DROP TABLE IF EXISTS `oc_voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_voucher` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `from_name` varchar(64) NOT NULL,
  `from_email` varchar(96) NOT NULL,
  `to_name` varchar(64) NOT NULL,
  `to_email` varchar(96) NOT NULL,
  `voucher_theme_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`voucher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_voucher`
--

LOCK TABLES `oc_voucher` WRITE;
/*!40000 ALTER TABLE `oc_voucher` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_voucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_voucher_history`
--

DROP TABLE IF EXISTS `oc_voucher_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_voucher_history` (
  `voucher_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`voucher_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_voucher_history`
--

LOCK TABLES `oc_voucher_history` WRITE;
/*!40000 ALTER TABLE `oc_voucher_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `oc_voucher_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_voucher_theme`
--

DROP TABLE IF EXISTS `oc_voucher_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_voucher_theme` (
  `voucher_theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`voucher_theme_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_voucher_theme`
--

LOCK TABLES `oc_voucher_theme` WRITE;
/*!40000 ALTER TABLE `oc_voucher_theme` DISABLE KEYS */;
INSERT INTO `oc_voucher_theme` VALUES (8,'catalog/demo/canon_eos_5d_2.jpg'),(7,'catalog/demo/gift-voucher-birthday.jpg'),(6,'catalog/demo/apple_logo.jpg');
/*!40000 ALTER TABLE `oc_voucher_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_voucher_theme_description`
--

DROP TABLE IF EXISTS `oc_voucher_theme_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_voucher_theme_description` (
  `voucher_theme_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`voucher_theme_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_voucher_theme_description`
--

LOCK TABLES `oc_voucher_theme_description` WRITE;
/*!40000 ALTER TABLE `oc_voucher_theme_description` DISABLE KEYS */;
INSERT INTO `oc_voucher_theme_description` VALUES (6,1,'Christmas'),(7,1,'Birthday'),(8,1,'General'),(6,2,'Christmas'),(7,2,'Birthday'),(8,2,'General'),(6,3,'Christmas'),(7,3,'Birthday'),(8,3,'General'),(6,4,'Christmas'),(7,4,'Birthday'),(8,4,'General');
/*!40000 ALTER TABLE `oc_voucher_theme_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_weight_class`
--

DROP TABLE IF EXISTS `oc_weight_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_weight_class` (
  `weight_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  PRIMARY KEY (`weight_class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_weight_class`
--

LOCK TABLES `oc_weight_class` WRITE;
/*!40000 ALTER TABLE `oc_weight_class` DISABLE KEYS */;
INSERT INTO `oc_weight_class` VALUES (1,1.00000000),(2,1000.00000000),(5,2.20460000),(6,35.27400000);
/*!40000 ALTER TABLE `oc_weight_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_weight_class_description`
--

DROP TABLE IF EXISTS `oc_weight_class_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_weight_class_description` (
  `weight_class_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `unit` varchar(4) NOT NULL,
  PRIMARY KEY (`weight_class_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_weight_class_description`
--

LOCK TABLES `oc_weight_class_description` WRITE;
/*!40000 ALTER TABLE `oc_weight_class_description` DISABLE KEYS */;
INSERT INTO `oc_weight_class_description` VALUES (1,1,'Kilogram','kg'),(2,1,'Gram','g'),(5,1,'Pound ','lb'),(6,1,'Ounce','oz'),(1,2,'Kilogram','kg'),(2,2,'Gram','g'),(5,2,'Pound ','lb'),(6,2,'Ounce','oz'),(1,3,'Kilogram','kg'),(2,3,'Gram','g'),(5,3,'Pound ','lb'),(6,3,'Ounce','oz'),(1,4,'Kilogram','kg'),(2,4,'Gram','g'),(5,4,'Pound ','lb'),(6,4,'Ounce','oz');
/*!40000 ALTER TABLE `oc_weight_class_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_zone`
--

DROP TABLE IF EXISTS `oc_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_zone` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `code` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) DEFAULT '0',
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4239 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_zone`
--

LOCK TABLES `oc_zone` WRITE;
/*!40000 ALTER TABLE `oc_zone` DISABLE KEYS */;
INSERT INTO `oc_zone` VALUES (2721,176,'Abakan','AB',0,0),(2722,176,'Aginskoye','AG',0,0),(2723,176,'Anadyr','AN',0,0),(2724,176,'Arkahangelsk','AR',0,0),(2725,176,'Astrakhan','AS',0,0),(2726,176,'Barnaul','BA',0,0),(2727,176,'Belgorod','BE',0,0),(2728,176,'Birobidzhan','BI',0,0),(2729,176,'Blagoveshchensk','BL',0,0),(2730,176,'Bryansk','BR',0,0),(2731,176,'Cheboksary','CH',0,0),(2732,176,'Chelyabinsk','CL',0,0),(2733,176,'Cherkessk','CR',0,0),(2734,176,'Chita','CI',0,0),(2735,176,'Dudinka','DU',0,0),(2736,176,'Elista','EL',0,0),(2738,176,'Gorno-Altaysk','GA',0,0),(2739,176,'Groznyy','GR',0,0),(2740,176,'Irkutsk','IR',0,0),(2741,176,'Ivanovo','IV',0,0),(2742,176,'Izhevsk','IZ',0,0),(2743,176,'Kalinigrad','KA',0,0),(2744,176,'Kaluga','KL',0,0),(2745,176,'Kasnodar','KS',0,0),(2746,176,'Kazan','KZ',0,0),(2747,176,'Kemerovo','KE',0,0),(2748,176,'Khabarovsk','KH',0,0),(2749,176,'Khanty-Mansiysk','KM',0,0),(2750,176,'Kostroma','KO',0,0),(2751,176,'Krasnodar','KR',0,0),(2752,176,'Krasnoyarsk','KN',0,0),(2753,176,'Kudymkar','KU',0,0),(2754,176,'Kurgan','KG',0,0),(2755,176,'Kursk','KK',0,0),(2756,176,'Kyzyl','KY',0,0),(2757,176,'Lipetsk','LI',0,0),(2758,176,'Magadan','MA',0,0),(2759,176,'Makhachkala','MK',0,0),(2760,176,'Maykop','MY',0,0),(2761,176,'Moscow','MO',1,0),(2762,176,'Murmansk','MU',0,0),(2763,176,'Nalchik','NA',0,0),(2764,176,'Naryan Mar','NR',0,0),(2765,176,'Nazran','NZ',0,0),(2766,176,'Nizhniy Novgorod','NI',0,0),(2767,176,'Novgorod','NO',0,0),(2768,176,'Novosibirsk','NV',0,0),(2769,176,'Omsk','OM',0,0),(2770,176,'Orel','OR',0,0),(2771,176,'Orenburg','OE',0,0),(2772,176,'Palana','PA',0,0),(2773,176,'Penza','PE',0,0),(2774,176,'Perm','PR',0,0),(2775,176,'Petropavlovsk-Kamchatskiy','PK',0,0),(2776,176,'Petrozavodsk','PT',0,0),(2777,176,'Pskov','PS',0,0),(2778,176,'Rostov-na-Donu','RO',0,0),(2779,176,'Ryazan','RY',0,0),(2780,176,'Salekhard','SL',0,0),(2781,176,'Samara','SA',0,0),(2782,176,'Saransk','SR',0,0),(2783,176,'Saratov','SV',0,0),(2784,176,'Smolensk','SM',0,0),(2785,176,'St. Petersburg','SP',1,0),(2786,176,'Stavropol','ST',0,0),(2787,176,'Syktyvkar','SY',0,0),(2788,176,'Tambov','TA',0,0),(2789,176,'Tomsk','TO',0,0),(2790,176,'Tula','TU',0,0),(2791,176,'Tura','TR',0,0),(2792,176,'Tver','TV',0,0),(2793,176,'Tyumen','TY',0,0),(2794,176,'Ufa','UF',0,0),(2795,176,'Ul\'yanovsk','UL',0,0),(2796,176,'Ulan-Ude','UU',0,0),(2797,176,'Ust\'-Ordynskiy','US',0,0),(2798,176,'Vladikavkaz','VL',0,0),(2799,176,'Vladimir','VA',0,0),(2800,176,'Vladivostok','VV',0,0),(2801,176,'Volgograd','VG',0,0),(2802,176,'Vologda','VD',0,0),(2803,176,'Voronezh','VO',0,0),(2804,176,'Vyatka','VY',0,0),(2805,176,'Yakutsk','YA',0,0),(2806,176,'Yaroslavl','YR',0,0),(2807,176,'Yekaterinburg','YE',0,0),(2808,176,'Yoshkar-Ola','YO',0,0);
/*!40000 ALTER TABLE `oc_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_zone_to_geo_zone`
--

DROP TABLE IF EXISTS `oc_zone_to_geo_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_zone_to_geo_zone` (
  `zone_to_geo_zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL DEFAULT '0',
  `geo_zone_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`zone_to_geo_zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_zone_to_geo_zone`
--

LOCK TABLES `oc_zone_to_geo_zone` WRITE;
/*!40000 ALTER TABLE `oc_zone_to_geo_zone` DISABLE KEYS */;
INSERT INTO `oc_zone_to_geo_zone` VALUES (1,222,0,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,222,3513,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,222,3514,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,222,3515,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,222,3516,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,222,3517,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,222,3518,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,222,3519,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,222,3520,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,222,3521,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,222,3522,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,222,3523,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,222,3524,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,222,3525,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,222,3526,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,222,3527,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,222,3528,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,222,3529,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,222,3530,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,222,3531,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,222,3532,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,222,3533,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,222,3534,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,222,3535,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,222,3536,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,222,3537,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,222,3538,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,222,3539,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,222,3540,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,222,3541,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,222,3542,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,222,3543,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,222,3544,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,222,3545,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,222,3546,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,222,3547,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,222,3548,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,222,3549,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,222,3550,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,222,3551,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,222,3552,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,222,3553,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,222,3554,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,222,3555,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,222,3556,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,222,3557,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,222,3558,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,222,3559,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,222,3560,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,222,3561,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,222,3562,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,222,3563,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,222,3564,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,222,3565,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,222,3566,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,222,3567,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,222,3568,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,222,3569,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,222,3570,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,222,3571,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,222,3572,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,222,3573,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,222,3574,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,222,3575,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,222,3576,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,222,3577,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,222,3578,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,222,3579,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,222,3580,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,222,3581,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,222,3582,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,222,3583,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,222,3584,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,222,3585,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,222,3586,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,222,3587,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,222,3588,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,222,3589,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,222,3590,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,222,3591,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,222,3592,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,222,3593,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,222,3594,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,222,3595,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,222,3596,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,222,3597,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,222,3598,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,222,3599,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,222,3600,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,222,3601,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,222,3602,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,222,3603,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,222,3604,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,222,3605,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,222,3606,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,222,3607,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,222,3608,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,222,3609,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,222,3610,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(100,222,3611,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,222,3612,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,222,3949,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,222,3950,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(104,222,3951,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,222,3952,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,222,3953,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,222,3954,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,222,3955,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,222,3972,3,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `oc_zone_to_geo_zone` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-18 18:48:35
