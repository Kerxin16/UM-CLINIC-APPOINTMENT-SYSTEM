CREATE DATABASE  IF NOT EXISTS `um_healthcare_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `um_healthcare_system`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: um_healthcare_system
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `heartrate`
--

DROP TABLE IF EXISTS `heartrate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `heartrate` (
  `heartRateID` int NOT NULL AUTO_INCREMENT,
  `Normal_Heart_Rate` varchar(45) NOT NULL,
  `HealthCheck_Email` varchar(45) NOT NULL,
  `HealthCheck_DateTime` varchar(45) NOT NULL,
  PRIMARY KEY (`heartRateID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heartrate`
--

LOCK TABLES `heartrate` WRITE;
/*!40000 ALTER TABLE `heartrate` DISABLE KEYS */;
INSERT INTO `heartrate` VALUES (1,'99','Jane@gmail.com','2023-11-28 10:24:03am'),(2,'99','Jane@gmail.com','2023-11-28 10:32:54am'),(3,'99','Jane@gmail.com','2023-11-28 10:33:27am'),(4,'55','Jane@gmail.com','2023-11-28 10:34:10am'),(5,'110','Jane@gmail.com','2023-12-17 08:46:34pm'),(6,'110','Jane@gmail.com','2023-12-17 08:47:24pm'),(8,'100','Jane@gmail.com','2024-01-14 09:55:26pm'),(9,'100','Jane@gmail.com','2024-01-19 01:03:31pm');
/*!40000 ALTER TABLE `heartrate` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-20 10:02:25
