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
-- Table structure for table `home_info`
--

DROP TABLE IF EXISTS `home_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_info` (
  `home_info_id` int NOT NULL AUTO_INCREMENT,
  `home_info_content` varchar(9999) NOT NULL,
  PRIMARY KEY (`home_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_info`
--

LOCK TABLES `home_info` WRITE;
/*!40000 ALTER TABLE `home_info` DISABLE KEYS */;
INSERT INTO `home_info` VALUES (41,'<h5><font size=\"5\"><b>Natural Health and Nutrition Tips That Are Evidence-Based\n    </b></font></h5><div><font size=\"5\"><b><br></b></font></div><div><h6><font size=\"4\"><b>1. Limit sugary drinks</b></font></h6><div><font size=\"3\">Sugary drinks like sodas, fruit juices, and sweetened teas are the primary source of added sugar in the American diet.</font></div><div><font size=\"3\"><br></font></div><div><font size=\"3\">Unfortunately, findings from several studies point to sugar-sweetened beverages increasing risk of heart disease and type 2 diabetes, even in people who are not carrying excess body fat.</font></div><div><font size=\"3\"><br></font></div><div><font size=\"3\">Sugar-sweetened beverages are also uniquely harmful for children, as they can contribute not only to obesity in children but also to conditions that usually do not develop until adulthood, like type 2 diabetes, high blood pressure, and non-alcoholic fatty liver disease.</font></div><div><font size=\"3\"><br></font></div><div><font size=\"3\">Healthier alternatives include:</font></div><div><font size=\"3\"><br></font></div><div><ul><li><span style=\"font-size: medium;\">water</span></li><li>unsweetened teas</li><li>sparkling water</li><li>coffee</li></ul><div><br></div></div></div><h6><font size=\"4\"><b><br>2. Eat nuts and seeds</b></font></h6><div><div><font size=\"3\">Some people avoid nuts because they are high in fat. However, nuts and seeds are incredibly nutritious. They are packed with protein, fiber, and a variety of vitamins and minerals&nbsp;</font></div><div><font size=\"3\"><br></font></div><div><font size=\"3\">Nuts may help you lose weight and reduce the risk of developing type 2 diabetes and heart disease.</font></div><div><font size=\"3\"><br></font></div><div><font size=\"3\">Additionally, one large observational study noted that a low intake of nuts and seeds was potentially linked to an increased risk of death from heart disease, stroke, or type 2 diabetes</font></div></div><div><br></div><div><br></div><div><h6><font size=\"4\"><b>3. Avoid ultra-processed foods</b></font></h6><div><font size=\"3\">Ultra-processed foods (UPFs) are foods containing ingredients that are significantly modified from their original form. They often contain additives like added sugar, highly refined oil, salt, preservatives, artificial sweeteners, colors, and flavors as well .</font></div><div><font size=\"3\"><br></font></div><div><font size=\"3\">Examples include:</font></div><div><font size=\"3\"><br></font></div><div><ul><li><font size=\"3\">snack cakes</font></li><li>fast food</li><li>frozen meals</li><li>packaged cookies</li><li>chips</li></ul><div><br></div></div><div><font size=\"3\">UPFs are highly palatable, meaning they are easily overeaten, and activate reward-related regions in the brain, which can lead to excess calorie consumption and weight gain. Studies show that diets high in ultra-processed food can contribute to obesity, type 2 diabetes, heart disease, and other chronic conditions.</font></div><div><font size=\"3\"><br></font></div><div><font size=\"3\">In addition to low quality ingredients like refined oils, added sugar, and refined grains, they’re usually low in fiber, protein, and micronutrients. Thus, they provide mostly empty calories.</font></div></div>'),(51,'<h4 style=\"text-align: center;\"><font color=\"#5a4cc8\" size=\"5\">TIPS FOR MAINTAINING A HEALTHY LIFESTYLE AND BODY WEIGHT</font></h4><div><font size=\"5\" color=\"#030202\"><br></font></div><p><font size=\"3\" color=\"#030202\">1. Measure and Watch Your Weight&nbsp; Keeping track of your body weight on a daily or weekly basis will help you see what you’re losing and/or what you’re gaining.&nbsp;</font></p><p><font size=\"3\" color=\"#030202\"><br></font></p><p><font size=\"3\" style=\"\" color=\"#030202\">2. Limit Unhealthy Foods and Eat Healthy Meals Do not forget to eat breakfast and choose a nutritious meal with more protein and fiber and less fat, sugar, and calories. For more information on weight-control foods and dietary recommendations.</font><br></p><p><font size=\"3\" style=\"\" color=\"#030202\"><br></font></p><p><font size=\"3\" color=\"#030303\">3. Take Multivitamin Supplements&nbsp; To make sure you have sufficient levels of nutrients, taking a daily multivitamin supplement is a good idea, especially when you do not have a variety of vegetables and fruits at home. Many micronutrients are vital to your immune system, including vitamins A, B6, B12, C, D, and E, as well as zinc, iron, copper, selenium, and magnesium. However, there’s currently NO available evidence that adding any supplements or “miracle mineral supplements” to your diet will help protect you from the virus or increase recovery. In some cases, high doses of vitamins can be bad for your health.&nbsp;</font></p><p><font size=\"3\" color=\"#030303\"><br></font></p><p><font color=\"#030303\" style=\"\" size=\"3\">4. Drink Water and Stay Hydrated, and Limit Sugared Beverages&nbsp; &nbsp;Drink water regularly to stay healthy, but there is NO evidence that drinking water frequently (e.g. every 15 minutes) can help prevent any viral infection.</font><br></p>');
/*!40000 ALTER TABLE `home_info` ENABLE KEYS */;
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
