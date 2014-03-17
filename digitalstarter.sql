CREATE DATABASE  IF NOT EXISTS `digitalstarter` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `digitalstarter`;
-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: digitalstarter
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.13.10.2

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
-- Table structure for table `adresses`
--

DROP TABLE IF EXISTS `adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(45) NOT NULL,
  `adresse_2` varchar(45) DEFAULT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_type_adresse` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_adresse_utilisateur` (`id_utilisateur`),
  KEY `FK_adresse_type_idx` (`id_type_adresse`),
  CONSTRAINT `FK_adresse_type` FOREIGN KEY (`id_type_adresse`) REFERENCES `type_adresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adresse_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresses`
--

LOCK TABLES `adresses` WRITE;
/*!40000 ALTER TABLE `adresses` DISABLE KEYS */;
INSERT INTO `adresses` VALUES (1,'24 chemin du bas','appartement 21','41700','Cheverny','France',1,1),(2,'10 rue de mon bureau','','41000','Blois','France',1,2);
/*!40000 ALTER TABLE `adresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (1,'Coupon de 5€',5),(2,'Coupon de 10€',10),(3,'Coupon de 20€',20),(4,'Coupon de 50€',50);
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons_projets`
--

DROP TABLE IF EXISTS `coupons_projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons_projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_coupon` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `nombre` int(11) DEFAULT NULL,
  `limite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_coupon` (`id_coupon`),
  KEY `FK_coupon_projet_projet` (`id_projet`),
  CONSTRAINT `FK_coupon` FOREIGN KEY (`id_coupon`) REFERENCES `coupons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_coupon_projet_projet` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons_projets`
--

LOCK TABLES `coupons_projets` WRITE;
/*!40000 ALTER TABLE `coupons_projets` DISABLE KEYS */;
INSERT INTO `coupons_projets` VALUES (14,1,1,0,0),(15,2,1,0,0),(16,3,1,0,0),(17,4,1,0,0),(18,1,2,0,0),(19,2,2,0,0),(20,3,2,0,0),(21,2,3,0,0),(24,3,3,0,0),(25,4,3,0,0);
/*!40000 ALTER TABLE `coupons_projets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `prix` float NOT NULL,
  `valeur_projet` int(11) NOT NULL,
  `poids` float NOT NULL,
  `id_type_produit` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_type_produit` (`id_type_produit`),
  KEY `FK_produit_projet` (`id_projet`),
  CONSTRAINT `FK_produit_projet` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_type_produit` FOREIGN KEY (`id_type_produit`) REFERENCES `type_produits` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES (1,'MUG SPAVENTO','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit',NULL,7,5,280,1,2),(2,'4 MUGS SPAVENTO','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit',NULL,20,15,1200,1,2),(3,'TSHIRT SPAVENTO','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit',NULL,8,5,125,2,2),(4,'POSTER SPAVENTO','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit',NULL,5,3,100,3,2),(5,'POSTER PATTE ROUSSE','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit','',5,3,100,3,1),(6,'POSTER 2 PATTE ROUSSE','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit','',5,3,100,3,1),(7,'TSHIRT MORDRED','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit','',8,5,125,2,3),(8,'4 MUGS MORDRED','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit','',25,20,1200,1,3);
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projets`
--

DROP TABLE IF EXISTS `projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `objectif` int(11) NOT NULL,
  `id_type_projet` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_type_projet` (`id_type_projet`),
  KEY `FK_utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_type_projet` FOREIGN KEY (`id_type_projet`) REFERENCES `type_projets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projets`
--

LOCK TABLES `projets` WRITE;
/*!40000 ALTER TABLE `projets` DISABLE KEYS */;
INSERT INTO `projets` VALUES (1,'PATTE ROUSSE - premier album','Salut à tous! Le bateau est prêt, il ne manque plus que vous, chers matelots, pour faire la traversée ! Avec votre aide je pourrai financer la sortie de mon album \"Là où s\'en va la mer\".','2014-01-05 00:00:00','2014-03-05 00:00:00',4000,1,2),(2,'Court metrage de fiction SPAVENTO','SPAVENTO, de la fiction, le monde du masque, du jeu, où la mascarade fait la part belle au cirque des premiers temps, le tout dans un décor de théâtre, et tout s\'évanouit. Et puis...','2014-02-01 00:00:00','2014-03-31 00:00:00',2500,2,3),(3,'Mordred - Saison 2','Produisez la deuxième saison de la websérie médiévale-fantastique MORDRED - LA RÉVOLTE.','2014-02-15 00:00:00','2014-04-15 00:00:00',5000,2,4);
/*!40000 ALTER TABLE `projets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_adresses`
--

DROP TABLE IF EXISTS `type_adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_adresses`
--

LOCK TABLES `type_adresses` WRITE;
/*!40000 ALTER TABLE `type_adresses` DISABLE KEYS */;
INSERT INTO `type_adresses` VALUES (1,'Adresse de facturation','facturation'),(2,'Adresse de livraison','livraison');
/*!40000 ALTER TABLE `type_adresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_produits`
--

DROP TABLE IF EXISTS `type_produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_produits`
--

LOCK TABLES `type_produits` WRITE;
/*!40000 ALTER TABLE `type_produits` DISABLE KEYS */;
INSERT INTO `type_produits` VALUES (1,'Mug','mug'),(2,'T-shirt','tshirt'),(3,'Poster','poster');
/*!40000 ALTER TABLE `type_produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_projets`
--

DROP TABLE IF EXISTS `type_projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_projets`
--

LOCK TABLES `type_projets` WRITE;
/*!40000 ALTER TABLE `type_projets` DISABLE KEYS */;
INSERT INTO `type_projets` VALUES (1,'Musical','musical'),(2,'Vidéo','video');
/*!40000 ALTER TABLE `type_projets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'jdupond','jean.dupond@gmail.com','21e9adb43dde80e12bf8462d7773ade20448662d','Jean','Dupond'),(2,'mdurand','marc.durand@gmail.com','3ba30a955a23e5ffc82040fd416638cec81726cd','Marc','Durand'),(3,'pdupuis','pierre.dupuis@gmail.com','83f2eee51a9ce68554a55c531a023d96ee5db26e','Pierre','Dupuis'),(4,'pdumont','paul.dumont@gmail.com','ea568a3f71d97f716201d8597fcefbf657738c3c','Paul','Dumont');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-16 17:46:48
