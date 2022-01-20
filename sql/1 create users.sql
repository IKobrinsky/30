CREATE TABLE `users` (
  `usrID` int(11) NOT NULL AUTO_INCREMENT,
  `usrLogin` varchar(32) CHARACTER SET latin1 NOT NULL,
  `usrPassword` varchar(32) DEFAULT NULL,
  `usrHash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`usrID`),
  UNIQUE KEY `users_login` (`usrLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
