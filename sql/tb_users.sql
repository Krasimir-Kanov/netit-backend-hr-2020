CREATE TABLE kkanov.tb_users(
id INTEGER AUTO_INCREMENT PRIMARY KEY,
name     VARCHAR (256),
fname    VARCHAR (256),
lname    VARCHAR (256),
category varchar(256) DEFAULT NULL,
information varchar(256) DEFAULT NULL,
age      VARCHAR (256),
city     VARCHAR (256),
number   VARCHAR (50) ,
email    VARCHAR (256),
password VARCHAR (256)
)

INSERT INTO `kkanov`.`tb_users` (`email`, `password`) VALUES ('admin@gmail.com', '123456');
INSERT INTO `kkanov`.`tb_users` (`email`, `password`) VALUES ('hr@gmail.com', '123456');
