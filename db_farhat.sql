-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_farhat
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `tb_hargasks`
--

DROP TABLE IF EXISTS `tb_hargasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_hargasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_hargasks`
--

LOCK TABLES `tb_hargasks` WRITE;
/*!40000 ALTER TABLE `tb_hargasks` DISABLE KEYS */;
INSERT INTO `tb_hargasks` VALUES (1,200000.00);
/*!40000 ALTER TABLE `tb_hargasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_krs`
--

DROP TABLE IF EXISTS `tb_krs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_krs` (
  `id_krs` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `status_krs` enum('draft','confirm','lunas') NOT NULL DEFAULT 'draft',
  `total_sks` int(11) NOT NULL,
  `total_harga` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tanggal_bayar` datetime DEFAULT NULL,
  PRIMARY KEY (`id_krs`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_krs`
--

LOCK TABLES `tb_krs` WRITE;
/*!40000 ALTER TABLE `tb_krs` DISABLE KEYS */;
INSERT INTO `tb_krs` VALUES (1,11,'lunas',8,1600000.00,'2025-10-21 09:52:48'),(2,10,'confirm',6,1200000.00,NULL);
/*!40000 ALTER TABLE `tb_krs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_krs_detail`
--

DROP TABLE IF EXISTS `tb_krs_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_krs_detail` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_krs` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_krs_detail`
--

LOCK TABLES `tb_krs_detail` WRITE;
/*!40000 ALTER TABLE `tb_krs_detail` DISABLE KEYS */;
INSERT INTO `tb_krs_detail` VALUES (1,1,15,3,600000.00),(2,1,16,3,600000.00),(3,1,18,2,400000.00),(4,2,18,2,400000.00),(5,2,19,4,800000.00);
/*!40000 ALTER TABLE `tb_krs_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_mk`
--

DROP TABLE IF EXISTS `tb_mk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mk` (
  `id_mk` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  PRIMARY KEY (`id_mk`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mk`
--

LOCK TABLES `tb_mk` WRITE;
/*!40000 ALTER TABLE `tb_mk` DISABLE KEYS */;
INSERT INTO `tb_mk` VALUES (15,'IF36243','Linux',3),(16,'IF23103','Statistik',3),(17,'IF35103','Keamanan Data',3),(18,'IF44012','Etika Profesi',2),(19,'IF33044','Rekayasa Perangkat Lunak',4);
/*!40000 ALTER TABLE `tb_mk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `npm` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `level` enum('admin','mhs') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (9,'','admin','','$2y$10$wET2m7PIsg/pyMkkAGnHz.XPFCMCOeluBsaCQ/nPbrfhh1W7dNL0y','admin'),(10,'07351911098','Muhammad Maulana','muhammadmaulana@gmail.com','$2y$10$18i7kv1e048GEshs8LzS0efq6GdDcYeucXGMBD/GuqP7qBwnrnPai','mhs'),(11,'07351911107','Asrul S salasa','asrulssalasa@gmail.com','$2y$10$5DFdNJ16NV8ajY7qb2aQ3.DL2ZyzbyGccmX6U59GVdaQlcgSBkyzC','mhs'),(12,'07351911130','Rizky Ihtisamul Tsaqif','rizkyihtisamultsaqif@gmail.com','$2y$10$C9HaHmCQNXtzxZVhnszH/.J1SIruDQNGHxtt4ZdY4.THkXKTO6e96','mhs');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-21 14:54:38
