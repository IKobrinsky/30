CREATE TABLE `images` (
  `imgID` int(11) NOT NULL AUTO_INCREMENT,
  `imgFileName` varchar(100) NOT NULL,
  `imgUserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`imgID`),
  KEY `Images_FK` (`imgUserID`),
  CONSTRAINT `Images_FK` FOREIGN KEY (`imgUserID`) REFERENCES `users` (`usrID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
