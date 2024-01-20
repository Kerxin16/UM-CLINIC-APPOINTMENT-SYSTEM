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
-- Table structure for table `health_record`
--

DROP TABLE IF EXISTS `health_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `health_record` (
  `Health_Record_ID` int NOT NULL AUTO_INCREMENT,
  `Health_Record_Advice` varchar(9999) NOT NULL,
  `Health_Record_Created_DateTime` varchar(100) NOT NULL,
  `Clinic_Appointment` int NOT NULL,
  `Health_Record_Diagnosis` varchar(999) NOT NULL,
  PRIMARY KEY (`Health_Record_ID`),
  KEY `Clinic_Appointment_ID_idx` (`Clinic_Appointment`),
  CONSTRAINT `Clinic_Appointment_ID` FOREIGN KEY (`Clinic_Appointment`) REFERENCES `clinic_appointment` (`clinic_appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_record`
--

LOCK TABLES `health_record` WRITE;
/*!40000 ALTER TABLE `health_record` DISABLE KEYS */;
INSERT INTO `health_record` VALUES (30,'Rest More','2023-10-16 12:28:27pm',126,'Worsening fatigue, shortness of breath on exertion, and bilateral lower extremity edema. '),(31,'Take prescribed medications as directed, including ACE inhibitors, beta-blockers, diuretics, and other medications prescribed by the healthcare provider.\nReport any side effects or concerns about medications promptly to the healthcare team.\n ','2023-11-03 05:07:01am',135,'Complete Blood Count: Normal\nBasic Metabolic Panel: Mildly elevated creatinine\nChest X-ray: Cardiomegaly, pulmonary congestion\nElectrocardiogram (ECG): Sinus rhythm, no acute ischemic changes\nEchocardiography: Left ventricular hypertrophy, reduced ejection fraction (30%)\nBrain Natriuretic Peptide (BNP): Elevated.\nDiagnosis: Heart Failure with Reduced Ejection Fraction (HFrEF)\n '),(32,'Measles can cause fatigue and dehydration. Ensure the infected person gets plenty of rest and drinks fluids to stay hydrated.\n ','2023-11-03 05:07:43am',142,'High fever, cough, coryza, and the characteristic maculopapular rash. The disease being diagnose is Measles ');
/*!40000 ALTER TABLE `health_record` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-20 10:02:26
