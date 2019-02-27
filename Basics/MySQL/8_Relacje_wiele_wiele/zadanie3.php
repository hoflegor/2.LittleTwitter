<?php
$queryRelation = '
CREATE TABLE Screenings(
id_screen INT AUTO_INCREMENT PRIMARY KEY ,
id_cinemas INT NOT NULL,
id_movies INT NOT NULL,
FOREIGN KEY (id_cinemas) REFERENCES Cinemas(id),
FOREIGN KEY (id_movies) REFERENCES Movies(id)
);
';