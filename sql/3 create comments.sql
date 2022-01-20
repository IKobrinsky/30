CREATE TABLE `comments` (
  `cmtID` int(11) NOT NULL AUTO_INCREMENT,
  `cmtUserID` int(11) DEFAULT NULL,
  `cmtImageID` int(11) DEFAULT NULL,
  `cmtComment` varchar(200) DEFAULT NULL,
  `cmtTimeStamp` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`cmtID`),
  KEY `Comments_FK` (`cmtUserID`),
  KEY `Comments_FK_1` (`cmtImageID`),
  CONSTRAINT `Comments_FK` FOREIGN KEY (`cmtUserID`) REFERENCES `users` (`usrID`) ON DELETE SET NULL,
  CONSTRAINT `Comments_FK_1` FOREIGN KEY (`cmtImageID`) REFERENCES `images` (`imgID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;