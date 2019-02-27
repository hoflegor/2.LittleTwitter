<?php
//Zapisz w poniższej zmiennej kod zapytania SQL tworzącego pierwszą tabelę
$queryCreateTable1 = '
CREATE TABLE cinemas(
id_cinemas INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) NOT NULL ,
address VARCHAR (255) NOT NULL ,
PRIMARY KEY (id_cinemas)
);
';

//Zapisz w poniższej zmiennej kod zapytania SQL tworzącego drugą tabelę
$queryCreateTable2 = '
CREATE TABLE movies (
id_movies INT NOT NULL AUTO_INCREMENT ,
name VARCHAR (255) NOT NULL ,
description VARCHAR (255) NOT NULL ,
rating DECIMAL (12,2),
PRIMARY KEY (id_movies)
);
';

//Zapisz w poniższej zmiennej kod zapytania SQL tworzącego trzecią tabelę
$queryCreateTable3 = '
CREATE TABLE tickets (
id_tickets INT AUTO_INCREMENT ,
quantity INT,
price DECIMAL (5,2),
PRIMARY KEY (id_tickets)
);
';

//Zapisz w poniższej zmiennej kod zapytania SQL tworzącego czwartą tabelę
$queryCreateTable4 = '
CREATE TABLE payments (
id_payments INT AUTO_INCREMENT ,
type VARCHAR (255),
date DATE,
PRIMARY KEY (id_payments)
);
';