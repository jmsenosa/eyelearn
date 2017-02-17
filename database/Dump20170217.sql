-- MySQL dump 10.13  Distrib 5.6.31, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: eyelearn_db
-- ------------------------------------------------------
-- Server version	5.6.31-0ubuntu0.15.10.1

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
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance` varchar(255) DEFAULT NULL,
  `canquiz` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,1,'2016-10-03','present',NULL),(2,2,'2016-10-03','absent',NULL),(3,3,'2016-10-03','absent',NULL),(4,4,'2016-10-03','absent',NULL),(5,6,'2016-10-03','present',NULL),(7,6,'2016-10-04','present',NULL),(8,12,'2014-10-06','present',NULL),(9,15,'2016-10-04','present',NULL),(10,10,'2016-10-04','present',NULL),(11,9,'2016-10-04','present',NULL),(12,15,'2016-10-09','absent',NULL),(13,9,'2016-10-09','present',NULL),(14,16,'2016-10-09','present',NULL),(15,10,'2016-10-09','absent',NULL),(16,9,'2016-10-10','present',NULL),(17,16,'2016-10-10','absent',NULL),(18,10,'2016-10-10','present',NULL),(19,15,'2016-10-10','absent',NULL),(20,26,'2017-01-24','present',NULL),(21,25,'2017-01-24','present',NULL),(22,9,'2017-01-28','present',NULL),(23,9,'2017-02-05','present',NULL),(24,29,'2017-02-05','present',NULL),(25,29,'2017-02-05','present',NULL),(26,29,'2017-02-08','present',NULL),(27,29,'2017-02-09','present',NULL),(28,37,'2017-02-13','present',NULL),(29,37,'2017-02-14','present',NULL),(30,37,'2017-02-15','present',NULL),(31,37,'2017-02-17','absent',NULL);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audio`
--

DROP TABLE IF EXISTS `audio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audio`
--

LOCK TABLES `audio` WRITE;
/*!40000 ALTER TABLE `audio` DISABLE KEYS */;
INSERT INTO `audio` VALUES (1,'BE.mp3','hard'),(2,'BA.mp3','hard'),(3,'BI - Copy.mp3','hard'),(4,'BO - Copy (2).mp3','hard'),(5,'BU.mp3','hard'),(6,'BA (1) - Copy.mp3','sfsad'),(7,'asdgfdfgdfgdfg.mp3','sfsad'),(8,'BA.mp3','sfsad'),(9,'BA (1).mp3','sfsad'),(10,'BE (1).mp3','sfsad'),(11,'BE (1) - Copy.mp3','sfsad'),(12,'BE.mp3','sfsad'),(13,'BI - Copy.mp3','sfsad'),(14,'BI (1).mp3','sfsad'),(15,'BI.mp3','sfsad'),(16,'BO - Copy (2).mp3','sfsad'),(17,'A (2) - Copy.mp3','Hard'),(18,'A (1).mp3','Hard'),(19,'A (1).mp3','eto'),(20,'A (2) - Copy.mp3','eto'),(21,'aaaa - Copy.mp3','eto'),(22,'aaaa.mp3','eto'),(23,'asdgfdfgdfgdfg.mp3','eto'),(24,'BA (1) - Copy.mp3','eto'),(25,'BA (1).mp3','eto'),(26,'A (1).mp3','asa'),(27,'A (2) - Copy.mp3','asa'),(28,'A (2) - Copy.mp3','WDQE'),(29,'A (1).mp3','WDQE'),(30,'aaaa - Copy.mp3','WDQE'),(31,'BE.mp3','Jumper'),(32,'BE (1) - Copy.mp3','Jumper'),(33,'BE (1).mp3','Jumper'),(34,'BI.mp3','Jumper'),(35,'A (1).mp3','Jumper'),(36,'A (2) - Copy.mp3','Jumper'),(37,'BA.mp3','Jumper'),(38,'BO.mp3','Jumper'),(39,'BO - Copy (2).mp3','Jumper'),(40,'BU.mp3','Jumper'),(41,'28913__junggle__btn103.wav','Jumper'),(42,'28913__junggle__btn103.wav','Hedgehog Jupiter 2'),(43,'A (1).mp3','Hedgehog Jupiter 2'),(44,'A (2) - Copy.mp3','Hedgehog Jupiter 2'),(45,'BA.mp3','Hedgehog Jupiter 2'),(46,'A (1).mp3','LESSON TEST BLABLA'),(47,'28913__junggle__btn103.wav','LESSON TEST BLABLA'),(48,'A (2) - Copy.mp3','LESSON TEST BLABLA'),(49,'BA.mp3','LESSON TEST BLABLA'),(50,'A (2) - Copy.mp3','DOODOO BIRD'),(51,'BA.mp3','DOODOO BIRD'),(52,'BA (1).mp3','DOODOO BIRD'),(53,'BE.mp3','DOODOO BIRD'),(54,'BE (1) - Copy.mp3','lesson 311abc'),(55,'BO - Copy (2).mp3','lesson 311abc'),(56,'A (2) - Copy.mp3','lesson 311abc'),(57,'BA (1).mp3','ANG ALAMAT NG PINYA'),(58,'BE.mp3','ANG ALAMAT NG PINYA'),(59,'BA.mp3','ANG ALAMAT NG PINYA'),(60,'A (2) - Copy.mp3','ANG ALAMAT NG PINYA'),(61,'DU.mp3','Hedgehog Jupiter 123'),(62,'DI.mp3','Hedgehog Jupiter 123'),(63,'BU.mp3','Hedgehog Jupiter 123'),(64,'BO.mp3','Hedgehog Jupiter 123'),(65,'BE.mp3','Hedgehog Jupiter 123'),(66,'5555.mp3','Hedgehog Jupiter 123'),(67,'7777.mp3','Hedgehog Jupiter 123'),(68,'88.mp3','Hedgehog Jupiter 123');
/*!40000 ALTER TABLE `audio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choice`
--

DROP TABLE IF EXISTS `choice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `choice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choice`
--

LOCK TABLES `choice` WRITE;
/*!40000 ALTER TABLE `choice` DISABLE KEYS */;
/*!40000 ALTER TABLE `choice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grading`
--

DROP TABLE IF EXISTS `grading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grading` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `grading_quarters_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `school_year_start` year(4) NOT NULL,
  `school_year_end` year(4) NOT NULL,
  `online_quiz` int(10) NOT NULL,
  `offline_quiz` float NOT NULL,
  `quiz_total` int(10) NOT NULL,
  `quiz_percentage` double NOT NULL,
  `recitation_percentage` int(10) NOT NULL,
  `recitation_total` int(11) NOT NULL,
  `attendance_total` int(11) NOT NULL,
  `attendance_percentage` double NOT NULL,
  `periodical_exam_total` int(10) NOT NULL,
  `periodical_exam_percentage` double NOT NULL,
  `homework` int(10) NOT NULL,
  `homework_percentage` double NOT NULL,
  `final_grade` double NOT NULL,
  `status` enum('inactive','active','done') NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grading`
--

LOCK TABLES `grading` WRITE;
/*!40000 ALTER TABLE `grading` DISABLE KEYS */;
INSERT INTO `grading` VALUES (3,37,1,7,2016,2017,92,89,23,90.5,90,14,15,99,19,75.35,16,78.23,86.63,'done','2017-02-16 06:02:40');
/*!40000 ALTER TABLE `grading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grading_quarters`
--

DROP TABLE IF EXISTS `grading_quarters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grading_quarters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` enum('inactive','active','done') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grading_quarters`
--

LOCK TABLES `grading_quarters` WRITE;
/*!40000 ALTER TABLE `grading_quarters` DISABLE KEYS */;
INSERT INTO `grading_quarters` VALUES (1,'First Quarter','active'),(2,'Second Quarter','active'),(3,'Third Quarter','active'),(4,'Forth Quarter','active');
/*!40000 ALTER TABLE `grading_quarters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grading_quarter_id` int(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audio` varchar(255) NOT NULL,
  `isDone` int(11) DEFAULT '0',
  `lesson_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` VALUES (1,1,39,'Hard','2016-10-03',1,'2016-10-03 18:18:34','',1,NULL),(2,1,39,'soft','2016-10-04',1,'2016-10-03 18:18:43','',1,NULL),(4,1,39,'Love','2016-10-05',1,'2016-10-03 18:19:23','',1,NULL),(5,1,39,'sfsad','2017-09-13',1,'2017-09-03 10:49:11','',1,NULL),(20,1,39,'Hedgehog Jupiter 2','2017-01-29',1,'2017-01-29 21:30:36','',1,NULL),(7,1,41,'asa','2016-10-05',1,'2016-10-04 18:31:02','',0,NULL),(8,1,41,'Good','2016-10-05',1,'2016-10-04 18:31:11','',1,NULL),(9,1,41,'Dsadas','2016-10-06',1,'2016-10-04 18:32:34','',1,NULL),(11,1,41,'sA','2016-10-04',1,'2016-10-04 14:36:54','',0,NULL),(12,1,41,'SADASD','2016-10-05',1,'2016-10-04 14:37:21','',0,NULL),(13,1,42,'WDQE','2014-10-06',1,'2014-10-06 09:53:19','',0,NULL),(14,1,42,'Sadsdas','2016-10-04',1,'2016-10-04 10:35:59','',0,NULL),(15,1,42,'sdasd','2016-10-04',1,'2016-10-04 10:36:14','',0,NULL),(16,1,1,'Lesson 1','2017-01-27',1,'2017-01-03 19:45:08','A (2) - Copy.mp3',0,NULL),(17,1,1,'Hedgehog Jupiter','2017-01-20',1,'2017-01-03 20:22:27','A (1).mp3',0,NULL),(18,1,42,'Proin Eget Tortor Risus. Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit.','2017-01-24',1,'2017-01-24 01:49:13','BO - Copy (2).mp3',0,NULL),(19,1,1,'Jumper','2017-02-08',1,'2017-02-05 23:10:40','',0,1),(21,1,39,'LESSON TEST BLABLA','2017-02-08',1,'2017-02-05 15:33:15','',1,1),(22,1,40,'LESSON TEST BLABLA','2017-02-08',1,'2017-02-05 15:33:15','',0,1),(23,1,1,'DOODOO BIRD','0000-00-00',1,'2017-02-08 00:40:23','',0,NULL),(24,1,39,'lesson 311abc','2017-02-14',1,'2017-02-12 20:15:50','',1,NULL),(25,1,39,'IBAT IBANG KULAY','2017-02-24',1,'2017-02-13 23:09:26','BE.mp3',0,NULL),(26,1,39,'Mga anyong lupa&#039;t dagat','2017-02-22',1,'2017-02-13 23:15:44','BE.mp3',0,NULL),(27,1,39,'ANG ALAMAT NG PINYA','2017-02-20',1,'2017-02-13 23:16:22','',0,1),(28,1,39,'PAGAARAL','2017-02-21',1,'2017-02-13 23:23:47','',0,NULL),(29,1,39,'Hedgehog Jupiter 123','2017-02-15',1,'2017-02-13 23:27:47','BA.mp3',1,NULL),(30,1,39,'FIRST QUARTER LESSON 1','2017-02-16',1,'2017-02-16 02:02:37','',0,NULL);
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_dtl`
--

DROP TABLE IF EXISTS `lesson_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_dtl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `seconds` int(3) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audio_id` int(11) NOT NULL,
  `board` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_dtl`
--

LOCK TABLES `lesson_dtl` WRITE;
/*!40000 ALTER TABLE `lesson_dtl` DISABLE KEYS */;
INSERT INTO `lesson_dtl` VALUES (1,1,'ba.png',2,'2016-10-03 10:20:18',2,1),(2,1,'be.png',2,'2016-10-03 10:20:24',1,1),(3,1,'i.png',2,'2016-10-03 10:20:34',3,1),(4,1,'o.png',2,'2016-10-03 10:20:42',4,1),(5,1,'u.png',2,'2016-10-03 10:20:50',5,1),(6,6,'babsbas.png',2,'2016-10-04 10:28:21',19,1),(7,6,'daaaa.png',2,'2016-10-04 10:28:29',20,1),(8,6,'haaaa.png',2,'2016-10-04 10:28:40',24,1),(9,6,'kkkk.png',2,'2016-10-04 10:28:48',25,1),(10,13,'logo.png',2,'2014-10-06 01:54:00',28,1),(11,13,'circle-outline.png',2,'2014-10-06 01:54:08',29,1),(12,19,'001_business_man_03.jpg',2,'2017-01-27 15:53:43',35,1),(13,19,'Screenshot from 2016-09-14 13-42-26.png',2,'2017-01-27 15:53:56',31,1),(14,19,'yukienakama.jpg',2,'2017-01-27 15:54:14',31,1),(15,19,'10563425_tml.jpg',2,'2017-01-27 15:54:31',34,2),(16,19,'350px-nana_mizuki_-_nana_clips_6_promotional.jpg',2,'2017-01-27 15:54:49',40,2),(17,20,'download.png',1,'2017-01-29 13:40:21',42,1),(18,20,'download (1).png',2,'2017-01-29 13:40:34',43,1),(19,21,'shun-oguri-36.3.jpg',10,'2017-02-05 07:34:43',46,1),(20,21,'Screenshot from 2016-11-22 16-31-24.png',0,'2017-02-05 07:34:58',47,2),(21,21,'k6-42d08.jpg',0,'2017-02-05 07:35:03',46,1),(22,21,'001_business_man_03.jpg',0,'2017-02-05 07:41:18',49,2),(23,27,'shun-oguri-36.3.jpg',2,'2017-02-13 15:31:18',57,1),(24,27,'shun-oguri-36.3.jpg',2,'2017-02-13 15:31:23',58,1),(25,27,'shun-oguri-36.3.jpg',2,'2017-02-13 15:31:27',59,1),(26,27,'yukienakama.jpg',2,'2017-02-13 15:31:35',60,1),(46,29,'daaaa.png',2,'2017-02-14 18:16:51',66,NULL),(42,24,'be.png',0,'2017-02-13 16:10:47',54,1),(43,24,'o.png',0,'2017-02-13 16:10:55',55,1),(44,24,'ba.png',0,'2017-02-13 16:11:31',56,1),(45,29,'babsbas.png',2,'2017-02-14 18:16:42',63,NULL),(35,27,'shun-oguri-36.3.jpg',0,'2017-02-13 16:05:02',57,2),(40,29,'o.png',0,'2017-02-13 16:08:16',61,1),(41,29,'u.png',0,'2017-02-13 16:08:27',64,1);
/*!40000 ALTER TABLE `lesson_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=414 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'mia rose Log in.','User Log in','2016-10-03 18:13:08'),(2,'mia rose Create User [diana].','User Create User','2016-10-03 18:14:09'),(3,'mia rose Log out.','User log out','2016-10-03 18:14:23'),(4,'diana mundo Log in.','User Log in','2016-10-03 18:14:29'),(5,'diana mundo Added new Section rose.','Add Section','2016-10-03 18:15:11'),(6,'diana mundo Create User [].','User Create User','2016-10-03 18:15:47'),(7,'diana mundo Create User [].','User Create User','2016-10-03 18:16:05'),(8,'diana mundo Create User [].','User Create User','2016-10-03 18:16:32'),(9,'diana mundo Added new Lesson hard.','Add Lesson','2016-10-03 18:18:34'),(10,'diana mundo Added new Lesson soft.','Add Lesson','2016-10-03 18:18:43'),(11,'diana mundo Added new Lesson donee.','Add Lesson','2016-10-03 18:18:57'),(12,'diana mundo Deleted Lesson donee.','Delete Lesson','2016-10-03 18:19:10'),(13,'diana mundo Added new Lesson love.','Add Lesson','2016-10-03 18:19:23'),(14,'diana mundo Updated Lesson Love.','Update Lesson','2016-10-03 18:19:28'),(15,'diana mundo Added .','Add Lesson Content','2016-10-03 18:20:18'),(16,'diana mundo Added .','Add Lesson Content','2016-10-03 18:20:24'),(17,'diana mundo Added .','Add Lesson Content','2016-10-03 18:20:34'),(18,'diana mundo Added .','Add Lesson Content','2016-10-03 18:20:42'),(19,'diana mundo Added .','Add Lesson Content','2016-10-03 18:20:50'),(20,'diana mundo Added quiz 1.','Add Quiz','2016-10-03 18:21:36'),(21,'diana mundo Added quiz 2.','Add Quiz','2016-10-03 18:22:03'),(22,'diana mundo Added quiz 3.','Add Quiz','2016-10-03 18:22:26'),(23,'diana mundo Added quiz 4.','Add Quiz','2016-10-03 18:22:46'),(24,'diana mundo Added alamat ng daliri.','Add Story','2016-10-03 18:23:24'),(25,'diana mundo Updated Alamat Ng Daliri.','Update Story','2016-10-03 18:23:30'),(26,'diana mundo Create User [].','User Create User','2016-10-03 10:27:22'),(27,'diana mundo Create User [].','User Create User','2016-10-03 10:28:01'),(28,'diana mundo Create User [].','User Create User','2016-10-03 10:28:35'),(29,'sofas ako Log in.','User Log in','2016-10-03 10:29:40'),(30,'ikaw hard Log in.','User Log in','2016-10-03 10:30:03'),(31,'diana mundo Log out.','User log out','2016-10-03 10:31:07'),(32,'ako hard Log in.','Student Log in','2016-10-03 10:31:14'),(33,'soft ako Log in.','Student Log in','2016-10-03 10:33:11'),(34,'naku hard Log in.','Student Log in','2016-10-03 10:33:20'),(35,'soft ako Log in.','Student Log in','2016-10-03 10:33:33'),(36,'sofas ako Log in.','User Log in','2016-10-03 10:37:17'),(37,'diana mundo Log in.','User Log in','2016-10-03 10:38:01'),(38,'diana mundo Updated Lesson Hard.','Update Lesson','2016-10-03 10:38:16'),(39,'sofas ako Log in.','User Log in','2016-10-03 10:42:41'),(40,'diana mundo Log in.','User Log in','2016-10-03 10:43:13'),(41,'diana mundo Create User [].','User Create User','2017-09-03 10:44:00'),(42,'diana mundo Added new Lesson sfsad.','Add Lesson','2017-09-03 10:49:11'),(43,'diana mundo Log out.','User log out','2017-09-03 10:50:39'),(44,'mia rose Log in.','User Log in','2017-09-03 10:50:47'),(45,'mia rose Create User [again].','User Create User','2017-09-03 23:59:59'),(46,'mia rose Log out.','User log out','2016-10-03 10:54:17'),(47,'diana mundo Log in.','User Log in','2016-10-03 10:54:25'),(48,'ikaw hard Log in.','User Log in','2016-10-03 10:55:09'),(49,'sofas ako Log in.','User Log in','2016-10-03 18:04:56'),(50,'mia rose Log in.','User Log in','2016-10-03 18:15:31'),(51,'mia rose Create User [paul].','User Create User','2016-10-03 18:16:53'),(52,'mia rose Log out.','User log out','2016-10-03 18:18:19'),(53,'sofas ako Log in.','User Log in','2016-10-03 18:18:31'),(54,'Paul Mangahas Log in.','User Log in','2016-10-03 18:18:49'),(55,'Paul Mangahas Added new Section jehova.','Add Section','2016-10-03 18:19:41'),(56,'Paul Mangahas Create User [].','User Create User','2016-10-03 18:20:32'),(57,'Paul Mangahas Create User [].','User Create User','2016-10-03 18:22:20'),(58,'Paul Mangahas Create User [].','User Create User','2016-10-03 18:22:44'),(59,'Paul Mangahas Added new Lesson eto.','Add Lesson','2016-10-04 18:26:51'),(60,'Paul Mangahas Added .','Add Lesson Content','2016-10-04 18:28:21'),(61,'Paul Mangahas Added .','Add Lesson Content','2016-10-04 18:28:29'),(62,'Paul Mangahas Added .','Add Lesson Content','2016-10-04 18:28:40'),(63,'Paul Mangahas Added .','Add Lesson Content','2016-10-04 18:28:48'),(64,'Paul Mangahas Added p1.','Add Quiz','2016-10-04 18:29:32'),(65,'Paul Mangahas Added p1.','Add Quiz','2016-10-04 18:30:07'),(66,'Paul Mangahas Added quiz 3.','Add Quiz','2016-10-04 18:30:35'),(67,'Paul Mangahas Added new Lesson asa.','Add Lesson','2016-10-04 18:31:02'),(68,'Paul Mangahas Added new Lesson Good.','Add Lesson','2016-10-04 18:31:11'),(69,'Paul Mangahas Updated Lesson Good.','Update Lesson','2016-10-04 18:31:17'),(70,'lina Marallag Log in.','User Log in','2016-10-04 18:31:52'),(71,'Paul Mangahas Added new Lesson Dsadas.','Add Lesson','2016-10-04 18:32:34'),(72,'Paul Mangahas Updated Lesson Dsadas.','Update Lesson','2016-10-04 18:32:41'),(73,'Charles Marallag Log in.','Student Log in','2016-10-04 18:35:24'),(74,'Charles Marallag Log in.','Student Log in','2016-10-04 14:35:59'),(75,'Paul Mangahas Added Good.','Add Story','2016-10-04 14:36:59'),(76,'Paul Mangahas Updated Good.','Update Story','2016-10-04 14:37:08'),(77,'lina Marallag Log in.','User Log in','2016-10-04 14:39:22'),(78,'Paul Mangahas Updated Lesson Eto.','Update Lesson','2016-10-04 14:39:59'),(79,'sofas ako Log in.','User Log in','2016-10-04 14:40:25'),(80,'Charles Marallag Log in.','Student Log in','2016-10-04 14:47:53'),(81,'Charles Marallag Log in.','Student Log in','2016-10-04 16:24:08'),(82,'Charles Marallag Log in.','Student Log in','2016-10-04 16:24:18'),(83,'Paul Mangahas Log in.','User Log in','2016-10-04 16:24:29'),(84,'Paul Mangahas Log out.','User log out','2016-10-04 14:24:59'),(85,'Charles Marallag Log in.','Student Log in','2016-10-04 14:25:05'),(86,'Charles Marallag Log in.','Student Log in','2016-10-04 14:27:09'),(87,'Charles Marallag Log in.','Student Log in','2016-10-04 14:37:22'),(88,'Charles Marallag Log in.','Student Log in','2016-10-04 14:14:09'),(89,'lina Marallag Log in.','User Log in','2016-10-04 14:14:43'),(90,'Charles Marallag Log in.','Student Log in','2016-10-04 14:29:49'),(91,'lina Marallag Log in.','User Log in','2016-10-04 14:30:18'),(92,'Paul Mangahas Log in.','User Log in','2016-10-04 14:30:44'),(93,'Paul Mangahas Added new Lesson sdasdas.','Add Lesson','2016-10-04 14:30:57'),(94,'Charles Marallag Log in.','Student Log in','2016-10-04 14:31:12'),(95,'lina Marallag Log in.','User Log in','2016-10-04 14:31:58'),(96,'Paul Mangahas Log in.','User Log in','2016-10-04 14:36:02'),(97,'Paul Mangahas Deleted Lesson sdasdas.','Delete Lesson','2016-10-04 14:36:41'),(98,'Paul Mangahas Added new Lesson sA.','Add Lesson','2016-10-04 14:36:54'),(99,'Paul Mangahas Log out.','User log out','2016-10-04 14:37:06'),(100,'Paul Mangahas Log in.','User Log in','2016-10-04 14:37:12'),(101,'Paul Mangahas Added new Lesson SADASD.','Add Lesson','2016-10-04 14:37:21'),(102,'Paul Mangahas Log out.','User log out','2016-10-04 14:38:06'),(103,'Paul Mangahas Log in.','User Log in','2016-10-04 14:38:15'),(104,'Paul Mangahas Create User [].','User Create User','2013-10-04 14:39:18'),(105,'Paul Mangahas Log out.','User log out','2016-10-04 14:39:57'),(106,'Paul Mangahas Log in.','User Log in','2016-10-04 14:40:16'),(107,'Paul Mangahas Log out.','User log out','2016-10-01 14:43:32'),(108,'Paul Mangahas Log in.','User Log in','2016-10-01 14:43:37'),(109,'Paul Mangahas Updated profile','User Update Profile','2016-10-01 14:44:12'),(110,'pam Mangahas Updated profile','User Update Profile','2016-10-01 14:44:24'),(111,'pam tabas Log out.','User log out','2016-10-01 14:46:16'),(112,'Charles Marallag Log in.','Student Log in','2016-10-01 16:12:26'),(113,'pam tabas Log in.','User Log in','2016-10-01 16:13:44'),(114,'pam tabas Log out.','User log out','2016-10-01 16:18:16'),(115,'mia rose Log in.','User Log in','2016-10-01 16:18:24'),(116,'mia rose Log out.','User log out','2016-10-01 16:18:28'),(117,'pam tabas Log in.','User Log in','2016-10-01 16:18:38'),(118,'pam tabas Log out.','User log out','2016-10-01 16:18:46'),(119,'mia rose Log in.','User Log in','2016-10-01 16:18:53'),(120,'mia rose Delete User [pam].','User Delete User','2016-10-01 16:19:03'),(121,'mia rose Create User [rosalie].','User Create User','2016-10-01 16:19:59'),(122,'mia rose Log out.','User log out','2016-10-01 09:20:17'),(123,'Rosalie mijares Log in.','User Log in','2016-10-01 09:20:38'),(124,'Rosalie mijares Added new Section ava.','Add Section','2016-10-01 09:20:58'),(125,'Rosalie mijares Create User [].','User Create User','2016-10-01 09:21:43'),(126,'Rosalie mijares Log in.','User Log in','2016-10-01 09:26:03'),(127,'Rosalie mijares Log out.','User log out','2016-10-01 09:26:36'),(128,'Rosalie mijares Log in.','User Log in','2016-10-01 09:27:25'),(129,'Rosalie mijares Create User [].','User Create User','2016-10-01 09:27:58'),(130,'Rosalie mijares Create User [].','User Create User','2016-10-04 09:28:47'),(131,'Rosalie mijares Create User [].','User Create User','2015-07-04 09:29:10'),(132,'Rosalie mijares Log out.','User log out','2016-10-06 09:30:11'),(133,'Rosalie mijares Log in.','User Log in','2016-10-06 09:50:29'),(134,'Rosalie mijares Create User [].','User Create User','2014-10-06 09:52:53'),(135,'Rosalie mijares Added new Lesson WDQE.','Add Lesson','2014-10-06 09:53:19'),(136,'Rosalie mijares Added .','Add Lesson Content','2014-10-06 09:54:00'),(137,'Rosalie mijares Added .','Add Lesson Content','2014-10-06 09:54:08'),(138,'Rosalie mijares Added SADSA.','Add Quiz','2014-10-06 09:54:32'),(139,'Rosalie mijares Added quiz 1.','Add Quiz','2014-10-06 09:54:44'),(140,'Rosalie mijares Log out.','User log out','2014-10-06 09:54:47'),(141,'Rosalie mijares Log in.','User Log in','2014-10-06 09:54:59'),(142,'Rosalie mijares Log out.','User log out','2014-10-06 09:55:09'),(143,'sadasda sdasd Log in.','Student Log in','2014-10-06 09:55:15'),(144,'sadasda sdasd Log in.','Student Log in','2014-10-06 09:55:43'),(145,'Rosalie mijares Log in.','User Log in','2014-10-06 09:55:55'),(146,'sadasda sdasd Log in.','Student Log in','2014-10-06 09:56:08'),(147,'Rosalie mijares Create User [].','User Create User','2009-11-06 10:17:08'),(148,'Rosalie mijares Log out.','User log out','2009-11-06 10:17:32'),(149,'Rosalie mijares Log in.','User Log in','2016-10-04 10:31:00'),(150,'Rosalie mijares Create User [].','User Create User','2015-10-04 10:32:30'),(151,'Rosalie mijares Log out.','User log out','2016-10-04 10:32:59'),(152,'mia rose Log in.','User Log in','2016-10-04 10:33:04'),(153,'mia rose Log out.','User log out','2016-10-04 10:33:46'),(154,'Rosalie mijares Log in.','User Log in','2016-10-04 10:33:57'),(155,'Rosalie mijares Create User [].','User Create User','2016-10-04 10:35:00'),(156,'mine daa Log in.','User Log in','2016-10-04 10:35:26'),(157,'Rosalie mijares Added new Lesson sad.','Add Lesson','2016-10-04 10:35:59'),(158,'Rosalie mijares Updated Lesson Sadsdas.','Update Lesson','2016-10-04 10:36:08'),(159,'Rosalie mijares Added new Lesson sdasd.','Add Lesson','2016-10-04 10:36:14'),(160,'add daa Log in.','Student Log in','2016-10-04 10:38:01'),(161,'chalie marallag Log in.','Student Log in','2016-10-04 10:42:33'),(162,'Rosalie mijares Log in.','User Log in','2016-10-04 10:42:56'),(163,'Rosalie mijares Create User [].','User Create User','2016-10-04 10:43:19'),(164,'Rosalie mijares Log out.','User log out','2016-10-04 10:43:25'),(165,'dw ewe Log in.','Student Log in','2016-10-04 10:43:29'),(166,'Rosalie mijares Log out.','User log out','2016-10-04 10:43:54'),(167,'Rosalie mijares Log in.','User Log in','2016-10-09 14:26:06'),(168,'Rosalie mijares Log out.','User log out','2016-10-09 14:27:58'),(169,'mia rose Log in.','User Log in','2016-10-09 14:28:10'),(170,'sam nicole Log in.','Student Log in','2016-10-09 14:41:19'),(171,'mia rose Log in.','User Log in','2016-10-09 14:43:13'),(172,'mia rose Log out.','User log out','2016-10-09 14:43:18'),(173,'Rosalie mijares Log in.','User Log in','2016-10-09 14:43:38'),(174,'mia rose Log in.','User Log in','2016-10-09 14:58:23'),(175,'mia rose Create User [Mama].','User Create User','2016-10-09 14:59:48'),(176,'mia rose Log out.','User log out','2016-10-09 15:00:26'),(177,'mia rose Log in.','User Log in','2016-10-09 15:03:53'),(178,'mia rose Log out.','User log out','2016-10-09 15:04:16'),(179,'Rosalie mijares Log in.','User Log in','2016-10-09 15:04:27'),(180,'Rosalie mijares Log out.','User log out','2016-10-09 15:07:10'),(181,'Rosalie mijares Log in.','User Log in','2016-10-09 15:07:47'),(182,'mine daa Log in.','User Log in','2016-10-09 15:08:17'),(183,'Rosalie mijares Create User [].','User Create User','2016-10-09 15:12:03'),(184,'Rosalie mijares Log out.','User log out','2016-10-09 15:12:14'),(185,'Rosalie mijares Log in.','User Log in','2016-10-09 15:38:58'),(186,'Rosalie mijares Log in.','User Log in','2016-10-09 15:41:00'),(187,'Rosalie mijares Log out.','User log out','2016-10-09 15:43:12'),(188,'mia rose Log in.','User Log in','2016-10-09 16:15:49'),(189,'chalie marallag Log in.','Student Log in','2016-10-09 16:16:43'),(190,'mia rose Log in.','User Log in','2016-10-10 00:52:09'),(191,'mia rose Log in.','User Log in','2016-10-10 02:27:50'),(192,'mia rose Log out.','User log out','2016-10-10 02:30:10'),(193,'sam nicole Log in.','Student Log in','2016-10-10 02:30:23'),(194,'sam nicole Log in.','Student Log in','2016-10-10 02:30:30'),(195,'mia rose Log in.','User Log in','2016-10-10 02:30:44'),(196,'mia rose Log out.','User log out','2016-10-10 02:31:17'),(197,'mia rose Log in.','User Log in','2016-10-10 02:32:31'),(198,'mia rose Log out.','User log out','2016-10-10 02:34:43'),(199,'diana mundo Log in.','User Log in','2016-10-10 02:34:54'),(200,'diana mundo Create User [].','User Create User','2016-10-10 02:35:38'),(201,'diana mundo Log out.','User log out','2016-10-10 02:36:03'),(202,'sam nicole Log in.','Student Log in','2016-10-10 02:37:02'),(203,'diana mundo Log in.','User Log in','2016-10-10 02:37:26'),(204,'diana mundo Create User [].','User Create User','2016-10-10 02:39:11'),(205,'diana mundo Log out.','User log out','2016-10-10 02:41:51'),(206,'mia rose Log in.','User Log in','2016-10-10 02:43:04'),(207,'mia rose Log out.','User log out','2016-10-10 02:47:15'),(208,'sam nicole Log in.','Student Log in','2016-10-10 02:47:26'),(209,'sam nicole Log in.','Student Log in','2016-10-10 02:49:19'),(210,'mia rose Log in.','User Log in','2016-10-10 02:51:22'),(211,'mia rose Log out.','User log out','2016-10-10 02:52:58'),(212,'sam nicole Log in.','Student Log in','2016-10-10 02:55:06'),(213,'mia rose Log in.','User Log in','2016-10-10 02:57:24'),(214,'mia rose Log out.','User log out','2016-10-10 03:02:34'),(215,'sam nicole Log in.','Student Log in','2016-10-10 03:03:41'),(216,'Rosalie mijares Log in.','User Log in','2016-10-10 03:04:11'),(217,'Rosalie mijares Log out.','User log out','2016-10-10 03:05:07'),(218,'sam nicole Log in.','Student Log in','2016-10-10 03:05:19'),(219,'Rosalie mijares Log in.','User Log in','2016-10-10 03:07:32'),(220,'Rosalie mijares Create User [].','User Create User','2016-10-10 03:09:13'),(221,'Rosalie mijares Log out.','User log out','2016-10-10 03:24:09'),(222,'Rosalie mijares Log in.','User Log in','2016-10-10 06:00:37'),(223,'Rosalie mijares Create User [].','User Create User','2016-10-10 06:05:22'),(224,'add daa Log in.','Student Log in','2016-10-12 04:25:18'),(225,'Rosalie mijares Log in.','User Log in','2016-10-12 04:25:35'),(226,'Rosalie mijares Create User [].','User Create User','2016-10-12 04:28:11'),(227,'Rosalie mijares Log out.','User log out','2016-10-12 04:28:48'),(228,'chalie marallag Log in.','Student Log in','2016-10-12 04:29:04'),(229,'mia rose Log in.','User Log in','2016-10-12 15:52:39'),(230,'mia rose Log in.','User Log in','2016-10-12 15:55:33'),(231,'mia rose Create User [admin002].','User Create User','2016-10-12 15:59:33'),(232,'mia rose Create User [admin001].','User Create User','2016-10-12 16:03:16'),(233,'mia rose Create User [admin001].','User Create User','2016-10-12 16:14:18'),(234,'mia rose Log in.','User Log in','2016-10-13 06:48:09'),(235,'mia rose Log in.','User Log in','2016-10-17 13:07:16'),(236,'sam nicole Log in.','Student Log in','2016-11-21 19:04:13'),(237,'chalie marallag Log in.','Student Log in','2016-11-21 19:04:21'),(238,'aDad asdaS Log in.','Student Log in','2016-11-21 19:04:28'),(239,'mia rose Log in.','User Log in','2016-11-21 19:04:58'),(240,'mia rose Log out.','User log out','2016-11-21 19:08:28'),(241,'Rosalie mijares Log in.','User Log in','2016-11-21 19:08:41'),(242,'Rosalie mijares Create User [].','User Create User','2016-11-21 19:10:24'),(243,'Rosalie mijares Log out.','User log out','2016-11-21 19:10:45'),(244,'mia rose Log in.','User Log in','2016-11-30 07:04:05'),(245,'mia rose Log out.','User log out','2017-01-02 21:40:54'),(246,'mia rose Log in.','User Log in','2017-01-02 21:41:18'),(247,'mia rose Log in.','User Log in','2017-01-02 22:57:02'),(248,'mia rose Log in.','User Log in','2017-01-03 17:41:14'),(249,'mia rose Added new Section New Section.','Add Section','2017-01-03 17:44:43'),(250,'mia rose Log in.','User Log in','2017-01-03 18:22:09'),(251,'mia rose Create User [].','User Create User','2017-01-03 18:23:53'),(252,'mia rose Added new Lesson lesson 1.','Add Lesson','2017-01-03 19:45:08'),(253,'mia rose Added new Lesson Hedgehog Jupiter.','Add Lesson','2017-01-03 20:22:27'),(254,'mia rose Create User [foobar].','User Create User','2017-01-03 20:43:47'),(255,'mia rose Log in.','User Log in','2017-01-07 15:39:13'),(256,'mia rose Log in.','User Log in','2017-01-07 20:46:57'),(257,'mia rose Log in.','User Log in','2017-01-19 00:55:29'),(258,'mia rose Log in.','User Log in','2017-01-23 22:24:30'),(259,'sam nicole Log in.','Student Log in','2017-01-23 23:13:21'),(260,'mia rose Log out.','User log out','2017-01-23 23:16:12'),(261,'Rosalie mijares Log in.','User Log in','2017-01-23 23:16:34'),(262,'Rosalie mijares Create User [].','User Create User','2017-01-24 01:21:27'),(263,'Rosalie mijares Create User [].','User Create User','2017-01-24 01:22:11'),(264,'Rosalie mijares Create User [].','User Create User','2017-01-24 01:22:27'),(265,'Bawang Boy Log in.','Student Log in','2017-01-24 01:40:59'),(266,'chalie marallag Log in.','Student Log in','2017-01-24 01:41:44'),(267,'egg egg Log in.','Student Log in','2017-01-24 01:44:52'),(268,'egg egg Log in.','Student Log in','2017-01-24 01:45:58'),(269,'egg egg Log in.','Student Log in','2017-01-24 01:47:08'),(270,'egg egg Log in.','Student Log in','2017-01-24 01:47:22'),(271,'Rosalie mijares Added new Lesson Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit..','Add Lesson','2017-01-24 01:49:13'),(272,'Rosalie mijares Updated Lesson Proin Eget Tortor Risus. Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit..','Update Lesson','2017-01-24 01:49:42'),(273,'Bawang Boy Log in.','Student Log in','2017-01-24 01:50:52'),(274,'Bawang Boy Log in.','Student Log in','2017-01-24 01:51:02'),(275,'Bawang Boy Log in.','Student Log in','2017-01-24 01:53:10'),(276,'sam nicole Log in.','Student Log in','2017-01-27 22:57:29'),(277,'egg egg Log in.','Student Log in','2017-01-27 23:02:37'),(278,'sam nicole Log in.','Student Log in','2017-01-27 23:06:04'),(279,'mia rose Log in.','User Log in','2017-01-27 23:10:11'),(280,'mia rose Added new Lesson Jumper.','Add Lesson','2017-01-27 23:10:40'),(281,'mia rose Added .','Add Lesson Content','2017-01-27 23:53:43'),(282,'mia rose Added .','Add Lesson Content','2017-01-27 23:53:56'),(283,'mia rose Added .','Add Lesson Content','2017-01-27 23:54:14'),(284,'mia rose Added .','Add Lesson Content','2017-01-27 23:54:31'),(285,'mia rose Added .','Add Lesson Content','2017-01-27 23:54:49'),(286,'mia rose Updated Lesson Lesson 1.','Update Lesson','2017-01-27 23:57:07'),(287,'mia rose Updated Lesson Jumper.','Update Lesson','2017-01-27 23:57:29'),(288,'sam nicole Log in.','Student Log in','2017-01-28 00:00:01'),(289,'egg egg Log in.','Student Log in','2017-01-28 00:00:04'),(290,'sam nicole Log in.','Student Log in','2017-01-28 00:00:17'),(291,'mia rose Log in.','User Log in','2017-01-28 00:40:28'),(292,'sam nicole Log in.','Student Log in','2017-01-28 00:44:43'),(293,'sam nicole Log in.','Student Log in','2017-01-28 00:45:18'),(294,'sam nicole Log in.','Student Log in','2017-01-28 00:52:33'),(295,'egg egg Log in.','Student Log in','2017-01-28 00:52:37'),(296,'sam nicole Log in.','Student Log in','2017-01-28 00:52:44'),(297,'mia rose Log in.','User Log in','2017-01-28 01:35:00'),(298,'mia rose Log in.','User Log in','2017-01-28 02:21:22'),(299,'mia rose Log in.','User Log in','2017-01-28 15:03:46'),(300,'mia rose Log in.','User Log in','2017-01-28 17:33:03'),(301,'mia rose Log in.','User Log in','2017-01-28 19:15:24'),(302,'mia rose Log out.','User log out','2017-01-28 20:18:27'),(303,'diana mundo Log in.','User Log in','2017-01-28 20:19:19'),(304,'diana mundo Log in.','User Log in','2017-01-29 21:19:02'),(305,'diana mundo Added new Lesson Hedgehog Jupiter 2.','Add Lesson','2017-01-29 21:30:36'),(306,'diana mundo Updated Lesson Hedgehog Jupiter 2.','Update Lesson','2017-01-29 21:39:25'),(307,'diana mundo Added .','Add Lesson Content','2017-01-29 21:40:21'),(308,'diana mundo Added .','Add Lesson Content','2017-01-29 21:40:34'),(309,'diana mundo Create User [].','User Create User','2017-01-29 21:42:18'),(310,'diana mundo Added new Section SECT.','Add Section','2017-01-29 23:37:10'),(311,'diana mundo Added new Section Developer.','Add Section','2017-01-29 23:37:52'),(312,'diana mundo Log in.','User Log in','2017-02-05 13:24:05'),(313,'diana mundo Log out.','User log out','2017-02-05 13:24:26'),(314,'Sam Nicole Log in.','Student Log in','2017-02-05 13:24:40'),(315,'Sam Nicole Log in.','Student Log in','2017-02-05 13:25:22'),(316,'Sam Nicole Log in.','Student Log in','2017-02-05 14:11:11'),(317,'Sam Nicole Log in.','Student Log in','2017-02-05 15:21:23'),(318,'Sam Nicole Log in.','Student Log in','2017-02-05 15:21:23'),(319,'Sam Nicole Log in.','Student Log in','2017-02-05 15:24:08'),(320,'Sam Nicole Log in.','Student Log in','2017-02-05 15:24:08'),(321,'diana mundo Log in.','User Log in','2017-02-05 15:32:18'),(322,'diana mundo Added new Lesson LESSON TEST BLABLA.','Add Lesson','2017-02-05 15:33:15'),(323,'diana mundo Added .','Add Lesson Content','2017-02-05 15:34:43'),(324,'diana mundo Added .','Add Lesson Content','2017-02-05 15:34:58'),(325,'diana mundo Added .','Add Lesson Content','2017-02-05 15:35:03'),(326,'diana mundo Added .','Add Lesson Content','2017-02-05 15:41:18'),(327,'JM Test Log in.','Student Log in','2017-02-05 15:44:06'),(328,'mia rose Log in.','User Log in','2017-02-05 15:52:23'),(329,'diana mundo Log in.','User Log in','2017-02-05 17:12:58'),(330,'JM Test Log in.','Student Log in','2017-02-05 18:00:31'),(331,'diana mundo Log in.','User Log in','2017-02-05 21:09:29'),(332,'Fname Lname Log in.','User Log in','2017-02-05 21:17:09'),(333,'Fname Lname Log in.','User Log in','2017-02-05 21:43:55'),(334,'Fname Lname Log in.','User Log in','2017-02-05 22:22:13'),(335,'Fname Lname Log in.','User Log in','2017-02-05 23:56:42'),(336,'Fname Lname Log in.','User Log in','2017-02-06 00:57:33'),(337,'mia rose Log in.','User Log in','2017-02-07 23:25:14'),(338,'mia rose Create User [sdsfdssddf].','User Create User','2017-02-07 23:26:37'),(339,'mia rose Create User [ fhfghfghf].','User Create User','2017-02-08 00:28:07'),(340,'mia rose Create User [ fhfghfghf1].','User Create User','2017-02-08 00:31:47'),(341,'mia rose Create User [ fhfghfghf1d].','User Create User','2017-02-08 00:32:24'),(342,'mia rose Log out.','User log out','2017-02-08 00:33:28'),(343,'diana mundo Log in.','User Log in','2017-02-08 00:34:03'),(344,'diana mundo Log out.','User log out','2017-02-08 00:37:59'),(345,'mia rose Log in.','User Log in','2017-02-08 00:38:07'),(346,'mia rose Added new Lesson DOODOO BIRD.','Add Lesson','2017-02-08 00:40:23'),(347,'mia rose Log out.','User log out','2017-02-08 00:46:44'),(348,'diana mundo Log in.','User Log in','2017-02-08 00:46:50'),(349,'Sam Nicole Log in.','Student Log in','2017-02-08 01:27:09'),(350,'Untouchable Queen Log in.','Student Log in','2017-02-08 01:27:12'),(351,'JM Test Log in.','Student Log in','2017-02-08 01:27:59'),(352,'diana mundo Log in.','User Log in','2017-02-08 02:56:39'),(353,'diana mundo Log in.','User Log in','2017-02-08 22:41:05'),(354,'diana mundo Log in.','User Log in','2017-02-09 21:39:15'),(355,'diana mundo Log in.','User Log in','2017-02-12 20:15:02'),(356,'diana mundo Added new Lesson lesson 311abc.','Add Lesson','2017-02-12 20:15:50'),(357,'diana mundo Log in.','User Log in','2017-02-12 22:44:56'),(358,'diana mundo Log in.','User Log in','2017-02-12 23:45:39'),(359,'diana mundo Log in.','User Log in','2017-02-13 22:47:23'),(360,'Sam Nicole Log in.','Student Log in','2017-02-13 22:54:42'),(361,'diana mundo Added new Section MASTER SECTION.','Add Section','2017-02-13 22:55:04'),(362,'Erika Marmol Log in.','Student Log in','2017-02-13 23:02:51'),(363,'diana mundo Added new Lesson IBAT IBANG KULAY.','Add Lesson','2017-02-13 23:09:26'),(364,'diana mundo Added new Lesson ANG ALAMAT NG PINYA.','Add Lesson','2017-02-13 23:16:22'),(365,'diana mundo Log out.','User log out','2017-02-13 23:18:00'),(366,'mia rose Log in.','User Log in','2017-02-13 23:18:11'),(367,'mia rose Log out.','User log out','2017-02-13 23:19:36'),(368,'diana mundo Log in.','User Log in','2017-02-13 23:19:43'),(369,'diana mundo Added new Lesson PAGAARAL.','Add Lesson','2017-02-13 23:23:47'),(370,'diana mundo Added new Lesson Hedgehog Jupiter 123.','Add Lesson','2017-02-13 23:27:47'),(371,'diana mundo Added .','Add Lesson Content','2017-02-13 23:31:18'),(372,'diana mundo Added .','Add Lesson Content','2017-02-13 23:31:23'),(373,'diana mundo Added .','Add Lesson Content','2017-02-13 23:31:27'),(374,'diana mundo Added .','Add Lesson Content','2017-02-13 23:31:35'),(375,'diana mundo Added sadasdasd.','Add Quiz','2017-02-13 23:37:27'),(376,'diana mundo Added Jumper.','Add Quiz','2017-02-13 23:38:08'),(377,'diana mundo Added .','Add Lesson Content','2017-02-13 23:43:32'),(378,'diana mundo Added .','Add Lesson Content','2017-02-13 23:43:43'),(379,'diana mundo Added .','Add Lesson Content','2017-02-13 23:43:53'),(380,'diana mundo Added .','Add Lesson Content','2017-02-13 23:46:16'),(381,'diana mundo Added .','Add Lesson Content','2017-02-13 23:55:00'),(382,'diana mundo Added .','Add Lesson Content','2017-02-13 23:57:03'),(383,'diana mundo Added .','Add Lesson Content','2017-02-14 00:03:51'),(384,'diana mundo Added .','Add Lesson Content','2017-02-14 00:04:27'),(385,'diana mundo Added .','Add Lesson Content','2017-02-14 00:05:02'),(386,'diana mundo Added .','Add Lesson Content','2017-02-14 00:05:39'),(387,'diana mundo Added .','Add Lesson Content','2017-02-14 00:07:01'),(388,'diana mundo Added .','Add Lesson Content','2017-02-14 00:07:09'),(389,'diana mundo Added .','Add Lesson Content','2017-02-14 00:07:28'),(390,'diana mundo Added .','Add Lesson Content','2017-02-14 00:08:16'),(391,'diana mundo Added .','Add Lesson Content','2017-02-14 00:08:27'),(392,'diana mundo Added .','Add Lesson Content','2017-02-14 00:10:47'),(393,'diana mundo Added .','Add Lesson Content','2017-02-14 00:10:55'),(394,'diana mundo Added .','Add Lesson Content','2017-02-14 00:11:31'),(395,'Erika Marmol Log in.','Student Log in','2017-02-14 01:27:15'),(396,'diana mundo Log out.','User log out','2017-02-14 02:31:06'),(397,'diana mundo Log in.','User Log in','2017-02-15 00:51:58'),(398,'diana mundo Log in.','User Log in','2017-02-15 02:11:27'),(399,'Erika Marmol Log in.','Student Log in','2017-02-15 02:14:32'),(400,'diana mundo Added .','Add Lesson Content','2017-02-15 02:16:42'),(401,'diana mundo Added .','Add Lesson Content','2017-02-15 02:16:51'),(402,'Erika Marmol Log in.','Student Log in','2017-02-15 02:55:40'),(403,'diana mundo Log in.','User Log in','2017-02-15 04:30:11'),(404,'diana mundo Log in.','User Log in','2017-02-16 01:40:53'),(405,'diana mundo Added new Lesson FIRST QUARTER LESSON 1.','Add Lesson','2017-02-16 02:02:37'),(406,'diana mundo Log in.','User Log in','2017-02-16 02:58:24'),(407,'diana mundo Log out.','User log out','2017-02-16 06:06:35'),(408,'Lina Inverse Log in.','User Log in','2017-02-16 06:07:11'),(409,'Lina Inverse Log in.','User Log in','2017-02-16 21:32:55'),(410,'Lina Inverse Log in.','User Log in','2017-02-16 23:46:30'),(411,'Lina Inverse Log in.','User Log in','2017-02-17 01:32:01'),(412,'diana mundo Log in.','User Log in','2017-02-17 02:54:56'),(413,'diana mundo Log in.','User Log in','2017-02-17 03:48:43');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (1,'ikaw','ikaw','Fname','Lname','Mname','',''),(2,'sofas','pass','sofas','ako',NULL,NULL,NULL),(3,'linamonna','pass','Lina','Inverse',NULL,'inverse@gmail.com','09151231233'),(4,'mine','pass','mine','daa',NULL,'mine@gmail.com','09159023843'),(5,'sadsadsad','asdasd','Bawang','Queen',NULL,'asdasd@dasdasdsa.co','12312321312');
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parentstud`
--

DROP TABLE IF EXISTS `parentstud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parentstud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parentstud`
--

LOCK TABLES `parentstud` WRITE;
/*!40000 ALTER TABLE `parentstud` DISABLE KEYS */;
INSERT INTO `parentstud` VALUES (15,3,26),(12,3,9),(11,2,9),(10,1,9),(14,2,26),(13,1,26),(18,1,27),(17,5,26),(16,4,26),(19,2,27),(20,3,27),(21,1,28),(22,2,28),(23,3,28),(24,3,30),(25,3,31),(26,3,32),(27,3,33),(28,3,34),(29,2,35),(30,2,36),(31,3,37),(32,3,38),(33,5,39);
/*!40000 ALTER TABLE `parentstud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_category_id` int(10) unsigned NOT NULL DEFAULT '1',
  `quiz_master_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,1,1,29,'123123','09af0a22aa955f7d834b029cb992e4ac.mp3','2','salita','daaaa.png','babsbas.png','o.png','u.png'),(2,1,1,29,'123123','aa2af76685c32372da2d07323fed55a5.mp3','2','salita','daaaa.png','babsbas.png','o.png','u.png'),(3,1,1,29,'ffggfdg','f7c20215145fd86bccdf2b0988bd7b68.mp3','3','salita','daaaa.png','babsbas.png','o.png','u.png'),(4,1,2,29,'123123','30ed6745c7d2ee76ee9faf43e536f307.mp3','2','salita','daaaa.png','babsbas.png','o.png','u.png'),(5,1,2,29,'123123','6cc81c0d7f0a82ed71b2f91b605dba8b.mp3','2','salita','daaaa.png','babsbas.png','o.png','u.png'),(6,1,2,29,'ffggfdg','613f32dd314d36a8b7c77063617fc370.mp3','3','salita','daaaa.png','babsbas.png','o.png','u.png');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_categories`
--

DROP TABLE IF EXISTS `quiz_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_categories`
--

LOCK TABLES `quiz_categories` WRITE;
/*!40000 ALTER TABLE `quiz_categories` DISABLE KEYS */;
INSERT INTO `quiz_categories` VALUES (1,'Multiple Choice','Multiple choice is a form of an objective assessment in which respondents are asked to select the only correct answer out of the choices from a list.','folder.php','2017-01-07 10:04:46','2017-01-07 08:05:58'),(3,'True or False','Type have only two possible answers. Most commonly this is \'True\' and \'False\', but could also be \'Yes\' and \'No\', \'Agree\' and \'Disagree\', or any other suitable pair of mutually-exclusive responses. True or False questions must be direct questions, and the only possible answers must be the two options given. For example, a question of \"What is your favorite color\" with possible answers of \"Red\" and \"Blue\" would be unsuitable, as there are other possible favorite colors other than red and blue.','true_and_false/index.php','2017-01-07 10:01:14','2017-01-07 08:05:58');
/*!40000 ALTER TABLE `quiz_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_master`
--

DROP TABLE IF EXISTS `quiz_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_master`
--

LOCK TABLES `quiz_master` WRITE;
/*!40000 ALTER TABLE `quiz_master` DISABLE KEYS */;
INSERT INTO `quiz_master` VALUES (1,29,39),(2,29,39);
/*!40000 ALTER TABLE `quiz_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_result`
--

DROP TABLE IF EXISTS `quiz_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `total_number` varchar(100) NOT NULL,
  `quiz_date` datetime NOT NULL,
  `quiz_status` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(255) DEFAULT NULL,
  `current_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_result`
--

LOCK TABLES `quiz_result` WRITE;
/*!40000 ALTER TABLE `quiz_result` DISABLE KEYS */;
INSERT INTO `quiz_result` VALUES (18,29,6,37,'0','6','2017-02-15 03:54:30',0,'2017-02-14 19:54:30','Needs Improvement',2),(19,29,1,37,'0','6','2017-02-15 03:54:55',0,'2017-02-14 19:54:55','Needs Improvement',3),(20,29,2,37,'0','6','2017-02-15 03:56:22',0,'2017-02-14 19:56:22','Needs Improvement',3),(21,29,4,37,'1','6','2017-02-15 03:56:24',0,'2017-02-14 19:56:24','Needs Improvement',4),(22,29,3,37,'3','6','2017-02-15 03:56:29',0,'2017-02-14 19:56:29','Very good',6),(23,29,1,37,'3','6','2017-02-15 03:58:11',0,'2017-02-14 19:58:11','Very good',7),(24,29,3,37,'2','6','2017-02-15 04:16:58',0,'2017-02-14 20:16:58','good',7),(25,29,5,37,'1','6','2017-02-15 04:21:28',0,'2017-02-14 20:21:28','Needs Improvement',6),(26,29,4,37,'1','6','2017-02-15 04:21:30',0,'2017-02-14 20:21:30','Needs Improvement',7),(27,29,3,37,'2','6','2017-02-15 04:25:43',0,'2017-02-14 20:25:43','good',7);
/*!40000 ALTER TABLE `quiz_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_take`
--

DROP TABLE IF EXISTS `quiz_take`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_take` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_master_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_take`
--

LOCK TABLES `quiz_take` WRITE;
/*!40000 ALTER TABLE `quiz_take` DISABLE KEYS */;
INSERT INTO `quiz_take` VALUES (1,1,29,37,'5',6,'2017-02-14 19:56:20'),(2,1,29,37,'3',6,'2017-02-14 20:16:46'),(3,2,29,37,'2',6,'2017-02-14 20:21:18'),(4,1,29,37,'3',6,'2017-02-14 20:25:29'),(5,2,29,37,'4',6,'2017-02-14 20:21:18'),(6,2,29,37,'6',6,'2017-02-14 20:21:18');
/*!40000 ALTER TABLE `quiz_take` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_true_or_false`
--

DROP TABLE IF EXISTS `quiz_true_or_false`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_true_or_false` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` int(10) unsigned NOT NULL,
  `question` varchar(100) NOT NULL,
  `truth_text` varchar(10) NOT NULL,
  `false_text` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `background` varchar(255) NOT NULL,
  `true_image` varchar(255) NOT NULL,
  `false_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_true_or_false`
--

LOCK TABLES `quiz_true_or_false` WRITE;
/*!40000 ALTER TABLE `quiz_true_or_false` DISABLE KEYS */;
INSERT INTO `quiz_true_or_false` VALUES (46,35,'asdsa','asdasd','asdsad','true','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(47,35,'sdfsdf','asdasd','asdsad','false','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(48,35,'dfgfdg','asdasd','asdsad','false','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(49,35,'asdasd','asdasd','asdsad','true','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(50,35,'asdas','asdasd','asdsad','false','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(51,35,'ssfd','asdasd','asdsad','false','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(52,35,'asdasd','asdasd','asdsad','true','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(53,35,'sdasd','asdasd','asdsad','false','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(54,35,'asdsad','asdasd','asdsad','true','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(55,35,'asdasd','asdasd','asdsad','false','3b308b2352fc5e07247e4ea16da12d41.png','895f718896c224b77d60955f853b306f.png','df4d9c2cd3d80023c6546a95e4d314d0.png'),(56,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(57,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','false','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(58,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(59,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(60,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','false','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(61,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(62,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(63,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(64,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(65,39,'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque ','true','false','true','889e33327819b770c29b268561da34a4.jpeg','20035cdfa7cf6e4b01c83e4e1486f6c7.jpg','0a4f61845d6dec0e1ce2613c9b40530f.jpg'),(66,46,'asdsa','true','false','true','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(67,46,'dfgdfg','true','false','false','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(68,46,'fghgfh','true','false','false','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(69,46,'ghjghj','true','false','true','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(70,46,'hjkhjk','true','false','false','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(71,46,'jkljkl','true','false','true','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(72,46,'aasdasd','true','false','true','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(73,46,'asdsfdsf','true','false','true','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(74,46,'dfgdfgfdg','true','false','false','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg'),(75,46,'ghjhgj','true','false','false','dda197529d2fbd9bf0530f37e7cabee7.','74f02701958d60ba84ea60bc37778852.jpg','82612e1033a86a6e9c0a20c9db578632.jpeg');
/*!40000 ALTER TABLE `quiz_true_or_false` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'rose',39),(2,'jehova',39),(3,'ava',39),(4,'New Section',39),(5,'SECT',39),(6,'Developer',39),(7,'MASTER SECTION',39);
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `story`
--

DROP TABLE IF EXISTS `story`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `story` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `story`
--

LOCK TABLES `story` WRITE;
/*!40000 ALTER TABLE `story` DISABLE KEYS */;
INSERT INTO `story` VALUES (1,39,'Alamat Ng Daliri','Sad','ANG ALAMAT NG MGA DALIRI.mp4',1,'2016-10-03 10:23:24'),(2,41,'Good','Quiz 1','IKAW BA\'Y MABUTING TAO-.mp4',1,'2016-10-04 06:36:59'),(3,1,'Hedgehog Jupiter','Jumper','IKAW BA\'Y MABUTING TAO- (copy).mp4',1,'2017-01-27 16:44:19');
/*!40000 ALTER TABLE `story` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lrn` varchar(13) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teacher` int(11) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sy` year(4) DEFAULT NULL,
  `parent_last_name` varchar(255) DEFAULT NULL,
  `parent_first_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (9,'111111111111','Sam','','Nicole',1,'0000-00-00 00:00:00',1,'rose',1,'jaskdjsa',2016,'nicole','nica'),(10,'222222222222','chalie','','marallag',1,'0000-00-00 00:00:00',42,'ava',3,'adhajk',2016,'marallag','charles'),(11,'333333333333','aDad','','asdaS',1,'0000-00-00 00:00:00',42,'ava',3,'asASa',2015,'ASAs','aSa'),(12,'455555555555','sadasda','','sdasd',1,'0000-00-00 00:00:00',42,'ava',3,'ADASDA',2014,'ASAs','ASAs'),(13,'121211111111','dad','','dsadas',1,'0000-00-00 00:00:00',42,'ava',3,'asdsad',2009,'dfdfds','asdasd'),(14,'666666666666','nica','','meneses',1,'0000-00-00 00:00:00',42,'ava',3,'asd',2015,'meneses','nila'),(15,'999999999999','add','','daa',1,'0000-00-00 00:00:00',42,'ava',3,'asas',2016,'daa','mine'),(16,'555555555555','dw','','ewe',1,'0000-00-00 00:00:00',42,'ava',3,'asdas',2016,'ewe','sa'),(24,'123123123123','egg','egg','egg',1,'0000-00-00 00:00:00',1,'New Section',4,'eee',2017,'aasadasd','asdasd'),(25,'123213543545','Untouchable','my','Queen',1,'0000-00-00 00:00:00',42,'ava',3,'asdasdsadasdasd',2017,'asdasdas','asdasd'),(26,'435454565765','Bawang','my','Boy',1,'0000-00-00 00:00:00',42,'rose',1,'gfdgfd',2017,'sdfsdfdsf','asdasd'),(27,'1254354657567','JM','asdasd','Senosa',1,'0000-00-00 00:00:00',42,'ava',3,'',0000,'',''),(28,'1111111112344','JM','asdasd','Senosa',1,'0000-00-00 00:00:00',42,'ava',3,'',2017,'',''),(29,'551654812312','JM','my','Test',1,'0000-00-00 00:00:00',39,'jehova',2,'123213',2017,'wqewqe','wqeqwe'),(30,'1231232143242','asdsadsa','sdfdsf','dfgdfg',1,'0000-00-00 00:00:00',0,'jehova',2,'',2017,'',''),(31,'5555552334354','Egg','Student','dfgdfg',1,'0000-00-00 00:00:00',0,'jehova',2,'',2017,'',''),(32,'5555544234354','Egg','Student','dfgdfg',1,'0000-00-00 00:00:00',0,'jehova',2,'',2017,'',''),(33,'5522334455667','Egg','Student','dfgdfg',1,'0000-00-00 00:00:00',0,'jehova',2,'',2017,'',''),(34,'0345934455667','Egg','Student','dfgdfg',1,'0000-00-00 00:00:00',0,'jehova',2,'',2017,'',''),(35,'1212312123123','sadasdasdas','dfdsfsdf','dfgfdgdf',1,'2017-02-12 15:46:12',NULL,'rose',1,NULL,2017,NULL,NULL),(36,'1212312123123','ET','dfdsfsdf','dfgfdgdf',1,'2017-02-12 15:47:15',NULL,'rose',1,NULL,2017,NULL,NULL),(39,'345435556657','sadsad','sdfdsf','dfgdfg',1,'2017-02-16 18:55:15',39,'rose',1,NULL,2017,NULL,NULL),(37,'091234129382','Erika','Calipes','Marmol',1,'2017-02-13 15:05:38',39,'MASTER SECTION',7,NULL,2016,NULL,NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'admin','admin',1,'0000-00-00 00:00:00'),(2,'teacher','teacher',1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fromtime` time DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totime` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','pass','mia','','rose','miarose@gmail.com','09422916120','sss',1,'00:00:00','2016-09-29 22:16:14','23:59:59'),(39,2,'diana','pass','diana','','mundo','diana@gmail.com','09282262875','tatalon',1,'00:00:00','0000-00-00 00:00:00','23:59:59'),(40,2,'again','pass','again','','again','pass@gmail.com','09464461156','pass',1,'00:00:00','0000-00-00 00:00:00','23:59:59'),(42,2,'rosalie','pass','Rosalie','','mijares','rosalie@gmail.com','09464456641','tatalon',1,'00:00:00','0000-00-00 00:00:00','23:59:59'),(48,1,'sdsfdssddf','sdsfdssddf','TET','te','af','sdsfdssddf@asd.com','123123123213','sdsfdssddf',1,'00:00:00','0000-00-00 00:00:00','00:00:00'),(47,1,'foobar','foobar','foo','my','bar','asdasd@dasdasdsa.co','111111111111','asd',1,'00:00:00','0000-00-00 00:00:00','23:59:59'),(49,1,' fhfghfghf','ghjghj',' asdasd',' sdfdsf',' dfgdfg','ghjghj@asdasd.com','134354354654','ghjghj',1,'00:00:00','0000-00-00 00:00:00','00:00:00'),(50,1,' fhfghfghf1','ghjghj1',' asdasd',' sdfdsf',' dfgdfg','ghjgh1j@asdasd.com','134354354654','ghjghj',1,'20:00:00','0000-00-00 00:00:00','00:00:00'),(51,1,' fhfghfghf1d','ghjghj1d',' asdasdd',' sdfdsfd',' dfgdfgd','ghjdgh1j@asddasd.com','1343543524654','ghjghjd',1,'08:00:00','0000-00-00 00:00:00','13:00:00'),(52,2,'admin2','pass','mia','','rose','miarose@gmail.com','09422916120','sss',1,'00:00:00','2016-09-29 22:16:14','23:59:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'eyelearn_db'
--

--
-- Dumping routines for database 'eyelearn_db'
--
/*!50003 DROP FUNCTION IF EXISTS `capitalize` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
-- DELIMITER ;;
-- CREATE DEFINER=`root`@`127.0.0.1` FUNCTION `capitalize`(s varchar(255)) RETURNS varchar(255) CHARSET latin1
-- BEGIN
--   declare c int;
--   declare x varchar(255);
--   declare y varchar(255);
--   declare z varchar(255);

--   set x = UPPER( SUBSTRING( s, 1, 1));
--   set y = SUBSTR( s, 2);
--   set c = instr( y, ' ');

--   while c > 0
--     do
--       set z = SUBSTR( y, 1, c);
--       set x = CONCAT( x, z);
--       set z = UPPER( SUBSTR( y, c+1, 1));
--       set x = CONCAT( x, z);
--       set y = SUBSTR( y, c+2);
--       set c = INSTR( y, ' ');     
--   end while;
--   set x = CONCAT(x, y);
--   return x;
-- END ;;
-- DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-17  4:37:35
