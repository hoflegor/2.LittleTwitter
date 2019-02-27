<?php
$createOpinionTable = '
                        CREATE TABLE Opinions(
                        id_opinion INT NOT NULL AUTO_INCREMENT,
                        id_products INT NOT NULL ,
                        description VARCHAR(255),
                        PRIMARY KEY (id_opinion),
                        FOREIGN KEY (id_products)
                        REFERENCES products (id_products)
                        ON DELETE CASCADE 
                        )                   
                        ';

//poniżej zapisz zapytania dodające rekordy do tabeli
$queryProduct1pinion1 = 'INSERT INTO Opinions (description, id_products) VALUES ("Thought reincarnation and a unconditional heavens of mineral.", 1)';
$queryProduct1pinion2 = "INSERT INTO Opinions (description, id_products) VALUES ('Be strange for whoever dies, because each has been experienced with dimension.', 1)";
$queryProduct1pinion3 = "INSERT INTO Opinions (description, id_products) VALUES ('Ecce, secundus cacula!.', 1)";
$queryProduct1pinion4 = "INSERT INTO Opinions (description, id_products) VALUES ('Terror festus abnoba est.', 1)";
$queryProduct1pinion5 = "INSERT INTO Opinions (description, id_products) VALUES ('Frondator messiss, tanquam superbus ionicis tormento.', 1)";

$queryProduct2pinion1 = "INSERT INTO Opinions (description, id_products) VALUES ('Monss ire in asopus!', 2)";
$queryProduct2pinion2 = "INSERT INTO Opinions (description, id_products) VALUES ('Anchors stutter from fortunes like warm pants.', 2)";
$queryProduct2pinion3 = "INSERT INTO Opinions (description, id_products) VALUES ('Where is the terrifying proton?', 2)";
$queryProduct2pinion4 = "INSERT INTO Opinions (description, id_products) VALUES ('Cannibals travel from madnesses like lively winds.', 2)";
$queryProduct2pinion5 = "INSERT INTO Opinions (description, id_products) VALUES ('Planets malfunction with understanding!', 2)";

$queryProduct3pinion1 = "INSERT INTO Opinions (description, id_products) VALUES ('Compaters sunt nutrixs de castus turpis.',3)";
$queryProduct3pinion2 = "INSERT INTO Opinions (description, id_products) VALUES ('The mind is full of paradox.',3)";
$queryProduct3pinion3 = "INSERT INTO Opinions (description, id_products) VALUES ('How wet. You ransack like a corsair.',3)";
$queryProduct3pinion4 = "INSERT INTO Opinions (description, id_products) VALUES ('Try simmering cheesecake seasoned with iced tea, garnished with celery.',3)";
$queryProduct3pinion5 = "INSERT INTO Opinions (description, id_products) VALUES ('Where is the extraterrestrial green people?',3)";
