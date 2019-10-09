-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: cv
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `dbs186463`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dbs186463` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbs186463`;

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'Félix Tuffreaud','Développeur web PHP, Symfony','ufo.png','CV_felix_tuffreaud.pdf','2019-09-25 22:28:50');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` longtext COLLATE utf8mb4_unicode_ci,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (1,'Lycée Stendhal','Bac ES','2001','<div>économie et social</div>','#1b81a4'),(2,'Université Joseph Fourier','Licence STAPS','2002 - 2005','<div>filière préparateur physique</div>','#1c8eb5'),(3,'ATP Formation','Photoshop - Illustrator','2008','<div>Initiation aux logiciels de la suite Adobe</div>','#2198c1'),(4,'OMS Formation','HTML - CSS','2017','<div>Initiation aux langages de mise en page de site internet</div>','#23abda'),(5,'wild code school','Développeur web et mobile','2018 - 2019','<div>Développeur PHP, Symfony Technologies : PHP, Symfony 4, HTML, CSS, Git, Bootstrap</div>','#26b5e7'),(6,'Web force 3','La pépinière Symfony','2019','<div><strong>Spécialité Symfony 4</strong></div><div>Tâches :</div><ul><li>FormType</li><li>Easy admin bundle</li><li>Doctrine</li></ul>','#27bef2');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (2,'Palette Publicitaire','Opérateur graphiste enseigne et signalétique','2006-2009','Réalisations d\'enseignes\nDécoupe d\'adhésifs sur plotter\nRéalisation de maquettes vectorielles'),(3,'Gazoline','Peintre en lettre','2010','Enseigne et signalétique'),(4,'PP2M-Piscine market','Préparateur de commande','2011-2018','Administration du site e-commerce piscine-market.com\nGestion fiche article, homepage, newsletter\nPréparation commandes, expéditions\nRelation clientèle, gestion des stocks.'),(5,'Matière 1ère','Stagiaire développeur PHP, intégrateur','2019','<div>Création de site avec <strong>Wordpress</strong> Connexion API, shortcode Wordpress Approche du CMS e-commerce <strong>Prestashop<br></strong>Intégration HTML, CSS, JS</div>'),(6,'test','super taffe','2022','<div>de la bombe<br><em>blablabala</em></div><ol><li><em>lknfv</em></li><li><em>dfgdd</em></li><li><em>dfg</em></li></ol><div><br></div><div>jknwdfwomsdifjd&nbsp; djf of jknwdfwomsdifjd&nbsp; djf of jknwdfwomsdifjd&nbsp; djf of.</div><div>jknwdfwomsdifjd&nbsp; djf of jknwdfwomsdifjd&nbsp; djf of jknwdfwomsdifjd&nbsp; djf ofjknwdfwomsdifjd&nbsp; djf of jknwdfwomsdifjd&nbsp; djf of jknwdfwomsdifjd&nbsp;</div>');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer`
--

DROP TABLE IF EXISTS `footer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer`
--

LOCK TABLES `footer` WRITE;
/*!40000 ALTER TABLE `footer` DISABLE KEYS */;
INSERT INTO `footer` VALUES (1,'https://github.com/Liiinx','<i class=\"fab fa-github\"></i>'),(2,'https://www.linkedin.com/in/tuffreaud-felix-developpeurweb/','<i class=\"fab fa-linkedin\"></i>'),(3,'mailto:ftuffreaud@gmail.com','<i class=\"fas fa-envelope\"></i>');
/*!40000 ALTER TABLE `footer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20190909131548','2019-09-09 13:16:57'),('20190909200716','2019-09-09 20:07:52'),('20190910115845','2019-09-10 11:59:04'),('20190910141838','2019-09-10 14:18:58'),('20190913131122','2019-09-13 13:11:43'),('20190919111151','2019-09-19 11:14:13'),('20190925143451','2019-09-25 14:35:15'),('20190925143821','2019-09-25 14:38:28'),('20191001082110','2019-10-01 08:21:32'),('20191001101116','2019-10-01 10:11:34'),('20191001103001','2019-10-01 10:30:07'),('20191001200038','2019-10-01 20:01:48'),('20191005144943','2019-10-05 14:49:58');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` longtext COLLATE utf8mb4_unicode_ci,
  `tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `project_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Travel agency','<div>1er projet<br>exercice <strong>Udemy</strong></div>','HTML / CSS','Décembre 2017','voyage.png',NULL,'https://travelagency.liiinx.com/'),(2,'Wild circus','<div>Test d\'entrée à l\'école Wild code school</div>','HTML / CSS','Février - mars 2018','lion.png','2019-10-01 10:33:11','https://wildcircus.liiinx.com/'),(3,'Snake','<div>Projet <strong>Javascript</strong><br>Exercice Udemy</div>',NULL,'Avril - mai 2018','serpent.png','2019-10-01 10:39:59','https://snake.liiinx.com/'),(4,'Air wild','<div>1er projet Wild code school</div>','HTML / CSS / Bootstrap','Septembre 2018','airwild.png','2019-10-01 10:42:04','https://liiinx.github.io/airWild/'),(5,'Into the wild','<div>Projet <strong>PHP<br></strong>Blog de l\'école</div>','PHP Objet / MVC / PDO / SQL / HTML / CSS / Bootstrap','Octobre - novembre 2018','into-the-wild.png','2019-10-01 10:45:17','https://intothewild.liiinx.com/'),(6,'Vente à la Ferme','<div>Projet <strong>Symfony<br></strong>Wild code school</div>','Symfony 4 / PHP / Twig / JS / HTML / CSS','Décembre - janvier 2018/2019','vente-a-la-ferme.png','2019-10-01 10:49:17','https://ventealaferme.fafachena.com/');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommendation`
--

DROP TABLE IF EXISTS `recommendation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommendation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommendation`
--

LOCK TABLES `recommendation` WRITE;
/*!40000 ALTER TABLE `recommendation` DISABLE KEYS */;
INSERT INTO `recommendation` VALUES (1,'Hélène T','<div>\"Felix a été très impliqué tout au long de la formation. Sérieux, méthodique et curieux aussi bien dans son travail que dans sa participation et ses questions lors des cours et ateliers.\"</div>'),(2,'Chuck Norris','\"Félix, tu es au top, ne change rien !!\"'),(3,'DVD','<div>\"Numéro 1 sur codewarz\"</div>');
/*!40000 ALTER TABLE `recommendation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (1,'HTML',85,'green'),(2,'CSS',85,'blue'),(3,'JS',25,'yellow'),(4,'PHP',60,'purple'),(5,'SQL',50,'#06ea3b'),(6,'GIT',40,'#e22828');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (9,'clem@clem.com','[\"ROLE_ADMIN\"]','$2y$13$VNM2j8/1INdSduyhiOCeE.Pndvp20g7T2H/eTwF/xcW1loxQNH.4i'),(10,'test@test.com','[\"ROLE_ADMIN\"]','$2y$13$XwsaaWXpDXktZsAkw7DkG.zDuWp0kE80R282k4WUkerC/Jk5CFi1.'),(11,'ftuffreaud@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$TypW0AlwZy/AD8G6V7klI.wUR.Dkdkf7uVC/d7E3sD.cYsWlo6dL.');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-08 11:08:02
