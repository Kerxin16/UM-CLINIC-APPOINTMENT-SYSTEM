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
-- Table structure for table `bmi`
--

DROP TABLE IF EXISTS `bmi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bmi` (
  `BMI_ID` int NOT NULL AUTO_INCREMENT,
  `BMI` varchar(45) NOT NULL,
  `HealthCheck_Email` varchar(45) NOT NULL,
  `HealthCheck_DateTime` varchar(45) NOT NULL,
  PRIMARY KEY (`BMI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmi`
--

LOCK TABLES `bmi` WRITE;
/*!40000 ALTER TABLE `bmi` DISABLE KEYS */;
INSERT INTO `bmi` VALUES (1,'22.66','Jane@gmail.com','2023-11-27 03:08:41pm'),(9,'23.44','Jane@gmail.com','2023-11-27 03:13:47pm'),(10,'21.88','Jane@gmail.com','2023-11-27 03:15:37pm'),(11,'26.56','Jane@gmail.com','2023-11-27 03:15:50pm'),(12,'26.56','Jane@gmail.com','2023-11-27 03:16:38pm'),(36,'27.34','Jane@gmail.com','2023-11-27 03:40:50pm'),(37,'17.97','Jane@gmail.com','2023-11-27 03:41:26pm'),(50,'19.56','Elma@gmail.com','2023-11-27 04:16:30pm'),(51,'22.66','Jane@gmail.com','2023-12-06 11:07:22am'),(52,'22.66','Jane@gmail.com','2023-12-06 11:23:10am'),(53,'22.66','Jane@gmail.com','2023-12-06 11:37:31am'),(54,'22.66','Jane@gmail.com','2023-12-06 11:47:53am'),(55,'23.44','Jane@gmail.com','2023-12-17 08:32:01pm'),(67,'22.66','Jane@gmail.com','2023-12-20 06:43:48pm'),(68,'22.66','Jane@gmail.com','2023-12-21 12:12:44pm'),(69,'23.44','Jane@gmail.com','2023-12-27 01:33:14pm'),(70,'22.66','Jane@gmail.com','2024-01-09 10:45:25am'),(71,'23.44','Jane@gmail.com','2024-01-09 10:47:28am'),(72,'21.88','Jane@gmail.com','2024-01-09 11:06:47am'),(73,'21.09','Jane@gmail.com','2024-01-09 11:20:36am'),(74,'21.09','Jane@gmail.com','2024-01-09 11:48:08am'),(76,'24.61','Jane@gmail.com','2024-01-14 09:53:33pm'),(77,'25.39','Jane@gmail.com','2024-01-14 09:54:03pm');
/*!40000 ALTER TABLE `bmi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-20 10:02:23
