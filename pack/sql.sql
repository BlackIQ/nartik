-- MariaDB dump 10.19  Distrib 10.5.9-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: nartik
-- ------------------------------------------------------
-- Server version	10.5.9-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin`
(
    `row`      int(11) NOT NULL AUTO_INCREMENT,
    `id`       text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `uid`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company`
(
    `row`  int(11) NOT NULL AUTO_INCREMENT,
    `id`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `uid`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people`
(
    `row`       int(11) NOT NULL AUTO_INCREMENT,
    `id`        text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `firstname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `lastname`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `phone`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `username`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `dt`        text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `uid`       text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `type`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiks`
--

DROP TABLE IF EXISTS `tiks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiks`
(
    `row`     int(11) NOT NULL AUTO_INCREMENT,
    `userid`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tikid`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `title`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `explane` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `uid`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `dt`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `dl`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `file`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `total`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `answer`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;