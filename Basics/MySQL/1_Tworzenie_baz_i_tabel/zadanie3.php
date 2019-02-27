<?php
//Zapisz w poniższej zmiennej kod zapytania SQL
$query = '
CREATE DATABASE cinemas_ex;
';

//Stwórz poniżej odpowiednie zmienne z danymi do bazy

$host='localhost';
$user='root';
$pswd='qweta';
$base='cinemas_ex';

//Poniżej napisz kod łączący się z bazą danych

$conn = new mysqli($host, $user, $pswd, $base);

if ($conn->connect_error){
    die("Connection failed. Error: " . $conn->connect_error);
}
echo ("Connected with database: $base");

$conn->close();
$conn=null;