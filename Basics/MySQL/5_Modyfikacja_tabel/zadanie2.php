<?php
//Zapisz w poniższej zmiennej kod zapytań SQL
$query1 = 'UPDATE cinemas SET address ="Stadion Narodowy" WHERE name LIKE "Z%"';
$query2 = 'DELETE FROM payments WHERE date<DATE_SUB(NOW(), INTERVAL 4 DAY)';
$query3 = 'UPDATE movies SET rating=5.4 WHERE CHAR_LENGTH (description)>40';
$query4 = 'UPDATE Tickets SET price = price * 0.5 WHERE quantity > 10';

$addZcinema='INSERT INTO cinemas (name, address) VALUES ("Zmien mnie", dzika 69)';