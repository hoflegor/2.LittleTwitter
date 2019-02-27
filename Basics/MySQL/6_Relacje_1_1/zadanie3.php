<?php
//zapisz poniżej zapytanie tworzące tabelę - pamiętaj o relacji i dodaniu odpowiedniej kolumny
$queryCreateTable = '
 CREATE TABLE Payments(
    id INT NOT NULL,
    type VARCHAR (255),
    date DATE,
    PRIMARY KEY (id),
    FOREIGN KEY (id) REFERENCES Tickets (id)
    ON DELETE CASCADE
    );

';