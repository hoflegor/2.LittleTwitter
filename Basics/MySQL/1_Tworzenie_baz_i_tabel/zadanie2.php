<?php
//Zapisz w poniższej zmiennej kod zapytania SQL tworzącego pierwszą tabelę
$queryCreateTable1 = '
CREATE TABLE products(
id_products INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) NOT NULL UNIQUE,
description VARCHAR (255) NOT NULL,
price DECIMAL (10,2) NOT NULL,
PRIMARY KEY (id_  products)
);'
;


//Zapisz w poniższej zmiennej kod zapytania SQL tworzącego drugą tabelę
$queryCreateTable2 = 'CREATE TABLE orders(
id_orders INT NOT NULL AUTO_INCREMENT,
description VARCHAR (255) NOT NULL,
PRIMARY KEY (id_orders)
);'
;

//Zapisz w poniższej zmiennej kod zapytania SQL tworzącego trzecią tabelę
$queryCreateTable3 = '
CREATE TABLE clients(
id_clients INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) NOT NULL ,
surname VARCHAR (255) NOT NULL ,
PRIMARY KEY (id_clients)
);
'
;