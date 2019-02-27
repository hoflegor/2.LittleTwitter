<?php
//Stwórz poniżej odpowiednie zmienne z danymi do bazy
$hostName='localhost';
$userName='root';
$password='qweta';
$baseName='products_ex';

//Poniżej napisz kod łączący się z bazą danych
$conn=new mysqli($hostName, $userName, $password, $baseName);
if($conn->connect_error){
    die("Connection failed. Error:$conn->connect_error<hr>");
}
echo ("Connected to: $baseName<hr>");

//Zapisz w poniższej zmiennej kod zapytania SQL pobierającego odpowiednie dane
$sql = "SELECT * FROM products";

//wykonaj zapytanie do bazy
$result=$conn->query($sql);

$conn->close();
$conn=null;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 1 - wyświetlanie danych z bazy</title>
</head>
<body>
<?php
//poniżej wyświetl listę danych z bazy, pamiętaj aby użyć pętli a nie print_r lub var_dump
foreach ($result as $row){

    if(strlen($row['description'])<=20){
        $descript=$row['description'];
    }
    else{
        $descript=substr($row['description'],0,20) . "...";
    }

        echo "** <strong>" . $row['name'] ."</strong>" . "-> " . $descript . " // <ins>Price: " .$row['price'] . "</ins><br>";
}
?>
</body>
</html>
