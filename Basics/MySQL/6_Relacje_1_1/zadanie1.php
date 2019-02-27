<?php
//zapisz poniżej zapytania dodający tabelę do bazy pamiętaj o relacji
$tableAddQuery = '
CREATE TABLE clientAddress
  (client_id INT NOT NULL ,
  city VARCHAR (255),
  street VARCHAR (255),
  house_nr VARCHAR (255),
  PRIMARY KEY(client_id),
  FOREIGN KEY (client_id) REFERENCES clients (id_clients)
  ON DELETE CASCADE);
';

//zapisz poniżej kod dodania do bazy rekordów
$tableAddRow1 = 'INSERT INTO clientAddress (client_id, city, street, house_nr) 
                    VALUES (1,"NeverEverLand","Under the Bridge", 69)';
$tableAddRow2 = 'INSERT INTO clientAddress (client_id, city, street, house_nr) 
                    VALUES (2,"NoLand","Lorems", 44)';
$tableAddRow3 = 'INSERT INTO clientAddress (client_id, city, street, house_nr) 
                    VALUES (3,"Derry","Elm", 44)';
$tableAddRow4 = 'INSERT INTO clientAddress (client_id, city, street, house_nr) 
                    VALUES (4,"Yogiland","BooBoo", 2)';
$tableAddRow5 = 'INSERT INTO clientAddress (client_id, city, street, house_nr) 
                    VALUES (5,"Grubianstwo","Bezczelna", 4)';