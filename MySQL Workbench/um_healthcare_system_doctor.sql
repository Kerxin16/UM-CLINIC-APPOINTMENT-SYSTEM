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
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `doctor_id` int NOT NULL AUTO_INCREMENT,
  `Doctor_Name` varchar(45) NOT NULL,
  `Doctor_Email` varchar(45) NOT NULL,
  `Doctor_Phone` varchar(45) NOT NULL,
  `Doctor_Gender` varchar(10) NOT NULL,
  `Doctor_Password` varchar(50) NOT NULL,
  `Doctor_Password_Confirmation` varchar(50) NOT NULL,
  `Doctor_Age` int NOT NULL,
  `Doctor_Address` varchar(100) NOT NULL,
  `Doctor_Nationality` varchar(45) NOT NULL,
  `Doctor_IC` varchar(20) NOT NULL,
  `Doctor_Department` varchar(50) NOT NULL,
  `Doctor_Daily_Patient_Number` varchar(45) DEFAULT '20',
  `Doctor_Check_In_Status` varchar(100) DEFAULT 'Not Checked In',
  `Doctor_Check_In_DateTime` varchar(100) DEFAULT 'NULL',
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (1,'Doctor A','DoctorA@UMHealthCare.com.my','123','Male','ABC','ABC',56,'1,ABC','Malaysia','10684801','Medicine','5','Not Checked In','2024-01-15 11:27:06am'),(2,'Doctor B','DoctorB@UMHealthCare.com.my','123','Male','ABC','ABC',32,'1,ABC','Malaysia','10684802','Surgery','20','Not Checked In','2024-01-15 09:03:32am'),(3,'Doctor C','DoctorC@UMHealthCare.com.my','123','Male','ABC','ABC',36,'1,ABC','Malaysia','10684803','Orthopaedics Surgery','20','Not Checked In','NULL'),(4,'Doctor D','DoctorD@UMHealthCare.com.my','123','Male','ABC','ABC',43,'1,ABC','Malaysia','10684804','Paediatrics','22','Not Checked In','2024-01-14 10:56:12am'),(5,'Doctor E','DoctorE@UMHealthCare.com.my','123','Female','ABC','ABC',33,'1,ABC','Malaysia','10684805','Anaesthesiology','20','Not Checked In','NULL'),(6,'Doctor F','DoctorF@UMHealthCare.com.my','123','Male','ABC','ABC',28,'1,ABC','Malaysia','10684806','Obstetrics & Gynaecology','20','Not Checked In','NULL'),(7,'Doctor G','DoctorG@UMHealthCare.com.my','123','Male','ABC','ABC',46,'1,ABC','Malaysia','10684807','Otorhinolaryngology','20','Not Checked In','NULL'),(8,'Doctor H','DoctorH@UMHealthCare.com.my','123','Female','ABC','ABC',39,'1,ABC','Malaysia','10684808','Sports Medicine','20','Not Checked In','NULL'),(9,'Doctor I','DoctorI@UMHealthCare.com.my','123','Male','ABC','ABC',46,'1,ABC','Malaysia','10684809','Public Health','20','Not Checked In','NULL'),(10,'Doctor J','DoctorJ@UMHealthCare.com.my','123','Male','ABC','ABC',36,'1,ABC','Malaysia','10684810','Medical Microbiology','20','Not Checked In','NULL'),(11,'Doctor K','DoctorK@UMHealthCare.com.my','123','Female','ABC','ABC',26,'1,ABC','Malaysia','10684811','Medicine','20','Not Checked In','NULL');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-20 10:02:27
