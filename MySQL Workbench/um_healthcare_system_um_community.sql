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
-- Table structure for table `um_community`
--

DROP TABLE IF EXISTS `um_community`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `um_community` (
  `Um_Community_Id` int NOT NULL AUTO_INCREMENT,
  `UM_Community_Email` varchar(45) NOT NULL,
  `UM_Community_FullName` varchar(45) NOT NULL,
  `UM_Community_Phone` varchar(45) NOT NULL,
  `UM_Community_Gender` varchar(10) NOT NULL,
  `UM_Community_Birthdate` varchar(45) NOT NULL,
  `UM_Community_Address` varchar(100) NOT NULL,
  `UM_Community_Nationality` varchar(45) NOT NULL,
  `UM_Community_IC` varchar(20) NOT NULL,
  `UM_Community_Role` varchar(30) NOT NULL,
  `UM_Community_Password` varchar(50) NOT NULL,
  `UM_Community_Password_Confirmation` varchar(50) NOT NULL,
  PRIMARY KEY (`Um_Community_Id`),
  UNIQUE KEY `UM_Community_Email_UNIQUE` (`UM_Community_Email`),
  KEY `Email_idx` (`UM_Community_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `um_community`
--

LOCK TABLES `um_community` WRITE;
/*!40000 ALTER TABLE `um_community` DISABLE KEYS */;
INSERT INTO `um_community` VALUES (1,'Elma@gmail.com','Elma','0149894793','Female','2000-01-01','1147,TAMAN SERI KOTA,fffffffffffffffffffff','ma','90293301','University Of Malaya Student','ABC','ABC'),(9,'kx@gmail.com','TIEW KER XIN','0125241893','Female','2000-01-01','1147,TAMAN SERI KOTA,','JALAN KUALA KEDAH','90293302','University Of Malaya Student','ABC','ABC'),(13,'Jane@gmail.com','Jane','0123456789','Female','2000-01-01','123','123','90293303','University Of Malaya Student','ABC','ABC'),(14,'Jame@gmail.com','Jame','y27183','Male','2000-01-01','123','12','90293304','University Of Malaya Student','ABC','ABC'),(15,'123@gmail.com','123','0123456789','Female','2000-01-01','123','123','90293305','University Of Malaya Student','ABC','ABC'),(16,'1@gmail.com','1','010332','Female','2000-01-01','1312','132','90293306','University Of Malaya Student','ABC','ABC');
/*!40000 ALTER TABLE `um_community` ENABLE KEYS */;
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
