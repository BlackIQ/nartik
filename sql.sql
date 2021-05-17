DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1, '0491599690','Majid','Mohammadi','09192186255','majid@gmail.com','mrmajid');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1, '0481111111', 'Meysam','Mirzaee','09123438281','meysam@yahoo.com', 'Meysam-M', 'Apr 20, 2021 10:40:50', 'Narbon', 'mrmeysam' , 'user');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `tiks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiks`
(
    `row`     int(11) NOT NULL AUTO_INCREMENT,
    `userid`  text COLLATE utf8mb4_unicode_ci,
    `tikid`  text COLLATE utf8mb4_unicode_ci,
    `title`   text COLLATE utf8mb4_unicode_ci,
    `explane` text COLLATE utf8mb4_unicode_ci,
    `company` text COLLATE utf8mb4_unicode_ci,
    `dt`    text COLLATE utf8mb4_unicode_ci,
    `dl`    text COLLATE utf8mb4_unicode_ci,
    `file`    text COLLATE utf8mb4_unicode_ci,
    `total`   text COLLATE utf8mb4_unicode_ci,
    `answer`   text COLLATE utf8mb4_unicode_ci,
    `status`  text COLLATE utf8mb4_unicode_ci,
    PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;