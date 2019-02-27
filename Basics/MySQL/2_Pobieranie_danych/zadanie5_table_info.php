<?php
//pobierz z parametru GET dane o nazwie tabeli oraz id rekordu który chcesz pobrać i wyświetl poniżej jego dane

$servername = "localhost";
$username = "root";
$password = "qweta";
$baseName = "cinemas_ex";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $baseName);

if ($conn->connect_error) {
    die("<br>!!Connection failed. Error: <strong>$conn->connect_error.</strong>");
}
echo("<br>**Connected to database $baseName");
echo "<hr>";



if($_SERVER['REQUEST_METHOD'] == 'GET') {

//    var_dump($_GET['id']);

    switch ($_GET['table']) {
        case 'movies':
            $id=$_GET['id'];
            $sql = "SELECT * FROM movies WHERE id_movies=$id";
            $result = $conn->query($sql);
//            var_dump($result);
            foreach ($result as $row){
                echo "**Tytuł: " . $row ['name'] . "<br>" . "**Opis: " .
                    $row['description'] . "<br>" . "**Ocena: " . $row['rating'];
            }
            break;

        case 'cinemas':
            $id=$_GET['id'];
            $sql = "SELECT * FROM cinemas WHERE id_cinemas=$id";
            $result = $conn->query($sql);
//            var_dump($result);
            foreach ($result as $row){
                echo "**Kino " . $row ['name'] . "<br>" . "**Adres: " .
                    $row['address'];
            }
            break;

        case 'payments':
            $id=$_GET['id'];
            $sql = "SELECT * FROM payments WHERE id_payments=$id";
            $result = $conn->query($sql);
//            var_dump($result);
            foreach ($result as $row){
                echo "**Numer płatności: " . $id . "<br>" .
                    "**Sposób płatności: " . $row['type'] . "<br>" .
                    "**Data: " . $row['date'] . "<br>";
            }
            break;

        case 'tickets':
            $id=$_GET['id'];
            $sql = "SELECT * FROM tickets WHERE id_tickets=$id";
            $result = $conn->query($sql);
//            var_dump($result);
            foreach ($result as $row){
                echo "**Numer biletu/biletów: " . $id . "<br>" .
                    "**Ilość: " . $row['quantity'] . "<br>" .
                    "**Cena: " . $row['price'] . "<br>";
            }
            break;

    }
}

else{
    echo "<strong>!!</strong>Wrong input - SERVER['REQUEST_METHOD'] must be *GET*<strong>!!</strong><br>";
}

$conn->close();
$conn = null;