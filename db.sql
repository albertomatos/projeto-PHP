-- MySQL dump 10.13  Distrib 5.7.21, for Windows (x86_64)
--
-- Host: 127.0.0.1    Database: pi_1
-- ------------------------------------------------------
-- Server version	5.7.21-1

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `uf` varchar(2) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (10,'Cliente Jairo','987.678.676-78','6.768-678','M','jairo@jairo.com','(67) 8678-6886','EQNP 30/34 - Ceilândia Sul (Ceilândia)','72236-500','DF'),(11,'Alberto','487.789.789-89','9.789-797','M','t@t.com','(87) 8978-9789','EQNP 30/34 - Ceilândia Sul (Ceilândia)','72236-500','DF'),(12,'Nathan','789.779.789-78','8.787-979','M','n@n.com','(87) 9789-7897','EQNP 30/34 - Ceilândia Sul (Ceilândia)','72236-500','DF');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `festa`
--

DROP TABLE IF EXISTS `festa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `festa` (
  `id_festa` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  PRIMARY KEY (`id_festa`),
  KEY `fk_Festa_Cliente_idx` (`id_orcamento`),
  CONSTRAINT `fk_Festa_Cliente` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento` (`id_orcamento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `festa`
--

LOCK TABLES `festa` WRITE;
/*!40000 ALTER TABLE `festa` DISABLE KEYS */;
INSERT INTO `festa` VALUES (4,'2019-11-17',2),(5,'2019-11-17',3);
/*!40000 ALTER TABLE `festa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orcamento`
--

DROP TABLE IF EXISTS `orcamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orcamento` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `valor_orcamento` varchar(10) DEFAULT NULL,
  `qt_convidados` int(11) DEFAULT NULL,
  `id_salao` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_orcamento`),
  KEY `orcamento_cliente_id_cliente_fk` (`id_cliente`),
  KEY `orcamento_salao_id_salao_fk` (`id_salao`),
  CONSTRAINT `orcamento_cliente_id_cliente_fk` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `orcamento_salao_id_salao_fk` FOREIGN KEY (`id_salao`) REFERENCES `salao` (`id_salao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orcamento`
--

LOCK TABLES `orcamento` WRITE;
/*!40000 ALTER TABLE `orcamento` DISABLE KEYS */;
INSERT INTO `orcamento` VALUES (2,'500',100,3,11),(3,'7000',500,2,10),(4,'10000',50,5,12);
/*!40000 ALTER TABLE `orcamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salao`
--

DROP TABLE IF EXISTS `salao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salao` (
  `id_salao` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(10) DEFAULT NULL,
  `logradouro` text,
  `uf` char(2) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `id_tipo_festa` int(11) NOT NULL,
  PRIMARY KEY (`id_salao`),
  KEY `salao_tipo_festa_id_tipo_festa_fk` (`id_tipo_festa`),
  CONSTRAINT `salao_tipo_festa_id_tipo_festa_fk` FOREIGN KEY (`id_tipo_festa`) REFERENCES `tipo_festa` (`id_tipo_festa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salao`
--

LOCK TABLES `salao` WRITE;
/*!40000 ALTER TABLE `salao` DISABLE KEYS */;
INSERT INTO `salao` VALUES (2,'72236-500','EQNP 30/34','DF','Ceilândia Sul (Ceilândia)',5),(3,'72876-902','Quadra 1','GO','Parque Esplanada III',1),(4,'72876-902','Quadra 1','GO','Parque Esplanada III',4),(5,'72876-902','Quadra 1','GO','Parque Esplanada III',2);
/*!40000 ALTER TABLE `salao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_festa`
--

DROP TABLE IF EXISTS `tipo_festa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_festa` (
  `id_tipo_festa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_festa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_festa`
--

LOCK TABLES `tipo_festa` WRITE;
/*!40000 ALTER TABLE `tipo_festa` DISABLE KEYS */;
INSERT INTO `tipo_festa` VALUES (1,'Criança','Festa de Criança'),(2,'Adulto','Festa de adulto'),(3,'Adolescente','Festa de Adolescente asda'),(4,'15 Anos','Festa de 15 Anos'),(5,'Casamento','Festa de Casamento');
/*!40000 ALTER TABLE `tipo_festa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-17 11:21:38
