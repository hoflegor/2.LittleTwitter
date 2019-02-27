<?php

$serverName = "localhost";
$userName = "root";
$password = "qweta";
$baseName = "products_ex";

$conn = new mysqli($serverName, $userName, $password, $baseName);

if ($conn->connect_error) {
    die("Blad: " . $conn->connect_error);
}
echo "Połączono z bazą: $baseName <br>";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['orderDescription'] != "" && $_POST['products'] != []) {

        var_dump($_POST);

        $orderDescription = $_POST['orderDescription'];

        $sql = "INSERT INTO orders (description) VALUES ('$orderDescription')";
        $result = $conn->query($sql);

        if ($result == false) {
            echo "Błąd w dodawniu description do Orders: $conn->error ";
        }
        else {
            $last_id = $conn->insert_id;

            foreach ($_POST['products'] as $product) {

                $sql = "INSERT INTO Products_Orders (id_products, id_orders) "
                    . "VALUES('$product','$last_id')";
                $result = $conn->query($sql);

                if ($result == false) {
                    echo"Błąd podczas dodawania do Products_Orders: $conn->error";
                }
                else {
                    echo"Do zamówienia o id $last_id dodano produkt o id $product";
                }

            }

        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 2 - dodawanie zamówienia</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="" method="post" role="form">
                <div class="form-group">
                    <label for="">Order description:</label>
                    <input type="text" class="form-control" name="orderDescription" id="orderDescription"
                           placeholder="Order description...">
                </div>
                <div class="checkbox">
                    <?php
                    /*
                    Tutaj wygeneruj listę wszystkich przedmiotów znajdujących się w bazie danych. Poniżej możesz znaleźć przykładowy kod HTML wyświetlający jeden przedmiot:
                    <label>
                        <input type="checkbox" name="products[]" value="12"> Przedmiot o id 12
                    </label>
                    */

                    $sql = "SELECT id_products, name FROM products";
                    $result = $conn->query($sql);

                    if ($result == false) {
                        echo"$conn->error";
                    }
                    else {
                        echo"Wybierz produkty do zamówienia: <br>";
                        foreach ($result as $product) {
                            $pro_id = $product['id_products'];
                            $pro_name = $product['name'];
                            echo "<label>";
                            echo "<input type='checkbox' name='products[]' value=$pro_id>" .
                                "$pro_name o id $pro_id ";
                            echo "</label><br>";
                        }
                    }
                    ?>

                </div>
                <button type="submit" class="btn btn-success">ADD ORDER</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
