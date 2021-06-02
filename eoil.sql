-- MySQL dump 10.13  Distrib 5.5.62, for Linux (x86_64)
--
-- Host: localhost    Database: Eoil_app
-- ------------------------------------------------------
-- Server version	5.5.62

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
-- Table structure for table `effects`
--

DROP TABLE IF EXISTS `effects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `effects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `effect` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `caution` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `effects`
--

LOCK TABLES `effects` WRITE;
/*!40000 ALTER TABLE `effects` DISABLE KEYS */;
INSERT INTO `effects` VALUES (1,'鎮静作用','頭の痛み','特になし','2021-05-27 14:07:31'),(2,'リラックス','緊張している','特になし','2021-05-27 14:07:36'),(3,'安眠','緊張で眠れない','特になし','2021-05-27 14:07:36');
/*!40000 ALTER TABLE `effects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `essential_oils`
--

DROP TABLE IF EXISTS `essential_oils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `essential_oils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `scientific_name` varchar(255) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `extraction` varchar(255) NOT NULL,
  `aroma` varchar(255) NOT NULL,
  `caution` varchar(255) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `essential_oils`
--

LOCK TABLES `essential_oils` WRITE;
/*!40000 ALTER TABLE `essential_oils` DISABLE KEYS */;
INSERT INTO `essential_oils` VALUES (1,'ラベンダー','Lavandula angustifolia','シソ科','水蒸気蒸留法','フローラル','特になし','Lavender','images/lavender.jpg','2021-05-27 13:36:29'),(2,'イランイラン','Cananga odorata var. genuina','バンレイシ科','水蒸気蒸留法','オリエンタル、エキゾチック','妊娠中は避ける','Ylang Ylang','','2021-05-27 13:40:48'),(3,'ティーツリー','Tee Tree','科','水蒸気蒸留法','フレッシュ','妊娠中は避ける','Tee tree','images/basil.jpg','2021-05-27 13:51:47');
/*!40000 ALTER TABLE `essential_oils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oil_id` int(11) NOT NULL,
  `effect_id` int(11) NOT NULL,
  `howto` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `caution` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oil_id` (`oil_id`),
  KEY `effect_id` (`effect_id`),
  CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`oil_id`) REFERENCES `essential_oils` (`id`),
  CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`effect_id`) REFERENCES `effects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (1,1,2,'オイルブレド','ブレンドオイル1滴をこめかみに塗布','aaaaaaa','2021-05-27 14:12:12'),(2,3,2,'お部屋の香りに','ブレンドオイルをルームフレグランスに','bbbbb','2021-05-27 14:12:12');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-27 23:12:27
