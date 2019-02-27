<?php

$createProducts_Orders="
                        CREATE TABLE Products_Orders(
    id_P_O INT AUTO_INCREMENT,
    id_products INT NOT NULL,
    id_orders INT NOT NULL,
    PRIMARY KEY (id_P_O),
    FOREIGN KEY (id_products) REFERENCES products(id_products),
    FOREIGN KEY (id_orders) REFERENCES orders(id_orders)
    );

                        ";

$query1="INSERT INTO Products_Orders(id_products, id_orders) VALUES (1,2)";
$query2="INSERT INTO Products_Orders(id_products, id_orders) VALUES (2,2)";
$query3="INSERT INTO Products_Orders(id_products, id_orders) VALUES (2,3)";
$query4="INSERT INTO Products_Orders(id_products, id_orders) VALUES (2,4)";
$query5="INSERT INTO Products_Orders(id_products, id_orders) VALUES (1,4)";

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

$sql="SELECT id_products, id_orders FROM Products_Orders";
$result=$conn->query($sql);

$prevID=0;

foreach ($result as $row){

    $product=$row['id_products'];
    $order=$row['id_orders'];

    if($product!=$prevID){
        $prevID=$product;
        echo "<br><strong>Produkt o id: $product</strong><br>";
    }
    echo "*Zamówienie o id: $order<br>";

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
    <title>Zadanie 1 - wyświetlanie produktów (zamówień)</title>
</head>
<body>

</body>
</html>
