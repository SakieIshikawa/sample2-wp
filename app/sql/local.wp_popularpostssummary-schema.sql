/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_popularpostssummary` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `postid` bigint(20) NOT NULL,
  `pageviews` bigint(20) NOT NULL DEFAULT '1',
  `view_date` date NOT NULL,
  `view_datetime` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `postid` (`postid`),
  KEY `view_date` (`view_date`),
  KEY `view_datetime` (`view_datetime`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
