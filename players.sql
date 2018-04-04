-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: sswdassessment1
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

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
-- Current Database: `sswdassessment1`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sswdassessment1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sswdassessment1`;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `firstName` char(20) DEFAULT NULL,
  `lastName` char(20) DEFAULT NULL,
  `position` char(20) DEFAULT NULL,
  `nationality` char(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `debut` char(50) DEFAULT NULL,
  `starts` int(2) DEFAULT NULL,
  `subs` int(2) DEFAULT NULL,
  `goals` int(2) DEFAULT NULL,
  `headshot` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'Chris','Rodrigues','Midfielder','French','1996-02-06','Vs. Cabinteely FC 31/03/17',4,4,3,'images/chris-rodrigues.jpg'),(2,'Colm','Coss','Midfielder','Irish','1988-10-24','Vs. Shelbourne FC 08/07/16',19,1,2,'images/colm-coss.jpg'),(3,'Cormac','Raftery','Defender','Irish','1995-04-27','Vs. Waterford FC 05/08/16',18,1,1,'images/cormac-raftery.jpg'),(4,'David','Brookes','Defender','Irish','1994-07-20','Vs. Drogheda United 26/03/12',20,0,0,'images/david-brookes.jpg'),(5,'Dragos','Sfrijan','Midfielder','Romanian','1990-04-17','Vs. Waterford FC 25/02/17',16,1,3,'images/dragos-sfrijan.jpg'),(6,'Ethan','Keogh','Midfielder','Irish','1995-01-10','Vs. Waterford FC 22/06/12',9,8,2,'images/ethan-keogh.jpg'),(7,'Frederico','Hernandez','Defender','Portuguese','1993-08-08','Vs. Waterford FC 25/02/17',8,5,0,'images/frederico-hernandez.jpg'),(8,'Igors','Labuts','Goalkeeper','Latvian','1990-06-07','Vs. Waterford FC 25/02/17',22,0,0,'images/igors-labuts.jpg'),(9,'Jason','Lyons','Striker','Irish','1995-01-06','Vs. Shamrock Rovers 19/08/16',19,3,4,'images/jason-lyons.jpg'),(10,'Jason','Molloy','Midfielder','Irish','1988-09-22','Vs. Waterford FC 25/02/17',5,4,0,'images/jason-molloy.jpg'),(11,'Jose','Viegas','Midfielder','Portuguese','1992-04-10','Vs. Waterford FC 25/02/17',13,2,1,'images/jose-viegas.jpg'),(12,'Kirils','Grigorovs','Defender','Latvian','1992-10-19','Vs. Waterford FC 25/02/17',15,1,0,'images/kirils-grigorovs.jpg'),(13,'Niall','Scullion','Defender','Irish','1987-04-17','Vs. Limerick 37 12/04/08',18,0,0,'images/niall-scullion.jpg'),(14,'Walter','Invernizzi','Striker','Uruguayan','1981-04-02','Vs. Cobh Ramblers 18/03/17',11,0,4,'images/walter-invernizzi.jpg'),(15,'Conor','Barry','Striker','Irish','1995-09-02','Vs. Drogheda United 18/03/16',15,1,3,'images/conor-barry.jpg'),(16,'Ryan','Gaffey','Midfielder','Irish','1997-07-05','Vs. Cobh Ramblers 24/06/16',5,7,1,'images/ryan-gaffey.jpg'),(17,'Liam','McCartan','Defender','Irish','1997-07-18','Vs. Shelbourne FC 07/07/17',5,0,0,'images/liam-mccartan.jpg'),(18,'Sean','McGrane','Defender','Irish','1998-02-05','Vs. Cobh Ramblers 24/06/16',3,3,0,'images/sean-mcgrane.jpg'),(19,'Rob','Spelman','Midfielder','Irish','1997-09-01','Vs. Shelbourne FC 07/07/17',5,0,0,'images/rob-spelman.jpg');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-11 22:01:13
