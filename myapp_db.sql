-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: myapp_db
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `course_progress`
--

DROP TABLE IF EXISTS `course_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned DEFAULT NULL,
  `course_id` int(10) unsigned DEFAULT NULL,
  `progress_percentage` int(11) DEFAULT 0,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `course_progress_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_progress_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_progress`
--

LOCK TABLES `course_progress` WRITE;
/*!40000 ALTER TABLE `course_progress` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `course_description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES
(9,'Introduction to Programming','CS101','Learn the basics of programming using Python.',NULL,NULL),
(10,'Web Development','CS102','Learn HTML, CSS, and JavaScript to build modern websites.',NULL,NULL),
(11,'Database Management','CS103','Understand the principles of database management and SQL.',NULL,NULL),
(12,'Networking Basics','CS104','Introduction to computer networks, routers, and switches.',NULL,NULL),
(13,'Cybersecurity Fundamentals','CS105','Learn the basics of securing computer systems and networks.',NULL,NULL),
(14,'Mobile App Development','CS106','Build mobile applications using Android and iOS development tools.',NULL,NULL),
(15,'Data Science Basics','CS107','An introduction to data science, analytics, and machine learning.',NULL,NULL),
(16,'Cloud Computing','CS108','Learn the fundamentals of cloud platforms like AWS and Azure.',NULL,NULL),
(17,'Introduction to Computer Basics','CTS101','This course covers the basics of using a computer, including understanding hardware, operating systems, and basic navigation.',NULL,NULL),
(18,'Typing and Keyboarding Skills','CTS102','Focuses on developing typing speed and accuracy, as well as proper keyboarding techniques.',NULL,NULL),
(19,'Using the Internet Safely','CTS103','Introduces learners to safe internet practices, including browsing, online privacy, and avoiding scams.',NULL,NULL),
(20,'Email and Online Communication','CTS104','Covers the basics of setting up an email account, sending emails, and using messaging platforms for communication.',NULL,NULL),
(21,'Microsoft Word for Beginners','CTS105','Learn the fundamentals of word processing, including formatting, editing, and document creation using Microsoft Word.',NULL,NULL),
(22,'Microsoft Excel for Beginners','CTS106','An introduction to spreadsheets, covering basic data entry, formulas, and organizing information using Microsoft Excel.',NULL,NULL),
(23,'Introduction to PowerPoint','CTS107','This course teaches the basics of creating presentations using Microsoft PowerPoint, including slide design and visual storytelling.',NULL,NULL),
(24,'Basic Troubleshooting for Computers','CTS108','Provides basic troubleshooting techniques for common computer problems, including software issues, hardware malfunctions, and basic maintenance.',NULL,NULL),
(25,'Introduction to Coding with Python','CTS109','A beginner’s introduction to programming using Python. Covers basic programming concepts such as variables, loops, and functions.',NULL,NULL),
(26,'Digital Literacy and Online Safety','CTS110','Covers the essential skills for using digital devices safely, understanding online privacy, and managing digital identities responsibly.',NULL,NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2024-10-07-135434','App\\Database\\Migrations\\CreateCoursesTable','default','App',1728309788,1),
(2,'2024-10-07-135552','App\\Database\\Migrations\\CreateStudentsTable','default','App',1728309788,1),
(3,'2024-10-07-135702','App\\Database\\Migrations\\CreateStudentCoursesTable','default','App',1728309788,1),
(4,'2024-10-07-143127','App\\Database\\Migrations\\CreateUsersTable','default','App',1728311492,2),
(5,'2024-10-09-162737','App\\Database\\Migrations\\AddUsernameToStudents','default','App',1728491342,3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_courses`
--

DROP TABLE IF EXISTS `student_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned NOT NULL,
  `course_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_courses_student_id_foreign` (`student_id`),
  KEY `student_courses_course_id_foreign` (`course_id`),
  CONSTRAINT `student_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_courses`
--

LOCK TABLES `student_courses` WRITE;
/*!40000 ALTER TABLE `student_courses` DISABLE KEYS */;
INSERT INTO `student_courses` VALUES
(6,1,11,NULL,NULL,0),
(8,2,11,NULL,NULL,0),
(9,2,14,NULL,NULL,0),
(10,2,16,NULL,NULL,0),
(11,1,14,NULL,NULL,0),
(12,1,17,NULL,NULL,0);
/*!40000 ALTER TABLE `student_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT 'default.jpg',
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES
(1,'Stark','Expo','','$2y$10$IbN10kADQHVMtzpPoDIdmOWcDjnabIfufQAoHv7F6R/AsHnO1k8Uu','2024-10-09 19:22:11','2024-10-16 12:38:40','StarkExpo','12345678','1729080914_902460844e66a71b8e0f.png',NULL,NULL,NULL,NULL,NULL),
(2,'Gift','Chisale','g7@expo.com','$2y$10$8xlp7VJ/ZoOYt0NCH14yb.W26MPKBmf/Wq2lodZOs741kxiPKOMS2','2024-10-09 22:16:24','2024-10-13 15:09:04','G7Chisa',NULL,'default.jpg',NULL,NULL,NULL,NULL,NULL),
(3,'Dali','Dali','da@gmail.com','$2y$10$xVHrBeU7tQN7wjsQQQa3zuihteVpCRzZ0Lhe.0J16/yYgXy6jeZKy','2024-10-13 18:49:40','2024-10-13 18:49:40','Darlington',NULL,'default.jpg',NULL,NULL,NULL,NULL,NULL),
(4,'Pamel','Stark','pamel@gmail.com','$2y$10$vv7mVx0VCXQ8iBfSrUiPMOm4mSJf6ApCGVndWSjXZ3nBirDA2F.ii','2024-10-13 18:53:05','2024-10-13 18:53:05','Pamela',NULL,'default.jpg',NULL,NULL,NULL,NULL,NULL),
(5,'Promise','Jumpha','proj@starkec.com','$2y$10$.wOueqHQ5Uj4eYY8yVh0j.afzD.cDXmXV7wm78WFIHd7z8AznOfLy','2024-10-16 12:41:47','2024-10-16 15:42:52','ProJu','67888998765','1729091670_5285f3351c4b50597c5b.png','2013-07-17','iopoj','male','hello world',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Hello World','hellow@expo.com','$2y$10$Pv8D0QNgJ7oJ9ksBDvHos.GT48C0ztyyUcQXv.EWHUbJTN/YZmFce',NULL,NULL),
(2,'Chisomo Malunga','john.doe@example.com','$2y$10$uy/CvhtT79YTOz55.XAEh.bxJqHEqJH7ANyDYeAK3M3FqO35/aZcC',NULL,NULL),
(3,'SparkWilson','sparkwilson2041@gmail.com','$2y$10$otQ412WYV5DEJCv402S2V.rlKZ3X1G8gT3/CWYX6WMHXQQ/jp2PX2',NULL,NULL),
(4,'Mpulura','mpu@gmail.com','$2y$10$VVG/Yrrq0HRtMBHP28/97uQpGmgxuLxBZjUHAWmrWhjDC703SJcFK',NULL,NULL),
(5,'Lameck Jumpha','lamj@gmail.com','$2y$10$LXhgNodo6LYFfK7tHoIrseudRZ1uaLAJtuPfjoMlguhjcsKmZsOZe',NULL,NULL),
(6,'Chisomo Malung','sparkwilson2025@gmail.com','$2y$10$WUE1d52nyRRqe2yUyca1q.YXflTuRqUvE1u/EwxFA1ALkKivv5ZTy',NULL,NULL),
(7,'Hello Worl','laj@gmail.com','$2y$10$Uu/2dklOJ34UHWD.XjMWoecs//KD5O2iVE3YoZ.ATu.W58oDXjmBO',NULL,NULL),
(8,'Chisomo Malu','chis@expo.com','$2y$10$Z8zPElEa2NdiaVe4yQ.1uejBvgtGW1ZKOyiYfT1q3KQg8nPpS2rr2',NULL,NULL),
(9,'Gift','gif@expo.com','$2y$10$X3nB3ooQ57rzM7UzxaRjkudk/fqEQBMxOGn9RIpXDywxGdC/IGgjm',NULL,NULL),
(10,'Chisale','chiso@expo.com','$2y$10$j297CcnyodzUEgjtqftWbe1d7qHCuRyBnEtLPsVHdbcK/wNaduK2C',NULL,NULL);
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

-- Dump completed on 2024-10-17  2:13:24
