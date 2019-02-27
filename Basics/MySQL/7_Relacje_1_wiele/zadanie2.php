<?php
//zapisz poniżej zapytania tworzące odpowiednie tabele
$queryAddCategories = '
CREATE TABLE Categories (
id_categories INT AUTO_INCREMENT,
name VARCHAR (255),
PRIMARY KEY (id_categories)
)
';

$queryAddCategoriesSub = '
CREATE TABLE Categories_sub(
id_categoriesSub INT AUTO_INCREMENT,
main_id INT,
name VARCHAR (255),
PRIMARY KEY (id_categoriesSub),
FOREIGN KEY (main_id) REFERENCES Categories(id_categories)
ON DELETE CASCADE
)
';

$queryRelationTable = 'SELECT * FROM Categories JOIN Categories_sub ON Categories.id_categories=Categories_sub.main_id';
