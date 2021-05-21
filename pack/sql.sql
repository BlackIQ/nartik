-- Admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admin` WRITE;
INSERT INTO `admin` VALUES (1, '0482222222','Mehrdad','Mirzaee','09366171566','mehrdad@gmail.com','mrmehrdad', 'Milad');
INSERT INTO `admin` VALUES (2, '0481111111','Meysam','Mirzaee','09123432821','meysam@gmail.com','mrmeysam', 'Narbon');
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
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `company` WRITE;
INSERT INTO `company` VALUES (1, '123', 'Milad', 2);
INSERT INTO `company` VALUES (2, '456', 'Narbon', 3);
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
    `dt`    text COLLATE utf8mb4_unicode_ci,
    `dl`    text COLLATE utf8mb4_unicode_ci,
    `file`    text COLLATE utf8mb4_unicode_ci,
    `total`   text COLLATE utf8mb4_unicode_ci,
    `answer`   text COLLATE utf8mb4_unicode_ci,
    `status`  text COLLATE utf8mb4_unicode_ci,
    PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;