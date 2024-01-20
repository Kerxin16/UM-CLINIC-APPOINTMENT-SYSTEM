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
-- Table structure for table `healthcheck_info`
--

DROP TABLE IF EXISTS `healthcheck_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `healthcheck_info` (
  `healthcheck_info_id` int NOT NULL AUTO_INCREMENT,
  `healthcheck_info_room` varchar(45) NOT NULL,
  `healthcheck_info_title` varchar(1000) NOT NULL,
  `healthcheck_info_content` varchar(10000) NOT NULL,
  PRIMARY KEY (`healthcheck_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `healthcheck_info`
--

LOCK TABLES `healthcheck_info` WRITE;
/*!40000 ALTER TABLE `healthcheck_info` DISABLE KEYS */;
INSERT INTO `healthcheck_info` VALUES (14,'BMI','    Body Mass Index Definition','Body Mass Index (BMI) is a widely used tool to assess a person\'s body weight relative to their height. It is a simple numerical value calculated by dividing a person\'s weight in kilograms by the square of their height in meters. The resulting BMI provides an estimate of a person\'s body fat and is used to classify individuals into different weight categories, indicating whether they are underweight, normal weight, overweight, or obese.'),(15,'BMI','Importance of Body Mass Index','(a) Screening for Health Risks\r\nBMI serves as a simple and quick screening tool to assess whether an individual falls within a healthy weight range or if they are at risk for \r\nvarious health conditions associated with weight, such as heart disease, diabetes, hypertension, and certain types of cancer. It helps healthcare professionals identify individuals who may need further evaluation and intervention.\r\n\r\n(b) Preventive Medicine\r\nBMI can help identify individuals at risk of future health problems due to excess weight. Early intervention, such as lifestyle modifications or counseling, can be initiated to prevent the development of obesity-related diseases.\r\n\r\n(c) Weight Management\r\nFor individuals, BMI can be a useful tool for tracking changes in body weight over time. It provides a starting point for discussions with healthcare providers about weight management goals and strategies.'),(16,'BMI','Interpretation of Body Mass Index','Underweight: BMI less than 18.5\r\nNormal Weight: BMI between 18.5 and 24.9\r\nOverweight: BMI between 25 and 29.9\r\nObese: BMI of 30 or greater'),(17,'BloodPressure','Blood Pressure Definition','Blood pressure is a measure of the force exerted by circulating blood against the walls of the arteries as the heart pumps it throughout the body. It is typically expressed as two values: systolic pressure and diastolic pressure, measured in millimeters of mercury (mm Hg).\r\n\r\nSystolic Pressure: This is the higher of the two numbers and represents the pressure in the arteries when the heart contracts (beats) and pushes blood into the arteries. It is the maximum pressure during a cardiac cycle.\r\n\r\nDiastolic Pressure: This is the lower of the two numbers and represents the pressure in the arteries when the heart is at rest or between beats, specifically during the relaxation phase of the cardiac cycle.'),(18,'BloodPressure','Importance of Blood Pressure','(a) Cardiovascular Health\r\nBlood pressure is a key indicator of the health of your cardiovascular system, which includes your heart and blood vessels. Elevated blood pressure, or hypertension, can strain the heart and blood vessels over time, increasing the risk of heart disease, stroke, and other cardiovascular conditions.\r\n\r\n(b) Overall Health and Longevity\r\nMaintaining healthy blood pressure levels is associated with a longer and healthier life. Chronic high blood pressure can contribute to various chronic conditions and reduce overall life expectancy.\r\n\r\n(c) Kidney Function\r\nThe kidneys play a vital role in regulating blood pressure. High blood pressure can damage the blood vessels in the kidneys, potentially leading to kidney disease or failure. Conversely, kidney disease can also contribute to high blood pressure.'),(19,'BloodPressure',' Interpretation of Blood Pressure',' Low Blood Pressure: \r\nSystolic: Less than 90 mm Hg\r\nDiastolic: Less than 60 mm Hg\r\n\r\nNormal Blood Pressure: \r\nSystolic: Less than 120 mm Hg\r\nDiastolic: Less than 80 mm Hg\r\n\r\nPre-Hypertension: \r\nSystolic: Less than 140 mm Hg\r\nDiastolic: Less than 90 mm Hg\r\n\r\nHypertension:\r\nSystolic: More than 140 mm Hg\r\nDiastolic: More than 90 mm Hg'),(20,'HeartRate','Heart Rate Definition','Heart rate, also known as pulse rate, is a fundamental physiological measurement that reflects the number of times a person\'s heart beats per minute (bpm). It is a crucial indicator of cardiovascular health and can provide valuable information about a person\'s overall well-being. Understanding heart rate is essential in various contexts, including medical assessments, fitness monitoring, and stress management.'),(21,'HeartRate','Importance of Heart Rate','(a) Cardiovascular Health\r\nHeart rate is a direct reflection of the cardiovascular system\'s efficiency. A healthy heart should pump blood effectively, maintaining a steady but not excessively high resting heart rate. Abnormalities in heart rate can signal underlying cardiovascular issues, such as arrhythmias or heart disease.\r\n\r\n(b) Stress and Mental Health\r\nChanges in heart rate can indicate stress levels and emotional states. High or irregular heart rates can be associated with anxiety, stress, or panic attacks. Monitoring heart rate during relaxation techniques and mindfulness meditation can help manage stress and improve mental well-being.\r\n\r\n(c) Long-Term Health Monitoring\r\nFor individuals with chronic medical conditions like diabetes or hypertension, regular heart rate monitoring can provide valuable data for managing their conditions and making treatment adjustments.'),(22,'HeartRate','Interpretation of Heart Rate','Resting Heart Rate: \r\nNormal Range: A typical resting heart rate for adults is between 60 and 100 beats per minute (bpm). Lower resting heart rates often indicate good cardiovascular fitness, while higher resting heart rates may suggest a need for improvement.\r\n\r\nAbnormalities: Resting heart rates significantly below or above the normal range may warrant further investigation. Bradycardia (very slow heart rate) or tachycardia (very fast heart rate) can be indicative of underlying medical conditions.\r\n\r\n\r\nHeart Rate During Exercise: \r\nTraining Intensity:Monitoring heart rate during exercise can help individuals gauge the intensity of their workouts. The target heart rate zone for exercise depends on fitness goals (e.g., fat burning, endurance, or aerobic fitness) and age.\r\n\r\nEfficiency:A well-conditioned cardiovascular system will maintain a lower heart rate for a given level of exercise intensity. An increase in heart rate that doesn\'t correspond to increased effort might suggest fatigue or other issues.'),(24,'','','');
/*!40000 ALTER TABLE `healthcheck_info` ENABLE KEYS */;
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
