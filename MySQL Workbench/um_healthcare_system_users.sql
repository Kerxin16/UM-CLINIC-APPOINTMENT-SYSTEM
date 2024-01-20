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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_last_seen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_IC` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'Admin A','StaffA@UMHealthCare.com.my','2024-01-20 09:04:16','123'),(6,'Doctor A','DoctorA@UMHealthCare.com.my','2024-01-20 09:04:35','10684801'),(7,'Elma','Elma@gmail.com','2024-01-11 18:33:22','90293301'),(8,'TIEW KER XIN','kx@gmail.com','2024-01-09 16:46:37','90293302'),(9,'Jane','Jane@gmail.com','2024-01-20 09:03:27','90293303'),(10,'Jame','Jame@gmail.com','2023-10-04 16:42:22','90293304'),(11,'123','123@gmail.com','2023-10-04 16:42:41','90293305'),(12,'1','1@gmail.com','2023-10-04 16:42:58','90293306'),(27,'Doctor B','DoctorB@UMHealthCare.com.my','2024-01-15 09:09:21','10684802'),(28,'Doctor C','DoctorC@UMHealthCare.com.my','2023-10-15 19:41:45','10684803'),(29,'Doctor D','DoctorD@UMHealthCare.com.my','2024-01-14 12:39:37','10684804'),(30,'Doctor E','DoctorE@UMHealthCare.com.my','2023-10-05 05:34:59','10684805'),(31,'Doctor F','DoctorF@UMHealthCare.com.my','2023-10-05 05:35:11','10684806'),(32,'Doctor G','DoctorG@UMHealthCare.com.my','2023-10-05 05:35:33','10684807'),(33,'Doctor H','DoctorH@UMHealthCare.com.my','2023-10-05 05:35:45','10684808'),(34,'Doctor I','DoctorI@UMHealthCare.com.my','2023-10-05 05:35:57','10684809'),(35,'Doctor J','DoctorJ@UMHealthCare.com.my','2023-10-05 05:36:07','10684810'),(36,'Doctor K','DoctorK@UMHealthCare.com.my','2024-01-09 19:19:40','10684811'),(37,'test','test@gmail.com','2024-01-14 12:27:57','1435465765766');
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

-- Dump completed on 2024-01-20 10:02:24
