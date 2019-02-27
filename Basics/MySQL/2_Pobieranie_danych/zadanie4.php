<?php
//zapisz poniżej kod, który połączy się z bazą danych
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



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zdanie 4 - pobieranie danych z bazy</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top:30px;">
            <a class="btn btn-warning" href="zadanie4.php" role="button">Strona główna</a>
            <a class="btn btn-info" href="zadanie4.php?action=movies" role="button">Filmy</a>
            <a class="btn btn-info" href="zadanie4.php?action=cinemas" role="button">Kina</a>
            <a class="btn btn-info" href="zadanie4.php?action=payments" role="button">Płatności</a>
            <a class="btn btn-info" href="zadanie4.php?action=tickets" role="button">Bilety</a>
        </div>
    </div>
    <div class="row">
        <?php
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case'movies':
                    //tutaj wygeneruj odpowiednie linki dla wszystkich rekordów zwracjących filmy
                    $sql="SELECT id_movies, name FROM movies";
                    $result=$conn->query($sql);
//                    var_dump($result);
                    foreach ($result as $row){
                        echo '<a href="zadanie5_table_info.php?table=movies&id=' . $row['id_movies'] .
                              '"target="_blank">' . '**Tytuł: '. $row['name'] . '</a>' . "<br>";

                    }
                    break;

                case'cinemas':
                    //tutaj wygeneruj odpowiednie linki
                    $sql="SELECT id_cinemas, name FROM cinemas";
                    $result=$conn->query($sql);
//                    var_dump($result);
                    foreach ($result as $row){
                        echo '<a href="zadanie5_table_info.php?table=cinemas&id=' . $row['id_cinemas'] .
                            '"target="_blank">' . '**Kino: '. $row['name'] . '</a>' . "<br>";
                    }
                    break;

                case'payments':
                    //tutaj wygeneruj odpowiednie linki
                    $sql="SELECT id_payments, type, date FROM payments";
                    $result=$conn->query($sql);
                    foreach ($result as $row){
                        echo '<a href="zadanie5_table_info.php?table=payments&id=' . $row['id_payments'] .
                            '"target="_blank">' . '**Nr płatności: ' . $row['id_payments'] .
                            '</a>' . "<br>";
                    }
                    break;

                case'tickets':
                    //tutaj wygeneruj odpowiednie linki
                    $sql='SELECT id_tickets FROM tickets';
                    $result=$conn->query($sql);
                    foreach ($result as $row){
                        echo '<a href="zadanie5_table_info.php?table=tickets&id=' . $row['id_tickets'] .
                            '"target="_blank">' . '**Zakup biletów nr: '. $row['id_tickets'] . '</a>' . "<br>";
                    }
                    break;
            }
        }

        $conn->close();
        $conn = null;

        ?>
    </div>
</div>
</body>
</html>
