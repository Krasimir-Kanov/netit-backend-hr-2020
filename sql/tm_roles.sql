CREATE TABLE kkanov.tm_roles (
id INTEGER auto_increment PRIMARY KEY,
title VARCHAR (256) NOT NULL
);

INSERT INTO kkanov.tm_roles(title) VALUES ('EMPLOY');
INSERT INTO kkanov.tm_roles(title) VALUES ('EMPLOYER');
INSERT INTO kkanov.tm_roles(title) VALUES ('ADMIN');
INSERT INTO kkanov.tm_roles(title) VALUES ('HR');
