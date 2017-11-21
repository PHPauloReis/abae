-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: falcao_erp
-- ------------------------------------------------------
-- Server version	5.7.18-1

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
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access_level` tinyint(4) DEFAULT '1' COMMENT '1: All; 2: Site; 3: ERP',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'Paulo Reis','pauloreis','$2y$10$b6aJEsHDkHSTBh/Dtp3X.u7wfrdqjxocMHlXT9PLe1gt/pOE2hlGi','pauloreisprofissional@gmail.com',9,'Fd7nW3wyzHXYZDi5c1ftBaZY9Vk78sLJYo32miEax1bT6dIYjytRvqPTlCrD','2017-05-07 23:37:16','2017-05-07 23:37:16',NULL),(2,'Administrador','admin','$2y$10$QjeZ9UAqj3sp52zU.HVs.eBQ6IQy7/RvqbiFzkyd/j0IhZMpM26.G','admin@webplug.com.br',1,'nABOk6zWxmf7IVFF8IwWiPdC01XHBV0ZoG4h411YzTinzLNjOPH66wdgw8vN','2017-05-07 23:41:36','2017-05-07 23:41:36',NULL);
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `payment_terms` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `shipping` double DEFAULT '0',
  `discount` double DEFAULT '0',
  `observations` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prints_customer` (`customer_id`),
  CONSTRAINT `fk_budgets_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgets`
--

LOCK TABLES `budgets` WRITE;
/*!40000 ALTER TABLE `budgets` DISABLE KEYS */;
INSERT INTO `budgets` VALUES (10,22,'À vista + 30 dias, sendo 50% na contratação e 50% na retirada','5 dias úteis após a liberação da arte e da confirmação do pagamento','10 dias',0,0,NULL,'2017-06-17 14:15:55','2017-06-17 14:15:55',NULL),(12,28,'À vista + 30 dias, sendo 50% na contratação e 50% na retirada','5 dias úteis após a liberação da arte e da confirmação do pagamento','10 dias',0,0,NULL,'2017-06-18 15:37:50','2017-06-18 15:37:50',NULL);
/*!40000 ALTER TABLE `budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `budgets_items`
--

DROP TABLE IF EXISTS `budgets_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgets_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budget_id` int(11) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prints_customer` (`budget_id`),
  CONSTRAINT `fk_budgets_budget_id` FOREIGN KEY (`budget_id`) REFERENCES `budgets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgets_items`
--

LOCK TABLES `budgets_items` WRITE;
/*!40000 ALTER TABLE `budgets_items` DISABLE KEYS */;
INSERT INTO `budgets_items` VALUES (12,10,'123.123',1,1000,'Cartões de Visita - 300g - Verniz Localizado','2017-06-17 14:15:55','2017-06-17 14:15:55',NULL),(13,10,'233.543',1,200,'Cartazes 145g','2017-06-17 14:15:55','2017-06-17 14:15:55',NULL),(15,12,'123.234',1,1000,'Cartões de Visita - 300g - Verniz Localizado','2017-06-18 15:37:50','2017-06-18 15:37:50',NULL),(16,12,'354.234',1,800,'Cartazes 145g','2017-06-18 15:37:50','2017-06-18 15:37:50',NULL);
/*!40000 ALTER TABLE `budgets_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) DEFAULT NULL,
  `responsible` varchar(255) DEFAULT NULL,
  `document` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `main_phone` char(15) DEFAULT NULL,
  `secondary_phone` char(15) DEFAULT NULL,
  `address` text,
  `observations` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Empresa1','Fulano',NULL,NULL,NULL,NULL,NULL,'Inserir Texto','2017-05-01 01:38:41','2017-06-18 15:38:42',NULL),(2,'Empresa2','Fulano',NULL,NULL,NULL,NULL,NULL,'Inserir Texto','2017-05-01 01:38:41','2017-05-01 01:38:41',NULL),(3,'Empresa3','Fulano',NULL,NULL,NULL,NULL,NULL,'Inserir Texto','2017-05-01 01:38:41','2017-05-19 23:17:35','2017-05-19 23:17:35'),(22,'Adelgraf','Adelson',NULL,'adelson@teste.com.br','(71) 9999-55445',NULL,NULL,'Inserir Texto','2017-05-07 18:11:14','2017-05-19 23:14:40',NULL),(23,'Empresa5','Fulano',NULL,NULL,NULL,NULL,NULL,'Inserir Texto','2017-05-07 23:20:01','2017-05-08 01:23:25','2017-05-08 01:23:25'),(25,'Colégio Mendel','Bete','123456789','bete@mendel.com.br','(71) 9987-84545','(71) 9995-55444','Central','~Teste...','2017-05-19 23:11:40','2017-05-19 23:11:40',NULL),(26,'Tecnosites','Paulo Reis',NULL,'pauloreisprofissional@gmail.com','(71) 9992-42794',NULL,NULL,NULL,'2017-06-16 03:53:30','2017-06-16 03:53:30',NULL),(27,'iuhiuhiuh','iuhiuh','iuhiuhiu','iuhiuh','(87) 6876-87687','(76) 8768-76876','uyiuyiu','yiuyiu','2017-06-17 22:44:14','2017-06-17 22:45:34','2017-06-17 22:45:34'),(28,'Angelica Sá da Silva',NULL,'012.123.123-99','angelica_tifany@hotmail.com','(71) 9992-24250',NULL,NULL,'Cliente de balcão','2017-06-18 15:33:37','2017-06-18 15:33:37',NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `displays`
--

DROP TABLE IF EXISTS `displays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `displays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `displays`
--

LOCK TABLES `displays` WRITE;
/*!40000 ALTER TABLE `displays` DISABLE KEYS */;
/*!40000 ALTER TABLE `displays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Galeria teste 1 - modificado','b0603bc21cc4ae7b3c2c9b1168b13589e057ec5a.jpg','2017-05-07 23:26:32','2017-05-14 07:53:29','2017-05-14 07:53:29'),(2,'Galeria teste 1','294b31597705722c84e3d4ad1bfc1a57e6d27ff6.jpg','2017-05-08 03:09:50','2017-05-08 04:47:24',NULL),(3,'Galeria teste 2','668d7fa6ea62c9a170f9c9440c73138336988d1c.png','2017-05-08 03:10:29','2017-05-08 03:10:29',NULL),(4,'Galeria teste 3','39dbaa1fdc5a6cbf38e0cc759bd3b0a26eaf0c91.png','2017-05-08 03:12:40','2017-05-08 03:12:40',NULL),(5,'Galeria teste 5','','2017-05-08 04:34:28','2017-05-08 04:48:27','2017-05-08 04:48:27'),(6,'Tetstetes','765df379970dfa455aa83ab4b58dc77f6b7294e1.png','2017-05-08 04:37:37','2017-05-08 04:37:37',NULL),(7,'asdfsda','2cc99375bdea0906d4b5031c5fc793147963bf48.jpg','2017-05-08 04:49:23','2017-05-08 04:49:33','2017-05-08 04:49:33'),(8,'sasasasasas','197167a3d0c872b9972856e4e968f848b0f0ba39.png','2017-05-08 04:50:02','2017-05-08 04:50:32','2017-05-08 04:50:32');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries_content`
--

DROP TABLE IF EXISTS `galleries_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_galleries_content_gallery` (`gallery_id`),
  CONSTRAINT `fk_galleries_content_gallery` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries_content`
--

LOCK TABLES `galleries_content` WRITE;
/*!40000 ALTER TABLE `galleries_content` DISABLE KEYS */;
INSERT INTO `galleries_content` VALUES (1,2,NULL,'2017-05-13 23:10:36','2017-05-14 08:00:20','2017-05-14 08:00:20'),(2,NULL,'dd58117091e54ee027c11e29fcf6f534c87ad142.png','2017-05-14 07:03:13','2017-05-14 07:03:13',NULL),(3,NULL,'5e7ba4b158c12ecece8e102168e440e794e8e1cf.png','2017-05-14 07:14:22','2017-05-14 07:14:22',NULL),(4,NULL,'5a9ff8bf07598d9e69cef8298948d66295a869a3.png','2017-05-14 07:20:02','2017-05-14 07:20:02',NULL),(5,2,'89acaca083fcd6f8bf575d89bc8c107a5e9c0fee.jpg','2017-05-14 07:31:54','2017-05-14 07:31:54',NULL),(6,2,'821640fab118d967a7362b9c43e13c9bca855822.jpg','2017-05-14 07:40:20','2017-05-14 07:40:20',NULL),(7,2,'22d0fa6fc31c5d0158db063dd25623266b72576e.jpg','2017-05-14 07:40:21','2017-05-14 08:00:33','2017-05-14 08:00:33'),(8,2,'009da705ee37e4ad8da4488c84a357a1a77e474c.jpg','2017-05-14 07:40:21','2017-05-14 07:40:21',NULL),(9,2,'ef19d465a585789e089722e1e0c3ad658d112ff8.jpg','2017-05-14 07:40:22','2017-05-14 07:40:22',NULL),(10,2,'b9339bad3eedf9702e265ca2f18d83827a983ea2.jpg','2017-05-14 07:40:22','2017-05-14 07:40:22',NULL),(11,2,'0eb46f19e1d1fb2e74390ae9b03d876abbea773e.jpg','2017-05-14 07:40:23','2017-05-14 07:40:23',NULL),(12,6,'f10ca71f25251f102225808ad61a22f5d119c19a.jpg','2017-05-14 08:01:13','2017-05-14 08:01:13',NULL),(13,6,'a051006dc1cdb971db2b14582f9405beab9b88d5.jpg','2017-05-14 08:01:14','2017-05-14 08:01:14',NULL),(14,6,'5a8a980acf6feb777d8078b6cec2c004b5e51e4c.jpg','2017-05-14 08:01:14','2017-05-14 08:01:14',NULL),(15,6,'83cd3ba0a946869edc5c74c6a54901977dc2f1e9.jpg','2017-05-14 08:01:15','2017-05-14 08:01:15',NULL),(16,6,'d2c5bd26e11b37f00db40f3fb4d187dbf4be2622.jpg','2017-05-14 08:01:16','2017-05-14 08:01:16',NULL),(17,6,'f805423a0ba1d2218b35bc4db5d7f8d5f86006e2.jpg','2017-05-14 08:01:16','2017-05-14 08:01:16',NULL);
/*!40000 ALTER TABLE `galleries_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text,
  `text` longtext,
  `author` varchar(255) DEFAULT NULL,
  `hat` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Notícia Exemplo 100','Isso é apenas um teste','<p>Isso &eacute; apenas um teste, n&atilde;o leve a s&eacute;rio...</p>','Dono do Websites','Teste','1d7d240215ce81a76000bbdfeaa56697f62c763b.jpg','Teste','2017-05-01 01:38:41','2017-05-01 22:48:27',NULL),(2,'Notícia Exemplo 2','Isso é apenas um teste','Isso é apenas um teste, não leve a sério...','Dono do Websites','Teste',NULL,'Teste','2017-05-01 01:38:41','2017-05-01 01:38:41',NULL),(3,'Notícia Exemplo 3','Isso é apenas um teste','Isso é apenas um teste, não leve a sério...','Dono do Websites','Teste',NULL,'Teste','2017-05-01 01:38:41','2017-05-01 01:38:41',NULL),(4,'Notícia Exemplo 4','Isso é apenas um teste','Isso é apenas um teste, não leve a sério...','Dono do Websites','Teste',NULL,'Teste','2017-05-01 01:38:41','2017-05-07 16:43:45','2017-05-07 16:43:45'),(5,'Teste pelo CMS 1','Teste de resumo','<p>Teste</p>',NULL,NULL,NULL,NULL,'2017-05-01 19:19:50','2017-05-01 19:19:50',NULL),(6,'Teste pelo CMS 2','Teste de Resumo','<p>Teste de Resumo <span style=\"background-color: #ff0000; color: #ffffff;\">Colorido</span></p>',NULL,NULL,NULL,NULL,'2017-05-01 19:21:25','2017-05-01 19:21:25',NULL),(7,'Notícia Exemplo 1','Isso é apenas um teste','<p><strong>Bras&iacute;lia</strong> &ndash; Em depoimento sigiloso &agrave; Justi&ccedil;a Eleitoral, a empres&aacute;ria M&ocirc;nica Moura definiu a Odebrecht como um &ldquo;quarto poder&rdquo; que expandiu sua atua&ccedil;&atilde;o para todas as &aacute;reas no Brasil e pagou &ldquo;todo mundo&rdquo;.&nbsp;Bras&iacute;lia &ndash; Em depoimento sigiloso &agrave; Justi&ccedil;a Eleitoral, a empres&aacute;ria M&ocirc;nica Moura definiu a Odebrecht como um &ldquo;quarto poder&rdquo; que expandiu sua atua&ccedil;&atilde;o para todas as &aacute;reas no Brasil e pagou &ldquo;todo mundo&rdquo;.</p>\r\n<p>Bras&iacute;lia &ndash; Em depoimento sigiloso &agrave; Justi&ccedil;a Eleitoral, a empres&aacute;ria M&ocirc;nica Moura definiu a Odebrecht como um &ldquo;quarto poder&rdquo; que expandiu sua atua&ccedil;&atilde;o para todas as &aacute;reas no Brasil e pagou &ldquo;todo mundo&rdquo;.</p>',NULL,NULL,NULL,NULL,'2017-05-01 19:54:32','2017-05-01 19:54:32',NULL),(8,'Notícia Exemplo 1','Isso é apenas um teste','<p>Isso &eacute; apenas um teste, n&atilde;o leve a s&eacute;rio...</p>',NULL,NULL,NULL,NULL,'2017-05-01 19:54:51','2017-05-01 19:54:51',NULL),(9,'Notícia Exemplo 1','Isso é apenas um teste','<p>Bras&iacute;lia &ndash; Em depoimento sigiloso &agrave; Justi&ccedil;a Eleitoral, a empres&aacute;ria M&ocirc;nica Moura definiu a <a href=\"http://exame.abril.com.br/noticias-sobre/odebrecht\"><strong>Odebrecht</strong></a> como um &ldquo;quarto poder&rdquo; que expandiu sua atua&ccedil;&atilde;o para todas as &aacute;reas no Brasil e pagou &ldquo;todo mundo&rdquo;.</p>',NULL,NULL,NULL,NULL,'2017-05-01 19:55:13','2017-05-01 20:30:54','2017-05-01 20:30:54'),(10,'Teste pelo CMS 3','Teste de Resumo','<p>Resumo teste</p>',NULL,NULL,NULL,NULL,'2017-05-01 20:33:02','2017-05-01 20:33:02',NULL),(11,'Teste pelo CMS 4','Teste','<p>Teste</p>',NULL,NULL,NULL,NULL,'2017-05-01 20:33:22','2017-05-01 20:33:22',NULL),(12,'Teste pelo CMS 5','Teste','<p>Teste</p>',NULL,NULL,NULL,NULL,'2017-05-01 20:33:37','2017-05-01 20:33:37',NULL),(13,'sfsadfas','asdfasdf','<p>asdfasdfa</p>',NULL,NULL,'C:\\xampp\\tmp\\php51D8.tmp',NULL,'2017-05-01 21:40:33','2017-05-01 21:40:33',NULL),(14,'asdfasfa','asdfasdfa','<p>asdfaafas</p>',NULL,NULL,'C:\\xampp\\tmp\\phpFF50.tmp',NULL,'2017-05-01 21:41:17','2017-05-01 21:41:17',NULL),(15,'fasfasdf','asdfasdfa','<p>asdfasdfa</p>',NULL,NULL,'C:\\xampp\\tmp\\php944A.tmp',NULL,'2017-05-01 21:46:17','2017-05-01 21:46:17',NULL),(16,'asdfasdfaasdf','asdfasdfas','<p>asdfasdfas</p>',NULL,NULL,'C:\\xampp\\tmp\\phpA955.tmp',NULL,'2017-05-01 21:47:28','2017-05-01 21:47:28',NULL),(17,'aasfasdfa','asdfasfa','<p>asdfasfsaf</p>',NULL,NULL,'C:\\xampp\\tmp\\phpD662.tmp',NULL,'2017-05-01 21:50:56','2017-05-01 21:50:56',NULL),(18,'asdfasdf','asdfasdfasdfasdf','<p>asdfasdfasdfasdf</p>',NULL,NULL,'d50ce9aae22eaea52dec8ef3b98bf73d6eb40c46.jpg',NULL,'2017-05-01 21:52:02','2017-05-01 22:15:28',NULL),(19,'Agora vai','dfsafa','<p>asdfasdfas</p>',NULL,NULL,'C:\\xampp\\tmp\\php44CF.tmp',NULL,'2017-05-01 21:54:41','2017-05-01 21:57:19','2017-05-01 21:57:19'),(20,'kljaskljdjfl asdljjlfasds','alsjdlfk askj fdal jsdljfaja','<p>asdjlfa sldf allsdflj as</p>',NULL,NULL,'fc6ca7a9b2ee40bf6c41c2ed0adbc0927c879f7b.jpg',NULL,'2017-05-01 21:55:42','2017-05-01 21:57:13','2017-05-01 21:57:13'),(21,'Teste final com imagem','sfsdfasdf','<p>sdfasdfasdfa</p>',NULL,NULL,'2ebe68aca85ffb80ff17c7f98635de6f4efd1796.jpg',NULL,'2017-05-01 22:53:28','2017-05-01 22:53:28',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'Hospital Aliança','cc78bee2d31c75be379d03e686cf8442edc11c96.png','O Hospital Aliança é uma das maiores referências em Saúde na Bahia e há mais de 15 anos confia toda a sua demanda de impressos à Gráfica Falcão','2017-05-02 01:57:20','2017-07-13 22:36:01',NULL),(2,'Ivan Joias','47f85eb333d2c020fb11fc6d2da0ebec0c3ed995.png','A Ivan Joias sabe que além de um ótimo produto, uma boa comunicação visual faz toda a diferência e por isso escolheu a Gráfica Falcão como seu parceiro.','2017-05-08 01:28:02','2017-07-13 22:35:46',NULL),(3,'Clínica do olho','a1b634b3053a6751c85c66c3a151e7425862daff.jpg','Quem mais entende de visão sabe o quão importante é ter uma imagem forte e sólida e por isso a Clínica do olho figura há mais de 10 anos entre nossos principais parceiros.','2017-05-08 01:28:02','2017-07-13 22:37:02',NULL),(4,'Bahia Marina','ea7b0c3332f59ab7428ccd12f8b96533c3c43baf.png','A Bahia Marina é um centro de lazer náutico situado em Salvador que possui infraestrutura completa para embarcações e disponibiliza vagas para clientes e visitantes','2017-05-08 01:28:02','2017-07-13 22:38:42',NULL),(5,'Colégio Mendel','9c143b25411d0c70c066afb65581bd068e614999.png','O Colégio Mendel vem desde 1997 revolucionando a educação com o seu inovador projeto pedagógico sintonizado com os novos tempos.','2017-05-08 01:28:02','2017-07-14 19:37:54',NULL),(6,'Ortobom','8f5dc2f5edab2c0ffe3ab1db64aadc948283eec9.png','Há mais de 40 anos a Ortobom vem revolucionando o mercado com produtos de altíssima qualidade que proporcionam conforto e bem-estar a aos seus clientes','2017-05-08 01:28:02','2017-07-14 19:37:11',NULL),(7,'FIEB','b6cc07ff9117c6823dc796c28d3529c564323c3c.png','Sistema FIEB é um órgão de representação institucional da indústria baiana, tendo como objetivos promover e apoiar ações que visam o crescimento industrial do Estado','2017-07-13 22:50:03','2017-07-13 22:50:42',NULL),(8,'Vilas Fitness','a0ea23f25f00dfcb63e1449448e8ac00b540b412.png','A Vilas Fitness é hoje uma das mais modernas academias de Salvador e Região metropolitana e é frequentada por diversos artistas e personalidades baianas.','2017-07-13 22:53:10','2017-07-13 22:53:10',NULL),(9,'Grupo Coelho','a2862b273a2dfb27b3e24e736a2e7398539849c9.png','Com mais de 14 anos de história o grupo Coelho atua na área de entretenimento e produção musical/artística, tendo como seu maior Case o Grande Adelmario Coelho.','2017-07-13 22:56:51','2017-07-13 22:56:51',NULL);
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (5,'pauloreisprofissional@gmail.com','$2y$10$Jfo3h7norx2YgzcY/Itrku7RyEZooVi2KkbXJaGTVFS3mW66vqTMm','2017-05-15 03:27:37',NULL);
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printers`
--

DROP TABLE IF EXISTS `printers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `printers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printers`
--

LOCK TABLES `printers` WRITE;
/*!40000 ALTER TABLE `printers` DISABLE KEYS */;
INSERT INTO `printers` VALUES (1,'XEROX WorkCentre 7545','2017-05-26 16:33:42','2017-05-26 16:33:43',NULL),(2,'ADAST 4 cores','2017-06-21 17:08:47','2017-06-21 17:08:47',NULL),(3,'SPEEDMASTER 2 cores','2017-06-21 17:09:39','2017-06-21 17:09:39',NULL),(4,'GTO 4 cores','2017-06-21 17:09:49','2017-06-21 17:09:49',NULL),(5,'GTO 2 cores','2017-06-21 17:09:56','2017-06-21 17:09:56',NULL),(6,'ADAST 1 cor','2017-06-21 17:10:18','2017-06-21 17:10:18',NULL),(7,'FUJI 1 cor','2017-06-21 17:10:24','2017-06-21 17:10:25',NULL),(8,'Ricoh 9001','2017-06-21 17:23:29','2017-06-21 17:23:30',NULL),(9,'Riso RZ 370UP','2017-06-21 17:26:35','2017-06-21 17:26:35',NULL),(10,'EPSON L365','2017-06-21 17:26:57','2017-06-21 17:26:57',NULL);
/*!40000 ALTER TABLE `printers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prints`
--

DROP TABLE IF EXISTS `prints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `printer_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_others` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `print_date` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `observations` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prints_customer` (`customer_id`),
  KEY `fk_prints_printer` (`printer_id`),
  CONSTRAINT `fk_prints_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_prints_printer` FOREIGN KEY (`printer_id`) REFERENCES `printers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prints`
--

LOCK TABLES `prints` WRITE;
/*!40000 ALTER TABLE `prints` DISABLE KEYS */;
INSERT INTO `prints` VALUES (1,1,22,NULL,'Bloco Grande Bahia','2017-06-02',1,0,'Teste','2017-06-02 18:52:14','2017-06-02 18:52:14',NULL),(2,1,NULL,'Julio Bispo (Prefeitura)','Cartaz semana das artes','2017-03-08',50,4,'A pedido de Fulano','2017-06-02 19:20:09','2017-06-02 19:50:12',NULL),(3,1,NULL,'Guia de Vilas','Montagem Guia de Vilas','2017-06-01',2,1,'Prova de cor','2017-06-02 19:22:07','2017-06-02 19:22:38','2017-06-02 19:22:38'),(4,1,2,NULL,'Teste','2017-06-05',5,3,'fasdfa','2017-06-02 20:15:15','2017-06-02 20:15:35','2017-06-02 20:15:35'),(5,1,22,NULL,'Placa João','2017-06-02',10,1,NULL,'2017-06-02 21:22:11','2017-06-02 21:22:11',NULL),(6,1,2,NULL,'lkjldfkajslkfja','2001-01-01',10,6,'lsjldfkjaslkf','2017-06-17 22:46:54','2017-06-17 22:47:29','2017-06-17 22:47:29'),(7,1,2,NULL,'Teste de impressão','2017-02-06',6,2,'Teste','2017-10-23 04:06:10','2017-10-23 04:06:10',NULL);
/*!40000 ALTER TABLE `prints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) DEFAULT NULL,
  `responsible` varchar(255) DEFAULT NULL,
  `document` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `main_phone` char(15) DEFAULT NULL,
  `secondary_phone` char(15) DEFAULT NULL,
  `address` text,
  `observations` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (26,'Empresa teste 1','Fulano de Tal','123.123.123/0001-54','fulanodetal@empresateste1.com.br','(71) 9115-42454','(71) 6454-12155','Alameda das Espatódias, 555, Caminho das Árvores, Salvador - Bahia\r\nCEP: 43874-544',NULL,'2017-05-25 19:49:33','2017-05-25 19:49:33',NULL),(27,'Empresa teste 2','Fulano de Tal','123.123.123/0001-54','fulanodetal@empresateste1.com.br','(71) 9115-42454','(71) 6454-12155','Alameda das Espatódias, 555, Caminho das Árvores, Salvador - Bahia\r\nCEP: 43874-544',NULL,'2017-05-25 19:49:33','2017-05-25 19:49:33',NULL),(28,'Empresa teste 3','Fulano de Tal','123.123.123/0001-54','fulanodetal@empresateste1.com.br','(71) 9115-42454','(71) 6454-12155','Alameda das Espatódias, 555, Caminho das Árvores, Salvador - Bahia\r\nCEP: 43874-544',NULL,'2017-05-25 19:49:33','2017-05-25 19:49:33',NULL),(29,'Empresa teste 4','Fulano de Tal','123.123.123/0001-54','fulanodetal@empresateste1.com.br','(71) 9115-42454','(71) 6454-12155','Alameda das Espatódias, 555, Caminho das Árvores, Salvador - Bahia\r\nCEP: 43874-544',NULL,'2017-05-25 19:49:33','2017-05-25 20:02:14',NULL),(30,'Empresa teste 5','Fulano de Tal','123.123.123/0001-54','fulanodetal@empresateste1.com.br','(71) 9115-42454','(71) 6454-12155','Alameda das Espatódias, 555, Caminho das Árvores, Salvador - Bahia\r\nCEP: 43874-544',NULL,'2017-05-25 19:49:33','2017-05-25 19:49:33',NULL),(31,'Empresa teste 0','Beltrano de Tal','123.123.123/0001-44','beltrano@empresatestezero.com.br','(71) 5545-4244','(71) 5545-4554',NULL,NULL,'2017-05-25 19:54:59','2017-05-25 19:54:59',NULL),(32,'Teste','iuhiuhiu','iuhiuhiuh','iuhiuhiuh','(87) 6876-86876','(87) 6876-87687','jhgjhgjhg','kkkh','2017-06-17 22:45:55','2017-06-17 22:46:21','2017-06-17 22:46:21');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `observations` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_purchases_supply` (`supply_id`),
  CONSTRAINT `fk_purchases_supply` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (38,1,50,NULL,'2017-06-05 03:58:43','2017-06-05 03:58:43',NULL),(39,1,20,NULL,'2017-06-05 03:59:23','2017-06-05 03:59:23',NULL),(40,4,100,NULL,'2017-06-07 03:37:42','2017-06-07 03:37:42',NULL),(41,1,150,NULL,'2017-06-14 03:47:19','2017-06-14 03:47:19',NULL),(42,5,1250,'5 pacotes de 250 unidades','2017-06-17 22:48:16','2017-06-17 22:48:16',NULL),(43,13,5000,NULL,'2017-06-18 15:40:20','2017-06-18 15:40:20',NULL);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Coca Cola','b24daf401f071403a960182d801a52b4dfd68d0e.png',NULL,'2017-05-02 01:57:20','2017-07-14 17:12:43','2017-07-14 17:12:43'),(3,'Teste','8768c6cc96aee2dd07ea6df80f1c5e765b716ab1.png',NULL,'2017-05-08 01:28:02','2017-05-08 01:36:15','2017-05-08 01:36:15'),(4,'Papelaria Institucional','118557a129b1ef4f5adc23e29dd11a7a525bbc9c.jpg','Cartões de visitas, Papéis e envelopes timbrados, Pastas, Crachás e muito mais','2017-07-14 17:12:04','2017-07-14 17:12:51',NULL),(5,'Folders','233ff8c860d569c4e09a82048ea8e010ec1dec22.jpg','Folders com 1, 2 ou mais dobras, nos mais variados tipos e gramaturas de papéis','2017-07-14 17:21:32','2017-07-14 17:21:32',NULL),(6,'Livros','c02196a6f183aa8bf1b40e7216db07eefe9946fa.jpg','Produzimos livros em diversos formatos, papeis e acabamentos especiais','2017-07-14 17:22:16','2017-07-14 17:22:41',NULL),(7,'Jornais e Revistas','f572c1d9c70391026721e423b1f3c2837a0f6671.jpg','Produzimos de jornais de bairro à revistas com acabamento especial','2017-07-14 17:23:28','2017-07-14 17:23:28',NULL),(8,'Panfletos e encartes','faef7795cc2cba53395646496817a1a171e648cc.jpg','Panfletos de diversos tamanhos e materiais com um preço super especial','2017-07-14 17:23:43','2017-07-14 17:23:43',NULL),(9,'Sacolas personalizadas','ee37e127911d0cbe3438c0c916a9b79c18619335.jpg','Produzimos sacolas nos mais variados formatos com a sua marca!','2017-07-14 17:24:12','2017-07-14 17:24:12',NULL),(10,'Blocos, Talões e Comandas','5a5ff7b919001ec71804fa51ddc3882678b54c14.jpg','Profissionalize o seu negócio com blocos personalizados com a sua marca','2017-07-14 17:54:38','2017-07-14 17:54:38',NULL),(11,'Cardápios','914596b75323016aac30d332914ebf81c9448dd1.jpg','Cardápios de alta qualidade para os mais variados tipos de estabelecimentos','2017-07-14 17:59:19','2017-07-14 17:59:19',NULL),(12,'Caixas personalizadas','d3477b73a77e9ad843e281421783376a6d9bf78f.jpg','Caixas personalizadas com os mas variados tipos de papel e acabamento','2017-07-14 18:07:46','2017-07-14 18:07:46',NULL),(13,'Agendas e Cadernos','ae0e9fd3cac3b636da37ebd5bb81faaa096b87a1.jpg','Agendas de vários tamanhos e tipos personalizadas com a sua marca','2017-07-14 18:46:36','2017-07-14 18:46:36',NULL),(14,'Envelopes e Convites','c4a2bfc2013e2784f533ee0efd5d633a82ddcf95.jpg','Envelopes e Convites com os mais diversos tamanhos e acabamento','2017-07-14 18:49:22','2017-07-14 18:49:22',NULL),(15,'Calendários','1b8009305263dba320bf75a1b01b8d71705c83d0.jpg','Deixe seus clientes acompanharem a sua empresa o ano todo','2017-07-14 18:52:46','2017-07-14 18:53:32',NULL),(16,'Adesivos','0ba5abafbe445c96796235649b9276e5f3bf65ad.jpg','Personalize seus produtos com adesivos de alta qualidade','2017-07-14 19:26:09','2017-07-14 19:26:09',NULL),(17,'Pastas','656c8ec860fd308138ecc5225b53335ac9d859d0.jpg','Transporte seus documentos em pastas com a sua marca','2017-07-14 19:30:02','2017-07-14 19:31:58',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_orders`
--

DROP TABLE IF EXISTS `services_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `description` text,
  `quantity` varchar(255) DEFAULT NULL,
  `colors_front` tinyint(4) DEFAULT NULL,
  `colors_back` tinyint(4) DEFAULT NULL,
  `paper_type` varchar(50) DEFAULT NULL,
  `art_size` varchar(50) DEFAULT NULL,
  `printer` int(11) DEFAULT NULL,
  `workmanship` varchar(50) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `observations` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prints_customer` (`customer_id`),
  KEY `services_orders_printer` (`printer`),
  CONSTRAINT `services_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `services_orders_printer` FOREIGN KEY (`printer`) REFERENCES `printers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_orders`
--

LOCK TABLES `services_orders` WRITE;
/*!40000 ALTER TABLE `services_orders` DISABLE KEYS */;
INSERT INTO `services_orders` VALUES (10,22,'Cartões de Visita','1000',4,0,'0',NULL,2,'Verniz localizado','2017-06-19','O cliente reclamou que da última vez o pantone saiu errado','2017-06-17 14:15:55','2017-06-17 14:15:55',NULL),(11,22,'Cartaz Grande Bahia Norte','1000',4,0,'0',NULL,2,'Meio corte','2017-06-24','Teste','2017-06-21 19:36:44','2017-06-21 19:36:44',NULL),(12,3,'Precificador A3','1000',NULL,NULL,NULL,NULL,NULL,'Faca de corte','2017-06-30','Faca está em Epifânio','2017-06-28 13:48:02','2017-06-28 13:48:02',NULL),(13,3,'Cartaz Grande Bahia Norte','1000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-06-28 19:07:15','2017-06-28 19:07:15',NULL);
/*!40000 ALTER TABLE `services_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplies`
--

DROP TABLE IF EXISTS `supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` double(9,2) DEFAULT '0.00',
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplies`
--

LOCK TABLES `supplies` WRITE;
/*!40000 ALTER TABLE `supplies` DISABLE KEYS */;
INSERT INTO `supplies` VALUES (1,'Chapa ADAST (Terra)',220.00,NULL,'2017-05-01 01:38:41','2017-10-23 05:21:32','2017-10-23 05:21:32'),(2,'Chapa GTO (Terra)',0.00,'Teste','2017-05-01 01:38:41','2017-10-23 05:21:35','2017-10-23 05:21:35'),(3,'Chapa SPEED (Terra)',0.00,NULL,'2017-05-01 01:38:41','2017-10-23 05:21:37','2017-10-23 05:21:37'),(4,'Laser Filme',100.00,NULL,'2017-05-07 18:11:14','2017-10-23 05:21:40','2017-10-23 05:21:40'),(5,'Papel AP 24Kg',1250.00,NULL,'2017-05-07 23:20:01','2017-10-23 05:21:43','2017-10-23 05:21:43'),(6,'Papel AP 70g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:21:46','2017-10-23 05:21:46'),(7,'Papel AP 75g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:21:49','2017-10-23 05:21:49'),(8,'Papel AP 90g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:21:51','2017-10-23 05:21:51'),(9,'Papel AP 120g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:21:54','2017-10-23 05:21:54'),(10,'Papel AP 150g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:21:57','2017-10-23 05:21:57'),(11,'Papel AP 180g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:21:59','2017-10-23 05:21:59'),(12,'Papel Couchê Brilho 90g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:02','2017-10-23 05:22:02'),(13,'Papel Couchê Brilho 115g',5000.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:07','2017-10-23 05:22:07'),(14,'Papel Couchê Brilho 145g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:10','2017-10-23 05:22:10'),(15,'Papel Couchê Brilho 180g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:13','2017-10-23 05:22:13'),(16,'Papel Couchê Brilho 220g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:17','2017-10-23 05:22:17'),(17,'Papel Couchê Brilho 250g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:19','2017-10-23 05:22:19'),(18,'Papel Couchê Brilho 300g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:23','2017-10-23 05:22:23'),(19,'Papel Couchê Brilho 350g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:26','2017-10-23 05:22:26'),(20,'Papel Couchê Fosco 90g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:28','2017-10-23 05:22:28'),(21,'Papel Couchê Fosco 115g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:31','2017-10-23 05:22:31'),(22,'Papel Couchê Fosco 145g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:35','2017-10-23 05:22:35'),(23,'Papel Couchê Fosco 180g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:38','2017-10-23 05:22:38'),(24,'Papel Couchê Fosco 220g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:40','2017-10-23 05:22:40'),(25,'Papel Couchê Fosco 250g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:45','2017-10-23 05:22:45'),(26,'Papel Couchê Fosco 300g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:48','2017-10-23 05:22:48'),(27,'Papel Couchê Fosco 350g',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:50','2017-10-23 05:22:50'),(28,'Chapa ADAST (local)',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:53','2017-10-23 05:22:53'),(29,'Chapa GTO (local)',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:56','2017-10-23 05:22:56'),(30,'Chapa SPEED (local)',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:22:59','2017-10-23 05:22:59'),(31,'Tonner Ricoh 9001',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:23:02','2017-10-23 05:23:02'),(32,'Tinta Duplicador (Preta)',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:23:06','2017-10-23 05:23:06'),(33,'Tinta Duplicador (Azul)',0.00,NULL,'2017-05-19 23:11:40','2017-10-23 05:23:09','2017-10-23 05:23:09'),(34,'Mascara Duplicador Riso',0.00,NULL,'2017-06-04 00:21:56','2017-10-23 05:23:11','2017-10-23 05:23:11'),(35,'Teste 2',0.00,'teste eeee','2017-06-04 00:23:48','2017-06-04 00:26:42','2017-06-04 00:26:42'),(36,'Teste 123123123123',0.00,'ào yyyyyyyyyyyyyyyy','2017-06-17 22:49:15','2017-06-17 22:49:51','2017-06-17 22:49:51'),(37,'Cartão de visitas, 4X4 cores, 300g',80.00,'Papel: Couchê brilho, 300g\r\nTamanho: 4,8 x 8,8 cm\r\nCorte: Reto','2017-10-23 13:36:03','2017-10-23 13:36:03',NULL);
/*!40000 ALTER TABLE `supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `texts`
--

DROP TABLE IF EXISTS `texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texts`
--

LOCK TABLES `texts` WRITE;
/*!40000 ALTER TABLE `texts` DISABLE KEYS */;
INSERT INTO `texts` VALUES (1,'Conheça a Gráfica Falcão','<p>\"N&atilde;o existem sonhos imposs&iacute;ves para aqueles que realmente acreditam que o poder realizador reside no ineror de cada ser humano. Sempre que algu&eacute;m descobre esse poder algo, antes considerado imposs&iacute;vel, se torna realidade.\" (Albert Einstein)</p>\r\n<p>A Gr&aacute;fica Falc&atilde;o &eacute; a realiza&ccedil;&atilde;o de um sonho!!! Um sonho de dois irm&atilde;os que recome&ccedil;aram do zero e que acreditaram que nada &eacute; imposs&iacute;vel aos olhos de Deus!!!</p>\r\n<p>A escolha do nome \"FALC&Atilde;O\" foi determinante para que nossa jornada fosse vitoriosa. Simboliza o poder!!! Sua vis&atilde;o e audi&ccedil;&atilde;o s&atilde;o impec&aacute;veis. &Eacute; considerado a ave mais veloz do mundo. &Eacute; capaz de mergulhar no ar com velicidades acim dos 300Km/h para alcan&ccedil;ar sua presa. A rapidez e precis&atilde;o de seus v&ocirc;os s&atilde;o inigual&aacute;veis...</p>\r\n<p>Essa foi a raz&atilde;o do nascimento da \"Gr&aacute;fica Falc&atilde;o\". A vontade de realizar sonhos atrav&eacute;s de id&eacute;ias e cria&ccedil;&otilde;es, buscando sempre a prefei&ccedil;&atilde;o e pontualidade. Nossa caminhada j&aacute; dura 25 anos de muita luta e dedica&ccedil;&atilde;o e continuamos sonhando porque realizar sonhos &eacute; renascer das cinzas diariamente.</p>\r\n<p>Nossa meta &eacute; ampliar as parcerias e proporcionar aos nossos clientes e amigos parceiros toda a seguran&ccedil;a, qualidade, pontualidade e tranquilidade que eles merecem!!!</p>','2017-05-01 20:33:02','2017-07-11 23:20:56',NULL),(2,'Missão, Visão e Valores','<h2 style=\"text-align: left;\">Miss&atilde;o</h2>\r\n<p style=\"text-align: left;\">Desenvolver, produzir e comercializar servi&ccedil;os gr&aacute;ficos com qualidade e agilidade, dando aos nossos parceiros a melhor experi&ecirc;ncia do momento da compra ao p&oacute;s venda, garantindo assim a cria&ccedil;&atilde;o de valor e a sustentabilidade do neg&oacute;cio.</p>\r\n<h2 style=\"text-align: left;\">Vis&atilde;o</h2>\r\n<p style=\"text-align: left;\">Ser refer&ecirc;ncia de excel&ecirc;ncia em servi&ccedil;os gr&aacute;ficos no estado da Bahia e ser vista por seus parceiros como um porto seguro em que eles podem confiar.</p>\r\n<h2 style=\"text-align: left;\">Valores</h2>\r\n<p style=\"text-align: left;\">Satisfa&ccedil;&atilde;o total de nossos parceiros. Ele &eacute; a raz&atilde;o de nossa exist&ecirc;ncia;<br />Valoriza&ccedil;&atilde;o e respeito &agrave;s pessoas. A Gr&aacute;fica Falc&atilde;o &eacute; feita por pessoas e para pessoas.<br />Responsabilidade Social. &Eacute; a &uacute;nica forma de crescer em uma sociedade mais justa.<br />Respeito ao meio ambiente. Entendemos que &eacute; responsabilidade de todos n&oacute;s zelar pelo nosso lar e deixar um mundo melhor para os nossos descendentes.</p>','2017-07-11 20:51:40','2017-07-11 23:17:08',NULL),(3,'Orçamentos','Consulte nossos preços e condições de pagamento e surpreenda-se.','2017-07-14 18:56:04','2017-07-14 18:56:05',NULL),(4,'Nossos serviços','Veja como a Gráfica Falcão pode ajudar sua empresa a vender mais.','2017-07-14 18:56:32','2017-07-14 18:56:32',NULL),(5,'Nossos parceiros','Em seus mais de 24 anos no mercado a Gráfica Falcão vem colecionando elogios e parceiros satisfeitos em todo o estado','2017-07-14 18:57:07','2017-07-14 18:57:07',NULL),(6,'Fale conosco','Ainda restou alguma dúvida? Ligue para a nossa central de atendimento ou preencha e nos envie o formuário abaixo','2017-07-14 18:57:45','2017-07-14 18:57:45',NULL);
/*!40000 ALTER TABLE `texts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `url` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'falcao_erp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-23  7:38:53
