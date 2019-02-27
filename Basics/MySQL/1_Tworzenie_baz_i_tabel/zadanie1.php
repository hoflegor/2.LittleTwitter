<?php
//Zapisz w poniższej zmiennej kod zapytania SQL
$query = 'CREATE DATABASE products_ex';

//Stwórz poniżej odpowiednie zmienne z danymi do bazy
$hostName='localhost';
$userName='root';
$password='qweta';
$baseName='products_ex';
//Poniżej napisz kod łączący się z bazą danych
$conn=new mysqli($hostName, $userName, $password, $baseName);

if($conn->connect_error){
    die("Połączenie nieudane. Błąd: " . $conn->connect_error);
}
echo ("Połączono z bazą $baseName");

$conn->close();
$conn=null;