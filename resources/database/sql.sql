/*
    Database name: nartik;

    Amirhossein Mohamadi.

    https://BlackIQ.ir
    https://github.com/BlackIQ
*/

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company`
(
    `row`  int(11) NOT NULL AUTO_INCREMENT,
    `id`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
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
    `password`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `type`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `tiks`
--

DROP TABLE IF EXISTS `tiks`;
CREATE TABLE `tiks`
(
    `row`     int(11) NOT NULL AUTO_INCREMENT,
    `userid`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tikid`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `title`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `explane` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `dt`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `file`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `answer`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);