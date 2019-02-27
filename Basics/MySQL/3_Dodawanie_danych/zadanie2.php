<?php
$query1 = 'INSERT INTO Products SET id=0, name=produkt1, description=name, price=904';
$query1fixed = 'INSERT INTO products (name, description, price) VALUES ('produkt1', 'name', 904);';

$query2 = 'INSERT INTO clients (name, surname) VALUES("Jan", "Kowalski");';
$query2fixed = '';

$query3 = 'INSERT INTO Movies(id, rating, name) VALUES(null, "bardzo dobry", "Szybcy i wściekli")';
$query3fixed = 'INSERT INTO movies(name, description, rating) VALUES ("Szybcy i wściekli", null, 8 );';

$query4 = 'INSERT INTO Payments SET id=90 AND VALUES("cash", NOW());';
$query4fixed = 'INSERT INTO payments (type, date) VALUES ("cash", now());';
