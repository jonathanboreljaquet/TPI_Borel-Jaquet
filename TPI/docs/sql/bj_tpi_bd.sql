CREATE DATABASE  IF NOT EXISTS `bj_tpi_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `bj_tpi_bd`;
-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bj_tpi_bd
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `est_valide` tinyint(1) NOT NULL,
  `id_reparateur` int(11) NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `id_reparateur` (`id_reparateur`),
  CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_reparateur`) REFERENCES `reparateur` (`id_reparateur`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (10,'2019-05-09','J\'aime beaucoup le service',1,1),(11,'2019-07-10','Service médiocre, une honte',1,1),(15,'2019-05-09','L&amp;#39;aide ma été de grande utilité.',1,1),(17,'2019-05-09','L&#39;apostrophe',0,1),(18,'2019-05-09','Super, Thierry Borel-Jaquet est vraiment sympa.',0,1);
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `demandes` (
  `id_demande` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `description` text NOT NULL,
  `statut` enum('OUVERTE','ENCOURS','TRAITEE','REFUSEE') NOT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandes`
--

LOCK TABLES `demandes` WRITE;
/*!40000 ALTER TABLE `demandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `demandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `id_demande` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` enum('RECUP','REDD') NOT NULL,
  `horaire` time NOT NULL,
  `id_reparateur` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_demande` (`id_demande`),
  KEY `id_reparateur` (`id_reparateur`),
  CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_demande`) REFERENCES `demandes` (`id_demande`),
  CONSTRAINT `evenement_ibfk_2` FOREIGN KEY (`id_reparateur`) REFERENCES `reparateur` (`id_reparateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenement`
--

LOCK TABLES `evenement` WRITE;
/*!40000 ALTER TABLE `evenement` DISABLE KEYS */;
/*!40000 ALTER TABLE `evenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infos_dynamiques`
--

DROP TABLE IF EXISTS `infos_dynamiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `infos_dynamiques` (
  `telephone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tarif` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infos_dynamiques`
--

LOCK TABLES `infos_dynamiques` WRITE;
/*!40000 ALTER TABLE `infos_dynamiques` DISABLE KEYS */;
INSERT INTO `infos_dynamiques` VALUES ('0774563453','sos@infobobo.ch','50-100 CHF','Bonjour je m\'appel Thierry Borel-Jaquet et je suis la solution à vos problème informatique');
/*!40000 ALTER TABLE `infos_dynamiques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reparateur`
--

DROP TABLE IF EXISTS `reparateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reparateur` (
  `id_reparateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`id_reparateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparateur`
--

LOCK TABLES `reparateur` WRITE;
/*!40000 ALTER TABLE `reparateur` DISABLE KEYS */;
INSERT INTO `reparateur` VALUES (1,'infobobo','dd4ec82374679f62183043597fd7c5c8e523e0f0');
/*!40000 ALTER TABLE `reparateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-09 15:53:48
