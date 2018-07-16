-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: ocart3
-- ------------------------------------------------------
-- Server version	5.7.22

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
-- Table structure for table `oc_seo_super`
--

DROP TABLE IF EXISTS `oc_seo_super`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_seo_super` (
  `seo_super_id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `h1_page` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `enabled` int(11) DEFAULT NULL,
  PRIMARY KEY (`seo_super_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_seo_super`
--

LOCK TABLES `oc_seo_super` WRITE;
/*!40000 ALTER TABLE `oc_seo_super` DISABLE KEYS */;
INSERT INTO `oc_seo_super` VALUES (1,'bakterii','mycobacterium-tuberculosi','h1_page','description1','keyword1',1),(2,'bakterii','vozbuditeli-vbi','h1_page','description1','keyword1',1),(3,'bakterii','gramotricatelʹnye-bakterii','h1_page','description1','keyword1',1),(4,'bakterii','grampolozitelʹnye-bakterii','h1_page','description1','keyword1',1),(5,'virusy','adenovirusy','h1_page','description1','keyword1',1),(6,'virusy','atipicnoj-pnevmonii','h1_page','description1','keyword1',1),(7,'virusy','vic','h1_page','description1','keyword1',1),(8,'virusy','gripp','h1_page','description1','keyword1',1),(9,'virusy','paragripp','h1_page','description1','keyword1',1),(10,'virusy','parenteralʹnyh-gepatitov','h1_page','description1','keyword1',1),(11,'virusy','poliomielit','h1_page','description1','keyword1',1),(12,'virusy','procie-vozbuditeli-orvi','h1_page','description1','keyword1',1),(13,'virusy','pticʹego-grippa-h5n1','h1_page','description1','keyword1',1),(14,'virusy','rotavirusy','h1_page','description1','keyword1',1),(15,'virusy','svinoj-gripp-h1n1','h1_page','description1','keyword1',1),(16,'virusy','enteralʹnyh-gepatitov','h1_page','description1','keyword1',1),(17,'virusy','enterovirusy','h1_page','description1','keyword1',1),(18,'griby','dermatofiton','h1_page','description1','keyword1',1),(19,'griby','kandida','h1_page','description1','keyword1',1),(20,'sfera','akuserskie-stacionary','h1_page','description1','keyword1',1),(21,'sfera','lpu','h1_page','description1','keyword1',1),(22,'sfera','kliniceskie-laboratorii','h1_page','description1','keyword1',1),(23,'sfera','stancii-perelivania-krovi','h1_page','description1','keyword1',1),(24,'sfera','bakteriologiceskie-laboratorii','h1_page','description1','keyword1',1),(25,'sfera','detskie-ucrezdenia-detsady-skoly-i-tp','h1_page','description1','keyword1',1),(26,'sfera','infekcionnye-ocagi','h1_page','description1','keyword1',1),(27,'sfera','predpriatia-obsestvennogo-pitania','h1_page','description1','keyword1',1),(28,'sfera','predpriatia-prodovolʹstvennoj-torgovli','h1_page','description1','keyword1',1),(29,'sfera','kommunalʹnye-obʺekty-bani-bassejny-gostinicy-obsestvennye-tualety-i-tp','h1_page','description1','keyword1',1),(30,'sfera','ucrezdenia-socobespecenia','h1_page','description1','keyword1',1),(31,'sfera','sanitarnyj-transport','h1_page','description1','keyword1',1),(32,'sfera','otdelenia-neonatologii','h1_page','description1','keyword1',1),(33,'sfera','v-bytu-naseleniem','h1_page','description1','keyword1',1),(34,'sfera','predpriatia-farmacevticeskoj-promyslennosti','h1_page','description1','keyword1',1),(35,'sfera','sportivnye-i-kulʹturnoozdorovitelʹnye-kompleksy','h1_page','description1','keyword1',1),(36,'sfera','diagnosticeskie-laboratorii','h1_page','description1','keyword1',1),(37,'objects','datciki-diagnosticeskogo-oborudovania-uzi-i-td','h1_page','description1','keyword1',1),(38,'objects','zestkaa-mebelʹ','h1_page','description1','keyword1',1),(39,'objects','zerkala-s-amalʹgamoj','h1_page','description1','keyword1',1),(40,'objects','imn-iz-metallov-rezin-na-osnove-naturalʹnogo-i-silikonovogo-kaucuka-stekla-plastmass','h1_page','description1','keyword1',1),(41,'objects','imn-obycnye','h1_page','description1','keyword1',1),(42,'objects','instrumenty-parikmaherskih-massaznyh-kosmeticeskih-salonov','h1_page','description1','keyword1',1),(43,'objects','kresla-ginekologiceskie-stomatologiceskie','h1_page','description1','keyword1',1),(44,'objects','magkaa-mebelʹ','h1_page','description1','keyword1',1),(45,'objects','obuvʹ','h1_page','description1','keyword1',1),(46,'objects','osvetitelʹnoe-oborudovanie-baktericidnye-lampy-i-td','h1_page','description1','keyword1',1),(47,'objects','ofisnaa-tehnika-telefonnye-apparaty-monitory-kompʹuternye-klaviatury-i-dr','h1_page','description1','keyword1',1),(48,'objects','percatki-iz-kaucuka-lateksa-neoprena-i-td','h1_page','description1','keyword1',1),(49,'objects','poverhnosti-v-pomeseniah','h1_page','description1','keyword1',1),(50,'objects','poverhnosti-priborov-i-apparatov','h1_page','description1','keyword1',1),(51,'objects','predmety-licnoj-gigieny','h1_page','description1','keyword1',1),(52,'objects','predmety-obstanovki','h1_page','description1','keyword1',1),(53,'objects','rezinovye-i-polipropilenovye-kovriki','h1_page','description1','keyword1',1),(54,'objects','sanitarnotehniceskoe-oborudovanie','h1_page','description1','keyword1',1),(55,'objects','sanitarnyj-transport','h1_page','description1','keyword1',1),(56,'objects','sistemy-ventilacii-i-kondicionirovania-vozduha','h1_page','description1','keyword1',1),(57,'objects','sportivnyj-inventarʹ','h1_page','description1','keyword1',1),(58,'objects','stoly-reanimacionnye-manipulacionnye-pelenalʹnye','h1_page','description1','keyword1',1);
/*!40000 ALTER TABLE `oc_seo_super` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc_seo_super_product`
--

DROP TABLE IF EXISTS `oc_seo_super_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oc_seo_super_product` (
  `seo_super_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_super_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`seo_super_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc_seo_super_product`
--

LOCK TABLES `oc_seo_super_product` WRITE;
/*!40000 ALTER TABLE `oc_seo_super_product` DISABLE KEYS */;
INSERT INTO `oc_seo_super_product` VALUES (59,1,902),(60,2,902),(61,3,902),(62,4,902),(63,5,902),(64,6,902),(65,7,902),(66,8,902),(67,9,902),(68,10,902),(69,11,902),(70,12,902),(71,13,902),(72,14,902),(73,15,902),(74,16,902),(75,17,902),(76,18,902),(77,19,902),(78,20,902),(79,21,902),(80,22,902),(81,23,902),(82,24,902),(83,25,902),(84,26,902),(85,27,902),(86,28,902),(87,29,902),(88,30,902),(89,31,902),(90,32,902),(91,33,902),(92,34,902),(93,35,902),(94,36,902),(95,37,902),(96,38,902),(97,39,902),(98,40,902),(99,41,902),(100,42,902),(101,43,902),(102,44,902),(103,45,902),(104,46,902),(105,47,902),(106,48,902),(107,49,902),(108,50,902),(109,51,902),(110,52,902),(111,53,902),(112,54,902),(113,55,902),(114,56,902),(115,57,902),(116,58,902);
/*!40000 ALTER TABLE `oc_seo_super_product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-13 14:43:51
