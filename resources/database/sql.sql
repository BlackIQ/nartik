DROP TABLE IF EXISTS `company`;
CREATE TABLE `company`
(
    `row`  int(11) AUTO_INCREMENT,
    `id`   text,
    `name` text,
    PRIMARY KEY (`row`)
);

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people`
(
    `row`       int(11) AUTO_INCREMENT,
    `id`        text,
    `firstname` text,
    `lastname`  text,
    `phone`     text,
    `email`     text,
    `username`  text,
    `dt`        text,
    `company`   text,
    `password`  text,
    `type`      text,
    PRIMARY KEY (`row`)
);

DROP TABLE IF EXISTS `tiks`;
CREATE TABLE `tiks`
(
    `row`     int(11) AUTO_INCREMENT,
    `userid`  text,
    `tikid`   text,
    `title`   text,
    `explane` text,
    `company` text,
    `dt`      text,
    `file`    text,
    `answer`  text,
    `status`  text,
    PRIMARY KEY (`row`)
);