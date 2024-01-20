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
-- Table structure for table `clinic_appointment`
--

DROP TABLE IF EXISTS `clinic_appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clinic_appointment` (
  `clinic_appointment_id` int NOT NULL AUTO_INCREMENT,
  `Clinic_Appointment_Name` varchar(100) NOT NULL,
  `Clinic_Appointment_Email` varchar(45) NOT NULL,
  `Clinic_Appointment_Identity_Credential` varchar(30) NOT NULL,
  `Clinic_Appointment_Phone` varchar(45) NOT NULL,
  `Clinic_Appointment_Speciality` varchar(45) NOT NULL,
  `Clinic_Appointment_Case_Type` varchar(45) DEFAULT NULL,
  `Clinic_Appointment_Reason_Of_Appointment` longtext,
  `Clinic_Appointment_Date` varchar(45) NOT NULL,
  `Clinic_Appointment_Time` varchar(45) DEFAULT NULL,
  `Clinic_Appointment_Acceptance` varchar(45) DEFAULT 'Pending MS Action',
  `Patient_CheckIn_Status` varchar(45) DEFAULT 'Pending MS Action',
  `Patient_CheckIn_Time` varchar(45) DEFAULT 'NULL',
  `Room_Assignation_Status` varchar(45) DEFAULT 'NULL',
  `Doctor_Diagnosis_Status` varchar(10) DEFAULT 'WAITING',
  `Doctor_Patient_View` varchar(10) DEFAULT 'Open',
  `Doctor_Call_Patient` varchar(50) DEFAULT 'Pending Doctor Action',
  `Room_Assignation_Doctor_ID` varchar(10) DEFAULT 'NULL',
  `Patient_Gender` varchar(45) NOT NULL,
  `Patient_Birthdate` varchar(45) NOT NULL,
  `Clinic_Appointment_Selected_Doctor` varchar(45) NOT NULL DEFAULT '-',
  PRIMARY KEY (`clinic_appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinic_appointment`
--

LOCK TABLES `clinic_appointment` WRITE;
/*!40000 ALTER TABLE `clinic_appointment` DISABLE KEYS */;
INSERT INTO `clinic_appointment` VALUES (97,'Jane','Jane@gmail.com','90293303','0123456789','Surgery','New Case','testing','2023-11-21','0900 hours - 1000 hours','ACCEPTED','Checked_In','10:01:07am','ASSIGNED','DONE','Open','Pending Doctor Action','2','Female','2000-01-01','-'),(100,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','12','2023-09-01','0900 hours - 1000 hours','ACCEPTED','Checked_In','04:39:04am','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','-'),(101,'123','123@gmail.com','90293305','0123456789','Medicine','New Case','dvd','2023-09-01','0900 hours - 1000 hours','ACCEPTED','Checked_In','04:43:26am','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','-'),(102,'Jane','Jane@gmail.com','90293303','0123456789','Surgery','New Case','dfd','2023-09-02','1000 hours - 1100 hours','ACCEPTED','Checked_In','06:19:28am','ASSIGNED','DONE','Open','Pending Doctor Action','2','Female','2000-01-01','-'),(103,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','nn','2023-09-03','1000 hours - 1100 hours','ACCEPTED','Checked_In','09:55:26am','ASSIGNED','DONE','Open','Pending Doctor Action','1','Female','2000-01-01','-'),(104,'123','123@gmail.com','90293305','0123456789','Medicine','New Case','re','2023-10-14','1000 hours - 1100 hours','ACCEPTED','Checked_In','04:51:09pm','ASSIGNED','DONE','Open','Pending Doctor Action','11','Female','2000-01-01','-'),(111,'Elma','Elma@gmail.com','90293301','0149894793','Medicine','Follow Up Case','123213','2023-09-30','1100 hours - 1200 hours','REJECTED','-','NULL','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','-'),(121,'TIEW KER XIN','kx@gmail.com','90293302','0125241893','Orthopaedics Surgery','New Case','ABC','2023-10-14','0900 hours - 1000 hours','REJECTED','Checked_In','NULL','ASSIGNED','DONE','Open','Pending Doctor Action','3','Female','2000-01-01','-'),(123,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','Follow Up Case','trying tring 12 3','2023-10-16','0900 hours - 1000 hours','ACCEPTED','Checked_In','12:53:42pm','ASSIGNED','DONE','Open','Pending Doctor Action','1','Female','2000-01-01','-'),(126,'TIEW KER XIN','kx@gmail.com','90293302','0125241893','Paediatrics','New Case','13','2023-10-16','1100 hours - 1200 hours','ACCEPTED','Checked_In','08:52:25am','ASSIGNED','DONE','Open','Pending Doctor Action','4','Female','2000-01-01','-'),(127,'TIEW KER XIN','kx@gmail.com','90293302','0125241893','Surgery','New Case','2131','2023-10-26','0900 hours - 1000 hours','REJECTED','-','NULL','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','-'),(135,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','aasa','2023-11-03','0900 hours - 1000 hours','ACCEPTED','Checked_In','04:03:10am','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','-'),(142,'Jane','Jane@gmail.com','90293303','0123456789','Public Health','New Case','dfds','2023-11-03','0900 hours - 1000 hours','ACCEPTED','Checked_In','04:35:11am','ASSIGNED','DONE','Open','CALLED','9','Female','2000-01-01','-'),(144,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-11-28','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','03:06:38pm','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor A'),(145,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-11-29','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','10:26:51am','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor A'),(147,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-12-18','0900 hours - 1000 hours','ACCEPTED','Patient_Not_Check_In','NULL','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor K'),(150,'Elma','Elma@gmail.com','90293301','0149894793','Medicine','New Case','Sick','2023-12-01','1100 hours - 1200 hours','ACCEPTED','Checked_In_But_Not_Attend','11:00:50am','ASSIGNED','DONE','Open','Pending Doctor Action','1','Female','2000-01-01','-'),(151,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','Sick','2023-12-06','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','10:33:19am','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','Doctor A'),(152,'Jane','Jane@gmail.com','90293303','0123456789','Surgery','New Case','sick','2023-12-06','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','11:46:48am','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor B'),(174,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-12-17','1000 hours - 1100 hours','ACCEPTED','Checked_In_But_Not_Attend','10:40:00pm','ASSIGNED','DONE','Open','Pending Doctor Action','1','Female','2000-01-01','Doctor A'),(182,'Jane','Jane@gmail.com','90293303','0123456789','Surgery','New Case','sick','2023-12-20','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','04:18:58pm','ASSIGNED','DONE','Open','Pending Doctor Action','2','Female','2000-01-01','Doctor B'),(205,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-12-21','0900 hours - 1000 hours','ACCEPTED','Checked_In','05:32:48am','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','Doctor A'),(207,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-12-22','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','12:10:34pm','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor A'),(209,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-12-23','0900 hours - 1000 hours','ACCEPTED','Checked_In','03:53:56pm','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','Doctor A'),(211,'Elma','Elma@gmail.com','90293301','0149894793','Medicine','New Case','sick','2023-12-23','0900 hours - 1000 hours','ACCEPTED','Checked_In','04:02:58pm','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','Doctor A'),(212,'Jane','Jane@gmail.com','90293303','0123456789','Surgery','New Case','sick','2023-12-23','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','06:35:50pm','ASSIGNED','DONE','Open','Pending Doctor Action','2','Female','2000-01-01','Doctor B'),(213,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-12-27','0900 hours - 1000 hours','ACCEPTED','Checked_In','01:27:43pm','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','Doctor A'),(214,'Jane','Jane@gmail.com','90293303','0123456789','Surgery','New Case','sick','2023-12-25','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','02:09:46pm','ASSIGNED','DONE','Open','Pending Doctor Action','2','Female','2000-01-01','Doctor B'),(215,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2023-12-24','0900 hours - 1000 hours','ACCEPTED','Checked_In','12:53:05pm','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','Doctor A'),(219,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2024-01-10','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','11:46:59am','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor A'),(222,'Elma','Elma@gmail.com','90293301','0149894793','Surgery','New Case','sick','2024-01-09','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','06:05:30pm','ASSIGNED','DONE','Open','Pending Doctor Action','2','Female','2000-01-01','Doctor B'),(223,'Elma','Elma@gmail.com','90293301','0149894793','Medicine','New Case','sick','2024-01-11','0900 hours - 1000 hours','ACCEPTED','Checked_In_But_Not_Attend','06:34:07pm','ASSIGNED','DONE','Open','Pending Doctor Action','1','Female','2000-01-01','Doctor A'),(241,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2024-01-14','0900 hours - 1000 hours','ACCEPTED','Checked_In','12:44:31pm','ASSIGNED','DONE','Open','CALLED','1','Female','2000-01-01','Doctor A'),(243,'Jane','Jane@gmail.com','90293303','0123456789','Medicine','New Case','sick','2024-01-16','0900 hours - 1000 hours','ACCEPTED','Patient_Not_Check_In','NULL','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor A'),(244,'Jane','Jane@gmail.com','90293303','0123456789','Surgery','New Case','sick','2024-01-22','0900 hours - 1000 hours','ACCEPTED','Awaiting_Patient_Check_In','NULL','NULL','WAITING','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor B'),(245,'Elma','Elma@gmail.com','90293301','0149894793','Orthopaedics Surgery','New Case','sick','2024-01-18','1000 hours - 1100 hours','Pending MS Action','Pending MS Action','NULL','NULL','WAITING','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor C'),(246,'TIEW KER XIN','kx@gmail.com','90293302','0125241893','Paediatrics','New Case','sick','2024-01-23','1500 hours - 1600 hours','Pending MS Action','Pending MS Action','NULL','NULL','WAITING','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor D'),(248,'Jane','Jane@gmail.com','90293303','0123456789','Medical Microbiology','New Case','sick','2024-01-31','1400 hours - 1500 hours','REJECTED','-','NULL','NULL','WAITING','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor J'),(250,'Jane','Jane@gmail.com','90293303','0123456789','Anaesthesiology','New Case','sick','2024-01-14','1000 hours - 1100 hours','ACCEPTED','Checked_In_But_Not_Attend','09:44:13pm','NULL','DONE','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor E'),(253,'Elma','Elma@gmail.com','90293301','0149894793','Surgery','New Case','sick','2024-01-15','1000 hours - 1100 hours','ACCEPTED','Checked_In','08:42:08am','NULL','WAITING','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor B'),(255,'Jane','Jane@gmail.com','90293303','0123456789','Orthopaedics Surgery','New Case','SICK','2024-01-24','1000 hours - 1100 hours','Pending MS Action','Pending MS Action','NULL','NULL','WAITING','Open','Pending Doctor Action','NULL','Female','2000-01-01','Doctor C');
/*!40000 ALTER TABLE `clinic_appointment` ENABLE KEYS */;
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
