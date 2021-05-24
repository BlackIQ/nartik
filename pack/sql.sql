-- Admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin` WRITE;
INSERT INTO `admin` VALUES (1, 'milad', 'milad', 'Milad', 10);
INSERT INTO `admin` VALUES (2, 'narbon', 'narbon', 'Narbon', 20);
UNLOCK TABLES;

-- People
DROP TABLE IF EXISTS `people`;
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
  `uid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Company
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `company` WRITE;
INSERT INTO `company` VALUES (1, '123', 'Google', 2, 10);
INSERT INTO `company` VALUES (2, '456', 'Facebook', 3, 20);
INSERT INTO `company` VALUES (3, '789', 'Twitter', 4, 10);
INSERT INTO `company` VALUES (4, '987', 'Microsoft', 5, 20);
INSERT INTO `company` VALUES (5, '654', 'Vania', 2, 10);
INSERT INTO `company` VALUES (6, '321', 'Green', 1, 20);
UNLOCK TABLES;

-- Tikets
DROP TABLE IF EXISTS `tiks`;
CREATE TABLE `tiks`
(
    `row`     int(11) NOT NULL AUTO_INCREMENT,
    `userid`  text COLLATE utf8mb4_unicode_ci,
    `tikid`  text COLLATE utf8mb4_unicode_ci,
    `title`   text COLLATE utf8mb4_unicode_ci,
    `explane` text COLLATE utf8mb4_unicode_ci,
    `company` text COLLATE utf8mb4_unicode_ci,
    `uid` text COLLATE utf8mb4_unicode_ci,
    `dt`    text COLLATE utf8mb4_unicode_ci,
    `dl`    text COLLATE utf8mb4_unicode_ci,
    `file`    text COLLATE utf8mb4_unicode_ci,
    `total`   text COLLATE utf8mb4_unicode_ci,
    `answer`   text COLLATE utf8mb4_unicode_ci,
    `status`  text COLLATE utf8mb4_unicode_ci,
    PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;