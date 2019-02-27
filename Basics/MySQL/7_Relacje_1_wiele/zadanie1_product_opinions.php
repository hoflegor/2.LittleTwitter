<?php

$servername = "localhost";
$username = "root";
$password = "qweta";
$baseName = "products_ex";

$conn = new mysqli($servername,
                   $username,
                   $password,
                   $baseName);

if ($conn->connect_error) {
    die("<strong>!!<strong>Connection failed. Error: <strong>$conn->connect_error!!</strong>.<br>");
}
echo("<strong>**</strong>Connected to database <strong>$baseName</strong>.<br>");

$sql="SELECT products.id_products as id, products.name as name, Opinions.description as opinion FROM products LEFT JOIN Opinions ON products.id_products=Opinions.id_products";
$result=$conn->query($sql);
//print_r($result);

$prevId=0;
foreach ($result as $row){
    if($row['id'] != $prevId) {
        $prevId=$row['id'];
        echo "<h1>" . $row['name'] . "</h1>";
    }
    echo "*" . $row['opinion'] ."<br>";
}


$conn->close();
$conn = null;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 1 - lista opinii i produktów</title>
</head>
<body>

</body>
</html>
