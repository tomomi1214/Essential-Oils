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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `effect` (`effect`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `effects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `effects`
--

LOCK TABLES `effects` WRITE;
/*!40000 ALTER TABLE `effects` DISABLE KEYS */;
INSERT INTO `effects` VALUES (1,'安眠','眠れない時に','特になし',1,'2021-06-07 22:56:46'),(2,'リラックス２','ストレスフルな状態に','過剰摂取に注意',1,'2021-06-07 22:57:59'),(9,'test','test','test',7,'2021-06-12 02:48:35'),(10,'安眠3','眠れない時に','特になし',1,'2021-06-12 07:34:07'),(11,'test2','test2','test2',1,'2021-06-13 06:20:54'),(13,'虫よけ','one','特になし',1,'2021-06-17 05:29:00');
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
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `essential_oils_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `essential_oils`
--

LOCK TABLES `essential_oils` WRITE;
/*!40000 ALTER TABLE `essential_oils` DISABLE KEYS */;
INSERT INTO `essential_oils` VALUES (1,'ラベンダー2','Lavandula angustifolia','シソ科','水蒸気蒸留法','フローラル','特になし','Lavender',1,'images/lavender.jpg','2021-06-07 13:49:14'),(2,'セージ','Salvia officinalis','シソ科','水蒸気蒸留法','【ハーブ系】フレッシュな草の、少し刺激のある香り','特になし','Sage',1,'images/sage.jpg','2021-06-07 14:03:10'),(3,'カモミールローマン','Chamaemelum nobile','キク科','水蒸気蒸留法','【フローラル系】甘くほのかにフルーティーなリンゴのような香り','特になし','Chamomile Roman',2,'images/Camomile.jpg','2021-06-07 23:20:50'),(4,'レモン','Citrus limon','ミカン科','コールドプレス','【柑橘系】さわやかなシトラス','光毒性、刺激強','Lemon',2,'images/lemon.jpg','2021-06-07 23:32:57'),(5,'ティーツリー','Melaleuca alternifolia','フトモモ科','水蒸気蒸留法','【樹木系】フレッシュで、苦味と甘さが混ざったウッディーな香り','刺激強','tea tree',7,'images/teatree.jpg','2021-06-10 06:17:56'),(6,'ネロリ','Citrus aurantium','ミカン科','水蒸気蒸留法','【フローラル系】フローラルとシトラスが混ざり、ほのかに苦みを感じる香り','刺激強','Neroli',7,'images/neroli.jpg','2021-06-10 06:53:18'),(10,'ユーカリ','Eucalyptus globulus','フトモモ科','水蒸気蒸留法','【樹木系】強くフレッシュ。ほのかな甘さにグリーン調の香り','刺激強、高血圧・てんかん症の人、幼児は避ける','Eucalyptus',7,'images/eucalyptus.jpg','2021-06-10 07:46:10'),(11,'ユーカリ2','Eucalyptus globulus','フトモモ科','水蒸気蒸留法','【樹木系】強くフレッシュ。ほのかな甘さにグリーン調の香り','刺激強、高血圧・てんかん症の人、幼児は避ける','Eucalyptus',7,'images/teatree.jpg','2021-06-11 04:50:57'),(13,'アプリコット','アプリコット','アプリコット','アプリコット','アプリコット','アプリコット','aplicot',1,'images/apricots.jpg','2021-06-17 05:30:13'),(14,'レモングラス','レモングラス','レモングラス','レモングラス','レモングラス','レモングラス','Lemon grass',1,'images/lemon.jpg','2021-06-17 05:47:16'),(15,'ローズマリー','Rosmarinus officinalis','シソ科','水蒸気蒸留法','【ハーブ系】強いフレッシュなハーブの香り','特になし','Rosemary',1,'images/rosemary.jpg','2021-06-17 08:38:31');
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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `relation_index` (`user_id`,`oil_id`,`effect_id`),
  KEY `oil_id` (`oil_id`),
  KEY `effect_id` (`effect_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`oil_id`) REFERENCES `essential_oils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`effect_id`) REFERENCES `effects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `relations_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (1,1,2,'ルームフレグランス','オイルを数滴混ぜて使用','特になし',1,'2021-06-07 23:08:43'),(2,3,2,'ルームフレグランス','眠れない時に','特になし',2,'2021-06-07 23:21:38'),(8,3,2,'aaa','bbb','ccc',7,'2021-06-11 02:42:15'),(9,3,1,'aaa','vv','xx',1,'2021-06-13 02:17:05'),(10,10,13,'スプレー','aa','特になし',1,'2021-06-18 05:11:44'),(11,14,13,'ブレンドして虫よけスプレーとして','a','a',1,'2021-06-18 05:18:36');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tomomi','tomomi@gmail.com','tomomi','2021-06-07 11:11:43'),(2,'Takoaka','takaoka@gmail.com','takaoka','2021-06-07 23:18:17'),(3,'たかおかともみ','','','2021-06-10 04:06:38'),(7,'toomomi','toomomi@gmail.com','toomomi','2021-06-10 05:24:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-18 14:19:22
