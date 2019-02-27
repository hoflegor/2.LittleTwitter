<?php
//zapisz poniżej zapytania do bazy
$query1 = 'SELECT * FROM movies WHERE name LIKE "W%"';
$query2 = 'SELECT * FROM tickets WHERE price>15.30';
$query3 = 'SELECT * FROM tickets WHERE quantity>3';
$query4 = 'SELECT * FROM movies WHERE rating>6.5';

$addMovie = 'INSERT INTO movies (name, description, rating) VALUE ("WordWar Z", "The source has history, but not everyone studies it.", 7)';