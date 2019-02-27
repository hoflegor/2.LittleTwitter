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

$sql="SELECT id_orders, id_products FROM Products_Orders";
$result = $conn->query($sql);

$prevID = 0;

foreach ($result as $row) {

    $order_id = $row['id_orders'];
    $product_id = $row['id_products'];

    if ($order_id != $prevID) {
        $prevID = $order_id;
        echo "<h3>Zamówienie id $order_id:</h3>";
    }

    echo "Produkt o id: $product_id <br>";

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
    <title>Zadanie 1 - wyświetlanie zamówień (produktów)</title>
</head>
<body>

</body>
</html>
